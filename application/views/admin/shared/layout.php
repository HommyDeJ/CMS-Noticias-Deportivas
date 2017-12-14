<?php

if($this->session->userdata('tipo') == 1)
{
  $atributo = "";
}
else
{
	$atributo = "none";
}

?>

<style type="text/css">

#btn3{
  display: <?php echo $atributo ?>;
}

</style>

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?php echo base_url('admin_assets/img/favicon.ico')?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Panel de Administrador</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url('admin_assets/css/bootstrap.min.css')?>" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url('admin_assets/css/animate.min.css')?>" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo base_url('admin_assets/css/light-bootstrap-dashboard.css?v=1.4.0')?>" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url('admin_assets/css/demo.css')?>" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url('admin_assets/css/pe-icon-7-stroke.css')?>" rel="stylesheet" />

</head>

<div class="sidebar" data-color="blue" data-image="<?php echo base_url('admin_assets/img/sidebar-5.jpg')?>">

<!--

    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
    Tip 2: you can also add an image using data-image tag

-->

  <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                Panel Administrativo
            </a>
        </div>

        <ul class="nav">
            <li>
                <a id="btn3" href="<?php echo base_url('Inicio_admin')?>">
                    <i class="pe-7s-graph"></i>
                    <p>Resumen</p>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('User_admin')?>">
                    <i class="pe-7s-user"></i>
                    <p>Perfil</p>
                </a>
            </li>
            <li>
                <a id="btn3" href="<?php echo base_url('Usuarios_admin')?>">
                    <i class="pe-7s-note2"></i>
                    <p>Lista de Usuarios</p>
                </a>
            </li>
            <li>
                <a id="btn3" href="<?php echo base_url('Mapa_admin')?>">
                    <i class="pe-7s-map-marker"></i>
                    <p>Mapa</p>
                </a>
            </li>
						<li>
                <a href="<?php echo base_url('Inicio')?>">
                    <i class="pe-7s-home"></i>
                    <p>Ir al Portal</p>
                </a>
            </li>
        </ul>
  </div>
</div>
