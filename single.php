<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage JustSell.com 2015
 */
?>
<?php get_header(); ?>

	<main itemscope itemtype="http://schema.org/Article">

		<?php while ( have_posts() ) : the_post(); ?>

			<article itemprop="articleBody">

				<header>

					<?php if ( get_post_meta( get_the_ID(), 'engaging_header_image', true ) ) : ?>
						<img class="engaging-header-image" src="<?php echo bloginfo('template_directory') . get_post_meta( get_the_ID(), 'engaging_header_image', true ); ?>" alt="<?php the_title(); ?>" />
					<?php endif; ?>

					<h1 class="article-title" itemprop="name"><?php the_title(); ?></h1>

					<?php if ( !is_single(array(43)) ): ?>
						<p class="article-author">by <strong itemprop="author"><?php the_author() ?></strong> (sales veteran and bestselling author)</p>
					<?php endif; ?>

				</header>

				<?php the_content(); ?>

				<?php
					/* Pulls in the social media share links */
					include('resources/includes/social-media-single-post-share.php'); ?>

			</article>

		<?php endwhile; ?>

		<?php
			/* Pulls in any post specific footer ads */
			include('resources/includes/single-post-specific-product-promotions.php'); ?>

	</main>

<?php get_footer(); ?>