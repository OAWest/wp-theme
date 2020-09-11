<?php

	require_once get_template_directory() . '/functions/cleanup.php';
	require_once get_template_directory() . '/functions/customizer.php';
	require_once get_template_directory() . '/functions/login.php';
	require_once get_template_directory() . '/functions/pagination.php';
	require_once get_template_directory() . '/functions/navbars.php';
	require_once get_template_directory() . '/functions/add_theme_support.php';
	require_once get_template_directory() . '/functions/featured-image.php';

	// Add Title Support
	add_filter( 'wp_title', function($title){
		if(is_front_page()){
			return get_bloginfo('name');
		}
		else if(is_404()){
			return "404 Error | ".get_bloginfo('name');
		}
		return single_post_title()." | ".get_bloginfo('name');
	});

	// Remove Read-More #jumpID
	add_filter( 'the_content_more_link', function($link){
		return preg_replace( '|#more-[0-9]+|', '', $link );
	});

	// Add Read More Link
	add_filter( 'the_content_more_link', function(){
		return '<a class="btn btn-block btn-default" more-link href="' . get_permalink() . '">Read More</a>';
	});

	// Add scripts to wp_footer()
	add_action( 'wp_footer', function() {
		require_once('footer.php');
	});

	// Add bootstrap 4 img-fluid class
	add_filter('get_image_tag_class', function($class){
		return $class.' img-fluid img-thumbnail';
	});

	// Enqueue Scripts
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', get_template_directory_uri().'/assets/js/jquery.min.js', null, '3.5.1', false);
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', null, '4.5.2', true);
	wp_enqueue_script('isotope', get_template_directory_uri().'/assets/js/isotope.pkgd.min.js', null, '3.0.6', true);
	wp_enqueue_script('fit-columns', get_template_directory_uri().'/assets/js/fit-columns.js', null, '1.1.4', true);
	wp_enqueue_script('imagesloaded', get_template_directory_uri().'/assets/js/imagesloaded.pkgd.min.js', null, '4.1.4', true);

	// Enqueue Styles
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', null, '4.5.2', 'all');
	wp_enqueue_style('fontawesome', get_template_directory_uri().'/assets/css//fontawesome.min.css', null, '5.14.0', 'all');

?>