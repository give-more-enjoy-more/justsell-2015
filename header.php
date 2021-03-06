<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage JustSell.com 2015
 */
?>
<!DOCTYPE html>
<html>
<head>

	<title>
		<?php
			global $page, $paged;
		
			if ( is_tag() ){
				echo "More Posts About: ";
			}

			wp_title( '|', true, 'right' );
		
			// Add the blog name.
			bloginfo( 'name' );
		
			// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";
		
			// Add a page number if necessary:
			if ( $paged >= 2 || $page >= 2 )
				echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
		?>
	</title>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">

	<?php if ( is_home() || is_category() ): ?>

		<meta name="description" content="No-fluff tips &amp; ideas to better selling. (95% of all you need to know ... and do)">
		<meta name="keywords" content="sales, sales process, sales questions, open-ended questions, opening statements, closing, negotiating, prospecting, qualifying, management">

	<?php elseif ( is_single() ): ?>

		<meta name="description" content="<?php echo esc_html(get_the_excerpt()); ?>">

		<?php 
			$post_tags = get_the_tags();
			foreach($post_tags as $tag)
				$csv_tags .= $tag->name . ',';
				
			echo '<meta name="keywords" content="'.$csv_tags.'" />';
		?>

	<?php endif; ?>


	<?php
		/* Pulls in the social media meta tags */
		include('resources/includes/social-media-meta.php'); ?>

	<link rel="shortcut icon" href="<?php echo bloginfo('template_directory') ?>/resources/images/icons/throughout/favicon.ico" />
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>?=v100915">

	<!--[if lt IE 9]>
		<script src="<?php echo bloginfo('template_directory') ?>/resources/js/html5shiv.min.js"></script>
		<script src="<?php echo bloginfo('template_directory') ?>/resources/js/respond.min.js"></script>
	<![endif]-->

	<?php /* TypeKit Font Import */ ?>
	<script src="https://use.typekit.net/fcv0wlt.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>

	<?php
		/* Pulls in the analytics integrations */
		include('resources/includes/analytics-integration.php'); ?>

</head>

<body class="<?php echo post_or_page_specific_class(); ?>">

	<div class="content-container">

		<?php
			/* Pulls in the header navigation */
			include('resources/includes/header-navigation.php'); ?>