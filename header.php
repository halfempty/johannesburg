<!DOCTYPE html>

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
		<meta name="author" content="http://martyspellerberg.com" />

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
if ( is_page_or_subpage_of('info') ) : 
	$class = "green";
else :
	$class = "white";
endif;

if ( is_admin_bar_showing() ) 	$class .= " adminbarshowing";
?>
<body class="hidden <?php echo $class; ?>">

<?php if ( is_front_page() ) : ?>
	<h1 class="header"><span>Donald Weber</span></h1>
<?php else : ?>
	<h1 class="shownav header"><a href="<?php echo get_option('home'); ?>/"><span>Donald Weber</span></a></h1>
<?php endif; ?>
	
	
<?php if ( !is_front_page() ) : ?>
<div class="pagetitle">
	<h2><?php the_title(); ?></h2>
</div>
<?php endif; ?>