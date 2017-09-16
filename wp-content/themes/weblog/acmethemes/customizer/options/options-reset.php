<?php
/**
 * Reset options
 * Its outside options panel
 *
 * @param  array $reset_options
 * @return void
 *
 * @since Weblog 1.0.0
 */
if ( ! function_exists( 'weblog_reset_db_options' ) ) :
    function weblog_reset_db_options( $reset_options ) {
        set_theme_mod( 'weblog_theme_options', $reset_options );
    }
endif;

/**
 * Reset options Callback
 *
 * @return void
 *
 * @since Weblog 1.0.0
 */
if ( ! function_exists( 'weblog_reset_db_setting' ) ) :
    function weblog_reset_db_setting( $input, $setting ){
	    $weblog_customizer_all_values = weblog_get_theme_options();
	    $input = $weblog_customizer_all_values['weblog-reset-options'];
	    if( '0' == $input ){
		    return;
	    }
        $weblog_default_theme_options = weblog_get_default_theme_options();
        $weblog_get_theme_options = get_theme_mod( 'weblog_theme_options');

        switch ( $input ) {
            case "reset-color-options":
                $weblog_get_theme_options['weblog-primary-color'] = $weblog_default_theme_options['weblog-primary-color'];
                weblog_reset_db_options($weblog_get_theme_options);
                break;

            case "reset-all":
                weblog_reset_db_options($weblog_default_theme_options);
                break;

            default:
                break;
        }
    }
endif;
add_action( 'customize_save_after','weblog_reset_db_setting' );

/*adding sections for Reset Options*/
$wp_customize->add_section( 'weblog-reset-options', array(
    'priority'       => 220,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Reset Options', 'weblog' )
) );

/*Reset Options*/
$wp_customize->add_setting( 'weblog_theme_options[weblog-reset-options]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['weblog-reset-options'],
    'sanitize_callback' => 'weblog_sanitize_select',
    'transport'			=> 'postMessage'
) );

$choices = weblog_reset_options();
$wp_customize->add_control( 'weblog_theme_options[weblog-reset-options]', array(
    'choices'  	    => $choices,
    'label'		    => __( 'Reset Options', 'weblog' ),
    'description'   => __( 'Caution: Reset theme settings according to the given options. Refresh the page after saving to view the effects. ', 'weblog' ),
    'section'       => 'weblog-reset-options',
    'settings'      => 'weblog_theme_options[weblog-reset-options]',
    'type'	  	    => 'select'
) );