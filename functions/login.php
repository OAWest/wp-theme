<?php
/**!
 * Login Scripts
 */

// Start show less info to users on failed login for security.
	// (Will not let a valid username be known.)
	if ( ! function_exists('show_less_login_info') ) {
	  function show_less_login_info() {
		  return "<strong>ERROR</strong>: Incorrect Username or Password";
	  }
	}
	add_filter( 'login_errors', 'show_less_login_info' );
// End show less info to users on failed login for security.


// Start Changing the login theme
	function my_login_logo() {
			
			/* Optional Custom Login background
			if (!empty(get_theme_mod('header_background'))) {
				$background_url = esc_url(get_theme_mod('header_background'));
			}
			else {
				$background_url = get_bloginfo('template_directory') . '/images/banners/mountains.jpg';
			}
			*/
			$background_url = get_bloginfo('template_directory') . '/images/banners/mountains.jpg';
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
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );
// End Changing the login theme


// Start Replace WordPress URL with Website URL
function my_login_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
// End Replace WordPress URL with Website URL


// Start Replace WordPress title with Website title
function my_login_logo_url_title() {
    return get_bloginfo( 'description' );
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
// End Replace WordPress title with Website title


// Start Disable Sign-up page
	function rbz_prevent_multisite_signup() {
		wp_redirect(site_url());
		die();
	}
	add_action( 'signup_header', 'rbz_prevent_multisite_signup' );
// End Disable Sign-up page

?>