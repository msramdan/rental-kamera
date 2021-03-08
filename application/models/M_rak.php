<?php


class M_rak extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function list_rak(){
			$result=array();
			$this->db->select('*');
			$this->db->from('tbl_rak');
			return $this->db->get()->result_array();
	}

	public function TambahData($data){
		$this->db->insert('tbl_rak',$data);
	}

	public function delete($id)//hapus data berdasarkan parameter id yang di klik
	{
		$this->db->where('id_rak',$id);
		$this->db->delete('tbl_rak');//delete dari table ms_tshirt
	}

	public function edit_data($id) // untuk menmpilkan value di form edit sesuai parameter id
	{
		$this->db->from('tbl_rak');
		$this->db->where('id_rak',$id);
		return $this->db->get()->row_array();//row array menampilkan satu product
	}

	public function Submit_edit_rak($data,$id){ // function untuk simpan update rak
		$this->db->where('id_rak',$id);
		$this->db->update ('tbl_rak',$data);
	}

}