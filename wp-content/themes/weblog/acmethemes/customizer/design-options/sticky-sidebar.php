<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'weblog-design-sidebar-sticky-option', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Sticky Sidebar Option', 'weblog' ),
    'panel'          => 'weblog-design-panel'
) );

/*Sticky sidebar enable disable*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-enable-sticky-sidebar]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-enable-sticky-sidebar'],
    'sanitize_callback' => 'weblog_sanitize_checkbox'
) );
$wp_customize->add_control( 'weblog_theme_options[weblog-enable-sticky-sidebar]', array(
    'label'		=> __( 'Enable Sticky Sidebar Loader', 'weblog' ),
    'section'   => 'weblog-design-sidebar-sticky-option',
    'settings'  => 'weblog_theme_options[weblog-enable-sticky-sidebar]',
    'type'	  	=> 'checkbox',
    'priority'  => 30
) );