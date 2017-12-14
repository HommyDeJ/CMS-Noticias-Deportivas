<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('login_model');
  }

  function index()
  {

  }

  function login()
  {
    if(isset($_POST['email'])){
      //intentar iniciar sesion
      if($this->login_model->iniciarsesion($_POST['email'], md5($_POST['contrasena'])))
      {
        $this->session->set_userdata('email',$_POST['email']);
        //traigo el id y el nombre del usuario mediante tu correo
        $this->db->where('email', $_POST['email']);
        $miembro=$this->db->get('miembro')->result_array();
        $this->session->set_userdata('id',$miembro[0]['id']);
        $this->session->set_userdata('nombre',$miembro[0]['nombre']);
        $this->session->set_userdata('foto',$miembro[0]['foto']);
        $this->session->set_userdata('celular',$miembro[0]['celular']);
        $this->session->set_userdata('email',$miembro[0]['email']);
        $this->session->set_userdata('cedula',$miembro[0]['cedula']);
        $this->session->set_userdata('tipo',$miembro[0]['tipo']);
        $link3 = base_url('inicio');
        echo "<script>
                alert('Bienvenido {$this->session->userdata('nombre')}');
                window.location='{$link3}';
              </script>";
      }
      else
      {
        $link = base_url('inicio');
        echo "<script>
                alert('Correo o Contraseña Incorrecta');
                window.location='{$link}';
              </script>";
            }
          }
        }

        function logout()
        {
          $this->session->sess_destroy();
          $link2 = base_url('inicio');
          echo "<script>
                  alert('¿Seguro que Desea Salir?');
                  window.location='{$link2}';
                </script>";
        }

      }
