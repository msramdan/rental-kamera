<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Home extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model('M_user');
			$this->load->model('M_buku');
			$this->load->model('M_home');
			$this->load->model('M_transaksi');
			$this->load->database();
		}
	public function index()
	{	
		$oke['list_buku'] = $this->M_buku->list_buku_home();
		$oke['list_pengguna'] = $this->M_user->tampil_user_home();
		$oke['list_transaksi'] = $this->M_transaksi->tampil_transaksi_home();
		$oke['count_buku'] = $this->M_home->count_buku();
		$oke['count_jml_buku']= $this->M_home->count_jml_buku();
		$oke['count_pengguna']= $this->M_home->count_pengguna();
		$oke['count_dipinjam']= $this->M_home->count_dipinjam();
		$oke['content_page']="home/home";
		$this->load->view('body/dashboard',$oke);
	}
	
	


}
