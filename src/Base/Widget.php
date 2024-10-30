<?php
/**
 * Base Widget file
 *
 * @category   Base
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucket\Base;

use Elementor\Widget_Base;
use CodexShaper\ElementBucket\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // exit if access directly.
}

/**
 * Base widget class for element bucket
 *
 * @category   Class
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */
abstract class Widget extends Widget_Base {

	/**
	 * Get categories
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array
	 */
	public function get_categories() {
		return Plugin::get_categories();
	}

	/**
	 * Widget activation
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return bool
	 */
	public function is_active() {
		return true;
	}
}
