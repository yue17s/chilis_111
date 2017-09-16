<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'weblog-options', array(
    'priority'       => 210,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Theme Options', 'weblog' ),
    'description'    => __( 'Customize your awesome site with theme options ', 'weblog' )
) );

/*
* file for header breadcrumb options
*/
$weblog_customizer_options_breadcrumb_file_path = weblog_file_directory('acmethemes/customizer/options/breadcrumb.php');
require $weblog_customizer_options_breadcrumb_file_path;

/*
* file for header search options
*/
$weblog_customizer_options_search_file_path = weblog_file_directory('acmethemes/customizer/options/search.php');
require $weblog_customizer_options_search_file_path;

/*
* file for pagination
*/
$weblog_customizer_options_pagination_file_path = weblog_file_directory('acmethemes/customizer/options/pagination.php');
require $weblog_customizer_options_pagination_file_path;