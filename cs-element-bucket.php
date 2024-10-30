<?php
/**
 * Plugin Name:       Advanced Element Bucket Addons for Elementor
 * Plugin URI:        https://github.com/codexshaper/element-bucket/
 * Description:       A premium elements bucket for elementor.
 * Version:           1.0.2
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            CodexShaper
 * Author URI:        https://codexshaper.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       cs-element-bucket
 * Domain Path:       /languages
 *
 * @package ElementBucket
 *
 * Elementor tested up to: 3.24.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'CS_ELEMENT_BUCKET_VERSION', '1.0.2' );
define( 'CS_ELEMENT_BUCKET_CLI', true );

define( 'CS_ELEMENT_BUCKET__FILE__', __FILE__ );
define( 'CS_ELEMENT_BUCKET_PLUGIN_BASE', plugin_basename( CS_ELEMENT_BUCKET__FILE__ ) );
define( 'CS_ELEMENT_BUCKET_PATH', plugin_dir_path( CS_ELEMENT_BUCKET__FILE__ ) );
define( 'CS_ELEMENT_BUCKET_ASSETS_PATH', CS_ELEMENT_BUCKET_PATH . 'assets/' );
define( 'CS_ELEMENT_BUCKET_MODULES_PATH', CS_ELEMENT_BUCKET_PATH . 'modules/' );
define( 'CS_ELEMENT_BUCKET_URL', plugins_url( '/', CS_ELEMENT_BUCKET__FILE__ ) );
define( 'CS_ELEMENT_BUCKET_ASSETS_URL', CS_ELEMENT_BUCKET_URL . 'assets/' );
define( 'CS_ELEMENT_BUCKET_MODULES_URL', CS_ELEMENT_BUCKET_URL . 'modules/' );

define( 'CS_ELEMENT_BUCKET_MODULE_PREFIX', 'eb-module' );
define( 'CS_ELEMENT_BUCKET_WIDGET_PREFIX', 'eb-widget' );

/**
 * Load gettext translate for our text domain.
 *
 * @since 1.0.0
 *
 * @return void
 */
function cseb_load_plugin() {

	require_once trailingslashit( CS_ELEMENT_BUCKET_PATH ) . 'vendor/autoload.php';
	require_once trailingslashit( CS_ELEMENT_BUCKET_PATH ) . 'inc/helpers.php';

	if ( class_exists( 'CodexShaper\ElementBucket\Plugin' ) ) {
		CodexShaper\ElementBucket\Plugin::instance();
	}
}

add_action( 'plugins_loaded', 'cseb_load_plugin' );
