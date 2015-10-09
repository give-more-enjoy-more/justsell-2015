<?php 

/* ========================================================================== */
												/* [ Global Sitewide Functions ] */
/* ========================================================================== */

/*
 * @name: Capture Cookie Check and Set
 * @function: This function checks if the 'emailSuccessfullyCaptured' cookie is set.
 */
function capture_cookie_check_and_set(){

	if ( !isset($_COOKIE["emailSuccessfullyCaptured"]) )
		setcookie("emailSuccessfullyCaptured", "gotit", time()+86400*365, "/");

} /* END capture_cookie_check_and_set function */


/*
 * @name: Is Capture Cookie Set
 * @function: This function checks if the 'emailSuccessfullyCaptured' cookie is set.
 */
function is_capture_cookie_set(){

	if ( isset($_COOKIE["emailSuccessfullyCaptured"]) )
		return TRUE;
	else
		return FALSE;

} /* END is_capture_cookie_set function */


/*
 * @name: Process Capture
 * @function: This function writes the captured email address and accompaning info to the master file, then sets the capture if not set by calling the capture_cookie_check_and_set function.
 * @arguments: $captured_email, $captured_name, $capture_type, $capture_id
 */
function process_capture($captured_email, $captured_name = '', $capture_type = '', $capture_id = ''){

	/* Initilize all variables to be captured */
	switch($capture_type):

		case "book":
			$capture_alt_source = 'gm-book-capture-' . $capture_id;
			break;

		case "footer-subscriber-acquisition":
			$capture_alt_source = 'footer-subscriber-form';
			break;

		case "info":
			$capture_alt_source = 'gm-info-capture';
			break;

		case "post-etf":
			$capture_alt_source = 'gm-post-etf-capture';
			break;

		case "post-pdf-request":
			$capture_alt_source = 'gm-post-pdf-request-capture';
			break;

		case "video":
			$capture_alt_source = 'gm-video-capture-' . $capture_id;
			break;

		default:
			$capture_alt_source = '';
			break;

	endswitch;

	date_default_timezone_set('America/New_York'); /* Explicitly set timezone because the server's "local time" isn't set correctly and couldn't figure out how to resolve. */
	$capture_date = date("m/d/y g:i a");

	$capture_email = $captured_email;
	$capture_ip_address = $_SERVER['REMOTE_ADDR'];
	$capture_name = !empty($captured_name) ? $captured_name : 'Everyone';
	$capture_source = 'gm-capture';

	/* Write name, email, date, ip address, source, and alt aource to the master capture file */
	$fp = fopen('/var/www/html/justsell/wp-content/themes/justsell/resources/docs/capture-docs/Master_Capture_List.txt', 'a');
	fwrite($fp, $capture_name."\t".$capture_email."\t".$capture_date."\t".$capture_ip_address."\t".$capture_source."\t".$capture_alt_source."\n") or die('fwrite failed');
	fclose($fp);

	/* Set the email successfully captured cookie if it isn't already set */
	capture_cookie_check_and_set();

} /* END process_capture function */

?>