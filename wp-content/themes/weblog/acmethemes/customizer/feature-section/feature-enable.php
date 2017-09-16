<?php
/*adding sections for enabling feature section in front page*/
$wp_customize->add_section( 'weblog-enable-feature', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Enable Feature Section', 'weblog' ),
    'panel'          => 'weblog-feature-panel'
) );

/*enable feature section*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-enable-feature]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-enable-feature'],
    'sanitize_callback' => 'weblog_sanitize_checkbox'
) );

$wp_customize->add_control( 'weblog_theme_options[weblog-enable-feature]', array(
    'label'		    => __( 'Enable Feature Section', 'weblog' ),
    'description'	=> __( 'Feature section will display on front/home page', 'weblog' ),
    'section'       => 'weblog-enable-feature',
    'settings'      => 'weblog_theme_options[weblog-enable-feature]',
    'type'	  	    => 'checkbox',
    'priority'      => 10
) );