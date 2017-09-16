<?php
/**
 * Callback functions for comments
 *
 * @since Weblog 1.0.0
 *
 * @param $comment
 * @param $args
 * @param $depth
 * @return void
 *
 */
if ( !function_exists('weblog_commment_list') ) :

    function weblog_commment_list($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);
        if ('div' == $args['style']) {
            $tag = 'div';
            $add_below = 'comment';
        }
        else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo $tag ?>
        <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <?php if ('div' != $args['style']) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
        <?php endif; ?>
        <div class="comment-author vcard">
            <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, '64'); ?>
            <?php printf(__('<cite class="fn">%s</cite>', 'weblog' ), get_comment_author_link()); ?>
        </div>
        <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'weblog'); ?></em>
            <br/>
        <?php endif; ?>
        <div class="comment-meta commentmetadata">
            <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                <i class="fa fa-clock-o"></i>
                <?php
                /* translators: 1: date, 2: time */
                printf(__('%1$s at %2$s', 'weblog'), get_comment_date(), get_comment_time()); ?>
            </a>
            <?php edit_comment_link(__('(Edit)', 'weblog'), '  ', ''); ?>
        </div>
        <?php comment_text(); ?>
        <div class="reply">
            <?php comment_reply_link( array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div>
        <?php if ('div' != $args['style']) : ?>
            </div>
        <?php endif; ?>
        <?php
    }
endif;

/**
 * Date display functions
 *
 * @since Weblog 1.0.0
 * edited 1.2.0
 *
 * @param string $format
 * @return string
 *
 */
if ( ! function_exists( 'weblog_date_display' ) ) :
	function weblog_date_display( $format = 'l, F j, Y') {
		$weblog_customizer_all_values = weblog_get_theme_options();
		if( 'default' == $weblog_customizer_all_values['weblog-header-date-format'] ){
			echo esc_html( date_i18n( $format ) );
		}
		else{
			echo date_i18n(get_option('date_format'));
		}
	}
endif;

/**
 * Select sidebar according to the options saved
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return string
 *
 */
if ( !function_exists('weblog_sidebar_selection') ) :
	function weblog_sidebar_selection( ) {
		wp_reset_postdata();
		$weblog_customizer_all_values = weblog_get_theme_options();
		global $post;
		if(
			isset( $weblog_customizer_all_values['weblog-sidebar-layout'] ) &&
			(
				'left-sidebar' == $weblog_customizer_all_values['weblog-sidebar-layout'] ||
				'both-sidebar' == $weblog_customizer_all_values['weblog-sidebar-layout'] ||
				'no-sidebar' == $weblog_customizer_all_values['weblog-sidebar-layout']
			)
		){
			$weblog_body_global_class = $weblog_customizer_all_values['weblog-sidebar-layout'];
		}
		else{
			$weblog_body_global_class= 'right-sidebar';
		}

		if( is_front_page() ){
			if( isset( $weblog_customizer_all_values['weblog-front-page-sidebar-layout'] ) ){
				if(
					'right-sidebar' == $weblog_customizer_all_values['weblog-front-page-sidebar-layout'] ||
					'left-sidebar' == $weblog_customizer_all_values['weblog-front-page-sidebar-layout'] ||
					'both-sidebar' == $weblog_customizer_all_values['weblog-front-page-sidebar-layout'] ||
					'no-sidebar' == $weblog_customizer_all_values['weblog-front-page-sidebar-layout']
				){
					$weblog_body_classes = $weblog_customizer_all_values['weblog-front-page-sidebar-layout'];
				}
				else{
					$weblog_body_classes = $weblog_body_global_class;
				}
			}
			else{
				$weblog_body_classes= $weblog_body_global_class;
			}
		}
        elseif (is_singular() && isset( $post->ID )) {
			$post_class = get_post_meta( $post->ID, 'weblog_sidebar_layout', true );
			if ( 'default-sidebar' != $post_class ){
				if ( $post_class ) {
					$weblog_body_classes = $post_class;
				} else {
					$weblog_body_classes = $weblog_body_global_class;
				}
			}
			else{
				$weblog_body_classes = $weblog_body_global_class;
			}

		}
        elseif ( is_archive() ) {
			if( isset( $weblog_customizer_all_values['weblog-archive-sidebar-layout'] ) ){
				$weblog_archive_sidebar_layout = $weblog_customizer_all_values['weblog-archive-sidebar-layout'];
				if(
					'right-sidebar' == $weblog_archive_sidebar_layout ||
					'left-sidebar' == $weblog_archive_sidebar_layout ||
					'both-sidebar' == $weblog_archive_sidebar_layout ||
					'no-sidebar' == $weblog_archive_sidebar_layout
				){
					$weblog_body_classes = $weblog_archive_sidebar_layout;
				}
				else{
					$weblog_body_classes = $weblog_body_global_class;
				}
			}
			else{
				$weblog_body_classes= $weblog_body_global_class;
			}
		}
		else {
			$weblog_body_classes = $weblog_body_global_class;
		}
		return $weblog_body_classes;
	}
endif;

/**
 * Return content of fixed lenth
 *
 * @since weblog 1.0.0
 *
 * @param string $weblog_content
 * @param int $length
 * @return string
 *
 */
if ( ! function_exists( 'weblog_words_count' ) ) :
    function weblog_words_count( $weblog_content = null, $length = 16 ) {

        $length = absint( $length );
        $source_content = preg_replace( '`\[[^\]]*\]`', '', $weblog_content );
        $trimmed_content = wp_trim_words( $source_content, $length, '...' );
        return $trimmed_content;

    }
endif;

/**
 * BreadCrumb Settings
 */
/**
 * BreadCrumb Settings
 */
if( ! function_exists( 'weblog_breadcrumbs' ) ):
	function weblog_breadcrumbs() {
        if( is_front_page() ){
            return;
        }
		$weblog_customizer_all_values = weblog_get_theme_options();
		if ( ! function_exists( 'breadcrumb_trail' ) ) {
			require_once weblog_file_directory('acmethemes/library/breadcrumbs/breadcrumbs.php');
		}
		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false
		);
		$weblog_you_are_here_text = $weblog_customizer_all_values['weblog-you-are-here-text'];
		if( !empty( $weblog_you_are_here_text ) ){
			$weblog_you_are_here_text = "<span class='breadcrumb'>".$weblog_you_are_here_text."</span>";
		}

		echo "<div class='breadcrumbs clearfix'>".$weblog_you_are_here_text."<div id='weblog-breadcrumbs'>";
		breadcrumb_trail( $breadcrumb_args );
		echo "</div></div><div class='clear'></div>";
	}
endif;