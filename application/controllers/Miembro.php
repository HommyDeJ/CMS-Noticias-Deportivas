<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Miembro extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('login_model');
    $this->load->helper('mysql_to_excel_helper');
    $this->load->model('MiembroModel');
  }

  function index()
  {
    $this->load->view('shared/header');
    $this->load->view('miembro/registrarse');
    $this->load->view('shared/footer');
  }

  function fetch_user(){
          $this->load->model("MiembroModel");
          $fetch_data = $this->MiembroModel->make_datatables();
          $data = array();
          foreach($fetch_data as $row)
          {
               $sub_array = array();
               $sub_array[] = '<img src="'.base_url().'imagenes/'.$row->foto.'" class="img-thumbnail" width="50" height="35" />';
               $sub_array[] = $row->nombre;
               $sub_array[] = $row->email;
               $sub_array[] = $row->telefono;
               $sub_array[] = $row->tipo;
               $link = base_url('miembro');
               $link2 = base_url('miembro/darprivilegios');
               $link3 = base_url('miembro/quitarprivilegios');
               $link4 = base_url('miembro/editarMiembro');
               $link5 = base_url('miembro/eliminar');
               $sub_array[] = '<a href="'.$link4.'/'.$row->id.'" class="btn btn-warning btn-xs">Actualizar</button>';
               $sub_array[] = '<a href="'.$link5.'/'.$row->id.'" name="eliminar" id="'.$row->id.'" class="btn btn-danger btn-xs">Eliminar</a>';
               $sub_array[] = '<a href="'.$link2.'/'.$row->id.'" name="admin" id="'.$row->id.'" class="btn btn-success btn-xs">✓</a>';
               $sub_array[] = '<a href="'.$link3.'/'.$row->id.'" name="admin" id="'.$row->id.'" class="btn btn-danger btn-xs">X</a>';
               $data[] = $sub_array;
          }
          $output = array(
               "draw"                    =>     intval($_POST["draw"]),
               "recordsTotal"            =>     $this->MiembroModel->get_all_data(),
               "recordsFiltered"         =>     $this->MiembroModel->get_filtered_data(),
               "data"                    =>     $data
          );
          echo json_encode($output);
     }

  function darprivilegios($id = 0)
  {
    $this->db->set('tipo', '2');
    $this->db->where('id',$id);
		$sql = $this->db->update('miembro');
    $link3 = base_url('Inicio_admin');
    echo "<script>
            alert('Privilegios Agregados');
            window.location='{$link3}';
          </script>";
  }

  function quitarprivilegios($id = 0)
  {
    $this->db->set('tipo', '3');
		$this->db->where('id',$id);
		$sql = $this->db->update('miembro');
    $link4 = base_url('Inicio_admin');
		echo "<script>
            alert('Privilegios Eliminados');
            window.location='{$link4}';
          </script>";
  }

  function eliminar(){
      $id = $_GET['id'];
      $this->db->where('id',$id);
      $this->db->delete('miembro');
      $link4 = base_url('Inicio_admin');
      echo "<script>
              alert('Miembro Eliminado');
              window.location='{$link4}';
            </script>";

    }


  function registrar()
  {
    if ($_POST)
    {
      $miembro['id']=$_POST['id'];
      $miembro['cedula']=$_POST['cedula'];
      $miembro['nombre']=$_POST['nombre'];
      $miembro['telefono']=$_POST['telefono'];
      $miembro['email']=$_POST['correo'];
      $miembro['contrasena']=md5($_POST['contrasena']);
      $miembro['celular']=$_POST['celular'];
      $miembro['direccion']=$_POST['direccion'];
      $miembro['latitud']=$_POST['latitud'];
      $miembro['longitud']=$_POST['longitud'];
      $miembro['foto']=$_FILES['foto']['name'];

      if ($miembro['id'] > 0)
      {
        $this->db->where('id', $miembro['id']);
				$this->db->update('miembro', $miembro);
        $link6 = base_url('Inicio_admin');
        echo "<script>
                alert('Miembro Editado');
                window.location='{$link6}';
              </script>";

      }
      else
      {
        $this->db->insert('miembro', $miembro);
        echo "<script  type='text/javascript'>
        alert('Se registró Correctamente ');
        </script>";
      }
      $name=$miembro['foto'];
      if($_FILES['foto']['error']==0)
      {
        move_uploaded_file($_FILES['foto']['tmp_name'],"imagenes/{$name}");
      }
      //redirect('inicio');
      $link4 = base_url('inicio');
      echo "<script>
      window.location='{$link4}';
      </script>";
    }
  }
  function editarMiembro()
  {
    $this->load->view('shared/header');
    $this->load->view('miembro/editarMiembro');
    $this->load->view('shared/footer');
    if ($_POST)
    {
      $miembro['id']=$_POST['id'];
      $miembro['cedula']=$_POST['cedula'];
      $miembro['nombre']=$_POST['nombre'];
      $miembro['telefono']=$_POST['telefono'];
      $miembro['email']=$_POST['correo'];
      $miembro['contrasena']=md5($_POST['contrasena']);
      $miembro['celular']=$_POST['celular'];
      $miembro['direccion']=$_POST['direccion'];
      $miembro['latitud']=$_POST['latitud'];
      $miembro['longitud']=$_POST['longitud'];
      $miembro['foto']=$_FILES['foto']['name'];

      if ($miembro['id'] > 0)
      {
        $this->db->where('id', $miembro['id']);
        $this->db->update('miembro', $miembro);
        $link6 = base_url('Inicio_admin');
        echo "<script>
                alert('Miembro Editado');
                window.location='{$link6}';
              </script>";

      }
      else
      {
        $this->db->insert('miembro', $miembro);
        echo "<script  type='text/javascript'>
        alert('Se registró Correctamente ');
        </script>";
      }
      $name=$miembro['foto'];
      if($_FILES['foto']['error']==0)
      {
        move_uploaded_file($_FILES['foto']['tmp_name'],"imagenes/{$name}");
      }
      //redirect('inicio');
      $link4 = base_url('inicio');
      echo "<script>
      window.location='{$link4}';
      </script>";
    }
  }


  function verificarcedula(){
    $_SESSION['cedulavalidada']='';
    if ($_POST)
    {
      if ($this->login_model->check_cedula($_POST['cedula']))
      {
        if ($this->login_model->verificarcedula($_POST['cedula']))
        {
          $link = base_url('inicio');
          echo "<script>
                  alert('Esta Cédula Está en Uso, Intente con Otra');
                  window.location='{$link}';
                </script>";
              }
              else
              {
                $link=base_url('miembro');
                echo "<script>
                        alert('Esta cedula esta disponible para registrar');
                        window.location='{$link}';
                      </script>";
                      $_SESSION['cedulavalidada']=$_POST['cedula'];
                    }
                  }
                  else
                  {
                    $link=base_url('inicio');
                    echo "<script>
                            alert('La Cédula Introducida no es Correcta Intente Nuevamente');
                            window.location='{$link}';
                          </script>";
                        }
                      }
                    }

  function VerMiembroMapa()
  {
    $this->load->view('miembro/MapaMiembro');
  }

  function exportarexcel()
  {
    to_excel($this->MiembroModel->getmiembros(), "archivoexcel");
  }
}
