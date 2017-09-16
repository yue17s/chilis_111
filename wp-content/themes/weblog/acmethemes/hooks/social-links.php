<?php
/**
 * Display Social Links
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return void
 *
 */

if ( !function_exists('weblog_social_links') ) :

    function weblog_social_links( ) {

        global $weblog_customizer_all_values;
        ?>
        <div class="socials">
            <?php
            if ( !empty( $weblog_customizer_all_values['weblog-facebook-url'] ) ) { ?>
                <a href="<?php echo esc_url( $weblog_customizer_all_values['weblog-facebook-url'] ); ?>" class="facebook" data-title="Facebook" target="_blank">
                    <span class="font-icon-social-facebook"><i class="fa fa-facebook"></i></span>
                </a>
            <?php }
            if ( !empty( $weblog_customizer_all_values['weblog-twitter-url'] ) ) { ?>
                <a href="<?php echo esc_url( $weblog_customizer_all_values['weblog-twitter-url'] ); ?>" class="twitter" data-title="Twitter" target="_blank">
                    <span class="font-icon-social-twitter"><i class="fa fa-twitter"></i></span>
                </a>
            <?php }
            if ( !empty( $weblog_customizer_all_values['weblog-youtube-url'] ) ) { ?>
                <a href="<?php echo esc_url( $weblog_customizer_all_values['weblog-youtube-url'] ); ?>" class="youtube" data-title="Youtube" target="_blank">
                    <span class="font-icon-social-youtube"><i class="fa fa-youtube"></i></span>
                </a>
            <?php }
            if ( !empty( $weblog_customizer_all_values['weblog-instagram-url'] ) ) {
	            ?>
                <a href="<?php echo esc_url( $weblog_customizer_all_values['weblog-instagram-url'] ); ?>" class="instagram" data-title="Instagram" target="_blank">
                    <span class="font-icon-social-instagram"><i class="fa fa-instagram"></i></span>
                </a>
	            <?php
            }
            ?>
        </div>
        <?php
    }

endif;

add_filter( 'weblog_action_social_links', 'weblog_social_links', 10 );