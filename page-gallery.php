<?php 
/* Template Name: Image Gallery */ 
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<?php 
		
		if( have_rows('slides') ): 

			$i = 0; 
			$numItems = count( get_field('slides') );

			while ( have_rows('slides') ) : the_row(); ?>

				<?php if( get_row_layout() == 'image_slide' ): ?>

					<div class="imageslide" id="slide<?php echo $i; ?>">
						<div class="inner">
						<?php

						$i++; 
						if ($i === $numItems ) $i = 0;

						$image = get_sub_field('image');
						if ( $image['alt'] ) :
							$alt = $image['alt']; 
						else :
							$alt = $image['title']; 
						endif;

						?>

						<a class="slideinner" href="#slide<?php echo $i; ?>"><img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $alt; ?>" /></a>
						</div>
					</div> 

				<?php elseif( get_row_layout() == 'text_slide' ): ?>

					<div class="textslide" id="slide<?php echo $i; ?>">
						<div class="inner">
						<?php
							$i++; 
							if ($i === $numItems ) $i = 0;
							echo wpautop( get_sub_field('text') ); 
						?>
						</div>
					</div> 

				<?php elseif( get_row_layout() == 'header_slide' ): ?>

					<div class="headerslide" id="slide<?php echo $i; ?>">
						<div class="inner">
						<?php
							$i++; 
							if ($i === $numItems ) $i = 0;

							$header = get_sub_field('header'); 
							$subhead = get_sub_field('subhead'); 

							if ( $header ) echo '<h3>' . $header . '</h3>'; 
							if ( $subhead ) echo '<p class="subhead">' . $subhead . '</p>'; 
						?>
						</div>
					</div> 


				<?php endif; ?>


			<?php endwhile; ?> 

		<?php else : // no layouts found ?>

		<?php endif; ?>

	<?php endwhile; ?>
<?php else : ?>
	<div class="content"><p>Sorry, page not found.</p></div>
<?php endif; ?>

	<?php get_template_part('parts/footerlinks'); ?>


<?php get_footer(); ?>