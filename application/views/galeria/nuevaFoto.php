<div class="container">

	<div class="breadcrumb-wrapper">
		<ol class="breadcrumb">
      <li><a href="<?php echo base_url('Inicio')?>">Inicio</a></li>
			<li><a href="<?php echo base_url('Galeria')?>">Galería</a></li>
			<li class="active">Nueva Foto</li>
		</ol>
	</div>

      <form method="post" action="<?php echo base_url('Galeria/crear')?>" enctype="multipart/form-data">
        <h1>Nueva Foto</h1>
        <input type="hidden" class="form-control" name="id" value="" />
        <div class="row">
          <div class="col col-md-12">

            <div class="form-group input-group">
                  <span class="input-group-addon">Título</span>
                  <input required type="text" class="form-control" name="nombre" value="">
              </div>

              <div class="form-group input-group col col-md-12">
                <textarea name="descripcion" id="editor" rows="8" cols="80"></textarea>
              </div>

              <div class="form-group input-group">
                  <span class="input-group-addon">Fecha</span>
                  <input readonly type="text" class="form-control" name="fecha" value="<?php echo date('d/m/Y')?>">
              </div>

              <div class="form-group input-group">
                  <span class="input-group-addon">Foto</span>
                  <input required type="file" class="form-control" name="foto" value="">
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Subir Foto</button>
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
