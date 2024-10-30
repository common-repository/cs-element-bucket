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

namespace CodexShaper\ElementBucket\Modules\NewsCard;

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
		return 'eb-module-news-card';
	}

	/**
	 * Get the module's associated widgets.
	 *
	 * @return string[]
	 */
	public function get_widgets() {
		return array(
			'News_Card',
		);
	}

	/**
	 * Register styles.
	 *
	 * `/assets/css/eb-eb-widget-news-card.min.css`.
	 *
	 * @return void
	 */
	public function register_styles() {
		wp_register_style(
			'eb-widget-news-card',
			$this->get_css_assets_url( 'eb-widget-news-card', null, true, true ),
			array(),
			CS_ELEMENT_BUCKET_VERSION
		);
	}
}
