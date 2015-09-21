<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
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

				</header>

				
				<?php the_content(); ?>


			</article>

		<? endwhile; ?>

	</main>

<?php get_footer(); ?>
