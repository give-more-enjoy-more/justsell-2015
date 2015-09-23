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

}


/*
 * @name: Is Capture Cookie Set
 * @function: This function checks if the 'emailSuccessfullyCaptured' cookie is set.
 */
function is_capture_cookie_set(){

	if ( isset($_COOKIE["emailSuccessfullyCaptured"]) )
		return TRUE;
	else
		return FALSE;

}

?>