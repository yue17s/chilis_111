<?php
/*adding sections for header social options */
$wp_customize->add_section( 'weblog-header-social', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Social Options', 'weblog' ),
    'panel'          => 'weblog-header-panel'
) );


/*enable social*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-enable-social]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['weblog-enable-social'],
	'sanitize_callback' => 'weblog_sanitize_checkbox',
) );
$wp_customize->add_control( 'weblog_theme_options[weblog-enable-social]', array(
	'label'		=> __( 'Enable social', 'weblog' ),
	'section'   => 'weblog-header-social',
	'settings'  => 'weblog_theme_options[weblog-enable-social]',
	'type'	  	=> 'checkbox',
	'priority'  => 5
) );

/*facebook url*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-facebook-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-facebook-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'weblog_theme_options[weblog-facebook-url]', array(
    'label'		=> __( 'Facebook url', 'weblog' ),
    'section'   => 'weblog-header-social',
    'settings'  => 'weblog_theme_options[weblog-facebook-url]',
    'type'	  	=> 'url',
    'priority'  => 10
) );

/*twitter url*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-twitter-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-twitter-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'weblog_theme_options[weblog-twitter-url]', array(
    'label'		=> __( 'Twitter url', 'weblog' ),
    'section'   => 'weblog-header-social',
    'settings'  => 'weblog_theme_options[weblog-twitter-url]',
    'type'	  	=> 'url',
    'priority'  => 20
) );

/*youtube url*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-youtube-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-youtube-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'weblog_theme_options[weblog-youtube-url]', array(
    'label'		=> __( 'Youtube url', 'weblog' ),
    'section'   => 'weblog-header-social',
    'settings'  => 'weblog_theme_options[weblog-youtube-url]',
    'type'	  	=> 'url',
    'priority'  => 30
) );

/*header instagram url*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-instagram-url]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['weblog-instagram-url'],
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'weblog_theme_options[weblog-instagram-url]', array(
	'label'		=> __( 'Instagram Url', 'weblog' ),
	'section'   => 'weblog-header-social',
	'settings'  => 'weblog_theme_options[weblog-instagram-url]',
	'type'	  	=> 'url',
	'priority'  => 50
) );
