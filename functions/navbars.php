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

// Build the menus
function clean_custom_menu( $theme_location ) {
	if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
		$menu = get_term($locations[$theme_location]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		$menu_list = '';

		if($theme_location=='nav_menu' || $theme_location=='footer_menu'){
			$submenu = false;
		
			$display = array(
				'nav_menu' => array(
					'clear_submenu' => "\t\t\t</ul>\n\t\t</li>\n",
					'root_with_child' => "\t\t".'<li class="dropdown">'.
						"\n\t\t\t".'<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">%title</a>'.
						"\n\t\t\t".'<ul class="dropdown-menu">'.
						"\n\t\t\t\t".'<li><a href="%url" title="%title">%title</a></li>'."\n",
					'root_no_child' => "\t\t".'<li><a href="%url" title="%title">%title</a></li>'."\n",
					'is_child' => "\t\t\t\t".'<li><a href="%url" title="%title">%title</a></li>'."\n",
				),
				'footer_menu' => array(
					'clear_submenu' => "\t\t\t\t\t</ul>\n\t\t\t\t</nav>\n\t\t\t</div>\n",
					'root_with_child' => "\t\t\t".'<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 grid-item">'."\n\t\t\t\t".'<h4><a href="%url" class="title" title="%title">%title</a></h4>'."\n\t\t\t\t<nav>\n\t\t\t\t\t".'<ul class="list-unstyled">' ."\n",
					'root_no_child' => "\t\t\t".'<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 grid-item"><h4><a href="%url" class="title" title="%title">%title</a></h4></div>'."\n",
					'is_child' => "\t\t\t\t\t\t".'<li class="item"><a href="%url" class="title" title="%title">%title</a></li>'."\n",
				),
			);
			
			foreach($menu_items as $key => $menu_item) {
				$is_root = $menu_item->menu_item_parent == 0;
				$has_child = isset($menu_items[$key+1]) && $menu_item->ID == $menu_items[$key+1]->menu_item_parent;

				$data = array(
					'%url' => $menu_item->url,
					'%title' => $menu_item->title
				);
		
				// If the menu_item is root
				if( $is_root ){
		
					// If the last item was a dropdown, clear out dropdown menu
					if( $submenu ){
						$submenu = false;
						$menu_list .= $display[$theme_location]['clear_submenu'];
					}
		
					// If the menu_item has a child
					if( $has_child ) {
						$submenu = true;
						$menu_list .= str_replace(array_keys($data), array_values($data), $display[$theme_location]["root_with_child"]);
					}
		
					// If the menu_item does not have a child
					else {
						$menu_list .= str_replace(array_keys($data), array_values($data), $display[$theme_location]["root_no_child"]);
					}
				}
		
				// Otherwise the menu_item is a child
				else {
					$menu_list .= str_replace(array_keys($data), array_values($data), $display[$theme_location]["is_child"]);
				}
			}
		}

	} else {
		$menu_list = "<!-- no menu defined for $theme_location -->";
	}
	echo $menu_list;
}

?>