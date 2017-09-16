<?php
/*customizing default colors section and adding new controls-setting too */
$wp_customize->add_section( 'colors', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Colors', 'weblog' ),
    'panel'          => 'weblog-design-panel'
) );
/*Primary color*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-primary-color]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-primary-color'],
    'sanitize_callback' => 'sanitize_hex_color'
) );
$wp_customize->add_control( 'weblog_theme_options[weblog-primary-color]', array(
    'label'		=> __( 'Primary Color', 'weblog' ),
    'section'   => 'colors',
    'settings'  => 'weblog_theme_options[weblog-primary-color]',
    'type'	  	=> 'color'
) );