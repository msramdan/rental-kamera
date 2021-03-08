<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Buku extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			$this->load->model('M_buku');
			$this->load->model('M_rak');
			$this->load->model('M_kategori');
			$this->load->model('M_home');
			$this->load->database();
		}
	public function index()
	{	
		$oke['count_jml_buku']= $this->M_home->count_jml_buku();
		$oke['buku']	=$this->M_buku->list_buku();
		$oke['content_page']	="buku/v_list_buku";
		$this->load->view('body/dashboard',$oke);
	}

	public function tambah_data(){
		$oke['kategori'] = $this->M_kategori->list_kategori();
		$oke['kodeunik'] 		= $this->M_buku->buat_kode();
		$oke['rak'] = $this->M_rak->list_rak();
		$oke['content_page']="buku/v_tambah_buku";
		$this->load->view('body/dashboard',$oke);
	}

	public function SimpanData(){
		$config['upload_path']		= './assets/admin/dist/img/buku'; 
		$config['allowed_types']	= 'gif|jpg|png|jpeg'; 
		$config['max_size']			= 4048; 
		$config['file_name']        = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10); 
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		$this->upload->do_upload("sampul");
		$data = $this->upload->data();
		$gambar =$data['file_name'];
	$data = array(
			'buku_id' 	=>$this->input->post('buku_id',true),
			'title' 	=>$this->input->post('title',true),
			'isbn' 	=>$this->input->post('isbn',true),
			'penerbit' 	=>$this->input->post('penerbit',true),
			'pengarang' 	=>$this->input->post('pengarang',true),
			'id_kategori' 	=>$this->input->post('id_kategori',true),
			'id_rak' 	=>$this->input->post('id_rak',true),
			'jml' 	=>$this->input->post('jml',true),
			'thn_buku' 	=>$this->input->post('thn_buku',true),
			'tgl_masuk' =>date('y-m-d H:i:s'),
			'sampul' 			=> $gambar,
		);

		$oke					=$this->M_buku->TambahData($data); // variable content dan variable nama array harus sama 
		redirect('buku');
	}

	public function DataHapus($id){
		$row = $this->M_buku->edit_data($id);
        $target_file = './assets/admin/dist/img/buku/'.$row['sampul'];
        unlink($target_file);
		$oke					=$this->M_buku->delete($id); // variable content dan variable nama array harus sama 
		redirect('buku');
	}

	public function edit_buku($id){
		$oke['kategori'] = $this->M_kategori->list_kategori();
		$oke['rak'] = $this->M_rak->list_rak();
		$oke['content_page']	="buku/v_edit_buku";
		$oke['data_buku']		=$this->M_buku->edit_data($id);
		$this->load->view('body/dashboard',$oke);
	}
	public function view_buku($id){
		$oke['content_page']	="buku/v_read_buku";
		$oke['data_buku']		=$this->M_buku->edit_data($id);
		$this->load->view('body/dashboard',$oke);
	}

	public function simpan_edit_data($id){
		$config['upload_path']	= './assets/admin/dist/img/buku'; // kita akan upload gambar ke dalam folder assets ->images
		$config['allowed_types']= 'gif|jpg|png|jpeg'; //format file yang bisa di masukan nantinya
		$config['max_size']		= 4048; //maks file yang bisa di upload ke dalam file kita 40000kb
		$config['file_name']        = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10); 
		$this->load->library('upload',$config);
        $this->upload->initialize($config);
         if ($this->upload->do_upload("sampul")) {
            $row = $this->M_buku->edit_data($id);
            $data = $this->upload->data();
            $gambar =$data['file_name'];
            $target_file = './assets/admin/dist/img/buku/'.$row['sampul'];
            unlink($target_file);
            }else{
            $gambar = $this->input->post('gambar_lama');
        }
		$data = array(
			'title' 	=>$this->input->post('title',true),
			'isbn' 	=>$this->input->post('isbn',true),
			'penerbit' 	=>$this->input->post('penerbit',true),
			'pengarang' 	=>$this->input->post('pengarang',true),
			'id_kategori' 	=>$this->input->post('id_kategori',true),
			'id_rak' 	=>$this->input->post('id_rak',true),
			'jml' 	=>$this->input->post('jml',true),
			'sampul' 			=> $gambar,
			'thn_buku' 	=>$this->input->post('thn_buku',true),
		);
		$oke					=$this->M_buku->submit_edit_buku($data,$id); // variable content dan variable nama array harus sama 
		$this->load->view('body/dashboard',$oke);
		redirect('buku');
	}

	 public function download($gambar){
        force_download('assets/admin/dist/img/buku/'.$gambar,NULL);
    }
	

}
