<?php
/**
 * Display featured slider
 *
 * @since Weblog 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('weblog_default_slider') ) :
    function weblog_default_slider(){
        if( !current_user_can( 'edit_theme_options' ) ){
            return;
        }
        ?>
        <div class="item">
            <a href="#">
                <img src="<?php echo esc_url( get_template_directory_uri()."/assets/img/no-image-690-400.jpg" ); ?>"/>
            </a>
            <div class="slider-desc">
                <div class="slider-details">
                    <a href="#">
                        <div class="slide-title">
                            <?php _e('Welcome to Weblog','weblog'); ?>
                        </div>
                    </a>
                </div>
                <?php
                echo '<div class="slide-caption">'.__('A Stylish Blog Theme','weblog').'</div>';
                ?>
            </div>
        </div>
        <div class="item">
            <a href="#">
                <img src="<?php echo esc_url( get_template_directory_uri()."/assets/img/no-image-690-400.jpg" ); ?>"/>
            </a>
            <div class="slider-desc">
                <div class="slider-details">
                    <a href="#">
                        <div class="slide-title">
                            <?php _e('Slider Setting','weblog'); ?>
                        </div>
                    </a>
                </div>
                <?php
                echo '<div class="slide-caption">'.__('Goto Appearance > Customize > Featured Section Options, for setting up feature slider and featured options','weblog').'</div>';
                ?>
            </div>
        </div>
        <?php
    }
endif;

/**
 * Featured Slider display function
 *
 * @since Weblog 1.1.0
 *
 * @param null
 * @return void
 */

if ( ! function_exists( 'weblog_display_feature_slider' ) ) :

    function weblog_display_feature_slider( ){

        global $weblog_customizer_all_values;
        $weblog_feature_cat = $weblog_customizer_all_values['weblog-feature-cat'];
	    $sticky = get_option( 'sticky_posts' );
	    $weblog_cat_post_args = array(
		    'posts_per_page'      => 5,
		    'no_found_rows'       => true,
		    'post_status'         => 'publish',
		    'ignore_sticky_posts' => true,
		    'post__not_in' => $sticky
	    );
	    if( 0 != $weblog_feature_cat ){
		    $weblog_cat_post_args['cat'] = $weblog_feature_cat;
	    }
	    $slider_query = new WP_Query($weblog_cat_post_args);
	    if ($slider_query->have_posts()):
		    while ($slider_query->have_posts()): $slider_query->the_post();
			    if (has_post_thumbnail()) {
				    $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
			    } else {
				    $image_url[0] = get_template_directory_uri() . '/assets/img/no-image-690-400.jpg';
			    }
			    ?>
                <div class="item">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url( $image_url[0] ); ?>"/>
                    </a>
                    <div class="slider-desc">
                        <div class="slider-details">
                            <div class="entry-header">
							    <?php weblog_entry_footer( 1, 0 , 0 ,0 ); ?>
                            </div>
                            <div class="slide-title">
							    <?php the_title(); ?>
                            </div>
                            <a href="<?php the_permalink()?>" class="read-more">
							    <?php _e( 'Read More', 'weblog' );?>
                            </a>
                        </div>
                    </div>
                </div>
			    <?php
		    endwhile;
		    wp_reset_postdata();
	    else:
		    weblog_default_slider();
	    endif;
    }
endif;

/**
 * Display featured slider
 *
 * @since Weblog 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('weblog_feature_slider') ) :
    function weblog_feature_slider() {
        ?>
        <div class="slider-section">
            <div class="feature-slider owl-carousel">
                <?php weblog_display_feature_slider(); ?>
            </div>
        </div>
        <?php
    }
endif;
add_action( 'weblog_action_feature_slider', 'weblog_feature_slider', 0 );