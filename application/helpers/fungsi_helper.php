<?php
function check_already_login(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('username');
    if ($user_session){
        if($ci->session->userdata('is_aktive')==1){
            redirect('home');
        }else{
            
        }
        
    }
}

function check_not_login(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('username');
    if (!$user_session){
        redirect('login');
    }
}
    