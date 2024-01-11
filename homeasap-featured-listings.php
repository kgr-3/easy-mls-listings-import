<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://about.homeasap.com
 * @since             1.0.0
 * @package           Homeasap_Featured_Listings
 *
 * @wordpress-plugin
 * Plugin Name:       Easy MLS Listings Import
 * Plugin URI:        https://about.homeasap.com/easy-mls-listings-import-wordpress-plugin-by-home-asap/
 * Description:       Easy MLS Listings Import lets you easily display a real estate agent’s MLS listings. Listings update automatically after set-up for low maintenance!
 * Version:           2.0.0
 * Author:            HomeASAP LLC
 * Author URI:        https://about.homeasap.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       homeasap-featured-listings
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'HOMEASAP_FEATURED_LISTINGS_VERSION', '2.0.0' );
define( 'HOMEASAP_FEATURED_LISTINGS_BASE_NAME', plugin_basename( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-homeasap-featured-listings-activator.php
 */
function activate_homeasap_featured_listings() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-homeasap-featured-listings-activator.php';
	Homeasap_Featured_Listings_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-homeasap-featured-listings-deactivator.php
 */
function deactivate_homeasap_featured_listings() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-homeasap-featured-listings-deactivator.php';
	Homeasap_Featured_Listings_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_homeasap_featured_listings' );
register_deactivation_hook( __FILE__, 'deactivate_homeasap_featured_listings' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-homeasap-featured-listings.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_homeasap_featured_listings() {

	$plugin = new Homeasap_Featured_Listings();
	$plugin->run();

}
run_homeasap_featured_listings();
