<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class User extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model('M_user');
		}
	public function user() {
		$oke['content_page']="user/listuser";
		$oke['user']=$this->M_user->tampiluser();
		$this->load->view('body/dashboard',$oke);
	}

	public function adddata(){
		$oke['kodeunik'] 		= $this->M_user->buat_kode();
		$oke['content_page']="user/tambahuser";
		$this->load->view('body/dashboard',$oke);
	}

	public function edituser($username){

		$oke['content_page']="user/edituser";
		$oke['data_user'] = $this->M_user->editdata($username);
		$this->load->view('body/dashboard',$oke);
	}
	public function editprofile($username){

		$oke['content_page']="user/editprofile";
		$oke['data_user'] = $this->M_user->editdata($username);
		$this->load->view('body/dashboard',$oke);

	}
	public function cetak_kartu($username){
		$oke['user'] = $this->M_user->editdata($username);
		$this->load->view('user/cetak_kartu',$oke);

	}

	public function datahapus($username){
		$row = $this->M_user->editdata($username);
        $target_file = './assets/admin/dist/img/'.$row['img_user'];
        unlink($target_file);
		$oke=$this->M_user->delete($username); 
		$this->load->view('body/dashboard',$oke);
		redirect('user/user');

	}
	public function simpan_user(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[30]|is_unique[users.username]');
        $this->form_validation->set_message('is_unique', '%s Ini sudah terpakai, Silahkan ganti');
		
		 if ($this->form_validation->run() == FALSE)
           {
           	$oke1['fakultas'] = $this->M_type->tampil_fakultas();
			$oke1['program_study'] = $this->M_type->tampil_program_study();
			$oke1['jabatan_dosen'] = $this->M_type->tampil_jabatan_dosen();
           	$oke1['jabatan'] = $this->M_jabatan->tampil_jabatan();
           	$oke1['departemen'] = $this->M_departemen->tampil_departemen();
			$oke1['content_page']="user/tambahuser";
			$this->load->view('body/dashboard',$oke1);
         }else{
        $config['upload_path']		= './assets/admin/dist/img'; 
		$config['allowed_types']	= 'gif|jpg|png|jpeg'; 
		$config['max_size']			= 2048; 
		$config['file_name']        = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10); 
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		$this->upload->do_upload("img_user");
		$data = $this->upload->data();
		$gambar =$data['file_name'];
		$data = array(
			'username' 			=> $this->input->post('username',true),
			'password' 			=> md5($this->input->post('password',true)),
			'nama' 				=> $this->input->post('user',true),
			'email' 			=> $this->input->post('email',true),
			'img_user' 			=> $gambar,
			'alamat'			=> $this->input->post('alamat',true),
			'kota' 				=> $this->input->post('kota',true),
			'provinsi'			=> $this->input->post('provinsi',true),
			'kode_pos' 			=> $this->input->post('kodepos',true),
			'telepon'			=> $this->input->post('telepon',true),
			'level' 			=> $this->input->post('level',true),
			'is_aktive' 		=> $this->input->post('is_aktive',true),
			
		);
	        $oke['content_page'] ="user/listuser";
			$oke				 =$this->M_user->tambahdata($data);
			$this->load->view('body/dashboard',$oke);
			$this->session->set_flashdata('oke','Ditambahkan');
			redirect('user/user');
          }
	}

	public function submit_edit_user($username){
		$config['upload_path']	= './assets/admin/dist/img'; // kita akan upload gambar ke dalam folder assets ->images
		$config['allowed_types']= 'gif|jpg|png|jpeg'; //format file yang bisa di masukan nantinya
		$config['max_size']		= 2048; //maks file yang bisa di upload ke dalam file kita 40000kb
		$config['file_name']        = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10); 
		$this->load->library('upload',$config);
        $this->upload->initialize($config);
		 if ($this->upload->do_upload("img_user")) {
            $row = $this->M_user->editdata($username);
            $data = $this->upload->data();
            $gambar =$data['file_name'];
            $target_file = './assets/admin/dist/img/'.$row['img_user'];
            unlink($target_file);
            }else{
            $gambar = $this->input->post('gambar_lama');
        }

		$data = array(
			'username' 			=> $this->input->post('username',true),
			'nama' 				=> $this->input->post('user',true),
			'email' 			=> $this->input->post('email',true),
			'alamat'			=> $this->input->post('alamat',true),
			'kota' 				=> $this->input->post('kota',true),
			'provinsi'			=> $this->input->post('provinsi',true),
			'kode_pos' 			=> $this->input->post('kodepos',true),
			'telepon'			=> $this->input->post('telepon',true),
			'level' 			=> $this->input->post('level',true),
			'img_user' 			=> $gambar,
			'is_aktive' 		=> $this->input->post('is_aktive',true),
		);
		$oke					=$this->M_user->ubah_data($data,$username);
		$this->session->set_flashdata('oke','Dirubah'); 
		redirect('user/user');
	}

	public function submit_edit($username){
		$config['upload_path']	= './assets/admin/dist/img'; // kita akan upload gambar ke dalam folder assets ->images
		$config['allowed_types']= 'gif|jpg|png'; //format file yang bisa di masukan nantinya
		$config['max_size']		= 2048; //maks file yang bisa di upload ke dalam file kita 40000kb
		$config['file_name']        = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10); 
		$this->load->library('upload',$config);
        $this->upload->initialize($config);
		 if ($this->upload->do_upload("img_user")) {
            $row = $this->M_user->editdata($username);
            $data = $this->upload->data();
            $gambar =$data['file_name'];
            $target_file = './assets/admin/dist/img/'.$row['img_user'];
            unlink($target_file);
            }else{
            $gambar = $this->input->post('gambar_lama');
        }
		$data = array(
			'username' 			=> $this->input->post('username',true),
			'nama' 				=> $this->input->post('user',true),
			'email' 			=> $this->input->post('email',true),
			'alamat'			=> $this->input->post('alamat',true),
			'kota' 				=> $this->input->post('kota',true),
			'provinsi'			=> $this->input->post('provinsi',true),
			'kode_pos' 			=> $this->input->post('kodepos',true),
			'telepon'			=> $this->input->post('telepon',true),
			'level' 			=> $this->input->post('level',true),
			'img_user' 			=> $gambar,
			'is_aktive' 		=> 1,
		);
		$oke['content_page']	="user/listuser";
		$oke					=$this->M_user->ubah_data($data,$username);
		$this->load->view('body/dashboard',$oke);
		$this->session->set_flashdata('oke','Dirubah'); 
		redirect('home');
	}



	public function submiteditpassword($username){
		$passwordlama =$this->input->post('lama'); // poSt dari inputan password lama
		if ($this->session->userdata('level')=="U") {
			if ($this->session->userdata('password')==$passwordlama) { // cek kondisi jika password lama sama degn password yg di database
		$data = array(
			//yang kiri sesuai filed table sedangkan yang kanan sesuai dari form inputan//
			'password' 			=> md5($this->input->post('password',true)),
		);
		$oke['content_page']	="user/listuser"; //supaya content dari halaman di tampilkan tambahkan kondisi di index lane 207
		$oke					=$this->M_user->ubah_data($data,$username); // variable content dan variable nama array harus sama 
		$this->load->view('body/dashboard',$oke);
		$this->session->set_flashdata('oke','Dirubah'); // kemudian tambhakan clas di button
		redirect('login/logout');
		}else{ //jika password lama beda dengan yang ada di database akan di arahkan langsung ke HOMe
			echo "<script>
				alert('Password Lama Salah');
				window.location='".site_url('Home')."'</script>";
		}	
		}else{
		$oke['data_user'] 		= $this->M_user->editdata($username);
		$data = array(
			'password' 			=> md5($this->input->post('password',true)), //yang kiri sesuai filed table sedangkan yang kanan sesuai dari form inputan//
		);
		$oke['content_page']	="user/listuser"; //supaya content dari halaman di tampilkan tambahkan kondisi di index lane 207
		$oke					=$this->M_user->ubah_data($data,$username); // variable content dan variable nama array harus sama 
		$this->load->view('body/dashboard',$oke);
		$this->session->set_flashdata('oke','Dirubah');
		if ($this->session->userdata('username')==$username) { //jika username yang di edit sama dgn session login dia akan logout
			redirect('login/logout');
		}else{ //sebaliknya jika beda maka akan tampilkan Home list user
			redirect('user/user');
		}

		}
	}
	public function submit_edit_profile($username){
		$passwordlama =$this->input->post('lama'); // poSt dari inputan password lama
		if ($this->session->userdata('level')=="U") {
			if ($this->session->userdata('password')==$passwordlama) { // cek kondisi jika password lama sama degn password yg di database
		$data = array(
			//yang kiri sesuai filed table sedangkan yang kanan sesuai dari form inputan//
			'password' 			=> md5($this->input->post('password',true)),
		);
		$oke['content_page']	="user/listuser"; //supaya content dari halaman di tampilkan tambahkan kondisi di index lane 207
		$oke					=$this->M_user->ubah_data($data,$username); // variable content dan variable nama array harus sama 
		$this->load->view('body/dashboard',$oke);
		$this->session->set_flashdata('oke','Dirubah'); // kemudian tambhakan clas di button
		redirect('login/logout');
		}else{ //jika password lama beda dengan yang ada di database akan di arahkan langsung ke HOMe
			echo "<script>
				alert('Password Lama Salah');
				window.location='".site_url('Home')."'</script>";
		}	
		}else{
		$oke['data_user'] 		= $this->M_user->editdata($username);
		$data = array(
			'password' 			=> md5($this->input->post('password',true)), //yang kiri sesuai filed table sedangkan yang kanan sesuai dari form inputan//
		);
		$oke['content_page']	="user/listuser"; //supaya content dari halaman di tampilkan tambahkan kondisi di index lane 207
		$oke					=$this->M_user->ubah_data($data,$username); // variable content dan variable nama array harus sama 
		$this->load->view('body/dashboard',$oke);
		$this->session->set_flashdata('oke','Dirubah');
		redirect('login/logout');

		}
	}
	  public function download($gambar){
        force_download('assets/admin/dist/img/'.$gambar,NULL);
    }

}
