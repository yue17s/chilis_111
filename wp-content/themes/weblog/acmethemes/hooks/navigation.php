<?php
/**
 * Post Navigation
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('weblog_posts_navigation') ) :
    function weblog_posts_navigation() {
        global $weblog_customizer_all_values;

        if( 'default' == $weblog_customizer_all_values['weblog-pagination-option'] ){
            the_posts_navigation();
        }
        else{
            $page_number = get_query_var('paged');
            if( $page_number == 0 ){
                $output_page = 2;
            }
            else{
                $output_page = $page_number + 1;
            }
            echo "<div class='clearfix'></div><div class='show-more' data-number='$output_page'>".__('Load More Posts','weblog')."</div><div id='weblog-temp-post'></div>";
        }
    }
endif;
add_action( 'weblog_action_navigation', 'weblog_posts_navigation', 10 );
