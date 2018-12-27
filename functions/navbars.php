<?php
/**!
 * Navbars
 */

 
// Start Head Navigation Walker
	class description_walker extends Walker_Nav_Menu
	{
	  function start_el(&$output, $item, $depth=0, $args=array())
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

			foreach( (array)$menu_items as $menu_item ) {
				 
				$link = $menu_item->url;
				$title = $menu_item->title;
				
				// If the menu_item is not part of a sub-menu
				if ( !$menu_item->menu_item_parent ) {
					$parent_id = $menu_item->ID;
					$menu_list .= '<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 grid-item">'."\n";
					$menu_list .= "\t".'<h4><a href="'.$link.'" class="title">'.$title.'</a></h4>' ."\n";
				}
	 
				// If the menu_item is part of a sub-menu
				else if ( $parent_id == $menu_item->menu_item_parent ) {
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
				
				// If the menu_item is part of a sub-sub-menu
				else {
					$menu_list .= '<div style="display:none;">';
				}
				
				
				// This is the last menu_item of the current series
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

?>