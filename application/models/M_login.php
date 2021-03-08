<?php


class M_login extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
 	public function checklogin($username, $password)
 	{
 		$this->db->from('users');
 		$this->db->where('username',$username);
 		$this->db->where('password',md5($password));
 		return $this->db->get()->num_rows();

 		
 	}
 	public function ambilbahasa(){
		return $this->db->get('bahasa')->result_array(); //untuk manggil table bahasa dengan menampilkan semua data
	}

	 public function addHistory($name, $info, $tanggal) {
        return $this->db->insert('history_karyawan', array('nama' => $name, 'info' => $info, 'tanggal' => $tanggal));
    }

}