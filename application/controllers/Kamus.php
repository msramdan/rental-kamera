<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Kamus extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			$this->load->model('M_kamus');
			$this->load->database();
		}
	public function library_kamus($bahasa_id)
	{	
		$oke['library_kamus']	=$this->M_kamus->list_libray_kamus($bahasa_id);
		$oke['content_page']	="kamus/v_list_library_kamus";
		$this->load->view('body/dashboard',$oke);
	}
	public function tambah_kamus_kata(){
		$oke['kodeunik'] 		= $this->M_kamus->buat_kode();
		$oke['content_page']	="kamus/v_tambahkamus";
		$this->load->view('body/dashboard',$oke);
	}
	public function submit_kamus_kata(){
		$data = array(
						array(
					        'bahasa_id'     => $this->input->post('ina_id',true),
					        'kode_kamus'   	=> $this->input->post('kode_kamus',true),
					        'teks'    		=> $this->input->post('ina',true)
						),
						array(
					        'bahasa_id'     => $this->input->post('eu_id',true),
					        'kode_kamus'   	=> $this->input->post('kode_kamus',true),
					        'teks'    		=> $this->input->post('eu',true)
					    )
					  );
	    $this->db->insert_batch('kamus', $data);
	    $this->session->set_flashdata('oke','Dirubah');
	    redirect("bahasa/tampillistbahasa");
	}
	public function edit_kamus($bahasa_id,$kode_kamus){
		$oke['content_page']	="kamus/v_edit_library_kamus";
		$oke['data_kamus'] 		= $this->M_kamus->edit_kamus($bahasa_id,$kode_kamus);
		$this->load->view('body/dashboard',$oke);
	}
	public function submit_edit($kamus_id,$bahasa_id,$kode_kamus){
		$data = array(
			'teks' 	=> $this->input->post('teks',true),
		);
		$oke					=$this->M_kamus->ubah_data($data,$kamus_id,$bahasa_id,$kode_kamus); 
		$this->session->set_flashdata('oke','Dirubah');
		redirect("kamus/library_kamus/".$bahasa_id);
	}
	

}
