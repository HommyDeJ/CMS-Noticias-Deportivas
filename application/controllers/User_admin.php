<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('admin/shared/layout');
    $this->load->view('admin/user/user_admin');
  }

}