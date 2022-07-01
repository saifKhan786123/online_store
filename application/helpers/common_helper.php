<?php


function preview($data){
    echo "<pre>"; print_r($data); exit;
}


function check_admin_login(){
    $ci = &get_instance();
    if(!$ci->session->userdata('is_admin_logged_in')){
        $ci->session->set_flashdata('error', 'you have to log in first!');
        redirect(base_url('admin/login'));
    }
}


function notifications(){
    $ci = &get_instance();
    if($ci->session->flashdata('error')):
        echo "<div class='alert alert-danger'>".$ci->session->flashdata('error') ."</div>";
    endif;
    if($ci->session->flashdata('success')):
        echo "<div class='alert alert-success'>".$ci->session->flashdata('success') ."</div>";
    endif;
}