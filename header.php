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
			'fallback_cb'     => 'false',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 1,
			'walker'          => ''
		);
		
		wp_nav_menu( $defaults );
		//<ul id="menu-main" class="nav navbar-nav navbar-right">
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

<?php
	// If this is the first index page, include the following
	if (is_front_page()) {
		require_once('banner.php'); // Include the header banner
		echo "<main class=\"index\">";
		require_once('sidebar.php'); // Iteriate through the sticky posts
	}
	else {echo "<main class=\"index\">";}
?>
