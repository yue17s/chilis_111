<?php
/**
 * Header logo/text display options alternative
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return array $weblog_header_id_display_opt
 *
 */
if ( !function_exists('weblog_header_id_display_opt') ) :
    function weblog_header_id_display_opt() {
        $weblog_header_id_display_opt =  array(
            'logo-only'         => __( 'Logo Only ( First Select Logo Above )', 'weblog' ),
            'title-only'        => __( 'Site Title Only', 'weblog' ),
            'title-and-tagline' =>  __( 'Site Title and Tagline', 'weblog' ),
            'disable'           => __( 'Disable', 'weblog' )
        );
        return apply_filters( 'weblog_header_id_display_opt', $weblog_header_id_display_opt );
    }
endif;

/**
 * Header Display Options
 *
 * @since Weblog 1.2.0
 *
 * @param null
 * @return array $weblog_header_date_format
 *
 */
if ( !function_exists('weblog_header_date_format') ) :
	function weblog_header_date_format() {
		$weblog_header_date_format =  array(
			'default' => __( 'Default', 'weblog' ),
			'wp-date-format' => __( 'From WordPress Date Setting', 'weblog' )
		);
		return apply_filters( 'weblog_header_date_format', $weblog_header_date_format );
	}
endif;

/**
 * Global layout options
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return array $weblog_default_layout
 *
 */
if ( !function_exists('weblog_default_layout') ) :
    function weblog_default_layout() {
        $weblog_default_layout =  array(
            'fullwidth' => __( 'Fullwidth', 'weblog' ),
            'boxed'     => __( 'Boxed', 'weblog' )
        );
        return apply_filters( 'weblog_default_layout', $weblog_default_layout );
    }
endif;

/**
 * Sidebar layout options
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return array $weblog_sidebar_layout
 *
 */
if ( !function_exists('weblog_sidebar_layout') ) :
    function weblog_sidebar_layout() {
        $weblog_sidebar_layout =  array(
            'right-sidebar' => __( 'Right Sidebar', 'weblog' ),
            'left-sidebar'  => __( 'Left Sidebar' , 'weblog' ),
            'no-sidebar'    => __( 'No Sidebar', 'weblog' )
        );
        return apply_filters( 'weblog_sidebar_layout', $weblog_sidebar_layout );
    }
endif;


/**
 * Blog layout options
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return array $weblog_blog_layout
 *
 */
if ( !function_exists('weblog_blog_layout') ) :
    function weblog_blog_layout() {
        $weblog_blog_layout =  array(
            'full-image' => __( 'Full Image', 'weblog' ),
            'no-image'   => __( 'No Image', 'weblog' )
        );
        return apply_filters( 'weblog_blog_layout', $weblog_blog_layout );
    }
endif;

/**
 * Pagination Options
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return array weblog_pagination_options
 *
 */
if ( !function_exists('weblog_pagination_options') ) :
    function weblog_pagination_options() {
        $weblog_pagination_options =  array(
            'default'  => __( 'Default', 'weblog' ),
            'numeric'  => __( 'Ajax Loading', 'weblog' )
        );
        return apply_filters( 'weblog_pagination_options', $weblog_pagination_options );
    }
endif;

/**
 * Related Post Display From Options
 *
 * @since Weblog 1.2.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('weblog_related_post_display_from') ) :
	function weblog_related_post_display_from() {
		$weblog_related_post_display_from =  array(
			'cat'  => __( 'Related Posts From Categories', 'weblog' ),
			'tag'  => __( 'Related Posts From Tags', 'weblog' )
		);
		return apply_filters( 'weblog_related_post_display_from', $weblog_related_post_display_from );
	}
endif;


/**
 * Blog layout options
 *
 * @since Weblog 1.2.0
 *
 * @param null
 * @return array $weblog_get_image_sizes_options
 *
 */
