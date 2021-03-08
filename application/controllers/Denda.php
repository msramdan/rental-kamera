<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Denda extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			$this->load->model('M_denda');
			$this->load->database();
		}
	public function index()
	{	
		$oke['denda']	=$this->M_denda->list_denda();
		$oke['content_page']	="denda/v_list_denda";
		$this->load->view('body/dashboard',$oke);
	}

	public function edit_denda($id){
		$oke['content_page']	="denda/v_edit_denda";
		$oke['data_denda']		=$this->M_denda->edit_data($id);
		$this->load->view('body/dashboard',$oke);
	}

	public function simpan_edit_data($id){
		$data = array(
			'harga_denda' 				=>$this->input->post('harga_denda',true),
			'stat' 				=>$this->input->post('stat',true),
			'tgl_tetap'       =>date('y-m-d H:i:s'),

		);
		$oke					=$this->M_denda->Submit_edit_denda($data,$id); // variable content dan variable nama array harus sama 
		$this->load->view('body/dashboard',$oke);
		redirect('denda');
	}
	

}
