<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'weblog-archive-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Category/Archive Sidebar Layout', 'weblog' ),
    'panel'          => 'weblog-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-archive-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-archive-sidebar-layout'],
    'sanitize_callback' => 'weblog_sanitize_select'
) );
$choices = weblog_sidebar_layout();
$wp_customize->add_control( 'weblog_theme_options[weblog-archive-sidebar-layout]', array(
    'choices'  	    => $choices,
    'label'		    => __( 'Category/Archive Sidebar Layout', 'weblog' ),
    'description'   => __( 'Sidebar Layout for listing pages like category, author etc', 'weblog' ),
    'section'       => 'weblog-archive-sidebar-layout',
    'settings'      => 'weblog_theme_options[weblog-archive-sidebar-layout]',
    'type'	  	    => 'select'
) );