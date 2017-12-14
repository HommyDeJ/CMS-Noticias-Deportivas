<?php

if($this->session->userdata('tipo') != 0)
{
  $atributo = "";
}
else
{
  $atributo = "none";
}
?>

<?php
if ($this->session->userdata('tipo') == 3)
{
  $atrib = "none";
}
else if ($this->session->userdata('tipo') == 0 ) {
  $atrib = "none";
}

?>

<?php if ($this->session->userdata('tipo') == 2) {
  $esconder = "";
}elseif ($this->session->userdata('tipo') == 3) {
  $esconder = "";
}else {
  $esconder = "none";
}

?>

<style type="text/css">

#btn{
  display: <?php echo $atributo ?>;
}

#btn1{
  display: <?php echo $atrib ?>;
}

#btn3{
  display: <?php echo $esconder?>;
}


</style>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/widget.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/layout.css')?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/css/mdb.min.css" />

        <script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>

        <link rel="stylesheet" href="<?php echo base_url('assets/css/modules/slider.css')?>">

        <script src="<?php echo base_url('assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js')?>"></script>
    </head>
    <body>

      <div  class="header text-right">
        <?php if ($this->session->userdata('id')): ?>
            <a href="<?php echo base_url('Login/logout')?>">Cerrar Sesión</a>

          <?php else: ?>
            <a href="#" data-toggle="modal" data-target="#loginmodal">Iniciar Sesión</a><label class="label label-default">/</label> <a href="#" data-toggle="modal" data-target="#basicModal">Registrar</a>

        <?php endif; ?>

  		</div>

    <header class="site-header">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <h1 class="site-logo title"><a href="<?php echo base_url('Inicio')?>">Noticias Deportivas</a></h1>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
          </div>
          <nav id="main-menu" class="menu-wrapper col-md-10 collapse navbar-collapse">
            <ul class="menu nav navbar-nav">
              <li><a href="<?php echo base_url('Inicio')?>">Inicio</a></li>
              <li><a href="<?php echo base_url('Noticias')?>">Noticias</a></li>
              <li><a href="<?php echo base_url('Galeria')?>">Galería</a></li>
              <li><a href="<?php echo base_url('Eventos')?>">Eventos</a></li>
              <li><a href="<?php echo base_url('Clasificados')?>">Clasificados</a></li>
              <li><a href="<?php echo base_url('Contacto')?>">Contacto</a></li>
              <li><a href="<?php echo base_url('PreguntasFrecuentes')?>">FAQ</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
