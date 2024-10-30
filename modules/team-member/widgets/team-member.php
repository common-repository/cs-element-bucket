<?php
/**
 * Team Member Widget file
 *
 * @category   Widget
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucket\Modules\TeamMember\Widgets;

use CodexShaper\ElementBucket\Base\Widget;
use Elementor\Controls_Manager;

/**
 * Team Member widget class
 *
 * @category   Class
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */
class Team_Member extends Widget {

	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eb-widget-team-member';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'EB Team Member', 'cs-element-bucket' );
	}

	/**
	 * Get Search Keywords.
	 *
	 * @return array Widget title.
	 */
	public function get_keywords() {
		return array( 'Team Member', 'CodexShaper', 'CS Element Bucket' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-accordion';
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
		return array( 'eb-widget-team-member' );
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
		$this->add_control(
			'style_select',
			array(
				'label'   => esc_html__( 'Select Style', 'cs-element-bucket' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'style-1' => esc_html__( 'Style-1', 'cs-element-bucket' ),
					'style-2' => esc_html__( 'Style-2', 'cs-element-bucket' ),
				),
				'default' => 'style-1',
			)
		);

		$this->add_control(
			'profile',
			array(
				'label'   => __( 'profile Image', 'cs-element-bucket' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'image' => array(
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					),
				),
			)
		);

		$this->add_control(
			'member_name',
			array(
				'label'   => __( 'Memeber Name', 'cs-element-bucket' ),
				'type'    => Controls_Manager::TEXT,
				'default' => ( '' ),
			)
		);
		$this->add_control(
			'designation',
			array(
				'label'   => __( 'Designation', 'cs-element-bucket' ),
				'type'    => Controls_Manager::TEXT,
				'default' => ( '' ),
			)
		);
		$this->add_control(
			'profile_link',
			array(
				'label'   => __( 'Profile Link', 'cs-element-bucket' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url'         => '#',
					'is_external' => true,
				),
			)
		);
		$this->add_control(
			'show_social_link',
			array(
				'label'        => esc_html__( 'Show Social Link', 'cs-element-bucket' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'cs-element-bucket' ),
				'label_off'    => esc_html__( 'Hide', 'cs-element-bucket' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => array(
					'style_select' => 'style-1',
				),
			)
		);
		$this->add_control(
			'social_btn_icon',
			array(
				'label'     => esc_html__( 'Social Button Icon', 'cs-element-bucket' ),
				'type'      => Controls_Manager::ICONS,
				'default'   => array(
					'value'   => 'fas fa-share-alt-square',
					'library' => 'fa-solid',
				),
				'condition' => array(
					'style_select' => 'style-1',
				),
			)
		);
		$reapeater = new \Elementor\Repeater();

		$reapeater->add_control(
			'icon',
			array(
				'label'   => esc_html__( 'Icon', 'cs-element-bucket' ),
				'type'    => Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fas fa-circle',
					'library' => 'fa-solid',
				),
			)
		);
		$reapeater->add_control(
			'social_link',
			array(
				'label'   => __( 'Social Media Link', 'cs-element-bucket' ),
				'type'    => Controls_Manager::URL,
				'default' =>
				array(
					'url'         => '#',
					'is_external' => true,
				),
			)
		);
		$this->add_control(
			'Social_icon',
			array(
				'label'  => __( 'Social Icon Item', 'cs-element-bucket' ),
				'type'   => Controls_Manager::REPEATER,
				'fields' => $reapeater->get_controls(),
			)
		);
		$this->end_controls_section();

		// style tab start.
		$this->start_controls_section(
			'styling_section_two',
			array(
				'label' => __( 'Name Settings', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'style_tabs'
		);
		$this->start_controls_tab(
			'style_normal_tab',
			array(
				'label' => esc_html__( 'Normal', 'cs-element-bucket' ),
			)
		);
		$this->add_control(
			'member_name_color',
			array(
				'label'     => __( 'Member Name Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,

				'selectors' => array(
					'{{WRAPPER}} .single-team-item .details .name' => 'color: {{VALUE}}',
				),
				'condition' => array(
					'style_select' => 'style-1',
				),
				'separator' => 'before',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'      => 'member_name_typography',
				'label'     => __( 'Member Name Typography', 'cs-element-bucket' ),
				'selector'  => '{{WRAPPER}} .single-team-item .details .name',
				'condition' => array(
					'style_select' => 'style-1',
				),
			)
		);
		$this->add_control(
			'member_name_one_color',
			array(
				'label'     => __( 'Member Name Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,

				'selectors' => array(
					'{{WRAPPER}} .single-team-member .name' => 'color: {{VALUE}}',
				),
				'condition' => array(
					'style_select' => 'style-2',
				),
				'separator' => 'before',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'      => 'member_name_one_typography',
				'label'     => __( 'Member Name Typography', 'cs-element-bucket' ),
				'selector'  => '{{WRAPPER}} .single-team-member .name',
				'condition' => array(
					'style_select' => 'style-2',
				),
			)
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'style_hover_tab',
			array(
				'label' => esc_html__( 'Hover', 'cs-element-bucket' ),
			)
		);
		$this->add_control(
			'name_hover_color',
			array(
				'label'     => __( 'Name Hover Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => ( '#F7C600' ),
				'selectors' => array(
					'{{WRAPPER}} .name a:hover' => 'color: {{VALUE}}',
				),
				'condition' => array(
					'style_select' => 'style-1',
				),
				'separator' => 'before',
			)
		);
		$this->add_control(
			'name_hover_one_color',
			array(
				'label'     => __( 'Name Hover Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => ( '#F7C600' ),
				'selectors' => array(
					'{{WRAPPER}} .name a:hover' => 'color: {{VALUE}}',
				),
				'condition' => array(
					'style_select' => 'style-2',
				),
				'separator' => 'before',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
		$this->start_controls_section(
			'styling_section_three',
			array(
				'label' => __( 'Social Icon Settings', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'style_tabs_one'
		);
		$this->start_controls_tab(
			'style_normal_tab_one',
			array(
				'label' => esc_html__( 'Normal', 'cs-element-bucket' ),
			)
		);
		$this->add_control(
			'Icon_width',
			array(
				'label'      => __( 'Icon Width', 'cs-element-bucket' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'selectors'  => array(
					'{{WRAPPER}} .single-team-item .thumb .social-item li' => 'width: {{SIZE}}{{UNIT}}',
				),
				'condition'  => array(
					'style_select' => 'style-1',
				),
				'separator'  => 'before',
			)
		);
		$this->add_control(
			'icon_height',
			array(
				'label'      => __( 'Icon Height', 'cs-element-bucket' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'selectors'  => array(
					'{{WRAPPER}} .single-team-item .thumb .social-item li' => 'height: {{SIZE}}{{UNIT}}',
				),
				'condition'  => array(
					'style_select' => 'style-1',
				),
				'separator'  => 'before',
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'      => 'border',
				'selector'  => '{{WRAPPER}} .single-team-item .thumb .social-item li',
				'condition' => array(
					'style_select' => 'style-1',
				),
			)
		);
		$this->add_control(
			'icon_border_radious',
			array(
				'label'      => __( 'Icon Border Radious', 'cs-element-bucket' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'selectors'  => array(
					'{{WRAPPER}} .single-team-item .thumb .social-item li' => 'border-radius: {{SIZE}}{{UNIT}}',
				),
				'condition'  => array(
					'style_select' => 'style-1',
				),

			)
		);
		$this->add_control(
			'bg_color',
			array(
				'label'     => __( 'Background Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,

				'selectors' => array(
					'{{WRAPPER}} .single-team-item .thumb .social-item li' => 'background-color: {{VALUE}}',
				),
				'condition' => array(
					'style_select' => 'style-1',
				),
				'separator' => 'before',
			)
		);
		$this->add_control(
			'Icon_width_style_2',
			array(
				'label'      => __( 'Icon Width', 'cs-element-bucket' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'selectors'  => array(
					'{{WRAPPER}} .single-team-member .social-list' => 'width: {{SIZE}}{{UNIT}}',
				),
				'condition'  => array(
					'style_select' => 'style-2',
				),
				'separator'  => 'before',
			)
		);
		$this->add_control(
			'icon_height_style_2',
			array(
				'label'      => __( 'Icon Height', 'cs-element-bucket' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'selectors'  => array(
					'{{WRAPPER}} .single-team-member .social-list' => 'height: {{SIZE}}{{UNIT}}',
				),
				'condition'  => array(
					'style_select' => 'style-2',
				),
				'separator'  => 'before',
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'      => 'border_style_2',
				'selector'  => '{{WRAPPER}} .single-team-member .social-list',
				'condition' => array(
					'style_select' => 'style-2',
				),
			)
		);
		$this->add_control(
			'icon_border_radious_style_2',
			array(
				'label'      => __( 'Icon Border Radious', 'cs-element-bucket' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'selectors'  => array(
					'{{WRAPPER}} .single-team-member .social-list' => 'border-radius: {{SIZE}}{{UNIT}}',
				),
				'condition'  => array(
					'style_select' => 'style-2',
				),

			)
		);
		$this->add_control(
			'member_social_icon_style_2_color',
			array(
				'label'     => __( 'Social Icon Background Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'style_select' => 'style-2',
				),
				'selectors' => array(
					'{{WRAPPER}} .single-team-member .social-icon' => 'background-color: {{VALUE}}',
				),
				'separator' => 'before',
			)
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'style_hover_tab_one',
			array(
				'label' => esc_html__( 'Hover', 'cs-element-bucket' ),
			)
		);
		$this->add_control(
			'bg_color_hover',
			array(
				'label'     => __( 'Hover Background Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,

				'selectors' => array(
					'{{WRAPPER}} .single-team-item .thumb .social-item:hover li:hover' => 'background-color: {{VALUE}}',
				),
				'condition' => array(
					'style_select' => 'style-1',
				),
				'separator' => 'before',
			)
		);

		$this->add_control(
			'member_social_icon_style_2_hover_color',
			array(
				'label'     => __( 'Background Hover Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'style_select' => 'style-2',
				),
				'selectors' => array(
					'{{WRAPPER}} .single-team-member .social-icon:hover' => 'background-color: {{VALUE}}',
				),
				'separator' => 'before',
			)
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'styling_section_four',
			array(
				'label' => __( 'Designation Settings', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'member_designation_color',
			array(
				'label'     => __( 'Member Designation Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'style_select' => 'style-1',
				),
				'selectors' => array(
					'{{WRAPPER}} .single-team-item .details .designation' => 'color: {{VALUE}}',
				),
				'separator' => 'before',
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'      => 'member_designation_typography',
				'label'     => __( 'Member Designation Typography', 'cs-element-bucket' ),
				'selector'  => '{{WRAPPER}} .single-team-item .details .designation',
				'condition' => array(
					'style_select' => 'style-1',
				),
			)
		);
		$this->add_control(
			'member_designation_one_color',
			array(
				'label'     => __( 'Member Designation Color', 'cs-element-bucket' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'style_select' => 'style-2',
				),
				'selectors' => array(
					'{{WRAPPER}} .single-team-member .designation' => 'color: {{VALUE}}',
				),
				'separator' => 'before',
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'      => 'member_designation_one_typography',
				'label'     => __( 'Member Designation Typography', 'cs-element-bucket' ),
				'selector'  => '{{WRAPPER}} .single-team-member .designation',
				'condition' => array(
					'style_select' => 'style-2',
				),
			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'styling_section_five',
			array(
				'label' => __( 'Card Settings', 'cs-element-bucket' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'card_padding',
			array(
				'label'      => esc_html__( 'Card Padding', 'cs-element-bucket' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'default'    => array(
					'unit'     => 'px',
					'isLinked' => false,
				),
				'selectors'  => array(
					'{{WRAPPER}} .single-team-member' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$style    = $settings['style_select'];
		?>
		<?php
		if ( 'style-1' === $style ) :
			?>
			<div class="single-team-item ">
				<div class="thumb">
					<img class="profile-image" src="<?php echo esc_url( $settings['profile']['url'] ); ?>" alt="img">
					<?php if ( 'yes' === $settings['show_social_link'] ) : ?>
						<ul class="social-item">
							<li>
							<?php
							\Elementor\Icons_Manager::render_icon(
								$settings['social_btn_icon'],
								array(
									'aria-hidden' => 'true',
									'fill'        => 'currentColor',
								)
							);
							?>
								</li>
							<?php foreach ( $settings['Social_icon'] as $icon ) : ?>
								<li><a href="<?php echo esc_url( $icon['social_link']['url'] ); ?>">
														<?php
														\Elementor\Icons_Manager::render_icon(
															$icon['icon'],
															array(
																'aria-hidden' => 'true',
																'fill'        => 'currentColor',
															)
														);
														?>
														</a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif ?>
				</div>
				<div class="details">
					<h4 class="name"><a href="<?php echo esc_url( $settings['profile_link']['url'] ); ?>"><?php echo esc_html( $settings['member_name'] ); ?></a></h4>
					<span class="designation"><?php echo esc_html( $settings['designation'] ); ?></span>
				</div>
			</div>
		<?php else : ?>
			<div class="team-member-wrapper">
				<?php if ( $settings['profile']['url'] ) : ?>
					<div class="single-team-member">
						<?php if ( $settings['profile']['url'] ) : ?>
							<div class="thumb-wrap">
								<img class="thumb" src="<?php echo esc_url( $settings['profile']['url'] ); ?>" alt="Team">
							</div>
						<?php endif; ?>
						<?php if ( $settings['member_name'] ) : ?>
							<h3 class="name"><a href="<?php echo esc_url( $settings['profile_link']['url'] ); ?>"><?php echo esc_html( $settings['member_name'] ); ?></a></h3>
						<?php endif; ?>
						<?php if ( $settings['designation'] ) : ?>
							<p class="designation"><?php echo esc_html( $settings['designation'] ); ?></p>
						<?php endif; ?>
						<?php if ( $settings['Social_icon'] ) : ?>
							<ul class="social-wrap">
								<?php foreach ( $settings['Social_icon'] as $icon ) : ?>
									<li class="social-list social-icon">
										<a class="social-link" href="<?php echo esc_url( $icon['social_link']['url'] ); ?>" target="_blank">
											<?php
											\Elementor\Icons_Manager::render_icon(
												$icon['icon'],
												array(
													'aria-hidden' => 'true',
													'fill' => '',
													'width' => 35,
												)
											);
											?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php
	}
}
