<?php
/*adding feature options panel*/
$wp_customize->add_panel( 'weblog-feature-panel', array(
    'priority'       => 70,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Featured Section Options', 'weblog' ),
    'description'    => __( 'Customize your awesome site feature section ', 'weblog' )
) );

/*
* file for feature section enable
*/
$weblog_customizer_feature_enable_file_path = weblog_file_directory('acmethemes/customizer/feature-section/feature-enable.php');
require $weblog_customizer_feature_enable_file_path;

/*
* file for feature slider category
*/
$weblog_customizer_feature_category_file_path = weblog_file_directory('acmethemes/customizer/feature-section/feature-category.php');
require $weblog_customizer_feature_category_file_path;