<?php
/**
 * Module for Section Title functionality.
 *
 * This file defines the Section Title module, which is part of the ElementBucket plugin.
 * It registers styles and provides metadata about the module.
 *
 * @package ElementBucket\Modules\SectionTitle
 */

namespace CodexShaper\ElementBucket\Modules\SectionTitle;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use CodexShaper\ElementBucket\Base\Module as BaseModule;

/**
 * Class Module
 *
 * Handles the Section Title module functionality, including registering styles and defining widget information.
 *
 * @package ElementBucket\Modules\SectionTitle
 * @since 1.7.0
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
		return 'eb-module-section-title';
	}

	/**
	 * Get the module's associated widgets.
	 *
	 * @return string[]
	 */
	public function get_widgets() {
		return array(
			'Section_Title',
		);
	}

	/**
	 * Register styles.
	 *
	 * `/assets/css/eb-eb-widget-section-title.min.css`.
	 *
	 * @return void
	 */
	public function register_styles() {
		wp_register_style(
			'eb-widget-section-title',
			$this->get_css_assets_url( 'eb-widget-section-title', null, true, true ),
			array(),
			CS_ELEMENT_BUCKET_VERSION
		);
	}
}
