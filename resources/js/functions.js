$(document).ready(function() {

	/* Script to hide and scroll the navigation down page */
	var $topNavigation = $("nav");

	$topNavigation.headroom({

		/* What scroll position to hide the navbar */
		offset: $topNavigation.outerHeight(),

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
	  }

	});


		/* Add padding to the content container when the nav in scrolling to prevent page jump */
//		if( $topNavigation.hasClass('not-top') ){
//			$(".content-container").css({ "padding-top": $topNavigation.outerHeight() });
//		}else{
//			$(".content-container").css({ "padding-top": 0 });
//		}





	/* Bypass the default modal window functionality to make ajax loading possible */
	$('.launch-modal').on('click', function(e){
		
		e.preventDefault();


		/* Check if the modal div exits, if not append to the bottom of the body */
		if($('.remodal').length === 0){
			$('body').append('<div class="remodal" data-remodal-id="modal"><button data-remodal-action="close" class="remodal-close"></button><div class="remodal-content-container"></div></div>');
		} /* END $.length */


		/* Check for data types and set to variables */
		var modalTriggerLink = $(this),
				dataModalShowCapture = modalTriggerLink.data("modal-show-capture"),
				dataModalShowShare = modalTriggerLink.data("modal-show-share"),
				dataModalType = modalTriggerLink.data("modal-type"),
				dataModalID = modalTriggerLink.data("modal-id");


		/* Pass the data gathered above to $POST and process it with the php script via ajax.
		 * After the ajax has successfully processed the script, load the result in to the modal and open it.
		 */
		$.post( "/wp-content/themes/justsell/resources/scripts/modal-ajax-processing.php", { modalType:dataModalType, modalID:dataModalID, showCapture:dataModalShowCapture, showShare:dataModalShowShare }, function(data){
			
			$(".remodal-content-container").html(data);

		}).done(function(){

			var inst = $('[data-remodal-id=modal]').remodal({closeOnOutsideClick:false});
			inst.open();

		}); /* END $.post */

	}); /* END .launch-modal on click callback function */



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
	});

}); /* END document ready callback function */