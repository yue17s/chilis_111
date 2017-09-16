<?php
/**
 * Infinite Photography  sidebar layout options
 *
 * @since Infinite Photography 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('weblog_sidebar_layout_options') ) :
    function weblog_sidebar_layout_options() {
        $weblog_sidebar_layout_options = array(
            'default-sidebar' => array(
                'value'     => 'default-sidebar',
                'thumbnail' => get_template_directory_uri() . '/acmethemes/images/default-sidebar.jpg'
            ),
            'left-sidebar' => array(
                'value'     => 'left-sidebar',
                'thumbnail' => get_template_directory_uri() . '/acmethemes/images/left-sidebar.jpg'
            ),
            'right-sidebar' => array(
                'value' => 'right-sidebar',
                'thumbnail' => get_template_directory_uri() . '/acmethemes/images/right-sidebar.jpg'
            ),
            'no-sidebar' => array(
                'value'     => 'no-sidebar',
                'thumbnail' => get_template_directory_uri() . '/acmethemes/images/no-sidebar.jpg'
            )
        );
        return apply_filters( 'weblog_sidebar_layout_options', $weblog_sidebar_layout_options );
    }
endif;

/**
 * Custom Metabox
 *
 * @since Infinite Photography 1.1.0
 *
 * @param null
 * @return void
 *
 */
if( !function_exists( 'weblog_add_metabox' )):
    function weblog_add_metabox() {
        add_meta_box(
            'weblog_sidebar_layout', // $id
            __( 'Sidebar Layout', 'weblog' ), // $title
            'weblog_sidebar_layout_callback', // $callback
            'post', // $page
            'normal', // $context
            'high'
        ); // $priority

        add_meta_box(
            'weblog_sidebar_layout', // $id
            __( 'Sidebar Layout', 'weblog' ), // $title
            'weblog_sidebar_layout_callback', // $callback
            'page', // $page
            'normal', // $context
            'high'
        ); // $priority
    }
endif;
add_action('add_meta_boxes', 'weblog_add_metabox');



/**
 * Callback function for metabox
 *
 * @since Infinite Photography 1.1.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('weblog_sidebar_layout_callback') ) :
    function weblog_sidebar_layout_callback(){
        global $post;
        $weblog_sidebar_layout_options = weblog_sidebar_layout_options();
        $weblog_sidebar_layout = 'default-sidebar';
        $weblog_sidebar_meta_layout = get_post_meta( $post->ID, 'weblog_sidebar_layout', true );
        if( !weblog_is_null_or_empty($weblog_sidebar_meta_layout) ){
            $weblog_sidebar_layout = $weblog_sidebar_meta_layout;
        }
        wp_nonce_field( basename( __FILE__ ), 'weblog_sidebar_layout_nonce' );
        ?>
        <style>
            .hide-radio{
                position: relative;
                margin-bottom: 6px;
            }

            .hide-radio img, .hide-radio label{
                display: block;
            }

            .hide-radio input[type="radio"]{
                position: absolute;
                left: 50%;
                top: 50%;
                opacity: 0;
            }

            .hide-radio input[type=radio] + label {
                border: 3px solid #F1F1F1;
            }

            .hide-radio input[type=radio]:checked + label {
                border: 3px solid #F88C00;
            }
        </style>
        <table class="form-table page-meta-box">
            <tr>
                <td colspan="4"><h4><?php _e( 'Choose Sidebar Template', 'weblog' ); ?></h4></td>
            </tr>
            <tr>
                <td>
                    <?php
                    foreach ($weblog_sidebar_layout_options as $field) {
                        ?>
                        <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                            <input id="<?php echo $field['value']; ?>" type="radio" name="weblog_sidebar_layout" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $weblog_sidebar_layout ); ?>/>
                            <label class="description" for="<?php echo $field['value']; ?>">
                                <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" />
                            </label>
                        </div>
                    <?php } // end foreach
                    ?>
                    <div class="clear"></div>
                </td>
            </tr>
            <tr>
                <td><em class="f13"><?php _e( 'You can set up the sidebar content', 'weblog' ); ?> <a href="<?php echo admin_url('/widgets.php'); ?>"><?php _e( 'here', 'weblog' ); ?></a></em></td>
            </tr>

        </table>

    <?php }
endif;

/**
 * save the custom metabox data
 * @hooked to save_post hook
 *
 * @since Infinite Photography 1.1.0
 *
 * @param null
 * @return null||void
 *
 */
if ( !function_exists('weblog_save_sidebar_layout') ) :
    function weblog_save_sidebar_layout( $post_id ) {

        // Verify the nonce before proceeding.
        if ( !isset( $_POST[ 'weblog_sidebar_layout_nonce' ] ) || !wp_verify_nonce( $_POST[ 'weblog_sidebar_layout_nonce' ], basename( __FILE__ ) ) )
            return;

        // Stop WP from clearing custom fields on autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)
            return;

        if ('page' == $_POST['post_type']) {
            if (!current_user_can( 'edit_page', $post_id ) )
                return $post_id;
        } elseif (!current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }


        //Execute this saving function
        if(isset($_POST['weblog_sidebar_layout'])){
            $old = get_post_meta( $post_id, 'weblog_sidebar_layout', true);
            $new = sanitize_text_field($_POST['weblog_sidebar_layout']);
            if ($new && $new != $old) {
                update_post_meta($post_id, 'weblog_sidebar_layout', $new);
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id,'weblog_sidebar_layout', $old);
            }
        }
    }

endif;
add_action('save_post', 'weblog_save_sidebar_layout');
