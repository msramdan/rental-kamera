<?php


class M_user extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function tampiluser(){
			$result=array();
			$this->db->select('*');
			$this->db->from('users');
			return $this->db->get()->result_array();
	}

	public function tampil_user_home(){
			$result=array();
			$this->db->select('*');
			$this->db->from('users');
			$this->db->order_by("anggota_id","desc");
			return $this->db->limit(4)->get()->result_array();
	}

	public function get_table($table_name)
   {
     $get_user = $this->db->get($table_name);
     return $get_user->result_array();
   }

	public function get($username){
        $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('users')->row(); // Untuk mengeksekusi dan mengambil data hasil query
        return $result;
    }
     public function user_token($user_token){
		$this->db->insert('user_token',$user_token);
	}

    public function tambahdata($data){
		$this->db->insert('users',$data);
	}

	public function editdata($username) //untuk menagmbil data dari database sesuai parameter $id yang d klik
	{
		$this->db->from('users');
		$this->db->where('username',$username);
		return $this->db->get()->row_array();//row array menampilkan satu product
	}

	public function ubah_data($data,$username){
		$this->db->where('username',$username);
		$this->db->update ('users',$data);
	}

   	public function delete($username)//hapus data berdasarkan parameter id yang di klik
	{
		$this->db->where('username',$username);
		$this->db->delete('users');//delete dari table ms_tshirt
	}
	function get_tableid_edit($table_name,$where,$id)
   {
     $this->db->where($where,$id);
     $edit = $this->db->get($table_name);
     return $edit->row();
   }

   public function buat_kode()   {
		$this->db->select('RIGHT(users.anggota_id,4) as kode', FALSE);
		$this->db->order_by('anggota_id','DESC');
		// $this->db->where('vessel_id',$vessel_id);    
		$this->db->limit(1);    
		$query = $this->db->get('users');      //cek dulu apakah ada sudah ada kode di tabel.    
		if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		$data = $query->row();      
		$kode = intval($data->kode) + 1;    
		}
		else {      
		   //jika kode belum ada      
		$kode = 1;    
		}
		$kodemax = str_pad($kode, 6, "AG000", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi; 
	}



}