<?php


class M_transaksi extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function tampil_transaksi(){
			$result=array();
			$this->db->select('*');
			$this->db->from('tbl_pinjam');
			$this->db->join('users', 'users.anggota_id = tbl_pinjam.anggota_id');
			$this->db->join('tbl_buku', 'tbl_buku.buku_id = tbl_pinjam.buku_id');
			// $this->db->join('tbl_denda', 'tbl_denda.id_pinjam = tbl_pinjam.id_pinjam', 'left');
			$this->db->order_by("tbl_pinjam.id_pinjam","desc");
			return $this->db->get()->result_array();
	}
	public function tampil_transaksi_home(){
			$result=array();
			$this->db->select('*');
			$this->db->from('tbl_pinjam');
			$this->db->join('users', 'users.anggota_id = tbl_pinjam.anggota_id');
			$this->db->join('tbl_buku', 'tbl_buku.buku_id = tbl_pinjam.buku_id');
			$this->db->order_by("id_pinjam","desc");
			return $this->db->limit(4)->get()->result_array();
	}

	public function buat_kode()   {
		$this->db->select('RIGHT(tbl_pinjam.pinjam_id,4) as kode', FALSE);
		$this->db->order_by('pinjam_id','DESC');
		// $this->db->where('vessel_id',$vessel_id);    
		$this->db->limit(1);    
		$query = $this->db->get('tbl_pinjam');      //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		$data = $query->row();      
		$kode = intval($data->kode) + 1;    
		}
		else {      
		   //jika kode belum ada      
		$kode = 1;    
		}
		$kodemax = str_pad($kode, 6, "PJ000", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi; 
	}

	 function delete_table($table_name,$where,$id)
   {
     $this->db->where($where,$id);
     $hapus = $this->db->delete($table_name);
     return $hapus;
   }

   public function edit_data($id) // untuk menmpilkan value di form edit sesuai parameter id
	{
		$this->db->from('tbl_pinjam');
		$this->db->join('users', 'users.anggota_id = tbl_pinjam.anggota_id');
		$this->db->join('tbl_buku', 'tbl_buku.buku_id = tbl_pinjam.buku_id');
		$this->db->where('id_pinjam',$id);
		return $this->db->get()->row_array();//row array menampilkan satu product
	}

	public function rp($angka){
			$hasil_rupiah = "Rp" . number_format($angka,0,',','.'). ',-';
			return $hasil_rupiah;
	}

	public function submit_edit_transaksi($data,$id){ // function untuk simpan update kategori
		$this->db->where('id_pinjam',$id);
		$this->db->update ('tbl_pinjam',$data);
	}




}

