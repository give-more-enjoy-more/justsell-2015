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

	<main class="inner-container clear-fix">

		<header></header>

		<section class="popular-sales-tools-container">

			<h3 class="section-title">Popular Sales Tools</h3>

			<?php
				/* Variables for Popular Sales Tools Articles */
				$popular_sales_tool_1_url = '/top-30-open-ended-questions/';
				$popular_sales_tool_2_url = '/how-to-focus/';
				$popular_sales_tool_3_url = '/opening-statements/';
			?>

			<div class="sales-tool">
 				<div class="post-info">
					<a class="post-teaser-image" href="<?php echo $popular_sales_tool_1_url ?>">
						<img src="<?php echo bloginfo('template_directory') ?>/resources/images/landing-pages/homepage/post-thumbnails/open-ended-questions-485x180.jpg" alt="Open-Ended Questions" />
					</a>

		 			<h2 class="post-title"><a href="<?php echo $popular_sales_tool_1_url ?>">Open-Ended Questions</a></h2>

					<p class="post-excerpt">Gather information, qualify sales opportunity, and establish rapport ... all with these powerful questions.</p>

					<p class="cta-btn"><a href="<?php echo $popular_sales_tool_1_url ?>">read more...</a></p>
				</div> <?php /* END .post-info */ ?>
			</div> <?php /* END .sales-tool */ ?>

			<div class="sales-tool">
 				<div class="post-info">
					<a class="post-teaser-image" href="<?php echo $popular_sales_tool_2_url ?>">
						<img src="<?php echo bloginfo('template_directory') ?>/resources/images/landing-pages/homepage/post-thumbnails/how-to-focus-485x180.jpg" alt="How to Focus" />
					</a>

		 			<h2 class="post-title"><a href="<?php echo $popular_sales_tool_2_url ?>">How to Focus</a></h2>

					<p class="post-excerpt">5 simple ways to knock out distractions and stay committed to your prospects and customers.</p>

					<p class="cta-btn"><a href="<?php echo $popular_sales_tool_2_url ?>">read more...</a></p>
				</div> <?php /* END .post-info */ ?>
			</div> <?php /* END .sales-tool */ ?>

			<div class="sales-tool">
 				<div class="post-info">
					<a class="post-teaser-image" href="<?php echo $popular_sales_tool_3_url ?>">
						<img src="<?php echo bloginfo('template_directory') ?>/resources/images/landing-pages/homepage/post-thumbnails/opening-statements-485x180.jpg" alt="How to Focus" />
					</a>

		 			<h2 class="post-title"><a href="<?php echo $popular_sales_tool_3_url ?>">Opening Statements</a></h2>

					<p class="post-excerpt">Nobody really cares ... until you make them care. Learn how to craft leadoff statements that create immediate interest for further discussion.</p>

					<p class="cta-btn"><a href="<?php echo $popular_sales_tool_3_url ?>">read more...</a></p>
				</div> <?php /* END .post-info */ ?>
			</div> <?php /* END .sales-tool */ ?>

		</section> <?php /* END .popular-sales-tools-container */ ?>


		<section class="more-sales-tools-container">

			<h3 class="section-title">More Sales Tools</h3>

			<?php
				/* Variables for Popular Sales Tools Articles */
				$more_sales_tool_1_url = '/the-8-objections/';
				$more_sales_tool_2_url = '/sales-management-checklist/';
				$more_sales_tool_3_url = '/sales-interview-questions/';
				$more_sales_tool_4_url = '/the-8-objections/';
			?>

			<div class="sales-tool">
 				<div class="post-info">
		 			<h2 class="post-title"><a href="<?php echo $more_sales_tool_1_url ?>">The 8 Objections</a></h2>

					<p class="post-excerpt">Learn the 8 points behind every sales objection ... and how to turn them in your favor.</p>

					<p class="cta-btn"><a href="<?php echo $more_sales_tool_1_url ?>">read more...</a></p>
				</div> <?php /* END .post-info */ ?>
			</div> <?php /* END .sales-tool */ ?>

			<div class="sales-tool">
 				<div class="post-info">
		 			<h2 class="post-title"><a href="<?php echo $more_sales_tool_2_url ?>">Sales Management Checklist</a></h2>

					<p class="post-excerpt">The sales management fundamentals that will put you and your team in front of the pack ... and keep you there.</p>

					<p class="cta-btn"><a href="<?php echo $more_sales_tool_2_url ?>">read more...</a></p>
				</div> <?php /* END .post-info */ ?>
			</div> <?php /* END .sales-tool */ ?>

			<div class="sales-tool">
 				<div class="post-info">
		 			<h2 class="post-title"><a href="<?php echo $more_sales_tool_3_url ?>">Sales Interview Questions</a></h2>

					<p class="post-excerpt">Looking for your next sales star or your dream sales job? Get past surface-level chat and start talking about the things that matter.</p>

					<p class="cta-btn"><a href="<?php echo $more_sales_tool_3_url ?>">read more...</a></p>
				</div> <?php /* END .post-info */ ?>
			</div> <?php /* END .sales-tool */ ?>

			<div class="sales-tool">
 				<div class="post-info">
		 			<h2 class="post-title"><a href="<?php echo $more_sales_tool_4_url ?>">The 8 Objections</a></h2>

					<p class="post-excerpt">Learn the 8 points behind every sales objection ... and how to turn them in your favor.</p>

					<p class="cta-btn"><a href="<?php echo $more_sales_tool_4_url ?>">read more...</a></p>
				</div> <?php /* END .post-info */ ?>
			</div> <?php /* END .sales-tool */ ?>

			<p class="browse-all-cta"><a class="flat-btn" href="/sales-tools/">Browse all</a></p>

		</section> <?php /* END .more-sales-tools-container */ ?>


		<section class="additional-landing-pages-and-motivation">

			<div class="motivational-video">

				<h3 class="section-title">Inspire Your Team</h3>

				<div class="post-info">
					<a href="http://www.givemore.com/212-the-extra-degree/" class="post-teaser-image event-trigger launch-modal" data-modal-type="video" data-modal-id="tt" data-event-fields='{"category":"Video Popup Launch","action":"Click","label":"Video Preview - TT"}'>
						<img src="<?php echo bloginfo('template_directory') ?>/resources/images/landing-pages/homepage/motivational-video/212-video-195x110.jpg" alt="212 the extra degree video" />
					</a>

					<p class="post-excerpt">This 3-minute will get your team fired up to do better work.</p>
					<p class="cta-btn"><a href="http://www.givemore.com/212-the-extra-degree/" class="event-trigger launch-modal" data-modal-type="video" data-modal-id="tt" data-event-fields='{"category":"Video Popup Launch","action":"Click","label":"Video Preview - TT"}'>watch now...</a></p>
				</div>

			</div> <?php /* END .motivational-video */ ?>

			<div class="motivational-landing-pages">

				<h3 class="section-title">More Motivation</h3>

				<div class="post-info">
					<a href="/sales-meetings/" class="post-teaser-image">
						<img src="<?php echo bloginfo('template_directory') ?>/resources/images/landing-pages/homepage/landing-page-thumbnails/sales-meetings-195x125.jpg" alt="" />
					</a>
					<p class="cta-btn"><a href="/sales-meetings/" class="flat-btn">Sales Meeting Ideas</a></p>
				</div>

				<div class="post-info">
					<a href="/reminders-and-gear/" class="post-teaser-image">
						<img src="<?php echo bloginfo('template_directory') ?>/resources/images/landing-pages/homepage/landing-page-thumbnails/reminders-and-gear-195x125.jpg" alt="" />
					</a>
					<p class="cta-btn"><a href="/reminders-and-gear/" class="flat-btn">Reminders &amp; Gear</a></p>
				</div>

				<div class="post-info last">
					<a href="/justsell-monthly-calendars/" class="post-teaser-image">
						<img src="<?php echo bloginfo('template_directory') ?>/resources/images/landing-pages/homepage/landing-page-thumbnails/monthly-printable-calendars-195x125.jpg" alt="" />
					</a>
					<p class="cta-btn"><a href="/justsell-monthly-calendars/" class="flat-btn">Printable Calendars</a></p>
				</div>

			</div> <?php /* END .motivational-landing-pages */ ?>

		</section> <?php /* END .additional-landing-pages-and-motivation */ ?>

	</main> <?php /* END .inner-container .clear-fix */ ?>

<?php get_footer(); ?>