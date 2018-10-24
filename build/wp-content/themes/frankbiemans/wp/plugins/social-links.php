<?php 

/*
	Plugin Name: NSC Google Maps Plugin
	Description: Setting up configurable fields for our plugin.
	Author: Frank Biemans
	Version: 1.0.0
*/

	class Nsc_Social_Media {

		public function __construct() {
			add_action( 'admin_menu', array( $this, 'create_plugin_settings_page' ) );
			add_action( 'admin_init', array( $this, 'setup_sections' ) );
			add_action( 'admin_init', array( $this, 'setup_fields' ) );
		}

		public function create_plugin_settings_page() {
			$page_title = __('Social Media Settings');
			$menu_title = __('Social Media');
			$capability = 'manage_options';
			$slug = 'nsc-social-media';
			$callback = array( $this, 'plugin_settings_page_content' );
			$position = 100;
			add_submenu_page('nsc-plugin', $page_title, $menu_title, $capability, $slug, $callback);
		}

		public function plugin_settings_page_content() { ?>
		<div class="wrap">
			<h2><?php _e('Google Maps Settings'); ?></h2>

			<form method="post" action="options.php">
				<?php
				settings_fields( 'nsc_social_media' );
				do_settings_sections( 'nsc_social_media' );
				submit_button();
				?>
			</form>

		</div> <?php
	}


	public function setup_sections() {
		add_settings_section( 'social_links', 'Social Media Links', array( $this, 'section_callback' ), 'nsc_social_media' );
	}

	public function section_callback( $arguments ) {
		switch( $arguments['id'] ){
			case 'social_links':
			echo __('Fill in the social media URLs underneat. You can place the social media icons overview anywhere by using the shortcode <span style="font-family: courier; font-size: 12px; background-color: pink; color: #222;">[social-icons]</span>.');
			break;
		}
	}

	public function setup_fields() {
		$fields = array(
			array(
				'uid' => 'url_facebook',
				'label' => __('Facebook:'),
				'section' => 'social_links',
				'type' => 'text',
				'options' => false,
				'placeholder' => false,
				'helper' => false,
				'supplemental' => '',
				'default' => false
				),
			array(
				'uid' => 'url_linkedin',
				'label' => __('LinkedIn:'),
				'section' => 'social_links',
				'type' => 'text',
				'options' => false,
				'placeholder' => false,
				'helper' => false,
				'supplemental' => '',
				'default' => false
				),
			array(
				'uid' => 'url_instagram',
				'label' => __('Instagram:'),
				'section' => 'social_links',
				'type' => 'text',
				'options' => false,
				'placeholder' => false,
				'helper' => false,
				'supplemental' => '',
				'default' => false
				),
			array(
				'uid' => 'url_twitter',
				'label' => __('Twitter:'),
				'section' => 'social_links',
				'type' => 'text',
				'options' => false,
				'placeholder' => false,
				'helper' => false,
				'supplemental' => '',
				'default' => false
				),
			);

		foreach( $fields as $field ){
			add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'nsc_social_media', $field['section'], $field );
			register_setting( 'nsc_social_media', $field['uid'] );
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

new Nsc_Social_Media();