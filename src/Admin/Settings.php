<?php
/**
 * Admin settings file
 *
 * @category   Admin
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucket\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // exit if access directly.
}

/**
 * Admin settings class
 *
 * @category   Class
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */
class Settings {

	/**
	 * Instance
	 *
	 * @var \CodexShaper\ElementBucket\Admin\Settings
	 * @static
	 * @since 1.0.0
	 */
	private static $instance;

	/**
	 * Constructor
	 *
	 * Admin menu register.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_menu_pages' ), 9 );
		add_action( 'admin_menu', array( $this, 'set_menu_order' ), 10 );
	}

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 * @return \CodexShaper\ElementBucket\Admin\Settings An instance of the class.
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Add Menu Page
	 *
	 * Create menus and sub menus for dashboard.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return void
	 */
	public function add_menu_pages() {
		// Check user capability.
		if ( ! current_user_can( 'edit_posts', get_current_user_id() ) ) {
			return;
		}

		$cseb_icon = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzQiIGhlaWdodD0iMzYiIHZpZXdCb3g9IjAgMCAzNCAzNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTE0LjEwODkgMjAuMzk5Mkg3VjE1LjYwMDdIMTMuMDkyTDEzLjg4NjEgMTkuMzUwOUwxNC4xMDg5IDIwLjM5OTJaIiBmaWxsPSIjMUYxRjFGIi8+CjxwYXRoIGQ9Ik0xMS44NjU1IDkuNzk4NUg3VjVIMTAuODQ4N0wxMS42NDI4IDguNzUwMjJMMTEuODY1NSA5Ljc5ODVaIiBmaWxsPSIjMUYxRjFGIi8+CjxwYXRoIGQ9Ik0xNi4zNTQ4IDMxSDdWMjYuMjAxNUgxNS4zMzhMMTYuMTMyIDI5Ljk1MThMMTYuMzU0OCAzMVoiIGZpbGw9IiMxRjFGMUYiLz4KPHBhdGggZD0iTTI3LjAxNTIgMjIuOTQxM0MyNy4wMjMxIDIzLjA1OTMgMjcuMDI1NyAyMy4xNzk4IDI3LjAyNTcgMjMuMzAwNEMyNy4wMjU3IDIzLjgzMjQgMjYuOTcwNyAyNC4zNTEzIDI2Ljg2ODUgMjQuODUxOEMyNi44MTg3IDI1LjEwMzQgMjYuNzU1OCAyNS4zNDk3IDI2LjY3OTggMjUuNTkwOEwyNi4yNjU3IDI2LjYzOTFDMjYuMTU4MyAyNi44NjQ1IDI2LjA0MDMgMjcuMDgyIDI1LjkxMTkgMjcuMjk0M0MyNS44NDY0IDI3LjM5OTEgMjUuNzgwOSAyNy41MDQgMjUuNzEwMSAyNy42MDYyQzI1LjU3MzkgMjcuODEwNiAyNS40MjQ1IDI4LjAwOTggMjUuMjY3MiAyOC4xOTg0QzI1LjExMjYgMjguMzg5OCAyNC45NDQ5IDI4LjU3MzIgMjQuNzcxOSAyOC43NDYyQzI0LjY4NTQgMjguODMyNyAyNC41OTYzIDI4LjkxOTEgMjQuNTA0NiAyOS4wMDA0QzI0LjMyMTIgMjkuMTY1NSAyNC4xMzI1IDI5LjMyMjcgMjMuOTMzMyAyOS40NzIxQzIzLjI0MTQgMjkuOTg4NCAyMi40NjA1IDMwLjM5MiAyMS42MTY2IDMwLjY1NEMyMS40MDY5IDMwLjcxOTYgMjEuMTkyIDMwLjc3NzIgMjAuOTc0NSAzMC44MjE4QzIwLjk0MzEgMzAuODI5NiAyMC45MTE2IDMwLjgzNzUgMjAuODc3NiAzMC44NDI3QzIwLjgxMiAzMC44NTU4IDIwLjc0OTEgMzAuODY4OSAyMC42ODM2IDMwLjg3OTRMMjAuNDUwNCAyOS43NzM1TDE5LjY4NTEgMjYuMTU5NUMxOS43ODIxIDI2LjE0MzggMTkuODc5MSAyNi4xMjAyIDE5Ljk3MzQgMjYuMDk0QzIxLjE5NzMgMjUuNzUzMyAyMi4wOTA5IDI0LjYzMTcgMjIuMDkwOSAyMy4zMDA0QzIyLjA5MDkgMjIuNTAxIDIxLjc2NiAyMS43NzUxIDIxLjI0MTggMjEuMjQ4M0MyMC43MTc3IDIwLjcyNDIgMTkuOTkxOCAyMC4zOTkyIDE5LjE4OTggMjAuMzk5MkgxOC40NjY1TDE4LjI0MzggMTkuMzUxTDE3LjQ1MjMgMTUuNjAwN0gxOS4xODk4QzIwLjc5MzcgMTUuNjAwNyAyMi4wOTA5IDE0LjMwMzUgMjIuMDkwOSAxMi42OTk2QzIyLjA5MDkgMTEuOTAwMyAyMS43NjYgMTEuMTc0NCAyMS4yNDE4IDEwLjY0NzZDMjAuNzE3NyAxMC4xMjM1IDE5Ljk5MTggOS43OTg1IDE5LjE4OTggOS43OTg1SDE2LjIyMzJMMTYuMDAwNCA4Ljc1MDIyTDE1LjIwOSA1SDE5LjMyNjFDMjAuNTUgNSAyMS43MDU3IDUuMjg1NjYgMjIuNzMzIDUuNzk0MDdDMjIuOTQ1MyA1Ljg5ODkgMjMuMTUyMyA2LjAxMTU5IDIzLjM1MTUgNi4xMzczOEMyMy40NDMyIDYuMTg5OCAyMy41MzIzIDYuMjUwMDcgMjMuNjIxNCA2LjMwNzczQzIzLjczNjcgNi4zODYzNSAyMy44NTIxIDYuNDY3NTkgMjMuOTYyMSA2LjU1NDA4QzI0LjA1MTIgNi42MTY5NyAyNC4xMzUxIDYuNjg1MTEgMjQuMjE5IDYuNzU1ODdDMjQuMjE5IDYuNzU1ODcgMjQuMjI0MiA2Ljc1ODQ5IDI0LjIyNjggNi43NjExMUMyNC4zMTA3IDYuODMxODcgMjQuMzk0NSA2LjkwMjYzIDI0LjQ3NTggNi45NzYwMUMyNC40ODYzIDYuOTg2NDkgMjQuNDk5NCA2Ljk5Njk3IDI0LjUxMjUgNy4wMTAwOEMyNC42MDE2IDcuMDg4NyAyNC42ODgxIDcuMTcyNTYgMjQuNzcxOSA3LjI1NjQyQzI0Ljg1ODQgNy4zNDI5MSAyNC45NDQ5IDcuNDMyMDEgMjUuMDI2MSA3LjUyMzc0TDI1LjAzNjYgNy41MzQyMkMyNS4xMTI2IDcuNjE4MDggMjUuMTg4NiA3LjcwNzE4IDI1LjI1OTQgNy43OTM2N0MyNS4zMTE4IDcuODU2NTYgMjUuMzY0MiA3LjkxOTQ2IDI1LjQxMTQgNy45ODQ5OEMyNS40NTU5IDguMDM3MzkgMjUuNDk1MiA4LjA4OTgxIDI1LjUzNDUgOC4xNDIyMkMyNS41OTQ4IDguMjI2MDggMjUuNjU1MSA4LjMwOTk1IDI1LjcxMDEgOC4zOTY0M0MyNS43NzMgOC40ODU1MyAyNS44MzA3IDguNTc3MjYgMjUuODg4MyA4LjY3MTZDMjUuOTAxNCA4LjY5MjU3IDI1LjkxNDUgOC43MTA5MSAyNS45MjUgOC43MzE4OEMyNS45ODUzIDguODI4ODQgMjYuMDQzIDguOTI4NDMgMjYuMDk1NCA5LjAzMDY0QzI2LjA5OCA5LjAzMzI2IDI2LjEwMDYgOS4wMzU4OCAyNi4xMDA2IDkuMDM4NUMyNi4xNTU3IDkuMTM4MDkgMjYuMjA4MSA5LjI0MjkyIDI2LjI1NzkgOS4zNDUxMkMyNi4yNjU3IDkuMzU4MjMgMjYuMjcxIDkuMzcxMzMgMjYuMjc2MiA5LjM4NDQzQzI2LjMxNTUgOS40NjU2NyAyNi4zNTIyIDkuNTQ2OTIgMjYuMzg2MyA5LjYyODE2QzI2LjQwNzIgOS42NzI3MSAyNi40MjU2IDkuNzE3MjYgMjYuNDQzOSA5Ljc2MTgxQzI2LjQ5MzcgOS44NzcxMiAyNi41MzU3IDkuOTkyNDQgMjYuNTc3NiAxMC4xMDc3QzI2LjYwOSAxMC4xOTY5IDI2LjY0MDUgMTAuMjg2IDI2LjY2OTMgMTAuMzc1MUMyNi42NzQ2IDEwLjM5MzQgMjYuNjc5OCAxMC40MTE3IDI2LjY4NSAxMC40MzAxQzI2LjcyMTcgMTAuNTQ1NCAyNi43NTMyIDEwLjY2MDcgMjYuNzgyIDEwLjc3NkMyNi43ODIgMTAuNzc2IDI2Ljc4MjkgMTAuNzc3OCAyNi43ODQ2IDEwLjc4MTNDMjYuODEzNCAxMC44OTQgMjYuODM5NyAxMS4wMDY2IDI2Ljg2MzIgMTEuMTIyQzI2Ljg2ODUgMTEuMTQ4MiAyNi44NzM3IDExLjE3NyAyNi44NzkgMTEuMjAzMkMyNi44OTQ3IDExLjI3NjYgMjYuOTA3OCAxMS4zNTI2IDI2LjkxODMgMTEuNDI4NkMyNi45Mjg4IDExLjQ3NTggMjYuOTM2NiAxMS41MjI5IDI2Ljk0MTkgMTEuNTcyN0MyNi45NDQ1IDExLjU3MjcgMjYuOTQ0NSAxMS41ODA2IDI2Ljk0NDUgMTEuNTg1OEMyNi45NjAyIDExLjY4OCAyNi45NzMzIDExLjc5MjkgMjYuOTgzOCAxMS45MDAzQzI2Ljk4NjQgMTEuOTIxMyAyNi45ODkgMTEuOTQyMiAyNi45ODkgMTEuOTY1OEMyNi45OTk1IDEyLjA1NzUgMjcuMDA3NCAxMi4xNDkzIDI3LjAxIDEyLjI0MzZDMjcuMDE1MiAxMi4yNzUxIDI3LjAxNTIgMTIuMzA2NSAyNy4wMTUyIDEyLjM0MDZDMjcuMDIzMSAxMi40NTg1IDI3LjAyNTcgMTIuNTc5MSAyNy4wMjU3IDEyLjY5OTZDMjcuMDI1NyAxMy4yMzE2IDI2Ljk3MDcgMTMuNzUwNSAyNi44Njg1IDE0LjI1MTFDMjYuODE4NyAxNC41MDI3IDI2Ljc1NTggMTQuNzQ5IDI2LjY3OTggMTQuOTkwMUwyNi4yNjU3IDE2LjAzODRDMjYuMTU4MyAxNi4yNjM4IDI2LjA0MDMgMTYuNDgxMyAyNS45MTE5IDE2LjY5MzZDMjUuODQ2NCAxNi43OTg0IDI1Ljc4MDkgMTYuOTAzMiAyNS43MTAxIDE3LjAwNTRDMjUuNTczOSAxNy4yMDk4IDI1LjQyNDUgMTcuNDA5IDI1LjI2NzIgMTcuNTk3N0MyNS4xNTQ1IDE3LjczNjYgMjUuMDM2NiAxNy44NzAzIDI0LjkxMDggMTcuOTk4N0MyNC45NTAxIDE4LjA0MDYgMjQuOTg5NCAxOC4wODI1IDI1LjAyNjEgMTguMTI0NUMyNS4wMjg4IDE4LjEyNDUgMjUuMDM0IDE4LjEzMjMgMjUuMDM2NiAxOC4xMzVDMjUuMTEyNiAxOC4yMTg4IDI1LjE4ODYgMTguMzA3OSAyNS4yNTk0IDE4LjM5NDRDMjUuMzExOCAxOC40NTczIDI1LjM2NDIgMTguNTIwMiAyNS40MTE0IDE4LjU4NTdDMjUuNDU1OSAxOC42MzgxIDI1LjQ5NTIgMTguNjkwNSAyNS41MzQ1IDE4Ljc0M0MyNS41OTQ4IDE4LjgyNjggMjUuNjU1MSAxOC45MTA3IDI1LjcxMDEgMTguOTk3MkMyNS43NzMgMTkuMDg2MyAyNS44MzA3IDE5LjE3OCAyNS44ODgzIDE5LjI3MjNDMjUuOTAxNCAxOS4yOTMzIDI1LjkxNDUgMTkuMzExNiAyNS45MjUgMTkuMzMyNkMyNS45ODUzIDE5LjQyOTYgMjYuMDQzIDE5LjUyOTIgMjYuMDk1NCAxOS42MzE0QzI2LjA5OCAxOS42MzE0IDI2LjEwMDYgMTkuNjM2NiAyNi4xMDA2IDE5LjYzOTJDMjYuMTU1NyAxOS43Mzg4IDI2LjIwODEgMTkuODQzNyAyNi4yNTc5IDE5Ljk0NTlDMjYuMjY1NyAxOS45NTkgMjYuMjcxIDE5Ljk3MjEgMjYuMjc2MiAxOS45ODUyQzI2LjMxNTUgMjAuMDY2NCAyNi4zNTIyIDIwLjE0NzcgMjYuMzg2MyAyMC4yMjg5QzI2LjQwNzIgMjAuMjczNCAyNi40MjU2IDIwLjMxOCAyNi40NDM5IDIwLjM2MjZDMjYuNDkzNyAyMC40Nzc5IDI2LjUzNTcgMjAuNTkzMiAyNi41Nzc2IDIwLjcwODVDMjYuNjA5IDIwLjc5NzYgMjYuNjQwNSAyMC44ODY3IDI2LjY2OTMgMjAuOTc1OEMyNi42NzQ2IDIwLjk5NDEgMjYuNjc5OCAyMS4wMTI1IDI2LjY4NSAyMS4wMzA4QzI2LjcyMTcgMjEuMTQ2MSAyNi43NTMyIDIxLjI2MTUgMjYuNzgyIDIxLjM3NjhDMjYuNzgyIDIxLjM3NjggMjYuNzgyOSAyMS4zNzg1IDI2Ljc4NDYgMjEuMzgyQzI2LjgxMzQgMjEuNDk0NyAyNi44Mzk3IDIxLjYwNzQgMjYuODYzMiAyMS43MjI3QzI2Ljg2ODUgMjEuNzQ4OSAyNi44NzM3IDIxLjc3NzcgMjYuODc5IDIxLjgwMzlDMjYuODk0NyAyMS44NzczIDI2LjkwNzggMjEuOTUzMyAyNi45MTgzIDIyLjAyOTNDMjYuOTI4OCAyMi4wNzY1IDI2LjkzNjYgMjIuMTIzNyAyNi45NDE5IDIyLjE3MzVDMjYuOTQ0NSAyMi4xNzYxIDI2Ljk0NDUgMjIuMTgxMyAyNi45NDQ1IDIyLjE4NjZDMjYuOTYwMiAyMi4yODg4IDI2Ljk3MzMgMjIuMzkzNiAyNi45ODM4IDIyLjUwMUMyNi45ODY0IDIyLjUyMiAyNi45ODkgMjIuNTQzIDI2Ljk4OSAyMi41NjY2QzI2Ljk5OTUgMjIuNjU4MyAyNy4wMDc0IDIyLjc1IDI3LjAxIDIyLjg0NDRDMjcuMDE1MiAyMi44NzU4IDI3LjAxNTIgMjIuOTA3MyAyNy4wMTUyIDIyLjk0MTNaIiBmaWxsPSIjMUYxRjFGIi8+Cjwvc3ZnPgo=';

		add_menu_page(
			__( 'CS Element Bucket', 'cs-element-bucket' ),
			__( 'CS Element Bucket', 'cs-element-bucket' ),
			'manage_options',
			'cs-element-bucket',
			null,
			$cseb_icon,
			'10'
		);

		add_submenu_page(
			'cs-element-bucket',
			__( 'Dashboard', 'cs-element-bucket' ),
			__( 'Dashboard', 'cs-element-bucket' ),
			'manage_options',
			'eb-dashboard',
			array( $this, 'render_dashboard' )
		);
		add_submenu_page(
			'cs-element-bucket',
			__( 'Modules', 'cs-element-bucket' ),
			__( 'Modules', 'cs-element-bucket' ),
			'manage_options',
			'eb-core-modules',
			array( $this, 'render_core_modules' )
		);
	}

