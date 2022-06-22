<?php


class M_kamera extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function list_kamera($id =null){
			$result=array();
			$this->db->select('*');
			$this->db->from('tbl_kamera');
			$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_kamera.id_kategori');
			if ($id != null) {
				$this->db->where('tbl_kamera.id_kategori', $id);
			}
			$this->db->order_by("id_kamera","desc");
			return $this->db->get()->result_array();
	}

	public function byName($nama_kamera =null){
		$result=array();
		$this->db->select('*');
		$this->db->from('tbl_kamera');
		$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_kamera.id_kategori');
		if ($nama_kamera != null) {
			$this->db->where('tbl_kamera.nama_kamera', $nama_kamera);
		}
		$this->db->order_by("id_kamera","desc");
		return $this->db->get()->result_array();
}
	public function list_kamera_home(){
			$result=array();
			$this->db->select('*');
			$this->db->from('tbl_kamera');
			$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_kamera.id_kategori');
			$this->db->order_by("id_kamera","desc");
			return $this->db->limit(4)->get()->result_array();
	}

	public function TambahData($data){
		$this->db->insert('tbl_kamera',$data);
	}

	public function delete($id)//hapus data berdasarkan parameter id yang di klik
	{
		$this->db->where('id_kamera',$id);
		$this->db->delete('tbl_kamera');//delete dari table ms_tshirt
	}

	public function edit_data($id) // untuk menmpilkan value di form edit sesuai parameter id
	{
		$this->db->from('tbl_kamera');
		$this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_kamera.id_kategori');
		$this->db->where('id_kamera',$id);
		return $this->db->get()->row_array();//row array menampilkan satu product
	}

	public function submit_edit_kamera($data,$id){ // function untuk simpan update kategori
		$this->db->where('id_kamera',$id);
		$this->db->update ('tbl_kamera',$data);
	}


	public function buat_kode()   {
		$this->db->select('RIGHT(tbl_kamera.kode_kamera,4) as kode', FALSE);
		$this->db->order_by('kode_kamera','DESC');
		// $this->db->where('vessel_id',$vessel_id);    
		$this->db->limit(1);    
		$query = $this->db->get('tbl_kamera');      //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		$data = $query->row();      
		$kode = intval($data->kode) + 1;    
		}
		else {      
		   //jika kode belum ada      
		$kode = 1;    
		}
		$kodemax = str_pad($kode, 6, "KA000", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi; 
	}

	function cari($kode){
        $this->db->like('nama_kamera', $kode , 'both');
        return $this->db->get('tbl_kamera')->result();
    }

	// function search_blog($title){
    //     $this->db->like('blog_title', $title , 'both');
    //     $this->db->order_by('blog_title', 'ASC');
    //     $this->db->limit(10);
    //     return $this->db->get('blog')->result();
    // }

}
