<?php
/*
Description: Spits out and controlls the footer subscriber acquisition bar
Author: Joe Gilbert
Version: 0.1
*/


/*
 * Pull in the generic global functions needed
 */
include('global-functions.php');


/* Launch this mama jama */
footer_subscriber_acquisition_control();


/*
 * Simply returns the pdf request input form when called.
 */
function display_footer_subscriber_acquisition_form($pre_form_content = '')
{
	/* Build the form and set it to the form_string variable. */
	$form_output_string = '
		<section class="footer-subscriber-acquisition">
			<div class="inner-container">
				'. $pre_form_content .'
				<p><strong>Want more of Sam\'s thoughts?</strong></p>
				<p>Enter your email to get more of his motivating ideas.</p>
				<form action="'. $_SERVER['REQUEST_URI'] .'" method="post" name="footerSubscriberAcquisitionForm" id="footer-subscriber-acquisition-form">
					<p>
						<input name="footerSubscriberAcquisitionEmail" type="text" placeholder="Enter your email here">
						<input name="footerSubscriberAcquisitionSubmit" type="submit" value="Get inspired now">
					</p>
				</form>
			</div>
		</section>';

	echo $form_output_string;
} /* END function display_footer_subscriber_acquisition_form */


/*
 * Either calls the display form function, or the process form function.
 */
function footer_subscriber_acquisition_control()
{
  if ( 'POST' !== $_SERVER['REQUEST_METHOD'] || !isset ($_POST['footerSubscriberAcquisitionSubmit']) )
  {
		display_footer_subscriber_acquisition_form();
  }
  else
  {
		process_footer_subscriber_acquisition_form();
  }
} /* END function footer_subscriber_acquisition_control */


/*
 * Processes the form after user submission. It will ultimately either display any errors, or control emailing the pdf.
 */
function process_footer_subscriber_acquisition_form()
{
	/* Initialize variables */
	$error = array();
	$subscriber_acquisition_email = isset($_POST["footerSubscriberAcquisitionEmail"]) ? $_POST["footerSubscriberAcquisitionEmail"] : '';

	/* Clean email address */
	if(strlen($subscriber_acquisition_email) <= 0){
		$error[] = "Please enter your email.";
	}else{
		if(!preg_match("/^([a-z0-9_]\.?)*[a-z0-9_]+@([a-z0-9-_]+\.)+[a-z]{2,3}$/i", stripslashes(trim($subscriber_acquisition_email)))) {$error[] = "Please enter a valid e-mail address.";}
	}

	/* Return errors found or writes the subscriber specific info to the master capture file. */
	if(sizeof($error) > 0)
	{
		$size = sizeof($error);
		$error_message = '<div class="form-errors-container">';
	
		for ($i=0; $i < $size; $i++)
		{
			if($i == 0)
				$error_message .= '<h3 class="form-error-title">Form Errors</h3>';
			
			$error_message .= '<p class="form-error">- '.$error[$i].'</p>';
		}

		$error_message .= '</div>';

		echo display_footer_subscriber_acquisition_form($error_message);
	}
	else
	{

		date_default_timezone_set('America/New_York'); /* Explicitly set timezone because the server's "local time" isn't set correctly and couldn't figure out how to resolve. */
		$subscriber_acquisition_date = date("m/d/y g:i a");
		
		$subscriber_acquisition_email = $subscriber_acquisition_email;
		$subscriber_acquisition_ip_address = $_SERVER['REMOTE_ADDR'];
		$subscriber_acquisition_name = 'Everyone';
		$subscriber_acquisition_source = 'gm-capture';
		$subscriber_acquisition_alt_source = 'footer-subscriber-form';

		/* Write name, email, date, ip address, source, and alt aource to the master capture file */
		$fp = fopen('/var/www/html/justsell.com/wp-content/themes/justsell/resources/docs/capture-docs/Master_Capture_List.txt', 'a');
		fwrite($fp, $subscriber_acquisition_name."\t".$subscriber_acquisition_email."\t".$subscriber_acquisition_date."\t".$subscriber_acquisition_ip_address."\t".$subscriber_acquisition_source."\t".$subscriber_acquisition_alt_source."\n") or die('fwrite failed');
		fclose($fp);

		/* Set the email successfully captured cookie if it isn't already set */
		capture_cookie_check_and_set();  /* is_capture_cookie_set in global functions file */

		echo '
		<section class="footer-subscriber-acquisition">
			<div class="inner-container">
				<p>Thanks for signing up! Sam\'s emails will come from GiveMore.com.</p>
				<h3>We hope they inspire you!</h3>
			</div>
		</section>';

	}
} /* END function process_footer_subscriber_acquisition_form */


?>