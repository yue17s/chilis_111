<?php
global $wp_version;
// Return if wp version less than 4.5
if ( version_compare( $wp_version, '4.5', '<' ) ) {
    /*header logo*/
    $wp_customize->add_setting( 'weblog_theme_options[weblog-header-logo]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $defaults['weblog-header-logo'],
        'sanitize_callback' => 'weblog_sanitize_image',
    ) );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'weblog_theme_options[weblog-header-logo]',
            array(
                'label'		=> __( 'Logo', 'weblog' ),
                'section'   => 'title_tagline',
                'settings'  => 'weblog_theme_options[weblog-header-logo]',
                'type'	  	=> 'image',
                'priority'  => 10
            )
        )
    );
}

/*header logo/text display options*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-header-id-display-opt]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-header-id-display-opt'],
    'sanitize_callback' => 'weblog_sanitize_select'
) );
$choices = weblog_header_id_display_opt();
$wp_customize->add_control( 'weblog_theme_options[weblog-header-id-display-opt]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Logo/Site Title-Tagline Display Options', 'weblog' ),
    'section'   => 'title_tagline',
    'settings'  => 'weblog_theme_options[weblog-header-id-display-opt]',
    'type'	  	=> 'radio',
    'priority'  => 20
) );