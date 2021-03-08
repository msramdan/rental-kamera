<?php


class M_buku extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function list_buku(){
			$result=array();
			$this->db->select('*');
			$this->db->from('tbl_buku');
			$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori');
			$this->db->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak');
			$this->db->order_by("id_buku","desc");
			return $this->db->get()->result_array();
	}
	public function list_buku_home(){
			$result=array();
			$this->db->select('*');
			$this->db->from('tbl_buku');
			$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori');
			$this->db->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak');
			$this->db->order_by("id_buku","desc");
			return $this->db->limit(4)->get()->result_array();
	}

	public function TambahData($data){
		$this->db->insert('tbl_buku',$data);
	}

	public function delete($id)//hapus data berdasarkan parameter id yang di klik
	{
		$this->db->where('id_buku',$id);
		$this->db->delete('tbl_buku');//delete dari table ms_tshirt
	}

	public function edit_data($id) // untuk menmpilkan value di form edit sesuai parameter id
	{
		$this->db->from('tbl_buku');
		$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori');
		$this->db->join('tbl_rak','tbl_rak.id_rak = tbl_buku.id_rak');
		$this->db->where('id_buku',$id);
		return $this->db->get()->row_array();//row array menampilkan satu product
	}

	public function submit_edit_buku($data,$id){ // function untuk simpan update kategori
		$this->db->where('id_buku',$id);
		$this->db->update ('tbl_buku',$data);
	}


	public function buat_kode()   {
		$this->db->select('RIGHT(tbl_buku.buku_id,4) as kode', FALSE);
		$this->db->order_by('buku_id','DESC');
		// $this->db->where('vessel_id',$vessel_id);    
		$this->db->limit(1);    
		$query = $this->db->get('tbl_buku');      //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		$data = $query->row();      
		$kode = intval($data->kode) + 1;    
		}
		else {      
		   //jika kode belum ada      
		$kode = 1;    
		}
		$kodemax = str_pad($kode, 6, "BK000", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi; 
	}

}