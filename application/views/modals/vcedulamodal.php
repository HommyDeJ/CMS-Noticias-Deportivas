<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <div class="row">
      <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Validacion de Cedula</h4>
                      </div>
                        <div class="modal-body">
                         <form method="post" action="<?php echo base_url('miembro/verificarcedula')?>">
                           <div class="col col-md-12">
                             <div class="form-group input-group">
                               <input type="text" name="cedula" class="form-control"value="" placeholder="XXX-XXXXXXX-X">
                             </div>
                             <div class="text-center">
                                     <button type="submit" class="btn btn-primary">Validar</button>
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
      </div>
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
