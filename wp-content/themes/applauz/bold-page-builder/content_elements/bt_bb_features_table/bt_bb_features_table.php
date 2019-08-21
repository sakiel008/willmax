<?php

class bt_bb_features_table extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'title'        => '',		
			'table'        => '',
			'color_scheme' => ''
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
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		$output = '<div class="' . esc_attr( $this->shortcode . '_title' ) . '">' . $title . '</div>';
		
		$output = "";
		
		$title_arr = explode(";", $title);
		
		$table_start = '<table>';
		$output .= $table_start;

		if ( !empty($title_arr) ){
			$title = '<thead><tr>';
			foreach ( $title_arr as $text ) {
				$title .= '<th>' . $text . '</th>';
			}
			$title .= '</tr></thead><tbody>';
			$output .= $title;
		}
		
		$table = str_replace("\n", ";#", $table);
		
		$table = str_replace("&", "amp", $table);
		
		if ( strpos($table, 'ampamp;') !== false ) {
			$table = str_replace("ampamp;", "*a*m*p*", $table);
		}
		
		$table_arr = explode(";", $table);

		if ( !empty($table_arr) ) { 
			$table_content = '<tr>';
			foreach ( $table_arr as $text ) {
				if (substr( $text, 0, 1 ) === "#") {
					$table_content .= '</tr><tr>';
					$text = substr($text, strlen("#"));
				}
				
				$text = str_replace("*a*m*p*", "&amp;", $text);
				
				//echo '<pre>'; print_r($text); echo '</pre>';exit;
				
				if ( strpos($text, '*a*m*p*') !== false ) {
					$text = str_replace("*a*m*p*", "&amp;", $text);
				}
				
				if ( trim($text) == "*yes*" || trim($text) == "*no*" ) {
					if ( trim($text) == "*yes*" )
					{
						$table_content .= '<td><span class="bt_bb_features_table_yes"></span></td>';
					}
					else
					{
						$table_content .= '<td><span class="bt_bb_features_table_no"></span></td>';
					}
				}
				else {
					$table_content .= '<td>' . $text . '</td>';
				}
			}
			$table_content .= '</tr></tbody></table>';
			
			$output .= $table_content;
		}

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>' . $output . '</div>';
		
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );


		return $output;

	}

	function map_shortcode() {
		
		$color_scheme_arr = bt_bb_get_color_scheme_param_array();			
		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Features Table', 'applauz' ), 'description' => esc_html__( 'Table that describes the fetures', 'applauz' ), 'icon' => 'bt_bb_icon_bt_bb_price_list',
			'params' => array(
				array( 'param_name' => 'title', 'type' => 'textarea', 'heading' => esc_html__( 'Table header', 'applauz' ) ),
				array( 'param_name' => 'table', 'type' => 'textarea', 'heading' => esc_html__( 'Table', 'applauz' ) ),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'applauz' ), 'value' => $color_scheme_arr, 'preview' => true ),			
			)
		) );
	}
}