<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<section id="primary">
	<div id="content" role="main" class="span9">

	<?php if ( have_posts() ) : ?>
<div id="container" class>  
    <div id="content">
<?php
	while ( have_posts() ) : the_post();
?>
	<div class="span8">
		<a href="<?php echo the_permalink(); ?>">
			<h3><?php echo the_title(); ?></h3>
		</a>
		<p><?php echo the_content();?></p>
		
	</div>

<!-- this is our loop -->
<?php endwhile; ?>
<?php else : ?>
	T_T nada foi encontrado
<?php endif; ?>           

    </div><!-- #content -->     
</div><!-- #container -->
	</div><!-- #content -->
</section><!-- #primary -->
<?php get_footer(); ?>