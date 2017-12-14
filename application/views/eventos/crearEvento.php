<?php

        $id = $_GET['id'];

				$fecha = date('Y-m-d');

      		$CI =& get_instance();

      		$CI->db->where('id', $id);
      		$filas = $CI->db->get('eventos')->result_array();

      		if (count($filas) > 0) {
      			$fila = $filas[0];
      		}else{
      			$fila = array('id'=>'','titulo'=>'','descripcion'=>'','fecha'=>'', 'hora'=>'',);
      		}

?>

<div class="container">

	<div class="breadcrumb-wrapper">
		<ol class="breadcrumb">
      <li><a href="<?php echo base_url('Inicio')?>">Inicio</a></li>
			<li><a href="<?php echo base_url('Eventos')?>">Eventos</a></li>
			<li class="active">Nuevo Evento</li>
		</ol>
	</div>

      <form method="post" action="<?php echo base_url('Eventos/crear')?>" enctype="multipart/form-data">
        <h1>Crear Evento</h1>
        <input type="text" class="form-control" name="id" value="<?php echo $fila['id']?>" />
        <div class="row">
          <div class="col col-md-12">

            <div class="form-group input-group">
                  <input placeholder="Escribe un Titulo" required type="text" class="form-control" name="titulo" value="<?php echo $fila['titulo'] ?>">
              </div>

              <div class="form-group input-group col col-md-12">
                <textarea name="descripcion" id="editor" rows="8" cols="80"><?php echo $fila['descripcion']?></textarea>
              </div>

              <div class="form-group input-group">
                  <input required type="date" class="form-control" name="fecha" value="<?php echo $fila['fecha']?>">
              </div>
              <div class="form-group input-group">
                  <input required type="time" class="form-control" class="form-control" name="hora" value="<?php echo $fila['fecha']?>">
              </div>
              <div class="form-group input-group">
                  <input required type="file" class="form-control" name="foto" value="">
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Crear Evento</button>
              </div>
            </div>
        </div>
      </form>

    </div>
    <script type="text/javascript">
         CKEDITOR.replace("editor");
    </script>
  </body>
</html>
