<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class History extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			check_not_login();
			// check_admin();
			$this->load->model('M_history');
			$this->load->database();
		}
	public function index()
	{	
		$oke['history'] = $this->M_history->list_history();
		$oke['content_page']="history/v_history";
		$this->load->view('body/dashboard',$oke);
	}

}
