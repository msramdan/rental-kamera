<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Rak extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			$this->load->model('M_rak');
			$this->load->database();
		}
	public function index()
	{	
		$oke['rak']	=$this->M_rak->list_rak();
		$oke['content_page']	="rak/v_list_rak";
		$this->load->view('body/dashboard',$oke);
	}
	public function tambah_data(){
		$oke['content_page']="rak/v_tambah_rak";
		$this->load->view('body/dashboard',$oke);
	}
	public function SimpanData(){
	$data = array(
			'nama_rak' 	=>$this->input->post('nama_rak',true),
		);

		$oke					=$this->M_rak->TambahData($data); // variable content dan variable nama array harus sama 
		redirect('rak');
	}
	public function DataHapus($id){
		$oke					=$this->M_rak->delete($id); // variable content dan variable nama array harus sama 
		redirect('rak');
	}

	public function edit_rak($id){
		$oke['content_page']	="rak/v_edit_rak";
		$oke['data_rak']		=$this->M_rak->edit_data($id);
		$this->load->view('body/dashboard',$oke);
	}

	public function simpan_edit_data($id){
		$data = array(
			'nama_rak' 				=>$this->input->post('nama_rak',true),
		);
		$oke					=$this->M_rak->Submit_edit_rak($data,$id); // variable content dan variable nama array harus sama 
		$this->load->view('body/dashboard',$oke);
		redirect('rak');
	}
	

}
