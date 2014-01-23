<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php 
		wp_title( '&mdash;', true, 'right' );
		bloginfo( 'name' ); 
		$site_description = get_bloginfo( 'description', 'display' );

		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " $site_description";
		if ( $paged >= 2 || $page >= 2 )
			echo ' &mdash; ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
		?></title>
	
		<meta name="viewport" content="initial-scale=1.0, width=device-width" />

		<!-- Fav Icons: Browser, iOS, Windows 8 -->
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon.ico">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-114.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-72.png" />
		<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-57.png" />
		<meta name="application-name" content="<?php bloginfo( 'name' ); ?>"/> 
		<meta name="msapplication-TileColor" content="#000000"/> 
		<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-144.png"/>

		<?php wp_head(); ?>

</head>
<?php 
if ( is_front_page() || is_page_or_subpage_of('stories') ) : 
	$class = "white";
elseif ( is_page_or_subpage_of('books') ) : 
	$class = "red";
elseif ( is_page('workshops') ) :
	$class = "blue";
else :
	$class = "green";
endif;

if ( is_admin_bar_showing() ) 	$class .= " adminbarshowing";
?>
<body class="hidden <?php echo $class; ?>">
<div class="header">
	<?php if ( is_front_page() ) : ?>
		<h1><span><?php bloginfo('name'); ?></span></h1>
	<?php else : ?>
		<h1 class="shownav"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<h2><a href="<?php get_parent_link($post->post_parent); ?>"><?php the_title(); ?></a></h2>
	<?php endif; ?>

	<?php get_template_part('parts/children-menu'); ?>
	
</div>