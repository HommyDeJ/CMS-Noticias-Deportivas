
    <div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Iniciar Sesión</h4>
          </div>
          <div class="modal-body">
             <form method="post" action="<?php echo base_url('Login/login')?>">
               <div class="col col-md-12">
                 <div class="form-group input-group">
                   <input type="email" placeholder="Escriba su Correo" name="email" class="form-control"value="" placeholder="">
                 </div>
                 <div class="form-group input-group">
                   <input type="password" placeholder="Escriba su Contraseña" name="contrasena" class="form-control"value="" placeholder="">
                 </div>
                 <div class="text-center">
                         <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                 </div>

               </div>
             </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
