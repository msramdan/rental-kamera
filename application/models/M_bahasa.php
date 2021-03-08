<?php


class M_bahasa extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	// public function tampilbahasa(){
	// 	return $this->db->get('bahasa')->result_array();
	// }
	public function tampilbahasa(){
		$result=array();
		$this->db->select('*');
		$this->db->from('bahasa');
		return $this->db->get()->result_array();
	}

	public function tambahbahasa($data){
		$this->db->insert('bahasa',$data);
	}

	public function delete($id)//hapus data berdasarkan parameter id yang di klik
	{
		$this->db->where('bahasa_id',$id);
		$this->db->delete('bahasa');//delete dari table ms_tshirt
	}
	public function delete_kamus($kamus_id)//hapus data berdasarkan parameter id yang di klik
	{
		$this->db->where('kamus_id',$kamus_id);
		$this->db->delete('kamus');//delete dari table ms_tshirt
	}

	public function editdata($id) // untuk menmpilkan value di form edit sesuai parameter id
	{
		$this->db->from('bahasa');
		$this->db->where('bahasa_id',$id);
		return $this->db->get()->row_array();//row array menampilkan satu product
	}

	public function edit_data_kamus($kamus_id) //untuk menampilkan value di form edit sesuai parameter kamus_id
	{
		$this->db->from('kamus');
		$this->db->where('kamus_id',$kamus_id);
		return $this->db->get()->row_array();//row array menampilkan satu product
	}

	public function Submit_edit_bahasa($data,$id){ // function untuk simpan update bahasa
		$this->db->where('bahasa_id',$id);
		$this->db->update ('bahasa',$data);
	}

	public function Submit_edit_kamus($data,$kamus_id){ // function untuk simpan update bahasa
		$this->db->where('kamus_id',$kamus_id);
		$this->db->update ('kamus',$data);
	}

	public function tampil_list_kamus(){ // function untuk menampilkan list dari table kamus
		$result=array();
		$this->db->select('*');
		$this->db->from('kamus');
		return $this->db->get()->result_array();
	}

	public function tambahkamus2($data){ // function untuk menambahkan kamus
		$this->db->insert('kamus',$data);
	}

	public function tambah_kamus_batch($data){
    return $this->db->insert_batch('kamus', $data);
	}

}