<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title(); ?></title>
  <meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_icon_url();?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<nav class="navbar navbar-light navbar-expand-xl<?php if(is_admin_bar_showing()) { echo ' navbar-admin-space'; } ?>">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="/"></a>
    </div>
	<button type="button" class="navbar-toggler" data-toggle="slide-collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div id="navbar" class="navbar-collapse slide-collapse">
		<?php clean_custom_menu("nav_menu"); ?>
	</div>
	<script>
		// mobile menu slide from the left
		$('[data-toggle="slide-collapse"]').on('click', function() {
			$navMenuCont = $($(this).data('target'));
			$navMenuCont.animate({'width':'toggle'}, 350);
		});
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
