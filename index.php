<?php get_header(); ?>

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
					<div class="content">
						<div class="thecontent"><?php the_content(); ?></div>
					</div>
			<?php endwhile; ?>
		<?php endif; ?>

		<?php get_template_part('parts/footerlinks'); ?>

<?php get_footer(); ?>