<?php

class bt_bb_section extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {

		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'layout'                => '',
			'full_screen'           => '',
			'vertical_align'        => '',
			'top_spacing'           => '',
			'bottom_spacing'        => '',
			'color_scheme'          => '',
			'background_color'      => '',
			'background_image'      => '',
			'background_overlay'    => '',
			'background_gradient'    => '',
			'background_video_yt'   => '',
			'yt_video_settings'     => '',
			'background_video_mp4'  => '',
			'background_video_ogg'  => '',
			'background_video_webm' => '',
			'parallax'              => '',
			'parallax_offset'       => ''
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode );

		wp_enqueue_script(
			'bt_bb_elements',
			get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_section/bt_bb_elements.js',
			array( 'jquery' ),
			'',
			true
		);

		if ( $top_spacing != '' ) {
			$class[] = $this->prefix . 'top_spacing' . '_' . $top_spacing;
		}

		if ( $bottom_spacing != '' ) {
			$class[] = $this->prefix . 'bottom_spacing' . '_' . $bottom_spacing;
		}

		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}
		
		if ( $background_color != '' ) {
			$el_style = $el_style . ';' . 'background-color:' . $background_color . ';';
		}

		if ( $layout != '' ) {
			$class[] = $this->prefix . 'layout' . '_' . $layout;
		}

		if ( $full_screen == 'yes' ) {
			$class[] = $this->prefix . 'full_screen';
		}

		if ( $vertical_align != '' ) {
			$class[] = $this->prefix . 'vertical_align' . '_' . $vertical_align;
		}

		$data_parallax_attr = '';
		if ( $parallax != '' && ! wp_is_mobile() ) {
			$data_parallax_attr = 'data-parallax="' . esc_attr( $parallax ) . '" data-parallax-offset="' . intval( $parallax_offset ) . '"';
			$class[] = $this->prefix . 'parallax';
		}

		if ( $background_image != '' ) {
			$background_image = wp_get_attachment_image_src( $background_image, 'full' );
			$background_image_url = $background_image[0];
			$background_image_style = 'background-image:url(\'' . $background_image_url . '\');';
			$el_style = $background_image_style . $el_style;	
			$class[] = $this->prefix . 'background_image';
		}

		if ( $background_overlay != '' ) {
			$class[] = $this->prefix . 'background_overlay' . '_' . $background_overlay;
		}
		
		if ( $background_gradient != '' ) {
			$class[] = $this->prefix . 'background_gradient' . '_' . $background_gradient;
		}

		$id_attr = '';
		if ( $el_id == '' ) {
			$el_id = uniqid( 'bt_bb_section' );
		}
		$id_attr = 'id="' . esc_attr( $el_id ) . '"';

		$background_video_attr = '';

		$video_html = '';

		if ( $background_video_yt != '' && ! wp_is_mobile() ) {
			wp_enqueue_style( 'bt_bb_style_yt', get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_section/YTPlayer.css' );
			wp_enqueue_script( 
				'bt_bb_yt',
				get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_section/jquery.mb.YTPlayer.min.js',
				array( 'jquery' ),
				'',
				true
			);

			$class[] = $this->prefix . 'background_video_yt';

			if ( $yt_video_settings == '' ) {
				$yt_video_settings = 'showControls:false,showYTLogo:false,mute:true,stopMovieOnBlur:false,opacity:1';
			}

			$background_video_attr = ' ' . 'data-property="{videoURL:\'' . $background_video_yt . '\',containment:\'self\',' . $yt_video_settings . '}"';
			$proxy = new BT_BB_YT_Video_Proxy( $this->prefix );
			add_action( 'wp_footer', array( $proxy, 'js_init' ) );

		} else if ( ( $background_video_mp4 != '' || $background_video_ogg != '' || $background_video_webm != '' ) && ! wp_is_mobile() ) {
			$class[] = $this->prefix . 'video';
			$video_html = '<video autoplay loop muted onplay="bt_bb_video_callback( this )">';
			if ( $background_video_mp4 != '' ) {
				$video_html .= '<source src="' . esc_attr( $background_video_mp4 ) . '" type="video/mp4">';
			}
			if ( $background_video_ogg != '' ) {
				$video_html .= '<source src="' . esc_attr( $background_video_ogg ) . '" type="video/ogg">';
			}
			if ( $background_video_webm != '' ) {
				$video_html .= '<source src="' . esc_attr( $background_video_webm ) . '" type="video/webm">';
			}
			$video_html .= '</video>';
		}

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		$class_attr = implode( ' ', $class );

		if ( $el_class != '' ) {
			$class_attr = $class_attr . ' ' . $el_class;
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = 'style="' . esc_attr( $el_style ) . '"';
		}

		$output = '<section ' . $id_attr . ' ' . $data_parallax_attr . ' class="' . esc_attr( $class_attr ) . '" ' . $style_attr . $background_video_attr . '>';
		$output .= $video_html;
			$output .= '<div class="' . esc_attr( $this->prefix ) . 'port">';
				$output .= '<div class="' . esc_attr( $this->prefix ) . 'cell">';
					$output .= '<div class="' . esc_attr( $this->prefix ) . 'cell_inner">';
					$output .= wptexturize( do_shortcode( $content ) );
					$output .= '</div>';
				$output .= '</div>';
		$output .= '</div>';

		$output .= '</section>';

		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;
	}

	function map_shortcode() {
		
		$color_scheme_arr = bt_bb_get_color_scheme_param_array();

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Section', 'applauz' ), 'description' => esc_html__( 'Basic root element', 'applauz' ), 'root' => true, 'container' => 'vertical', 'accept' => array( 'bt_bb_row' => true ), 'toggle' => true, 'auto_add' => 'bt_bb_row', 'show_settings_on_create' => false,
			'params' => array( 
				array( 'param_name' => 'layout', 'type' => 'dropdown', 'default' => 'boxed_1200', 'heading' => esc_html__( 'Layout', 'applauz' ), 'group' => esc_html__( 'General', 'applauz' ), 'weight' => 0, 'preview' => true,
					'value' => array(
						esc_html__( 'Boxed (800px)', 'applauz' ) => 'boxed_800',
						esc_html__( 'Boxed (900px)', 'applauz' ) => 'boxed_900',
						esc_html__( 'Boxed (1000px)', 'applauz' ) => 'boxed_1000',
						esc_html__( 'Boxed (1100px)', 'applauz' ) => 'boxed_1100',
						esc_html__( 'Boxed (1200px)', 'applauz' ) => 'boxed_1200',
						esc_html__( 'Boxed (1300px)', 'applauz' ) => 'boxed_1300',
						esc_html__( 'Boxed (1400px)', 'applauz' ) => 'boxed_1400',
						esc_html__( 'Boxed (1500px)', 'applauz' ) => 'boxed_1500',
						esc_html__( 'Boxed (1600px)', 'applauz' ) => 'boxed_1600',
						esc_html__( 'Wide', 'applauz' ) => 'wide'
					)
				),
				array( 'param_name' => 'top_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Top spacing', 'applauz' ), 'preview' => true,
					'value' => array(
						esc_html__( 'No spacing', 'applauz' ) => '',
						esc_html__( 'Extra small', 'applauz' ) => 'extra_small',
						esc_html__( 'Small', 'applauz' ) => 'small',		
						esc_html__( 'Normal', 'applauz' ) => 'normal',
						esc_html__( 'Medium', 'applauz' ) => 'medium',
						esc_html__( 'Large', 'applauz' ) => 'large',
						esc_html__( 'Extra large', 'applauz' ) => 'extra_large'
					)
				),
				array( 'param_name' => 'bottom_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Bottom spacing', 'applauz' ), 'preview' => true,
					'value' => array(
						esc_html__( 'No spacing', 'applauz' ) => '',
						esc_html__( 'Extra small', 'applauz' ) => 'extra_small',
						esc_html__( 'Small', 'applauz' ) => 'small',		
						esc_html__( 'Normal', 'applauz' ) => 'normal',
						esc_html__( 'Medium', 'applauz' ) => 'medium',
						esc_html__( 'Large', 'applauz' ) => 'large',
						esc_html__( 'Extra large', 'applauz' ) => 'extra_large'
					)
				),
				array( 'param_name' => 'full_screen', 'type' => 'dropdown', 'heading' => esc_html__( 'Full screen', 'applauz' ), 
					'value' => array(
						esc_html__( 'No', 'applauz' ) => '',
						esc_html__( 'Yes', 'applauz' ) => 'yes'
					)
				),
				array( 'param_name' => 'vertical_align', 'type' => 'dropdown', 'heading' => esc_html__( 'Vertical align (for fullscreen section)', 'applauz' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Top', 'applauz' )     => 'top',
						esc_html__( 'Middle', 'applauz' )  => 'middle',
						esc_html__( 'Bottom', 'applauz' )  => 'bottom'					
					)
				),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'applauz' ), 'value' => $color_scheme_arr, 'preview' => true, 'group' => esc_html__( 'Design', 'applauz' )  ),
				array( 'param_name' => 'background_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Background color', 'applauz' ), 'group' => esc_html__( 'Design', 'applauz' ), 'preview' => true ),
				array( 'param_name' => 'background_image', 'type' => 'attach_image',  'preview' => true, 'heading' => esc_html__( 'Background image', 'applauz' ), 'group' => esc_html__( 'Design', 'applauz' ) ),
				array( 'param_name' => 'background_overlay', 'type' => 'dropdown', 'heading' => esc_html__( 'Background overlay', 'applauz' ), 'group' => esc_html__( 'Design', 'applauz' ), 
					'value' => array(
						esc_html__( 'No overlay', 'applauz' )    	=> '',
						esc_html__( 'Light stripes', 'applauz' ) 	=> 'light_stripes',
						esc_html__( 'Dark stripes', 'applauz' )  	=> 'dark_stripes',
						esc_html__( 'Light solid', 'applauz' )	  	=> 'light_solid',
						esc_html__( 'Dark solid', 'applauz' )	  	=> 'dark_solid',
						esc_html__( 'Light gradient', 'applauz' )	=> 'light_gradient',
						esc_html__( 'Dark gradient', 'applauz' )	=> 'dark_gradient',
						esc_html__( 'Solid accent - alternate gradient', 'applauz' )	  => 'solid_accent'
					)
				),
				array( 'param_name' => 'parallax', 'type' => 'textfield', 'heading' => esc_html__( 'Parallax (e.g. -.7)', 'applauz' ), 'group' => esc_html__( 'Design', 'applauz' ) ),
				array( 'param_name' => 'parallax_offset', 'type' => 'textfield', 'heading' => esc_html__( 'Parallax offset in px (e.g. -100)', 'applauz' ), 'group' => esc_html__( 'Design', 'applauz' ) ),
				array( 'param_name' => 'background_video_yt', 'type' => 'textfield', 'heading' => esc_html__( 'YouTube background video', 'applauz' ), 'group' => esc_html__( 'Video', 'applauz' ) ),
				array( 'param_name' => 'yt_video_settings', 'type' => 'textfield', 'heading' => esc_html__( 'Video settings (e.g. startAt:20, mute:true, stopMovieOnBlur:false)', 'applauz' ), 'group' => esc_html__( 'Video', 'applauz' ) ),
				array( 'param_name' => 'background_video_mp4', 'type' => 'textfield', 'heading' => esc_html__( 'MP4 background video', 'applauz' ), 'group' => esc_html__( 'Video', 'applauz' ) ),
				array( 'param_name' => 'background_video_ogg', 'type' => 'textfield', 'heading' => esc_html__( 'OGG background video', 'applauz' ), 'group' => esc_html__( 'Video', 'applauz' ) ),
				array( 'param_name' => 'background_video_webm', 'type' => 'textfield', 'heading' => esc_html__( 'WEBM background video', 'applauz' ), 'group' => esc_html__( 'Video', 'applauz' ) )
			)
		) );		

	} 

}


class BT_BB_YT_Video_Proxy {
	function __construct( $prefix ) {
		$this->prefix = $prefix;
	}
	public function js_init() { 
		wp_register_script( 'bt-set-video-bg-script', '' );
		wp_enqueue_script( 'bt-set-video-bg-script' );
		wp_add_inline_script( 'bt-set-video-bg-script', 'jQuery( ".bt_bb_background_video_yt" ).YTPlayer();', 20 );
	}
}