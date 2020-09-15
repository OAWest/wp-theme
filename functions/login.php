<?php
/**!
 * Login Scripts
 */

// Show less info to users on failed login for security.
// Will not let a valid username be known.
add_filter( 'login_errors', function() {
	return "<strong>ERROR</strong>: Incorrect Username or Password";
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


// Custom Login theme
add_action( 'login_enqueue_scripts', function() {
	$background_url = !empty(get_theme_mod('login_background')) ? esc_url(get_theme_mod('login_background')) : get_template_directory_uri(). '/assets/images/banners/mountains.jpg';
	$logo_url = site_icon_url() ?? get_template_directory_uri(). '/assets/images/logos/favicon.png';
	
	echo '
	<style type="text/css">
		body.login {
			background-image: url("'.$background_url.'");
			background-size: cover;
			background-repeat: no-repeat;
			background-attachment: fixed;
		}
		
		#login h1 a,
		.login h1 a {
			background-image: url('.$logo_url.');
		}
		
		body.login #backtoblog,
		body.login #nav {
			background-color: white;
			padding-top: 10px;
			padding-bottom: 10px;
			box-shadow: 0 1px 3px rgba(0,0,0,.13);
		}
	</style>';
});

// Replace WordPress URL with Website URL
add_filter( 'login_headerurl', function(){
	return home_url();
});

// Replace WordPress title with Website title
add_filter( 'login_headertext', function(){
	return get_bloginfo('description');
});

// Disable Sign-up page
add_action( 'signup_header', function() {
	wp_redirect(site_url());
	die();
});

?>