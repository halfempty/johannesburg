<?php 

$args = array(
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'post_parent' => $post->ID,
	'post_type' => 'page',
	'numberposts'     => -1,
	'post_status' => 'publish'
); 

$postslist = get_posts($args); 

if ( $postslist ) :

?>

<ul class="childrenmenu">
	<?php foreach ($postslist as $post) : ?>
		<?php setup_postdata($post); ?>
		<li><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
	<?php endforeach; ?>
</ul>

<?php 

endif;

wp_reset_postdata(); ?>