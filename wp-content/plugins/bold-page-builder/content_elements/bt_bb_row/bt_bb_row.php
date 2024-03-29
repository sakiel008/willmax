<?php

class bt_bb_row extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {

		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'column_gap'  => ''
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = 'id="' . esc_attr( $el_id ) . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = 'style="' . esc_attr( $el_style ) . '"';
		}

		if ( $column_gap != '' ) {
			$class[] = $this->prefix . 'column_gap' . '_' . $column_gap;
		}

		$style_attr = apply_filters( $this->shortcode . '_style_attr', $style_attr, $atts );

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		$class_attr = implode( ' ', $class );

		$output = '<div ' . $id_attr . ' class="' . esc_attr( $class_attr ) . '" ' . $style_attr . '>';
			$output .= do_shortcode( $content );
		$output .= '</div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Row', 'bold-builder' ), 'description' => esc_html__( 'Row element', 'bold-builder' ), 'container' => 'horizontal', 'accept' => array( 'bt_bb_column' => true ), 'toggle' => true, 'auto_add' => 'bt_bb_column', 'show_settings_on_create' => false,
			'params' => array(
				array( 'param_name' => 'column_gap', 'type' => 'dropdown', 'heading' => esc_html__( 'Column gap', 'bold-builder' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Default', 'bold-builder' ) => '',
						esc_html__( '0px', 'bold-builder' ) => '0',
						esc_html__( 'Extra small', 'bold-builder' ) => 'extra_small',
						esc_html__( 'Small', 'bold-builder' ) => 'small',		
						esc_html__( 'Normal', 'bold-builder' ) => 'normal',
						esc_html__( 'Medium', 'bold-builder' ) => 'medium',
						esc_html__( 'Large', 'bold-builder' ) => 'large',
						esc_html__( '5px', 'bold-builder' ) => '5',
						esc_html__( '10px', 'bold-builder' ) => '10',
						esc_html__( '15px', 'bold-builder' ) => '15',
						esc_html__( '20px', 'bold-builder' ) => '20',
						esc_html__( '25px', 'bold-builder' ) => '25',
						esc_html__( '30px', 'bold-builder' ) => '30',
						esc_html__( '35px', 'bold-builder' ) => '35',
						esc_html__( '40px', 'bold-builder' ) => '40',
						esc_html__( '45px', 'bold-builder' ) => '45',
						esc_html__( '50px', 'bold-builder' ) => '50',
						esc_html__( '60px', 'bold-builder' ) => '60',
						esc_html__( '70px', 'bold-builder' ) => '70',
						esc_html__( '80px', 'bold-builder' ) => '80',
						esc_html__( '90px', 'bold-builder' ) => '90',
						esc_html__( '100px', 'bold-builder' ) => '100'
					)
				),				
			)
		) );
	} 

}