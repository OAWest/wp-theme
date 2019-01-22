<?php
/**!
 * Cleanup
 */

// Start Less stuff in <head>
	if ( ! function_exists('b4st_cleanup_head') ) {
	  function b4st_cleanup_head() {
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
	  }
	}
	add_action('init', 'b4st_cleanup_head');
// End Less stuff in <head>


// Start update old jquery link
	add_action('wp_enqueue_scripts', 'no_more_jquery');
	function no_more_jquery(){
		wp_deregister_script('jquery');
		wp_register_script('jquery', "http" . 
		($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . 
		"://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js", false, null);
		wp_enqueue_script('jquery');
	}
// End update old jquery link

// Start Remove WordPress Version
	remove_action('wp_head', 'wp_generator');
	function remove_WP_version(){
		return '';
	}
	add_filter('the_generator', 'remove_WP_version');
// End Remove WordPress Version

?>