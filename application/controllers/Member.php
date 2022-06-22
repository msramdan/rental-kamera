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
			'username' 		=> $this->input->post('username', true),
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
				'username' 		=> $this->input->post('username', true),
				'ktp' 		=> $this->input->post('ktp', true),
				'nama_member' 			=> $this->input->post('nama_member', true),
				'jk_kelamin' 			=> $this->input->post('jk_kelamin', true),
				'alamat' 		=> $this->input->post('alamat', true),
				'no_hp' 		=> $this->input->post('no_hp', true),
			);
		} else {
			$data = array(
				'username' 		=> $this->input->post('username', true),
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
	public function download($gambar)
	{
		force_download('assets/admin/dist/img/' . $gambar, NULL);
	}
}
