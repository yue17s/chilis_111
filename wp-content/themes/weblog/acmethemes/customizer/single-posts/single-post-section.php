<?php
/*adding sections for Single post options*/
$wp_customize->add_section( 'weblog-single-post', array(
    'priority'       => 90,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Single Post Options', 'weblog' )
) );

/*single image size*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-single-image-size]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-single-image-size'],
    'sanitize_callback' => 'weblog_sanitize_select'
) );
$choices = weblog_get_image_sizes_options();
$wp_customize->add_control( 'weblog_theme_options[weblog-single-image-size]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Image Layout Options', 'weblog' ),
    'section'   => 'weblog-single-post',
    'settings'  => 'weblog_theme_options[weblog-single-image-size]',
    'type'	  	=> 'select',
    'priority'  => 20
) );

/*show related posts*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-show-related]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-show-related'],
    'sanitize_callback' => 'weblog_sanitize_checkbox'
) );
$wp_customize->add_control( 'weblog_theme_options[weblog-show-related]', array(
    'label'		=> __( 'Show Related Posts In Single Post', 'weblog' ),
    'section'   => 'weblog-single-post',
    'settings'  => 'weblog_theme_options[weblog-show-related]',
    'type'	  	=> 'checkbox',
    'priority'  => 30
) );

/*Related title*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-related-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['weblog-related-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'weblog_theme_options[weblog-related-title]', array(
	'label'		=> __( 'Related Posts title', 'weblog' ),
	'section'   => 'weblog-single-post',
	'settings'  => 'weblog_theme_options[weblog-related-title]',
	'type'	  	=> 'text',
	'priority'  => 40
) );

/*related post by tag or category*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-related-post-display-from]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['weblog-related-post-display-from'],
	'sanitize_callback' => 'weblog_sanitize_select'
) );
$choices = weblog_related_post_display_from();
$wp_customize->add_control( 'weblog_theme_options[weblog-related-post-display-from]', array(
	'choices'  	=> $choices,
	'label'		=> __( 'Related Post Display From Options', 'weblog' ),
	'section'   => 'weblog-single-post',
	'settings'  => 'weblog_theme_options[weblog-related-post-display-from]',
	'type'	  	=> 'select',
	'priority'  => 50
) );