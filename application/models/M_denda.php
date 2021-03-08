<?php


class M_denda extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function list_denda(){
			$result=array();
			$this->db->select('*');
			$this->db->from('tbl_biaya_denda');
			return $this->db->get()->result_array();
	}

	public function edit_data($id) // untuk menmpilkan value di form edit sesuai parameter id
	{
		$this->db->from('tbl_biaya_denda');
		$this->db->where('id_biaya_denda',$id);
		return $this->db->get()->row_array();//row array menampilkan satu product
	}

	public function Submit_edit_denda($data,$id){ // function untuk simpan update denda
		$this->db->where('id_biaya_denda',$id);
		$this->db->update ('tbl_biaya_denda',$data);
	}


}