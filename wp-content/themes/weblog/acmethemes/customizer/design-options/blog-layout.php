<?php
/*adding sections for blog layout options*/
$wp_customize->add_section( 'weblog-design-blog-layout-option', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Default Blog Layout', 'weblog' ),
    'panel'          => 'weblog-design-panel'
) );

/*blog layout*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-blog-archive-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-blog-archive-layout'],
    'sanitize_callback' => 'weblog_sanitize_select'
) );
$choices = weblog_blog_layout();
$wp_customize->add_control( 'weblog_theme_options[weblog-blog-archive-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Default Blog Layout', 'weblog' ),
    'section'   => 'weblog-design-blog-layout-option',
    'settings'  => 'weblog_theme_options[weblog-blog-archive-layout]',
    'type'	  	=> 'select'
) );

/*blog image size*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-blog-archive-image-size]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['weblog-blog-archive-image-size'],
	'sanitize_callback' => 'weblog_sanitize_select'
) );
$choices = weblog_get_image_sizes_options();
$wp_customize->add_control( 'weblog_theme_options[weblog-blog-archive-image-size]', array(
	'choices'  	=> $choices,
	'label'		=> __( 'Image Size Options', 'weblog' ),
	'section'   => 'weblog-design-blog-layout-option',
	'settings'  => 'weblog_theme_options[weblog-blog-archive-image-size]',
	'type'	  	=> 'select',
) );

/*Read More Text*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-blog-archive-more-text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['weblog-blog-archive-more-text'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'weblog_theme_options[weblog-blog-archive-more-text]', array(
	'label'		=> __( 'Read More Text', 'weblog' ),
	'section'   => 'weblog-design-blog-layout-option',
	'settings'  => 'weblog_theme_options[weblog-blog-archive-more-text]',
	'type'	  	=> 'text'
) );