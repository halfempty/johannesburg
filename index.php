<?php get_header(); ?>

<?php if (have_posts()) : ?>

	<div class="contentpadding">

	<?php 

		$numItems = 0;

		while (have_posts()) : the_post(); 
			if( have_rows('slides') ):
				while ( have_rows('slides') ) : the_row();
					if ( get_row_layout() == 'image_slide' ) :
						$numItems++;
					elseif ( get_row_layout() == 'video_slide' && get_sub_field('video') ) :
						$numItems++;
					endif;
				endwhile;
			endif;
		endwhile;

		rewind_posts(); 

	?>

	<?php while (have_posts()) : the_post(); ?>

			<?php if( have_rows('slides') ): ?>
			<div class="slides">

			<?php 

				$output = '';

				$subargs = array(
				'posts_per_page'   => -1,
					'orderby'          => 'menu_order',
					'order'            => 'ASC',
					'post_type'        => 'page',
					'post_parent'      => $post->ID,
		 		); 

				$subpages = get_posts( $subargs ); 

				foreach ( $subpages as $post ) : 
					setup_postdata( $post );
					$output .= '<li><a href="' . get_permalink() . '">';

					$navtitle = get_field('nav_title');

					if ( $navtitle ) :
						$output .= $navtitle;
					else :
						$output .= get_the_title();
					endif; 


					$output .= '</a></li>';
				endforeach; 

				if ( $output != '' ) :
					echo '<div class="slide subnav"><ul>' . $output . '</ul></div>';
				endif;

				wp_reset_postdata();

				?>

		<?php 
			$i = 1; 

			while ( have_rows('slides') ) : the_row(); ?>

				<?php if( get_row_layout() == 'image_slide' ):
						$image = get_sub_field('image'); 
						if ($image ) : 
							if ( $image['alt'] ) :
								$alt = $image['alt']; 
							else :
								$alt = $image['title']; 
							endif;
							?>

					<div id="slide<?php echo $i; ?>" class="slide imageslide">

						<?php $i++; if ($i === $numItems ) $i = 0; ?>

						<figure>
							<a href="#slide<?php echo $i; ?>"><img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $alt; ?>" /></a>
							<figcaption><?php if ( get_sub_field('caption') ) the_sub_field('caption'); ?></figcaption>
						</figure>

					</div>

					<?php endif; ?>
				<?php elseif( get_row_layout() == 'text_slide' ): ?>

						<div class="slide textslide">

							<?php if ( get_sub_field('header') ) : ?>
								<h3 <?php if ( get_sub_field('anchor') ) : ?>
									id="<?php the_sub_field('anchor'); ?>"
									<?php endif; ?>
									><?php the_sub_field('header'); ?>
								</h3>
							<?php endif; ?>

							<?php the_sub_field('text'); ?>
						</div>

				<?php elseif( get_row_layout() == 'video_slide' && get_sub_field('video') ): ?>

					<div id="slide<?php echo $i; ?>" class="slide videoslide">

						<?php $i++; if ($i === $numItems ) $i = 0; ?>

						<?php echo do_shortcode('[fve]' . get_sub_field('video') . '[/fve]'); ?>
					</div> 

				<?php endif; ?>

			<?php endwhile; ?> 

		<?php else : // no layouts found ?>

		<?php endif; ?>

	</div>

	<?php endwhile; ?>

	</div>

<?php endif; ?>

<?php get_template_part('parts/footerlinks'); ?>

<?php get_footer(); ?>