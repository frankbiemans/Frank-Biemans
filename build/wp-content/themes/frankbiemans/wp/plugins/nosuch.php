<?php 

/*
	Plugin Name: NOSUCH Plugin
	Description: Extra settings for WP
	Author: Frank Biemans
	Version: 1.0.0
*/

	class Nsc_Plugins_Page {

		public function __construct() {
			add_action( 'admin_menu', array( $this, 'create_plugin_settings_page' ) );
		}

		public function create_plugin_settings_page() {
			$page_title = __('NOSUCH');
			$menu_title = __('NOSUCH');
			$capability = 'manage_options';
			$slug = 'nsc-plugin';
			$callback = array( $this, 'nsc_plugin_homescreen' );
			$icon = false;
			$position = 105;

			add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
		}

		public function nsc_plugin_homescreen() { ?>
			<div class="wrap">
				<h2><?php _e('NOSUCH'); ?></h2>
				<p>Use the these options in the menu on the left to edit different miscellaneous settings en content on this website.</p>
				</div> <?php
			}
		}

		new Nsc_Plugins_Page();