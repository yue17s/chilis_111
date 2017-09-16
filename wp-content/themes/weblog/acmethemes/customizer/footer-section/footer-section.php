<?php
/*adding sections for footer options*/
$wp_customize->add_section( 'weblog-footer-option', array(
    'priority'       => 80,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Footer Option', 'weblog' )
) );

/*copyright*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-footer-copyright]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-footer-copyright'],
    'sanitize_callback' => 'wp_kses_post'
) );
$wp_customize->add_control( 'weblog_theme_options[weblog-footer-copyright]', array(
    'label'		=> __( 'Copyright Text', 'weblog' ),
    'section'   => 'weblog-footer-option',
    'settings'  => 'weblog_theme_options[weblog-footer-copyright]',
    'type'	  	=> 'text',
    'priority'  => 10
) );