<?php
/**
 * Autoload file
 *
 * @category   Autoload
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucket;

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // exit if access directly.
}

/**
 * Class Autoloader
 *
 * @category   Class
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */
class Autoload {

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 * @var \ElementBucket\Autoload The single instance of the class.
	 */
	private static $instance = null;

	/**
	 * Constructor
	 *
	 * Perform some compatibility checks to make sure basic requirements are meet.
	 * If all compatibility checks pass, initialize the functionality.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		spl_autoload_register( array( $this, 'autoload' ) );
	}

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 * @return \ElementBucket\Autoload An instance of the class.
	 */
	public static function instance() {
		if ( ! static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	/**
	 * Autoload
	 *
	 * Autoload all missing classes by their namespace.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @param string $class_namespace class name with namespace.
	 *
	 * @return void
	 */
	private function autoload( $class_namespace ) {

		if ( 0 !== strpos( $class_namespace, __NAMESPACE__ ) ) {
			return;
		}

		if ( ! class_exists( $class_namespace ) ) {

			$file_namespace_path = strtolower(
				preg_replace(
					array( '/^' . __NAMESPACE__ . '\\\/', '/([a-z])([A-Z])/', '/_/', '/\\\/' ),
					array( '', '$1-$2', '-', DIRECTORY_SEPARATOR ),
					$class_namespace
				)
			);

			$base_namespace_path = strtolower(
				preg_replace(
					array( '/^' . __NAMESPACE__ . '\\\/', '/([a-z])([A-Z])/', '/_/', '/\\\/' ),
					array( '', '$1-$2', '-', DIRECTORY_SEPARATOR ),
					__NAMESPACE__
				)
			);

			$file_path = CS_ELEMENT_BUCKET_PATH . str_replace( $base_namespace_path . DIRECTORY_SEPARATOR, '', $file_namespace_path ) . '.php';

			if ( file_exists( $file_path ) && is_readable( $file_path ) ) {
				include $file_path;
			}
		}
	}
}

Autoload::instance();