if ( !function_exists('weblog_get_image_sizes_options') ) :
	function weblog_get_image_sizes_options( $add_disable = false ) {
		global $_wp_additional_image_sizes;
		$choices = array();
		if ( true == $add_disable ) {
			$choices['disable'] = __( 'No Image', 'weblog' );
		}
		foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
			$choices[ $_size ] = $_size . ' ('. get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
		}
		$choices['full'] = __( 'full (original)', 'weblog' );
		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {

			foreach ($_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key . ' ('. $size['width'] . 'x' . $size['height'] . ')';
			}

		}
		return apply_filters( 'weblog_get_image_sizes_options', $choices );
	}
endif;

/**
 * 
 * Reset post
 *
 * @since Weblog 1.1.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('weblog_reset_options') ) :
    function weblog_reset_options() {
        $weblog_reset_options =  array(
            '0'                    => __( 'Do Not Reset', 'weblog' ),
            'reset-color-options'  => __( 'Reset Colors Options', 'weblog' ),
            'reset-all'            => __( 'Reset All', 'weblog' )
        );
        return apply_filters( 'weblog_reset_options', $weblog_reset_options );
    }
endif;

/**
 *  Default Theme layout options
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return array $weblog_theme_layout
 *
 */
if ( !function_exists('weblog_get_default_theme_options') ) :
    function weblog_get_default_theme_options() {

        $default_theme_options = array(
            /*feature section options*/
            'weblog-feature-cat'          => 0,
            'weblog-enable-feature'       => '',

            /*header options*/
            'weblog-header-logo'          => '',
            'weblog-header-id-display-opt'=> 'title-and-tagline',

            'weblog-show-date'            => 1,
            'weblog-header-date-format'  => 'default',

            'weblog-facebook-url'         => '',
            'weblog-twitter-url'          => '',
            'weblog-youtube-url'          => '',
            'weblog-instagram-url'  => '',
            'weblog-enable-social'        => '',
            'weblog-header-show-search'   => 1,
            'weblog-enable-sticky-menu'  => '',
            'weblog-enable-sticky-sidebar'  => 1,

            /*footer options*/
            'weblog-footer-copyright'     => __( '&copy; All Right Reserved 2016', 'weblog' ),

            /*layout/design options*/
            'weblog-default-layout'       => 'fullwidth',

	        /*layout/design options*/
            'weblog-sidebar-layout'       => 'right-sidebar',
            'weblog-front-page-sidebar-layout'  => 'no-sidebar',
            'weblog-archive-sidebar-layout'  => 'no-sidebar',

            'weblog-pagination-option'    => 'default',
            'weblog-blog-archive-layout'  => 'full-image',
            'weblog-blog-archive-more-text'  => __( 'Read More', 'weblog' ),
            'weblog-primary-color'        => '#F78E3F',
            'weblog-custom-css'           => '',

            /*single post options*/
            'weblog-blog-archive-image-size' => 'large',

            'weblog-show-related'  => 1,
            'weblog-related-title'  => __( 'Related posts', 'weblog' ),
            'weblog-related-post-display-from'  => 'cat',
            'weblog-single-image-size'  => 'full',

            /*theme options*/
            'weblog-search-placholder'    => __( 'Search', 'weblog' ),
            'weblog-show-breadcrumb'      => '',

            /*Reset*/
            'weblog-reset-options'        => '0',

            'weblog-you-are-here-text'  => __( 'You are here', 'weblog' ),

        );

        return apply_filters( 'weblog_default_theme_options', $default_theme_options );
    }
endif;

/**
 *  Get theme options
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return array weblog_theme_options
 *
 */
if ( !function_exists('weblog_get_theme_options') ) :

    function weblog_get_theme_options() {
        $weblog_default_theme_options = weblog_get_default_theme_options();
        $weblog_get_theme_options = get_theme_mod( 'weblog_theme_options');
        if( is_array( $weblog_get_theme_options ) ){
            return array_merge( $weblog_default_theme_options ,$weblog_get_theme_options );
        }
        else{
            return $weblog_default_theme_options;
        }

    }
endif;