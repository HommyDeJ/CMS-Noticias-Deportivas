<?php
  $CI=& get_instance();
  $query="SELECT *
  FROM noticia
  ORDER by idnoticia  desc limit 1";
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
            <li class="active">Noticias</li>
          </ol>
        </div><!--/breadcrumb-wrapper-->


        <div class="post-container container">

          <div class="col-md-9 card-post-format post-view content" >
            <a id="btn" href="<?php echo base_url('Noticias/Nueva')?>" class="btn btn-primary">Nueva Noticia</a>
            <header class="page-header">
                <div class="page-title">
                  <h2 class="title">Noticias</h2>
                </div>
              </header>

            <div class="feature-view">
              <div class="card-thumbnail">
                 <img src="<?php echo base_url()."imagenes/".$omar['0']['foto']?>">
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
                 <p><?php echo $omar['0']['resumen'] ?></p>
               </div>
            </div>

            <div class="post margin-top-20 clearfix">

              <div class="row">
                <?php
                foreach ($consulta->result_array() as  $dato) {
                  $linkver=base_url('noticias/mostrarnoticia/').$dato['idnoticia'];
                  $link=base_url()."imagenes/".$dato['foto'];
                  echo "
                  <div class='col-md-4 card-item'>
                    <div class='card-thumbnail'>
                      <a href='{$linkver}'><img height='250px' width='250px' src='{$link}'></a>
                      <div class='card-meta'>
                        <ul class='list'>
                        <li><a href='{$linkver}'><i class=''>{$dato['fecha']}</i></a></li>
                        <li><a href=''><i class=''>{$dato['autor']}</i></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class='col-inner card-'>
                      <h4 class='title'>
                        <a href='{$linkver}'>{$dato['titulo']}</a>
                      </h4>
                      <p>{$dato['resumen']}</p>
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

          <aside class="col-md-3 sidebar">

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
