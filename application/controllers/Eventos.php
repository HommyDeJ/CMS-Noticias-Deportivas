<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('EventosModel');
  }

  function index()
  {
    $this->load->library('pagination');
    $config['base_url'] = base_url()."Eventos/index";
    $config['total_rows'] = $this->EventosModel->num_eventos();
    $config['per_page'] = 6;
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
    $result=$this->EventosModel->get_pagination($config['per_page']);
    $data['consulta']=$result;
    $data['paginacion']=$this->pagination->create_links();
    $this->load->view('shared/header');
    $this->load->view('eventos/eventos', $data);
    $this->load->view('shared/footer');
    $this->load->view('modals/vcedulamodal.php');
    $this->load->view('modals/isesionmodal.php');
  }

  function crear()
  {
    $this->load->view('shared/header');
    $this->load->view('eventos/crearEvento');
    $this->load->view('shared/footer');
    $this->load->view('modals/vcedulamodal.php');
    $this->load->view('modals/isesionmodal.php');

    if ($_POST) {
      $eventos['id']=$_POST['id'];
      $eventos['titulo']=$_POST['titulo'];
      $eventos['descripcion']=$_POST['descripcion'];
      $eventos['fecha']=$_POST['fecha'];
      $eventos['hora']=$_POST['hora'];
      $eventos['hora']= $this->session->userdata('id');
      $eventos['foto']=$_FILES['foto']['name'];

      if ($eventos['id'] > 0)
      {
        $this->db->where('id', $eventos['id']);
				$this->db->update('eventos', $eventos);
        $link6 = base_url('eventos');
        echo "<script>
                alert('Evento Editado');
                window.location='{$link6}';
              </script>";

      }
      else
      {
        $this->db->insert('eventos', $eventos);
      }

      $name=$eventos['foto'];
      if($_FILES['foto']['error']==0)
      {
        move_uploaded_file($_FILES['foto']['tmp_name'],"imagenes/{$name}");
      }
      $link = base_url('eventos');
      echo "<script>
              alert('Evento Creado');
              window.location='{$link}';
            </script>";
    }
    //$this->load->view('eventos/eventoss');
  }

  function mostrarevento($codigo)
  {

    $this->load->view('shared/header');
    $this->load->view('eventos/mostrarEventos', array('codigo'=>$codigo));
    $this->load->view('shared/footer');
    $this->load->view('modals/vcedulamodal.php');
    $this->load->view('modals/isesionmodal.php');
  }

  public function asistir()
  {

      $id = $_GET['id'];
      $asistir['id_usuario'] = $this->session->userdata('id');
      $asistir['id_evento'] = $id;
      $asistir['fecha'] = date('d-m-Y');
      $this->db->insert('asistencia_eventos', $asistir);
      $link10 = base_url('eventos');
      echo "<script>
              alert('Asistencia Registrada');
              window.location='{$link10}';
            </script>";
    }

  function noAsistencia($id = 0)
  {
    $id_usuario = $this->session->userdata('id');
    $id = $_GET['id'];

    $this->db->query("DELETE  FROM asistencia_eventos WHERE id_usuario = $id_usuario AND id_evento = $id");
    $link4 = base_url('Eventos');
    echo "<script>
            alert('Evento Desmarcado');
            window.location='{$link4}';
          </script>";
  }

  function eliminar(){
      $id = $_GET['id'];
      $this->db->where('id',$id);
      $this->db->delete('eventos');
      $link4 = base_url('eventos');
      echo "<script>
              alert('Evento Eliminado');
              window.location='{$link4}';
            </script>";

    }

}
