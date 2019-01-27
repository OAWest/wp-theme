<?php

require_once get_template_directory() . '/functions/cleanup.php';
require_once get_template_directory() . '/functions/customizer.php';
require_once get_template_directory() . '/functions/login.php';
require_once get_template_directory() . '/functions/pagination.php';
require_once get_template_directory() . '/functions/navbars.php';
require_once get_template_directory() . '/functions/blocks-filter.php';

// Start Add Title Support
	function filter_wp_title( $title ) {
		$blog_title = get_bloginfo('name');
		$page_title = single_post_title();
		
		if(is_front_page()){
			return $blog_title;
		}
		else if(is_404()){
			return "404 Error | $blog_title";
		}
		else {         
			return "$page_title | $blog_title";
		}
	}
	add_filter( 'wp_title', 'filter_wp_title' );
// End Add Title Support


// Start Remove Read-More #jumpID
	function remove_more_link_scroll( $link ) {
		$link = preg_replace( '|#more-[0-9]+|', '', $link );
		return $link;
	}
	add_filter( 'the_content_more_link', 'remove_more_link_scroll' );
// End Remove Read-more #jumpID


// Start Add Read More Link
	function modify_read_more_link() {
		return '<a class="btn btn-block btn-default" more-link href="' . get_permalink() . '">Read More</a>';
	}
	add_filter( 'the_content_more_link', 'modify_read_more_link' );
// End Add Read More Link


// Start add scripts to wp_footer()
	function child_theme_footer_script() {
		require_once('footer.php');
	}
	add_action( 'wp_footer', 'child_theme_footer_script' );
// End add scripts to wp_footer()


// Start add bootstrap 4 img-fluid class
	function add_fluid_image_class ($class){
		$class .= ' img-fluid img-thumbnail';
		return $class;
	}
	add_filter('get_image_tag_class','add_fluid_image_class');
// End add bootstrap 4 img-fluid class


?>