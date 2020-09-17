<?php
/**
 * Navigation
 * 
 * 'theme_location'  => 'menu',
 * 'menu'            => 'test',
 * 'container'       => false,
 * 'container_class' => false,
 * 'container_id'    => false,
 * 'menu_class'      => false,
 * 'menu_id'         => false,
 * 'echo'            => false,
 * 'fallback_cb'     => 'wp_page_menu',
 * 'before'          => '',
 * 'after'           => '',
 * 'link_before'     => '',
 * 'link_after'      => '',
 * 'items_wrap'      => '%3$s',
 * 'depth'           => 0,
 * 'walker'          => new subMenu
 */

function primary_nav()
{
	if ( has_nav_menu( 'Primary' ) ) {
		$menuParameters = array(
			'theme_location' => 'Primary',
			'container'       => false,
			'echo'            => false,
			'items_wrap'      => '%3$s',
			'depth'           => 0,
			'walker'		  => new subNav
		);
		echo strip_tags(wp_nav_menu($menuParameters), '<a>');
	}
}

function add_menuclass($ulclass)
{
	return preg_replace('/<a /', '<a class="item"', $ulclass);
}
add_filter('wp_nav_menu', 'add_menuclass');

class subNav extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    	$object = $item->object;
    	$type = $item->type;
    	$title = $item->title;
    	$description = $item->description;
    	$permalink = $item->url;

      $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
        
      //Add SPAN if no Permalink
      if( $permalink && $permalink != '#' ) {
      	$output .= '<a href="' . $permalink . '">';
      } else {
      	$output .= '<span>';
      }
       
      $output .= $title;

      if( $description != '' && $depth == 0 ) {
      	$output .= '<small class="description">' . $description . '</small>';
      }

      if( $permalink && $permalink != '#' ) {
      	$output .= '</a>';
      } else {
      	$output .= '</span>';
      }
    }
}