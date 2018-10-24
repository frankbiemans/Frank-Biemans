<?php

// remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'rest_api_init', 'wp_oembed_register_route' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
remove_action( 'wp_head', 'wp_resource_hints', 2 );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

 add_action( 'do_feed', 'disable_feed', 1 );
 add_action( 'do_feed_rdf', 'disable_feed', 1 );
 add_action( 'do_feed_rss', 'disable_feed', 1 );
// add_action( 'do_feed_rss2', 'disable_feed', 1 );
 add_action( 'do_feed_atom', 'disable_feed', 1 );
function disable_feed() {
    die();
}

add_filter( 'embed_oembed_discover', '__return_false' );
//add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
add_filter( 'embed_oembed_html', 'custom_oembed_filter', 10, 4 ) ;
function custom_oembed_filter($html, $url, $attr, $post_ID) {
    $return = '<div class="video-container">'.$html.'</div>';
    return $return;
}

add_action('widgets_init', 'remove_recent_comments_style');
function remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

add_action( 'admin_menu', 'my_admin_menu' );
function my_admin_menu() {
    remove_menu_page( 'link-manager.php' );
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'tools.php' );
    //remove_menu_page( 'edit.php' );
}

add_filter('widget_text', 'do_shortcode');
function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

add_filter('tiny_mce_before_init', 'tiny_mce_remove_unused_formats' );
function tiny_mce_remove_unused_formats($init) {
    $init['block_formats'] = 'Paragraph=p;Heading 3=h3;Heading 4=h4;Heading 5=h5;';
    return $init;
}