<?php
if(!defined('ABSPATH')){ exit; }

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;

class GVAElement_Cart_Box extends GVAElement_Base {  

	const NAME = 'gva-cart-box';
   const TEMPLATE = 'plugins/cart';
   const CATEGORY = 'tevily_general';

   public function get_name() {
      return self::NAME;
   }

   public function get_categories() {
      return array(self::CATEGORY);
   }

	public function get_title() {
		return __( 'GVA Cart Box', 'tevily-themer' );
	}

	public function get_keywords() {
		return [ 'cart' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => __( 'Icon', 'tevily-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'tevily-themer' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .gsc-cart-box .mini-cart-header .mini-cart .title-cart' => 'color: {{VALUE}}', 
            ],
			]
		);

		$this->add_control(
			'number_color',
			[
				'label' => __( 'Number Color', 'tevily-themer' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .gsc-cart-box .mini-cart-header .mini-cart .mini-cart-items' => 'color: {{VALUE}}', 
            ],
			]
		);
		$this->add_control(
			'number_background',
			[
				'label' => __( 'Number Background', 'tevily-themer' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .gsc-cart-box .mini-cart-header .mini-cart .mini-cart-items' => 'background-color: {{VALUE}}', 
            ],
			]
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
         include $this->get_template(self::TEMPLATE . '.php');
      print '</div>';
	}
}

 $widgets_manager->register(new GVAElement_Cart_Box());