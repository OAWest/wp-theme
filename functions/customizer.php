<?php
/**!
 * Customizer
 */

// Set the default site icon
function set_default_site_icon(){
    if(!has_site_icon()  && !is_customize_preview()){
		echo '<link rel="shortcut icon" type="image/x-icon" href="/wp-content/themes/WR/assets/images/logos/favicon.png">';
		echo '<link rel="apple-touch-icon" href="/wp-content/themes/WR/assets/images/logos/favicon.png">';
    }
}
add_action('wp_head', 'set_default_site_icon');
add_action('login_head', 'set_default_site_icon');

// Register additional customizer options
add_action( 'customize_register', function($wp_customize){

	// Remove the unused default customizer options
	$wp_customize->remove_control("header_textcolor");
	$wp_customize->remove_section("background_image");

	// Add an images section
	$wp_customize->add_section( 'site_images' , array(
    	'title'       => __( 'Images', 'WR_theme' ),
    	'priority'    => 31,
    	'description' => 'Upload a images for the website identity',
	) );

	// Add a nav logo image control option
	$wp_customize->add_setting( 'nav_logo', array(
		'default' => get_template_directory_uri() . '/assets/images/logos/western-region.png',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'nav_logo', array(
    	'label'    => __( 'Navigation bar logo', 'WR_theme' ),
		'section'  => 'site_images',
		'settings' => 'nav_logo',
	) ) );

	// Add a header background image control option
	$wp_customize->add_setting( 'header_background', array(
		'default' => get_template_directory_uri() . '/assets/images/banners/mountains.jpg',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_background', array(
    	'label'    => __( 'Banner background image', 'WR_theme' ),
		'section'  => 'site_images',
		'settings' => 'header_background',
	) ) );

	// Add a header logo image control option
	$wp_customize->add_setting( 'header_logo', array(
		'default' => get_template_directory_uri() . '/assets/images/logos/western-region-white.png',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo', array(
    	'label'    => __( 'Banner inner image', 'WR_theme' ),
		'section'  => 'site_images',
		'settings' => 'header_logo',
	) ) );

	// Add a default favicon logo image control option
	$wp_customize->add_setting( 'site_icon', array(
		'default' => get_template_directory_uri() . '/assets/images/logos/favicon.png',
		'sanitize_callback' => 'esc_url_raw'
	) );

	// Add a login background image control option
	$wp_customize->add_setting( 'login_background', array(
		'default' => get_template_directory_uri() . '/assets/images/banners/mountains.jpg',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'login_background', array(
    	'label'    => __( 'Login page background image', 'WR_theme' ),
		'section'  => 'site_images',
		'settings' => 'login_background',
	) ) );

	// Add a primary color editor control option
	$wp_customize->add_setting( 'WR_theme[primary_color]', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
		'label' => __( 'Primary Text Color', 'WR_theme' ),
		'section' => 'colors',
		'settings' => 'WR_theme[primary_color]'
	) ) );

	// Add a primary link color editor control option
	$wp_customize->add_setting( 'WR_theme[primary_link_color]', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_link_color', array(
		'label' => __( 'Primary Link Color', 'WR_theme' ),
		'section' => 'colors',
		'settings' => 'WR_theme[primary_link_color]'
	) ) );

	// Add a primary color hover editor control option
	$wp_customize->add_setting( 'WR_theme[primary_link_hover]', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_link_hover', array(
		'label' => __( 'Primary Link Hover', 'WR_theme' ),
		'section' => 'colors',
		'settings' => 'WR_theme[primary_link_hover]'
	) ) );
});

// Add styles to the editor
add_theme_support( 'editor-styles' );
add_action('admin_init', function(){
	add_editor_style( 'assets/css/bootstrap.min.css' );
	add_editor_style( 'assets/css//fontawesome.min.css' );
	add_editor_style( 'style.css' );
});

