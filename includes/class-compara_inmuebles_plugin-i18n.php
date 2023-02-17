<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://github.com/BrandonVadilloDev
 * @since      1.0.0
 *
 * @package    Compara_inmuebles_plugin
 * @subpackage Compara_inmuebles_plugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Compara_inmuebles_plugin
 * @subpackage Compara_inmuebles_plugin/includes
 * @author     Brandon Vadillo <brandon.vadillo@devitm.com>
 */
class Compara_inmuebles_plugin_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'compara_inmuebles_plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
