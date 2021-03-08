<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Login extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('M_login');
      $this->load->model('M_user');
		}
	public function index()
	{
      check_already_login();
  	 $data['bahasa']=$this->M_login->ambilbahasa();
  		$this->load->view('login/login',$data);
	}

  public function register(){
    $this->load->view('login/register');
  }
  public function lupa_password(){
    $this->form_validation->set_rules('email','Email', 'required');
    if($this->form_validation->run() == false){
      $this->load->view('login/v_lupa_password');
    }else{
      $email = $this->input->post('email');
      $user = $this->db->get_where('users',['email' =>$email,'is_aktive' =>1])->row_array();

      if ($user) {
          $token = base64_encode(openssl_random_pseudo_bytes(32));
        //   $token = n2hex(openssl_random_pseudo_bytes(32));
        // $token = base64_encode(random_bytes(32));
        $user_token =[
            'email' =>$this->input->post('email',true),
            'token' =>$token,
            'create_date' =>time()
          ];
          $oke         =$this->M_user->user_token($user_token);
          $this->_send_email($token,'forgot');
          echo "<script>
        alert('Silahkan cek email untuk reset password');
        window.location='".site_url('login/lupa_password')."'</script>";
      }else{
        echo "<script>
        alert('Email tidak terdaftar atau user belum aktive');
        window.location='".site_url('login/lupa_password')."'</script>";
      }
    }  
  }

  public function simpan_user(){
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[30]|is_unique[users.username]');
    $this->form_validation->set_rules('email', 'Email', 'is_unique[users.email]');
    $this->form_validation->set_message('is_unique', '%s Ini sudah terpakai, Silahkan ganti');
     if ($this->form_validation->run() == FALSE)
        {
          $oke['departemen'] = $this->M_departemen->tampil_departemen();
          $this->load->view('login/register',$oke);
        }else{
    $config['upload_path']    = './assets/admin/dist/img'; 
    $config['allowed_types']  = 'gif|jpg|png|jpeg'; 
    $config['max_size']     = 2048;
    $config['file_name']        = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10); 
    $this->load->library('upload',$config);
    $this->upload->initialize($config);
    $this->upload->do_upload("img_user");
    $data = $this->upload->data();
    $gambar =$data['file_name'];
    $data = array(
      'username'      => $this->input->post('username',true),
      'password'      => md5($this->input->post('password',true)),
      'nama'        => $this->input->post('nama',true),
      'email'       => $this->input->post('email',true),
      'telepon'     => $this->input->post('telepon',true),
      'level'       => 'U',
      'is_aktive'       => 2,
      'img_user'      => $gambar,
    );
        // $token = base64_encode(random_bytes(32));
        $token = base64_encode(openssl_random_pseudo_bytes(32));
          $user_token =[
            'email' =>$this->input->post('email',true),
            'token' =>$token,
            'create_date' =>time()
          ];

          $oke         =$this->M_user->tambahdata($data);
          $oke         =$this->M_user->user_token($user_token);
          $this->_send_email($token,'verify'); 
          echo "<script>
        alert('Username berhasil dibuat, Silahkan cek Email Masuk untuk Aktivasi Akun');
        window.location='".site_url('Login')."'</script>";
          }
  }
  
    private function _send_email($token, $type){
    $config = [
      'protocol'   =>'smtp',
      'smtp_host'  =>'ssl://smtp.googlemail.com',
      'smtp_user'  =>'saefulramdan867@gmail.com',
      'smtp_pass'  =>'ramdan9090',
      'smtp_port'  => 465,
      'mailtype'   =>'html',
      'charset'    =>'iso-8859-1',
      'newline'    =>"\r\n"

    ];

    $this->load->library('email',$config);
    $this->email->from('saefulramdan136@gmail.com','Admin web Ticketing');
    $this->email->to($this->input->post('email'));

    if($type =='verify'){
      $this->email->subject('Aktivasi Akun');
      $this->email->message('Click this link to verify your account : <a href="' . base_url() . 'login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '&username='. $this->input->post('username') . '">Activate</a>');
    }else if ($type == 'forgot'){
      $this->email->subject('Reset Password');
      $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'login/reset_password?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');

    }
    
    if($this->email->send()){
      return true;
    }else{
      echo $this->email->print_debugger();
      die;
    }

  }
  
  public function verify(){
    $email = $this->input->get('email');
    $token = $this->input->get('token');
    $username = $this->input->get('username');

    $user = $this->db->get_where('users', ['email' =>$email])->row_array(); // untuk cek ada user dgn email ini
    if($user){
      $user_token = $this->db->get_where('user_token', ['token' =>$token])->row_array();
      if ($user_token) {
        if (time() - $user_token['create_date'] < (60 * 60 * 24)) {
          $this->db->set('is_aktive', 1);
          $this->db->where('email',$email);
          $this->db->update('users');
          $this->db->delete('user_token',['email' =>$email]);
           echo "<script>
        alert('Akun berhasil di Aktivasi, Silahkan Login');
        window.location='".site_url('Login')."'</script>";   
        }else{
        $row = $this->M_user->editdata($username);
        $target_file = './assets/admin/dist/img/'.$row['img_user'];
        unlink($target_file);
        $this->db->delete('users', ['email' => $email]);
        $this->db->delete('user_token', ['email' => $email]);
        echo "<script>
        alert('Aktivasi akun gagal, Token Kadaluarsa');
        window.location='".site_url('Login')."'</script>";
        }

      }else{
        echo "<script>
        alert('Aktivasi akun gagal, Token Invalid');
        window.location='".site_url('Login')."'</script>";
      }

    }else{
      echo "<script>
        alert('Aktivasi akun gagal, Akun email Salah');
        window.location='".site_url('Login')."'</script>";
    }
  }

  public function reset_password(){
    $email = $this->input->get('email');
    $token = $this->input->get('token');
    $user = $this->db->get_where('users', ['email' =>$email])->row_array();
    if($user){
      $user_token = $this->db->get_where('user_token', ['token' =>$token])->row_array();
      if ($user_token){
        if (time() - $user_token['create_date'] < (60 * 60 * 24)){
          $this->session->set_userdata('reset_email', $email);
          $this->rubah_password();
        }else{
        $this->db->delete('user_token', ['email' => $email]);
        echo "<script>
        alert('Reset password gagal, Token Kadaluarsa');
        window.location='".site_url('Login')."'</script>";
        }
      }else{
        echo "<script>
        alert('Reset Password gagal, Token salah');
        window.location='".site_url('Login')."'</script>";
      }


    }else{
      echo "<script>
        alert('Reset Password gagal, Email salah');
        window.location='".site_url('Login')."'</script>";
    }


  }

	public function loginsubmit(){
	$username = $this->input->post('username');
  $user= $this->M_user->get($username);

    $this->form_validation->set_rules('username', 'Username','required',array('required'=>'Silahkan Masukan Username Anda'));
    $this->form_validation->set_rules('password', 'Password','required',array('required'=>'Silahkan Masukan Password Anda')); 
    if($this->form_validation->run()==false){
    $this->load->view('login/login');

    }else{
      if($this->M_login->checklogin($_POST['username'], $_POST['password'])>0){
        $this->session->set_userdata('is_aktive', $user->is_aktive);
        if ($this->session->userdata('is_aktive') == 1){
        $this->session->set_userdata('username', $_POST['username']);
        $this->session->set_userdata('password', $_POST['password']);
        $this->session->set_userdata('bahasa', $_POST['bahasa']);
        $this->session->set_userdata('nama', $user->nama);
        $this->session->set_userdata('level', $user->level);
        $this->session->set_userdata('img_user', $user->img_user);
        $this->M_login->addHistory($this->session->userdata('nama'), $this->session->userdata('nama_karyawan').' Telah melakukan login', date('d/m/Y H:i:s'));
        redirect('home');
      }else{
       echo "<script>
        alert('Hubungi Admin untuk aktivasi akun');
        window.location='".site_url('Login')."'</script>";
          }
      }else{
        echo "<script>
				alert('Login Gagal, Username atau password salah');
				window.location='".site_url('Login')."'</script>";
      }
    }
  }

	public function logout(){
    $this->session->sess_destroy(); 
    redirect('Login'); 
}
public function rubah_password(){
  if(!$this->session->userdata('reset_email')){
    redirect('login');
  }
  $this->form_validation->set_rules('password','password', 'required');
  $this->form_validation->set_rules('passcon','passcon', 'required');
  if($this->form_validation->run() == false){
      $this->load->view('login/v_rubah_password');
  }else{
    $password = md5($this->input->post('password',true));
    $email    = $this->session->userdata('reset_email');
    $this->db->set('password',$password);
    $this->db->where('email', $email);
    $this->db->update('users');
    $this->db->delete('user_token',['email' =>$email]);
    $this->session->unset_userdata('reset_email');
    echo "<script>
        alert('Password berhasil di rubah, Silahkan Login');
        window.location='".site_url('Login')."'</script>";
  }
}
}
