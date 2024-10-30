<?php
/**
 * Helper functions file
 *
 * @category   Helper
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */

use CodexShaper\ElementBucket\Plugin;

if ( ! function_exists( 'cseb_get_plugin' ) ) {

	/**
	 * Get core plugin instance
	 *
	 * @return Plugin instance.
	 */
	function cseb_get_plugin() {
		return Plugin::instance();
	}
}

if ( ! function_exists( 'cseb_get_asset' ) ) {

	/**
	 * Get core plugin instance
	 *
	 * @param string $path The asset path.
	 *
	 * @return string The asset url.
	 */
	function cseb_get_asset( $path ) {
		return Plugin::asset_url( $path );
	}
}

if ( ! function_exists( 'cseb_get_svg_rules' ) ) {

	/**
	 * Get svg rules
	 *
	 * @return array The svg rules.
	 */
	function cseb_get_svg_rules() {

		return array_merge(
			// Default option.
			wp_kses_allowed_html( 'post' ),
			// SVG options.
			array(
				'svg'   => array(
					'class'           => true,
					'aria-hidden'     => true,
					'aria-labelledby' => true,
					'role'            => true,
					'xmlns'           => true,
					'width'           => true,
					'height'          => true,
					'viewbox'         => true,
				),
				'g'     => array( 'fill' => true ),
				'title' => array( 'title' => true ),
				'path'  => array(
					'd'    => true,
					'fill' => true,
				),
			),
		);
	}
}
