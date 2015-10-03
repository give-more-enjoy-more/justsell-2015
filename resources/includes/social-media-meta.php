<meta property="fb:admins" content="1842267468" />
<meta property="og:description" content="<?php echo esc_html(get_the_excerpt()); ?>" />

<?php if ( get_post_meta( get_the_ID(), 'post_open_graph_image', true ) ) : ?>
	<meta property="og:image" content="<?php echo bloginfo('template_directory') . get_post_meta( get_the_ID(), 'post_open_graph_image', true ); ?>" />
<?php else: ?>
	<meta property="og:image" content="<?php echo bloginfo('template_directory') . '/resources/images/social-media/general/default-justsell-open-graph-1200x630.png'?>" />
<?php endif; ?>

<meta property="og:site_name" content="JustSell.com" />
<meta property="og:title" content="<?php the_title(); ?>" /> 
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo get_permalink(); ?>" />