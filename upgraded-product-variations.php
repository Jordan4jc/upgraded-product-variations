<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://jordanriser.com
 * @since             1.0.0
 * @package           Upgraded_Product_Variations
 *
 * @wordpress-plugin
 * Plugin Name:       Upgraded Product Variations
 * Plugin URI:        http://jordanriser.com/plugins/upgraded-product-variations
 * Description:       A small plugin that aims to add some extra functionality to product variation selection on the front end.
 * Version:           1.0.0
 * Author:            Jordan Riser
 * Author URI:        http://jordanriser.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       upgraded-product-variations
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-upgraded-product-variations-activator.php
 */
function activate_upgraded_product_variations() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-upgraded-product-variations-activator.php';
	Upgraded_Product_Variations_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-upgraded-product-variations-deactivator.php
 */
function deactivate_upgraded_product_variations() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-upgraded-product-variations-deactivator.php';
	Upgraded_Product_Variations_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_upgraded_product_variations' );
register_deactivation_hook( __FILE__, 'deactivate_upgraded_product_variations' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-upgraded-product-variations.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_upgraded_product_variations() {

	$plugin = new Upgraded_Product_Variations();
	$plugin->run();

}
run_upgraded_product_variations();
