<?php
/**
 * Plugin file
 *
 * @category   Core
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucket;

use CodexShaper\ElementBucket\Managers\ModuleManager;
use CodexShaper\ElementBucket\Admin\Settings;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Core Plugin Class for handling core features
 *
 * @category   Class
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */
final class Plugin {

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 * @var string Minimum Elementor version required to run the bucket.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '3.21.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 * @var string Minimum PHP version required to run the bucket.
	 */
	const MINIMUM_PHP_VERSION = '7.4';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 *
	 * @var \ElementBucket\Plugin The single instance of the class.
	 */
	private static $instance = null;

	/**
	 * Module Manager
	 *
	 * @since 1.0.0
	 * @access private
	 * @var \CodexShaper\ElementBucket\Manager\ModuleManager module manager.
	 */
	private $module_manager;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @return \ElementBucket\Plugin An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

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

		add_action( 'init', array( $this, 'load_text_domain' ) );

		if ( $this->is_compatible() ) {
			add_action( 'elementor/init', array( $this, 'init' ) );

			// Styles.
			add_action( 'elementor/frontend/before_enqueue_styles', array( $this, 'register_frontend_styles' ) );
			add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'enqueue_styles' ) );

			// Scripts.
			add_action( 'elementor/frontend/before_register_scripts', array( $this, 'register_frontend_scripts' ) );
			add_action( 'elementor/frontend/after_enqueue_scripts', array( $this, 'enqueue_frontend_scripts' ) );

		}
		// Admin enqueue.
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) );
	}

	/**
	 * Load Textdomain
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function load_text_domain() {
		load_plugin_textdomain( 'cs-element-bucket', false, CS_ELEMENT_BUCKET_PATH . '/languages/' );
	}

	/**
	 * Initialize
	 *
	 * Load the buckets functionality only after Elementor is initialized.
	 *
	 * Fired by `elementor/init` action hook.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function init() {
		// Auto load element bucket classes.
		require_once trailingslashit( CS_ELEMENT_BUCKET_PATH ) . 'autoload.php';
		Settings::instance();
		// Register Widget Categories.
		add_action( 'elementor/elements/categories_registered', array( $this, 'add_widget_categories' ) );

		$this->module_manager = new ModuleManager();
	}

	/**
	 * Register frontend styles
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function register_frontend_styles() {
		wp_register_style(
			'eb-swiper',
			trailingslashit( CS_ELEMENT_BUCKET_URL ) . 'assets/vendor/swiper/bundle.min.css',
			array(),
			'11.1.4',
			'all'
		);
	}

	/**
	 * Enqueue styles
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function enqueue_styles() {
		wp_enqueue_style(
			'eb-frontend',
			trailingslashit( CS_ELEMENT_BUCKET_URL ) . 'assets/css/eb-frontend.css',
			array(),
			CS_ELEMENT_BUCKET_VERSION,
			'all'
		);
	}

	/**
	 * Register frontend scripts
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function register_frontend_scripts() {
		wp_register_script(
			'eb-swiper',
			trailingslashit( CS_ELEMENT_BUCKET_URL ) . 'assets/vendor/swiper/bundle.min.js',
			array( 'jquery' ),
			'11.1.4',
			true
		);

		wp_register_script(
			'eb-accordion',
			trailingslashit( CS_ELEMENT_BUCKET_URL ) . 'assets/js/eb-accordion.js',
			array(),
			CS_ELEMENT_BUCKET_VERSION,
			true
		);
	}

	/**
	 * Enqueue frontend scripts
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function enqueue_frontend_scripts() {
		wp_register_script(
			'eb-frontend',
			trailingslashit( CS_ELEMENT_BUCKET_URL ) . 'assets/js/eb-frontend.js',
			array( 'jquery', 'elementor-frontend' ),
			CS_ELEMENT_BUCKET_VERSION,
			true
		);

		wp_enqueue_script( 'eb-frontend' );
	}

	/**
	 * Enqueue admin scripts
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function admin_enqueue() {
		wp_register_style(
			'eb-admin-css',
			trailingslashit( CS_ELEMENT_BUCKET_URL ) . 'assets/css/eb-admin.css',
			array(),
			CS_ELEMENT_BUCKET_VERSION,
			'all',
		);

		wp_register_style(
			'eb-google-fonts',
			add_query_arg( 'family', rawurlencode( 'Rethink+Sans:ital,wght@0,400..800;1,400..800&display=swap' ), '//fonts.googleapis.com/css' ),
			array(),
			CS_ELEMENT_BUCKET_VERSION,
			'all',
		);

		wp_enqueue_style( 'eb-admin-css' );
		wp_enqueue_style( 'eb-google-fonts' );
	}

	/**
	 * Register elementor categories
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param \Elementor\Elements_Manager $elements_manager elements manager object.
	 *
	 * @return void
	 */
	public function add_widget_categories( $elements_manager ) {
		$elements_manager->add_category(
			'cs-element-bucket',
			array(
				'title' => esc_html__( 'Element Bucket', 'cs-element-bucket' ),
				'icon'  => 'fa fa-plug',
			)
		);
	}

	/**
	 * Check compatibility
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return bool
	 */
	public function is_compatible() {

		// Check if Elementor installed and activated.
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_elementor_activation' ) );
			return false;
		}

		// Check for required Elementor version.
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return false;
		}

		// Check for required PHP version.
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return false;
		}

		return true;
	}

	/**
	 * Check element active or not. If not active display activation button.
	 * If not installed then diaplay installation button.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function admin_notice_missing_elementor_activation() {

		$btn['text'] = esc_html__( 'Install Elementor', 'cs-element-bucket' );
		$btn['url']  = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );

		if ( file_exists( WP_PLUGIN_DIR . '/elementor/elementor.php' ) ) {
			$btn['text'] = esc_html__( 'Activate Elementor', 'cs-element-bucket' );
			$btn['url']  = wp_nonce_url( 'plugins.php?action=activate&plugin=elementor/elementor.php&plugin_status=all&paged=1', 'activate-plugin_elementor/elementor.php' );
		}

		printf(
			'<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>',
			sprintf(
				/* translators: 1: Plugin name 2: Elementor */
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated. Click here to %3$s', 'cs-element-bucket' ),
				'<strong>' . esc_html__( 'CS Element Bucket', 'cs-element-bucket' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'cs-element-bucket' ) . '</strong>',
				'<a href="' . esc_url( $btn['url'] ) . '" class="button button-primary">' . esc_html( $btn['text'] ) . '</a>'
			)
		);
	}

	/**
	 * Check minimum elementor version
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function admin_notice_minimum_elementor_version() {

		printf(
			'<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>',
			sprintf(
				/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'cs-element-bucket' ),
				'<strong>' . esc_html__( 'CS Element Bucket', 'cs-element-bucket' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'cs-element-bucket' ) . '</strong>',
				esc_html( self::MINIMUM_ELEMENTOR_VERSION )
			)
		);
	}

	/**
	 * Check PHP Version
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function admin_notice_minimum_php_version() {

		printf(
			'<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>',
			sprintf(
				/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'cs-element-bucket' ),
				'<strong>' . esc_html__( 'CS Element Bucket', 'cs-element-bucket' ) . '</strong>',
				'<strong>' . esc_html__( 'PHP', 'cs-element-bucket' ) . '</strong>',
				esc_html( self::MINIMUM_PHP_VERSION )
			)
		);
	}

	/**
	 * Get categories
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @return string
	 */
	public static function get_categories() {
		return array( 'cs-element-bucket' );
	}

	/**
	 * Get asset url
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @param string $path an asset path.
	 *
	 * @return string
	 */
	public static function asset_url( $path = '' ) {
		return trailingslashit( CS_ELEMENT_BUCKET_URL ) . 'assets/' . $path;
	}
}
