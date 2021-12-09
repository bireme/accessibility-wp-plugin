<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://reddes.bvsalud.org
 * @since      1.0.0
 *
 * @package    Accessibility_WP_Plugin
 * @subpackage Accessibility_WP_Plugin/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Accessibility_WP_Plugin
 * @subpackage Accessibility_WP_Plugin/public
 * @author     BIREME/OPAS/OMS <mourawil@paho.org>
 */
class Accessibility_WP_Plugin_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/accessibility-wp-plugin-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

	    $config = get_option('accessibility_wp_plugin_config');

		wp_enqueue_script( 'cookie', plugin_dir_url( __FILE__ ) . 'js/cookie.js', array( 'jquery' ), $this->version, false );

		if ( 'true' == $config['accessibility_bar'] ) {
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/accessibility-wp-plugin-public.js', array( 'jquery' ), $this->version, false );
		}

		wp_localize_script($this->plugin_name, 'accessibility_script_vars', array(
            'main_content' => $config['accessibility_main_content'],
            'site_menu'    => $config['accessibility_menu'],
            'search_form'  => $config['accessibility_search'],
            'site_footer'  => $config['accessibility_footer'],
            'font_size'    => $config['accessibility_font_size'],
        ));

	}

	/**
	 * Render the accessibility bar
	 *
	 * @since    1.0.0
	 */
	public function acessibility_bar_render() {
	    include_once 'partials/accessibility-wp-plugin-public-display.php';
	}

	/**
	 * Render the footer bar
	 *
	 * @since    1.0.0
	 */
	public function footer_bar_render() {
	    include_once 'partials/footer-bar-public-display.php';
	}

}
