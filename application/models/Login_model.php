<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('login_model');


  }

  function agregarusuario($usuario, $contrasena2){


      if(filter_var($usuario['email'],FILTER_VALIDATE_EMAIL)){

          if($contrasena2==$usuario['contrasena']){
              $base2 = base_url('inicio');
              $this->db->where('correo', $usuario['correo']);
              $correo=$this->db->get('miembro');
              if($correo->num_rows()>0){
                echo"<script>
                     alert('El Correo ya Está en Uso, Pruebe con Otro');
                     </script>
                   ";

                 }else {
                $this->db->insert('miembro', $usuario);
                echo"<script>
                 alert('Usuario Registrado Exitosamente');
                 window.location='$base2';
                 </script>
             ";
          }
    }else {
      echo"<script>
			alert('Las Contraseñas no Coinciden');
			</script>	";
    }

  }
}
    function iniciarsesion($correo, $contrasena)
    {
      $this->db->where('email', $correo);
      $this->db->where('contrasena', $contrasena);
      $query=$this->db->get('miembro');
      if($query->num_rows()>0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

      function check_cedula($ced) {
        $c = str_replace("-","", $ced);
        $cedula = substr($c,0, strlen($c) - 1);
        $verify = substr($c,strlen($c) - 1, 1);
        $sum = 0;

        if(strlen($ced) < 13) { return false; }
        for ($i=0; $i < strlen($cedula); $i++) {
          $mod = "";
        if(($i % 2) == 0){$mod = 1; } else { $mod = 2; }
          $rest = substr($cedula,$i,1) * $mod;
        if ($rest > 9) {
          $uno = substr($rest,0,1);
          $dos = substr($rest,1,1);
          $rest = $uno + $dos;
        }
            $sum += $rest;
        }
        $the_number = (10 - ($sum % 10)) % 10;
        if ($the_number == $verify && substr($cedula,0,3) != "000") {
          return true;
        }
          return false;

        }


        function verificarcedula($cedula){
          $this->db->where('cedula',$cedula);
          $query=$this->db->get('miembro');
          if ($query->num_rows()>0) {
            return true;
          }else {
            return false;
          }


        }
}
