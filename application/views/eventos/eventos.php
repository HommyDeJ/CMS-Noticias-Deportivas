<?php
  $CI=& get_instance();

  $query="SELECT *
        FROM eventos
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
            <li class="active">Eventos</li>
          </ol>
        </div><!--/breadcrumb-wrapper-->


        <div class="post-container container">

          <div class="col-md-9 card-post-format post-view content">
            <a id="btn" href="<?php echo base_url('Eventos/crear')?>" class="btn btn-primary">Nuevo Evento</a>
            <header class="page-header">
                <div class="page-title">
                  <h2 class="title">Eventos</h2>
                </div>
              </header>

            <div class="feature-view">
              <div class="card-thumbnail">
                 <img src="<?php echo base_url()."imagenes/".$omar['0']['foto']?>" alt="">
                 <div class="card-meta">
                   <ul class="list">
                     <li><a href="#"><i class="fa fa-heart"></i>121</a></li>
                     <li><a href="#"><i class="fa fa-comment"></i>320</a></li>
                   </ul>
                 </div>
              </div>
              <div class="col-inner">
                 <h4 class="title">
                   <a href="#"><?php echo $omar['0']['titulo'] ?></a>
                 </h4>
                 <p><?php echo $omar['0']['descripcion'] ?></p>
               </div>
            </div>

            <div class="post margin-top-20 clearfix">

              <div class="row">

                <?php
                foreach ($consulta->result_array() as  $dato) {
                  $linkver=base_url('Eventos/mostrarevento/').$dato['id'];
                  $link=base_url()."imagenes/".$dato['foto'];
                  echo "
                  <div class='col-md-4 card-item'>
                    <div class='card-thumbnail'>
                      <a  href='{$linkver}'><img height='250px' width='250px' src='{$link}'></a>
                      <div class='card-meta'>
                        <ul class='list'>
                          <li><a href='$linkver'><i class=''>{$dato['fecha']}</i></a></li>

                        </ul>
                      </div>
                    </div>
                    <div class='col-inner card-'>
                      <h4 class='title'>
                        <a href='{$linkver}'>{$dato['titulo']}</a>
                      </h4>
                      <p>{$dato['descripcion']}</p>
                    </div>
                  </div><!--/card-item-->";
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
