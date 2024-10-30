<?php
/**
 * Base Module file
 *
 * @category   Base
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucket\Base;

use Elementor\Core\Base\Module as BaseModule;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Base module class
 *
 * @category   Class
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */
abstract class Module extends BaseModule {

	/**
	 * Constructor
	 *
	 * Perform some compatibility checks to make sure basic requirements are meet.
	 * If all compatibility checks pass, initialize the functionality.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();

		add_action( 'elementor/frontend/after_register_styles', array( $this, 'register_styles' ) );
	}

	/**
	 * Get asset base url
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string
	 */
	public function get_assets_base_url(): string {
		return CS_ELEMENT_BUCKET_URL;
	}

	/**
	 * Regsiter styles for current module.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return mixed
	 */
	public function register_styles() {}
}
