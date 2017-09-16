<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'weblog-front-page-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Front/Home Sidebar Layout', 'weblog' ),
    'panel'          => 'weblog-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-front-page-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-front-page-sidebar-layout'],
    'sanitize_callback' => 'weblog_sanitize_select'
) );
$choices = weblog_sidebar_layout();
$wp_customize->add_control( 'weblog_theme_options[weblog-front-page-sidebar-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Front/Home Sidebar Layout', 'weblog' ),
    'section'   => 'weblog-front-page-sidebar-layout',
    'settings'  => 'weblog_theme_options[weblog-front-page-sidebar-layout]',
    'type'	  	=> 'select'
) );