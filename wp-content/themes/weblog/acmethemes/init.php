<?php
/**
 * Main include functions ( to support child theme ) that child theme can override file too
 *
 * @since Weblog 1.0.0
 *
 * @param string $file_path, path from the theme
 * @return string full path of file inside theme
 *
 */
if( !function_exists('weblog_file_directory') ){

    function weblog_file_directory( $file_path ){
        if( file_exists( trailingslashit( get_stylesheet_directory() ) . $file_path) ) {
            return trailingslashit( get_stylesheet_directory() ) . $file_path;
        }
        else{
            return trailingslashit( get_template_directory() ) . $file_path;
        }
    }
}

/**
 * Check empty or null
 *
 * @since weblog  1.0.0
 *
 * @param string $str, string
 * @return boolean
 *
 */
if( !function_exists('weblog_is_null_or_empty') ){
	function weblog_is_null_or_empty( $str ){
		return ( !isset($str) || trim($str)==='' );
	}
}

/*file for library*/
require_once weblog_file_directory('acmethemes/library/tgm/class-tgm-plugin-activation.php');

/*
* file for customizer theme options
*/
$weblog_customizer_file_path = weblog_file_directory('acmethemes/customizer/customizer.php');
require $weblog_customizer_file_path;


/*
* file for additional functions files
*/
$weblog_date_display_file_path = weblog_file_directory('acmethemes/functions.php');
require $weblog_date_display_file_path;

/*
* files for hooks
*/
require_once weblog_file_directory('acmethemes/hooks/tgm.php');

require_once weblog_file_directory('acmethemes/hooks/siteorigin-panels.php');

require_once weblog_file_directory('acmethemes/hooks/acme-demo-setup.php');

$weblog_slider_selection_file_path = weblog_file_directory('acmethemes/hooks/slider-selection.php');
require $weblog_slider_selection_file_path;

$weblog_hooks_header_file_path = weblog_file_directory('acmethemes/hooks/header.php');
require $weblog_hooks_header_file_path;

$weblog_social_links_file_path = weblog_file_directory('acmethemes/hooks/social-links.php');
require $weblog_social_links_file_path;

$weblog_hooks_dynamic_css_file_path = weblog_file_directory('acmethemes/hooks/dynamic-css.php');
require $weblog_hooks_dynamic_css_file_path;

$weblog_photography_file_path = weblog_file_directory('acmethemes/hooks/masonry.php');
require $weblog_photography_file_path;

$weblog_hooks_footer_file_path = weblog_file_directory('acmethemes/hooks/footer.php');
require $weblog_hooks_footer_file_path;

$weblog_comment_form_file_path = weblog_file_directory('acmethemes/hooks/comment-forms.php');
require $weblog_comment_form_file_path;

$weblog_excerpts_form_file_path = weblog_file_directory('acmethemes/hooks/excerpts.php');
require $weblog_excerpts_form_file_path;

$weblog_related_posts_file_path = weblog_file_directory('acmethemes/hooks/related-posts.php');
require $weblog_related_posts_file_path;

$weblog_ajax_pagination_file_path = weblog_file_directory('acmethemes/hooks/navigation.php');
require $weblog_ajax_pagination_file_path;

/*
* file for sidebar and widgets
*/
$weblog_acme_author_widget = weblog_file_directory('acmethemes/sidebar-widget/acme-author.php');
require $weblog_acme_author_widget;

$weblog_sidebar = weblog_file_directory('acmethemes/sidebar-widget/sidebar.php');
require $weblog_sidebar;

/*
* file for core functions imported from functions.php while downloading Underscores
*/
$weblog_sidebar = weblog_file_directory('acmethemes/core.php');
require $weblog_sidebar;

/**
 * Implement Custom Metaboxes
 */
require_once weblog_file_directory('acmethemes/metabox/metabox.php');

/*themes info*/
require_once weblog_file_directory('acmethemes/at-theme-info/class-at-theme-info.php');