<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage Weblog
 */


/**
 * weblog_action_after_content hook
 * @since Weblog 1.0.0
 *
 * @hooked weblog_after_content - 10
 */
do_action( 'weblog_action_after_content' );

/**
 * weblog_action_before_footer hook
 * @since Weblog 1.0.0
 *
 * @hooked null
 */
do_action( 'weblog_action_before_footer' );

/**
 * weblog_action_footer hook
 * @since Weblog 1.0.0
 *
 * @hooked weblog_footer - 10
 */
do_action( 'weblog_action_footer' );

/**
 * weblog_action_after_footer hook
 * @since Weblog 1.0.0
 *
 * @hooked null
 */
do_action( 'weblog_action_after_footer' );

/**
 * weblog_action_after hook
 * @since weblog 1.0.0
 *
 * @hooked Weblog_page_end - 10
 */
do_action( 'weblog_action_after' );
 wp_footer(); ?>
</body>
</html>