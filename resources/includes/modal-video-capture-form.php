<form action='/resources/includes/modal-ajax-processing.php' method='post' name='videoEmailCaptureForm' class='video-email-capture-form' id='videoEmailCaptureForm'>
	<p class='title'>Please enter your email address to view the video.</p>
	<p class='single-input-submit'>
		<input name='videoEmail' class='video-email' type='text' placeholder='Enter Your Email Here' />
		<input name='modalType' type='hidden' value='$modal_type' />
		<input name='modalID' type='hidden' value='$modal_id' />
		<input name='videoEmailSubmit' type='submit' class='flat-btn' value='Submit' /></p>
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
	
		submitHandler: function(form) {
			var action = $(form).attr('action');

			$.post(action, $(form).serialize(), function(data) {
				$('.video-email-capture-form, .video-overlay').fadeOut(200);
				
				/* [ Trigger a Google Analytics Event if the visitor successfully signs up.  ] */
				// ga('send', 'event', 'Video Email Signup', 'Click', 'Email Captured From Video');
				
			});
		}	
		
	});
</script>