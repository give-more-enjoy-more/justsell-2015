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
					<p class="article-author">by <strong itemprop="author">Sam Parker</strong> (sales veteran and bestselling author)</p>

				</header>
				
				<?php the_content(); ?>

			</article>

		<?php endwhile; ?>

	</main>

<?php get_footer(); ?>