<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GaleriaModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function num_galeria(){

      $number=$this->db->query("SELECT count(*)  AS number FROM galeria")->row()->number;
      return intval($number);
  }
  public function get_pagination($number_per_page){

      return $this->db->get('galeria', $number_per_page, $this->uri->segment(3));

  }

}
