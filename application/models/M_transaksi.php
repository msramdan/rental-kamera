<?php


class M_transaksi extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function tampil_transaksi($id = null)
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('tbl_sewa');
		$this->db->join('users', 'users.anggota_id = tbl_sewa.users_id');
		$this->db->join('tbl_member', 'tbl_member.member_id = tbl_sewa.member_id');
		if ($id != null) {
			$this->db->where('tbl_sewa.member_id', $id);
		}
		$this->db->order_by("tbl_sewa.sewa_id", "desc");
		return $this->db->get()->result_array();
	}

	public function laporanPdf($tgl_awal, $tgl_akhir)
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('tbl_sewa');
		$this->db->join('users', 'users.anggota_id = tbl_sewa.users_id');
		$this->db->join('tbl_member', 'tbl_member.member_id = tbl_sewa.member_id');
		$this->db->where('tanggal_sewa >=', $tgl_awal);
		$this->db->where('tanggal_sewa <=', $tgl_akhir);
		$this->db->order_by("tbl_sewa.sewa_id", "desc");
		return $this->db->get()->result_array();
	}


	public function tampil_transaksi_home()
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('tbl_sewa');
		$this->db->join('users', 'users.anggota_id = tbl_sewa.anggota_id');
		$this->db->join('tbl_buku', 'tbl_buku.buku_id = tbl_sewa.buku_id');
		$this->db->order_by("id_pinjam", "desc");
		return $this->db->limit(4)->get()->result_array();
	}

	public function buat_kode()
	{
		$this->db->select('RIGHT(tbl_sewa.kode_sewa,4) as kode', FALSE);
		$this->db->order_by('sewa_id', 'DESC');
		// $this->db->where('vessel_id',$vessel_id);    
		$this->db->limit(1);
		$query = $this->db->get('tbl_sewa');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}
		$kodemax = str_pad($kode, 6, "SW000", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "" . $kodemax;    // hasilnya ODJ-9921-0001 dst.
		return $kodejadi;
	}

	public function delete($id) //hapus data berdasarkan parameter id yang di klik
	{
		$this->db->where('sewa_id', $id);
		$this->db->delete('tbl_sewa'); //delete dari table ms_tshirt
	}
}
