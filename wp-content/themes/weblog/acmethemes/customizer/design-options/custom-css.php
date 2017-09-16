<?php
/* adding sections for custom css options */
$wp_customize->add_section( 'weblog-design-custom-css-option', array(
    'priority'       => 60,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Custom CSS', 'weblog' ),
    'panel'          => 'weblog-design-panel'
) );

/*custom-css*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-custom-css]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-custom-css'],
    'sanitize_callback'    => 'wp_filter_nohtml_kses',
    'sanitize_js_callback' => 'wp_filter_nohtml_kses'
) );
$wp_customize->add_control( 'weblog_theme_options[weblog-custom-css]', array(
    'label'		=> __( 'Custom CSS', 'weblog' ),
    'section'   => 'weblog-design-custom-css-option',
    'settings'  => 'weblog_theme_options[weblog-custom-css]',
    'type'	  	=> 'textarea',
    'priority'  => 10
) );