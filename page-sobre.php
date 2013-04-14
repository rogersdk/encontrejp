<?
get_header();
?>
  
    <div class="container marketing span9">
      <!-- Three columns of text below the carousel -->
      <h1>Sobre o EncontreJP</h1>
      <?php 
        if (have_posts()) : 
          while (have_posts()) : the_post();
          
      ?>
      <?php the_content(); ?>
      <?php 
          endwhile;
        endif;
      ?>
      </div><!-- /.row -->
<?
get_footer();
?>