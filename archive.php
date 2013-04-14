<?
get_header();

$cat = get_query_var('cliente_categoria');
$term = get_term_by('slug',$cat,'cliente_categoria');

$args = array(
  'post_type'	=> 'cliente',
  'cliente_categoria'	=> $term->slug,
  'meta_query' 	=> array(
                    array(
                       'key' => 'mb_destaque',
                       'value' => '1',
                       'compare' => '='
                    )
                  )
);
query_posts( $args );

?>
<div id="myCarousel" class="carousel slide">
  <?php
    if(have_posts()): 
  ?>
      <div class="carousel-inner">

        <?php 
          $cont = 0;
          while ( have_posts() ) : the_post();
          $cont++;
         ?>        
        <div class="item <?=$cont==1?'active':'' ?>">
          <?/*<img src="<?=get_template_directory_uri()?>/imagens/apagar/slide-03.jpg" alt="">*/?>
          <?php 
            the_post_thumbnail('destaque'); 
          ?>
          <div class="container">
            <div id="caption" class="carousel-caption">
              <a href="<?php echo the_permalink(); ?>">
                <h1><?=the_title();?></h1>
                <!-- <p class="lead"><strong><?=the_excerpt()?></strong></p> -->
                <strong><?=the_excerpt()?></strong>
                <!-- <a class="btn btn-large btn-primary" href="<?=the_permalink()?>">Saiba mais</a> -->
              </a>
            </div>
          </div>
        </div>
        <?php 
          endwhile;
        ?>
      </div>

      <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
  <?php endif; //have_posts ?>
    </div><!-- /.carousel -->


    <?php 
      $args = array(
      'post_type'=> 'cliente',
      'cliente_categoria'	=> $term->slug,
      'posts_per_page'=>'6'
      );
      query_posts( $args );
     ?>

    <div class="container marketing">
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <?php 
          while(have_posts()): the_post();
         ?>
        <div class="span4 miniaturas">
          <div>
            <a href="<?php the_permalink(); ?>">
              <?php 
                if(has_post_thumbnail()):
                  the_post_thumbnail('small');
                  else: 
              ?>
                <img src="<?php echo get_template_directory_uri();?>/imagens/sem_imagem.jpg" alt="">
              <?php endif; ?>
            </a>
          </div>
          <a href="<?php the_permalink(); ?>" >
            <h2><?php the_title(); ?></h2>
            
              <?php the_excerpt(); ?>
            
          </a>

          <!-- <p><a class="btn" href="#">View details &raquo;</a></p> -->
        </div><!-- /.span4 -->
        <?php
          endwhile;
         ?>
      </div><!-- /.row -->
      
<?
get_footer();
?>