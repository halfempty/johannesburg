<?php

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
				
			$big_array = image_downsize( $image->ID, 'large' );
	 		$img_url = $big_array[0];
			$img_width = $big_array[1];
			$img_height = $big_array[2];
			
			?>

			<div class="slide" id="slide<?php echo $i; ?>">
			<?php 
				$i++; 
				if ($i === $numItems ) $i = 0;
			?>
				<a class="slideinner" href="#slide<?php echo $i; ?>"><img src="<?php echo $img_url; ?>" alt="" /></a>
			</div>

		<?php endforeach; ?>
	</div>
		
	<?php endif;

} 


?>
