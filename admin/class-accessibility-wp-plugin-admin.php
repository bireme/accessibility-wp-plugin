<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://reddes.bvsalud.org
 * @since      1.0.0
 *
 * @package    Accessibility_WP_Plugin
 * @subpackage Accessibility_WP_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Accessibility_WP_Plugin
 * @subpackage Accessibility_WP_Plugin/admin
 * @author     BIREME/OPAS/OMS <mourawil@paho.org>
 */
class Accessibility_WP_Plugin_Admin {

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
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Accessibility_WP_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Accessibility_WP_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/accessibility-wp-plugin-admin.css', array(), $this->version, 'all' );

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
		 * defined in Accessibility_WP_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Accessibility_WP_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/accessibility-wp-plugin-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function admin_menu() {
        add_options_page(__('Accessibility WP Plugin settings', 'accessibility-wp-plugin'), __('Accessibility WP Plugin', 'accessibility-wp-plugin'),
            'manage_options', 'accessibility-wp-plugin-settings', array(&$this, 'accessibility_wp_plugin_page_admin'));
        //call register settings function
        add_action('admin_init', array(&$this, 'register_settings'));
    }

    public function register_settings(){
        register_setting('accessibility-wp-plugin-settings-group', 'accessibility_wp_plugin_config');
    }

    public function accessibility_wp_plugin_settings_link( $links ) {
		// Build and escape the URL.
		$url = esc_url( add_query_arg(
			'page',
			'accessibility-wp-plugin-settings',
			get_admin_url() . 'admin.php'
		) );

		// Create the link.
		$settings_link = "<a href='$url'>" . __( 'Settings' ) . '</a>';

		// Adds the link to the end of the array.
		array_push(
			$links,
			$settings_link
		);

		return $links;
	}

	/**
	 * Render the options page for plugin
	 *
	 * @since    1.0.0
	 */
	public function accessibility_wp_plugin_page_admin() {

		include_once 'partials/accessibility-wp-plugin-admin-display.php';

	}

}
