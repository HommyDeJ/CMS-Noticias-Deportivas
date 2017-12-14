<?php
  $CI=& get_instance();

  $query="SELECT *
        FROM clasificados
           ORDER by id  desc limit 1";
     $omar=$CI->db->query($query)->result_array();

     ?>

<div class="container full-page">
      <div class="row">

        <!-- <div class="banner-view widget">
          <img src="img/ad.jpg" alt="">
        </div> -->

        <div class="breadcrumb-wrapper">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('Inicio')?>">Inicio</a></li>
            <li class="active">Clasificados</li>
          </ol>
        </div><!--/breadcrumb-wrapper-->


        <div class="post-container container">

          <div class="col-md-9 card-post-format post-view content">

            <header class="page-header">
                <div class="page-title">
                  <a id="btn" href="<?php echo base_url('Clasificados/crear')?>" class="btn btn-primary">Nuevo Clasificado</a>
                  <h2 class="title">Clasificados</h2>
                </div>
              </header>

            <div class="feature-view">
              <!--<div class="card-thumbnail">
                 <img src="<?php echo base_url()."imagenes/".$omar[0]['foto'] ?>" alt="">
                 <div class="card-meta">
                   <ul class="list">
                     <li><a href="#"><i class="fa fa-heart"></i>121</a></li>
                     <li><a href="#"><i class="fa fa-comment"></i>320</a></li>
                   </ul>
                 </div>
              </div>-->
              <!--<div class="col-inner">
                 <h4 class="title">
                   <a href="#"><?php echo $omar[0]['asunto'] ?></a>
                 </h4>
                 <p><?php echo $omar['0']['descripcion'] ?> </p>
               </div>-->
            </div>

            <div class="post margin-top-20 clearfix">

              <div class="row">

                <?php

                foreach ($consulta->result_array() as  $dato) {
                  $link=base_url()."imagenes/".$dato['foto'];
                  echo "

                  <!--Card-->
                  <div class='card card-cascade wider reverse my-4'>
                  <!--Card image-->
                  <div class='view overlay hm-white-slight'>
                  <img src='{$link}' height='350px'>
                  <a href=''>
                  <div class='mask'></div>
                  </a>
                  </div>
                  <!--/Card image-->
                  <!--Card content-->
                  <div class='card-body text-center'>
                  <!--Title-->
                  <h4 class='card-title'><strong>{$dato['asunto']}</strong></h4>
                  <p class='card-text'><strong>{$dato['descripcion']}</strong></p>
                  <h5 class='indigo-text'><strong>{$dato['fecha']}</strong></h5>
                  </div>
                  <!--/.Card content-->
                  </div>
                  <!--/.Card-->";
                }
                ?>
              </div>

              <footer class="page-footer clearfix">

                <ul class="pagination">
                  <li>Página:</li>
                <?php echo $paginacion ?>
                </ul>

              </footer>

            </div><!--/post-->


          </div><!--/news-post-format-->



        </div><!--/post-view-->

      </div><!--/full-page-->
    </div><!-- /main-view -->
