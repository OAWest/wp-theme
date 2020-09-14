<?php
/**!
 * Customizer
 */

 
//Start Add additional customizer color options
function govpress_customize_register( $wp_customize ) {
	// Remove the unused default customizer options
	$wp_customize->remove_control("header_textcolor");
	$wp_customize->remove_section("background_image");
	
	// Add an images section
	$wp_customize->add_section( 'site_images' , array(
    	'title'       => __( 'Images', 'govpress' ),
    	'priority'    => 31,
    	'description' => 'Upload a images for the website identity',
	) );

	// Add a header logo image control option
	$wp_customize->add_setting( 'header_logo', array(
		'default' => get_template_directory_uri() . '/images/logos/western-region-white.png',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo', array(
	
    	'label'    => __( 'Header logo image', 'govpress' ),
		'section'  => 'site_images',
		'settings' => 'header_logo',
	) ) );
	
	// Add a default favicon logo image control option
	$wp_customize->add_setting( 'site_icon', array(
		'default' => get_template_directory_uri() . '/images/logos/favicon.png',
	) );
	
	// Add a nav logo image control option
	$wp_customize->add_setting( 'nav_logo', array(
		'default' => get_template_directory_uri() . '/images/logos/western-region.png',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'nav_logo', array(
	
    	'label'    => __( 'Nav menu image', 'govpress' ),
		'section'  => 'site_images',
		'settings' => 'nav_logo',
	) ) );
	
	// Add a header background image control option
	$wp_customize->add_setting( 'header_background', array(
		'default' => get_template_directory_uri() . '/images/banners/mountains.jpg',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_background', array(
	
    	'label'    => __( 'Header background image', 'govpress' ),
		'section'  => 'site_images',
		'settings' => 'header_background',
	) ) );
	
	// Add a login background image control option
	$wp_customize->add_setting( 'login_background', array(
		'default' => get_template_directory_uri() . '/images/banners/mountains.jpg',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'login_background', array(
	
    	'label'    => __( 'Login page background image', 'govpress' ),
		'section'  => 'site_images',
		'settings' => 'login_background',
	) ) );
	
	// Add a primary color editor control option
	$wp_customize->add_setting( 'govpress[primary_color]', array(
		'default' => '',
		'type' => 'option'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
		'label' => __( 'Primary Text Color', 'govpress' ),
		'section' => 'colors',
		'settings' => 'govpress[primary_color]'
	) ) );
	
	// Add a primary link color editor control option
	$wp_customize->add_setting( 'govpress[primary_link_color]', array(
		'default' => '',
		'type' => 'option'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_link_color', array(
		'label' => __( 'Primary Link Color', 'govpress' ),
		'section' => 'colors',
		'settings' => 'govpress[primary_link_color]'
	) ) );
	
	// Add a primary color hover editor control option
	$wp_customize->add_setting( 'govpress[primary_link_hover]', array(
		'default' => '',
		'type' => 'option'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_link_hover', array(
		'label' => __( 'Primary Link Hover', 'govpress' ),
		'section' => 'colors',
		'settings' => 'govpress[primary_link_hover]'
	) ) );
}
add_action( 'customize_register', 'govpress_customize_register' );


// Add inline CSS styles to an existing CSS stylesheet
add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
	
        //All the user input CSS settings as set in the plugin settings
		$options = get_option( 'govpress', false );
		$custom_css ="";
		if (!empty(get_theme_mod('header_background' ))) { $custom_css .= "header.banner.mountains::after {background-image: url(\"".esc_url(get_theme_mod('header_background'))."\"); }\n\t";}
		if (!empty(get_theme_mod('nav_logo' ))) { $custom_css .= ".navbar-light .container .navbar-header .navbar-brand {background-image: url(\"".esc_url(get_theme_mod('nav_logo'))."\"); }\n\t";}
		if (!empty(get_theme_mod('header_logo'))) { $custom_css .= ".logo-western-region-white {background-image: url(\"".esc_url(get_theme_mod('header_logo'))."\"); }\n\t";}
		if (!empty($options['primary_color'] ) ) { $custom_css .= "body { color: ".$options['primary_color']."; }\n\t";}
		if (!empty(get_theme_mod('background_color'))){ $custom_css .= "  body { background-color: #".get_theme_mod('background_color')."; }\n\t"; }
		if (!empty($options['primary_link_color']) ) { $custom_css .= "  a { color: ".$options['primary_link_color']." }\n\t";
													   $custom_css .= "  .btn-default { color: ".$options['primary_link_color']."; border-color: ".$options['primary_link_color']." }\n\t";
													   $custom_css .= "  .page-item.active .page-link { background-color: ".$options['primary_link_color']."; border-color: ".$options['primary_link_color']." }\n\t";
													   $custom_css .= "  .page-link { color: ".$options['primary_link_color']."; }\n\t";
													   $custom_css .= "  .page-link:hover { color: #fff; background-color: ".$options['primary_link_color']."; }\n\t";}
		if (!empty($options['primary_link_hover']) ) { $custom_css .= "  a:hover { color: ".$options['primary_link_hover']."; }\n";
													   $custom_css .= "  .btn.btn-default:hover { color: ".$options['primary_link_hover']."; border-color: ".$options['primary_link_hover']."; background-color:transparent; }\n\t"; 
													   $custom_css .= "  #header .social a:hover, #footer .social a:hover { color: ".$options['primary_link_hover']."; }\n\t"; }
  // Add the above custom CSS via wp_add_inline_style
  wp_add_inline_style( 'style', $custom_css ); //Pass the variable into the main style sheet ID
});

// Remove top margin created by admin bar
remove_action('wp_head', '_admin_bar_bump_cb');


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
			'title'    => __('Social Media Links', 'text-domain'),
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
				'label'    => __( "$social_site url:", 'text-domain' ),
				'section'  => 'my_social_settings',
				'type'     => 'text'
			));
		}
	});
	 
	// Takes user input from the customizer and outputs linked social media icons
	// Used by banner.php
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
			echo "<ul class='social-media-icons'>\n";
			foreach($active_sites as $social_site) {
				echo "\t\t\t\t<a target=\"_blank\" href=\"$social_site[2]\" title=\"$social_site[0]\"><i class=\"$social_site[1]\"></i></a>\n";
			}
			echo "\t\t\t</ul>\n";
		}
	}
// End Socail Media Links

?>