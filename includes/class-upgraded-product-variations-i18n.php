<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://jordanriser.com
 * @since      1.0.0
 *
 * @package    Upgraded_Product_Variations
 * @subpackage Upgraded_Product_Variations/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Upgraded_Product_Variations
 * @subpackage Upgraded_Product_Variations/includes
 * @author     Jordan Riser <hello@jordanriser.com>
 */
class Upgraded_Product_Variations_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'upgraded-product-variations',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
