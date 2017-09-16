<?php
/**
 * Weblog functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Acme Themes
 * @subpackage Weblog
 */

/**
 * require int.
 */
$weblog_file_directory_init_file_path = trailingslashit( get_template_directory() ).'acmethemes/init.php';
require $weblog_file_directory_init_file_path;
