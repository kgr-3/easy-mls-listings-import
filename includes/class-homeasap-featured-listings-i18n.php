<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://about.homeasap.com
 * @since      1.0.0
 *
 * @package    Homeasap_Featured_Listings
 * @subpackage Homeasap_Featured_Listings/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Homeasap_Featured_Listings
 * @subpackage Homeasap_Featured_Listings/includes
 * @author     HomeASAP <developers@homeasap.com>
 */
class Homeasap_Featured_Listings_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'homeasap-featured-listings',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
