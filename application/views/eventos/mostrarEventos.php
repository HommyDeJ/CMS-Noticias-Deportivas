<?php

$CI=& get_instance();
$CI->db->where('id',$codigo);
$datos=$CI->db->get('eventos')->result_array();

$CI->db->where('id',$codigo);
$comentario=$CI->db->get('comentario')->result_array();

$CI->db->where('id',$codigo);
$clasificados=$CI->db->get('clasificados')->result_array();


?>

<div class="container full-page">
  <div class="row">
    <!-- <div class="banner-view widget">
    <img src="img/ad.jpg" alt="">
  </div> -->

  <div class="breadcrumb-wrapper">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('Inicio')?>">Inicio</a></li>
      <li><a href="<?php echo base_url('Eventos')?>">Eventos</a></li>
      <?php foreach ($datos as $fila2)
      {
        echo "<li class='active'>{$fila2['titulo']}</li>";
      }?>
    </ol>
  </div><!--/breadcrumb-wrapper-->

  <div class="post-container container">
    <div class="col-md-9 card-post-format post-view content" >
      <header class="page-header">
        <div class="page-title">
          <?php foreach ($datos as $fila1)
          {
            echo "<h2 class='title'>{$fila1['titulo']}</h2>";
          }?>
        </div>
      </header>

      <div class="post margin-top-20 clearfix">
        <div class="row">
          <?php
          foreach ($datos as $fila) {
            $linkimagen=base_url('imagenes');
            echo "<div class='wrap'>
                  <div class='about-us'>
                  <div class='about-header'>
                  </div>

                  <div class='about-info'>
                  <div class='col col-md-11'>
                    <img src='{$linkimagen}/{$fila['foto']}' height='500px' width='20%' />
                    <p style='color:#00B895; text-align:justify;'>{$fila['descripcion']}</p>
                    {$fila['descripcion']}";
                  }
                  ?>

                <a class="btn btn-success" id="btn" href="<?php echo base_url('eventos/asistir');?>?id=<?php  echo $codigo ?>">Quiero Asistir</a>
                <a class="btn btn-primary" id="btn" href="<?php echo base_url('eventos/noAsistencia');?>?id=<?php  echo $codigo ?>">No Quiero Asistir</a>
                <a class="btn btn-warning" id="btn1" href="<?php echo base_url('eventos/crear');?>?id=<?php  echo $codigo ?>">Editar Evento</a>
                <a class="btn btn-danger" id="btn1" href="<?php echo base_url('eventos/eliminar');?>?id=<?php  echo $codigo ?>">Eliminar Evento</a>
                      </div>
                    </div><!--/post-->
                  </div><!--/news-post-format-->
                </div>
              </div>
            </div>
          </div>

                  <aside class="col-md-3 sidebar">
                    <div class="widget">
                      <header class="widget-header">
                        <h4 class="title">
                          Clasificados
                        </h4>
                      </header>

                      <aside class="col-md-3 sidebar">


                      <?php

                      foreach($clasificados as $filas){
                        $linkimagen1=base_url('imagenes');
                        echo "<div class='widget'>
                          <header class='widget-header'>
                            <h4 class='title'>
                              Opinion
                            </h4>
                          </header>
                          <div class='widget-content'>
                            <ul class='media-list list'>
                              <li class='media'>
                                <a href='' class='pull-right'>
                                  <img src='{$linkimagen1}/{$fila['foto']}' class='media-object'>
                                </a>
                                <div class='media-body'>
                                  <h4 class='media-heading title'>
                                    {$filas['asunto']}
                                  </h4>
                                  <p>{$filas['descripcion']}</p>
                                </div>
                              </li>";
                            }
                            ?>
                          </aside>
                        </div><!--/post-view-->

              </div><!--/full-page-->
            </div><!-- /main-view -->
        </div>
      </div>
    </div>
