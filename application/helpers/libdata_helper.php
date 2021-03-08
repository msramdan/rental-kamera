<?php

function getteks($kamus_id){
	$CI = &get_instance();
	$CI->load->database();

		if (isset($_SESSION['bahasa'])) {
		if ($_SESSION['bahasa']==1) {
			$bahasa_id=1;
		}else{
			$bahasa_id=2;
		}
	    $query = $CI->db->query("select teks from kamus WHERE bahasa_id=$bahasa_id and kode_kamus=$kamus_id");
		if ($query->num_rows()>0) {
			$row = $query->row();
			return $row->teks;
		}
	}
	}
	

	