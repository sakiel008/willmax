<?php

BoldThemes_Customize_Default::$data['body_font'] = 'Roboto';
BoldThemes_Customize_Default::$data['heading_supertitle_font'] = 'Roboto';
BoldThemes_Customize_Default::$data['heading_font'] = 'Raleway';
BoldThemes_Customize_Default::$data['heading_subtitle_font'] = 'Roboto';
BoldThemes_Customize_Default::$data['menu_font'] = 'Raleway';

BoldThemes_Customize_Default::$data['accent_color'] = '#53ba00';
BoldThemes_Customize_Default::$data['alternate_color'] = '#a6e72a';
BoldThemes_Customize_Default::$data['logo_height'] = '100';

BoldThemes_Customize_Default::$data['template_skin'] = 'light';
BoldThemes_Customize_Default::$data['heading_style'] = 'default';

// OVERLAY LINES

BoldThemes_Customize_Default::$data['heading_style'] = 'default';

if ( ! function_exists( 'boldthemes_customize_heading_style' ) ) {
	function boldthemes_customize_heading_style( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[heading_style]', array(
			'default'           => BoldThemes_Customize_Default::$data['heading_style'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control( 'heading_style', array(
			'label'     => esc_html__( 'Heading Style', 'applauz' ),
			'section'   => BoldThemesFramework::$pfx . '_typography_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[heading_style]',
			'priority'  => 95,
			'type'      => 'select',
			'choices'   => array(
				'default' => esc_html__( 'Default', 'applauz' ),
				'compact' => esc_html__( 'Compact (small line height + bold)', 'applauz' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_heading_style' );


// FIXED FOOTER

BoldThemes_Customize_Default::$data['fixed_footer'] = 'default';

if ( ! function_exists( 'boldthemes_customize_fixed_footer' ) ) {
	function boldthemes_customize_fixed_footer( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[fixed_footer]', array(
			'default'           => BoldThemes_Customize_Default::$data['fixed_footer'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'fixed_footer', array(
			'label'    => esc_html__( 'Use Fixed Footer', 'applauz' ),
			'section'  => BoldThemesFramework::$pfx . '_header_footer_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[fixed_footer]',
			'priority' => 80,
			'type'     => 'checkbox'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_fixed_footer' );