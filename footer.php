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
		/* Pull in the generic global functions needed sitewide. */
		require_once('/var/www/html/justsell/wp-content/themes/justsell/resources/includes/global-functions.php'); ?>

	<?php
		/* Pulls in the subscriber form and processing */
		include('resources/includes/footer-subscriber-acquisition.php'); ?>

		<section class="about-the-author">
			<div class="inner-container clear-fix">
				<img src="<?php echo bloginfo('template_directory') ?>/resources/images/icons/throughout/sam-head-smile-circle-200x200.png" class="author-headshot" alt="Sam Parker">

				<div class="author-bio">
					<h2>About Sam Parker</h2>

					<p>Sam Parker is the author of this material and co-founder of <a href="http://www.GiveMore.com">GiveMore.com</a>. Before launching JustSell, Sam carried a bag in 5 different industries (office products, financial services, pharmaceuticals, joint replacements, and software).</p>

					<p>Sam is also the creator of several bestselling inspirational messages. Each is helping thousands of organizations care more about their work and the people they serve (available at <a href="http://www.GiveMore.com">GiveMore.com</a>). They include <a href="http://www.givemore.com/212-the-extra-degree/">212 the extra degree</a>, <a href="http://www.givemore.com/sales-tough/">SalesTough</a>, <a href="http://www.givemore.com/cross-the-line/">Cross The Line</a>, <a href="http://www.givemore.com/smile-and-move/">Smile &amp; Move</a>, <a href="http://www.givemore.com/love-your-people/">Love Your People</a>, and <a href="http://www.givemore.com/lead-simply/">Lead Simply</a>.</p>

					<p>Need a speaker for an upcoming sales meeting or event? Sam can help. Learn more at <a href="http://www.givemore.com/speaking/">GiveMore.com/Speaking</a> or call us at <a href="tel:18669524483">866-952-4483</a>.</p>
				</div>
			</div> <?php /* END .inner-container .clear-fix */ ?>
		</section> <?php /* END .about-the-author */ ?>


		<footer>
			<div class="inner-container clear-fix">

				<div class="general-info-copyright">
					<h4 class="title">JustSell.com is published by GiveMore.com</h4>

					<p class="subtitle">Since 1998, we've been providing no-fluff tools, ideas, and inspiration to help sales leaders sell more.</p>

					<p class="contact-information"><span class="no-wrap"><span class="contact-attribute">Phone</span> - <a href="tel:18669524483">1-866-952-4483</a></span> <span class="no-wrap"><span class="contact-attribute email">Email</span> - <a href="mailto:GoodThings@GiveMore.com">GoodThings@GiveMore.com</a></span></p>

					<p class="copyright-and-links">Copyright &copy; 1998 - <?php echo date('Y'); ?> Give More Media Inc.</p>

				</div> <?php /* END .general-info-copyright */ ?>

				<div class="office-location">
					<a class="office-map" href="https://www.google.com/maps/preview?q=115+South+15th+Street+Suite+502+Richmond,+VA+23219&ie=UTF-8&hq=&hnear=0x89b1111968e958ab:0x711b8eb839153665,115+S+15th+St+%23502,+Richmond,+VA+23219&gl=us&ei=f3t6U6jYNdapyASbrYKYAQ&ved=0CCcQ8gEwAA" target="_blank"><img src="<?php echo bloginfo('template_directory') ?>/resources/images/icons/throughout/footer-office-map-location-215x155.jpg" height="155" width="215" alt="Office Location" title="Office Location" /></a>
					
					<address>
						115 South 15th Street<br />
						Suite 502<br />
						Richmond, VA 23219 USA
					</address>
				</div> <?php /* END .office-location */ ?>

			</div> <?php /* END .inner-container .clear-fix */ ?>
		</footer> <?php /* END footer */ ?>

	</div> <?php /* END .content-container */ ?>


	<?php
		/* Pulls in the footer javascripts */
		include('resources/includes/footer-javascript-imports.php'); ?>

	<?php wp_footer(); ?>

</body>
</html>