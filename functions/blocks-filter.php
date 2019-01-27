<?php
/**!
 * Gutenberg Block Filters
 */


// Start Filter Block Types
	function blocks_filter_approved( $allowed_block_types ) {

		return array(
			'core/paragraph',
			'core/image',
			'core/heading',
			'core/gallery',
			'core/list',
			'core/cover-image',
			'core/video',
			'core/file',
			'core/table',
			'core/code',
			'core/freeform',
			'core/html',
			'core/preformatted',
			'core/pullquote',
			'core/button',
			'core/text-columns',
			'core/media-text',
			'core/more',
			'core/nextpage',
			'core/separator',
			'core/spacer',
			'core/shortcode',
			'core/archives',
			'core/categories',
			'core/latest-posts',
			'core/embed',
			'core/twitter',
			'core/youtube',
			'core/facebook',
			'core/instagram',
			'core/flicker',
			'core/vimeo',
		);

	}
	add_filter( 'allowed_block_types', 'blocks_filter_approved' );
// End Filter Block Types


// Start Default Color Palette
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'OA Blue', 'gutenbergtheme' ),
			'slug'  => 'oa-blue',
			'color' => '#005596',
		),
		array(
			'name'  => __( 'OA Red', 'gutenbergtheme' ),
			'slug'  => 'oa-red',
			'color' => '#E31837',
		),
		array(
			'name'  => __( 'OA White', 'gutenbergtheme' ),
			'slug'  => 'oa-white',
			'color' => '#E6E7E8',
		),
		array(
			'name'  => __( 'WR Gold', 'gutenbergtheme' ),
			'slug'  => 'wr-gold',
			'color' => '#DBB780',
		),
		array(
			'name'  => __( 'WR Gray', 'gutenbergtheme' ),
			'slug'  => 'wr-gray',
			'color' => '#383838',
		)
	) );
// End Default Color Palette

?>