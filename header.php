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

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>?=v092115">

	<!--[if lt IE 9]>
		<script src="<?php echo bloginfo('template_directory') ?>/resources/js/html5shiv.min.js"></script>
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

		<nav></nav>