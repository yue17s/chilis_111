<?php
/*adding sections for Search Placeholder*/
$wp_customize->add_section( 'weblog-search', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Search', 'weblog' ),
    'panel'          => 'weblog-options'
) );

/*Search Placeholder*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-search-placholder]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-search-placholder'],
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'weblog_theme_options[weblog-search-placholder]', array(
    'label'		=> __( 'Search Placeholder', 'weblog' ),
    'section'   => 'weblog-search',
    'settings'  => 'weblog_theme_options[weblog-search-placholder]',
    'type'	  	=> 'text',
    'priority'  => 10
) );