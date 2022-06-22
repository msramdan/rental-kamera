<?php


class M_member extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function tampilmember(){
			$result=array();
			$this->db->select('*');
			$this->db->from('tbl_member');
			return $this->db->get()->result_array();
	}

	public function tampil_member_home(){
			$result=array();
			$this->db->select('*');
			$this->db->from('tbl_member');
			$this->db->order_by("anggota_id","desc");
			return $this->db->limit(4)->get()->result_array();
	}

	public function get_table($table_name)
   {
     $get_member = $this->db->get($table_name);
     return $get_member->result_array();
   }

     public function member_token($member_token){
		$this->db->insert('member_token',$member_token);
	}

    public function tambahdata($data){
		$this->db->insert('tbl_member',$data);
	}

	public function editdata($member_id) //untuk menagmbil data dari database sesuai parameter $id yang d klik
	{
		$this->db->from('tbl_member');
		$this->db->where('member_id',$member_id);
		return $this->db->get()->row_array();//row array menampilkan satu product
	}

	public function ubah_data($data,$member_id){
		$this->db->where('member_id',$member_id);
		$this->db->update ('tbl_member',$data);
	}

   	public function delete($membername)//hapus data berdasarkan parameter id yang di klik
	{
		$this->db->where('member_id',$membername);
		$this->db->delete('tbl_member');//delete dari table ms_tshirt
	}
	function get_tableid_edit($table_name,$where,$id)
   {
     $this->db->where($where,$id);
     $edit = $this->db->get($table_name);
     return $edit->row();
   }




}
