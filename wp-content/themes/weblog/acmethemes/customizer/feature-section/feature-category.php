<?php
/*adding feature sections for front page*/
$wp_customize->add_section( 'weblog-feature-category', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Category Slider Selection', 'weblog' ),
    'panel'          => 'weblog-feature-panel'
) );

/* feature cat selection */
$wp_customize->add_setting( 'weblog_theme_options[weblog-feature-cat]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-feature-cat'],
    'sanitize_callback' => 'weblog_sanitize_number'
) );

$wp_customize->add_control(
    new Weblog_Customize_Category_Dropdown_Control(
        $wp_customize,
        'weblog_theme_options[weblog-feature-cat]',
        array(
            'label'		=> __( 'Select Category For Slider', 'weblog' ),
            'description'=> __( 'Recommended image size for post of selected category: 1140 * 550', 'weblog' ),
            'section'   => 'weblog-feature-category',
            'settings'  => 'weblog_theme_options[weblog-feature-cat]',
            'type'	  	=> 'category_dropdown',
            'priority'  => 5
        )
    )
);