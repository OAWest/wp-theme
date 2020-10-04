<?php
/**!
 * Add theme Support
 */

// Default Color Palette
add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'OA Blue', 'WR_theme' ),
		'slug'  => 'oa-blue',
		'color' => '#005596',
	),
	array(
		'name'  => __( 'OA Red', 'WR_theme' ),
		'slug'  => 'oa-red',
		'color' => '#E31837',
	),
	array(
		'name'  => __( 'OA White', 'WR_theme' ),
		'slug'  => 'oa-white',
		'color' => '#E6E7E8',
	),
	array(
		'name'  => __( 'WR Gold', 'WR_theme' ),
		'slug'  => 'wr-gold',
		'color' => '#DBB780',
	),
	array(
		'name'  => __( 'WR Gray', 'WR_theme' ),
		'slug'  => 'wr-gray',
		'color' => '#383838',
	)
) );

// Add featured image support
add_theme_support( 'post-thumbnails' );

// Add <title> tag to the head
add_theme_support( 'title-tag' );

// Add custom background
add_theme_support( 'custom-background', array(
	'default-color'          => '',
	'default-image'          => '',
	'default-repeat'         => '',
	'default-position-x'     => '',
	'default-attachment'     => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
));

?>