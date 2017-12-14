<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventosModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function num_eventos(){

      $number=$this->db->query("SELECT count(*)  AS number FROM eventos")->row()->number;
      return intval($number);
  }
  public function get_pagination($number_per_page){

      return $this->db->get('eventos', $number_per_page, $this->uri->segment(3));

  }

}
