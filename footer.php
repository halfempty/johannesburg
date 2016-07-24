</div><!-- Content -->

<?php if ( is_home() || is_front_page() ) : ?>
<?php else : ?>
	<div class="navigation hidden">

		<header class="hidenav">
			<h1><a href="<?php echo get_option('home'); ?>/"><span class="underline">Donald Weber</span><span class="notch"></span></a></h1>
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