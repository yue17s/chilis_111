<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'weblog-option-pagination-option', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Pagination Options', 'weblog' ),
    'panel'          => 'weblog-options'
) );

/*Pagination Options*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-pagination-option]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-pagination-option'],
    'sanitize_callback' => 'weblog_sanitize_select'
) );
$choices = weblog_pagination_options();
$wp_customize->add_control( 'weblog_theme_options[weblog-pagination-option]', array(
    'choices'  	    => $choices,
    'label'		    => __( 'Pagination Options', 'weblog' ),
    'description'   => __( 'Blog and Archive Pages Pagination', 'weblog' ),
    'section'       => 'weblog-option-pagination-option',
    'settings'      => 'weblog_theme_options[weblog-pagination-option]',
    'type'	  	    => 'select'
) );