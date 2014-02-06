<?php

function enqueue_scripts_method() {
	
	if(!wp_script_is('jquery')) wp_enqueue_script("jquery");

	// Remove Unnecessary Code
	// http://www.themelab.com/2010/07/11/remove-code-wordpress-header/
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

	wp_enqueue_script( 'jquery');

	// Slideshow
	$slideshowjs = get_template_directory_uri() . '/js/slideshow.js';
	wp_register_script('slideshowjs',$slideshowjs);
	wp_enqueue_script( 'slideshowjs',array('jquery'));

	// Theme JS
	$themejs = get_template_directory_uri() . '/js/johannesburg.js';
	wp_register_script('themejs',$themejs);
	wp_enqueue_script( 'themejs',array('jquery','slideshowjs'));
	
	// Fonts CSS
	$fontscss = get_template_directory_uri() . '/fonts/fonts.css';
    wp_register_style('fontscss',$fontscss);
    wp_enqueue_style( 'fontscss');

	// theme css
	$themecss = get_stylesheet_directory_uri() . '/style.css';
	wp_register_style('themecss',$themecss);
	wp_enqueue_style( 'themecss');

}

add_action('wp_enqueue_scripts', 'enqueue_scripts_method');



function is_page_or_subpage_of($slug) {

	global $post;

	if ( is_page() || is_search() ) :

		if ( is_page($slug) ) :

			return true;

		else :

			$targetid = '781';
		
			if ( $post->post_parent == $targetid ) :

				return true;
			endif;

		endif;

	endif;

}


function get_ID_by_slug($page_slug) {

	global $wpdb;

	$page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE ( post_name = '".$page_slug."' or post_title = '".$page_slug."' ) and post_status = 'publish' and post_type='page' ");
	return $page_id;

}


function get_parent_link($post_parent) {

	$parent = get_post($post_parent);
	$slug = $parent->post_name;

//	print_r($parent);

//	echo $post_parent;
	echo get_permalink( $parent->ID );
	
	
} 



// Includes

require_once( 'functions/gallery.php' );

?>