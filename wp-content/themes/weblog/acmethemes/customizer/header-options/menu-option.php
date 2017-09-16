<?php
/*adding sections for header options panel*/
$wp_customize->add_section( 'weblog-header-menu', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Menu Options', 'weblog' ),
    'panel'          => 'weblog-header-panel'
) );

/*sticky menu*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-enable-sticky-menu]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['weblog-enable-sticky-menu'],
	'sanitize_callback' => 'weblog_sanitize_checkbox'
) );
$wp_customize->add_control( 'weblog_theme_options[weblog-enable-sticky-menu]', array(
	'label'		=> __( 'Enable Sticky Menu', 'weblog' ),
	'section'   => 'weblog-header-menu',
	'settings'  => 'weblog_theme_options[weblog-enable-sticky-menu]',
	'type'	  	=> 'checkbox',
	'priority'  => 70
) );