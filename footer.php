<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage JustSell.com 2015
 */
?>

	<?php
		/* Pulls in the subscriber form and processing */
		include('resources/includes/footer-subscriber-acquisition.php'); ?>


		<section class="about-the-author">
			<div class="inner-container clear-fix">
				<img src="<?php echo bloginfo('template_directory') ?>/resources/images/icons/throughout/sam-head-smile-circle-200x200.png" class="author-headshot" alt="Sam Parker">

				<div class="author-bio">
					<h2>About Sam Parker</h2>
					<p>Sam Parker co-founded Give More Media Inc. in 1998 after selling for more than a decade in several different industries. He has written most of the content on JustSell.com and GiveMore.com, as well as 5 bestselling books and booklets (212 the extra degree, Smile & Move, Lead Simply, Cross The Line, and Love Your People). He also speaks to groups and organizations to help inspire more effort, care, and attention at work.</p>
				</div>
			</div> <?php /* END .inner-container .clear-fix */ ?>
		</section> <?php /* END .about-the-author */ ?>


		<footer>
			<div class="inner-container">
				<p>JUSTSELL.COM IS PART OF THE GIVEMORE.COM FAMILY OF WEBSITES.</p>

				<p>Copyright &copy; by Give More Media Inc. If you'd like to tell people about it somewhere (e.g., blog, newsletter, Facebook, social media), please reference Sam Parker of GiveMore.com as the author and link directly to the article. Excerpts are great but please don't publish the article in its entirety without advanced written permission (email Sam at <a href="mailto:Sparker@GiveMore.com">Sparker@GiveMore.com</a> with the subject line 'reprint permission').</p>
				
				<p class="copyright-and-links">&copy; 1998 - 2015 by Give More Media Inc. Richmond, VA | <a href="">GiveMore.com</a> | <a href="">Privacy &amp; terms</a></p>
			</div> <?php /* END .inner-container */ ?>
		</footer> <?php /* END footer */ ?>

	</div> <?php /* END .content-container */ ?>


	<?php
		/* Pulls in the footer javascripts */
		include('resources/includes/footer-javascript-imports.php'); ?>

	<?php  wp_footer(); ?>

</body>
</html>