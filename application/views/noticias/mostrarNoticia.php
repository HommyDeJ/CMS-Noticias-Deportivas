<?php

$CI=& get_instance();
$CI->db->where('idnoticia',$codigo);
$datos=$CI->db->get('noticia')->result_array();

$CI->db->where('idnoticia',$codigo);
$comentario=$CI->db->get('comentario')->result_array();
?>

<div class="container full-page">
  <div class="row">
    <!-- <div class="banner-view widget">
    <img src="img/ad.jpg" alt="">
  </div> -->

  <div class="breadcrumb-wrapper">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('Inicio')?>">Inicio</a></li>
      <li><a href="<?php echo base_url('Noticias')?>">Noticias</a></li>
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
                    <p style='color:#00B895; text-align:justify;'>{$fila['resumen']}</p>
                    {$fila['descripcion']}";
                  }
                  ?>


                  <?php
                  echo "<a href='http://localhost/proyecto-final-web/noticias/eliminar/?id=$codigo' class='btn btn-danger btn-lg'>Eliminar Noticia</a>";
                   ?>

                   <?php
                   echo "<a href='http://localhost/proyecto-final-web/noticias/editar/?id=$codigo' class='btn btn-warning btn-lg'>Editar Noticia</a>";
                    ?>

                  <form id="btn" method="post" action="<?php echo base_url('noticias/comentario')?>">
                    <div class="text-center">
                      <h5><label>Comentario</label></h5>
                      <textarea required name="comentario" placeholder="Escriba su Comentario" class="form-control" id="editor" cols="90" rows="5"></textarea>
                      <input type="hidden"  name="idnoticia" value="<?php echo $datos['0']['idnoticia']?>">
                      <input type="hidden"  name="fecha" value="<?php echo date('d/m/Y')?>">
                      <button type="submit" class="btn btn-success btn-lg">Comentar</button>
                    </div>
                  </form>

                  <?php
                  foreach ($comentario as $key=> $fila) {
                    echo "<div class='media'>
                            <div class='media-left media-middle'>
                              <img class='' src=''>
                            </div>

                            <div class='media-body'>
                              <h4 class='media-heading'>{$fila['comentario']}</h4>
                              <footer><cite title='Source Title'>{$fila['autor']}</cite></footer>
                            </div>
                        </div>";
                        }
                        ?>
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
                          Eventos
                        </h4>
                      </header>
                      <div class="widget-content">
                        <ul class="media-list list">
                          <li class="media">
                            <a href="#" class="pull-right">
                              <?php foreach ($datos as $fila) {
                                echo "<img src='{$linkimagen}/{$fila['foto']}' height='200px' width='20%' />";
                              }?>
                            </a>
                            <div class="media-body">
                              <h4 class="media-heading title">
                                SUSAN MILLIGAN
                              </h4>
                              <p>UPS Delivers Christmas a Day Late</p>
                            </div>
                          </li>
                          <li class="media">
                            <a href="#" class="pull-right">
                              <img src="img/avatar_2.jpg" alt="" class="media-object">
                            </a>
                            <div class="media-body">
                              <h4 class="media-heading title">
                                CHARLES WHEELAN
                              </h4>
                              <p>Political Resolutions for 2014</p>
                            </div>
                          </li>
                          <li class="media">
                            <a href="#" class="pull-right">
                              <img src="img/avatar_3.jpg" alt="" class="media-object">
                            </a>
                            <div class="media-body">
                              <h4 class="media-heading title">
                                MORT ZUCKERMAN
                              </h4>
                              <p>Looking Back at 2013</p>
                            </div>
                          </li>
                          <li class="media">
                            <a href="#" class="pull-right">
                              <img src="img/avatar_4.jpg" alt="" class="media-object">
                            </a>
                            <div class="media-body">
                              <h4 class="media-heading title">
                                PETER ROFF
                              </h4>
                              <p>America Just Isn't That Into Obama Anymore</p>
                            </div>
                          </li>
                        </ul>
                      </div>aaaa
                    </div><!--/widget list-->

                    <div class="widget form-view vote">
                      <header class="widget-header">
                        <h4 class="title">
                          QUICK VOTE
                        </h4>
                      </header>
                      <div class="widget-content">
                        <p class="margin-top-20">
                          Have you ever experienced rowdiness among other passengers on an airliner?
                        </p>
                        <form action="" class="form">
                          <div class="radio form-group radio-inline-group">
                            <label class="radio-inline iconlabel-wrapper ">
                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                              <span class="radio-iconlabel"></span>Yes
                            </label>
                            <label class="radio-inline iconlabel-wrapper ">
                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                              <span class="radio-iconlabel"></span>No
                            </label>
                          </div>
                          <hr class="clearfix">
                           <button type="submit" class="btn">vote</button> or <button type="submit" class="btn btn-link">view results</button>
                        </form>
                      </div>
                    </div><!--/vote-->

                    <div class="widget">
                      <header class="widget-header">
                        <h4 class="title">
                          TRENDING NOW
                        </h4>
                      </header>
                      <ul class="media list">
                        <li class="media">
                          <div href="#" class="widget-thumbnail hover-thumbnail video-box">
                            <a href="#" class="media-object"><img src="img/11.jpg" alt=""></a>
                          </div>
                          <div class="media-body margin-top-10">
                            <h4 class="media-heading title">
                              <a href="#">Not your average steering wheel</a>
                            </h4>
                            <p>Explore our interactive of one of F1's most important and complicated pieces of kit.</p>
                          </div>
                        </li>
                      </ul>
                    </div>

                  </aside>

                </div><!--/post-view-->

              </div><!--/full-page-->
            </div><!-- /main-view -->
