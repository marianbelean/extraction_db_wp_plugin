<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/marianbelean
 * @since             1.0.0
 * @package           Extraction_db_data
 *
 * @wordpress-plugin
 * Plugin Name:       export_db
 * Plugin URI:        https://github.com/marianbelean/export_db
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Belean Marian
 * Author URI:        https://github.com/marianbelean
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       extraction_db_data
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
define( 'EXTRACTION_DB_DATA_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-extraction_db_data-activator.php
 */
function activate_extraction_db_data() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-extraction_db_data-activator.php';
	Extraction_db_data_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-extraction_db_data-deactivator.php
 */
function deactivate_extraction_db_data() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-extraction_db_data-deactivator.php';
	Extraction_db_data_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_extraction_db_data' );
register_deactivation_hook( __FILE__, 'deactivate_extraction_db_data' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-extraction_db_data.php';

/**
 * Hooking page template creator to the main plugin
 * 
 */

require_once( plugin_dir_path( __FILE__ ) . 'includes/class-page-template.php' );
add_action( 'plugins_loaded', array( 'Page_Template_Plugin', 'get_instance' ) );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_extraction_db_data() {

	$plugin = new Extraction_db_data();
	$plugin->run();

}
run_extraction_db_data();

