<?php

class bt_bb_masonry_portfolio_tiles extends BT_BB_Element {

	function __construct() {
		parent::__construct();
		add_action( 'wp_ajax_bt_bb_get_tiles_portfolio', array( __CLASS__, 'bt_bb_get_tiles_portfolio_callback' ) );
		add_action( 'wp_ajax_nopriv_bt_bb_get_tiles_portfolio', array( __CLASS__, 'bt_bb_get_tiles_portfolio_callback' ) );
	}

	static function bt_bb_get_tiles_portfolio_callback() {	
		check_ajax_referer( 'bt-bb-masonry-portfolio-tiles-nonce', 'bt-nonce' );		
		bt_bb_masonry_portfolio_tiles::dump_grid( intval( $_POST['number'] ), sanitize_text_field( $_POST['category'] ), $_POST['show'], sanitize_text_field( $_POST['format'] ) );
		die();
	}

	static function dump_grid( $number, $category, $show, $format ) {

		$show = unserialize( urldecode( $show ) );

		$output = '';
		$output .= '<div class="bt_bb_grid_sizer"></div>';

		$cat_slug_arr = array();
		if ( $category != '' ) {
			$cat_slug_arr = explode( ',', $category );
			$masonry_tiles_portfolios = bt_bb_get_posts( $number, 0, $cat_slug_arr, 'portfolio' );	
		}else{
			$masonry_tiles_portfolios = bt_bb_get_posts( $number, 0, '', 'portfolio' );	
		}

		$format_arr = array();
		if ( $format != '' ) {
			$format_arr = explode( ',', $format );
		}	
		
		$n = 0;
		foreach( $masonry_tiles_portfolios as $item ) {
			
			$id = get_post_thumbnail_id( $item['ID'] );
			$img = wp_get_attachment_image_src( $id, 'boldthemes_medium_square' );

			if ( isset( $format_arr[ $n ] ) ) {
				switch ( $format_arr[ $n ] ){
					case '11': 
						$img = wp_get_attachment_image_src( $id, 'boldthemes_small_square' );
						break;
					case '21': 
						$img = wp_get_attachment_image_src( $id, 'boldthemes_large_rectangle' );
						break;
					case '12': 
						$img = wp_get_attachment_image_src( $id, 'boldthemes_large_vertical_rectangle' );
						break;
					case '22': 
						$img = wp_get_attachment_image_src( $id, 'boldthemes_medium_square' );
						break;
					default: 
						$img = wp_get_attachment_image_src( $id, 'boldthemes_medium_square' );
						break;
				}
			}

			$img_src = $img[0];

			$hw = 0;
			if ( $img_src != '' ) {
				$hw = $img[2] / $img[1];
			}

			$img_full = wp_get_attachment_image_src( $id, 'full' );

			$tile_format = 'bt_bb_tile_format_11';			
			$img_src_full = $img_full[0];
			if ( isset( $format_arr[ $n ] ) ) {
				$tile_format = 'bt_bb_tile_format';
				if ( $format_arr[ $n ] == '21' || $format_arr[ $n ] == '12' || $format_arr[ $n ] == '22' ) {
					$tile_format .= "_" . $format_arr[ $n ];
				} else {
					$tile_format .= '11';
				}
			}

			$output .= '<div class="bt_bb_grid_item ' . $tile_format . '" data-hw="' . esc_attr(  $hw  ) . '" data-src="' . esc_attr( $img_src ) . '" data-src-full="' . esc_attr( $img_src_full ) . '" data-title="' . esc_attr( $item['title'] ) . '">
							<div class="bt_bb_grid_item_inner" data-hw="' . esc_attr( $hw ) . '" >
								<div class="bt_bb_grid_item_post_thumbnail">
									<a href="' . esc_attr( $item['permalink'] ) . '" title="' . esc_attr( $item['title'] ) . '">
										<img class="bt_bb_grid_item_inner_image" src="' . esc_url_raw( $img_src ) . '"/>
									</a>
								</div>
								<div class="bt_bb_grid_item_inner_content">';

								$output .= '<h5 class="bt_bb_grid_item_post_title">' . $item['title'] . '</h5>';
								

								if ( $show['excerpt'] ) {
									$output .= '<div class="bt_bb_grid_item_post_excerpt">' . $item['excerpt'] . '</div>';
								}
								
								$output .= '<div class="bt_bb_button bt_bb_icon_position_left bt_bb_color_scheme_2 bt_bb_style_filled bt_bb_size_small bt_bb_width_inline bt_bb_shape_round bt_bb_align_inherit"><a href="" target="_self" class="bt_bb_link" tabindex="0"><span class="bt_bb_button_text">' . esc_html__( 'Find out more', 'applauz' ) . '</span></a></div>';

					$output .= '</div>';
							if ( $show['title'] ) {
									$output .= '<div class="bt_bb_grid_item_post_title_init"><h5>' . $item['title'] . '</h5></div>';
							}
				$output .= '</div>
			</div>';
			$n++;
		}

		echo '<div><div class="bt_bb_masonry_post_image_content">' . $output . '</div></div>';
		
	}

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'number'          => '',
			'columns'         => '',
			'format'		  => '',
			'gap'             => '',
			'category'        => '',
			'category_filter' => '',			
			'show_excerpt'    => '',
			'show_title'	  => ''
		) ), $atts, $this->shortcode ) );

		wp_enqueue_script( 'jquery-masonry' );

		wp_enqueue_script( 
			'bt_bb_portfolio_tiles',
			get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_masonry_portfolio_tiles/bt_bb_portfolio_tiles.js',
			array( 'jquery' )
		);
		
		wp_localize_script( 'bt_bb_portfolio_tiles', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

		wp_enqueue_style( 
			'bt_bb_portfolio_tiles', 
			get_template_directory_uri() . '/bold-page-builder/content_elements_misc/css/bt_bb_masonry_portfolio_tiles.css', 
			array(), 
			false, 
			'screen' 
		);

		$class = array( $this->shortcode, 'bt_bb_grid_container' );

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

		if ( $columns != '' ) {
			$class[] = $this->prefix . 'columns' . '_' . $columns;
		}
		
		if ( $gap != '' ) {
			$class[] = $this->prefix . 'gap' . '_' . $gap;
		}
		
		if ( $number > 1000 || $number == '' ) {
			$number = 1000;
		} else if ( $number < 1 ) {
			$number = 1;
		}

		$show = array( 'excerpt' => false, 'title' => false );
		if ( $show_excerpt == 'show_excerpt' ) {
			$show['excerpt'] = true;
		}
		if ( $show_title == 'show_title' ) {
			$show['title'] = true;
		}

		$output = '';
		
		if ( $category_filter == 'yes' ) {
			$cat_arr = get_terms( 'portfolio_category' );
			$cats = array();
			if ( $category != '' ) {
				$cat_slug_arr = explode( ',', $category );
				foreach ( $cat_arr as $cat ) {
					if ( in_array( $cat->slug, $cat_slug_arr ) ) {
						$cats[] = $cat;
					}
				}
			} else {
				$cats = $cat_arr;
			}
			$output .= '<div class="bt_bb_post_grid_filter">';
				$output .= '<span class="bt_bb_post_grid_filter_item active" data-category-portfolio="" data-format-portfolio="' . esc_attr( $format ) . '" data-post-type="portfolio">' . esc_html__( 'All', 'applauz' ) . '</span>';
				foreach ( $cats as $cat ) {
					$output .= '<span class=" bt_bb_post_grid_filter_item" data-category-portfolio="' . esc_attr( $cat->slug ) . '"  data-format-portfolio="' . esc_attr( $format ) . '" data-post-type="portfolio">' . $cat->name . '</span>';
				}
			$output .= '</div>';
		}

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		$output .= '<div class="bt_bb_post_grid_loader"></div>';


		$output .= '<div class="bt_bb_masonry_post_grid_content bt_bb_grid_hide" data-bt-nonce="' . esc_attr( wp_create_nonce( 'bt-bb-masonry-portfolio-tiles-nonce' ) ) . '" data-number-portfolio="' . esc_attr( $number ) . '" data-format-portfolio="' . esc_attr( $format ) . '" data-category-portfolio="' . esc_attr( $category ) . '"  data-post-type="portfolio" data-show-portfolio="' . urlencode( serialize( $show ) ) . '"><div class="bt_bb_grid_sizer"></div></div>';

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . ' data-columns="' . esc_attr( $columns ) . '">' . $output . '</div>';

		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;
	}

	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Masonry Portfolio Tiles', 'applauz' ), 'description' => esc_html__( 'Masonry tiles with portfolio', 'applauz' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'number', 'type' => 'textfield', 'heading' => esc_html__( 'Number of items', 'applauz' ), 'description' => esc_html__( 'Enter number of items or leave empty to show all (up to 1000)', 'applauz' ), 'preview' => true ),
				array( 'param_name' => 'columns', 'type' => 'dropdown', 'heading' => esc_html__( 'Columns', 'applauz' ), 'preview' => true,
					'value' => array(
						esc_html__( '1', 'applauz' ) => '1',
						esc_html__( '2', 'applauz' ) => '2',
						esc_html__( '3', 'applauz' ) => '3',
						esc_html__( '4', 'applauz' ) => '4',
						esc_html__( '5', 'applauz' ) => '5',
						esc_html__( '6', 'applauz' ) => '6'
					)
				),
				array( 'param_name' => 'gap', 'type' => 'dropdown', 'heading' => esc_html__( 'Gap', 'applauz' ),
					'value' => array(
						esc_html__( 'No gap', 'applauz' ) => 'no_gap',
						esc_html__( 'Small', 'applauz' ) => 'small',
						esc_html__( 'Normal', 'applauz' ) => 'normal',
						esc_html__( 'Large', 'applauz' ) => 'large'
					)
				),
				array( 'param_name' => 'category', 'type' => 'textfield', 'heading' => esc_html__( 'Category', 'applauz' ), 'description' => esc_html__( 'Enter category slug or leave empty to show all', 'applauz' ), 'preview' => true ),
				array( 'param_name' => 'category_filter', 'type' => 'dropdown', 'heading' => esc_html__( 'Category filter', 'applauz' ),
					'value' => array(
						esc_html__( 'No', 'applauz' ) => 'no',
						esc_html__( 'Yes', 'applauz' ) => 'yes'
					)
				),
				array( 'param_name' => 'format', 'type' => 'textfield', 'preview' => true, 'heading' => esc_html__( 'Tiles format', 'applauz' ), 'description' => esc_html__( 'e.g. 11, 21, 12, 22', 'applauz' ), 'preview' => true
				),				
				array( 'param_name' => 'show_title', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'applauz' ) => 'show_title' ), 'heading' => esc_html__( 'Show title', 'applauz' ), 'preview' => true
				),
				array( 'param_name' => 'show_excerpt', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'applauz' ) => 'show_excerpt' ), 'heading' => esc_html__( 'Show excerpt', 'applauz' ), 'preview' => true
				),
			)
		) );
	} 
}