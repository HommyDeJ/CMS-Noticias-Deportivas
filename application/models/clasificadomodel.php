<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class clasificadomodel extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  public function num_clasificado(){

      $number=$this->db->query("SELECT count(*)  AS number FROM clasificados")->row()->number;
      return intval($number);
  }
  public function get_pagination($number_per_page){

      return $this->db->get('clasificados', $number_per_page, $this->uri->segment(3));

  }



}
