<?php

/*
 * Pull in the generic global functions needed
 */
include('../includes/global-functions.php');


/*
 * Run the default modal ajax processing if the required modal variable 'modalType' is set in $_POST
 */
if( isset($_POST["modalType"]) && !isset($_POST["videoEmailSubmit"]) ){

	/* Set default required modal vars from post */
	$modal_type = isset($_POST["modalType"]) ? $_POST["modalType"] : '';
	$modal_id = isset($_POST["modalID"]) ? $_POST["modalID"] : '';

	/*
	 * See if the modal type was set and pass to defined function or the error function if modal type wasn't found
	 */
	switch($modal_type):

		case "book":
			process_book_modal();
			break;

		case "info":
			process_info_modal();
			break;

		case "video":
			process_video_modal();
			break;

		default:
			process_modal_not_found();
			break;

	endswitch;

} /* END if isset post modalType */


/*
 * This will run after the modal video capture form is submitted.
 */
if( isset($_POST["videoEmailSubmit"]) ){

	/* Set default form submission vars from post */
	$captured_email = isset($_POST["videoEmail"]) ? $_POST["videoEmail"] : '';
	$errors = array();
	$modal_type = isset($_POST["modalType"]) ? $_POST["modalType"] : '';
	$modal_id = isset($_POST["modalID"]) ? $_POST["modalID"] : '';

	/* Validate the entered email and set the error variable if not valid. */
	if(strlen($captured_email) <= 0){
		$errors[] = "Please enter your email.";
	}else{
		if(!preg_match("/^([a-z0-9_]\.?)*[a-z0-9_]+@([a-z0-9-_]+\.)+[a-z]{2,3}$/i", stripslashes(trim($meetingPDFContactEmail)))) {$error[] = "Please enter a valid e-mail address.";}
	}

	/* If there are no errors, pass their cleaned vars to the capture processing function. If there were, display them. */
	if(sizeof($errors) > 0){
		process_modal_form_errors($errors);
	}else{
		process_modal_capture($captured_email, $modal_type, $modal_id);
	}

}


/* ========================================================================== */
															/* [ Functions ] */
/* ========================================================================== */

/*
 * @name: Process Book Modal
 * @function: This function processes the modal id and echos the book preview and script to control it.
 */
function process_book_modal(){

	/* Initilize global variables needed by this function. By default, variables in functions have local scope, and need to be set to global to access vars set outside the function. */
	global $modal_id;

	/* Set brand specific variables */
	switch($modal_id):

		case "ctl":
			$book_title = 'Cross The Line';
			break;

		case "ctl-edu":
			$book_title = 'Cross The Line';
			break;

		case "ls":
			$book_title = 'Lead Simply';
			break;

		case "lyp":
			$book_title = 'Love Your People';
			break;

		case "sm":
			$book_title = 'Smile &amp; Move';
			break;

		default:
			$book_title = '212&deg; the extra degree';
			break;

	endswitch;


	// echo out result
	echo "
		<h2 class='modal-title'>$book_title</h2>
	";

} /* END process_book_modal function */


/*
 * @name: Process Modal Not Found
 * @function: This function echos the default modal not found message.
 */
function process_modal_not_found(){

	echo "
		<h2 class='modal-title'>Uh oh!</h2>
		<h3>Sorry! It looks like this modal doesn\'t exist.</h3>'
	";

} /* END process_modal_not_found function */


/*
 * @name: Process Info Modal
 * @function: This function processes and handles info modals.
 */
function process_info_modal(){

	echo "
		<h2 class='modal-title'>This is an info modal!</h2>
	";

} /* END process_info_modal function */


/*
 * @name: Process Modal Capture
 * @function: This function writes the captured email address and accompaning info to the master file.
 * @arguments: $captured_email, $modal_type, $modal_id
 */
