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

					<?php if ( !is_single(array(10)) ): ?>
						<p class="article-author">by <strong itemprop="author"><?php the_author() ?></strong> (sales expert and bestselling author)</p>
					<?php endif; ?>

				</header>

				<?php the_content(); ?>

				<?php
					/* Pulls in the social media share links */
					include('resources/includes/social-media-single-post-share.php'); ?>

				<p class="copyright-and-links">Copyright &copy; by Give More Media Inc. If you'd like to tell people about this somewhere (e.g. blog, newsletter, Facebook, social media), please reference Sam Parker of GiveMore.com as the author and link directly to the article. Excerpts are great but please don't publish the article in its entirety without advanced written permission (email us at <a href="mailto:GoodThings@GiveMore.com?subject=reprint%20permission">GoodThings@GiveMore.com</a> with the subject line 'reprint permission').</p>

			</article>

		<?php endwhile; ?>

		<?php
			/* Pulls in any post specific footer ads */
			include('resources/includes/single-post-specific-product-promotions.php'); ?>

	</main>

<?php get_footer(); ?>