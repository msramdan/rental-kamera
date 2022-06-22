<?php


class M_web extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get($username)
	{
		$this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
		$result = $this->db->get('tbl_member')->row(); // Untuk mengeksekusi dan mengambil data hasil query
		return $result;
	}

	public function getById($id)
	{
		$this->db->select('*');
        $this->db->from('tbl_member');
        if ($id !=null){
            $this->db->where('member_id', $id);
        }
        $query = $this->db->get();
        return $query;
	}

	public function checklogin($username, $password)
 	{
 		$this->db->from('tbl_member');
 		$this->db->where('username',$username);
 		$this->db->where('password',md5($password));
 		return $this->db->get()->num_rows();
 	}

	 public function tambahdata($data){
		$this->db->insert('tbl_member',$data);
	}
}
