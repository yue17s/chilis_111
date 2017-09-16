<?php
/**
 * Setting global variables for all theme options db saved values
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'weblog_set_global' ) ) :

    function weblog_set_global() {
        /*Getting saved values start*/
        $weblog_saved_theme_options = weblog_get_theme_options();
        $GLOBALS['weblog_customizer_all_values'] = $weblog_saved_theme_options;
        /*Getting saved values end*/
    }
endif;
add_action( 'weblog_action_before_head', 'weblog_set_global', 0 );

/**
 * Doctype Declaration
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'weblog_doctype' ) ) :
    function weblog_doctype() {
        ?>
        <!DOCTYPE html><html <?php language_attributes(); ?>>
    <?php
    }
endif;
add_action( 'weblog_action_before_head', 'weblog_doctype', 10 );

/**
 * Code inside head tage but before wp_head funtion
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'weblog_before_wp_head' ) ) :

    function weblog_before_wp_head() {
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="<?php echo esc_url('http://gmpg.org/xfn/11')?>">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
    }
endif;
add_action( 'weblog_action_before_wp_head', 'weblog_before_wp_head', 10 );

/**
 * Add body class
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'weblog_body_class' ) ) :

    function weblog_body_class( $weblogbody_classes ) {
        global $weblog_customizer_all_values;
        if ( 'boxed' == $weblog_customizer_all_values['weblog-default-layout'] ) {
            $weblogbody_classes[] = 'boxed-layout';
        }
        if ( 'no-image' == $weblog_customizer_all_values['weblog-blog-archive-layout'] ) {
            $weblogbody_classes[] = 'blog-no-image';
        }
	    if( 1 == $weblog_customizer_all_values['weblog-enable-sticky-sidebar'] ){
		    $weblogbody_classes[] = 'at-sticky-sidebar';
	    }
        $weblogbody_classes[] = weblog_sidebar_selection();

        return $weblogbody_classes;

    }
endif;
add_action( 'body_class', 'weblog_body_class', 10, 1);

/**
 * Page start
 *
 * @since weblog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'weblog_page_start' ) ) :

    function weblog_page_start() {
        ?>
        <div id="page" class="hfeed site">
<?php
    }
endif;
add_action( 'weblog_action_before', 'weblog_page_start', 15 );

/**
 * Skip to content
 *
 * @since weblog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'weblog_skip_to_content' ) ) :

    function weblog_skip_to_content() {
        ?>
        <a class="skip-link screen-reader-text" href="#content" title="link"><?php esc_html_e( 'Skip to content', 'weblog' ); ?></a>
    <?php
    }

endif;
add_action( 'weblog_action_before_header', 'weblog_skip_to_content', 10 );

/**
 * Main header
 *
 * @since weblog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'weblog_header' ) ) :

    function weblog_header() {
        global $weblog_customizer_all_values;
        ?>
        <header id="masthead" class="site-header" role="banner">
            <div class="header-wrapper clearfix">
                <div class="header-container">
                    <div class="top-header-bar">
                        <div class="wrapper">
                            <div class="acme-col-3">
                                <?php
                                if ( 1 == $weblog_customizer_all_values['weblog-show-date'] ){
                                    echo ' <div class="date-display">';
                                    weblog_date_display();
                                    echo "</div>";
                                }
                                ?>
                            </div>
                            <div class="acme-col-3">
                                <?php
                                if ( 1 == $weblog_customizer_all_values['weblog-header-show-search'] ):
                                    echo "<div class='acme-search-block'>";
                                    get_search_form();
                                    echo "</div>";
                                endif;
                                ?>
                            </div>
                            <div class="acme-col-3">
                                <?php
                                if ( 1 == $weblog_customizer_all_values['weblog-enable-social'] ) {
                                    /**
                                     * Social Sharing
                                     * weblog_action_social_links
                                     * @since weblog 1.0.0
                                     *
                                     * @hooked weblog_social_links -  10
                                     */
                                    do_action('weblog_action_social_links');
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="site-branding clearfix">
                        <div class="wrapper">
                            <div class="site-logo acme-col-3">
                                <?php if ( 'disable' != $weblog_customizer_all_values['weblog-header-id-display-opt'] ):?>
                                <?php
                                if ( 'logo-only' == $weblog_customizer_all_values['weblog-header-id-display-opt'] ):
                                    if ( function_exists( 'the_custom_logo' ) ) :
                                        the_custom_logo();
                                    else :
                                        if( !empty( $weblog_customizer_all_values['weblog-header-logo'] ) ):
                                            ?>
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                                <img src="<?php echo esc_url( $weblog_customizer_all_values['weblog-header-logo'] ); ?>">
                                            </a>
                                            <?php
                                        endif;/*weblog-header-logo*/
                                    endif;
                                else:/*else is title-only or title-and-tagline*/
                                    if ( is_front_page() && is_home() ) : ?>
                                        <h1 class="site-title">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                        </h1>
                                    <?php else : ?>
                                        <p class="site-title">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                        </p>
                                    <?php endif;
                                    if ( 'title-and-tagline' == $weblog_customizer_all_values['weblog-header-id-display-opt'] ):
                                        $description = get_bloginfo( 'description', 'display' );
                                        if ( $description || is_customize_preview() ) : ?>
                                            <p class="site-description"><?php echo esc_html( $description ); ?></p>
                                        <?php endif;
                                    endif;
                                endif; ?>
                                <?php endif;?><!--weblog-header-id-display-opt-->
                            </div><!--site-logo-->
                        </div>
                    </div>
	                <?php
	                $weblog_enable_sticky_menu ='';
	                if( 1 == $weblog_customizer_all_values['weblog-enable-sticky-menu'] ) {
		                $weblog_enable_sticky_menu = ' weblog-enable-sticky-menu ';
	                }
	                ?>
                    <nav id="site-navigation" class="main-navigation <?php echo $weblog_enable_sticky_menu;?> clearfix" role="navigation">
                        <div class="wrapper">
                            <div class="header-main-menu clearfix">
                                <?php
                                wp_nav_menu(array('theme_location' => 'primary','container' => 'div', 'container_class' => 'acmethemes-nav'));
                               ?>
                            </div>
                            <!--slick menu container-->
                            <div class="responsive-slick-menu clearfix"></div>
                        </div>
                    </nav>
                    <!-- #site-navigation -->
                </div>
                <!-- .header-container -->
            </div>
            <!-- header-wrapper-->
        </header>
        <!-- #masthead -->
    <?php
    }
