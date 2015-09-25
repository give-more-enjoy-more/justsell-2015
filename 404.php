<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage JustSell.com 2015
 */
?>

<?php get_header(); ?>

	<main class="inner-container">

		<section class="error-404 not-found">
			
			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentyfifteen' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfifteen' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->
			
		</section><!-- .error-404 -->

	</main><!-- .site-main -->

<?php get_footer(); ?>