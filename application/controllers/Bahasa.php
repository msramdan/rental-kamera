<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Bahasa extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			$this->load->model('M_bahasa');
			$this->load->model('M_kamus');
		}

	public function tampillistbahasa(){
		$oke['bahasa']			= $this->M_bahasa->tampilbahasa();
		$oke['content_page']	="bahasa/listbahasa";
		$this->load->view('body/dashboard',$oke);
	}

	public function tambahbahasa(){
		$oke['content_page']	="bahasa/tambahbahasa";
		$this->load->view('body/dashboard',$oke);
	}
	
	public function simpandata(){
	$data = array(
			'nama' 				=>$this->input->post('bahasa',true),
			'nama_alt' 			=>$this->input->post('alt',true),
		);
		$oke['content_page']	="bahasa/listbahasa"; 
		$oke					=$this->M_bahasa->tambahbahasa($data); // variable content dan variable nama array harus sama 
		$this->load->view('body/dashboard',$oke);
		$this->session->set_flashdata('oke','Dirubah'); // kemudian tambhakan clas di button
		redirect('Bahasa/tampillistbahasa');
	}

	public function simpan_data_kamus(){
	$data = array(
			//yang kiri sesuai filed table sedangkan yang kanan sesuai dari form inputan//
			'indonesia' 		=>$this->input->post('ina',true),
			'inggris' 			=>$this->input->post('eu',true),
		);
		$oke['content_page']	="kamus/v_tambahkamus"; //supaya content dari halaman di tampilkan tambahkan kondisi di index lane 207
		$oke					=$this->M_bahasa->tambahkamus2($data); // variable content dan variable nama array harus sama 
		$oke['kamus']			=$this->M_bahasa->tampil_list_kamus();
		
		$this->load->view('body/dashboard',$oke);
		$this->session->set_flashdata('oke','Dirubah'); // kemudian tambhakan clas di button
		redirect('Bahasa/tambah_kamus_kata');
	}

	public function simpan_edit_kamus($kamus_id){
	$data = array(
			'indonesia' 		=>$this->input->post('ina',true),
			'inggris' 			=>$this->input->post('eu',true),
		);
		$oke					=$this->M_bahasa->Submit_edit_kamus($data,$kamus_id); // variable content dan variable nama array harus sama 
		$oke['kamus']			=$this->M_bahasa->tampil_list_kamus();
		$oke['kamus2']			=$this->M_bahasa->edit_data_kamus($kamus_id);
		
		$this->load->view('body/dashboard',$oke);
		$this->session->set_flashdata('oke','Dirubah'); // kemudian tambhakan clas di button
		redirect('Bahasa/tambah_kamus_kata');
	}

	public function datahapus($id){
		$oke['content_page']	="bahasa/listbahasa"; //supaya content dari halaman di tampilkan tambahkan kondisi di index lane 207
		$oke					=$this->M_bahasa->delete($id); // variable content dan variable nama array harus sama 
		$this->load->view('body/dashboard',$oke);
		redirect('Bahasa/tampillistbahasa');
	}
	public function hapus_data_kamus($kamus_id){
		$oke['content_page']	="kamus/v_tambahkamus";
		$oke					=$this->M_bahasa->delete_kamus($kamus_id); // variable content dan variable nama array harus sama 
		$this->load->view('body/dashboard',$oke);
		redirect('Bahasa/tambah_kamus_kata');
	}

	public function editbahasa($id){
		$oke['content_page']	="bahasa/editbahasa";
		$oke['data_bahasa']		=$this->M_bahasa->editdata($id);
		$this->load->view('body/dashboard',$oke);
	}

	public function simpan_edit_data($id){
		$data = array(
			//yang kiri sesuai filed table sedangkan yang kanan sesuai dari form inputan//
			'nama' 				=>$this->input->post('bahasa',true),
			'nama_alt' 			=>$this->input->post('alt',true),
		);
		$oke['content_page']	="bahasa/listbahasa"; //supaya content dari halaman di tampilkan tambahkan kondisi di index lane 207
		$oke					=$this->M_bahasa->Submit_edit_bahasa($data,$id); // variable content dan variable nama array harus sama 
		$this->load->view('body/dashboard',$oke);
		$this->session->set_flashdata('oke','Dirubah'); // kemudian tambhakan clas di button
		redirect('Bahasa/tampillistbahasa');
	}
	public function tambah_kamus_bahasa($id){
		$oke['kamus']			=$this->M_bahasa->tampil_list_kamus();
		$oke['kamus2']			=$this->M_bahasa->tampil_list_kamus2($id);
		$oke['bahasa']			=$this->M_bahasa->editdata($id); // untuk menampilkan d label edit bahasa sesuai Id yg di pilih
		// $oke['akseskapal']		= $this->M_kapal->tampillistakses($id);
		$oke['content_page']	="bahasa/kamusbahasa";
		$this->load->view('body/dashboard',$oke);
	}
}


