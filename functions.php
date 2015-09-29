<?php

/* Removes the emoji html head scripts and other garbage included after the 4.2 update */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


/* [ Returns the string 'post-id-#' where '#' is specific to page or post ]
-------------------------------------------------------------------------------------------------------------------------------------- */
if ( !function_exists('post_or_page_specific_class') ) {
	function post_or_page_specific_class() {

		switch (TRUE):

			case is_category():
				$lp_permalink = basename( $_SERVER['REQUEST_URI'] );
				$class = $lp_permalink . "-category category-lp";
				break;

			case is_home():
				$class = 'homepage';
				break;

			case is_page():
				$lp_permalink = basename( get_permalink() );
				$class = $lp_permalink . '-lp';
				break;

			case is_single():
				$post_identification_number = get_the_ID();
				$class = "post-id-" . $post_identification_number . " single-post";
				break;

			default:
				$class = '';
				break;

		endswitch;


		return $class;
			
	}
}


?>