<?php

        $id = $_GET['id'];

				$fecha = date('Y-m-d');

      		$CI =& get_instance();

      		$CI->db->where('idnoticia', $id);
      		$filas = $CI->db->get('noticia')->result_array();

      		if (count($filas) > 0) {
      			$fila = $filas[0];
      		}else{
      			$fila = array('idnoticia'=>'','titulo'=>'','resumen'=>'','descripcion'=>'',);
      		}

?>
<div class="clear"> </div>
</div>
</div>
<div class="container">
  <div class="breadcrumb-wrapper">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('Inicio')?>">Inicio</a></li>
      <li><a href="<?php echo base_url('Noticias')?>">Noticias</a></li>
      <li class="active">Editar Noticia</li>
    </ol>
  </div>

<h1 class=" h2 text-center">Editar Noticia</h1>
<form method="post" action="<?php echo base_url('Noticias/Crear')?>" enctype="multipart/form-data">

<input type="text" readonly class="form-control" name="idnoticia" value="<?php echo $fila['idnoticia']?>" />
<div class="row">
    <div class="col col-md-12">
      <div class="form-group input-group">
          <input readonly type="text" class="form-control" name="fecha" read value="<?php echo date('d/m/Y')?>">
      </div>
      <div class="form-group input-group">
          <input required type="text" placeholder="Escriba un Título" class="form-control" class="form-control"name="titulo" value="<?php echo $fila['titulo']?>">
      </div>
      <div class="form-group input-group">
          <textarea required name="resumen" class="form-control" rows="4" cols="80"><?php echo $fila['resumen']?></textarea>
      </div>

      <div class="form-group input-group">
          <input required type="file" class="form-control" name="foto" />
      </div>

      <div class="form-group input-group col col-md-12">
        <textarea name="descripcion" id="editor"><?php echo $fila['descripcion']?></textarea>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary">Crear Noticia</button>
      </div>
    </div>
</div>
</form>

</div>
<script type="text/javascript">
 CKEDITOR.replace("editor");
</script>
