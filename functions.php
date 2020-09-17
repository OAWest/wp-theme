<?php
	require_once get_template_directory() . '/functions/admin.php';
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

	// Add bootstrap img-fluid class
	add_filter('get_image_tag_class', function($class){
		return $class.' img-fluid img-thumbnail';
	});

	// Less stuff in <head>
	add_action('init', function() {
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'index_rel_link');
		remove_action('wp_head', 'feed_links', 2);
		remove_action('wp_head', 'feed_links_extra', 3);
		remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
		remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('wp_print_styles', 'print_emoji_styles');
		});

	// Remove WordPress Version
	add_filter('the_generator', function(){
		return '';
	});

	// Add JavaScript and CSS
	add_action( 'wp_enqueue_scripts', function(){
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
		wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
	});

?>