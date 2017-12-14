<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data["title"] = "Lista de Usuario";
    $this->load->view('admin/shared/layout');
    $this->load->view('admin/tabla/table_admin',$data);
  }

}
