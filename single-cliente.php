<?php 
	get_header(); 
?>
<div class="container marketing">
<div id="single" >
	<?php 
		while(have_posts()): the_post();

		$data_cadastro 	= get_post_meta($post->ID,'mb_data_cadastro');
		$logo 			= get_post_meta($post->ID,'mb_logo',true);
		$texto			= get_post_meta($post->ID,'mb_texto',true);
		$img_src		= wp_get_attachment_image_src($logo,'destaque',true);
		$galeria		= get_post_meta($post->ID,'mb_galeria');
		$endereco		= get_post_meta($post->ID,'mb_endereco',true);
		$complemento	= get_post_meta($post->ID,'mb_complemento',true);
		$cep			= get_post_meta($post->ID,'mb_cep',true);
		$cidade_estado	= get_post_meta($post->ID,'mb_cidade_estado',true);
		$bairro			= get_post_meta($post->ID,'mb_bairro',true);
		$telefones		= get_post_meta($post->ID,'mb_telefones');
		$google_maps	= get_post_meta($post->ID,'mb_google_maps',true);
		$site			= get_post_meta($post->ID,'mb_site',true);
	 ?>
	<?php 
		endwhile;
	?>
	 <h2>
	 	<?=the_title();?>
	 </h2>

	 <div class="span5">
		<?php 
	    	the_post_thumbnail('small-feature'); 
		?>
	 </div>

	 <div id="single-desc" class="span5">
	 	<?php 
	 		echo $texto;
	 	?>
	 </div>
<div id="galeria" class="span9">
	<?php
		if(count($galeria)>0):
	?>
	<a class="prev browse left"></a>
	<div class="scrollable " id="navigator">
	  <!-- root element for the items -->
	  <div class="items">
	  	
	  	<?php 
	  		$cont = 1;
	  		foreach ($galeria as $id):
			$img_src = wp_get_attachment_image_src($id,'galeria',true);
			if($cont % 5 == 0 || $cont==1){echo '<div>';}
	  	?>	    
	    	<a class="fancybox" href="<?=$img_src[0];?>" rel="galeria">
	    		<?php echo wp_get_attachment_image($id,'small-feature'); ?>
	    	</a>
	    <?php
	    	$cont++;
	    	if($cont % 5 == 0 || $cont-1 == count($galeria) ){echo '</div>';}
	    	endforeach;
	    ?>
	  </div><!-- /items -->
	</div><!-- /navigator -->
	<a class="next browse right"></a>
	<?php
		else:
	?>
		<p>Não possui fotos na galeria</p>
	<?php
	  endif;//se existe galeria
	 ?>
</div><!-- /galeria -->
<div class="span4">
		<h3>Nossa Localização</h3>
		<p> <?php echo $endereco?> </p>
		<p> <?php echo $complemento?> </p>
		<p> <?php echo $cep?> </p>
		<p> <?php echo $bairro.' - '.$cidade_estado?> </p>
		<?php 
			if($telefones[0]){
				echo '<ul class="unstyled">';
				foreach ($telefones[0] as $t) {
					# code...
					echo "<li> $t </li>";
				}
				echo '</ul>';
			}
		?>
		<?php if($site): ?>
			<a href="<?php echo $site?>" target="_blank">Visite nossa Página</a>
		<?php endif; ?>
	</div>
<div id="google-maps" class="span4">
	
	<?php  echo $google_maps;?>
</div>
</div><!-- /single -->

<?php 
	get_footer(); 
?>