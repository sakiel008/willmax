<?php 
/*
Plugin Name: JC REcaptcha
Plugin URI: http://webdesignjc.com/recaptchawp/index.html
Description: The Add new recaptcha google plugin allows you to implement a super security REcaptcha form into web forms.
Version: 1.4
Author: Julio Cesar LLavilla Ccama
Autor URI: http://webdesignjc.com/
License: GPL2
*/

add_action( 'loop_start', 'jc_login_status' );

function jc_login_status() {
	if (get_option('is_user_logged') !== "" and is_user_logged_in()) {
	}else{
		if(get_option('comment_form') !== ""){add_action( 'comment_form', 'reCAPTCHA_add' );}				
		if(get_option('cf7_form') !== ""){add_filter('wpcf7_form_elements', 'mifuncion_wpcf7_form_elements');}
	}
}
if(get_option('ninja_form') !== ""){add_action( 'init', 'jc_ninja_form_fields' );}
if(get_option('login_form') !== ""){add_action( 'login_form', 'reCAPTCHA_add' ); }
if(get_option('register_form') !== ""){add_action( 'register_form', 'reCAPTCHA_add' );}
// create custom plugin settings menu
add_action('admin_menu', 'jc_baw_create_menu');
add_action( 'login_enqueue_scripts', 'jc_scripts_method' );
add_action( 'wp_enqueue_scripts', 'jc_scripts_method' );
add_action( 'admin_enqueue_scripts', 'jc_scripts_method' );
/*
if(get_option('comment_form') !== ""){add_action( 'comment_form', 'reCAPTCHA_add' );}				
if(get_option('login_form') !== ""){add_action( 'login_form', 'reCAPTCHA_add' ); }
if(get_option('register_form') !== ""){add_action( 'register_form', 'reCAPTCHA_add' );}
if(get_option('ninja_form') !== ""){add_action( 'ninja_form', 'jcrecaptchacont' );}
if(get_option('ninja_form') !== ""){add_action( 'init', 'jc_ninja_form_fields' );}
if(get_option('cf7_form') !== ""){add_filter('wpcf7_form_elements', 'mifuncion_wpcf7_form_elements');}
*/
function jc_baw_create_menu() {
	//create new top-level menu
	add_menu_page('RECAPTCHA Plugin Settings', 'RECAPTCHA  Settings', 'administrator', __FILE__, 'jc_recatcha_settings_page',plugins_url('/images/icon.png', __FILE__));
	//call register settings function
	add_action( 'admin_init', 'jc_register_mysettings_re' );
}
function jc_register_mysettings_re() {
	//register our settings
	register_setting( 'jc-settings-re', 'public-key' );
	register_setting( 'jc-settings-re', 'private-key' );
	//register our settings
	register_setting( 'jc-settings-re', 'comment_form' );
	register_setting( 'jc-settings-re', 'login_form' );
	register_setting( 'jc-settings-re', 'register_form' );
	register_setting( 'jc-settings-re', 'ninja_form' );
	register_setting( 'jc-settings-re', 'cf7_form' );
	register_setting( 'jc-settings-re', 'is_user_logged' );
}
if ( ! function_exists( 'reCAPTCHA_add' ) ) {
	function reCAPTCHA_add() {
		$id=  esc_attr( get_option("public-key") );
		echo '<div class="g-recaptcha jc" data-sitekey="'.$id.'"></div>';
	}
}
function jc_scripts_method() {	
	wp_enqueue_script( 'jcscriptsapi', 'https://www.google.com/recaptcha/api.js');
	wp_enqueue_script( 'jcscriptsRecaptcha', plugins_url( '/js/jcscript.js', __FILE__ ),array( 'jquery' ) );
}
?>
<?php require_once dirname(__FILE__).'/inc/options.php'; ?>
<?php require_once dirname(__FILE__).'/inc/recaptcha-ninja-cf7.php'; ?>



