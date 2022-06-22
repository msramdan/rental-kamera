<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Kamera extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_kamera');
		$this->load->model('M_kategori');
		$this->load->model('M_home');
		$this->load->database();
	}
	public function index()
	{
		$oke['kamera']	= $this->M_kamera->list_kamera();
		$oke['content_page']	= "kamera/v_list_kamera";
		$this->load->view('body/dashboard', $oke);
	}
	public function tambah_data()
	{
		$oke['kategori'] = $this->M_kategori->list_kategori();
		$oke['kodeunik'] 		= $this->M_kamera->buat_kode();
		$oke['content_page'] = "kamera/v_tambah_kamera";
		$this->load->view('body/dashboard', $oke);
	}
	public function SimpanData()
	{
		$config['upload_path']		= './assets/admin/dist/img/kamera';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']			= 4048;
		$config['file_name']        = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload("photo");
		$data = $this->upload->data();
		$gambar = $data['file_name'];
		$data = array(
			'kode_kamera' 	=> $this->input->post('kode_kamera', true),
			'id_kategori' 	=> $this->input->post('id_kategori', true),
			'nama_kamera' 	=> $this->input->post('nama_kamera', true),
			'deskripsi' 	=> $this->input->post('deskripsi', true),
			'harga' 	=> $this->input->post('harga', true),
			'jml' 	=> $this->input->post('jml', true),
			'photo' 			=> $gambar,
		);

		$oke					= $this->M_kamera->TambahData($data); // variable content dan variable nama array harus sama
		$this->session->set_flashdata('oke', 'Ditambahkan');
		redirect('kamera');
	}

	public function DataHapus($id)
	{
		$row = $this->M_kamera->edit_data($id);
		$target_file = './assets/admin/dist/img/kamera/' . $row['photo'];
		unlink($target_file);
		$oke					= $this->M_kamera->delete($id); // variable content dan variable nama array harus sama
		$this->session->set_flashdata('oke', 'DiHapus');
		redirect('kamera');
	}

	public function edit_kamera($id)
	{
		$oke['kategori'] = $this->M_kategori->list_kategori();
		$oke['content_page']	= "kamera/v_edit_kamera";
		$oke['data_kamera']		= $this->M_kamera->edit_data($id);
		$this->load->view('body/dashboard', $oke);
	}

	public function download($gambar)
	{
		force_download('assets/admin/dist/img/kamera/' . $gambar, NULL);
	}

	public function simpan_edit_data($id)
	{
		$config['upload_path']	= './assets/admin/dist/img/kamera'; // kita akan upload gambar ke dalam folder assets ->images
		$config['allowed_types'] = 'gif|jpg|png|jpeg'; //format file yang bisa di masukan nantinya
		$config['max_size']		= 4048; //maks file yang bisa di upload ke dalam file kita 40000kb
		$config['file_name']        = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload("photo")) {
			$row = $this->M_kamera->edit_data($id);
			$data = $this->upload->data();
			$gambar = $data['file_name'];
			$target_file = './assets/admin/dist/img/kamera/' . $row['photo'];
			unlink($target_file);
		} else {
			$gambar = $this->input->post('gambar_lama');
		}
		$data = array(
			'kode_kamera' 	=> $this->input->post('kode_kamera', true),
			'id_kategori' 	=> $this->input->post('id_kategori', true),
			'nama_kamera' 	=> $this->input->post('nama_kamera', true),
			'deskripsi' 	=> $this->input->post('deskripsi', true),
			'harga' 	=> $this->input->post('harga', true),
			'jml' 	=> $this->input->post('jml', true),
			'photo' 			=> $gambar,
		);
		$this->M_kamera->submit_edit_kamera($data, $id); // variable content dan variable nama array harus sama 
		$this->session->set_flashdata('oke', 'Diupdate');
		redirect('kamera');
	}
}
