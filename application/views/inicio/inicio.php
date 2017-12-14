<?php
  $CI=& get_instance();

  $query="SELECT *
        FROM galeria
           ORDER by id  desc limit 3";
     $omar=$CI->db->query($query)->result_array();

 ?>



 <div class='fullslider-wrapper'>
   <div class='slider-widget'>
     <ul class='slider'>
       <?php
       foreach ($omar as  $dato) {
         $link=base_url()."imagenes/".$dato['foto'];
         echo " <li><a href='#'><img height='440px' width='100%' src='{$link}'></a>
                <div class='widget-content caption-block'>
                <div class='container'>
                <div class='row'>
                  <h3 class='title widget-title col-md-12'>
                    <a href='#'>{$dato['nombre']}</a>
                  </h3>
                  <p class='slider-caption col-md-12'>{$dato['descripcion']}</p>";
                }
                ?>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>


     <!--<div class="fullslider-wrapper">
        <div class="slider-widget">
          <ul class="slider">
            <li><a href="#"><img src="<?php echo base_url()."imagenes/".$omar['0']['foto']?>" alt=""></a>
              <div class="widget-content caption-block">
                <div class="container">
                  <div class="row">
                    <h3 class="title widget-title col-md-12">
                      <a href="#"><?php echo $omar['0']['nombre'] ?></a>
                    </h3>
                    <p class="slider-caption col-md-12"><?php echo $omar['0']['descripcion'] ?></p>
                  </div>
                </div>
              </div>
            </li>
          </ul>
      </div>
    </div>-->

    <div class="container main-view">
      <div class="row">

        <div class="col-md-6 main-content">
          <!--eventos-->
          <?php


        $CI=& get_instance();


    $rs = $CI->db->query("SELECT * FROM noticia ORDER BY idnoticia DESC LIMIT 5")->result_array();
    foreach ($rs as $fila) {
      $link1=base_url()."imagenes/".$fila['foto'];
      echo"
          <div class='widget'>
            <div class='row'>
              <div class='widget-thumbnail widget-thumbnail-right-content col-md-12 col-lg-6'>
                <img src='{$link1}' alt=''>
              </div>
              <div class='widget-content widget-right-content col-md-12 col-lg-6'>
                <h4 class='title widget-title'>
                  {$fila['titulo']}
                </h4>
                <p>{$fila['resumen']}</p>
              </div>
            </div>
          </div><!--/widget right-content -->";
        }
          ?>


        </div><!--/main-content-->

        <div class="col-md-3 second-content">

          <div class="widget">
            <header class="widget-header">
              <h4 class="title">
                Vídeo Final
              </h4>
            </header>
            <div class="widget-thumbnail hover-thumbnail video-box">
              <a href="#" class="media-object"><img src="img/4.jpg" alt=""></a>
            </div>
            <div class="widget-content">
              <h3 class="title widget-title">
                Adrian Sutil switches to Sauber for 2014 F1 campaign
              </h3>
              <p>Germany's Adrian Sutil has landed a drive with Sauber for the 2014 season, the Swiss Formula One team announced Friday</p>
            </div>
          </div><!--/widget video-->

        </div><!--/second-content-->

        <div class="col-md-3 sidebar">

          <div class="widget">
            <header class="widget-header">
              <h4 class="title">
                Opinion
              </h4>
            </header>
            <div class="widget-content">
              <ul class="media-list list">
                <li class="media">
                  <a href="#" class="pull-right">
                    <img src="img/avatar_1.jpg" alt="" class="media-object">
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
            </div>
          </div><!--/widget list-->


        </div><!--/sidebar-->

      </div>
    </div><!-- /main-view -->
