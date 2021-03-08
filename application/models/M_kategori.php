<?php


class M_kategori extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function list_kategori(){
			$result=array();
			$this->db->select('*');
			$this->db->from('tbl_kategori');
			return $this->db->get()->result_array();
	}

	public function TambahData($data){
		$this->db->insert('tbl_kategori',$data);
	}

	public function delete($id)//hapus data berdasarkan parameter id yang di klik
	{
		$this->db->where('id_kategori',$id);
		$this->db->delete('tbl_kategori');//delete dari table ms_tshirt
	}

	public function edit_data($id) // untuk menmpilkan value di form edit sesuai parameter id
	{
		$this->db->from('tbl_kategori');
		$this->db->where('id_kategori',$id);
		return $this->db->get()->row_array();//row array menampilkan satu product
	}

	public function Submit_edit_kategori($data,$id){ // function untuk simpan update kategori
		$this->db->where('id_kategori',$id);
		$this->db->update ('tbl_kategori',$data);
	}


}