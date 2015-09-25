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

	<main class="inner-container">
			
		<?php if ( have_posts() ) : ?>
		
			<header class="archive-header">
				<h1 class="title"><?php single_cat_title(); ?></h1>
		
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo $category_description;
				?>
			</header> <?php /* END .archive-header */ ?>
		
			<ol class="archive-post-list">
				<?php while ( have_posts() ) : the_post(); ?>

			 			<li class="post <?php echo $oddpost ?>">

							<?php if ( get_post_meta( get_the_ID(), 'category_post_thumb', true ) ) : ?>
								<a class="post-teaser-image" href="<?php the_permalink() ?>">
									<img src="<?php echo bloginfo('template_directory') . get_post_meta( get_the_ID(), 'category_post_thumb', true ); ?>" alt="<?php the_title(); ?>" />
								</a>
							<?php endif; ?>

			 				<div class="post-info">
					 			<h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>

								<?php the_excerpt(); ?>

								<p><a class="flat-btn" href="<?php echo get_permalink(); ?>">Read More</a></p>
							</div> <?php /* END .post-info */ ?>

						</li>
						
						<?php		
							/* Adds a class of odd-post very other li */
							$oddpost = ( empty( $oddpost ) ) ? 'odd-post' : '';
						?>
									
				<?php endwhile; ?>
			</ol> <?php /* END .archive-post-list */ ?>

		
		<?php else : ?>

			<h1>No posts were found</h3>

			<p>Sorry, but no results were found for the requested category. Perhaps searching will help find a related post.</p>

			<?php get_search_form(); ?>
		
		<?php endif; ?>

	</main> <?php /* END .inner-container */ ?>

<?php get_footer(); ?>