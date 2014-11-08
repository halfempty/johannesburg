<?php if ( is_home() || is_front_page() ) : ?>
	<div class="credits homecredits">
		<?php get_template_part('parts/credits'); ?>
	</div>
<?php else : ?>
	<div class="navigation hidden">

		<h1 class="shownav"><a href="<?php echo get_option('home'); ?>/"><span>Donald Weber</span></a></h1>

		<div class="box">
		<div class="padding">

			<?php the_johannesburg_menu($post->ID); ?>

			<div class="credits navcredits">
				<?php get_template_part('parts/credits'); ?>
			</div>
		</div>
		</div>
	</div>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>