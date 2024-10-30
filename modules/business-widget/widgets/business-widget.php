<?php
/**
 * Business_Widget Widget file
 *
 * @category   Widget
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucket\Modules\BusinessWidget\Widgets;

use CodexShaper\ElementBucket\Base\Widget;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // exit if access directly.
}

/**
 * Business_Widget widget class
 *
 * @category   Class
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */
class Business_Widget extends Widget {

	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eb-widget-business-widget';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'EB Business Widget', 'cs-element-bucket' );
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
		return 'eicon-thumbnails-half';
	}

	/**
	 * Get widget keywords.
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return array( 'Business Widget', 'CodexShaper', 'Element Bucket' );
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
		return array( 'eb-widget-business-widget' );
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
		$this->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'cs-element-bucket' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Shipping Services', 'cs-element-bucket' ),
			)
		);
		$this->add_control(
			'description',
			array(
				'label'   => __( 'Description', 'cs-element-bucket' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Morbi libero velit placerat suscipit amet ornare amet enim.', 'cs-element-bucket' ),
			)
		);
		$this->add_control(
			'image_icon_button',
			array(
				'label'        => __( 'Image Hide Show', 'cs-element-bucket' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'cs-element-bucket' ),
				'label_off'    => __( 'No', 'cs-element-bucket' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'icon_img',
			array(
				'label'       => __( 'Main Icon Image', 'cs-element-bucket' ),
				'type'        => Controls_Manager::MEDIA,
				'show_label'  => false,
				'description' => __( 'Main Icon image', 'cs-element-bucket' ),
				'default'     => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'condition'   => array(
					'image_icon_button' => 'yes',
				),
			)
		);
		$this->add_control(
			'main_button_control',
			array(
				'label'   => __( 'Button Hide Show', 'cs-element-bucket' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'show' => __( 'Show', 'cs-element-bucket' ),
					'hide' => __( 'Hide', 'cs-element-bucket' ),
				),
				'default' => 'show',
			)
		);
		$this->add_control(
			'button_text',
			array(
				'label'     => __( 'Button Text', 'cs-element-bucket' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => __( 'More Details', 'cs-element-bucket' ),
				'condition' => array(
					'main_button_control' => 'show',
				),

			)
		);
		$this->add_control(
			'button_icon',
			array(
				'label'     => __( 'Button Icon', 'cs-element-bucket' ),
				'type'      => Controls_Manager::ICONS,
				'condition' => array(
					'main_button_control' => 'show',
				),
			)
		);
		$this->add_control(
			'btn_link',
			array(
				'label'       => __( 'Add URL Link', 'cs-element-bucket' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'cs-element-bucket' ),
				'description' => __( 'Enter the URL HERE', 'cs-element-bucket' ),
				'default'     => array(
					'url' => '#',
				),
				'condition'   => array(
					'main_button_control' => 'show',
				),
			)
		);
		$this->end_controls_section();
		// Style tab start.
		$this->start_controls_section(
			'style_section',
			array(
				'label' => __( 'General Style', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'icon_background_color',
			array(
				'label'     => __( 'Icon Background Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .cdx-icon' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'title_section',
			array(
				'label' => __( 'Title', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->start_controls_tabs(
			'title_tab',
		);
		$this->start_controls_tab(
			'title_text_tab',
			array(
				'label' => __( 'Normal', 'cs-element-bucket' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => __( 'Title Typography', 'cs-element-bucket' ),
				'selector' => '{{WRAPPER}} .cdx-title',
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Title Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .cdx-title' => 'color: {{VALUE}}',
				),
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'title_text_hover_tab',
			array(
				'label' => __( 'Hover', 'cs-element-bucket' ),
			)
		);
		$this->add_control(
			'title_color_hover',
			array(
				'label'     => __( 'Title Color Hover', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .cdx-title:hover a' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'description_section',
			array(
				'label' => __( 'Description', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->start_controls_tabs(
			'description_tab',
		);
		$this->start_controls_tab(
			'description_text_tab',
			array(
				'label' => __( 'Normal', 'cs-element-bucket' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'description_typography',
				'label'    => __( 'Description Typography', 'cs-element-bucket' ),
				'selector' => '{{WRAPPER}} .cdx-description',
			)
		);
		$this->add_control(
			'description_color',
			array(
				'label'     => __( 'Description Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .cdx-description' => 'color: {{VALUE}}',
				),
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'description_text_hover_tab',
			array(
				'label' => __( 'Hover', 'cs-element-bucket' ),
			)
		);
		$this->add_control(
			'description_color_hover',
			array(
				'label'     => __( 'Description Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .cdx-description:hover' => 'color: {{VALUE}}',

				),
			)
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Button Text.
		$this->start_controls_section(
			'button_text_color_styling',
			array(
				'label' => __( 'Button Text', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'button_text_color_tab',
		);
		$this->start_controls_tab(
			'button_text_normal_tab',
			array(
				'label' => __( 'Normal', 'cs-element-bucket' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_text_typography',
				'label'    => __( 'Text Typography', 'cs-element-bucket' ),
				'selector' => '{{WRAPPER}} .cdx-read-more-btn-small',
			),
		);
		$this->add_control(
			'button_text_color',
			array(
				'label'     => __( 'Text Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .cdx-read-more-btn-small' => 'color: {{VALUE}}',
				),
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'button_text_hover_tab',
			array(
				'label' => __( 'Hover', 'cs-element-bucket' ),
			)
		);
		$this->add_control(
			'button_text_hover_color',
			array(
				'label'     => __( 'Text Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .cdx-read-more-btn-small:hover' => 'color: {{VALUE}}',
				),
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Card Background.
		$this->start_controls_section(
			'background',
			array(
				'label' => __( 'Card Background', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'card_bg_color_tab',
		);
		$this->start_controls_tab(
			'card_bg_normal_tab',
			array(
				'label' => __( 'Normal', 'cs-element-bucket' ),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'card_bg_color',
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .cdx-single-service-card',

			)
		);
		$this->add_control(
			'card_border_radius',
			array(
				'label'      => __( 'Card Border Radius', 'cs-element-bucket' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em', 'rem' ),
				'default'    => array(
					'unit' => 'px',
					'size' => 0,
				),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 50,
						'step' => 1,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .cdx-single-service-card' => 'border-radius: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'card_shadow',
				'label'    => __( 'Card Shadow', 'cs-element-bucket' ),
				'selector' => '{{WRAPPER}} .cdx-single-service-card',
			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'card_bg_hover_tab',
			array(
				'label' => __( 'Hover', 'cs-element-bucket' ),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'card_hover_bg_color',
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .cdx-single-service-card .cdx-hover-wrap',
			)
		);
		$this->add_control(
			'card_border_radius_hover',
			array(
				'label'      => __( 'Card Border Radius Hover', 'cs-element-bucket' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em', 'rem' ),
				'default'    => array(
					'unit' => 'px',
					'size' => 0,
				),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 50,
						'step' => 1,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .cdx-single-service-card:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'card_shadow_hover',
				'label'    => __( 'Card Shadow Hover', 'cs-element-bucket' ),
				'selector' => '{{WRAPPER}} .cdx-single-service-card:hover',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
		$this->start_controls_section(
			'card_height_width',
			array(
				'label' => __( 'Card Height Width', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'height',
			array(
				'label'      => __( 'Height', 'cs-element-bucket' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em' ),
				'range'      => array(
					'px' => array(
						'min'  => 50,
						'max'  => 1000,
						'step' => 1,
					),
					'%'  => array(
						'min' => 1,
						'max' => 100,
					),
					'em' => array(
						'min' => 1,
						'max' => 50,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .cdx-single-service-card' => 'height: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'width',
			array(
				'label'      => __( 'Width', 'cs-element-bucket' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em' ),
				'range'      => array(
					'px' => array(
						'min'  => 50,
						'max'  => 1000,
						'step' => 1,
					),
					'%'  => array(
						'min' => 1,
						'max' => 100,
					),
					'em' => array(
						'min' => 1,
						'max' => 50,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .cdx-single-service-card' => 'width: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

		// Button Background.
		$this->start_controls_section(
			'button_background',
			array(
				'label' => __( 'Button Background', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'button_bg_color_tab',
		);
		$this->start_controls_tab(
			'button_bg_normal_tab',
			array(
				'label' => __( 'Normal', 'cs-element-bucket' ),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'button_bg_color',
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .cdx-read-more-btn-small',

			)
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'button_bg_hover_tab',
			array(
				'label' => __( 'Hover', 'cs-element-bucket' ),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'button_hover_bg_color',
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .cdx-read-more-btn-small:hover',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Button Border.
		$this->start_controls_section(
			'button_border',
			array(
				'label' => __( 'Button Border', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'button_border_color',
			array(
				'label'     => __( 'Border Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .cdx-read-more-btn-small' => 'border-color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'button_border_width',
			array(
				'label'      => __( 'Border Width', 'cs-element-bucket' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em', 'rem' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => 1,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .cdx-read-more-btn-small' => 'border-width: {{SIZE}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'button_border_style',
			array(
				'label'     => __( 'Border Style', 'cs-element-bucket' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'none'   => __( 'None', 'cs-element-bucket' ),
					'solid'  => __( 'Solid', 'cs-element-bucket' ),
					'dashed' => __( 'Dashed', 'cs-element-bucket' ),
					'dotted' => __( 'Dotted', 'cs-element-bucket' ),
				),
				'default'   => 'none',
				'selectors' => array(
					'{{WRAPPER}} .cdx-read-more-btn-small' => 'border-style: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'button_border_radius',
			array(
				'label'      => __( 'Border Radius', 'cs-element-bucket' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', 'em', 'rem' ),
				'default'    => array(
					'unit' => 'px',
					'size' => 0,
				),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 50,
						'step' => 1,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .cdx-read-more-btn-small' => 'border-radius: {{SIZE}}{{UNIT}};',
				),
			)
		);

		// Hover Border Color.
		$this->add_control(
			'button_hover_border_color',
			array(
				'label'     => __( 'Hover Border Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .cdx-read-more-btn-small:hover' => 'border-color: {{VALUE}};',
				),
			)
		);
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

		if ( ! empty( $settings['button_icon'] ) ) {
			$icon = Icons_Manager::try_get_icon_html(
				$settings['button_icon'],
				array(
					'aria-hidden' => 'true',
					'fill'        => 'currentColor',
					'width'       => '16',
				)
			);
		}
		$url = '#';
		if ( filter_var( $settings['btn_link']['url'], FILTER_VALIDATE_URL ) ) :
			$url = $settings['btn_link']['url'];

		endif;

		?>
		<div class="cdx-single-service-card">
			<div class="view-wrap">
				<?php if ( 'yes' === $settings['image_icon_button'] ) : ?>
					<div class="cdx-icon">
						<?php if ( ! empty( $settings['icon_img']['url'] ) ) : ?>
							<img src="<?php echo esc_url( $settings['icon_img']['url'] ); ?>" alt="img">
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $settings['title'] ) ) : ?>
					<h4 class="cdx-title"><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $settings['title'] ); ?></a></h4>
				<?php endif; ?>
				<?php if ( ! empty( $settings['description'] ) ) : ?>
					<p class="cdx-description"><?php echo esc_html( $settings['description'] ); ?></p>
				<?php endif; ?>
			</div>
			<div class="cdx-hover-wrap">
				<?php if ( ! empty( $settings['title'] ) ) : ?>
					<h4 class="cdx-title"><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $settings['title'] ); ?></a></h4>
				<?php endif; ?>
				<?php if ( ! empty( $settings['description'] ) ) : ?>
					<p class="cdx-description"><?php echo esc_html( $settings['description'] ); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $settings['button_text'] ) && 'show' === $settings['main_button_control'] ) : ?>
					<a class="cdx-read-more-btn-small" href="<?php echo esc_url( $url ); ?>">
						<?php echo esc_html( $settings['button_text'] ); ?>
						<span class='ms-2'>
							<?php if ( ! empty( $icon ) ) : ?>
								<?php echo wp_kses( $icon, cseb_get_svg_rules() ); ?>
							<?php endif; ?>
						</span>
					</a>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}
}
