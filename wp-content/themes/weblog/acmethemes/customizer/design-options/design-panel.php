<?php
/*
 * adding theme options panel
 * */
$wp_customize->add_panel( 'weblog-design-panel', array(
    'priority'       => 90,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Layout/Design Option', 'weblog' )
) );

/*
* file for default layout
*/
$weblog_customizer_default_layout_file_path = weblog_file_directory('acmethemes/customizer/design-options/default-layout.php');
require $weblog_customizer_default_layout_file_path;

/*
* file for sidebar layout
*/
$weblog_customizer_sidebar_layout_file_path = weblog_file_directory('acmethemes/customizer/design-options/sidebar-layout.php');
require $weblog_customizer_sidebar_layout_file_path;

/*
* file for front page sidebar layout options
*/
$weblog_customizer_front_page_sidebar_layout_file_path = weblog_file_directory('acmethemes/customizer/design-options/front-page-sidebar-layout.php');
require $weblog_customizer_front_page_sidebar_layout_file_path;

/*
* file for front archive sidebar layout options
*/
require weblog_file_directory('acmethemes/customizer/design-options/archive-sidebar-layout.php');

/*
* file for sticky sidebar
*/
require_once weblog_file_directory('acmethemes/customizer/design-options/sticky-sidebar.php');

/*
* file for blog layout
*/
$weblog_customizer_blog_layout_file_path = weblog_file_directory('acmethemes/customizer/design-options/blog-layout.php');
require $weblog_customizer_blog_layout_file_path;

/*
* file for color options
*/
$weblog_customizer_colors_options_file_path = weblog_file_directory('acmethemes/customizer/design-options/colors-options.php');
require $weblog_customizer_colors_options_file_path;

/*
* file for background image layout
*/
$weblog_customizer_background_image_file_path = weblog_file_directory('acmethemes/customizer/design-options/background-image.php');
require $weblog_customizer_background_image_file_path;

/*
* file for custom css
*/
$weblog_customizer_custom_css_file_path = weblog_file_directory('acmethemes/customizer/design-options/custom-css.php');
require $weblog_customizer_custom_css_file_path;
