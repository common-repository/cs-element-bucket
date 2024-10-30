<?php
/**
 * Module module file
 *
 * @category   Module
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucket\Modules\Button;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use CodexShaper\ElementBucket\Base\Module as BaseModule;

/**
 * Module module class
 *
 * @category   Class
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */
class Module extends BaseModule {

	/**
	 * Get module name.
	 *
	 * Retrieve the module name.
	 *
	 * @since 1.7.0
	 * @access public
	 *
	 * @return string Module name.
	 */
	public function get_name() {
		return 'eb-module-button';
	}

	/**
	 * Get the module's associated widgets.
	 *
	 * @return string[]
	 */
	public function get_widgets() {
		return array(
			'Button',
		);
	}

	/**
	 * Register styles.
	 *
	 * `/assets/css/eb-eb-widget-button.min.css`.
	 *
	 * @return void
	 */
	public function register_styles() {
		wp_register_style(
			'eb-widget-button',
			$this->get_css_assets_url( 'eb-widget-button', null, true, true ),
			array(),
			CS_ELEMENT_BUCKET_VERSION
		);
	}
}
