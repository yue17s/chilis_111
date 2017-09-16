<?php

/**
 * Adds Weblog Theme Widgets in SiteOrigin Pagebuilder Tabs
 *
 * @since Weblog 1.2.0
 *
 * @param null
 * @return null
 *
 */
function weblog_widgets($widgets) {
    $theme_widgets = array(
        'weblog_author_widget'
    );
    foreach($theme_widgets as $theme_widget) {
        if( isset( $widgets[$theme_widget] ) ) {
            $widgets[$theme_widget]['groups'] = array('weblog');
            $widgets[$theme_widget]['icon']   = 'dashicons dashicons-screenoptions';
        }
    }
    return $widgets;
}
add_filter('siteorigin_panels_widgets', 'weblog_widgets');

/**
 * Add a tab for the theme widgets in the page builder
 *
 * @since Weblog 1.2.0
 *
 * @param null
 * @return null
 *
 */
function weblog_widgets_tab($tabs){
    $tabs[] = array(
        'title'  => __('AT Weblog Widgets', 'weblog'),
        'filter' => array(
            'groups' => array('weblog')
        )
    );
    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'weblog_widgets_tab', 20);