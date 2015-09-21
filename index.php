<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
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
					
					<h1 class="article-title" itemprop="name"><?php the_title(); ?></h1>
					<p class="article-author">by <strong itemprop="author">Sam Parker</strong> (sales veteran and bestselling author)</p>

				</header>
				
				<?php the_content(); ?>

			</article>

		<?php endwhile; ?>

	</main>

<?php get_footer(); ?>