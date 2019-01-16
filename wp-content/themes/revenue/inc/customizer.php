<?php
/**
 * revenue Theme Customizer.
 *
 * @package revenue
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function revenue_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->remove_section('title_tagline');
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('header_image');
	//$wp_customize->remove_section('background_image');
	//$wp_customize->remove_section('nav');
	$wp_customize->remove_section('static_front_page');	
	//$wp_customize->remove_panel("widgets");	

}
add_action( 'customize_register', 'revenue_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function revenue_customize_preview_js() {
	wp_enqueue_script( 'revenue_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'revenue_customize_preview_js' );

function reset_mytheme_options() { 
    remove_theme_mods();
}
add_action( 'after_switch_theme', 'reset_mytheme_options' );