<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('NoticiaModel');
  }

  function index()
  {
    $this->load->library('pagination');
    $config['base_url'] = base_url()."Noticias/index";
    $config['total_rows'] = $this->NoticiaModel->num_noticia();
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
    $result=$this->NoticiaModel->get_pagination($config['per_page']);
    $data['consulta']=$result;
    $data['paginacion']=$this->pagination->create_links();
    $this->load->view('shared/header');
    $this->load->view('noticias/noticias', $data);
    $this->load->view('shared/footer');
    $this->load->view('modals/vcedulamodal.php');
    $this->load->view('modals/isesionmodal.php');
  }

  function nueva()
  {

    $this->load->view('shared/header');
    $this->load->view('noticias/crear');
    $this->load->view('shared/footer');
    $this->load->view('modals/vcedulamodal.php');
    $this->load->view('modals/isesionmodal.php');
  }
  function editar()
  {
    $id = $_GET['id'];
    $this->load->view('shared/header');
    $this->load->view('noticias/editar', array('idnoticia'=>$id));
    $this->load->view('shared/footer');
    $this->load->view('modals/vcedulamodal.php');
    $this->load->view('modals/isesionmodal.php');
  }

  function crear()
  {
    if ($_POST) {
      $noticia['idnoticia']=$_POST['idnoticia'];
      $noticia['titulo']=$_POST['titulo'];
      $noticia['resumen']=$_POST['resumen'];
      $noticia['descripcion']=$_POST['descripcion'];
      $noticia['fecha']=$_POST['fecha'];
      $noticia['foto']=$_FILES['foto']['name'];
      $noticia['autor'] = $this->session->userdata('nombre');
      $noticia['idusuario'] = $this->session->userdata('id');

      if ($noticia['idnoticia'] > 0)
      {
        $this->db->where('idnoticia', $noticia['idnoticia']);
				$this->db->update('noticia', $noticia);
        $link6 = base_url('noticias');
        echo "<script>
                alert('Noticia Editada');
                window.location='{$link6}';
              </script>";

      }

      else
      {
        $this->db->insert('noticia', $noticia);
      }

      $name=$noticia['foto'];
      if($_FILES['foto']['error']==0)
      {
        move_uploaded_file($_FILES['foto']['tmp_name'],"imagenes/{$name}");
      }
    }
    $link2 = base_url('noticias');
    echo "<script>
            alert('Noticia Creada');
            window.location='{$link2}';
          </script>";
  }

  function mostrarnoticia($codigo)
  {

    $this->load->view('shared/header');
    $this->load->view('noticias/mostrarNoticia', array('codigo'=>$codigo));
    $this->load->view('shared/footer');
    $this->load->view('modals/vcedulamodal.php');
    $this->load->view('modals/isesionmodal.php');
  }

  function comentario(){

    if ($_POST) {
      $comentario['comentario']=$_POST['comentario'];
      $comentario['idnoticia']=$_POST['idnoticia'];
      $comentario['autor'] = $this->session->userdata('nombre');
      $comentario['idusuario'] = $this->session->userdata('id');
      $comentario['fecha']=$_POST['fecha'];
      $this->db->insert('comentario',$comentario);
      $link=base_url('noticias/mostrarNoticia/'.$_POST['idnoticia']);
      echo "<script>
              window.location='{$link}';
            </script>";
          }
        }

        function eliminar(){
      			$id = $_GET['id'];
      			$this->db->where('idnoticia',$id);
      			$this->db->delete('noticia');
            $link4 = base_url('noticias');
            echo "<script>
                    alert('Noticia Eliminada');
                    window.location='{$link4}';
                  </script>";

          }

        }
