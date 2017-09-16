<?php
/*adding header options panel*/
$wp_customize->add_panel( 'weblog-header-panel', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Header Options', 'weblog' ),
    'description'    => __( 'Customize your awesome site header ', 'weblog' )
) );

/*
* file for header logo options
*/
$weblog_customizer_header_logo_file_path = weblog_file_directory('acmethemes/customizer/header-options/header-logo.php');
require $weblog_customizer_header_logo_file_path;

/*
* file for header date options
*/
$weblog_customizer_header_date_file_path = weblog_file_directory('acmethemes/customizer/header-options/header-date.php');
require $weblog_customizer_header_date_file_path;

/*
* file for header social options
*/
$weblog_customizer_header_social_file_path = weblog_file_directory('acmethemes/customizer/header-options/social-options.php');
require $weblog_customizer_header_social_file_path;

/*
* file for header menu options
*/
$weblog_customizer_header_menu_option_file_path = weblog_file_directory('acmethemes/customizer/header-options/menu-option.php');
require $weblog_customizer_header_menu_option_file_path;

/*
* file for header menu options
*/
$weblog_customizer_header_search_option_file_path = weblog_file_directory('acmethemes/customizer/header-options/search-option.php');
require $weblog_customizer_header_search_option_file_path;


