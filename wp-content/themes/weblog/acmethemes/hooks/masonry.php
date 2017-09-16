<?php
/**
 * Add div for masonry
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return null
 *
 */

if ( !function_exists('weblog_masonry_start') ) :
    function weblog_masonry_start( ) {
        ?>
        <div class="masonry-start"><div id="masonry-loop">
        <?php
    }
endif;
add_action('weblog_action_masonry_start', 'weblog_masonry_start');


/**
 * End div for masonry
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return null
 *
 */

if ( !function_exists('weblog_masonry_end') ) :
    function weblog_masonry_end( ) {
        ?>
        </div><!--#masonry-loop-->
        </div><!--masonry-start-->
        <?php
    }
endif;
add_action('weblog_action_masonry_end', 'weblog_masonry_end');