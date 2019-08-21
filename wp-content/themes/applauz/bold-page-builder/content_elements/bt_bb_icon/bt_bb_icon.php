<?php

class bt_bb_icon extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'icon'         => '',
			'text'         => '',
			'url'          => '',
			'target'       => '',
			'color_scheme' => '',
			'style'        => '',
			'size'         => '',
			'shape'        => '',
			'align'        => ''
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode );

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

		if ( $style != '' ) {
			$class[] = $this->prefix . 'style' . '_' . $style;
		}

		if ( $size != '' ) {
			$class[] = $this->prefix . 'size' . '_' . $size;
		}

		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}
		
		if ( $align != '' ) {
			$class[] = $this->prefix . 'align' . '_' . $align;
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$output = $this->get_html( $icon, $text, $url, $target );

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>' . $output . '</div>';
		
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	static function get_html( $icon, $text = '', $url = '', $target = '' ) {

		$icon_set = substr( $icon, 0, -5 );
		$icon = substr( $icon, -4 );

		if ( substr( $url, 0, 3 ) == 'www' ) {
			$url = 'http://' . $url;
		}

		$link = '';

		if ( $url != '' && $url != '#' && substr( $url, 0, 4 ) != 'http' && substr( $url, 0, 5 ) != 'https' && substr( $url, 0, 6 ) != 'mailto' ) {
			$link = bt_bb_get_permalink_by_slug( $url );
		} else {
			$link = $url;
		}

		if ( $text != '' ) {
			$text = '<span>' . $text . '</span>';
		}

		if ( $link == '' ) {
			$ico_tag = 'span' . ' ';
			$ico_tag_end = 'span';	
		} else {
			$target_attr = 'target="_self"';
			if ( $target != '' ) {
				$target_attr = ' ' . 'target="' . ( $target ) . '"';
			}
			$ico_tag = 'a href="' . esc_url_raw( $link ) . '"' . ' ' . $target_attr;
			$ico_tag_end = 'a';
		}

		return '<' . $ico_tag . ' data-ico-' . esc_attr( $icon_set ) . '="&#x' . esc_attr( $icon ) . ';" class="bt_bb_icon_holder">' . $text . '</' . $ico_tag_end . '>';
	}

	function map_shortcode() {

		if ( function_exists('boldthemes_get_icon_fonts_bb_array') ) {
			$icon_arr = boldthemes_get_icon_fonts_bb_array();
		} else {
			require_once( WP_PLUGIN_DIR . '/bold-page-builder/content_elements_misc/s7_icons.php' );
			require_once( WP_PLUGIN_DIR . '/bold-page-builder/content_elements_misc/fa_icons.php' );
			$icon_arr = array( 'Font Awesome' => bt_bb_fa_icons(), 'S7' => bt_bb_s7_icons() );
		}

		$color_scheme_arr = bt_bb_get_color_scheme_param_array();

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Icon', 'applauz' ), 'description' => esc_html__( 'Single icon with link', 'applauz' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'heading' => esc_html__( 'Icon', 'applauz' ), 'value' => $icon_arr, 'preview' => true ),
				array( 'param_name' => 'text', 'type' => 'textfield', 'heading' => esc_html__( 'Text', 'applauz' ) ),
				array( 'param_name' => 'url', 'type' => 'textfield', 'heading' => esc_html__( 'URL', 'applauz' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'heading' => esc_html__( 'Target', 'applauz' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'applauz' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'applauz' ) => '_blank',
					)
				),
				array( 'param_name' => 'align', 'type' => 'dropdown', 'heading' => esc_html__( 'Alignment', 'applauz' ),
					'value' => array(
						esc_html__( 'Inherit', 'applauz' ) => 'inherit',
						esc_html__( 'Left', 'applauz' ) => 'left',
						esc_html__( 'Right', 'applauz' ) => 'right'
					)
				),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Size', 'applauz' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Small', 'applauz' ) => 'small',
						esc_html__( 'Extra small', 'applauz' ) => 'xsmall',
						esc_html__( 'Normal', 'applauz' ) => 'normal',
						esc_html__( 'Large', 'applauz' ) => 'large',
						esc_html__( 'Extra large', 'applauz' ) => 'xlarge'
					)
				),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'applauz' ), 'value' => $color_scheme_arr, 'preview' => true, 'group' => esc_html__( 'Design', 'applauz' ) ),
				array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Style', 'applauz' ), 'preview' => true, 'group' => esc_html__( 'Design', 'applauz' ),
					'value' => array(
						esc_html__( 'Outline', 'applauz' ) => 'outline',
						esc_html__( 'Filled', 'applauz' ) => 'filled',
						esc_html__( 'Borderless', 'applauz' ) => 'borderless',
						esc_html__( 'Gradient - Filled', 'applauz' ) => 'gradient_filled',
						esc_html__( 'Gradient - Borderless', 'applauz' ) => 'gradient_borderless'
					)
				),
				array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Shape', 'applauz' ), 'group' => esc_html__( 'Design', 'applauz' ),
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