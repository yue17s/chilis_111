<?php
/**
 * Content and content wrapper end
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'weblog_after_content' ) ) :

    function weblog_after_content() {
      ?>
        </div><!-- #content -->
        </div><!-- content-wrapper-->
    <?php
    }
endif;
add_action( 'weblog_action_after_content', 'weblog_after_content', 10 );

/**
 * Footer content
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'weblog_footer' ) ) :

    function weblog_footer() {

        global $weblog_customizer_all_values;
        ?>
        <div class="clearfix"></div>
        <footer id="colophon" class="site-footer" role="contentinfo">
            <?php
            if(
                is_active_sidebar( 'footer-top-col-one' ) ||
                is_active_sidebar( 'footer-top-col-two' ) ||
                is_active_sidebar( 'footer-top-col-three' )
            ){
                ?>
                <div class=" footer-wrapper">
                    <div class="top-bottom wrapper">
                        <?php
                        $footer_top_col = 'acme-col-3';
                        ?>
                        <div id="footer-top">
                            <div class="footer-columns">
                                <?php if( is_active_sidebar( 'footer-top-col-one' ) ) : ?>
                                    <div class="footer-sidebar <?php echo esc_attr( $footer_top_col );?>">
                                        <?php dynamic_sidebar( 'footer-top-col-one' ); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if( is_active_sidebar( 'footer-top-col-two' ) ) : ?>
                                    <div class="footer-sidebar <?php echo esc_attr( $footer_top_col );?>">
                                        <?php dynamic_sidebar( 'footer-top-col-two' ); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if( is_active_sidebar( 'footer-top-col-three' ) ) : ?>
                                    <div class="footer-sidebar <?php echo esc_attr( $footer_top_col );?>">
                                        <?php dynamic_sidebar( 'footer-top-col-three' ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div><!-- #foter-top -->
                    </div><!-- top-bottom-->
                </div><!-- footer-wrapper-->
                <div class="clearfix"></div>
                <?php
            }
            ?>
                <div class="footer-copyright border text-center">
                    <div class="wrapper">
                        <?php if( isset( $weblog_customizer_all_values['weblog-footer-copyright'] ) ): ?>
                            <p class="acme-col-2"><?php echo wp_kses_post( $weblog_customizer_all_values['weblog-footer-copyright'] ); ?></p>
                        <?php endif; ?>
                        <div class="site-info acme-col-2">
                            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'weblog' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'weblog' ), 'WordPress' ); ?></a>
                            <span class="sep"> | </span>
                            <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'weblog' ), 'Weblog', '<a href="https://www.acmethemes.com/" rel="designer">Acme Themes</a>' ); ?>
                        </div><!-- .site-info -->
                    </div>
                </div>
                <div class="clearfix"></div>
           
        </footer><!-- #colophon -->

    </div><!--page end-->
    <?php
    }
endif;
add_action( 'weblog_action_footer', 'weblog_footer', 10 );