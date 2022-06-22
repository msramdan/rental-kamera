<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('M_member');
	}
	public function index()
	{
		$oke['content_page'] = "member/listmember";
		$oke['member'] = $this->M_member->tampilmember();
		$this->load->view('body/dashboard', $oke);
	}

	public function adddata()
	{
		$oke['content_page'] = "member/tambahmember";
		$this->load->view('body/dashboard', $oke);
	}

	public function editmember($member_id)
	{

		$oke['content_page'] = "member/editmember";
		$oke['data_member'] = $this->M_member->editdata($member_id);
		$this->load->view('body/dashboard', $oke);
	}


	public function datahapus($membername)
	{
		$oke = $this->M_member->delete($membername);
		$this->load->view('body/dashboard', $oke);
		redirect('member');
	}
	public function simpan_member()
	{
		$data = array(
			'ktp' 		=> $this->input->post('ktp', true),
			'nama_member' 			=> $this->input->post('nama_member', true),
			'jk_kelamin' 			=> $this->input->post('jk_kelamin', true),
			'alamat' 		=> $this->input->post('alamat', true),
			'no_hp' 		=> $this->input->post('no_hp', true),
			'password' 			=> md5($this->input->post('password', true)),

		);
		$this->M_member->tambahdata($data);
		$this->session->set_flashdata('oke', 'Ditambahkan');
		redirect('member');
	}

	public function submit_edit_member($member_id)
	{


		if ($this->input->post('password') == '' || $this->input->post('password') == null) {
			$data = array(
				'ktp' 		=> $this->input->post('ktp', true),
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
			);
		}


		$this->M_member->ubah_data($data, $member_id);
		$this->session->set_flashdata('oke', 'Dirubah');
		redirect('member');
	}

	public function submit_edit($membername)
	{
		$config['upload_path']	= './assets/admin/dist/img'; // kita akan upload gambar ke dalam folder assets ->images
		$config['allowed_types'] = 'gif|jpg|png'; //format file yang bisa di masukan nantinya
		$config['max_size']		= 2048; //maks file yang bisa di upload ke dalam file kita 40000kb
		$config['file_name']        = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload("img_member")) {
			$row = $this->M_member->editdata($membername);
			$data = $this->upload->data();
			$gambar = $data['file_name'];
			$target_file = './assets/admin/dist/img/' . $row['img_member'];
			unlink($target_file);
		} else {
			$gambar = $this->input->post('gambar_lama');
		}
		$data = array(
			'membername' 			=> $this->input->post('membername', true),
			'nama' 				=> $this->input->post('member', true),
			'email' 			=> $this->input->post('email', true),
			'alamat'			=> $this->input->post('alamat', true),
			'kota' 				=> $this->input->post('kota', true),
			'provinsi'			=> $this->input->post('provinsi', true),
			'kode_pos' 			=> $this->input->post('kodepos', true),
			'telepon'			=> $this->input->post('telepon', true),
			'level' 			=> $this->input->post('level', true),
			'img_member' 			=> $gambar,
			'is_aktive' 		=> 1,
		);
		$oke['content_page']	= "member/listmember";
		$oke					= $this->M_member->ubah_data($data, $membername);
		$this->load->view('body/dashboard', $oke);
		$this->session->set_flashdata('oke', 'Dirubah');
		redirect('home');
	}



	public function submiteditpassword($membername)
	{
		$passwordlama = $this->input->post('lama'); // poSt dari inputan password lama
		if ($this->session->memberdata('level') == "U") {
			if ($this->session->memberdata('password') == $passwordlama) { // cek kondisi jika password lama sama degn password yg di database
				$data = array(
					//yang kiri sesuai filed table sedangkan yang kanan sesuai dari form inputan//
					'password' 			=> md5($this->input->post('password', true)),
				);
				$oke['content_page']	= "member/listmember"; //supaya content dari halaman di tampilkan tambahkan kondisi di index lane 207
				$oke					= $this->M_member->ubah_data($data, $membername); // variable content dan variable nama array harus sama 
				$this->load->view('body/dashboard', $oke);
				$this->session->set_flashdata('oke', 'Dirubah'); // kemudian tambhakan clas di button
				redirect('login/logout');
			} else { //jika password lama beda dengan yang ada di database akan di arahkan langsung ke HOMe
				echo "<script>
				alert('Password Lama Salah');
				window.location='" . site_url('Home') . "'</script>";
			}
		} else {
			$oke['data_member'] 		= $this->M_member->editdata($membername);
			$data = array(
				'password' 			=> md5($this->input->post('password', true)), //yang kiri sesuai filed table sedangkan yang kanan sesuai dari form inputan//
			);
			$oke['content_page']	= "member/listmember"; //supaya content dari halaman di tampilkan tambahkan kondisi di index lane 207
			$oke					= $this->M_member->ubah_data($data, $membername); // variable content dan variable nama array harus sama 
			$this->load->view('body/dashboard', $oke);
			$this->session->set_flashdata('oke', 'Dirubah');
			if ($this->session->memberdata('membername') == $membername) { //jika membername yang di edit sama dgn session login dia akan logout
				redirect('login/logout');
			} else { //sebaliknya jika beda maka akan tampilkan Home list member
				redirect('member/member');
			}
		}
	}
	public function submit_edit_profile($membername)
	{
		$passwordlama = $this->input->post('lama'); // poSt dari inputan password lama
		if ($this->session->memberdata('level') == "U") {
			if ($this->session->memberdata('password') == $passwordlama) { // cek kondisi jika password lama sama degn password yg di database
				$data = array(
					//yang kiri sesuai filed table sedangkan yang kanan sesuai dari form inputan//
					'password' 			=> md5($this->input->post('password', true)),
				);
				$oke['content_page']	= "member/listmember"; //supaya content dari halaman di tampilkan tambahkan kondisi di index lane 207
				$oke					= $this->M_member->ubah_data($data, $membername); // variable content dan variable nama array harus sama 
				$this->load->view('body/dashboard', $oke);
				$this->session->set_flashdata('oke', 'Dirubah'); // kemudian tambhakan clas di button
				redirect('login/logout');
			} else { //jika password lama beda dengan yang ada di database akan di arahkan langsung ke HOMe
				echo "<script>
				alert('Password Lama Salah');
				window.location='" . site_url('Home') . "'</script>";
			}
		} else {
			$oke['data_member'] 		= $this->M_member->editdata($membername);
			$data = array(
				'password' 			=> md5($this->input->post('password', true)), //yang kiri sesuai filed table sedangkan yang kanan sesuai dari form inputan//
			);
			$oke['content_page']	= "member/listmember"; //supaya content dari halaman di tampilkan tambahkan kondisi di index lane 207
			$oke					= $this->M_member->ubah_data($data, $membername); // variable content dan variable nama array harus sama 
			$this->load->view('body/dashboard', $oke);
			$this->session->set_flashdata('oke', 'Dirubah');
			redirect('login/logout');
		}
	}
	public function download($gambar)
	{
		force_download('assets/admin/dist/img/' . $gambar, NULL);
	}
}
