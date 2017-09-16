<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'weblog-design-sidebar-layout-option', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Default Singe Page/Post Sidebar Layout', 'weblog' ),
    'panel'          => 'weblog-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-sidebar-layout'],
    'sanitize_callback' => 'weblog_sanitize_select'
) );
$choices = weblog_sidebar_layout();
$wp_customize->add_control( 'weblog_theme_options[weblog-sidebar-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Default Sidebar Layout', 'weblog' ),
    'section'   => 'weblog-design-sidebar-layout-option',
    'settings'  => 'weblog_theme_options[weblog-sidebar-layout]',
    'type'	  	=> 'select'
) );