endif;
add_action( 'weblog_action_header', 'weblog_header', 10 );

/**
 * Before main content
 *
 * @since Weblog 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'weblog_before_content' ) ) :

    function weblog_before_content() {
        ?>
        <div class="wrapper content-wrapper clearfix">
        <?php
        global $weblog_customizer_all_values;
        $weblog_enable_feature = $weblog_customizer_all_values['weblog-enable-feature'];
        if ( is_front_page() && 1 == $weblog_enable_feature ) {
            echo '<div class="slider-feature-wrap clearfix">';
            /**
             * Slide
             * weblog_action_feature_slider
             * @since weblog 1.0.0
             *
             * @hooked weblog_feature_slider -  0
             */
            do_action('weblog_action_feature_slider');

            /**
             * Featured Post Beside Slider
             * weblog_action_feature_side
             * @since weblog 1.0.0
             *
             * @hooked weblog_feature_side-  0
             */
            do_action('weblog_action_feature_side');
            echo "</div>";
            $weblog_content_id = "home-content";
        } else {
            $weblog_content_id = "content";
        }
        ?>
    <div id="<?php echo esc_attr( $weblog_content_id ); ?>" class="site-content">
    <?php
        if( 1 == $weblog_customizer_all_values['weblog-show-breadcrumb'] && !is_front_page() ){
            weblog_breadcrumbs();
        }
    }
endif;
add_action( 'weblog_action_after_header', 'weblog_before_content', 10 );
