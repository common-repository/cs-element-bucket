<?php
/**
 * Button Widget file
 *
 * @category   Widget
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucket\Modules\Button\Widgets;

use CodexShaper\ElementBucket\Base\Widget;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Controls_Manager;
use Elementor\Icons_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // Exit if access directly.
}

/**
 * Button widget class
 *
 * @category   Class
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */
class Button extends Widget {

	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eb-widget-button';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'EB Button', 'cs-element-bucket' );
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
		return 'eicon-button';
	}

	/**
	 * Get widget keywords.
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return array( 'Button', 'CodexShaper', 'CS Element Bucket' );
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
		return array( 'eb-widget-button' );
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
		// General Settings.
		$this->start_controls_section(
			'general_settings_section',
			array(
				'label' => __( 'General Settings', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'eb_button_tag',
			array(
				'label'   => __( 'Button Tag', 'cs-element-bucket' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'a'      => __( 'link', 'cs-element-bucket' ),
					'button' => __( 'button', 'cs-element-bucket' ),
				),
				'default' => 'a',
			)
		);
		$this->add_control(
			'eb_button_type',
			array(
				'label'   => __( 'Button Type', 'cs-element-bucket' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'default' => __( 'Default', 'cs-element-bucket' ),
					'circle'  => __( 'Circle', 'cs-element-bucket' ),
				),
				'default' => 'default',
			)
		);
		$this->add_control(
			'eb_button_text',
			array(
				'label'   => __( 'Button Text', 'cs-element-bucket' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'EB Button', 'cs-element-bucket' ),
			)
		);
		$this->add_control(
			'eb_link_button_url',
			array(
				'label'       => __( 'Button url', 'cs-element-bucket' ),
				'type'        => Controls_Manager::URL,
				'options'     => array( 'url', 'is_external', 'nofollow' ),
				'default'     => array(
					'url'         => '#',
					'is_external' => true,
					'nofollow'    => true,
				),
				'label_block' => true,
				'condition'   => array( 'eb_button_tag' => 'a' ),
			)
		);
		$this->end_controls_section();

		// General Settings.
		$this->start_controls_section(
			'icon_settings_section',
			array(
				'label' => __( 'Icon Settings', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'eb_button_icon',
			array(
				'label' => __( 'Button Icon', 'cs-element-bucket' ),
				'type'  => Controls_Manager::ICONS,
			)
		);
		$this->add_control(
			'eb_default_button_icon_alignment',
			array(
				'label'     => __( 'Icon Alignment', 'cs-element-bucket' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'icon-right' => __( 'Right', 'cs-element-bucket' ),
					'icon-left'  => __( 'Left', 'cs-element-bucket' ),
				),
				'default'   => 'icon-right',
				'condition' => array(
					'eb_button_type' => 'default',
				),
			)
		);
		$this->add_control(
			'eb_circle_button_icon_alignment',
			array(
				'label'     => __( 'Icon Alignment', 'cs-element-bucket' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'icon-top'    => __( 'Top', 'cs-element-bucket' ),
					'icon-bottom' => __( 'Bottom', 'cs-element-bucket' ),
				),
				'default'   => 'icon-bottom',
				'condition' => array( 'eb_button_type' => 'circle' ),
			)
		);
		$this->end_controls_section();

		// Overlay Settings.
		$this->start_controls_section(
			'eb_button_overlay_settings_section',
			array(
				'label' => __( 'Overlay Settings', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'eb_default_button_overlay_effect',
			array(
				'label'     => __( 'Hover Overlay Effect Style', 'cs-element-bucket' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'no-hover-effect'    => __( 'None', 'cs-element-bucket' ),
					'hover-effect-one'   => __( 'Effect One', 'cs-element-bucket' ),
					'hover-effect-two'   => __( 'Effect Two', 'cs-element-bucket' ),
					'hover-effect-three' => __( 'Effect Three', 'cs-element-bucket' ),
				),
				'default'   => 'no-hover-effect',
				'condition' => array( 'eb_button_type' => 'default' ),
			)
		);
		$this->add_control(
			'eb_circle_button_overlay_effect',
			array(
				'label'     => __( 'Hover Overlay Effect Style', 'cs-element-bucket' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'no-hover-effect'  => __( 'None', 'cs-element-bucket' ),
					'hover-effect-one' => __( 'Effect One', 'cs-element-bucket' ),
				),
				'default'   => 'no-hover-effect',
				'condition' => array( 'eb_button_type' => 'circle' ),
			)
		);
		$this->end_controls_section();

		// Custom Class Settings.
		$this->start_controls_section(
			'custom_settings_section',
			array(
				'label' => __( 'Custom Class Settings', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'eb_button_custom_class',
			array(
				'label'       => __( 'Custom Button Class', 'cs-element-bucket' ),
				'type'        => Controls_Manager::TEXT,
				'description' => 'If you need to add any specific class.',
			)
		);
		$this->end_controls_section();

		// Button Size Styling.
		$this->start_controls_section(
			'eb_button_sizing_styling_section',
			array(
				'label' => __( 'Button Size', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_responsive_control(
			'eb_default_button_height',
			array(
				'type'      => Controls_Manager::SLIDER,
				'label'     => __( 'Button Height', 'cs-element-bucket' ),
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 500,
					),
				),
				'devices'   => array( 'desktop', 'tablet', 'mobile' ),
				'selectors' => array(
					'{{WRAPPER}} .eb-btn.eb-btn-default' => 'height: {{SIZE}}{{UNIT}};',
				),
				'condition' => array( 'eb_button_type' => 'default' ),
			)
		);
		$this->add_responsive_control(
			'eb_circle_button_size',
			array(
				'type'      => Controls_Manager::SLIDER,
				'label'     => __( 'Button Width and Height', 'cs-element-bucket' ),
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 500,
					),
				),
				'devices'   => array( 'desktop', 'tablet', 'mobile' ),
				'selectors' => array(
					'{{WRAPPER}} .eb-btn.eb-btn-circle' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
				'condition' => array( 'eb_button_type' => 'circle' ),
			)
		);
		$this->add_responsive_control(
			'eb_button_padding',
			array(
				'label'      => __( 'Button Padding', 'cs-element-bucket' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .eb-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'eb_button_border_radius',
			array(
				'label'      => __( 'Button Border Radius', 'cs-element-bucket' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .eb-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_section();

		// Button Background Color.
		$this->start_controls_section(
			'eb_button_bg_color_styling',
			array(
				'label' => __( 'Button Background', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'eb_button_bg_color_tab',
		);
			$this->start_controls_tab(
				'eb_button_bg_normal_tab',
				array(
					'label' => __( 'Normal', 'cs-element-bucket' ),
				)
			);
			$this->add_group_control(
				Group_Control_Background::get_type(),
				array(
					'name'     => 'eb_button_bg_color',
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .eb-btn',

				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'eb_button_bg_hover_tab',
				array(
					'label' => __( 'Hover', 'cs-element-bucket' ),
				)
			);
			$this->add_group_control(
				Group_Control_Background::get_type(),
				array(
					'name'     => 'eb_button_hover_bg_color',
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .eb-btn:hover',
				)
			);
			$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Button Text.
		$this->start_controls_section(
			'eb_button_text_color_styling',
			array(
				'label' => __( 'Button Text', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'eb_button_text_color_tab',
		);
			$this->start_controls_tab(
				'eb_button_text_normal_tab',
				array(
					'label' => __( 'Normal', 'cs-element-bucket' ),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'      => 'eb_button_text_typography',
					'label'     => __( 'Text Typography', 'cs-element-bucket' ),
					'selectors' => array(
						'{{WRAPPER}} .eb-btn',
					),
				)
			);
			$this->add_control(
				'eb_button_text_color',
				array(
					'label'     => __( 'Text Color', 'cs-element-bucket' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .eb-btn' => 'color: {{VALUE}}',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'eb_button_text_hover_tab',
				array(
					'label' => __( 'Hover', 'cs-element-bucket' ),
				)
			);
			$this->add_control(
				'eb_button_text_hover_color',
				array(
					'label'     => __( 'Text Color', 'cs-element-bucket' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .eb-btn:hover' => 'color: {{VALUE}}',
					),
				)
			);
			$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Button Border Color.
		$this->start_controls_section(
			'eb_button_border_styling',
			array(
				'label' => __( 'Button Border', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'eb_button_border_tab',
		);
			$this->start_controls_tab(
				'eb_button_border_normal_tab',
				array(
					'label' => __( 'Normal', 'cs-element-bucket' ),
				)
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				array(
					'name'     => 'eb_button_border_normal',
					'label'    => __( 'Border', 'cs-element-bucket' ),
					'selector' => '{{WRAPPER}} .eb-btn',
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'eb_button_border_hover_tab',
				array(
					'label' => __( 'Hover', 'cs-element-bucket' ),
				)
			);
			$this->add_control(
				'eb_button_border_hover_color',
				array(
					'label'     => __( 'Border Color', 'cs-element-bucket' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .eb-btn:hover' => 'border-color: {{VALUE}}',
					),
				)
			);
			$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Button Icon.
		$this->start_controls_section(
			'eb_button_icon_color_styling',
			array(
				'label' => __( 'Button Icon', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'eb_button_icon_color_tab',
		);
			$this->start_controls_tab(
				'eb_button_icon_color_normal_tab',
				array(
					'label' => __( 'Normal', 'cs-element-bucket' ),
				)
			);
			$this->add_responsive_control(
				'eb_button_icon_size',
				array(
					'type'      => Controls_Manager::SLIDER,
					'label'     => __( 'Icon Size', 'cs-element-bucket' ),
					'range'     => array(
						'px' => array(
							'min' => 0,
							'max' => 500,
						),
					),
					'devices'   => array( 'desktop', 'tablet', 'mobile' ),
					'selectors' => array(
						'{{WRAPPER}} .eb-btn svg' => 'width: {{SIZE}}{{UNIT}};',
					),
				)
			);
			$this->add_control(
				'eb_button_icon_color',
				array(
					'label'     => __( 'Icon Color', 'cs-element-bucket' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .eb-btn svg'      => 'fill: {{VALUE}}',
						'{{WRAPPER}} .eb-btn svg path' => 'fill: {{VALUE}}',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'eb_button_icon_color_hover_tab',
				array(
					'label' => __( 'Hover', 'cs-element-bucket' ),
				)
			);
			$this->add_control(
				'eb_button_icon_hover_color',
				array(
					'label'     => __( 'Icon Color', 'cs-element-bucket' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .eb-btn:hover svg' => 'fill: {{VALUE}}',
						'{{WRAPPER}} .eb-btn:hover svg path' => 'fill: {{VALUE}}',
					),
				)
			);
			$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Button Overlay.
		$this->start_controls_section(
			'eb_button_overlay_background_styling',
			array(
				'label' => __( 'Button Overlay', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'      => 'eb_button_before_after_bg_color',
				'label'     => __( 'On Hover Overlay Bg Color', 'cs-element-bucket' ),
				'types'     => array( 'classic', 'gradient' ),
				'selectors' => '{{WRAPPER}} .eb-btn:hover::before, {{WRAPPER}} .eb-btn:hover::after',
			)
		);
		$this->end_controls_section();

		// Button Box Shadow.
		$this->start_controls_section(
			'eb_button_boxs_hadow_styling',
			array(
				'label' => __( 'Button Box Shadow', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'eb_button_boxs_hadow_tab',
		);
			$this->start_controls_tab(
				'eb_button_boxs_hadow_normal_tab',
				array(
					'label' => __( 'Normal', 'cs-element-bucket' ),
				)
			);
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				array(
					'name'     => 'eb_button_box_shadow_normal',
					'selector' => '{{WRAPPER}} .eb-btn',
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'eb_button_boxs_hadow_hover_tab',
				array(
					'label' => __( 'Hover', 'cs-element-bucket' ),
				)
			);
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				array(
					'name'     => 'eb_button_box_shadow_hover',
					'selector' => '{{WRAPPER}} .eb-btn',
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
		$link_url = isset( $settings['eb_link_button_url'] ) && ! empty( $settings['eb_link_button_url'] ) ? $settings['eb_link_button_url']['url'] : '#';
		$href     = 'a' === $settings['eb_button_tag'] ? "href='{$link_url}'" : '';
		$icon     = '';
		$classes  = '';
		$classes .= 'default' === $settings['eb_button_type'] ? ' eb-btn-default' : ' eb-btn-circle';
		if ( 'default' === $settings['eb_button_type'] ) {
			$classes .= 'icon-left' === $settings['eb_default_button_icon_alignment'] ? ' icon-left' : ' icon-right';
			$classes .= ' ' . $settings['eb_default_button_overlay_effect'];
		}
		if ( 'circle' === $settings['eb_button_type'] ) {
			$classes .= 'icon-top' === $settings['eb_circle_button_icon_alignment'] ? ' icon-top' : ' icon-bottom';
			$classes .= ' ' . $settings['eb_circle_button_overlay_effect'];
		}
		$classes .= ! empty( $settings['eb_button_custom_class'] ) ? ' ' . $settings['eb_button_custom_class'] : '';

		if ( ! empty( $settings['eb_button_icon'] ) ) {
			$icon = Icons_Manager::try_get_icon_html(
				$settings['eb_button_icon'],
				array(
					'aria-hidden' => 'true',
					'fill'        => 'currentColor',
					'width'       => '16',
				)
			);
		}

		?>
		<?php echo '<' . esc_html( $settings['eb_button_tag'] ) . ' ' . esc_html( $href ) . ' class="eb-btn eb-btn-primary' . esc_attr( $classes ) . '">' . esc_html( $settings['eb_button_text'] ) . ' ' . wp_kses( $icon, cseb_get_svg_rules() ) . '</' . esc_html( $settings['eb_button_tag'] ) . '>'; ?>
		<?php
	}
}
