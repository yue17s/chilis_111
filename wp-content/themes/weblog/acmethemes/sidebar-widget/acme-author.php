<?php
/**
 * Custom author
 *
 * @package Acme Themes
 * @subpackage Weblog
 */
if ( ! class_exists( 'weblog_author_widget' ) ) :
    /**
     * Class for adding author widget
     * A new way to add author
     * @package Acme Themes
     * @subpackage Weblog
     * @since 1.0.0
     */
    class weblog_author_widget extends WP_Widget {
        /*defaults values for fields*/
        private $defaults = array(
            'weblog_author_title' => '',
            'weblog_author_image' => '',
            'weblog_author_link'  => '',
            'weblog_author_new_window' => 1,
            'weblog_author_short_disc'  => '',
        );
        function __construct() {
            parent::__construct(
            /*Base ID of your widget*/
                'weblog_author',
                /*Widget name will appear in UI*/
                __('AT Author', 'weblog'),
                /*Widget description*/
                array( 'description' => __( 'Add author with different options.', 'weblog' ), )
            );
        }

        /*Widget Backend*/
        public function form( $instance ) {
            /*merging arrays*/
            $instance = wp_parse_args( (array) $instance, $this->defaults);
            $weblog_author_title  = esc_attr( $instance['weblog_author_title'] );
            $weblog_author_image  = esc_url( $instance['weblog_author_image'] );
            $weblog_author_link   = esc_url( $instance['weblog_author_link'] );
            $weblog_author_new_window = esc_attr( $instance['weblog_author_new_window'] );
            $weblog_author_short_disc = esc_attr( $instance['weblog_author_short_disc'] );
            ?>
            <p class="description">
                <?php
                _e('Note: Use square image. Recommended image size : 250 x 250', 'weblog' );
                ?>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'weblog_author_title' ); ?>"><?php _e( 'Title:', 'weblog' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'weblog_author_title' ); ?>" name="<?php echo $this->get_field_name( 'weblog_author_title' ); ?>" type="text" value="<?php echo esc_attr( $weblog_author_title ); ?>" />
            </p>
            <h4><?php _e( 'Author Image', 'weblog' ); ?></h4>
            <p>
                <label for="<?php echo $this->get_field_id('weblog_author_image'); ?>">
                    <?php _e( 'Select Author Image', 'weblog' ); ?>
                </label>
                <?php
                $weblog_display_none = '';
                if ( empty( $weblog_author_image ) ){
                    $weblog_display_none = ' style="display:none;" ';
                }
                ?>
                <span class="img-preview-wrap" <?php echo esc_attr( $weblog_display_none ); ?>>
                    <img class="widefat" src="<?php echo esc_url( $weblog_author_image ); ?>" alt="<?php _e( 'Image preview', 'weblog' ); ?>"  />
                </span><!-- .ad-preview-wrap -->
                <input type="text" class="widefat" name="<?php echo $this->get_field_name('weblog_author_image'); ?>" id="<?php echo $this->get_field_id('weblog_author_image'); ?>" value="<?php echo esc_url( $weblog_author_image ); ?>" />
                <input type="button" value="<?php _e( 'Upload Image', 'weblog' ); ?>" class="button media-image-upload" data-title="<?php _e( 'Select Author Image','weblog'); ?>" data-button="<?php _e( 'Select Author Image','weblog'); ?>"/>
                <input type="button" value="<?php _e( 'Remove Image', 'weblog' ); ?>" class="button media-image-remove" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'weblog_author_short_disc' ); ?>"><?php _e( 'Author Short Disc:', 'weblog' ); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'weblog_author_short_disc' ); ?>" name="<?php echo $this->get_field_name( 'weblog_author_short_disc' ); ?>"><?php echo esc_attr( $weblog_author_short_disc ); ?></textarea>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'weblog_author_link' ); ?>"><?php _e( 'Link URL:', 'weblog' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'weblog_author_link' ); ?>" name="<?php echo $this->get_field_name( 'weblog_author_link' ); ?>" type="text" value="<?php echo esc_attr( $weblog_author_link ); ?>" />
            </p>
            <p>
                <input id="<?php echo $this->get_field_id( 'weblog_author_new_window' ); ?>" name="<?php echo $this->get_field_name( 'weblog_author_new_window' ); ?>" type="checkbox" <?php checked( 1 == $weblog_author_new_window ? $instance['weblog_author_new_window'] : 0); ?> />
                <label for="<?php echo $this->get_field_id( 'weblog_author_new_window' ); ?>"><?php _e( 'Open in new window', 'weblog' ); ?></label>
            </p>
            <hr />
            <?php
        }
        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @since 1.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         * @return array
         *
         */
        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['weblog_author_title'] = ( isset( $new_instance['weblog_author_title'] ) ) ?  sanitize_text_field( $new_instance['weblog_author_title'] ): '';
            $instance['weblog_author_image'] = ( isset( $new_instance['weblog_author_image'] ) ) ?  esc_url( $new_instance['weblog_author_image'] ): '';
            $instance['weblog_author_link'] = ( isset( $new_instance['weblog_author_link'] ) ) ?  esc_url( $new_instance['weblog_author_link'] ): '';
            $instance['weblog_author_short_disc'] = ( isset( $new_instance['weblog_author_short_disc'] ) ) ?  wp_kses_post( $new_instance['weblog_author_short_disc'] ): '';
            $instance['weblog_author_new_window'] = isset($new_instance['weblog_author_new_window'])? 1 : 0;

            return $instance;
        }
        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 1.0
         *
         * @param array $args widget setting
         * @param array $instance saved values
         * @return array
         *
         */
        function widget( $args, $instance ) {
            $instance = wp_parse_args( (array) $instance, $this->defaults);
            $weblog_author_title      = apply_filters( 'widget_title', $instance['weblog_author_title'], $instance, $this->id_base );
            $weblog_author_image      = esc_url( $instance['weblog_author_image'] );
            $weblog_author_link       = esc_url( $instance['weblog_author_link'] );
            $weblog_author_new_window = esc_attr( $instance['weblog_author_new_window'] );
            $weblog_author_short_disc = wp_kses_post( $instance['weblog_author_short_disc'] );

            echo $args['before_widget'];

            if ( !empty($weblog_author_title) ) {
                echo $args['before_title'] . $weblog_author_title . $args['after_title'];
            }
            $ad_content_image = '';
            if ( ! empty( $weblog_author_image ) ) {
                /*creating add*/
                $img_html = '<img src="' . $weblog_author_image . '"/>';
                $link_open = '';
                $link_close = '';
                if ( ! empty( $weblog_author_link ) ) {
                    $target_text = ( 1 == $weblog_author_new_window ) ? ' target="_blank" ' : '';
                    $link_open = '<a href="' .  $weblog_author_link . '" ' . $target_text . '>';
                    $link_close = '</a>';
                }
                $ad_content_image = $link_open . $img_html .  $link_close.$weblog_author_short_disc;
            }
            if ( !empty( $ad_content_image ) ) {
                echo '<div class="weblog-author-widget">';
                echo $ad_content_image;
                echo '</div>';
            }
            echo $args['after_widget'];
        }
    }
endif;

if ( ! function_exists( 'weblog_author_widget' ) ) :
    /**
     * Function to Register and load the widget
     *
     * @since 1.0
     *
     * @param null
     * @return null
     *
     */
    function weblog_author_widget() {
        register_widget( 'weblog_author_widget' );
    }
endif;
add_action( 'widgets_init', 'weblog_author_widget' );