function process_modal_capture($captured_email, $modal_type, $modal_id){

	/* Initilize all variables to be captured */
	switch($modal_type):

		case "book":
			$modal_capture_alt_source = 'gm-book-capture-' . $modal_id;
			break;

		case "video":
			$modal_capture_alt_source = 'gm-video-capture-' . $modal_id;
			break;

		default:
			$modal_capture_alt_source = '';
			break;

	endswitch;

	date_default_timezone_set('America/New_York'); /* Explicitly set timezone because the server's "local time" isn't set correctly and couldn't figure out how to resolve. */
	$modal_capture_date = date("m/d/y g:i a");

	$modal_capture_email = $captured_email;
	$modal_capture_ip_address = $_SERVER['REMOTE_ADDR'];
	$modal_capture_name = 'Everyone';
	$modal_capture_source = 'gm-capture';

	/* Write name, email, date, ip address, source, and alt aource to the master capture file */
	$fp = fopen('/var/www/html/justsell.com/wp-content/themes/justsell/resources/docs/capture-docs/Master_Capture_List.txt', 'a');
	fwrite($fp, $modal_capture_name."\t".$modal_capture_email."\t".$modal_capture_date."\t".$modal_capture_ip_address."\t".$modal_capture_source."\t".$modal_capture_alt_source."\n") or die('fwrite failed');
	fclose($fp);

	/* Set the email successfully captured cookie if it isn't already set */
//	capture_cookie_check_and_set();  /* is_capture_cookie_set in global functions file */

} /* END process_modal_capture function */


/*
 * @name: Process Modal Form Errors
 * @function: This function processes and handles modals form errors.
 * @arguments: $errors
 */
function process_modal_form_errors($errors){

	$size = sizeof($error);

	for ($i=0; $i < $size; $i++)
	{
		if($i == 0)
			echo '<h3>Please fix the errors bellow and resubmit the form</h3>';

		echo '<p class="modal-form-errors">- '.$error[$i].'</p>';
	}

} /* END process_modal_form_errors function */


/*
 * @name: Process Video Modal
 * @function: This function processes the modal id and echos the video and script to control it.
 */
