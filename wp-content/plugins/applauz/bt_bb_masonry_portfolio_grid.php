<?php
class bt_bb_masonry_portfolio_grid extends BT_BB_Element {

	function __construct() {
		parent::__construct();
		add_action( 'wp_ajax_bt_bb_get_grid_portfolio', array( __CLASS__, 'bt_bb_get_grid_portfolio_callback' ) );
		add_action( 'wp_ajax_nopriv_bt_bb_get_grid_portfolio', array( __CLASS__, 'bt_bb_get_grid_portfolio_callback' ) );
	}

	static function bt_bb_get_grid_portfolio_callback() {
		// $cat_slug_arr = explode( ',', sanitize_text_field( $_POST['category'] ) );
		bt_bb_masonry_portfolio_grid::dump_grid( intval( $_POST['number'] ), sanitize_text_field( $_POST['category'] ), $_POST['show'] );
		die();
	}
	
	static function dump_grid( $number, $category, $show ) {

		$show = unserialize( urldecode( $show ) );

		$output = '';
		
		$cat_slug_arr = explode( ',', $category );
		$posts = bt_bb_get_posts( $number, 0, $cat_slug_arr, 'portfolio' );

		foreach( $posts as $item ) {
			$post_thumbnail_id = get_post_thumbnail_id( $item['ID'] ); 
			$img = wp_get_attachment_image_src( $post_thumbnail_id, 'large' );
			$img_src = $img[0];
			$hw = 0;
			if ( $img_src != '' ) {
				$hw = $img[2] / $img[1];
			}
			$output .= '<div class="bt_bb_grid_item" data-hw="' . $hw . '" data-src="' . $img_src . '">';
				$output .= '<div class="bt_bb_grid_item_post_thumbnail"><a href="' . $item['permalink'] . '" title="' . $item['title'] . '"></a></div>';
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
									$meta_output .= __( 'by', 'bold-builder' ) . ' ' . $item['author'];
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

					$output .= '<h5 class="bt_bb_grid_item_post_title"><a href="' . $item['permalink'] . '" title="' . $item['title'] . '">' . $item['title'] . '</a></h5>';

					if ( $show['excerpt'] ) {
						$output .= '<div class="bt_bb_grid_item_post_excerpt">' . $item['excerpt'] . '</div>';
					}

					if ( $show['share'] ) {
						$output .= '<div class="bt_bb_grid_item_post_share">' . $item['share'] . '</div>';
					}
				$output .= '</div>';
			$output .= '</div>';
		}
		
		echo $output;
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
			'bt_bb_post_grid',
			plugin_dir_url( __FILE__ ) . 'bt_bb_post_grid.js',
			array( 'jquery' )
		);
		
		wp_localize_script( 'bt_bb_post_grid', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

		$class = array( $this->shortcode, 'bt_bb_masonry_post_grid', 'bt_bb_grid_container' );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}	

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . $el_id . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . $el_style . '"';
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

		$category = preg_replace( '/\s+/', '', $category );
		
		if ( $category_filter == 'yes' ) {
			$cat_arr = get_terms( 'portfolio_category' );
			$cats = array();
			$cat_list = '';
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
			foreach ( $cats as $cat ) {
				$cat_list .= $cat->slug . ',';
			}
			$cat_list = rtrim( $cat_list, ',' );
			$output .= '<div class="bt_bb_post_grid_filter">';
				$output .= '<span class="bt_bb_post_grid_filter_item active" data-category="' . $cat_list  . '">' . __( 'All', 'bold-builder' ) . '</span>';
				foreach ( $cats as $cat ) {
					$output .= '<span class="bt_bb_post_grid_filter_item" data-category="' . $cat->slug . '">' . $cat->name . '</span>';
				}
			$output .= '</div>';
		}
		
		$output .= '<div class="bt_bb_post_grid_loader"></div>';

		$output .= '<div class="bt_bb_masonry_post_grid_content bt_bb_grid_hide" data-number="' . $number . '" data-category="' . $category . '" data-post-type="portfolio" data-show="' . urlencode( serialize( $show ) ) . '"><div class="bt_bb_grid_sizer"></div></div>';

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . ' data-columns="' . $columns . '">' . $output . '</div>';

		return $output;

	}

	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => __( 'Masonry Portfolio Grid', 'bold-builder' ), 'description' => __( 'Masonry grid with portfolio posts', 'bold-builder' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'number', 'type' => 'textfield', 'heading' => __( 'Number of items', 'bold-builder' ), 'description' => __( 'Enter number of items or leave empty to show all (up to 1000)', 'bold-builder' ), 'preview' => true ),
				array( 'param_name' => 'columns', 'type' => 'dropdown', 'heading' => __( 'Columns', 'bold-builder' ), 'preview' => true,
					'value' => array(
						__( '1', 'bold-builder' ) => '1',
						__( '2', 'bold-builder' ) => '2',
						__( '3', 'bold-builder' ) => '3',
						__( '4', 'bold-builder' ) => '4',
						__( '5', 'bold-builder' ) => '5',
						__( '6', 'bold-builder' ) => '6'
					)
				),
				array( 'param_name' => 'gap', 'type' => 'dropdown', 'heading' => __( 'Gap', 'bold-builder' ),
					'value' => array(
						__( 'No gap', 'bold-builder' ) => 'no_gap',
						__( 'Small', 'bold-builder' ) => 'small',
						__( 'Normal', 'bold-builder' ) => 'normal',
						__( 'Large', 'bold-builder' ) => 'large'
					)
				),
				array( 'param_name' => 'category', 'type' => 'textfield', 'heading' => __( 'Category', 'bold-builder' ), 'description' => __( 'Enter category slug or leave empty to show all', 'bold-builder' ), 'preview' => true ),
				array( 'param_name' => 'category_filter', 'type' => 'dropdown', 'heading' => __( 'Category filter', 'bold-builder' ),
					'value' => array(
						__( 'No', 'bold-builder' ) => 'no',
						__( 'Yes', 'bold-builder' ) => 'yes'
					)
				),
				array( 'param_name' => 'show_category', 'type' => 'checkbox', 'value' => array( __( 'Yes', 'bold-builder' ) => 'show_category' ), 'heading' => __( 'Show category', 'bold-builder' ), 'preview' => true
				),
				array( 'param_name' => 'show_date', 'type' => 'checkbox', 'value' => array( __( 'Yes', 'bold-builder' ) => 'show_date' ), 'heading' => __( 'Show date', 'bold-builder' ), 'preview' => true
				),
				array( 'param_name' => 'show_author', 'type' => 'checkbox', 'value' => array( __( 'Yes', 'bold-builder' ) => 'show_author' ), 'heading' => __( 'Show author', 'bold-builder' ), 'preview' => true
				),
				array( 'param_name' => 'show_comments', 'type' => 'checkbox', 'value' => array( __( 'Yes', 'bold-builder' ) => 'show_comments' ), 'heading' => __( 'Show number of comments', 'bold-builder' ), 'preview' => true
				),
				array( 'param_name' => 'show_excerpt', 'type' => 'checkbox', 'value' => array( __( 'Yes', 'bold-builder' ) => 'show_excerpt' ), 'heading' => __( 'Show excerpt', 'bold-builder' ), 'preview' => true
				),
				array( 'param_name' => 'show_share', 'type' => 'checkbox', 'value' => array( __( 'Yes', 'bold-builder' ) => 'show_share' ), 'heading' => __( 'Show share icons', 'bold-builder' ), 'preview' => true 
				)
			)
		) );
	} 
}