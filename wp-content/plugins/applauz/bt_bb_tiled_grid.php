<?php

class bt_bb_tiled_grid extends BT_BB_Element {

	function __construct() {
		parent::__construct();
		add_action( 'wp_ajax_bt_bb_tiled_grid', array( __CLASS__, 'bt_bb_tiled_grid_callback' ) );
		add_action( 'wp_ajax_nopriv_bt_bb_tiled_grid', array( __CLASS__, 'bt_bb_tiled_grid_callback' ) );
	}

	static function bt_bb_tiled_grid_callback() {
		bt_bb_tiled_grid::dump_grid( intval( $_POST['number'] ), sanitize_text_field( $_POST['cat_slug'] ), $_POST['format'], $_POST['tiles_title'], $_POST['post_type'] );
		die();
	}
	
	static function dump_grid( $number, $category, $format, $tiles_title, $post_type ) {

		$output = '';

		$cat_slug_arr = explode( ',', $category );
		$posts = bt_bb_get_posts( $number, 0, $cat_slug_arr, $post_type );

		if( $tiles_title == 'yes' || $tiles_title == 'true' || $tiles_title == 1 ) {
			$tiles_title = true;
		} else {
			$tiles_title = false;
		}
		
		$new_arr = array();
		
		$format_arr = explode( ',', $format );
		
		$i = 0;
		foreach( $posts as $post ) {
		
			$item = '';
			
			$img_size = 'boldthemes_medium_square';
			
			if ( isset( $format_arr[ $i ] ) ) {
				if ( $format_arr[ $i ] == '21' ) {
					$tile_format = '21';
					$img_size = 'boldthemes_large_rectangle';
				} else if (  $format_arr[ $i ] == '12' ) {
					$tile_format = '12';
					$img_size = 'boldthemes_large_vertical_rectangle';
				} else if (  $format_arr[ $i ] == '22' ) {
					$tile_format = '22';
					$img_size = 'boldthemes_large_square';
				} else {
					$tile_format = '11';
					$img_size = 'boldthemes_medium_square';
				}
			} else {
				$tile_format = '11';
			}
			
			if ( $grid_type  == 'classic' ) {
				$img_size = 'boldthemes_medium';
			}
			
			// post formats
			
			$img_src = '';
			$post_thumbnail_id = get_post_thumbnail_id( $post['ID'] );
			
			$hw = '';
			
			if ( $post_thumbnail_id != '' ) {
				$img = wp_get_attachment_image_src( $post_thumbnail_id, $img_size );
				$img_src = $img[0];
				if ( $grid_type == 'classic' && $img[1] != '' ) $hw = $img[2] / $img[1];
			}
			
			if ( $grid_type == 'classic' ) {
				
				/*ob_start();
				require 'bt_single_grid_post_template.php';
				$item .= ob_get_clean();*/

			} else {

				$new_arr[ $i ]['container_class'] = 'gridItem bt' . $tile_format;
			
				ob_start();
				require 'bt_single_tiles_post_template.php';
				$item .= ob_get_clean();				
			}
			
			$new_arr[ $i ]['html'] = $item;
			$new_arr[ $i ]['hw'] = $hw;
			$i++;			
			
		}

		echo json_encode( $new_arr );
	}

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'number'          => '',
			'columns'         => '',
			'category'        => '',
			'category_filter' => '',
			'related'         => '',
			'grid_type'       => '',
			'grid_gap'        => '',
			'format'          => '',
			'tiles_title'     => '',
			'post_type'       => '',
			'scroll_loading'  => '',
			'sticky_in_grid'  => ''
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode, 'btGridContainer' );

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
		
		if ( $number > 1000 || $number == '' ) {
			$number = 1000;
		} else if ( $number < 1 ) {
			$number = 1;
		}
		
		$col = 4;
		if ( $columns != '' ) $col = $columns;
		
		$grid_type = 'tiled'; // <---

		if ( $grid_type != 'classic' ) $grid_type = 'tiled';
		$class[] = $grid_type;

		if ( $grid_gap != '' ) $class[] = 'btGridGap-' . $grid_gap;

		if ( $tiles_title == 'yes' ) $class[] = 'btHasTitles';
		
		if ( $post_type != 'portfolio' ) $post_type = 'post';
		
		if ( $scroll_loading != 'yes' ) {
			$scroll_loading = 'no';
		}
		
		wp_enqueue_script( 
			'boldthemes_imagesloaded',
			plugin_dir_url( __FILE__ ) . 'imagesloaded.pkgd.min.js',
			array( 'jquery' ),
			'',
			true
		);
		
		wp_enqueue_script( 
			'boldthemes_packery',
			plugin_dir_url( __FILE__ ) . 'packery.pkgd.min.js',
			array( 'jquery' ),
			'',
			true
		);
		
		wp_enqueue_script( 
			'boldthemes_grid_tweak',
			plugin_dir_url( __FILE__ ) . 'bt_grid_tweak.js',
			array( 'jquery' ),
			'',
			true
		);		
		
		wp_enqueue_script( 
			'boldthemes_grid',
			plugin_dir_url( __FILE__ ) . 'bt_grid.js',
			array( 'jquery' ),
			'',
			true
		);
		
		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>';
		if ( $category_filter == 'yes' ) {
			$cat_arr = explode( ',', str_replace( ' ', '', $category ) );
			if ( $post_type == 'post' ) {
				$cats = get_categories();
			} else {
				$cats = get_categories( array( 'type' => 'portfolio', 'taxonomy' => 'portfolio_category' ) );
			}
			$output .= '<div class="btCatFilter">';
			//$output .= '<span class="btCatFilterTitle"><b>' . __( 'Category filter:', 'bt_plugin' ) . '</b></span>';
			$final_cat_arr = array();
			$output_filer_items = '';
			foreach ( $cats as $cat ) {
				if ( in_array( $cat->slug, $cat_arr ) || count( $cat_arr ) == 1 ) {
					$output_filer_items .= '<span class="btCatFilterItem" data-slug="' . $cat->slug . '"><b>' . $cat->name . '</b></span>';
					$final_cat_arr[] = $cat->slug;
				}
			}
			$output .= '<span class="btCatFilterItem all" data-slug="' . implode( ',', $final_cat_arr ) . '"><b>' . __( 'All', 'bt_plugin' ) . '</b></span>';
			$output .= $output_filer_items;
			$output .= '</div>';
		}
		$output .= '<div class="tilesWall btAjaxGrid ' . $grid_type . '" data-num="' . $number . '" data-tiles-title="' . $tiles_title . '" data-grid-type="' . $grid_type . '" data-post-type="' . $post_type . '" data-col="' . $col . '" data-cat-slug="' . $category . '" data-scroll-loading="' . $scroll_loading . '" data-format="' . $format . '" data-related="' . $related . '" data-sticky="' . $sticky_in_grid . '">';
		$output .= '<div class="gridSizer"></div>';
		$output .= '</div>';
		//$output .= '<div class="btLoader btLoaderGrid"></div><div class="btNoMore btTextCenter topSmallSpaced bottomSmallSpaced">' . esc_html( __( 'No more posts', 'bt_plugin' ) ) . '</div>';
		$output .= '<div class="btLoader btLoaderGrid"></div>';
		$output .= '</div>';
		
		return $output;

	}

	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => __( 'Tiled Grid', 'bold-builder' ), 'description' => __( 'Grid with tiled posts', 'bold-builder' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'number', 'type' => 'textfield', 'heading' => __( 'Number of items', 'bt_plugin' ), 'description' => __( 'Enter number of items or leave empty to show all (up to 1000)', 'bt_plugin' ), 'preview' => true ),
				array( 'param_name' => 'columns', 'type' => 'dropdown', 'heading' => __( 'Columns', 'bt_plugin' ), 'preview' => true,
					'value' => array(
						__( '3', 'bt_plugin' ) => '3',
						__( '4', 'bt_plugin' ) => '4',
						__( '5', 'bt_plugin' ) => '5',
						__( '6', 'bt_plugin' ) => '6'
				) ),
				array( 'param_name' => 'category', 'type' => 'textfield', 'heading' => __( 'Category slug', 'bt_plugin' ), 'preview' => true ),
				array( 'param_name' => 'category_filter', 'type' => 'dropdown', 'heading' => __( 'Category filter', 'bt_plugin' ),
					'value' => array(
						__( 'No', 'bt_plugin' ) => 'no',
						__( 'Yes', 'bt_plugin' ) => 'yes'
				) ),
				/*array( 'param_name' => 'grid_type', 'type' => 'dropdown', 'heading' => __( 'Grid Type', 'bt_plugin' ), 'preview' => true,
					'value' => array(
						__( 'Classic', 'bt_plugin' ) => 'classic',
						__( 'Tiled', 'bt_plugin' ) => 'tiled'
				) ),*/
				array( 'param_name' => 'grid_gap', 'type' => 'dropdown', 'heading' => __( 'Grid gap', 'bt_plugin' ), 'preview' => true,
					'value' => array(
						__( 'No gap', 'bold-builder' ) => 'no_gap',
						__( 'Small', 'bold-builder' ) => 'small',
						__( 'Normal', 'bold-builder' ) => 'normal',
						__( 'Large', 'bold-builder' ) => 'large'
					) ),
				array( 'param_name' => 'format', 'type' => 'textfield', 'heading' => __( 'Tile format', 'bt_plugin' ) ),				
				array( 'param_name' => 'tiles_title', 'type' => 'dropdown', 'heading' => __( 'Show titles initially', 'bt_plugin' ),
					'value' => array(
						__( 'No', 'bt_plugin' ) => 'no',
						__( 'Yes', 'bt_plugin' ) => 'yes'
				) ),				
				array( 'param_name' => 'post_type', 'type' => 'dropdown', 'heading' => __( 'Post type', 'bt_plugin' ), 'preview' => true,
					'value' => array(
						__( 'Blog', 'bt_plugin' ) => 'blog',
						__( 'Portfolio', 'bt_plugin' ) => 'portfolio'
				) ),
				/*array( 'param_name' => 'scroll_loading', 'type' => 'dropdown', 'heading' => __( 'Scroll Loading', 'bt_plugin' ), 'preview' => true,
					'value' => array(
						__( 'No', 'bt_plugin' ) => 'no',
						__( 'Yes', 'bt_plugin' ) => 'yes'
				) ),*/
				/*array( 'param_name' => 'sticky_in_grid', 'type' => 'dropdown', 'heading' => __( 'Show Sticky Posts', 'bt_plugin' ),
					'value' => array(
						__( 'No', 'bt_plugin' ) => 'no',
						__( 'Yes', 'bt_plugin' ) => 'yes'
				) )*/
			)
		) );
	} 
}