	/**
	 * Render Dashboard Content
	 *
	 * @since 1.0.0
	 * @access public
	 * @return void
	 */
	public function render_dashboard() {
		?>
			<div class="eb-admin-panel">
				<h2 class="eb-page-title"><?php echo esc_html( get_admin_page_title() ); ?></h2>
				<!-- CS Element Bucket Widget Counter Start -->
				<div class="eb-admin-widget-area">
					<div class="eb-row">
					<div class="eb-col-3">
							<div class="eb-card eb-widget-card">
								<h2 class="eb-card-title">Modules</h2>
								<div class="eb-card-counter">
									<div class="eb-card-total">
										<h3>Total</h3>
										<p>10</p>
									</div>
									<div class="eb-card-used">
										<h3>Used</h3>
										<p>10</p>
									</div>
								</div>
							</div>
						</div>

						<div class="eb-col-3">
							<div class="eb-card eb-widget-card">
								<h2 class="eb-card-title">Widgets</h2>
								<div class="eb-card-counter">
									<div class="eb-card-total">
										<h3>Total</h3>
										<p>10</p>
									</div>
									<div class="eb-card-used">
										<h3>Used</h3>
										<p>10</p>
									</div>
								</div>
							</div>
						</div>

						<div class="eb-col-3">
							<div class="eb-card eb-widget-card">
								<h2 class="eb-card-title">Sections</h2>
								<div class="eb-card-counter">
									<div class="eb-card-total">
										<h3>Total</h3>
										<p>10</p>
									</div>
									<div class="eb-card-used">
										<h3>Used</h3>
										<p>10</p>
									</div>
								</div>
							</div>
						</div>

						<div class="eb-col-3">
							<div class="eb-card eb-widget-card">
								<h2 class="eb-card-title">Upcoming</h2>
								<div class="eb-card-counter">
									<div class="eb-card-total">
										<h3>Total</h3>
										<p>1000+</p>
									</div>
									<div class="eb-card-used">
										<h3>Used</h3>
										<p>0</p>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				<!-- CS Element Bucket Widget Counter End -->

				<!-- Footer -->
				<div class="eb-footer-bottom">
					<p class="eb-copyright">Copyright © 2024. CodexShaper All Rights Reserved</p>
				</div>
			</div>
		<?php
	}

