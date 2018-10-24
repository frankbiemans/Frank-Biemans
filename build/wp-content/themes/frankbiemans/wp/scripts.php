<?php

add_action( 'wp_enqueue_scripts', 'enqueue_and_register_my_scripts' );

function enqueue_and_register_my_scripts(){

    $theme = wp_get_theme();

	wp_deregister_script('wp-embed');
    wp_register_script( 'libraries', get_template_directory_uri() . '/scripts/libraries.min.js', NULL,  $theme->Version, TRUE );
    wp_register_script( 'functions', get_template_directory_uri() . '/scripts/functions.min.js', array('libraries'),  $theme->Version, TRUE );
    wp_register_script( 'load', get_template_directory_uri() . '/scripts/load.min.js', array('functions'),  $theme->Version, TRUE );
    wp_enqueue_script( 'load');
}

function my_plugin_blacklist_blocks() {
    wp_enqueue_script(
        'my-plugin-blacklist-blocks',
        get_template_directory_uri() . '/scripts/backend.js',
        array( 'wp-blocks' )
    );
}
add_action( 'enqueue_block_editor_assets', 'my_plugin_blacklist_blocks' );