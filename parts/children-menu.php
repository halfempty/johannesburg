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
<div class="childrenmenu">
	<ul>
		<?php foreach ($postslist as $post) : ?>
			<?php setup_postdata($post); ?>
			<li><a href="<?php echo get_permalink(); ?>"><?php 
				if ( get_field('nav_title') ) :
					the_field('nav_title'); 
				else :
					the_title(); 
				endif;
			?></a></li>
		<?php endforeach; ?>
	</ul>
</div>
<?php 

endif;

wp_reset_postdata(); ?>