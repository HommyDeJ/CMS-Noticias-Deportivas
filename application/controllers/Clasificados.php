<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clasificados extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('clasificadomodel');
  }

  function index()
  {
    $this->load->library('pagination');
    $config['base_url'] = base_url()."Clasificados/index";
    $config['total_rows'] = $this->clasificadomodel->num_clasificado();
    $config['per_page'] = 8;
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
    $result=$this->clasificadomodel->get_pagination($config['per_page']);
    $data['consulta']=$result;
    $data['paginacion']=$this->pagination->create_links();
    $this->load->view('shared/header');
    $this->load->view('clasificados/clasificados', $data);
    $this->load->view('shared/footer');
    $this->load->view('modals/vcedulamodal.php');
    $this->load->view('modals/isesionmodal.php');
  }

  function crear()
  {
    $this->load->view('shared/header');
    $this->load->view('clasificados/crearClasificado');
    $this->load->view('shared/footer');
    $this->load->view('modals/vcedulamodal.php');
    $this->load->view('modals/isesionmodal.php');
  }

  function nuevoClasificado()
  {
    if ($_POST) {
      $id=$_POST['id'];
      $clasificados['asunto']=$_POST['asunto'];
      $clasificados['descripcion']=$_POST['descripcion'];
      $clasificados['foto']=$_FILES['foto']['name'];
      $clasificados['fecha']=$_POST['fecha'];
      $clasificados['autor'] = $this->session->userdata('nombre');
      $clasificados['idusuario'] = $this->session->userdata('id');

      if ($id>0)
      {
      }
      else
      {
        $this->db->insert('clasificados', $clasificados);
      }

      $name=$clasificados['foto'];
      if($_FILES['foto']['error']==0)
      {
        move_uploaded_file($_FILES['foto']['tmp_name'],"imagenes/{$name}");
      }
    }
    $link2 = base_url('clasificados');
    echo "<script>
            alert('Clasificado Creado');
            window.location='{$link2}';
          </script>";
  }

  function ver()
  {
    $this->load->view('clasificados/clasificados', $data);
  }
}
