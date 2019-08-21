<?php

class bt_bb_masonry_portfolio_grid extends BT_BB_Element {

	function __construct() {
		parent::__construct();
		add_action( 'wp_ajax_bt_bb_get_grid_portfolio', array( __CLASS__, 'bt_bb_get_grid_portfolio_callback' ) );
		add_action( 'wp_ajax_nopriv_bt_bb_get_grid_portfolio', array( __CLASS__, 'bt_bb_get_grid_portfolio_callback' ) );
	}

	static function bt_bb_get_grid_portfolio_callback() {
		check_ajax_referer( 'bt-bb-portfolio-grid-nonce', 'bt-nonce' );	
		bt_bb_masonry_portfolio_grid::dump_grid( intval( $_POST['number'] ), sanitize_text_field( $_POST['category'] ), $_POST['show'] );
		die();
	}
	
	static function dump_grid( $number, $category, $show ) {

		$show = unserialize( urldecode( $show ) );

		$cat_slug_arr = array();
		if ( $category != '' ) {
			$cat_slug_arr = explode( ',', $category );
			$posts = bt_bb_get_posts( $number, 0, $cat_slug_arr, 'portfolio' );	
		}else{
			$posts = bt_bb_get_posts( $number, 0, '', 'portfolio' );	
		}

		$output = '';	

		foreach( $posts as $item ) {
			$post_thumbnail_id = get_post_thumbnail_id( $item['ID'] ); 
			$img = wp_get_attachment_image_src( $post_thumbnail_id, 'large' );
			$img_src = $img[0];
			$hw = 0;
			if ( $img_src != '' ) {
				$hw = $img[2] / $img[1];
			}

				$output = '<div class="bt_bb_grid_item_post_thumbnail"><a href="' . esc_attr( $item['permalink'] ) . '" title="' . esc_attr( $item['title'] ) . '"></a></div>';
				$output .= '<div class="bt_bb_grid_item_post_content">';

					if ( $show['category'] ) {
						$output .= '<div class="bt_bb_grid_item_category">';
							$output .= $item['category_list'];
						$output .= '</div>';
					}

					if ( $show['date'] || $show['author'] || $show['comments'] ) {
				
						$meta_output = '<div class="bt_bb_grid_item_meta">';

							if ( $show['date'] ) {
								$meta_output .= '<span class="bt_bb_grid_item_date">';
									$meta_output .= $item['date'];
								$meta_output .= '</span>';
							}

							if ( $show['author'] ) {
								$meta_output .= '<span class="bt_bb_grid_item_item_author">';
									$meta_output .= esc_html__( 'by', 'applauz' ) . ' ' . $item['author'];
								$meta_output .= '</span>';
							}

							if ( $show['comments'] && $item['comments'] != '' ) {
								$meta_output .= '<span class="bt_bb_grid_item_item_comments">';
									$meta_output .= $item['comments'];
								$meta_output .= '</span>';
							}
				
						$meta_output .= '</div>';
		
						$output .= $meta_output;
		
					}

					$output .= '<h5 class="bt_bb_grid_item_post_title"><a href="' . esc_attr( $item['permalink'] ) . '" title="' . esc_attr( $item['title'] ) . '">' . $item['title'] . '</a></h5>';

					if ( $show['excerpt'] ) {
						$output .= '<div class="bt_bb_grid_item_post_excerpt">' . $item['excerpt'] . '</div>';
					}

					if ( $show['share'] ) {
						$output .= '<div class="bt_bb_grid_item_post_share">' . $item['share'] . '</div>';
					}

				$output .= '</div></div>';
				
			echo '<div class="bt_bb_grid_item" data-hw="' . esc_attr( $hw ) . '" data-src="' . esc_attr( $img_src ) . '"><div class="bt_bb_grid_item_inner">' . $output . '</div>';
		}
		
	}

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'number'          => '',
			'columns'         => '',
			'gap'             => '',
			'category'        => '',
			'category_filter' => '',
			'show_category'   => '',
			'show_date'       => '',
			'show_author'     => '',
			'show_comments'   => '',
			'show_excerpt'    => '',
			'show_share'      => ''
		) ), $atts, $this->shortcode ) );

		wp_enqueue_script( 'jquery-masonry' );

		wp_enqueue_script( 
			'bt_bb_portfolio_grid',
			get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_masonry_portfolio_grid/bt_bb_portfolio_grid.js',
			array( 'jquery' )
		);
		
		wp_localize_script( 'bt_bb_portfolio_grid', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

		wp_enqueue_style( 
			'bt_bb_portfolio_grid', 
			get_template_directory_uri() . '/bold-page-builder/content_elements_misc/css/bt_bb_portfolio_grid.css', 
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

		$show = array( 'category' => false, 'date' => false, 'author' => false, 'comments' => false, 'excerpt' => false, 'share' => false );
		if ( $show_category == 'show_category' ) {
			$show['category'] = true;
		}
		if ( $show_date == 'show_date' ) {
			$show['date'] = true;
		}
		if ( $show_author == 'show_author' ) {
			$show['author'] = true;
		}
		if ( $show_comments == 'show_comments' ) {
			$show['comments'] = true;
		}
		if ( $show_excerpt == 'show_excerpt' ) {
			$show['excerpt'] = true;
		}
		if ( $show_share == 'show_share' ) {
			$show['share'] = true;
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
				$output .= '<span class="bt_bb_post_grid_filter_item active" data-category-portfolio="" data-post-type="portfolio">' . esc_html__( 'All', 'applauz' ) . '</span>';
				foreach ( $cats as $cat ) {
					$output .= '<span class="bt_bb_post_grid_filter_item" data-category-portfolio="' . esc_attr( $cat->slug ) . '" data-post-type="portfolio">' . $cat->name . '</span>';
				}
			$output .= '</div>';
		}

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		$output .= '<div class="bt_bb_post_grid_loader"></div>';

		$output .= '<div class="bt_bb_masonry_portfolio_grid_content bt_bb_grid_hide" data-bt-nonce="' . esc_attr( wp_create_nonce( 'bt-bb-portfolio-grid-nonce' ) ) . '" data-number-portfolio="' . esc_attr( $number ) . '" data-category-portfolio="' . esc_attr( $category ) . '" data-post-type="portfolio" data-show-portfolio="' . urlencode( serialize( $show ) ) . '"><div class="bt_bb_grid_sizer"></div></div>';

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . ' data-columns="' . esc_attr( $columns ). '">' . $output . '</div>';
		
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;
	}

	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Masonry Portfolio Grid', 'applauz' ), 'description' => esc_html__( 'Masonry portfolio grid', 'applauz' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
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

				array( 'param_name' => 'show_category', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'applauz' ) => 'show_category' ), 'heading' => esc_html__( 'Show category', 'applauz' ), 'preview' => true
				),
				array( 'param_name' => 'show_date', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'applauz' ) => 'show_date' ), 'heading' => esc_html__( 'Show date', 'applauz' ), 'preview' => true
				),
				array( 'param_name' => 'show_author', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'applauz' ) => 'show_author' ), 'heading' => esc_html__( 'Show author', 'applauz' ), 'preview' => true
				),
				array( 'param_name' => 'show_comments', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'applauz' ) => 'show_comments' ), 'heading' => esc_html__( 'Show number of comments', 'applauz' ), 'preview' => true
				),
				array( 'param_name' => 'show_excerpt', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'applauz' ) => 'show_excerpt' ), 'heading' => esc_html__( 'Show excerpt', 'applauz' ), 'preview' => true
				),
				array( 'param_name' => 'show_share', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'applauz' ) => 'show_share' ), 'heading' => esc_html__( 'Show share icons', 'applauz' ), 'preview' => true 
				)
			)
		) );
	} 
}