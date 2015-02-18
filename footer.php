</div><!-- Content -->

<?php if ( is_home() || is_front_page() ) : ?>
	<div class="credits">
		<p>Website by <a href="http://martyspellerberg.com">Marty Spellerberg</a><br />
		Hosted by <a href="http://mediatemple.net">MediaTemple</a></p>
	</div>
<?php else : ?>
	<div class="navigation hidden">

		<header class="hidenav">
			<h1><a href="<?php echo get_option('home'); ?>/"><span>Donald Weber</span></a></h1>
		</header>

		<div class="scrollbox">
			<div class="navigationpadding">
				<?php the_johannesburg_menu($post->ID); ?>
			</div>
		</div>

	</div>
<?php endif; ?>




<?php wp_footer(); ?>

</body>
</html>