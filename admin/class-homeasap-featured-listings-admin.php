<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://about.homeasap.com
 * @since      1.0.0
 *
 * @package    Homeasap_Featured_Listings
 * @subpackage Homeasap_Featured_Listings/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Homeasap_Featured_Listings
 * @subpackage Homeasap_Featured_Listings/admin
 * @author     HomeASAP <developers@homeasap.com>
 */
class Homeasap_Featured_Listings_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
	
	/**
	 * Register the Settings page.
	 *
	 * @since    1.0.0
	 */
	public function admin_menu() {
		add_options_page( __('Easy MLS Listings Import', $this->plugin_name), __('Easy MLS Listings Import', $this->plugin_name), 'manage_options', $this->plugin_name, array($this, 'display_plugin_admin_page'));
	 }
	 
	 /**
		* Callback function for the admin settings page.
		*
		* @since    1.0.0
		*/
	public function display_plugin_admin_page() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/homeasap-featured-listings-admin-display.php';
	}

	 /**
		* Callback function for the adding links to plugin page.
		*
		* @since    1.0.0
		*/
	public function add_settings_link($links) {
		$settings_url = esc_url( add_query_arg('page', $this->plugin_name, get_admin_url() . 'admin.php'));
		return array_merge( array(
			'<a href="' . $settings_url . '">' . __('Settings', $this->plugin_name) . '</a>'
		), $links );
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Homeasap_Featured_Listings_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Homeasap_Featured_Listings_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/homeasap-featured-listings-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Homeasap_Featured_Listings_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Homeasap_Featured_Listings_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/homeasap-featured-listings-admin.js', array( 'jquery', 'jquery-ui-autocomplete' ), $this->version, false );

	}

}
