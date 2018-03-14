<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://jordanriser.com
 * @since      1.0.0
 *
 * @package    Upgraded_Product_Variations
 * @subpackage Upgraded_Product_Variations/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Upgraded_Product_Variations
 * @subpackage Upgraded_Product_Variations/public
 * @author     Jordan Riser <hello@jordanriser.com>
 */
class Upgraded_Product_Variations_Public {

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

		add_action( 'woocommerce_after_single_product', array($this, 'get_product_variation_data'));

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
		 * defined in Upgraded_Product_Variations_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Upgraded_Product_Variations_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/upgraded-product-variations-public.css', array(), $this->version, 'all' );

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
		 * defined in Upgraded_Product_Variations_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Upgraded_Product_Variations_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/upgraded-product-variations-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Listen for a single product being loaded
	 *
	 * @since    1.0.0
	 */
	
	public function get_product_variation_data() {
		$_pf = new WC_Product_Factory();  
		$_product = $_pf->get_product(get_the_ID());
		$_productAttrs = $_product->get_attributes();
		$_productVariationAttrs = $_product->get_variation_attributes();
		$_productVariations = $_product->get_available_variations();
		$_productAttrsObj = array();
		foreach ($_productAttrs as $attr) {
			$_attr = $attr->get_data();
			$_productAttrsObj[$_attr['name']] = $_attr['options'];
		}
		echo "<pre>";
		print_r($_productVariations);
		echo "</pre>";
		$attributesJSON = json_encode($_productVariationAttrs);
		echo "<script>";
		echo "var json = $attributesJSON;";
		echo "console.log(json)";
		echo "</script>";
	}


}
