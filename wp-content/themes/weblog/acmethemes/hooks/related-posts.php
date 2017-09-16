<?php
/**
 * Display related posts from same category
 *
 * @since Weblog 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('weblog_related_post_below') ) :

    function weblog_related_post_below( $post_id ) {

	    global $weblog_customizer_all_values;
	    if( 0 == $weblog_customizer_all_values['weblog-show-related'] ){
		    return;
	    }
	    $weblog_cat_post_args = array(
		    'post__not_in' => array($post_id),
		    'post_type' => 'post',
		    'posts_per_page'      => 3,
		    'post_status'         => 'publish',
		    'ignore_sticky_posts' => true
	    );
	    $weblog_related_post_display_from = $weblog_customizer_all_values['weblog-related-post-display-from'];

	    if( 'tag' == $weblog_related_post_display_from ){

		    $tags = get_post_meta( $post_id, 'related-posts', true );
		    if ( !$tags ) {
			    $tags = wp_get_post_tags( $post_id, array('fields'=>'ids' ) );
			    $weblog_cat_post_args['tag__in'] = $tags;
		    }
		    else {
			    $weblog_cat_post_args['tag_slug__in'] = explode(',', $tags);
		    }

	    }
	    else{

		    $cats = get_post_meta( $post_id, 'related-posts', true );
		    if ( !$cats ) {
			    $cats = wp_get_post_categories( $post_id, array('fields'=>'ids' ) );
			    $weblog_cat_post_args['category__in'] = $cats;
		    }
		    else {
			    $weblog_cat_post_args['cat'] = $cats;
		    }

	    }
	    $weblog_featured_query = new WP_Query($weblog_cat_post_args);
	    if( $weblog_featured_query->have_posts() ){
	        ?>
            <div class="related-post-wrapper">
                <?php
                $weblog_related_title = $weblog_customizer_all_values['weblog-related-title'];
                if( !empty( $weblog_related_title ) ){
	                ?>
                    <h2 class="widget-title">
		                <?php echo esc_html( $weblog_related_title ); ?>
                    </h2>
	                <?php
                }
                ?>
                <div class="featured-entries-col featured-entries featured-col-posts featured-related-posts">
				    <?php
				    while ( $weblog_featured_query->have_posts() ) : $weblog_featured_query->the_post();
					    ?>
                        <div class="acme-col-3">
						    <?php
						    if ( has_post_thumbnail() ):
							    ?>
                                <figure class="widget-image">
                                    <a href="<?php the_permalink()?>">
									    <?php the_post_thumbnail('medium');?>
                                    </a>
                                </figure>
							    <?php
						    endif;
						    ?>
                            <div class="featured-desc">
                                <div class="above-entry-meta">
								    <?php
								    $archive_year  = get_the_date('Y');
								    $archive_month = get_the_date('m');
								    $archive_day   = get_the_date('d');
								    ?>
                                    <span>
                                        <a href="<?php echo esc_url(get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>">
                                            <i class="fa fa-calendar"></i>
	                                        <?php echo esc_html( get_the_date('F d, Y') ); ?>
                                        </a>
                                    </span>
                                </div>
                                <a href="<?php the_permalink()?>">
                                    <h4 class="title">
									    <?php the_title(); ?>
                                    </h4>
                                </a>
                            </div>
                        </div>
					    <?php
				    endwhile;
				    wp_reset_postdata();
				    ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php
        }
        
    }

endif;

add_action( 'weblog_related_posts', 'weblog_related_post_below', 10, 1 );