<?php get_header(); ?>

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php if ( get_the_content() != "" ) : ?>
					<div class="content"><?php the_content(); ?></div>
				<?php else : ?>
					<?php the_johannesburg_gallery($post->ID); ?>
				<?php endif; ?>
			<?php endwhile; ?>

		<?php else : ?>
			<div class="content"><p>Sorry, page not found.</p></div>
		<?php endif; ?>

<?php get_footer(); ?>