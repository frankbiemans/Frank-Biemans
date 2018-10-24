<?php

// Zie ook: http://tgmpluginactivation.com
require_once(dirname(__FILE__) . '/library/tgm-plugin-activation/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'register_required_plugins' );
function register_required_plugins() {
    $theme = wp_get_theme();

    $plugins = array(
        array(
			'name' => 'Google XML Sitemaps',
			'slug' => 'google-sitemap-generator',
			'required' => true
		), 
        array(
			'name' => 'Enable Media Replace',
			'slug' => 'enable-media-replace',
			'required' => true
		), 
        array(
			'name' => 'Category Checklist Tree',
			'slug' => 'category-checklist-tree',
			'required' => true
		),
        array(
			'name' => 'SuperCPT',
			'slug' => 'super-cpt',
			'required' => true
		),
        array(
			'name' => 'Duplicate Post',
			'slug' => 'duplicate-post',
			'required' => true
		),
        array(
			'name' => 'Crop Thumbnails',
			'slug' => 'crop-thumbnails',
			'required' => true
		),
        array(
            'name' => 'WP Updates Notifier',
            'slug' => 'wp-updates-notifier',
            'required' => true
        ),
        array(
            'name' => 'Activity Log',
            'slug' => 'aryo-activity-log',
            'required' => true
        ),
        array(
            'name' => 'All In One WP Security & Firewall',
            'slug' => 'all-in-one-wp-security-and-firewall',
            'required' => true
        ),
        array(
            'name' => 'Instant Images',
            'slug' => 'instant-images',
            'required' => true
        )
    );

    $config = array();

    tgmpa( $plugins, $config );
}