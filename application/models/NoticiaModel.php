<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NoticiaModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  public function num_noticia(){

      $number=$this->db->query("SELECT count(*)  AS number FROM noticia")->row()->number;
      return intval($number);
  }
  public function get_pagination($number_per_page){

      return $this->db->get('noticia', $number_per_page, $this->uri->segment(3));

  }
}
