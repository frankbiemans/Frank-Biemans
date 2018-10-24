<?php 

/*
	Plugin Name: NSC Cooke Banner Plugin
	Description: Setting up configurable fields for the cookie banner.
	Author: Frank Biemans
	Version: 1.0.0
*/

	class Nsc_Cookie_Banner_Plugin {

		public function __construct() {
			add_action( 'admin_menu', array( $this, 'create_plugin_settings_page' ) );
			add_action( 'admin_init', array( $this, 'setup_sections' ) );
			add_action( 'admin_init', array( $this, 'setup_fields' ) );
		}

		public function create_plugin_settings_page() {
			$page_title = __('Cookie Banner Settings');
			$menu_title = __('Cookie Banner');
			$capability = 'manage_options';
			$slug = 'nsc_cookie_banner';
			$callback = array( $this, 'plugin_settings_page_content' );
			$position = 105;

			add_submenu_page('nsc-plugin', $page_title, $menu_title, $capability, $slug, $callback);
		}


		public function plugin_settings_page_content() { ?>
		<div class="wrap">
			<h2><?php _e('Cookie Banner Settings'); ?></h2>
			<form method="post" action="options.php">
				<?php
				settings_fields( 'nsc_cookie_banner' );
				do_settings_sections( 'nsc_cookie_banner' );
				submit_button();
				?>
			</form>

		</div> <?php
	}


	public function setup_sections() {
		add_settings_section( 'cookie_settings', false, array( $this, 'section_callback' ), 'nsc_cookie_banner' );
	}

	public function section_callback( $arguments ) {
		switch( $arguments['id'] ){
			case 'cookie_settings':
			echo __('');
			break;
		}
	}

	public function setup_fields() {
		$fields = array(
			array(
				'uid' => 'cb_enable',
				'label' => __('Enable the cookie banner?'),
				'section' => 'cookie_settings',
				'type' => 'select',
				'options' => [1 => 'Yes', 0 => 'No'],
				'placeholder' => false,
				'helper' => false,
				'supplemental' => false,
				'default' => get_option('cb_enable')
				),
			array(
				'uid' => 'cb_text',
				'label' => __('Cookie banner text:'),
				'section' => 'cookie_settings',
				'type' => 'textarea',
				'options' => false,
				'placeholder' => false,
				'helper' => false,
				'supplemental' => false,
				'default' => false
				),
			array(
				'uid' => 'cb_privacy_label',
				'label' => __('Privacy button:'),
				'section' => 'cookie_settings',
				'type' => 'text',
				'options' => false,
				'placeholder' => false,
				'helper' => false,
				'supplemental' => 'The label for the "privacy" button',
				'default' => 'More information'
				),
			array(
				'uid' => 'cb_privacy_link',
				'label' => __('Privacy link:'),
				'section' => 'cookie_settings',
				'type' => 'text',
				'options' => false,
				'placeholder' => false,
				'helper' => false,
				'supplemental' => 'Link to the privacy page or document',
				'default' => '?page_id=3'
				),
			array(
				'uid' => 'cb_accept_label',
				'label' => __('Privacy link:'),
				'section' => 'cookie_settings',
				'type' => 'text',
				'options' => false,
				'placeholder' => false,
				'helper' => false,
				'supplemental' => 'The label for the button to accepting the cookies',
				'default' => 'I understand & accept'
				)
			);

		foreach( $fields as $field ){
			add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'nsc_cookie_banner', $field['section'], $field );
			register_setting( 'nsc_cookie_banner', $field['uid'] );
		}

	}

	public function field_callback( $arguments ) {
		$value = get_option( $arguments['uid'] );
		if( ! $value ) {
			$value = $arguments['default'];
		}

		switch( $arguments['type'] ){
			case 'text':
			printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );
			break;
			case 'textarea': // If it is a textarea
			printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>', $arguments['uid'], $arguments['placeholder'], $value );
			break;
			case 'select': // If it is a select dropdown
			if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
				$options_markup = '';
				foreach( $arguments['options'] as $key => $label ){
					$options_markup .= sprintf( '<option value="%s" %s>%s</option>', $key, selected( $value, $key, false ), $label );
				}
				printf( '<select name="%1$s" id="%1$s">%2$s</select>', $arguments['uid'], $options_markup );
			}
			break;
		}

		if( $helper = $arguments['helper'] ){
			printf( '<span class="helper"> %s</span>', $helper );
		}

		if( $supplimental = $arguments['supplemental'] ){
			printf( '<p class="description">%s</p>', $supplimental );
		}
	}


}

new Nsc_Cookie_Banner_Plugin();