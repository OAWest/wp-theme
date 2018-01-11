<?php

function start_wp_head_buffer() {
    ob_start();
}
add_action('wp_head','start_wp_head_buffer',0);

function end_wp_head_buffer() {
    $in = ob_get_clean();

    // here do whatever you want with the header code
	echo str_replace("<link rel='stylesheet' id='style-css'  href='http://western.oa-bsa.org/wp-content/plugins/style.css?ver=4.9.1' type='text/css' media='all' />", "", $in);
    // echo $in; // output the result unless you want to remove it
}
add_action('wp_head','end_wp_head_buffer',998);

// Start Increase the max upload size
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
// End Increase the max upload size

//Start Add featured image support
add_theme_support( 'post-thumbnails' );
//End Add featured image support

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
		'default' => get_bloginfo('template_directory') . '/images/logos/western-region-white.png',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo', array(
	
    	'label'    => __( 'Header logo image', 'govpress' ),
		'section'  => 'site_images',
		'settings' => 'header_logo',
	) ) );	
	
	// Add a nav logo image control option
	$wp_customize->add_setting( 'nav_logo', array(
		'default' => get_bloginfo('template_directory') . '/images/logos/western-region.png',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'nav_logo', array(
	
    	'label'    => __( 'Nav menu image', 'govpress' ),
		'section'  => 'site_images',
		'settings' => 'nav_logo',
	) ) );
	
	// Add a header background image control option
	$wp_customize->add_setting( 'header_background', array(
		'default' => get_bloginfo('template_directory') . '/images/banners/mountains.jpg',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_background', array(
	
    	'label'    => __( 'Header background image', 'govpress' ),
		'section'  => 'site_images',
		'settings' => 'header_background',
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


//Adding CSS inline style to an existing CSS stylesheet
function wpb_add_inline_css() {
	
	wp_enqueue_style( 'style', plugins_url() . '/style.css' );
	
        //All the user input CSS settings as set in the plugin settings
		$options = get_option( 'govpress', false );
		$custom_css ="";
		if (!empty(get_theme_mod('header_background' ))) { $custom_css .= "header.banner.mountains::after {background-image: url(\"".esc_url(get_theme_mod('header_background'))."\"); }\n\t";}
		if (!empty(get_theme_mod('nav_logo' ))) { $custom_css .= ".navbar-fixed-top .container .navbar-header .navbar-brand {background-image: url(\"".esc_url(get_theme_mod('nav_logo'))."\"); }\n\t";}
		if (!empty(get_theme_mod('header_logo'))) { $custom_css .= ".logo-western-region-white {background-image: url(\"".esc_url(get_theme_mod('header_logo'))."\"); }\n\t";}
		if (!empty($options['primary_color'] ) ) { $custom_css .= "body { color: ".$options['primary_color']."; }\n\t";}
		if (!empty(get_theme_mod('background_color'))){ $custom_css .= "  body { background-color: #".get_theme_mod('background_color')."; }\n\t"; }
		if (!empty($options['primary_link_color']) ) { $custom_css .= "  a { color: ".$options['primary_link_color']." }\n\t";
													   $custom_css .= "  .btn-default { color: ".$options['primary_link_color']."; border-color: ".$options['primary_link_color']." }\n\t"; }
		if (!empty($options['primary_link_hover']) ) { $custom_css .= "  a:hover { color: ".$options['primary_link_hover']." !important; }\n";
													   $custom_css .= "  .btn.btn-default:hover { color: ".$options['primary_link_hover']."; border-color: ".$options['primary_link_hover']."; background-color:transparent; }\n\t"; }
		
  //Add the above custom CSS via wp_add_inline_style
  wp_add_inline_style( 'style', $custom_css ); //Pass the variable into the main style sheet ID
  
  
}
add_action( 'wp_enqueue_scripts', 'wpb_add_inline_css' ); //Enqueue the CSS style

add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
// End Add additional customizer color options


$defaults = array(
	'default-color'          => '',
	'default-image'          => '',
	'default-repeat'         => '',
	'default-position-x'     => '',
	'default-attachment'     => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );


// Start Social Media Links
	function my_customizer_social_media_array() {
		/* store social site names in array */
		$social_sites = array('facebook', 'twitter', 'snapchat', 'google-plus', 'flickr', 'pinterest', 'youtube', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram', 'email', 'phone');
		return $social_sites;
	}

	/* add settings to create various social media text areas. */
	add_action('customize_register', 'my_add_social_sites_customizer');
	 
	function my_add_social_sites_customizer($wp_customize) {
	 
		$wp_customize->add_section( 'my_social_settings', array(
				'title'    => __('Social Media Links', 'text-domain'),
				'priority' => 35,
		) );
	 
		$social_sites = my_customizer_social_media_array();
		$priority = 5;
	 
		foreach($social_sites as $social_site) {
	 
			$wp_customize->add_setting( "$social_site", array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_url_raw'
			) );
	 
			$wp_customize->add_control( $social_site, array(
					'label'    => __( "$social_site url:", 'text-domain' ),
					'section'  => 'my_social_settings',
					'type'     => 'text',
					'priority' => $priority,
			) );
	 
			$priority = $priority + 5;
		}
	}

	/* takes user input from the customizer and outputs linked social media icons */
	function my_social_media_icons() {
		$social_sites = my_customizer_social_media_array();
	 
		/* any inputs that aren't empty are stored in $active_sites array */
		foreach($social_sites as $social_site) {
			if( strlen( get_theme_mod( $social_site ) ) > 0 ) {
				$active_sites[] = $social_site;
			}
		}
	 
		/* for each active social site, add it as a list item */
			if ( ! empty( $active_sites ) ) {
	 
				echo "<ul class='social-media-icons'>";
	 
				foreach ( $active_sites as $active_site ) {
	 
					/* setup the class */
					$class = 'fa fa-' . $active_site;

					if ( $active_site == 'snapchat' ) {
						?>
							<a class="<?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $active_site) ); ?>">
								<i class="fa fa-snapchat-ghost" title="<?php _e('snapchat icon', 'text-domain'); ?>"></i>
							</a>
					<?php }
					else if ( $active_site == 'email' ) {
						?>
							<a class="<?php echo $active_site; ?>" target="_blank" href="mailto:<?php echo esc_url( get_theme_mod( $active_site) ); ?>">
								<i class="fa fa-envelope" title="<?php _e('email icon', 'text-domain'); ?>"></i>
							</a>
					<?php }
					else if ( $active_site == 'phone' ) {
						?>
							<a class="<?php echo $active_site; ?>" target="_blank" href="tel:<?php echo esc_url( get_theme_mod( $active_site) ); ?>">
								<i class="<?php echo esc_attr( $class ); ?>" title="<?php printf( __('%s icon', 'text-domain'), $active_site ); ?>"></i>
							</a>
					<?php }
					else { ?>
							<a class="<?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $active_site) ); ?>">
								<i class="<?php echo esc_attr( $class ); ?>" title="<?php printf( __('%s icon', 'text-domain'), $active_site ); ?>"></i>
							</a>
					<?php
					}
				}
				echo "</ul>";
			}
	}
// End Socail Media Links

// Start Remove Read-More #jumpID
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );
// End Remove Read-more #jumpID


// Start Pagination
function bittersweet_pagination() {

global $wp_query;

$big = 999999999; // need an unlikely integer

$pages = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array',
    ) );
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="pagination"><ul class="list-unstyled">';
        foreach ( $pages as $page ) {
			echo "<li>".str_replace( "page-numbers", 'btn btn-default', $page )."</li>";
        }
       echo '</ul></div>';
        }
}
// End Pagination


