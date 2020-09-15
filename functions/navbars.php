<?php
/**!
 * Navbars
 */

// Register the menu locations
add_action('after_setup_theme', function(){
	register_nav_menus(
		array(
		  'nav_menu' => 'Nav Menu',
		  'footer_menu' => 'Footer Menu'
		)
	);
});

function get_header_menu($menu_items){
	$menu_list = '';
	$submenu = false;
	
	foreach($menu_items as $key => $menu_item) {
		$is_root = $menu_item->menu_item_parent == 0;
		$has_child = isset($menu_items[$key+1]) && $menu_item->ID == $menu_items[$key+1]->menu_item_parent;

		// If the menu_item is root
		if( $is_root ){

			// If the last item was a dropdown, clear out dropdown menu
			if( $submenu ){
				$submenu = false;
				$menu_list .= '</ul></li>';
			}

			// If the menu_item has a child
			if( $has_child ) {
				$submenu = true;
				$menu_list .= '
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							'.$menu_item->title.'
						</a>
						<ul class="dropdown-menu">'."\n";
			}

			// If the menu_item does not have a child
			else {
				$menu_list .= '<li><a href="'.$menu_item->url.'" title="'.$menu_item->title.'">'.$menu_item->title.'</a></li>';		
			}

		}

		// Otherwise the menu_item is a child
		else {
			$menu_list .= '<li><a href="'.$menu_item->url.'" title="'.$menu_item->title.'">'.$menu_item->title.'</a></li>';
		}
	}
	return $menu_list;
}


function get_footer_menu($menu_items){
	$menu_list = '';
	$submenu = false;

	foreach($menu_items as $key => $menu_item) {
		 
		$link = $menu_item->url;
		$title = $menu_item->title;
		$is_root = $menu_item->menu_item_parent == 0;
		$has_child = isset($menu_items[$key+1]) && $menu_item->ID == $menu_items[$key+1]->menu_item_parent;

		// If the menu_item is root
		if( $is_root ) {

			// If the last item was a dropdown, clear out dropdown menu
			if( $submenu ){
				$submenu = false;
				$menu_list .= '</ul></nav></div>';
			}

			$menu_list .= '
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 grid-item">
					<h4><a href="'.$link.'" class="title">'.$title.'</a></h4>' ."\n";
			
			// If the menu_item has a child
			if($has_child){
				$submenu = true;
				$menu_list .= '
					<nav>
						<ul class="list-unstyled">' ."\n";
			}

			// If the menu_item does not have a child
			else {
				$menu_list .= '
				</div>' ."\n";
			}
		}

		// Otherwise the menu_item is a child
		else {
			$menu_list .= "\t\t\t".'<li class="item"><a href="'.$link.'" class="title">'.$title.'</a></li>' ."\n";
		}
	}
	return $menu_list;
}

function clean_custom_menu( $theme_location ) {
	if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
		$menu = get_term($locations[$theme_location]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);

		if($theme_location=='nav_menu'){
			$menu_list = get_header_menu($menu_items);
		}
		else if($theme_location=='footer_menu'){
			$menu_list = get_footer_menu($menu_items);
		}
	} else {
		$menu_list = "<!-- no menu defined for $theme_location -->";
	}
	echo $menu_list;
}

?>