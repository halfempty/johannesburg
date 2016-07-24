<?php

function the_johannesburg_menu($postid) {

	$output = '';
	$homeid = get_option('page_on_front');
	$ancestors = get_ancestors($postid, 'page');

	$children = get_children(array(
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post_parent' => $homeid,
		'post_type' => 'page',
		'numberposts' => -1,
		'post_status' => 'publish'
	)); 

	if ( $children ) :
		foreach ($children as $child) :
			$output .= recursive_output($child->ID, $ancestors, $postid);
		endforeach;
	endif;

	echo '<div class="childrenmenu">' . $output . '</div>';

}

function recursive_output($menuitemid, $ancestors, $currentpageid) {

	$output = '';

	$navtitle = get_field('nav_title', $menuitemid);

	if ( $navtitle ) :
		$itemname = $navtitle;
	else :
		$itemname = get_the_title($menuitemid);
	endif; 


	$post = get_post($menuitemid);
	$slug = $post->post_name;

	$itemurl = get_permalink($menuitemid);

	if ( $menuitemid == $currentpageid ) :
		$output .= '<li class="hidenav ' .  $slug . '">';
	else:
		$output .= '<li class="' .  $slug . '">';
	endif; 

	$output .= '<a href="' . $itemurl . '">' . $itemname .'</a>';

	if ( in_array($menuitemid, $ancestors) ) :

		$children = get_children(array(
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'post_parent' => $menuitemid,
			'post_type' => 'page',
			'numberposts' => -1,
			'post_status' => 'publish'
		)); 

		if ( $children ) :

			$childoutput = '';

			foreach ($children as $child) :

				$output .= recursive_output($child->ID, $ancestors, $currentpageid);

			endforeach;

		endif;

	endif;

	$output .= '</li>';

	return '<ul>' . $output . '</ul>';

}

?>