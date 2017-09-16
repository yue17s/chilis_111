<?php
/* adding sections for default layout options*/
$wp_customize->add_section( 'weblog-design-default-layout-option', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Default Layout', 'weblog' ),
    'panel'          => 'weblog-design-panel'
) );

/*global default layout*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-default-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-default-layout'],
    'sanitize_callback' => 'weblog_sanitize_select'
) );

$choices = weblog_default_layout();
$wp_customize->add_control( 'weblog_theme_options[weblog-default-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Default Layout', 'weblog' ),
    'section'   => 'weblog-design-default-layout-option',
    'settings'  => 'weblog_theme_options[weblog-default-layout]',
    'type'	  	=> 'select'
) );