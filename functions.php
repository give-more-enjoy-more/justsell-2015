<?php

/* Removes the emoji html head scripts and other garbage included after the 4.2 update */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


/* [ Returns the string 'post-id-#' where '#' is specific to page or post ]
-------------------------------------------------------------------------------------------------------------------------------------- */
if ( !function_exists('post_or_page_specific_class') ) {
	function post_or_page_specific_class() {

		if ( is_single() ) {
			
			$post_identification_number = get_the_ID();
			$class = "post-id-" . $post_identification_number;

		} elseif ( is_home() ) {
			
			$class = 'post-id-homepage';

		} else {

			$class = '';

		}
		
		return $class;
			
	}
}


?>