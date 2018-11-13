<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo get_bloginfo( 'name' ); ?></title>
  <meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_icon_url();?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php wp_head(); ?>
</head>

<body>
<nav class="navbar navbar-light navbar-expand-xl">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="/"></a>
    </div>
	<button type="button" class="navbar-toggler" onclick="openNav()" aria-expanded="false" aria-controls="navbar">
		<span class="navbar-toggler-icon"></span>
	</button>

		<?php 
		$defaults = array(
			'theme_location'  => '',
			'menu'            => '',
			'container'       => 'div',
			'container_class' => 'navbar-collapse collapse',
			'container_id'    => '',
			'menu_class'      => 'navbar-nav ml-auto',
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
	if (is_front_page() && !is_paged()) {
		require_once('banner.php'); // Include the header banner
		echo "<main class=\"index\">";
		require_once('sidebar.php'); // Iteriate through the sticky posts
	}
	else {echo "<main class=\"index\">";}
?>

<script>
    $(document).ready(function () {
        var $grid = $('#grid').isotope({
        itemSelector: '.grid-item',
        percentPosition: true
        });
        
        $grid.imagesLoaded().progress( function() {
            $grid.isotope('layout');
        });
    });
</script>
