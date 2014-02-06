<div class="navigation hidden">

<div class="padding">
		<h1 class="hidenav"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>

		<?php 

		$thisslug = $post->post_name;

		$homeid = get_option('page_on_front');

		$args = array(
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'post_parent' => $homeid,
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

				<?php if ( $post->post_name == $thisslug ) : ?>
					<li class="hidenav">
				<?php else: ?>
					<li>
				<?php endif; ?>

					<a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></li>

			<?php endforeach; ?>

		</ul>

		<?php 

		endif;

		wp_reset_postdata(); ?>

	</div>
</div>

<?php if ( is_home() || is_front_page() ) : ?>
<div class="credits">
<p>Website by <a href="http://martyspellerberg.com">Marty Spellerberg</a><br />
	Hosted by <a href="http://mediatemple.net">MediaTemple</a></p>
</div>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>