<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeria extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('GaleriaModel');
  }

  function index()
  {
    $this->load->library('pagination');
    $config['base_url'] = base_url()."Galeria/index";
    $config['total_rows'] = $this->GaleriaModel->num_galeria();
    $config['per_page'] = 10;
    $config['uri_segment'] = 3;
    $config['num_links'] = 5;
    //esto sirve para configurar la paginacion usando bootstrap
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $this->pagination->initialize($config);
    $result=$this->GaleriaModel->get_pagination($config['per_page']);
    $data['consulta']=$result;
    $data['paginacion']=$this->pagination->create_links();
    $this->load->view('shared/header');
    $this->load->view('galeria/galeria', $data);
    $this->load->view('shared/footer');
    $this->load->view('modals/vcedulamodal.php');
    $this->load->view('modals/isesionmodal.php');
  }

  function nueva()
  {
    $this->load->view('shared/header');
    $this->load->view('galeria/nuevaFoto');
    $this->load->view('shared/footer');
    $this->load->view('modals/vcedulamodal.php');
    $this->load->view('modals/isesionmodal.php');
  }

  function crear()
  {
    if ($_POST) {
      $id=$_POST['id'];
      $galeria['nombre']=$_POST['nombre'];
      $galeria['descripcion']=$_POST['descripcion'];
      $galeria['fecha']=$_POST['fecha'];
      $galeria['foto']=$_FILES['foto']['name'];

      if ($id>0)
      {
      }
      else
      {

        $this->db->insert('galeria', $galeria);
      }

      $name=$galeria['foto'];
      if($_FILES['foto']['error']==0)
      {
        move_uploaded_file($_FILES['foto']['tmp_name'],"imagenes/{$name}");
      }
    }
    $link2 = base_url('galeria');
    echo "<script>
            alert('Imagen Subida Correctamente');
            window.location='{$link2}';
          </script>";
  }

}
