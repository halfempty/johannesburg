<?php 
/* Template Name: Menu */ 
?>
	
<?php get_header(); ?>
	<div class="content <?php if ( is_front_page() ) echo 'homemenu'?>">
		<?php get_template_part('parts/children-menu'); ?>
	</div>
<?php get_footer(); ?>