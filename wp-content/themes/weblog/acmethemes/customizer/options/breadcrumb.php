<?php
/*adding sections for breadcrumb */
$wp_customize->add_section( 'weblog-breadcrumb-options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Breadcrumb Options', 'weblog' ),
    'panel'          => 'weblog-options'
) );

/*show breadcrumb*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-show-breadcrumb]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-show-breadcrumb'],
    'sanitize_callback' => 'weblog_sanitize_checkbox'
) );

$wp_customize->add_control( 'weblog_theme_options[weblog-show-breadcrumb]', array(
    'label'		=> __( 'Enable Breadcrumb', 'weblog' ),
    'section'   => 'weblog-breadcrumb-options',
    'settings'  => 'weblog_theme_options[weblog-show-breadcrumb]',
    'type'	  	=> 'checkbox',
    'priority'  => 10
) );


/*Read More Text*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-you-are-here-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['weblog-you-are-here-text'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'weblog_theme_options[weblog-you-are-here-text]', array(
	'label'		=> __( 'You are here Text', 'weblog' ),
	'section'   => 'weblog-breadcrumb-options',
	'settings'  => 'weblog_theme_options[weblog-you-are-here-text]',
	'type'	  	=> 'text'
) );