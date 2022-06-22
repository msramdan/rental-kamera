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
}
