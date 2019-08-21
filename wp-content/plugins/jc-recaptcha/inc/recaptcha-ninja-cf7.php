<?php 
function jc_ninja_form_fields() {
	$argsjc = array(
		'name' => __( 'JCreCAPTCHA', 'ninja-forms' ),
		'edit_function' => '',
		'display_function' => 'jcrecaptchacont',
		'group' => 'standard_fields',
		'edit_label' => true,
		'edit_label_pos' => true,
		'edit_req' => false,
		'edit_custom_class' => false,
		'edit_help' => true,
		'edit_meta' => false,
		'sidebar' => 'template_fields',
		'display_label' => true,
		'edit_conditional' => false,
		'conditional' => array(
			'value' => array(
				'type' => 'text',
				),
			),
		'pre_process' => '',
		'process_field' => false,
		'limit' => 1,
		'edit_options' => array(
			),
		'req' => true,
		);
	
	if( function_exists( 'ninja_forms_register_field' ) )
	{
		ninja_forms_register_field('user_jc', $argsjc);
	}
}

if( function_exists( 'ninja_forms_register_field' ) )
{
	add_action('init','jc_ninja_form_fields' );
}

function jcrecaptchacont( $field_id, $data, $form_id = '' ){
	$id=  esc_attr( get_option("public-key") );
	echo '<div class="g-recaptcha jc" data-sitekey="'.$id.'"></div>';
}
function mifuncion_wpcf7_form_elements($form){
	$form = do_shortcode($form);
	$id=  esc_attr( get_option("public-key") );
	echo '<div class="g-recaptcha jc wp7" data-sitekey="'.$id.'"></div>';
	return $form;
}
?>