function process_video_modal(){

	/* Initilize global variables needed by this function. By default, variables in functions have local scope, and need to be set to global to access vars set outside the function. */
	global $modal_type, $modal_id;

	/* Initilize function specific vars needed */
 	$cookie_not_created = !is_capture_cookie_set(); /* is_capture_cookie_set in global functions file */
	$show_video_capture = is_null( $_POST["showCapture"] );
	$show_video_share = is_null( $_POST["showShare"] );
	$video_modal_result_echo = '';

	/* Set brand specific variables */
	switch($modal_id):

		case "ctl":
			$video_src = '//player.vimeo.com/video/42272816?api=1&player_id=vimeoIframeVideo';
			$video_title = 'Cross The Line video';
			break;

		case "ctl-edu":
			$video_src = '//player.vimeo.com/video/42272814?api=1&player_id=vimeoIframeVideo';
			$video_title = 'Cross The Line video';
			break;

		case "ls":
			$video_src = '//player.vimeo.com/video/71604847?api=1&player_id=vimeoIframeVideo';
			$video_title = 'Lead Simply video';
			break;

		case "lyp":
			$video_src = '//player.vimeo.com/video/41103076?api=1&player_id=vimeoIframeVideo';
			$video_title = 'Love Your People video';
			break;

		case "sm":
			$video_src = '//player.vimeo.com/video/111015361?api=1&player_id=vimeoIframeVideo';
			$video_title = 'Smile &amp; Move video';
			break;

		default:
			$video_src = '//player.vimeo.com/video/109480151?api=1&player_id=vimeoIframeVideo';
			$video_title = '212&deg; the extra degree video';
			break;

	endswitch;


	/*
	 * Assemble the modal contents to echo.
	 */
	$video_modal_result_echo .= "<h2 class='modal-title'>$video_title</h2>";

	/* Show the video capture form and video depending on boolean, true by default. If false, show video only. */
	if($show_video_capture && $cookie_not_created){

		$video_modal_result_echo .= "<div class='embed-video-capture-container'>";
		$video_modal_result_echo .= "
			<form action='/wp-content/themes/justsell/resources/includes/modal-ajax-processing.php' method='post' name='videoEmailCaptureForm' class='video-email-capture-form' id='videoEmailCaptureForm'>
				<p class='title'>Please enter your email address to view the video.</p>
				<p class='single-input-submit'>
					<input name='videoEmail' class='video-email' type='text' placeholder='Enter Your Email Here' />
					<input name='modalType' type='hidden' value='$modal_type' />
					<input name='modalID' type='hidden' value='$modal_id' />
					<input name='videoEmailSubmit' type='submit' value='Watch It!' /></p>
			</form>
			<div class='video-overlay'></div>

			<script>
				$('#videoEmailCaptureForm').validate({
					rules: {
						videoEmail: {
							required: true,
							email: true
						}
					},

					messages: {
						videoEmail: {
						   required: 'Please enter your email address',
						   email: 'Please enter a valid email address'
						 }
					},

					errorElement: 'p',

					errorPlacement: function(error) {
						error.appendTo('#videoEmailCaptureForm');
					},

					submitHandler: function(form) {
						var action = $(form).attr('action');

						$.post(action, $(form).serialize(), function(data) {
							$('.video-email-capture-form, .video-overlay').fadeOut(200);

							var iframe = $('#vimeoIframeVideo')[0],
									froogaloop = $f(iframe);

							froogaloop.play();

							/* [ Trigger a Google Analytics Event if the visitor successfully signs up.  ] */
							// ga('send', 'event', 'Video Email Signup', 'Click', 'Email Captured From Video');

						});
					}

				});
			</script>";
		$video_modal_result_echo .= "<div class='embed-video-container'><iframe class='iframe-video' id='vimeoIframeVideo' src='$video_src' frameborder='0'></iframe></div>";
		$video_modal_result_echo .= "</div>";

	}else{
		$video_modal_result_echo .= "<div class='embed-video-container'><iframe class='iframe-video' idvimeoIframeVideo' src='$video_src' frameborder='0'></iframe></div>";
	}

	/* Show the video share depending on boolean, true by default */
	if($show_video_share){

		/* Initialize url variables */
		$gm_base_url = 'http://www.givemore.com';
		$js_base_url = 'http://www.justsell.com';

		/* Set brand specific variables */
		switch($modal_id):

			case "ctl":
				$brand_name = 'Cross The Line';
				$image_url 	= $js_base_url . '/wp-content/themes/justsell/resources/images/products/throughout/ctl-video-organization-700x700.jpg';
				$learn_url 	= $gm_base_url . '/cross-the-line/';
				$share_url 	= $learn_url;
				$shop_url 	= $gm_base_url . '/product/cross-the-line-video-organization-edition/';
				break;

			case "ls":
				$brand_name = 'Lead Simply';
				$image_url 	= $js_base_url . '/wp-content/themes/justsell/resources/images/products/throughout/ls-video-700x700.jpg';
				$learn_url 	= $gm_base_url . '/lead-simply/';
				$share_url 	= $learn_url;
				$shop_url 	= $gm_base_url . '/product/lead-simply-video/';
				break;

			case "lyp":
				$brand_name = 'Love Your People';
				$image_url 	= $js_base_url . '/wp-content/themes/justsell/resources/images/products/throughout/lyp-video-700x700.jpg';
				$learn_url 	= $gm_base_url . '/love-your-people/';
				$share_url 	= $learn_url;
				$shop_url 	= $gm_base_url . '/product/love-your-people-video/';
				break;

			case "sm":
				$brand_name = 'Smile & Move';
				$image_url 	= $js_base_url . '/wp-content/themes/justsell/resources/images/products/throughout/sm-video-700x700.jpg';
				$learn_url 	= $gm_base_url . '/smile-and-move/';
				$share_url 	= $learn_url;
				$shop_url 	= $gm_base_url . '/product/smile-and-move-video-the-smovie/';
				break;

			default:
				$brand_name = '212 the extra degree';
				$image_url 	= $js_base_url . '/wp-content/themes/justsell/resources/images/products/throughout/212-video-700x700.jpg';
				$learn_url 	= $gm_base_url . '/212-the-extra-degree/';
				$share_url 	= $learn_url;
				$shop_url		= $gm_base_url . '/product/212-the-extra-degree-video/';
				break;

		endswitch;

		$video_modal_result_echo .= '
			<div class="etf-cta-btns">
				<ul class="cta-options">
					<li class="cta-btn"><a href="'. $shop_url .'"><img class="modal-option-icon" src="/wp-content/themes/justsell/resources/images/icons/throughout/modal-shop-45x40.png" alt="Shop" width="45" height="40" /> Buy the video</a></li>
					<li class="cta-btn"><a href="'. $learn_url .'"><img class="modal-option-icon" src="/wp-content/themes/justsell/resources/images/icons/throughout/modal-learn-more-37x40.png" alt="Learn" width="37" height="40" /> Learn more</a></li>
					<li class="cta-btn share-prompt last">
						<a href="'. $learn_url .'"><img class="modal-option-icon" src="/wp-content/themes/justsell/resources/images/icons/throughout/modal-share-33x40.png" alt="Share" width="33" height="40" /> Share the video</a>
					</li>
				</ul>

				<ul class="cta-options social-share">
					<li class="cta-btn"><a class="event-trigger" href="https://www.facebook.com/sharer/sharer.php?u='. $share_url .'" data-event-values=\'{"category":"Social Media Share","action":"Share","label":"Facebook"}\' title="Share this on Facebook" target="_blank"><img class="social-media-icon" src="/wp-content/themes/justsell/resources/images/icons/social-media/modal-share-facebook-26x27.png" alt="Facebook" width="26" height="27" /> Facebook</a></li>
					<li class="cta-btn"><a class="event-trigger" href="http://twitter.com/?status=Love+this+for+motivation+from+GiveMore.com...+'. $share_url .'+@Give_More" data-event-values=\'{"category":"Social Media Share","action":"Share","label":"Twitter"}\' title="Tweet this" target="_blank"><img class="social-media-icon" src="/wp-content/themes/justsell/resources/images/icons/social-media/modal-share-twitter-26x21.png" alt="Twitter" width="26" height="21" /> Twitter</a></li>
					<li class="cta-btn"><a class="event-trigger" href="https://plus.google.com/share?url='. $share_url .'" data-event-values=\'{"category":"Social Media Share","action":"Share","label":"Google Plus"}\' title="Share this on Google+" target="_blank"><img class="social-media-icon" src="/wp-content/themes/justsell/resources/images/icons/social-media/modal-share-google-plus-26x24.png" alt="Google+" width="26" height="24" /> Google+</a></li>
					<li class="cta-btn"><a class="event-trigger" href="http://www.linkedin.com/shareArticle?mini=true&url='. $share_url .'" data-event-values=\'{"category":"Social Media Share","action":"Share","label":"LinkedIn"}\' title="Share this on LinkedIn" target="_blank"><img class="social-media-icon" src="/wp-content/themes/justsell/resources/images/icons/social-media/modal-share-linkedin-26x22.png" alt="LinkedIn" width="26" height="22" /> LinkedIn</a></li>
					<li class="cta-btn last"><a class="event-trigger" href="http://pinterest.com/pin/create/button/?url='. $share_url .'&media='. $image_url .'" data-event-values=\'{"category":"Social Media Share","action":"Share","label":"Pinterest"}\' title="Share this on Pinterest" target="_blank"><img class="social-media-icon" src="/wp-content/themes/justsell/resources/images/icons/social-media/modal-share-pinterest-26x26.png" alt="Pinterest" width="26" height="26" /> Pinterest</a></li>
				</ul>
			</div>

			<script>
				/* Share menu functionality for modal windows */
				$(".etf-cta-btns .share-prompt").on(\'click\', function(e){
					e.preventDefault();
					$(".etf-cta-btns .social-share").slideToggle(300);
				});
			</script>
		';

	} /* END if $show_video_share */
	

	/* Echo out the compiled result */
	echo $video_modal_result_echo;

} /* END process_video_modal function */

?>