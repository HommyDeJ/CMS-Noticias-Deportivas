<?php
  $CI=& get_instance();

  $query="SELECT *
        FROM galeria
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
            <li class="active">Galería</li>
          </ol>
        </div><!--/breadcrumb-wrapper-->


        <div class="post-container three-col-view container">

          <div class="col-md-7 col-md-push-2 news-post-format post-view content">
            <div class="post clearfix">
              <a id="btn" href="<?php echo base_url('Galeria/nueva')?>" class="btn btn-primary">Nueva Foto</a>
                <header class="page-header">
                  <div class="page-title">
                    <h2 class="title">Galería</h2>
                  </div>
                </header>

                <div class="feature-view">
                  <!-- if use images -->
                  <!-- <div class="card-thumbnail">
                     <img src="img/travel_11.jpg" alt="">
                     <div class="card-meta">
                       <ul class="list">
                         <li><a href="#"><i class="fa fa-heart"></i>121</a></li>
                         <li><a href="#"><i class="fa fa-comment"></i>320</a></li>
                       </ul>
                     </div>
                  </div> -->
                  <div class="video-wrapper">
                   <iframe src="https://www.youtube.com/embed/Qr6jAnecW1M" frameborder="0" allowfullscreen></iframe>
                 </div>
                  <div class="col-inner">
                     <h4 class="title">
                       <a href="#">Vídeo Final Web</a>
                     </h4>
                     <p>Hommy De Jesús</p>
                   </div>
                </div><!--/feature-view-->

               <div class="row card-list">

                 <?php
                 foreach ($consulta->result_array() as  $dato) {
                   $link=base_url()."imagenes/".$dato['foto'];
                   echo "

                   <div class='col-md-6 card-item'>

                     <div class='card-thumbnail'>
                       <a href='#'><img height='250px' width='250px' src='{$link}'></a>
                       <div class='card-meta'>
                         <ul class='list'>
                           <li><a href='#'><i class=''>{$dato['fecha']}</i></a></li>
                         </ul>
                       </div>
                     </div>
                     <div class='col-inner'>
                       <h4 class='title'>
                         <a href='#'>{$dato['nombre']}</a>
                       </h4>
                       <p>{$dato['descripcion']}</p>
                     </div>
                   </div>

                   ";

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

          <aside class="col-md-2 col-md-pull-7 col-sm-6 second-sidebar">

            <div class="widget banner">
              <header class="widget-header">
                <h4 class="title">
                  Advertisement
                </h4>
              </header>
              <img src="img/banner_600.jpg" alt="">
            </div><!--/widget banner-->
          </aside>

          <aside class="col-md-3 col-sm-6 sidebar">

            <div class="widget">
              <header class="widget-header">
                <h4 class="title">
                  MOST POPULAR
                </h4>
              </header>
              <div class="margin-top-20">
                <ul class="media-list list">
                  <li class="media">
                    <div class="title margin-bottom-10">
                      <a href="#">Scenes from the field</a>
                    </div>
                    <a href="#" class="pull-left">
                      <img src="img/aside_post_1.jpg" alt="" class="media-object">
                    </a>
                    <div class="media-body">
                      <p class="small">Browse through images you don't always see in news reports, taken by CNN teams all around the world.</p>
                    </div>
                  </li>
                  <li class="media">
                    <div class="title margin-bottom-10">
                      <a href="#">Heroes or villains? Cricket's rebels</a>
                    </div>
                    <a href="#" class="pull-left">
                      <img src="img/aside_post_2.jpg" alt="" class="media-object">
                    </a>
                    <div class="media-body">
                      <p class="small">Gareth Evans was just a small boy when a team of West Indies cricketers arrived in apartheid South Africa. Their lives would never be the same.</p>
                    </div>
                  </li>
                  <li class="media">
                    <div class="title margin-bottom-10">
                      <a href="#">Heroes or villains? Cricket's rebels</a>
                    </div>
                    <a href="#" class="pull-left">
                      <img src="img/aside_post_3.jpg" alt="" class="media-object">
                    </a>
                    <div class="media-body">
                      <p class="small">Gareth Evans was just a small boy when a team of West Indies cricketers arrived in apartheid South Africa. Their lives would never be the same.</p>
                    </div>
                  </li>
                  <li class="media">
                    <div class="title margin-bottom-10">
                      <a href="#">New year, chance to reclaim humanity?</a>
                    </div>
                    <a href="#" class="pull-left">
                      <img src="img/aside_post_4.jpg" alt="" class="media-object">
                    </a>
                    <div class="media-body">
                      <p class="small">Gareth Evans was just a small boy when a team of West Indies cricketers arrived in apartheid South Africa. Their lives would never be the same.</p>
                    </div>
                  </li>
                  <li class="media">
                    <div class="title margin-bottom-10">
                      <a href="#">Tribesmen join forces vs. al Qaeda</a>
                    </div>
                    <a href="#" class="pull-left">
                      <img src="img/aside_post_5.jpg" alt="" class="media-object">
                    </a>
                    <div class="media-body">
                      <p class="small">Gareth Evans was just a small boy when a team of West Indies cricketers arrived in apartheid South Africa. Their lives would never be the same.</p>
                    </div>
                  </li>
                  <li class="media">
                    <div class="title margin-bottom-10">
                      <a href="#">Six odd and crazy technologies</a>
                    </div>
                    <a href="#" class="pull-left">
                      <img src="img/aside_post_6.jpg" alt="" class="media-object">
                    </a>
                    <div class="media-body">
                      <p class="small">Gareth Evans was just a small boy when a team of West Indies cricketers arrived in apartheid South Africa. Their lives would never be the same.</p>
                    </div>
                  </li>
                </ul>
              </div>
            </div><!--/widget list-->
          </aside>

        </div><!--/post-view-->

      </div><!--/full-page-->
    </div><!-- /main-view -->
