
<?php


  $CI=& get_instance();

  $query="SELECT *
       FROM noticia
          ORDER by idnoticia desc limit 6";
    $datos=$CI->db->query($query)->result_array();
		?>
<!DOCTYPE HTML>
<html>
<head>
<title>Noticias</title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


				<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
				<link href="<?php echo base_url('assets/')?>css/style.css" rel="stylesheet" type="text/css"  media="all" />
				<link rel="stylesheet" href="<?php echo base_url('assets/')?>css/responsiveslides.css">
				<script src="<?php echo base_url('assets/')?>js/responsiveslides.min.js"></script>
				<script src="https://unpkg.com/sweetalert2@7.0.6/dist/sweetalert2.all.js"></script>


    <body>
		<!---start-header---->
		<div  class="header text-right">

			 <a  href="">Iniciar Sesion</a><label class="label label-default">/</label> <a href="#" data-toggle="modal" data-target="#basicModal">Registrar</a>
			<h1 class="text-center">ESPN DEPORTES</h1>

		</div>
			<div class="header">
				<div class="wrap">
				<div class="top-nav">
					<ul>

						<li class="active"><a href="<?php echo base_url('noticia')?>">Inicio</a></li>
						<li><div class="dropdown">
						<a href="<?php echo base_url('Noticia/ver')?>" data-toggle="dropdown" class="dropdown-toggle">Noticias<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="">Crear Noticia</a></li>
							<li><a href="<?php echo base_url('Noticia/ver')?>">Ver Noticia</a></li>
						</ul>
					</div></li>
						<li><a href="services.html">Miembros</a></li>
						<li><a href="plans.html">Galerías</a></li>
						<li><a href="contact.html">Eventos</a></li>
						<li><a href="services.html">Clasificados</a></li>
						<li><a href="plans.html">Contacto</a></li>
						<li><a href="contact.html">FAQ</a></li>
						<li ><div class="dropdown">
						<a href="<?php echo base_url('Noticia/ver')?>"  data-toggle="dropdown" class="dropdown-toggle">Bienvenido, Bienvenido<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li ><a href="<?php echo base_url('login_controller')?>">Iniciar Sesion</a></li>
							<li><a href="<?php echo base_url('login_controller/registrar')?>" >Registrate</a></li>
						</ul>
					</div></li>
					</ul>
				</div>

				<div class="clear"> </div>
			</div>
		</div>
		<div class="content">
      <html>
 <head>
   <title><?php echo $title; ?></title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
   <style>
           body
           {
                margin:0;
                padding:0;
                background-color:#f1f1f1;
           }
           .box
           {
                width:900px;
                padding:20px;
                background-color:#fff;
                border:1px solid #ccc;
                border-radius:5px;
                margin-top:10px;
           }
      </style>
 </head>
 <body>


      <div class="container box">
           <h3 align="center"><?php echo $title; ?></h3><br />
           <a class="btn btn-primary" href="<?php echo base_url('miembro/VerMiembroMapa')?>">VER MIEMBRO EN EL MAPA</a>
           <a  class="btn btn-success" href="<?php echo base_url('miembro/exportarexcel')?>">Exportar En Excel</a>
           <div class="table-responsive">
                <br />
                <table id="user_data" class="table table-bordered table-striped">
                     <thead>
                          <tr>
                               <th width="10%">Image</th>
                               <th width="35%">Nombre</th>
                               <th width="35%">Correo</th>
                               <th width="35%">Telefono</th>
                               <th width="10%">Edit</th>
                               <th width="10%">Delete</th>
                          </tr>
                     </thead>
                </table>
           </div>
      </div>
 </body>
 </html>
 <script type="text/javascript" language="javascript" >
 $(document).ready(function(){
      var dataTable = $('#user_data').DataTable({
           "processing":true,
           "serverSide":true,
           "order":[],
           "ajax":{
                url:"<?php echo base_url() . 'Miembro/fetch_user'; ?>",
                type:"POST"
           },
           "columnDefs":[
                {
                     "targets":[0, 3, 4],
                     "orderable":false,
                },
           ],
      });
 });
 </script>