// Add JavaScript and CSS files
add_action( 'wp_enqueue_scripts', function() {

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
	
		// Add inline CSS styles to an existing CSS stylesheet
        //All the user input CSS settings as set in the plugin settings
		$options = get_option( 'WR_theme', false );
		$custom_css = '';
		$custom_css .= !empty(get_theme_mod('header_background'))
			? ' header.banner.mountains::after {
					background-image: url("'.esc_url(get_theme_mod('header_background')).'");
				}'
			: '';
		$custom_css .= !empty(get_theme_mod('nav_logo'))
			? ' .navbar-light .container .navbar-header .navbar-brand {
					background-image: url("'.esc_url(get_theme_mod('nav_logo')).'");
				}'
			: '';
		$custom_css .= !empty(get_theme_mod('header_logo'))
			? ' .logo-western-region-white {
					background-image: url("'.esc_url(get_theme_mod('header_logo')).'");
				}'
			: '';
		$custom_css .= !empty($options['primary_color'])
			? ' body {
					color: '.$options['primary_color'].';
				}'
			: '';
		$custom_css .= !empty(get_theme_mod('background_color'))
			? ' body {
					background-color: #'.get_theme_mod('background_color').';
				}'
			: '';
		$custom_css .= !empty($options['primary_link_color'])
			? " a {
					color: ".$options['primary_link_color'].";
				}
				.btn-default {
					color: ".$options['primary_link_color'].";
					border-color: ".$options['primary_link_color'].";
				}
				.page-item.active .page-link {
					background-color: ".$options['primary_link_color'].";
					border-color: ".$options['primary_link_color'].";
				}
				.page-link {
					color: ".$options['primary_link_color'].";
				}
				.page-link:hover {
					color: #fff;
					background-color: ".$options['primary_link_color'].";
				}"
			: '';
		$custom_css .= !empty($options['primary_link_hover'])
			? " a:hover {
					color: ".$options['primary_link_hover'].";
				}
				.btn.btn-default:hover {
					color: ".$options['primary_link_hover'].";
					border-color: ".$options['primary_link_hover'].";
					background-color: transparent;
				}
				#header .social a:hover,
				#footer .social a:hover {
					color: ".$options['primary_link_hover'].";
				}"
			: '';
  // Add the above custom CSS via wp_add_inline_style
  wp_add_inline_style( 'style', $custom_css ); //Pass the variable into the main style sheet ID
});

// Start Social Media Links
	function my_customizer_social_media_array() {
		/* store social site names in array */
		$social_sites = array(
			'facebook' => 'fab fa-facebook-f',
			'twitter' => 'fab fa-twitter',
			'instagram' => 'fab fa-instagram',
			'snapchat' => 'fab fa-snapchat-ghost',
			'slack' => 'fab fa-slack-hash',
			'discord'=> 'fab fa-discord',
			'flickr' => 'fab fa-flickr',
			'pinterest' => 'fab fa-pinterest-p',
			'youtube' => 'fab fa-youtube',
			'tumblr' => 'fab fa-tumblr',
			'rss' => 'fas fa-rss',
			'linkedin' => 'fab fa-linkedin-in',
			'email' => 'fas fa-envelope',
			'phone' => 'fas fa-phone'
		);
		return $social_sites;
	}

	// Add settings to create various social media text areas.
	add_action('customize_register', function($wp_customize) {
		$wp_customize->add_section( 'my_social_settings', array(
			'title'    => __('Social Media Links', 'WR_theme'),
			'priority' => 35,
		) );
	 
		$social_sites = my_customizer_social_media_array();
	 
		foreach($social_sites as $social_site => $fontawesome) {
	 
			if($social_site == 'email'){
				$wp_customize->add_setting( "$social_site", array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_email'
				));
			}
			else if($social_site == 'phone'){
				$wp_customize->add_setting( "$social_site", array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_key'
				));
			}
			else {
				$wp_customize->add_setting( "$social_site", array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_url_raw'
				));
			}
	 
			$wp_customize->add_control( $social_site, array(
				'label'    => __( "$social_site url:", 'WR_theme' ),
				'section'  => 'my_social_settings',
				'type'     => 'text'
			));
		}
	});
	 
	// Takes user input from the customizer and outputs linked social media icons
	// Used by banner.php and footer.php
	function my_social_media_icons() {
		$social_sites = my_customizer_social_media_array();
	 
		/* any inputs that aren't empty are stored in $active_sites array */
		foreach($social_sites as $social_site => $fontawesome) {
			if( strlen( get_theme_mod( $social_site ) ) > 0 ) {
				$active_sites[] = array($social_site, $fontawesome, esc_url(get_theme_mod( $social_site )));
			}
		}
		/* for each active social site, add it as a list item */
		if ( ! empty( $active_sites ) ) {
			echo '<ul class="social-media-icons">'."\n";
			foreach($active_sites as $social_site) {
				echo "\t\t\t<a target=\"_blank\" href=\"$social_site[2]\" title=\"$social_site[0]\"><i class=\"$social_site[1]\"></i></a>\n";
			}
			echo "\t\t</ul>\n";
		}
	}
// End Social Media Links

?>