
if(window.location.pathname === "/sales-meetings/"){

	/* Sales Meetings LP Branded Section Hover Functionality. Adds/removes class on hover and swaps the word 'gray' with 'white' in the image name. */
	$('.branded-solution').hover(
	  function() {
	    $(this).addClass('active-hover-state');
	    $(this).find('.brand-logo img').attr('src', $(this).find('.brand-logo img').attr('src').replace('gray', 'white'));
	  }, function() {
	    $(this).removeClass('active-hover-state');
	    $(this).find('.brand-logo img').attr('src', $(this).find('.brand-logo img').attr('src').replace('white', 'gray'));
	  }
	);

}