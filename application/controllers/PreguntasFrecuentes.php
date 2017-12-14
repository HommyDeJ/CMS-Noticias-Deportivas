<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PreguntasFrecuentes extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('shared/header');
    $this->load->view('preguntasFrecuentes/preguntasFrecuentes');
    $this->load->view('shared/footer');
    $this->load->view('modals/vcedulamodal.php');
    $this->load->view('modals/isesionmodal.php');
  }

}
