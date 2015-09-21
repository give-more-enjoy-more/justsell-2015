<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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