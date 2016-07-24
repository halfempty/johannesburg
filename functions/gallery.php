<?php

// Image Sizes
add_image_size( 'padmini', 1024 );
add_image_size( 'phone', 1136 );
add_image_size( 'phoneplus', 1334 );
add_image_size( 'padretina', 2048 );


function spellerberg_get_image($imageid,$fallbacksize = 'full') {

	$gridthumb = wp_get_attachment_image_src( $imageid, 'gridthumb');
	$padmini = wp_get_attachment_image_src( $imageid, 'padmini');
	$phone = wp_get_attachment_image_src( $imageid, 'phone');
	$phoneplus = wp_get_attachment_image_src( $imageid, 'phoneplus');
	$padretina = wp_get_attachment_image_src( $imageid, 'padretina');
	$full = wp_get_attachment_image_src( $imageid, 'full');
	$fallback = wp_get_attachment_image_src( $imageid, $fallbacksize);

	$alt_text = get_post_meta($imageid, '_wp_attachment_image_alt', true);

	if ( !$alt_text || $alt_text == "" ) :
		$attachment = get_post($imageid);
		$alt_text = $attachment->post_title;
	endif;

	$output = '<img srcset="' . $gridthumb[0] . ' ' . $gridthumb[1] . 'w,
				' . $padmini[0] . ' ' . $padmini[1] . 'w,
				' . $phone[0] . ' ' . $phone[1] . 'w,
				' . $phoneplus[0] . ' ' . $phoneplus[1] . 'w,
				' . $padretina[0] . ' ' . $padretina[1] . 'w,
				' . $full[0] . ' ' . $full[1] . 'w" 
		src="' . $fallback[0] . '"
		alt="' . $alt_text . '">';

	return $output;

}


function spellerberg_the_image($imageid,$fallbacksize = 'full') {
	echo spellerberg_get_image($imageid,$fallbacksize);
}


function the_johannesburg_gallery($post_id) { 

	global $post;

	$images = get_children( array('post_parent' => $post_id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );

	if ($images) : ?>

	<div class="gallery">

	<?php	
	
		$gsgallery = get_post_meta($post_id, '_gsgallery', true);

		$i = 0;
		$numItems = count($images);

		foreach ($images as $attachment_id => $image) :
	
			$slidetype = get_post_meta($attachment_id, '_slidetype', true);

			?>

			<div class="slide" id="slide<?php echo $i; ?>">
			<?php 
				$i++; 
				if ($i === $numItems ) $i = 0;
			?>
				<a class="slideinner" href="#slide<?php echo $i; ?>"><?php spellerberg_the_image($image->ID); ?></a>
			</div>

		<?php endforeach; ?>
	</div>
		
	<?php endif;

} 


?>
