<?php


class M_home extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function count_camera()
	{
		$query = $this->db->get('tbl_kamera');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function count_kategori()
	{
		$query = $this->db->get('tbl_kategori');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	public function count_member()
	{
		$query = $this->db->get('tbl_member');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}



	public function count_pengguna()
	{
		$query = $this->db->get('users');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
}
