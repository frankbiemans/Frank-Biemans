<?php

//require_once( dirname( __FILE__ ) . '/class-widget-example.php' );
require_once( dirname( __FILE__ ) . '/text-widget-extended.php' );

add_action( 'widgets_init', 'unregister_widgets' );
function unregister_widgets() {
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Archives' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Meta' );
	unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_Text' );
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Recent_Posts' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_RSS' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
	unregister_widget( 'WP_Nav_Menu_Widget' );
	unregister_widget( 'WP_Widget_Media_Audio' );
	unregister_widget( 'WP_Widget_Media_Video' );
	unregister_widget( 'WP_Widget_Media_Gallery' );
	unregister_widget( 'WP_Widget_Media_Image' );
}

function goodbye_dolly() {
    if (file_exists(WP_PLUGIN_DIR.'/hello.php')) {
        deactivate_plugins( plugin_basename( "hello.php" ) ); 
        require_once(ABSPATH.'wp-admin/includes/plugin.php');
        require_once(ABSPATH.'wp-admin/includes/file.php');
        delete_plugins(array('hello.php'));
    }
}
add_action('admin_init','goodbye_dolly');
