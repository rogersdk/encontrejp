<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
  <?/*
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
*/?>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="viewport" content="width=device-width" />
<title><?php
  /*
   * Print the <title> tag based on what is being viewed.
   */
  global $page, $paged;

  wp_title( '|', true, 'right' );

  // Add the blog name.
  bloginfo( 'name' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    echo " - $site_description";
  ?>
  </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Um site de propaganda">
    <meta name="author" content="Encontre JP">
    <?php 
      $keywords = get_terms('cliente_categoria'); 
      foreach ($keywords as $k) {
        $key.= $k->name.',';
      }
    ?>
    <meta name="keywords" content="Propaganda Online,<?php echo $key;?>">
    <!-- Le styles -->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/estilo.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/fancybox.min.css">
    <!-- Fav and touch icons -->
  <?/*<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <?/*<link rel="stylesheet" href="text/css" href="<?php echo get_template_directory_uri();?>/css/estilo.css">*/?>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <?php
    if ( is_singular() && get_option( 'thread_comments' ) )
      wp_enqueue_script( 'comment-reply' );
  ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38376585-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/favicon.png" >
  </head>
  <body>
  <div class="container">
    
    <div class="">
        <div class="navbar navbar-inverse container" >
          <div class="navbar-inner">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?php echo bloginfo('url'); ?>">EncontreJP</a>
            <div class="nav-collapse collapse">
              <ul class="nav">
                <?php $active = 'class="active"'; ?>
                <li ><a href="<?php echo bloginfo('url'); ?>/sobre/">Sobre</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <?php 
                      $taxonomy = 'cliente_categoria';
                      $categorias = get_terms($taxonomy,'');
                      // print_r($categorias);
                      foreach ($categorias as $key => $value):  
                    ?>
                      <li>
                        <a href="<?php echo get_term_link($value,$taxonomy);?>"><?=$value->name ?></a>
                      </li>
                    <?php 
                      endforeach;
                    ?>
                    <!-- <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="nav-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li> -->
                  </ul>
                </li>
                <li><a href="<?php echo bloginfo('url'); ?>/contato/">Contato</a></li>
                <li>
                  
                </li>
                <li >
                  <div id="search-form">
                    <form action="<?=bloginfo('url')?>" method="get" id="ssearch-form">
                      <!-- <input type="hidden" name="post_type" value="cliente"> -->
                      <input type="text" id="s" name="s" placeholder="Encontre Aqui" value=""/>
                      <input id="searchsubmit" class="btn btn-primary" type="submit" value="Pesquisar"/>
                    </form>
                  </div>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->
    </div><!-- /.navbar-wrapper -->