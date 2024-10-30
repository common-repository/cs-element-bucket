<?php
/**
 * Testimonials Widget file
 *
 * @category   Widget
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucket\Modules\Testimonials\Widgets;

use CodexShaper\ElementBucket\Base\Widget;
use Elementor\Controls_Manager;

/**
 * Testimonials widget class
 *
 * @category   Class
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */
class Testimonials extends Widget {

	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eb-widget-testimonials';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'EB Testimonials', 'cs-element-bucket' );
	}

	/**
	 * Get widget keywords.
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return array( 'Testimonials', 'CodexShaper', 'CS Element Bucket' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-testimonial-carousel';
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
		return array( 'eb-widget-testimonials' );
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
			'description',
			array(
				'label'   => __( 'Description', 'cs-element-bucket' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( '“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna alisa ullamco laboris mollit anim id est laborum.”', 'cs-element-bucket' ),
			)
		);
		$repeater->add_control(
			'designation',
			array(
				'label'   => __( 'Designation', 'cs-element-bucket' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Marketer', 'cs-element-bucket' ),
			)
		);
		$repeater->add_control(
			'name',
			array(
				'label'   => __( 'Name', 'cs-element-bucket' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Leonardo Cora', 'cs-element-bucket' ),
			)
		);
		$repeater->add_control(
			'image_button',
			array(
				'label'        => __( 'Image Hide Unhide', 'cs-element-bucket' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'cs-element-bucket' ),
				'label_off'    => __( 'No', 'cs-element-bucket' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$repeater->add_control(
			'main_img',
			array(
				'label'       => __( 'Main Image', 'cs-element-bucket' ),
				'type'        => Controls_Manager::MEDIA,
				'show_label'  => false,
				'description' => __( 'Main image', 'cs-element-bucket' ),
				'default'     => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
				'condition'   => array(
					'image_button' => 'yes',
				),
			)
		);
		$repeater->add_control(
			'description_control',
			array(
				'label'   => __( 'Description Position', 'cs-element-bucket' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'up'   => __( 'Up', 'cs-element-bucket' ),
					'down' => __( 'Down', 'cs-element-bucket' ),
				),
				'default' => 'up',
			)
		);
		$this->add_control(
			'testimonial_items',
			array(
				'label'   => __( 'Testimonial Item', 'cs-element-bucket' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'main_img' => array(
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						),
					),
				),
			)
		);
		$this->add_control(
			'button_control',
			array(
				'label'        => __( 'Next Previous Button On Off', 'cs-element-bucket' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'cs-element-bucket' ),
				'label_off'    => __( 'No', 'cs-element-bucket' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->end_controls_section();

		// style tab start.
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
				'name'     => 'description_typography',
				'label'    => __( 'Description Typography', 'cs-element-bucket' ),
				'selector' => '{{WRAPPER}} .content',
			)
		);
		$this->add_control(
			'description_color',
			array(
				'label'     => __( 'Description Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .content' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'description_show_hr',
			array(
				'type'  => Controls_Manager::DIVIDER,
				'label' => __( 'description show hr', 'cs-element-bucket' ),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'name_typography',
				'label'    => __( 'name Typography', 'cs-element-bucket' ),
				'selector' => '{{WRAPPER}} .name',
			)
		);
		$this->add_control(
			'name_color',
			array(
				'label'     => __( 'Name Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .name' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'name_show_hr',
			array(
				'type'  => Controls_Manager::DIVIDER,
				'label' => __( 'name show hr', 'cs-element-bucket' ),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'designation_typography',
				'label'    => __( 'Designation Typography', 'cs-element-bucket' ),
				'selector' => '{{WRAPPER}} .designation',
			)
		);
		$this->add_control(
			'designation_color',
			array(
				'label'     => __( 'Designation Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .designation' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'designation_show_hr',
			array(
				'type'  => Controls_Manager::DIVIDER,
				'label' => __( 'designation show hr', 'cs-element-bucket' ),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'      => 'next_prev_typography',
				'label'     => __( 'Next and Previous Typography', 'cs-element-bucket' ),
				'selectors' => array( '{{WRAPPER}} .prev-btn', '{{WRAPPER}} .next-btn' ),
			)
		);
		$this->add_control(
			'next_prev_color',
			array(
				'label'     => __( ' Next and Previous Text Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .prev-btn' => 'color: {{VALUE}}',
					'{{WRAPPER}} .next-btn' => 'color: {{VALUE}}',
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'testimonial_background_color',
			array(
				'label' => __( 'Testimonial Background Color', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'testimonial_bg_color_tab',
		);
			$this->start_controls_tab(
				'testimonial_bg_normal_tab',
				array(
					'label' => __( 'Normal', 'cs-element-bucket' ),
				)
			);
			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				array(
					'name'     => 'testimonial_bg_color',
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .testimonial-area-9',

				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'testimonial_bg_hover_tab',
				array(
					'label' => __( 'Hover', 'cs-element-bucket' ),
				)
			);
			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				array(
					'name'     => 'testimonial_hover_bg_color',
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .testimonial-area-9:hover',
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
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<!-- start testimonial area. -->
		<section class="testimonial-area-9">
			<div class="container">
				<!-- Slider.  -->
				<div class="swiper testimonial-slider-9">
					<div class="swiper-wrapper">
						<!-- testimonial slide.  -->
						<?php if ( ! empty( $settings['testimonial_items'] ) ) : ?>
							<?php foreach ( $settings['testimonial_items'] as $testimonial_item ) : ?>
								<div class="swiper-slide testimonial-slide-9">
									<div class="client-wrap">
										<?php if ( ! empty( $testimonial_item['main_img']['url'] ) && 'yes' === $testimonial_item['image_button'] ) : ?>
											<img class="client-img" src="<?php echo esc_url( $testimonial_item['main_img']['url'] ); ?>" alt="Client">
										<?php endif; ?>
									</div>
									<?php if ( ! empty( $testimonial_item['description_control'] ) && 'up' === $testimonial_item['description_control'] ) : ?>
										<?php if ( ! empty( $testimonial_item['description'] ) ) : ?>
											<p class="content"><?php echo esc_html( $testimonial_item['description'] ); ?></p>
										<?php endif; ?>
										<?php if ( ! empty( $testimonial_item['name'] ) ) : ?>
											<h2 class="name"><?php echo esc_html( $testimonial_item['name'] ); ?></h2>
										<?php endif; ?>
										<?php if ( ! empty( $testimonial_item['designation'] ) ) : ?>
											<h3 class="designation"><?php echo esc_html( $testimonial_item['designation'] ); ?></h3>
										<?php endif; ?>

										<?php
									else :
										?>
										<?php if ( ! empty( $testimonial_item['name'] ) ) : ?>
											<h2 class="name"><?php echo esc_html( $testimonial_item['name'] ); ?></h2>
										<?php endif; ?>
										<?php if ( ! empty( $testimonial_item['designation'] ) ) : ?>
											<h3 class="designation"><?php echo esc_html( $testimonial_item['designation'] ); ?></h3>
										<?php endif; ?>
										<?php if ( ! empty( $testimonial_item['description'] ) ) : ?>
											<p class="content"><?php echo esc_html( $testimonial_item['description'] ); ?></p>
										<?php endif; ?>

									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
					<!-- Navigation. -->
					<div class="navigation-wrap-9">
						<?php if ( ! empty( $settings['button_control'] ) && 'yes' === $settings['button_control'] ) : ?>
							<div class="prev-btn btn-navigation">PREV</div>
							<div class="next-btn btn-navigation">NEXT</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		<!-- end testimonial area. -->
		<?php
	}
}
