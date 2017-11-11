<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo get_bloginfo( 'name' ); ?></title>
  <meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_icon_url();?>">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  <style>
      <?php
	  $options = get_option( 'govpress', false );
	  if (!empty(get_theme_mod('header_background' ))) { echo "header.banner.mountains::after {background-image: url(\"";  echo esc_url(get_theme_mod('header_background'))."\"); }\n\t";}
	  if (!empty(get_theme_mod('nav_logo' ))) { echo ".navbar-fixed-top .container .navbar-header .navbar-brand {background-image: url(\"";  echo esc_url(get_theme_mod('nav_logo'))."\"); }\n\t";}
	  if (!empty(get_theme_mod('header_logo'))) { echo ".logo-western-region-white {background-image: url(\""; echo esc_url(get_theme_mod('header_logo'))."\"); }\n\t";}
	  if (!empty($options['primary_color'] ) ) { echo "body { color: ".$options['primary_color']."; }\n\t";}
	  if (!empty(get_theme_mod('background_color'))){ echo "  body { background-color: #".get_theme_mod('background_color')."; }\n\t"; }
	  if (!empty($options['primary_link_color']) ) { echo "  a { color: ".$options['primary_link_color']." }\n\t"; }
	  if (!empty($options['primary_link_color']) ) { echo "  .btn-default { border-color: ".$options['primary_link_color']." }\n\t"; }
	  if (!empty($options['primary_link_hover']) ) { echo "  a:hover { color: ".$options['primary_link_hover']."; }\n"; }
	  if (!empty($options['primary_link_hover']) ) { echo "  .btn-default:hover { border-color: ".$options['primary_link_hover']." }\n\t"; }
	  ?>
  </style>
  <?php wp_head(); ?>
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" onclick="openNav()" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"></a>
    </div>

		<?php 
		$defaults = array(
			'theme_location'  => '',
			'menu'            => '',
			'container'       => 'div',
			'container_class' => 'navbar-collapse collapse',
			'container_id'    => '',
			'menu_class'      => 'nav navbar-nav navbar-right',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 1,
			'walker'          => ''
		);
		 
		wp_nav_menu( $defaults );
		?>

    <div id="navbar" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>
      
        <?php 
		$menuParameters = array(
		  'container'       => false,
		  'echo'            => false,
		  'items_wrap'      => '%3$s',
		  'depth'           => 1
		);
	  echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
	  ?>
      
    </div>
    <script>
      function openNav() {
	    document.getElementById("navbar").style.width = "250px";
	  }
      function closeNav() {
        document.getElementById("navbar").style.width = "0";
      }
    </script>
  </div>
</nav>
