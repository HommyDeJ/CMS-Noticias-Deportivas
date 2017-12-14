<div class="container">

	<div class="breadcrumb-wrapper">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('Inicio')?>">Inicio</a></li>
			<li><a href="<?php echo base_url('Clasificados')?>">Clasificados</a></li>
			<li class="active">Nuevo Clasificado</li>
		</ol>
	</div>

      <form method="post" action="<?php echo base_url('Clasificados/nuevoClasificado')?>" enctype="multipart/form-data">
        <h1>Crear Clasificado</h1>
        <input type="hidden" class="form-control" name="id" value="" />
        <div class="row">
            <div class="col col-md-12">

							<div class="form-group input-group">
                  <input readonly type="text" class="form-control" name="fecha" value="<?php echo date('d/m/Y')?>">
              </div>

							<div class="form-group input-group">
                  <input placeholder="Escriba el Asunto" type="text"  class="form-control" class="form-control" name="asunto" value="">
              </div>

							<div class="form-group input-group">
                  <input type="file" class="form-control" name="foto" value="">
              </div>

              <div class="form-group input-group col col-md-12">
                    <textarea name="descripcion" id="editor" rows="8" cols="80"></textarea>
              </div>
              <div class="text-center">
								<button class="btn btn-primary">Crear Clasificado</button>
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
