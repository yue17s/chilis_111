<?php
/**
 * Dynamic css
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'weblog_dynamic_css' ) ) :

    function weblog_dynamic_css() {

        global $weblog_customizer_all_values;
        /*Color options */
        $weblog_primary_color = esc_attr( $weblog_customizer_all_values['weblog-primary-color'] );
        $custom_css = '';
        /*background*/
        $custom_css .= "
            mark,
            .comment-form .form-submit input,
            #calendar_wrap #wp-calendar #today,
            #calendar_wrap #wp-calendar #today a,
            .wpcf7-form input.wpcf7-submit:hover,
            .breadcrumb,
            .slider-section .owl-buttons .owl-prev, 
            .slider-section .owl-buttons .owl-next,
            .slider-section .read-more,
            .masonry-start .read-more .read-more-btn,
            .show-more,
            .masonry-start .posted-on,
            .masonry-start .byline,
            .single article .posted-on,
            .single article .byline,
             .slicknav_btn{
                background: {$weblog_primary_color};
            }";
        /*color*/
        $custom_css .= "
            .slider-section .cat-links a,
            a:hover,
            .header-wrapper .menu li a:hover,
            .screen-reader-text:focus,
            .bn-content a:hover,
            .socials a:hover,
            .site-title a,
            .widget_search input#s,
            .slider-feature-wrap a:hover,
            .slider-section .bx-controls-direction a,
            .featured-desc .above-entry-meta span:hover,
            .posted-on a:hover,
            .cat-links a:hover,
            .comments-link a:hover,
            .edit-link a:hover,
            .tags-links a:hover,
            .byline a:hover,
            .nav-links a:hover,
            #weblog-breadcrumbs a:hover,
            .wpcf7-form input.wpcf7-submit,
            .widget li a:hover,
            .header-wrapper .menu > li.current-menu-item > a,
            .header-wrapper .menu > li.current-menu-parent > a,
            .header-wrapper .menu > li.current_page_parent > a,
            .header-wrapper .menu > li.current_page_ancestor > a,
            .masonry-start .posted-on::after,
            article .posted-on::after,
            .masonry-start .byline::after,
            article  .byline::after,
            .sticky-format-icon{
                color: {$weblog_primary_color};
            }";

        /*border*/
         $custom_css .= "
            .page-header .page-title:after,
            .single .entry-header .entry-title:after{
                background: {$weblog_primary_color};
                bottom: 0;
                content: '';
                height: 3px;
                left: 0;
                position: absolute;
                width: 100px;
            }
            .page-header .page-title:before,
            .single .entry-header .entry-title:before{
                border-bottom: 7px solid {$weblog_primary_color};
            }
            .wpcf7-form input.wpcf7-submit:hover{
                border: 2px solid {$weblog_primary_color};
            }
            .breadcrumb::after {
                border-left: 5px solid {$weblog_primary_color};
            }
            .tagcloud a{
                border: 1px solid {$weblog_primary_color};
            }
            .widget-title{
                border-bottom: 2px solid {$weblog_primary_color};
            }
         ";
        /*media width*/
        $custom_css .= "
            @media screen and (max-width:992px){
                .slicknav_nav li:hover > a,
                .slicknav_nav li.current-menu-ancestor a,
                .slicknav_nav li.current-menu-item  > a,
                .slicknav_nav li.current_page_item a,
                .slicknav_nav li.current_page_item .slicknav_item span,
                .slicknav_nav li .slicknav_item:hover a{
                    color: {$weblog_primary_color};
                }
            }";
        /*custom css*/
        $weblog_custom_css = wp_filter_nohtml_kses ( $weblog_customizer_all_values['weblog-custom-css'] );
        if ( ! empty( $weblog_custom_css ) ) {
            $custom_css .= $weblog_custom_css;
        }
        wp_add_inline_style( 'weblog-style', $custom_css );

    }
endif;
add_action( 'wp_enqueue_scripts', 'weblog_dynamic_css', 99 );