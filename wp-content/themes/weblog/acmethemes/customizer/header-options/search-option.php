<?php
/*adding sections for header options panel*/
$wp_customize->add_section( 'weblog-header-search', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Search Options', 'weblog' ),
    'panel'          => 'weblog-header-panel'
) );

/*header show search*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-header-show-search]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-header-show-search'],
    'sanitize_callback' => 'weblog_sanitize_checkbox',
) );
$wp_customize->add_control( 'weblog_theme_options[weblog-header-show-search]', array(
    'label'		=> __( 'Show Search On Header', 'weblog' ),
    'section'   => 'weblog-header-search',
    'settings'  => 'weblog_theme_options[weblog-header-show-search]',
    'type'	  	=> 'checkbox',
    'priority'  => 10
) );