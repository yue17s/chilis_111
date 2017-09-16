<?php
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function weblog_widget_init(){
    register_sidebar(array(
        'name' => __('Main Sidebar Area', 'weblog'),
        'id'   => 'weblog-sidebar',
        'description' =>  __('Displays items on sidebar', 'weblog'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer Column One', 'weblog'),
        'id' => 'footer-top-col-one',
        'description' => __('Displays items on footer section.', 'weblog'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer Column Two', 'weblog'),
        'id' => 'footer-top-col-two',
        'description' => __('Displays items on footer section.', 'weblog'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer Column Three', 'weblog'),
        'id' => 'footer-top-col-three',
        'description' => __('Displays items on footer section.', 'weblog'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));
}
add_action('widgets_init', 'weblog_widget_init');