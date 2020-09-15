<?php
/**!
 * Login Scripts
 */

// Remove top margin created by admin bar
add_action('get_header', function(){
	if(is_admin_bar_showing()) {
		remove_action('wp_head', '_admin_bar_bump_cb');
	}
});

// Add custom admin dashboard messages
add_action('wp_dashboard_setup', function() {
	global $wp_meta_boxes;
	
	// Check if theme update is available
	wp_add_dashboard_widget('custom_help_widget', 'Western Region WordPress Theme', function() {
		$installed_version = wp_get_theme()->get('Version');
		$git_file = wp_remote_get('https://api.github.com/repos/oawest/wp-theme/releases/latest');
		$git_file = wp_remote_retrieve_body($git_file);
		$git_data = json_decode($git_file);
		$latest_version	= $git_data['tag_name'] ?? '';

		$message = ($installed_version==$latest_version || $installed_version=='WR_Child')
			? '<p>You are on the latest version</p>'
			: '<h2 style="background-color:rgb(128, 0, 0); color:white; padding:15px;">
					An update is available for your theme.
					<a href="https://github.com/oawest/wp-theme/releases/latest" target="_blank" style="color: gold;text-decoration: none;">
						Version '.$latest_version.'
					</a>
				</h2>';

		echo '<p>Welcome to the Western Region WordPress Theme</p>
			<p>Need help? Contact the development team at:<br/><a href="mailto:technology@western.oa-bsa.org">technology@western.oa-bsa.org</a></p>
			<div style="width:100%; text-align:center;"><img src="'.get_template_directory_uri().'/images/logos/logo.jpg" style="max-width:100%; width:150px;"></div>
			<p>Installed theme version: <i>'.$installed_version.'</i></p>
			'.$message;
	});
});

?>