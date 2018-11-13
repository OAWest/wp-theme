<?php

require_once get_template_directory() . '/functions/cleanup.php';
require_once get_template_directory() . '/functions/customizer.php';
require_once get_template_directory() . '/functions/pagination.php';
require_once get_template_directory() . '/functions/navbars.php';


// Start Increase the max upload size
	@ini_set( 'upload_max_size' , '64M' );
	@ini_set( 'post_max_size', '64M');
	@ini_set( 'max_execution_time', '300' );
// End Increase the max upload size


// Start Remove Read-More #jumpID
	function remove_more_link_scroll( $link ) {
		$link = preg_replace( '|#more-[0-9]+|', '', $link );
		return $link;
	}
	add_filter( 'the_content_more_link', 'remove_more_link_scroll' );
// End Remove Read-more #jumpID


// Start add scripts to wp_footer()
	function child_theme_footer_script() {
		show_admin_bar( false );
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