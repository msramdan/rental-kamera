<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Web extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_kategori');
		$this->load->model('M_kamera');
		$this->load->model('M_web');
		$this->load->model('M_member');
		$this->load->model('M_transaksi');
	}
	public function index()
	{

		$oke['kategori']	= $this->M_kategori->list_kategori();
		$oke['kamera']	= $this->M_kamera->list_kamera();
		$oke['content_page'] = "front-end/index";
		$this->load->view('front-end/layout', $oke);
	}

	public function kategori($id, $nama_kategori)
	{

		$oke['kategori']	= $this->M_kategori->list_kategori();
		$oke['kamera']	= $this->M_kamera->list_kamera($id);
		$oke['nama_kategori']	= $nama_kategori;
		$oke['jumlah']	=  $this->db->get_where('tbl_kamera', array('id_kategori' => $id))->num_rows();
		$oke['content_page'] = "front-end/kategori";
		$this->load->view('front-end/layout', $oke);
	}

	public function login()
	{
		$oke['content_page'] = "front-end/login";
		$this->load->view('front-end/layout', $oke);
	}

	public function akun()
	{
		$oke['data_member'] = $this->M_member->editdata($this->session->userdata('webMemberId'));
		$oke['content_page'] = "front-end/akun";
		$this->load->view('front-end/layout', $oke);
	}

	public function penyewaan()
	{
		$oke['transaksi'] = $this->M_transaksi->tampil_transaksi($this->session->userdata('webMemberId'));
		$oke['content_page'] = "front-end/penyewaan";
		$this->load->view('front-end/layout', $oke);
	}

	public function wishList()
	{
		$oke['wish'] = $this->M_web->wishList($this->session->userdata('webMemberId'));
		$oke['content_page'] = "front-end/wishList";
		$this->load->view('front-end/layout', $oke);
	}

	public function doLogin()
	{
		$username = $this->input->post('username');
		$this->form_validation->set_rules('username', 'username', 'required', array('required' => 'Silahkan Masukan username Anda'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Silahkan Masukan Password Anda'));
		if ($this->form_validation->run() == false) {
			redirect('web/login');
		} else {
			$user = $this->M_web->get($username);
			if ($this->M_web->checklogin($_POST['username'], $_POST['password']) > 0) {
				$this->session->set_userdata('namaLengkap', $user->nama_member);
				$this->session->set_userdata('webMemberId', $user->member_id);
				$this->session->set_flashdata('oke', 'Login Berhasil');
				redirect('');
			} else {
				$this->session->set_flashdata('error', 'Login Gagal, username atau password salah');
				redirect('web/login');
			}
		}
	}

	public function register()
	{
		$oke['content_page'] = "front-end/register";
		$this->load->view('front-end/layout', $oke);
	}

	public function doRegister()
	{
		$data = array(
			'username' 		=> $this->input->post('username', true),
			'ktp' 		=> $this->input->post('ktp', true),
			'nama_member' 			=> $this->input->post('nama_member', true),
			'password' 			=> md5($this->input->post('password', true)),

		);
		$this->M_web->tambahdata($data);
		$this->session->set_flashdata('oke', 'Register berhasil, silahkan login !');
		redirect('');
	}

	public function logout()
	{
		$params = array('namaLengkap', 'webMemberId');
		$this->session->unset_userdata($params);
		$this->session->set_flashdata('oke', 'Logout Berhasil');
		redirect('');
	}

	public function updateAKun()
	{
		if ($this->input->post('password') == '' || $this->input->post('password') == null) {
			$data = array(
				'ktp' 		=> $this->input->post('ktp', true),
				'username' 		=> $this->input->post('username', true),
				'nama_member' 			=> $this->input->post('nama_member', true),
				'jk_kelamin' 			=> $this->input->post('jk_kelamin', true),
				'alamat' 		=> $this->input->post('alamat', true),
				'no_hp' 		=> $this->input->post('no_hp', true),
			);
		} else {
			$data = array(
				'ktp' 		=> $this->input->post('ktp', true),
				'nama_member' 			=> $this->input->post('nama_member', true),
				'jk_kelamin' 			=> $this->input->post('jk_kelamin', true),
				'alamat' 		=> $this->input->post('alamat', true),
				'no_hp' 		=> $this->input->post('no_hp', true),
				'password' 			=> md5($this->input->post('password', true)),
				'username' 		=> $this->input->post('username', true),
			);
		}


		$this->M_member->ubah_data($data, $this->session->userdata('webMemberId'));
		$this->session->set_flashdata('oke', 'Data akun berhasil di update');
		redirect('web/akun');
	}

	public function addWishlist($id)
	{
		$session = $this->session->userdata('webMemberId');
		if ($session  != null) {
			$member_id = $this->session->userdata('webMemberId');
			$jml = $this->db->get_where('wishList', array('id_kamera' => $id))->num_rows();
			if ($jml > 0) {
				$this->session->set_flashdata('oke', 'Item sudah ada di Wishlish');
				redirect('web/wishList');
			} else {
				$this->db->query("INSERT INTO wishList (member_id,id_kamera) VALUES ($member_id,$id)");
				$this->session->set_flashdata('oke', 'Item Wishlish berhasil ditambahkan');
				redirect('web/wishList');
			}
		} else {
			$this->session->set_flashdata('error', 'Silahkan login terlebih dahulu');
			redirect('web/login');
		}
	}

	public function doDeleteWish($id)
	{
		$this->M_web->doDeleteWish($id);
		$this->session->set_flashdata('oke', 'Item Wishlish berhasil dihapus');
		redirect('web/wishList');
	}

	function get_autocomplete()
	{
		if (isset($_GET['term'])) {
			$result = $this->M_kamera->cari($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row)
					$arr_result[] = $row->nama_kamera;
				echo json_encode($arr_result);
			}
		}
	}
	public function pencarian()
	{
		$nama_kamera = $_GET['search'];
		$oke['kategori']	= $this->M_kategori->list_kategori();
		$oke['kamera']	= $this->M_kamera->byName($nama_kamera);
		$oke['nama_kamera']	= $nama_kamera;
		$oke['jumlah']	=  $this->db->get_where('tbl_kamera', array('nama_kamera' => $nama_kamera))->num_rows();
		$oke['content_page'] = "front-end/pencarian";
		$this->load->view('front-end/layout', $oke);
	}

	public function cart()
	{

		$session = $this->session->userdata('webMemberId');
		if ($session  != null) {
			$oke['content_page'] = "front-end/cart";
			$this->load->view('front-end/layout', $oke);
		} else {

			$this->session->set_flashdata('error', 'Silahkan login terlebih dahulu');
			redirect('web/login');
		}
	}

	public function addToCart()
	{
		$session = $this->session->userdata('webMemberId');
		if ($session  != null) {
			$id_kamera = $this->input->post('id_kamera');
			$nama = $this->input->post('nama_kamera');
			$harga = $this->input->post('harga');
			$photo = $this->input->post('photo');
			$data = array(
				'id'      => $id_kamera,
				'qty'     => 1,
				'price'   => $harga,
				'name'    => $nama,
				'options' => array('photo' => $photo)
			);

			$this->cart->insert($data);
			$this->session->set_flashdata('oke', 'Berhasil ditambahkan ke cart');
			redirect('web/cart');
		} else {

			$this->session->set_flashdata('error', 'Silahkan login terlebih dahulu');
			redirect('web/login');
		}
	}

	// dell all data in cart
	function clear()
	{
		$this->load->library("cart");
		$this->cart->destroy();
		$this->session->set_flashdata('oke', 'Semua Data dalam cart berhasil dihapus');
		redirect('');
	}
	public function remove_cart($rowid)
	{
		$removed_cart = array(
			'rowid'         => $rowid,
			'qty'           => 0
		);
		$this->cart->update($removed_cart);
		$this->session->set_flashdata('oke', 'Data dalam cart berhasil dihapus');
		redirect('web/cart');
	}

	public function update_cart()
	{
		$qty = $this->input->post('qty');
		$rowid = $this->input->post('rowid');
		$update = array(
			'rowid'         => $rowid,
			'qty'           => $qty
		);
		$this->cart->update($update);

		$this->session->set_flashdata('oke', 'Lama sewa berhasil di update');
		redirect('web/cart');
	}

	public function proses()
	{
		$data = array(
			'kode_sewa' 	=> $this->M_transaksi->buat_kode(),
			'tanggal_req' 	=> date('Y-m-d'),
			'member_id' 	=> $this->session->userdata('webMemberId'),
			'grand_total' 	=> $this->cart->total(),
		);
		$this->db->insert('tbl_sewa', $data);
		$id = $this->db->insert_id();

		// detail sewa
		foreach ($this->cart->contents() as $items) {
			$detail = array(
				'sewa_id' 	=> $id,
				'kamera_id' 	=> $items['id'],
				'harga' 	=> $items['price'],
				'total' 	=> $items['price'] * $items['qty'],
				'lama_sewa' 	=> $items['qty']
			);
			$this->db->insert('tbl_sewa_detail', $detail);
		}
		// hapus data cart
		// $this->load->library("cart");
		$this->cart->destroy();
		$this->session->set_flashdata('oke', 'Permintaan penyewaan sudah terkirim, silahkan datang ke studio untuk verifikasi data, bayar uang sewa dan ambil barang sewa');
		redirect('');
	}
}
