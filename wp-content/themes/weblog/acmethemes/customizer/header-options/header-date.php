<?php
/*adding sections for header date*/
$wp_customize->add_section( 'weblog-header-date', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Enable Date', 'weblog' ),
    'panel'          => 'weblog-header-panel'
) );

/*show date*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-show-date]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-show-date'],
    'sanitize_callback' => 'weblog_sanitize_checkbox'
) );

$wp_customize->add_control( 'weblog_theme_options[weblog-show-date]', array(
    'label'		=> __( 'Show Date', 'weblog' ),
    'section'   => 'weblog-header-date',
    'settings'  => 'weblog_theme_options[weblog-show-date]',
    'type'	  	=> 'checkbox',
    'priority'  => 7
) );

/*date format*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-header-date-format]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['weblog-header-date-format'],
	'sanitize_callback' => 'weblog_sanitize_select'
) );
$choices = weblog_header_date_format();
$wp_customize->add_control( 'weblog_theme_options[weblog-header-date-format]', array(
	'choices'  	=> $choices,
	'label'		=> __( 'Date Format', 'weblog' ),
	'section'   => 'weblog-header-date',
	'settings'  => 'weblog_theme_options[weblog-header-date-format]',
	'type'	  	=> 'select',
	'priority'  => 20
) );