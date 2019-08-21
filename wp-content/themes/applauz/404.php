<?php 

get_header(); ?>

		<section class="bt_bb_section btErrorPage gutter bt_bb_background_overlay_solid_accent bt_bb_layout_wide">
			<div class="bt_bb_port">
				<div class="bt_bb_cell">
					<div class="bt_bb_cell_inner">
						<div class="bt_bb_row">
							<div class="bt_bb_column col-md-6 col-sm-12 bt_bb_align_right bt_bb_vertical_align_bottom bt_bb_padding_double bt_bb_animation_fade_in move_right animate" data-width="6">
								<div class="bt_bb_column_content">
									<div class="bt_bb_image bt_bb_shape_square bt_bb_align_inherit">
										<img src="<?php echo esc_url_raw( get_template_directory_uri() . '/gfx/plug.png' ) ;?>" >
										<div class="bt_bb_separator bt_bb_bottom_spacing_medium bt_bb_border_style_none bt_bb_hidden_md bt_bb_hidden_lg"></div>
									</div>
								</div>
							</div>
							<div class="bt_bb_column col-md-6 col-sm-12 bt_bb_align_left bt_bb_vertical_align_bottom bt_bb_padding_double bt_bb_animation_fade_in move_left animate" data-width="6">
								<div class="bt_bb_column_content">
									<?php echo boldthemes_get_heading_html( 
										array ( 
											'superheadline' => esc_html__( 'We are sorry, page not found.', 'applauz' ), 
											'headline' => esc_html__( 'Error 404.', 'applauz' ),
											'subheadline' => '<a href="' . home_url() . '">' . esc_html__( 'Back to homepage', 'applauz' ) . '</a>',
											'size' => 'huge',
											'dash' => 'top'
											) 
										)
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

<?php get_footer();