<?php  

/* Template Name: Redirect */  

global $post; // < -- globalize, just in case

$type = get_field('redirect_type');

if ( $type == "page" ) :
	$field = get_field('page_redirect');
elseif( $type == "taxonomy" ) :

	$category_id = get_field('taxonomy_redirect');

	$field = get_category_link( $category_id );

else :
	$field = get_field('external_redirect');
endif; 


if ( $field ) : 
	wp_redirect(clean_url($field), 301);
else :
	echo "Redirection error";
endif;

?>