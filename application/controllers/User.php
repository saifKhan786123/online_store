<?php

class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }


    public function index(){
        $this->load->view('user/indexpage');
    }


    public function home(){
       $this->load->view('user/home');
    }

}