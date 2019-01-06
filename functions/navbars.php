<?php
/**!
 * Navbars
 */

 
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
	

	// Start Head Navigation Walker
		if($theme_location=='nav_menu'){
	
			$menu = get_term( $locations[$theme_location], 'nav_menu' );
			$menu_items = wp_get_nav_menu_items($menu->term_id);
			
	 
			$count = 0;
			$submenu = false;
			$menu_list = "<ul id=\"menu-header\" class=\"navbar-nav ml-auto\">\n";
			
			foreach( (array)$menu_items as $menu_item ) {
				 
				$link = $menu_item->url;
				$title = $menu_item->title;
				
				// If the menu_item has a sub-menu
				if ( $menu_item->ID == $menu_items[ $count + 1 ]->menu_item_parent) {
					if ( !$submenu ) {
						$submenu = true;
						$menu_list .= "\t<li class=\"dropdown\">\n";
						$menu_list .= "\t\t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">$title <span class=\"caret\"></span></a>\n";
						$menu_list .= "\t\t\t<ul class=\"dropdown-menu\">\n";
						$menu_list .= "\t\t\t".'<li class="item"><a href="'.$link.'" class="title">'.$title.'</a></li>' ."\n";
					}
				}
				
				// If this is the last sub-menu item
				else if ( $menu_item->menu_item_parent != $menu_items[ $count + 1 ]->menu_item_parent && $submenu ){
					$menu_list .= "\t\t\t".'<li class="item"><a href="'.$link.'" class="title">'.$title.'</a></li>' ."\n";
					$menu_list .= "\t\t".'</ul>'."\n\t".'</li>'."\n";
					$submenu = false;
				}
				
				// Otherwise a regular menu item
				else {
					$menu_list .= "\t\t\t<li><a href=\"$link\">$title</a></li>\n";
				}
				$count++;
			}
			$menu_list .= "\t\t</ul>\n";
		}
	// End Head Navigation Walker


	// Start Footer Nav Walker
		else if($theme_location=='footer_menu'){
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
		
		}
	// End Footer Nav Walke

	} else {
		$menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
	}
	echo $menu_list;
}


?>