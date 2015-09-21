<?php


/*
 * Run the default modal ajax processing if the required modal variable 'modalType' is set in $_POST
 */
if( isset($_POST["modalType"]) ){

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
			process_error_modal();
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
		<h1>$book_title</h1>
	";

} /* END process_book_modal function */


/*
 * @name: Process Error Modal
 * @function: This function echos the default modal not found message.
 */
function process_error_modal(){

	echo '
		<h1>So sorry, it looks like this modal doesn\'t exist. </h1>
	';

} /* END process_error_modal function */


/*
 * @name: Process Info Modal
 * @function: This function processes and handles info modals.
 */
function process_info_modal(){

	// echo out result
	echo '
		<h1>This is an info modal!</h1>
	';

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
	$fp = fopen('/var/www/html/joegilbert.me/resources/docs/capture_docs/Master_Capture_List.txt', 'a');
	fwrite($fp, $modal_capture_name."\t".$modal_capture_email."\t".$modal_capture_date."\t".$modal_capture_ip_address."\t".$modal_capture_source."\t".$modal_capture_alt_source."\n") or die('fwrite failed');
	fclose($fp);

	/* Set the email successfully captured cookie if it isn't already set */
	if ( !isset($_COOKIE["emailSuccessfullyCapture"]) )
		setcookie("emailSuccessfullyCapture", "gotit", time()+86400*365, "/");

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
	$cookie_not_created = !isset($_COOKIE["emailSuccessfullyCapture"]);
	$show_video_capture = is_null( $_POST["showCapture"] );
	$show_video_share = is_null( $_POST["showShare"] );
	$video_modal_result_echo = '';

	/* Set brand specific variables */
	switch($modal_id):

		case "ctl":
			$video_src = '//player.vimeo.com/video/42272816';
			$video_title = 'Cross The Line video';
			break;

		case "ctl-edu":
			$video_src = '//player.vimeo.com/video/42272814';
			$video_title = 'Cross The Line video';
			break;

		case "ls":
			$video_src = '//player.vimeo.com/video/71604847';
			$video_title = 'Lead Simply video';
			break;

		case "lyp":
			$video_src = '//player.vimeo.com/video/41103076';
			$video_title = 'Love Your People video';
			break;

		case "sm":
			$video_src = '//player.vimeo.com/video/111015361';
			$video_title = 'Smile &amp; Move video';
			break;

		default:
			$video_src = '//player.vimeo.com/video/109480151';
			$video_title = '212&deg; the extra degree video';
			break;

	endswitch;


	/*
	 * Assemble the modal contents to echo.
	 */
	$video_modal_result_echo .= "<h1>$video_title</h1>";

	/* Show the video capture form and video depending on boolean, true by default. If false, show video only. */
	if($show_video_capture && $cookie_not_created){

		$video_modal_result_echo .= "<div class='embed-video-capture-container'>";
		$video_modal_result_echo .= "
			<form action='/wp-content/themes/justsell/resources/scripts/modal-ajax-processing.php' method='post' name='videoEmailCaptureForm' class='video-email-capture-form' id='videoEmailCaptureForm'>
				<p class='title'>Please enter your email address to view the video.</p>
				<p class='single-input-submit'>
					<input name='videoEmail' class='video-email' type='text' placeholder='Enter Your Email Here' />
					<input name='modalType' type='hidden' value='$modal_type' />
					<input name='modalID' type='hidden' value='$modal_id' />
					<input name='videoEmailSubmit' type='submit' class='flat-btn' value='Submit' /></p>
			</form>
			<div class='video-overlay'></div>

			<script src='/wp-content/themes/justsell/resources/js/jquery.validate.min.js'></script>

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

					errorPlacement: function(error) {
						error.appendTo('#videoEmailCaptureForm');
					},
				
					submitHandler: function(form) {
						var action = $(form).attr('action');

						$.post(action, $(form).serialize(), function(data) {
							$('.video-email-capture-form, .video-overlay').fadeOut(200);
							
							/* [ Trigger a Google Analytics Event if the visitor successfully signs up.  ] */
							// ga('send', 'event', 'Video Email Signup', 'Click', 'Email Captured From Video');
							
						});
					}	
					
				});
			</script>";
		$video_modal_result_echo .= "<div class='embed-video-container'><iframe class='iframe-video' src='$video_src' frameborder='0'></iframe></div>";
		$video_modal_result_echo .= "</div>";

	}else{
		$video_modal_result_echo .= "<div class='embed-video-container'><iframe class='iframe-video' src='$video_src' frameborder='0'></iframe></div>";
	}
	
	/* Show the video share depending on boolean, true by default */
	if($show_video_share)
		$video_modal_result_echo .= "<h2>video share will go here</h2>";

	/* Echo out the compiled result */
	echo $video_modal_result_echo;

} /* END process_video_modal function */

?>