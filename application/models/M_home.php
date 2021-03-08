<?php


class M_home extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

public function count_buku()
	{   
	    $query = $this->db->get('tbl_buku');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

public function count_pengguna()
	{   
	    $query = $this->db->get('users');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}
	public function count_jml_buku()
	{   
	    $this->db->select_sum('jml');
	    $query = $this->db->get('tbl_buku');
	    if($query->num_rows()>0)
	    {
	      return $query->row()->jml;
	    }
	    else
	    {
	      return 0;
	    }
	}
	public function count_dipinjam()
	{   
		$status = 'Dipinjam';
	    $query = $this->db->query("SELECT * FROM tbl_pinjam WHERE status = 'Dipinjam'");
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}



}