// Start Head Navigation Walker
class description_walker extends Walker_Nav_Menu
{
  function start_el(&$output, $item, $depth, $args)
  {
   global $wp_query;
   $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

   $class_names = $value = '';

   $classes = empty( $item->classes ) ? array() : (array) $item->classes;

   $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
   $class_names = ' class="'. esc_attr( $class_names ) . '"';

   $output .= $indent . '<li>';

   $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
   $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
   $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
   $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

   $prepend = '<h4>';
   $append = '</h4>';
   $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

   if($depth != 0) {
		$description = $append = $prepend = "";
   }
   

	$item_output = $args->before;
	$item_output .= '<a'. $attributes .'>';
	$item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
	$item_output .= $description.$args->link_after;
	$item_output .= '</a>';
	$item_output .= $args->after;

	$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
// End Head Navigation Walker


// Start Footer Nav Walker
if ( function_exists( 'register_nav_menus' ) ) {
  	register_nav_menus(
  		array(
  		  'nav_menu' => 'Nav Menu',
  		  'footer_menu' => 'Footer Menu'
  		)
  	);
}

function clean_custom_menu( $theme_location ) {
    if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
 
        $count = 0;
        $submenu = false;

		foreach( $menu_items as $menu_item ) {
			 
			$link = $menu_item->url;
			$title = $menu_item->title;
			 
			if ( !$menu_item->menu_item_parent ) {
				$parent_id = $menu_item->ID;
				 
				$menu_list .= '<div class="col-xs-12 col-sm-4 col-md-2 grid-item">'."\n";
				$menu_list .= "\t".'<h4><a href="'.$link.'" class="title">'.$title.'</a></h4>' ."\n";
			}
 
			if ( $parent_id == $menu_item->menu_item_parent ) {
 
				if ( !$submenu ) {
					$submenu = true;
					$menu_list .= "\t".'<nav>'."\n\t\t".'<ul class="list-unstyled">' ."\n";
				}
 
				$menu_list .= "\t\t\t".'<li class="item"><a href="'.$link.'" class="title">'.$title.'</a></li>' ."\n";
					 
 
				if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ){
					$menu_list .= "\t\t".'</ul>'."\n\t".'</nav>'."\n";
					$submenu = false;
				}
 
			}
 
			if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ) { 
				$menu_list .= '</div>' ."\n";      
				$submenu = false;
			}
			$count++;
		}

    } else {
        $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
    }
    echo $menu_list;
}
// End Footer Nav Walker

// Add scripts to wp_footer()
function child_theme_footer_script() {
	show_admin_bar( false );
	require_once('footer.php');
}
add_action( 'wp_footer', 'child_theme_footer_script' );



?>