<?php


/* Removes the emoji html head scripts and other garbage included after the 4.2 update */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


?>