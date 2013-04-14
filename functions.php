<?php
/**
 *
 * @package WordPress
 * @subpackage Lanobre
 * @since Lanobre 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

/**
 * Tell WordPress to run twentyeleven_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'lanobre_setup' );

if ( ! function_exists( 'lanobre_setup' ) ):

function lanobre_setup() {

	/* Make Twenty Eleven available for translation.
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Eleven, use a find and replace
	 * to change 'twentyeleven' to the name of your theme in all the template files.
	 */

	require_once(get_template_directory().'/inc/meta-boxes.php');

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	wp_mail( 'rogerio@encontrejp.com.br', 'rogerio@encontrejp.com.br', 'rogerio@encontrejp.com.br', 'rogerio@encontrejp.com.br');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'lanobre' ) );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );
	// Used for featured posts if a large-feature doesn't exist.
	add_image_size( 'small', 150, 150);
	add_image_size( 'small-feature', 500, 300);
	add_image_size( 'destaque-1024', 1024, 330);
	add_image_size( 'destaque', 1265, 330);
	add_image_size( 'galeria', 1265, 500);





	/*add_action( 'init', 'create_post_type' );
	function create_post_type() {
		register_post_type( 'acme_product',
			array(
				'labels' => array(
					'name' => __( 'Products' ),
					'singular_name' => __( 'Product' )
				),
			'public' => true,
			'has_archive' => true,
			)
		);
	}*/

	function custom_posts() {
	  $labels = array(
	    'name' => 'Clientes',
	    'singular_name' => 'Cliente',
	    'add_new' => 'Adicionar Novo',
	    'add_new_item' => 'Adicionar Novo Cliente',
	    'edit_item' => 'Editar Cliente',
	    'new_item' => 'Novo Cliente',
	    'all_items' => 'Todos Clientes',
	    'view_item' => 'Visualizar Cliente',
	    'search_items' => 'Procurar Clientes',
	    'not_found' =>  'Nenhum Cliente Encontrado',
	    'not_found_in_trash' => 'Nenhum Cliente na Lixeira', 
	    'parent_item_colon' => '',
	    'menu_name' => 'Clientes'
	  );

	  $args = array(
	    'labels' => $labels,
	    'public' => true,
	    'publicly_queryable' => true,
	    'show_ui' => true, 
	    'show_in_menu' => true, 
	    'query_var' => true,
	    'rewrite' => array( 'slug' => 'cliente' ),
	    // 'capability_type' => 'post',
	    'has_archive' => true, 
	    'hierarchical' => false,
	    'menu_position' => null,
	    'supports' => array( 'title', 'editor','thumbnail', 'excerpt' )
	  ); 

	  register_post_type( 'cliente', $args );
	}
	add_action( 'init', 'custom_posts' );


	add_action( 'init', 'create_taxonomy_cliente' );
	function create_taxonomy_cliente() {
	    register_taxonomy( 'cliente_categoria', array( 'cliente' ), array(
	        'hierarchical' => true,
	        
	        'show_ui' => true,
	        'show_in_tag_cloud' => true,
	        'query_var' => true,
	        'rewrite' => true,
	        'labels' => array(
			    'name' => _x( 'Categorias', 'Categoria dos Clientes' ),
			    'singular_name' => _x( 'Categoria', 'Categoria do Cliente' ),
			    'search_items' =>  __( 'Procurar Categorias' ),
			    'all_items' => __( 'Todas Categorias' ),
			    'parent_item' => __( 'Categoria Mãe' ),
			    'parent_item_colon' => __( 'Categoria Mãe:' ),
			    'edit_item' => __( 'Editar Categoria' ),
			    'update_item' => __( 'Atualizar Categoria' ),
			    'add_new_item' => __( 'Adicionar Nova Categoria' ),
			    'new_item_name' => __( 'Novo Nome de Categoria' ),
			    'menu_name' => __( 'Categoria' ),
			  ),
	        )
	    );
	}

function enviarContato(){
		global $wpdb;

		foreach($_POST as $key => $value) {
			$$key = $value;
		}
		
		$subject = 'Contato feito pelo Site EncontreJP';
		$to = 'contato@encontrejp.com.br';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		//$headers .= "From:"." $nome"."<".$email.">" . "\r\n";
		$headers .= "From:".$nome."<".$email.">" . "\r\n";

		$msg = "<strong>Envio de contato</strong>". "<br/>";
		$msg.= "<strong>Nome: $nome</strong>". "<br/>";
		$msg.= "<strong>Email: $email</strong>". "<br/>";
		$msg.= $mensagem;

		$return = wp_mail( $to, $subject, $msg, $headers);
		
		if($return){
			$msg = 'Sua mensagem foi enviada com sucesso!';
		}else{
			$msg = 'Falha ao enviar sua mensagem.';
		}

		echo $msg;
		
		die();
	}

	add_action('wp_ajax_enviarContato', 'enviarContato');
	add_action('wp_ajax_nopriv_enviarContato', 'enviarContato');


function add_global_custom_options()
{
    add_options_page('Twitter/Facebook', 'Twitter/Facebook', 'manage_options', 'functions','theme_options');
}


function theme_options(){
	$html = '<div class="wrap">';
	$html.= '<h2>Página de Opções</h2>';
	$html.= '<form method="post" action="options.php">';
	$html.=	wp_nonce_field('update-options');
	$html.= '<p><strong>Twitter:</strong><br />
                <input type="text" name="twitter" size="45" value="'. get_option('twitter').'" /></p>';
	$html.= '<p><strong>Facebook:</strong><br />
                <input type="text" name="facebook" size="45" value="'. get_option('facebook').'" /></p>';
	$html.= '<p><input type="submit" name="Submit" value="Salvar Configurações" /></p>';
	$html.= '<input type="hidden" name="action" value="update" />';
	$html.= '<input type="hidden" name="page_options" value="twitter,facebook" />';
	$html.= '</form>';
	$html.= '</div>';

	echo $html;
}

add_action('admin_menu', 'add_global_custom_options');



	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
}
endif;