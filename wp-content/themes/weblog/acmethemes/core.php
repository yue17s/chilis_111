<?php
/*It is underscores functions.php file and its modification*/
if ( ! function_exists( 'weblog_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function weblog_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Weblog, use a find and replace
         * to change 'weblog' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'weblog', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
        * Enable support for custom logo.
        *
        *  @since Weblog 1.0.0
         */
        add_theme_support( 'custom-logo', array(
            'flex-height' => true,
            'flex-width' => true
        ) );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 330, 195, true );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'weblog' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'gallery',
            'caption',
        ) );

        /*
        * Enable support for Post Formats.
        * See https://developer.wordpress.org/themes/functionality/post-formats/
        */
        add_theme_support( 'post-formats', array(
            'aside',
            'gallery',
            'status',
            'image',
            'video',
            'audio',
            'quote',
            'chat',
            'link',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'weblog_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

	    /*woocommerce support*/
	    add_theme_support( 'woocommerce' );
    }
endif; // weblog_setup
add_action( 'after_setup_theme', 'weblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function weblog_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'weblog_content_width', 640 );
}
add_action( 'after_setup_theme', 'weblog_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function weblog_scripts() {

	global $weblog_customizer_all_values;

    /*owl css*/
    wp_enqueue_style( 'jquery-owl', get_template_directory_uri() . '/assets/library/owl-carousel/owl.carousel.min.css', array(), '1.3.3' );

    /*google font*/
    wp_enqueue_style( 'weblog-googleapis', '//fonts.googleapis.com/css?family=PT+Sans:400,700|Josefin+Sans:700,600', array(), '1.0.1' );

    /*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/Font-Awesome/css/font-awesome.min.css', array(), '4.5.0' );

    /*custom-css*/
    wp_enqueue_style( 'weblog-style', get_stylesheet_uri() );

    /*jquery start*/
    /*html5shiv*/
    wp_enqueue_script('html5shiv', get_template_directory_uri() . '/assets/library/html5shiv/html5shiv.min.js', array('jquery'), '3.7.3', false);
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

    /*respond js*/
    wp_enqueue_script('respond', get_template_directory_uri() . '/assets/library/respond/respond.min.js', array('jquery'), '1.1.2', false);
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

    /*bxslider js*/
    wp_enqueue_script('jquery-owl', get_template_directory_uri() . '/assets/library/owl-carousel/owl.carousel.min.js', array('jquery'), '1.3.3', 1);

    wp_enqueue_script('slicknav', get_template_directory_uri() . '/assets/library/SlickNav/jquery.slicknav.min.js', array('jquery'), '1.0.7', 1);

    /*masonry js*/
    wp_enqueue_script( 'masonry' );

	if( 1 == $weblog_customizer_all_values['weblog-enable-sticky-sidebar'] ){
		wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() . '/assets/library/theia-sticky-sidebar/theia-sticky-sidebar.js', array('jquery'), '1.4.0', 1);
	}
    /*custom-js*/
    wp_enqueue_script('weblog-custom', get_template_directory_uri() . '/assets/js/weblog-custom.js', array('jquery'), '1.0.0', 1);
    global $wp_query;
    $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    $max_num_pages = $wp_query->max_num_pages;

    wp_localize_script( 'weblog-custom', 'weblog_ajax', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'paged'     => $paged,
        'max_num_pages'      => $max_num_pages,
        'next_posts'      => next_posts( $max_num_pages, false ),
        'show_more'      => __( 'Load More Posts', 'weblog' ),
        'no_more_posts'        => __( 'No More Posts', 'weblog' ),
    ));

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'weblog_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function weblog_admin_scripts( $hook ) {

    if ( 'widgets.php' == $hook ) {
        wp_enqueue_media();
        wp_enqueue_script( 'weblog-widgets-script', get_template_directory_uri() . '/assets/js/acme-widget.js', array( 'jquery' ), '1.0.0' );
    }

}
add_action( 'admin_enqueue_scripts', 'weblog_admin_scripts' );

/**
 * Custom template tags for this theme.
 */
$weblog_template_tags_file_path = weblog_file_directory('acmethemes/core/template-tags.php');
require $weblog_template_tags_file_path;

/**
 * Custom functions that act independently of the theme templates.
 */
$weblog_extras_file_path = weblog_file_directory('acmethemes/core/extras.php');
require $weblog_extras_file_path;