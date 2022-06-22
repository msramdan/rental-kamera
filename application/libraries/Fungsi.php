<?php
class Fungsi
{
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
	}

	public function user_login()
	{
		$this->ci->load->model('M_web');
		$user_id = $this->ci->session->userdata('webMemberId');
		$user_data = $this->ci->M_web->getById($user_id)->row();
		
		return $user_data;
	}

	
}
