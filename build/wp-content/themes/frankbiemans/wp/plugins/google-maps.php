<?php 

/*
	Plugin Name: NSC Google Maps Plugin
	Description: Setting up configurable fields for our plugin.
	Author: Frank Biemans
	Version: 1.0.0
*/

	class Nsc_Google_Maps_Plugin {

		public function __construct() {
			add_action( 'admin_menu', array( $this, 'create_plugin_settings_page' ) );
			add_action( 'admin_init', array( $this, 'setup_sections' ) );
			add_action( 'admin_init', array( $this, 'setup_fields' ) );
		}

		public function create_plugin_settings_page() {
			$page_title = __('Google Maps Settings');
			$menu_title = __('Google Maps');
			$capability = 'manage_options';
			$slug = 'nsc-google-maps';
			$callback = array( $this, 'plugin_settings_page_content' );
			$position = 100;
			
			add_submenu_page('nsc-plugin', $page_title, $menu_title, $capability, $slug, $callback);
		}


		public function plugin_settings_page_content() { ?>
		<div class="wrap">
			<h2><?php _e('Google Maps Settings'); ?></h2>
			<form method="post" action="options.php">
				<?php
				settings_fields( 'nsc_google_maps' );
				do_settings_sections( 'nsc_google_maps' );
				submit_button();
				?>
			</form>
		</div> <?php
	}


	public function setup_sections() {
		add_settings_section( 'address_section', 'Address', array( $this, 'section_callback' ), 'nsc_google_maps' );
		add_settings_section( 'gm_settings', 'Setttings', array( $this, 'section_callback' ), 'nsc_google_maps' );
	}

	public function section_callback( $arguments ) {
		switch( $arguments['id'] ){
			case 'address_section':
			echo __('Fill in the address underneath.');
			break;
			case 'gm_settings':
			echo __('Change the Google Maps settings such as the zoom level.');
			break;
		}
	}

	public function setup_fields() {
		$fields = array(
			array(
				'uid' => 'gm_streetname',
				'label' => __('Streetname and number'),
				'section' => 'address_section',
				'type' => 'text',
				'options' => false,
				'placeholder' => false,
				'helper' => false,
				'supplemental' => 'Fill in the streetname and streetnumber',
				'default' => false
				),
			array(
				'uid' => 'gm_zip',
				'label' => __('Zipcode'),
				'section' => 'address_section',
				'type' => 'text',
				'options' => false,
				'placeholder' => false,
				'helper' => false,
				'supplemental' => 'Fill in the zipcode (\'Postcode\')',
				'default' => false
				),
			array(
				'uid' => 'gm_city',
				'label' => __('City'),
				'section' => 'address_section',
				'type' => 'text',
				'options' => false,
				'placeholder' => false,
				'helper' => false,
				'supplemental' => 'Fill in the city name',
				'default' => false
				),
			array(
				'uid' => 'gm_country',
				'label' => __('Country'),
				'section' => 'address_section',
				'type' => 'select',
				'options' => return_all_countries(),
				'placeholder' => false,
				'helper' => false,
				'supplemental' => 'Choose in the country',
				'default' => false
				),

			array(
				'uid' => 'gm_maptype',
				'label' => __('Maptype'),
				'section' => 'gm_settings',
				'type' => 'select',
				'options' => ['roadmap' => __('Roadmap'), 'satellite' => __('Satellite')],
				'placeholder' => false,
				'helper' => false,
				'supplemental' => 'Select the maptype.',
				'default' => 'roadmap'
				),
			array(
				'uid' => 'gm_zoom',
				'label' => __('Zoomlevel'),
				'section' => 'gm_settings',
				'type' => 'select',
				'options' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
				'placeholder' => false,
				'helper' => false,
				'supplemental' => 'Set the zoomlevel',
				'default' => false
				),
			array(
				'uid' => 'gm_width',
				'label' => __('Frame width'),
				'section' => 'gm_settings',
				'type' => 'text',
				'options' => false,
				'placeholder' => false,
				'helper' => false,
				'supplemental' => 'The height of the Google Maps frame. Either in pixels or percentages.',
				'default' => '100%'
				),
			array(
				'uid' => 'gm_height',
				'label' => __('Frame height'),
				'section' => 'gm_settings',
				'type' => 'text',
				'options' => false,
				'placeholder' => false,
				'helper' => false,
				'supplemental' => 'The height of the Google Maps frame. In pixels please.',
				'default' => '400px'
				),
			array(
				'uid' => 'gm_api_key',
				'label' => __('API key'),
				'section' => 'gm_settings',
				'type' => 'text',
				'options' => false,
				'placeholder' => false,
				'helper' => false,
				'supplemental' => 'Here you need to fill in the Google Maps API key. Please go to the <a href="https://developers.google.com/maps/signup" target="_blank">Google Maps website to generate one</a>.',
				'default' => false
				),
			);

		foreach( $fields as $field ){
			add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'nsc_google_maps', $field['section'], $field );
			register_setting( 'nsc_google_maps', $field['uid'] );
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

new Nsc_Google_Maps_Plugin();