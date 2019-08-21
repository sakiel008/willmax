<?php

class bt_bb_price_list extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'icon'         => '',
			'title'        => '',
			'subtitle'     => '',
			'currency'     => '',
			'price'        => '',			
			'items'        => '',
			'color_scheme' => '',
			'align'        => '',
			'size'         => '',
			'style'        => '',
			'shape'        => ''
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode );
		
		$icon_class = array( 'bt_bb_icon' );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}
		
		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}		

		if ( $align != '' ) {
			$icon_class[] = $this->prefix . 'align' . '_' . $align;
		}
		
		if ( $style != '' ) {
			$icon_class[] = $this->prefix . 'style' . '_' . $style;
		}

		if ( $size != '' ) {
			$icon_class[] = $this->prefix . 'size' . '_' . $size;
		}

		if ( $shape != '' ) {
			$icon_class[] = $this->prefix . 'shape' . '_' . $shape;
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		$output = '';
		
		if ( strpos($icon, "&#x;") === FALSE && $icon != "")
		{
			$icon_shortcode = do_shortcode( '[bt_bb_icon icon="' . esc_attr( $icon  ) . '" size="' . esc_attr( $size ) . '" style="' . esc_attr( $style ) . '" shape="' . esc_attr( $shape ) . '" ]' );
			$output .= $icon_shortcode;
		}
		
		$output .= '<div class="' . esc_attr( $this->shortcode . '_title_subtitle_price' ) . '">';
		$output .= '<div class="' . esc_attr( $this->shortcode . '_price' ) . '"><span class="' . esc_attr( $this->shortcode . '_currency' ) . '">' . $currency . '</span><span class="' . esc_attr( $this->shortcode . '_amount' ) . '">' . $price . '</span></div>';
		$output .= '<div class="' . esc_attr( $this->shortcode . '_title_subtitle' ) . '">';
		$output .= '<div class="' . esc_attr( $this->shortcode . '_title' ) . '">' . $title . '</div>';
		$output .= '<div class="' . esc_attr( $this->shortcode . '_subtitle' ) . '">' . $subtitle . '</div>';
		$output .= '</div>';
		$output .= '</div>';

		$items_arr = preg_split( '/$\R?^/m', $items );

		$items = '<ul>';
			foreach ( $items_arr as $item ) {
				$items .= '<li>' . $item . '</li>';
			}
		$items .= '</ul>';
		
		$output .= $items;

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>' . $output . '</div>';

		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;
	}

	function map_shortcode() {
		
		if ( function_exists('boldthemes_get_icon_fonts_bb_array') ) {
			$icon_arr = boldthemes_get_icon_fonts_bb_array();
		} else {
			$icon_arr = array();
		}
			
		$color_scheme_arr = bt_bb_get_color_scheme_param_array();			
		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Price List', 'applauz' ), 'description' => esc_html__( 'List of items with total price', 'applauz' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'heading' => esc_html__( 'Icon', 'applauz' ), 'value' => $icon_arr, 'preview' => true ),
				array( 'param_name' => 'title', 'type' => 'textfield', 'heading' => esc_html__( 'Title', 'applauz' ), 'preview' => true ),
				array( 'param_name' => 'subtitle', 'type' => 'textfield', 'heading' => esc_html__( 'Subtitle', 'applauz' ) ),
				array( 'param_name' => 'currency', 'type' => 'textfield', 'heading' => esc_html__( 'Currency', 'applauz' ) ),
				array( 'param_name' => 'price', 'type' => 'textfield', 'heading' => esc_html__( 'Price', 'applauz' ) ),				
				array( 'param_name' => 'items', 'type' => 'textarea', 'heading' => esc_html__( 'Items', 'applauz' ) ),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'applauz' ), 'value' => $color_scheme_arr, 'preview' => true ),
				
				array( 'param_name' => 'align', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon alignment', 'applauz' ), 'preview' => true, 'group' => esc_html__( 'Design', 'applauz' ),
					'value' => array(
						esc_html__( 'Inherit', 'applauz' ) => 'inherit',
						esc_html__( 'Left', 'applauz' ) => 'left',
						esc_html__( 'Right', 'applauz' ) => 'right'
					)
				),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon size', 'applauz' ), 'preview' => true, 'group' => esc_html__( 'Design', 'applauz' ),
					'value' => array(
						esc_html__( 'Small', 'applauz' ) => 'small',
						esc_html__( 'Extra small', 'applauz' ) => 'xsmall',
						esc_html__( 'Normal', 'applauz' ) => 'normal',
						esc_html__( 'Large', 'applauz' ) => 'large',
						esc_html__( 'Extra large', 'applauz' ) => 'xlarge'
					)
				),
				array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon style', 'applauz' ), 'preview' => true, 'group' => esc_html__( 'Design', 'applauz' ),
					'value' => array(
						esc_html__( 'Outline', 'applauz' ) => 'outline',
						esc_html__( 'Filled', 'applauz' ) => 'filled',
						esc_html__( 'Borderless', 'applauz' ) => 'borderless',
						esc_html__( 'Gradient - Filled', 'applauz' ) => 'gradient_filled',
						esc_html__( 'Gradient - Borderless', 'applauz' ) => 'gradient_borderless'
					)
				),
				array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon shape', 'applauz' ), 'group' => esc_html__( 'Design', 'applauz' ),
					'value' => array(
						esc_html__( 'Circle', 'applauz' ) => 'circle',
						esc_html__( 'Square', 'applauz' ) => 'square',
						esc_html__( 'Rounded Square', 'applauz' ) => 'round'
					)
				)
			)
		) );
	}
}