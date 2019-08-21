<?php
/**
 * Default headline size
 */
if ( ! function_exists( 'boldthemes_header_headline_size' ) ) {
	function boldthemes_header_headline_size( $size ) {
		return 'medium';
	}
}
add_filter( 'boldthemes_header_headline_size', 'boldthemes_header_headline_size' );

/**
 * Default header dash
 */
if ( ! function_exists( 'boldthemes_header_headline_dash' ) ) {
	function boldthemes_header_headline_dash() {
		return "bottom"; 
	}
}
add_filter( 'boldthemes_header_headline_dash', 'boldthemes_header_headline_dash' );
if ( ! function_exists( 'boldthemes_header_headline' ) ) {
	function boldthemes_header_headline( $arg = array() ) {
		
		$extra_class = 'btPageHeadline';
		
		$dash  = '';
		$use_dash = boldthemes_get_option( 'sidebar_use_dash' );
		if ( $use_dash ) $dash  = apply_filters( 'boldthemes_header_headline_dash', 'top' );
		$title = is_front_page() ? get_bloginfo( 'description' ) : wp_title( '', false );
		
		if ( BoldThemesFramework::$page_for_header_id != '' ) {
			$feat_image = wp_get_attachment_url( get_post_thumbnail_id( BoldThemesFramework::$page_for_header_id ) );
			
			$excerpt = boldthemes_get_the_excerpt( BoldThemesFramework::$page_for_header_id );
			
			if ( ! $feat_image ) {
				if ( is_singular() &&  !is_singular( "product" ) ) {
					$feat_image = wp_get_attachment_url( get_post_thumbnail_id() );
				} else {
					$feat_image = false;
				}
			}
		} else {
			if ( is_singular() ) {
				$feat_image = wp_get_attachment_url( get_post_thumbnail_id() );
			} else {
				$feat_image = false;
			}
			$excerpt = boldthemes_get_the_excerpt( get_the_ID() );
		}
		
		$parallax = isset( $arg['parallax'] ) ? $arg['parallax'] : '0.8';
		$parallax_class = 'bt_bb_parallax';
		if ( wp_is_mobile() ) {
			$parallax = 0;
			$parallax_class = '';
		}
		
		$supertitle = '';
		$subtitle = $excerpt;
		
		$breadcrumbs = isset( $arg['breadcrumbs'] ) ? $arg['breadcrumbs'] : true;
		
		if ( $breadcrumbs ) {
			$heading_args = boldthemes_breadcrumbs( false, $title, $subtitle );
			$supertitle = $heading_args['supertitle'];
			$title = $heading_args['title'];
			$subtitle = $heading_args['subtitle'];
		}		
		
		if ( $title != '' || $supertitle != '' || $subtitle != '' ) {
			$extra_class .= $feat_image ? ' bt_bb_background_image bt_bb_background_overlay_light_solid ' . $parallax_class . ' btLightSkin ' : ' ';
			
			echo '<section class="bt_bb_section gutter bt_bb_vertical_align_top ' . esc_attr( $extra_class ) . '" style="background-image:url(' . esc_url_raw( $feat_image ) . ')" data-parallax="' . esc_attr( $parallax ) . '" data-parallax-offset="0">';
				echo '<div class="bt_bb_port port">';
					echo '<div class="bt_bb_cell">';
						echo '<div class="bt_bb_cell_inner">';
							echo '<div class = "bt_bb_row">';
								echo '<div class="bt_bb_column">';
									echo '<div class="bt_bb_column_content">';
										echo boldthemes_get_heading_html( 
											array(
												'superheadline' => $supertitle,
												'headline' => $title,
												'subheadline' => $subtitle,
												'html_tag' => "h1",
												'size' => apply_filters( 'boldthemes_header_headline_size', 'extra_large' ),
												'dash' => $dash,
												'el_style' => '',
												'el_class' => ''
											)
										);
										echo '</div><!-- /rowItemContent -->' ;
									echo '</div><!-- /rowItem -->';
							echo '</div><!-- /boldRow -->';
						echo '</div><!-- boldCellInner -->';	
					echo '</div><!-- boldCell -->';			
				echo '</div><!-- port -->';
			echo '</section>';
		}
		
	}
}

/**
 * WooCommerce share small icons
 */

add_filter( 'boldthemes_shop_share_settings', 'boldthemes_shop_share_settings_function' );
if ( ! function_exists( 'boldthemes_shop_share_settings_function' ) ) {
	function boldthemes_shop_share_settings_function( $extra_class ) {		
		return array( 'xsmall', 'filled', 'circle' );
	}
}

/**
 * WooCommerce related products
 */

if ( ! function_exists( 'boldthemes_related_products_args' ) ) {
	function boldthemes_related_products_args( $args ) {
		$args['posts_per_page'] = 3; // n related products
		$args['columns'] = 3; // arranged in n columns
		return $args;
	}
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );

if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
	function woocommerce_output_upsells() {
	    woocommerce_upsell_display( 3,3 ); // Display 3 products in rows of 3
	}
}