<?php
    add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );
    function register_plugin_styles() {

	    $theme = wp_get_theme();

        wp_dequeue_style( 'style' );
        wp_register_style( 'libraries', get_template_directory_uri() . '/stylesheets/libraries.min.css', null,  $theme->Version );
        wp_register_style( 'main-style', get_template_directory_uri() . '/style.css', array('libraries'),  $theme->Version );
        wp_enqueue_style( 'main-style');
    }

	add_action('admin_head', 'custom_admin_css');
	function custom_admin_css() {
	  echo '<link rel="stylesheet" href="'. get_template_directory_uri() . '/stylesheets/editor-style.css" type="text/css" media="all" />';
	}

	add_editor_style();

    function gutenbergtheme_editor_styles() {
        wp_enqueue_style( 'gutenbergtheme-blocks-style', get_template_directory_uri() . '/stylesheets/editor-gutenburg.css');
    }
    add_action( 'enqueue_block_editor_assets', 'gutenbergtheme_editor_styles' );