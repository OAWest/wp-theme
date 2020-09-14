<?php
/**!
 * Login Scripts
 */

// Show less info to users on failed login for security.
// Will not let a valid username be known.
add_filter( 'login_errors', function() {
	return "<strong>ERROR</strong>: Incorrect Username or Password";
});

// Start Add Custom Widget
	function custom_dashboard_help() {
		$theme_version   = wp_get_theme()->get('Version');
		$current_version = "";
		
		$url = "https://raw.githubusercontent.com/OAWest/wp-theme/master/style.css?".date_timestamp_get(date_create());

		$git_file = wp_remote_get($url);
		$git_file = wp_remote_retrieve_body($git_file);
		$git_file = explode("\n", $git_file);
		if ($git_file) {
			$iter = 0;
			$git_file_size = sizeof($git_file);
			while ($iter < $git_file_size) {
				$line = $git_file[$iter];
				if (substr($line, 0, 9)=="Version: ") {
					$current_version = substr($line, 9, strlen($line));
					$current_version = strip_tags($current_version);
					$current_version = str_ireplace(array("\r","\n",'\r','\n'),'', $current_version);
					
					if($theme_version == $current_version) {
						$message = "You are running the current version of the theme <i>$theme_version</i>";
					}
					else if($theme_version=='WR_Child') {
						$message = "You are running the current version of the theme <i>$current_version</i>";
					}
					else {
						$message = "<h2 style=\"background-color:rgb(128, 0, 0); color:white; padding:15px;\">An update is available for your theme. <a href=\"https://github.com/OAWest/wp-theme\" target=\"_blank\" style=\"color: gold;text-decoration: none;\">Version $current_version</a></h2>";
					}
					break;
				}
				$iter++;
			}
		} else {
			$message = 'To update to the current version, please visit <a href="https://github.com/OAWest/wp-theme" target="_blank">Github.com</a>';
		} 
		
		echo
			"<p>Welcome to the Western Region WordPress Theme!</p>".
			"<p>Need help? Contact the development team at:<br/><a href=\"mailto:Webmaster@western.oa-bsa.org\">Webmaster@western.oa-bsa.org</a></p>".
			"<div style=\"width:100%; text-align:center;\"><img src=\"".get_template_directory_uri()."/images/logos/logo.jpg\" style=\"max-width:100%; width:150px;\"></div>".
			"<p>$message</p>";
	}
	
	add_action('wp_dashboard_setup', function() {
		global $wp_meta_boxes;
		wp_add_dashboard_widget('custom_help_widget', 'Western Region WordPress Theme', 'custom_dashboard_help');
	});
// End Add Custom Widget


// Change the login theme
add_action( 'login_enqueue_scripts', function() {
		
	/* Custom Login background */
	if (!empty(get_theme_mod('login_background'))) {
		$background_url = esc_url(get_theme_mod('login_background'));
	}
	else {
		$background_url = get_template_directory_uri(). '/images/banners/mountains.jpg';
	}
	?>
	<style type="text/css">
		body.login {
			background-image: url("<?php echo $background_url; ?>");
			background-size: cover;
			background-repeat: no-repeat;
			background-attachment: fixed;
		}
		
		#login h1 a, .login h1 a {
			background-image: url(<?php echo site_icon_url();?>);
		}
		
		body.login #backtoblog, body.login #nav {
			background-color: white;
			padding-top: 10px;
			padding-bottom: 10px;
			box-shadow: 0 1px 3px rgba(0,0,0,.13);
		}
	</style>
	<?php
});

// Replace WordPress URL with Website URL
add_filter( 'login_headerurl', 'home_url');

// Replace WordPress title with Website title
add_filter( 'login_headertitle', get_bloginfo('description') );

// Disable Sign-up page
add_action( 'signup_header', function() {
	wp_redirect(site_url());
	die();
});

?>