<?php
/**
 * Weblog Theme Customizer.
 *
 * @package Acme Themes
 * @subpackage Weblog
 */

/*
* file for customizer core functions
*/
$weblog_custom_controls_file_path = weblog_file_directory('acmethemes/customizer/customizer-core.php');
require $weblog_custom_controls_file_path;

/*
* file for customizer sanitization functions
*/
$weblog_sanitize_functions_file_path = weblog_file_directory('acmethemes/customizer/sanitize-functions.php');
require $weblog_sanitize_functions_file_path;

/**
 * Adding different options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function weblog_customize_register( $wp_customize ) {

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    /*saved options*/
    $options  = weblog_get_theme_options();

    /*defaults options*/
    $defaults = weblog_get_default_theme_options();

    /*
    * file for customizer custom controls classes
    */
    $weblog_custom_controls_file_path = weblog_file_directory('acmethemes/customizer/custom-controls.php');
    require $weblog_custom_controls_file_path;

    /*
     * file for feature panel of home page
     */
    $weblog_customizer_feature_option_file_path = weblog_file_directory('acmethemes/customizer/feature-section/feature-panel.php');
    require $weblog_customizer_feature_option_file_path;

    /*
    * file for header panel
    */
    $weblog_customizer_header_options_file_path = weblog_file_directory('acmethemes/customizer/header-options/header-panel.php');
    require $weblog_customizer_header_options_file_path;

    /*
    * file for customizer footer section
    */
    $weblog_customizer_footer_options_file_path = weblog_file_directory('acmethemes/customizer/footer-section/footer-section.php');
    require $weblog_customizer_footer_options_file_path;

    /*
    * file for design/layout panel
    */
    $weblog_customizer_design_options_file_path = weblog_file_directory('acmethemes/customizer/design-options/design-panel.php');
    require $weblog_customizer_design_options_file_path;

    /*
    * file for single post sections
    */
    $weblog_customizer_single_post_section_file_path = weblog_file_directory('acmethemes/customizer/single-posts/single-post-section.php');
    require $weblog_customizer_single_post_section_file_path;

    /*
     * file for options panel
     */
    $weblog_customizer_options_panel_file_path = weblog_file_directory('acmethemes/customizer/options/options-panel.php');
    require $weblog_customizer_options_panel_file_path;

    /*
    * file for options reset
    */
    $weblog_customizer_options_reset_file_path = weblog_file_directory('acmethemes/customizer/options/options-reset.php');
    require $weblog_customizer_options_reset_file_path;

    /*removing*/
    $wp_customize->remove_panel('header_image');
    $wp_customize->remove_control('header_textcolor');
}
add_action( 'customize_register', 'weblog_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function weblog_customize_preview_js() {
    wp_enqueue_script( 'weblog-customizer', get_template_directory_uri() . '/acmethemes/core/js/customizer.js', array( 'customize-preview' ), '1.1.0', true );
}
add_action( 'customize_preview_init', 'weblog_customize_preview_js' );

/**
 * Theme Update Script
 *
 * For backward compatibility
 */
function weblog_update_check() {

    global $wp_version;
    // Return if wp version less than 4.5
    if ( version_compare( $wp_version, '4.5', '<' ) ) {
        return;
    }
    $weblog_saved_theme_options = weblog_get_theme_options();
    $site_logo = '';
    if( isset( $weblog_saved_theme_options['weblog-header-logo'] )){
        $site_logo = esc_url( $weblog_saved_theme_options['weblog-header-logo'] );
    }
    if ( empty( $site_logo ) ) {
        return;
    }
    /*converting url into attachment ID*/
    $logo = attachment_url_to_postid( $site_logo );
    if ( is_int( $logo ) ) {
        set_theme_mod( 'custom_logo', attachment_url_to_postid( $site_logo ) );
        $weblog_saved_theme_options['weblog-header-logo'] = '';
        set_theme_mod( 'weblog_theme_options', $weblog_saved_theme_options );
    }

}
add_action( 'after_setup_theme', 'weblog_update_check' );

