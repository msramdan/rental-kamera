<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Home extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model('M_user');
			$this->load->model('M_home');
			$this->load->model('M_transaksi');
			$this->load->database();
		}
	public function index()
	{	

		$oke['count_camera'] = $this->M_home->count_camera();
		$oke['count_kategori']= $this->M_home->count_kategori();
		$oke['count_member']= $this->M_home->count_member();
		$oke['count_pengguna']= $this->M_home->count_pengguna();
		$oke['content_page']="home/home";
		$this->load->view('body/dashboard',$oke);
	}
	
	


}