	/**
	 * Render CS Element Bucket Setting.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function render_core_modules() {
		$modules          = array();
		$module_directory = trailingslashit( CS_ELEMENT_BUCKET_PATH ) . 'modules/*/';
		?>
			<div class="eb-admin-panel">
				<h2 class="eb-page-title"><?php echo esc_html( get_admin_page_title() ); ?></h2>
				<!-- CS Element Bucket Widget Counter Start -->
				<div class="eb-admin-widget-area">
					<div class="eb-row">
						<?php
						foreach ( glob( $module_directory ) as $path ) {
							if ( is_dir( $path ) ) {
								$parts  = explode( '/', untrailingslashit( $path ) );
								$module = end( $parts );

								if ( ! in_array( $module, $modules, true ) ) {
									$module_name = ucwords( str_replace( '-', ' ', $module ) );
									?>
									<div class="eb-col-3">
										<div class="eb-card eb-widget-card eb-d-flex eb-justify-between eb-items-center">
											<h2 class="eb-card-title text-left"><?php echo esc_html( $module_name ); ?></h2>
											<label class="eb-module-activation-switch">
												<input type="checkbox" class="eb-module-activation-input" checked />
												<span class="active-label" data-on="On" data-off="Off"></span>
												<span class="activation-handler"></span>
											</label>
										</div>

									</div>
									<?php
								}
							}
						}
						?>
					
				</div>
				<!-- CS Element Bucket Widget Counter End -->

				<!-- Footer -->
				<div class="eb-footer-bottom">
					<p class="eb-copyright">Copyright © 2024. CodexShaper All Rights Reserved</p>
				</div>
			</div>
		<?php
	}

	/**
	 * Unset sub menu
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function set_menu_order() {
		global $submenu;
		if ( isset( $submenu['cs-element-bucket'] ) ) {
			unset( $submenu['cs-element-bucket'][0] );
		}
	}
}
