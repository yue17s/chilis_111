<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage Weblog
 */

/**
 * weblog_action_before_head hook
 * @since Weblog 1.0.0
 *
 * @hooked weblog_set_global -  0
 * @hooked weblog_doctype -  10
 */
do_action( 'weblog_action_before_head' );?>
	<head>

		<?php
		/**
		 * weblog_action_before_wp_head hook
		 * @since weblog 1.0.0
		 *
		 * @hooked weblog_before_wp_head -  10
		 */
		do_action( 'weblog_action_before_wp_head' );

		wp_head();
		?>
	</head>
<body <?php body_class();?>>

<?php
/**
 * weblog_action_before hook
 * @since weblog 1.0.0
 *
 * @hooked weblog_page_start - 10
 * @hooked weblog_page_start - 15
 */
do_action( 'weblog_action_before' );

/**
 * weblog_action_before_header hook
 * @since Weblog 1.0.0
 *
 * @hooked weblog_skip_to_content - 10
 */
do_action( 'weblog_action_before_header' );


/**
 * weblog_action_header hook
 * @since Weblog 1.0.0
 *
 * @hooked weblog_after_header - 10
 */
do_action( 'weblog_action_header' );


/**
 * weblog_action_after_header hook
 * @since Weblog 1.0.0
 *
 * @hooked null
 */
do_action( 'weblog_action_after_header' );


/**
 * weblog_action_before_content hook
 * @since Weblog 1.0.0
 *
 * @hooked weblog_before_content - 10
 */
do_action( 'weblog_action_before_content' );
