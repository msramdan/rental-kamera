<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Kategori extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			$this->load->model('M_kategori');
			$this->load->database();
		}
	public function index()
	{	
		$oke['kategori']	=$this->M_kategori->list_kategori();
		$oke['content_page']	="kategori/v_list_kategori";
		$this->load->view('body/dashboard',$oke);
	}

	public function tambah_data(){

		$oke['content_page']="kategori/v_tambah_kategori";
		$this->load->view('body/dashboard',$oke);
	}

	public function SimpanData(){
	$data = array(
			'nama_kategori' 	=>$this->input->post('nama_kategori',true),
		);

		$oke					=$this->M_kategori->TambahData($data); // variable content dan variable nama array harus sama 
		redirect('kategori');
	}

	public function DataHapus($id){
		$oke					=$this->M_kategori->delete($id); // variable content dan variable nama array harus sama 
		redirect('kategori');
	}

	public function edit_kategori($id){
		$oke['content_page']	="kategori/v_edit_kategori";
		$oke['data_kategori']		=$this->M_kategori->edit_data($id);
		$this->load->view('body/dashboard',$oke);
	}

	public function simpan_edit_data($id){
		$data = array(
			'nama_kategori' 				=>$this->input->post('nama_kategori',true),
		);
		$oke					=$this->M_kategori->Submit_edit_kategori($data,$id); // variable content dan variable nama array harus sama 
		$this->load->view('body/dashboard',$oke);
		redirect('kategori');
	}
	

}
