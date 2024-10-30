<?php
/**
 * Roll Slider Widget file
 *
 * @category   Widget
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucket\Modules\RollSlider\Widgets;

use CodexShaper\ElementBucket\Base\Widget;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // exit if access directly.
}

/**
 * Roll Slider widget class
 *
 * @category   Class
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */
class Roll_Slider extends Widget {

	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eb-widget-roll-slider';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'EB Roll Slider', 'cs-element-bucket' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-slides';
	}

	/**
	 * Get widget keywords.
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return array( 'Roll Slider', 'CodexShaper', 'CS Element Bucket' );
	}

	/**
	 * Get widget categories.
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'cs-element-bucket' );
	}

	/**
	 * Get style dependencies.
	 *
	 * Retrieve the list of style dependencies the widget requires.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget style dependencies.
	 */
	public function get_style_depends(): array {
		return array( 'eb-widget-roll-slider' );
	}

	/**
	 * Get script dependencies.
	 *
	 * Retrieve the list of script dependencies the element requires.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Element scripts dependencies.
	 */
	public function get_script_depends() {
		return array( 'eb-swiper' );
	}

	/**
	 * Register Elementor widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 *
	 * @return void
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'settings_section',
			array(
				'label' => __( 'General Settings', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'title_button',
			array(
				'label'        => __( 'Title Section On Off', 'cs-element-bucket' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'cs-element-bucket' ),
				'label_off'    => __( 'No', 'cs-element-bucket' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$repeater->add_control(
			'title',
			array(
				'label'     => __( 'Slider Title', 'cs-element-bucket' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default'   => __( 'CS Element Bucket by CodeXshaper LLC', 'cs-element-bucket' ),
				'condition' => array(
					'title_button' => 'yes',
				),
			)
		);

		$repeater->add_control(
			'icon_image_button',
			array(
				'label'        => __( 'Icon Image Hide Unhide', 'cs-element-bucket' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'cs-element-bucket' ),
				'label_off'    => __( 'No', 'cs-element-bucket' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$repeater->add_control(
			'icon_img',
			array(
				'label'       => __( 'Icon Image', 'cs-element-bucket' ),
				'type'        => Controls_Manager::MEDIA,
				'show_label'  => false,
				'description' => __( 'Icon image', 'cs-element-bucket' ),
				'default'     => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
				'condition'   => array(
					'icon_image_button' => 'yes',
				),
			)
		);
		$this->add_control(
			'items',
			array(
				'label'   => __( 'Roll Slider Items', 'cs-element-bucket' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'icon_img' => array(
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						),
					),
				),
			)
		);
		$this->add_control(
			'slider_control',
			array(
				'label'   => __( 'Sliding Position Control', 'cs-element-bucket' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'left_to_right' => __( 'Left to Right', 'cs-element-bucket' ),
					'right_to_left' => __( 'Right to Left', 'cs-element-bucket' ),
				),
				'default' => 'left_to_right',
			)
		);

		$this->end_controls_section();

		// Style tab start.
		$this->start_controls_section(
			'styling_section',
			array(
				'label' => __( 'Styling Settings', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => __( 'Title Typography', 'cs-element-bucket' ),
				'selector' => '{{WRAPPER}} .title',
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Title Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'title_show_hr',
			array(
				'type'  => Controls_Manager::DIVIDER,
				'label' => __( 'title show hr', 'cs-element-bucket' ),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'rollslider_background_color',
			array(
				'label' => __( 'rollslider Background Color', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'rollslider_bg_color_tab',
		);
		$this->start_controls_tab(
			'rollslider_bg_normal_tab',
			array(
				'label' => __( 'Normal', 'cs-element-bucket' ),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'     => 'rollslider_bg_color',
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .eb-rollslider-area',

			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'rollslider_bg_hover_tab',
			array(
				'label' => __( 'Hover', 'cs-element-bucket' ),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'     => 'rollslider_hover_bg_color',
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .eb-rollslider-area:hover',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	/**
	 * Render Elementor widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 *
	 * @return void
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<!-- start rollslider area -->
		<section class="eb-rollslider-area">
			<!-- Slider  -->
			<?php
			if ( 'right_to_left' === $settings['slider_control'] ) :
				$classname = 'eb-rollslider';
			else :
				$classname = 'eb-rollslider-reverse';
			endif;
			?>
			<div class="swiper <?php echo esc_attr( $classname ); ?>">
				<div class="swiper-wrapper">
					<!-- Slide  -->
					<?php if ( ! empty( $settings['items'] ) ) : ?>
						<?php foreach ( $settings['items'] as $item ) : ?>
							<div class="swiper-slide eb-rollslide">
								<?php if ( ! empty( $item['title'] ) && 'yes' === $item['title_button'] ) : ?>
									<h2 class="title"><?php echo esc_html( $item['title'] ); ?></h2>
								<?php endif; ?>
								<?php if ( ! empty( $item['icon_img']['url'] ) && 'yes' === $item['icon_image_button'] ) : ?>
									<?php
									$img_url         = $item['icon_img']['url'];
									$placeholder_url = \Elementor\Utils::get_placeholder_image_src();
									$is_placeholder  = ( $img_url === $placeholder_url );
									?>
									<img class="icon <?php echo $is_placeholder ? 'placeholder-icon' : ''; ?>" src="<?php echo esc_url( $img_url ); ?>" alt="Icon">
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
		<!-- end rollslider area -->
		<?php
	}
}
