<?php
/**
 * Excerpt length 30 return
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( !function_exists('weblog_alter_excerpt') ) :
    function weblog_alter_excerpt( $length ){
		if( is_admin() ){
			return $length;
		}
        return 30;
    }
endif;

add_filter('excerpt_length', 'weblog_alter_excerpt');

/**
 * Add for more view
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return null
 *
 */

if ( !function_exists('weblog_excerpt_more') ) :
    function weblog_excerpt_more($more) {
	    if( is_admin() ){
		    return $more;
	    }
        return ' ';
    }
endif;
add_filter('excerpt_more', 'weblog_excerpt_more');