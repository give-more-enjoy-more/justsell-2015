$(document).ready(function() {

	/* Script to hide and scroll the navigation down page */
	var $topNavigation = $("nav");

	$topNavigation.headroom({

		/* What browser scroll position to hide the navbar. Set to the height of the navigation. */
		/*	offset: $topNavigation.outerHeight(), */

		/* scroll tolerance in px before state changes */
    tolerance : {
        up : 5,
        down : 40
    },

	  classes : {
	    /* when element is initialised */
	    initial : "nav-scroll-active",
	    /* when scrolling up */
	    pinned : "pinned",
	    /* when scrolling down */
	    unpinned : "unpinned",
	    /* when above offset */
	    top : "top",
	    /* when below offset */
	    notTop : "not-top"
	  },

	  /* Callback when above offset, `this` is headroom object */
		onTop : function() {
			$(".content-container").css({ "padding-top": 0 });
		},

	  /* Callback when below offset, `this` is headroom object */
		onNotTop : function() {
			$(".content-container").css({ "padding-top": $topNavigation.outerHeight() });
		}

	}); /* END $topNavigation.headroom */


	/* Bypass the default modal window functionality to make ajax loading possible */
	$('.launch-modal').on('click', function(e){

		e.preventDefault();

		/* Check if the modal div exits, if not append to the bottom of the body */
		if($('.remodal').length === 0){
			$('body').append('<div class="remodal" data-remodal-id="modal"><button data-remodal-action="close" class="remodal-close"></button><div class="remodal-content-container"></div></div>');
		} /* END $.length */


		/* Check for data types and set to variables */
		var modalTriggerLink = $(this),
				dataModalPostID = modalTriggerLink.data("modal-post-id"),
				dataModalShowCapture = modalTriggerLink.data("modal-show-capture"),
				dataModalShowShare = modalTriggerLink.data("modal-show-share"),
				dataModalType = modalTriggerLink.data("modal-type"),
				dataModalID = modalTriggerLink.data("modal-id");


		/* Pass the data gathered above to $POST and process it with the php script via ajax.
		 * After the ajax has successfully processed the script, load the result in to the modal and open it.
		 */
		$.post( "/wp-content/themes/justsell/resources/includes/modal-ajax-processing.php", { modalPostID:dataModalPostID, modalID:dataModalID, modalType:dataModalType, showCapture:dataModalShowCapture, showShare:dataModalShowShare }, function(data){

			$(".remodal-content-container").html(data);

		}).done(function(){

			var inst = $('[data-remodal-id=modal]').remodal({closeOnOutsideClick:false, hashTracking:false});
			inst.open();

		}); /* END $.post */

	}); /* END .launch-modal on click callback function */


	/*
	 * This is called when the modal is closing and will remove the entire modal from the DOM.
	 * This was primarily put in place to keep the video modals from playing in the background.
	 */
	$(document).on('closing', '.remodal', function(e){
		var inst = $('[data-remodal-id=modal]').remodal();

		if (inst.getState() === 'closing'){
			inst.destroy();
		}
	});


	/* Google Analytics Event Tracking function. Simply place class 'event-trigger' to tag, and pass data like the example below. */
	/* Example data attribute: data-event-fields='{"category":"JustSell Monthly Calendars","action":"Download","label":"September 2015"}' */
	$('.event-trigger').click(function(){

		var trackedEvent = $(this),
				trackedEventAction = trackedEvent.data("event-fields").action,
				trackedEventCategory = trackedEvent.data("event-fields").category,
				trackedEventLabel = trackedEvent.data("event-fields").label;

		ga('send', 'event', trackedEventCategory, trackedEventAction, trackedEventLabel);

	}); /* END .event-trigger click function */


	/* Scrolls any url/href anchor tags down to their appropriate section */
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {

			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 2000);
				return false;
			}
		}
	}); /* END href with hash click function */


	/* Validation function for the footer subscriber acquisition form. */
	$('#footer-subscriber-acquisition-form').validate({
		rules: {
			footerSubscriberAcquisitionEmail: {
				required: true,
				email: true
			}
		},

		messages: {
			footerSubscriberAcquisitionEmail: {
				required: 'Please enter your email address',
				email: 'Please enter a valid email address'
			}
		},

		errorElement: "p",

		errorPlacement: function(error) {
			error.appendTo('#footer-subscriber-acquisition-form');
		},

		submitHandler: function(form) {
			var action = $(form).attr('action');

			$.post(action, $(form).serialize(), function() {
				$('.footer-subscriber-acquisition .inner-container').fadeOut(300, function(){
					$('<div class="inner-container"><p>Thanks for signing up! Sam\'s emails will come from GiveMore.com.</p><h3>We hope they inspire you!</h3></div>').hide().appendTo('.footer-subscriber-acquisition').fadeIn(300);
				});

				/* [ Trigger a Google Analytics Event if the visitor successfully signs up.  ] */
				// ga('send', 'event', 'Video Email Signup', 'Click', 'Email Captured From Video');
			});
		}
	}); /* END #footer-subscriber-acquisition-form validate function */


}); /* END document ready callback function */



/*
 * This function is called by the modal-ajax-processing.php file after email capture.
 */
function play_modal_vimeo_video(){
	var vimeoVideo = $('#vimeoIframeVideo')[0],
			player = $f(vimeoVideo);

	player.api('play');
}