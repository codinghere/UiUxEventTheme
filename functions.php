<?php


// include_once("inc/customizer/kirki-installer.php");
// include_once("inc/customizer/customizer-main.php");

require_once get_theme_file_path("/lib/csf/cs-framework.php");
require_once get_theme_file_path("/inc/metaboxs/section.php");
require_once get_theme_file_path("/inc/metaboxs/page.php");
require_once get_theme_file_path("/inc/metaboxs/section-banner.php");
require_once get_theme_file_path("/inc/metaboxs/section-about.php");
require_once get_theme_file_path("/inc/metaboxs/section-speaker.php");
require_once get_theme_file_path("/inc/metaboxs/section-schedule.php");
require_once get_theme_file_path("/inc/metaboxs/section-gallery.php");
require_once get_theme_file_path("/inc/metaboxs/section-ticket.php");
require_once get_theme_file_path("/inc/metaboxs/section-sponser.php");
require_once get_theme_file_path("/inc/metaboxs/taxonomy-featured.php");


// require_once(get_theme_file_path('/widgets/social-icons-widget.php'));

define('CS_ACTIVE_FRAMEWORK', false); // default true
define('CS_ACTIVE_METABOX', true); // default true
define('CS_ACTIVE_TAXONOMY', true); // default true
define('CS_ACTIVE_SHORTCODE', false); // default true
define('CS_ACTIVE_CUSTOMIZE', false); // default true
/*---------------------------------------------------------*/
/* Theme Initial Setup */
/*---------------------------------------------------------*/
if (!function_exists('event_setup')) {

	function event_setup() {
		
		/* REGISTER TEXT DOMAIN FOR TRANSLATION */
		load_theme_textdomain( 'event', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		
		add_theme_support( 'title-tag' );

		
		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
		'topmenu' => esc_html__( 'Top Menu', 'bloggy' ),
		'footer-menu'=>esc_html__( 'Footer Menu','bloggy')
	    ) );


		add_theme_support('custom-logo',array(
		'header-text'          => array( 'site-title', 'site-description' ),
		'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,

       
		));
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'caption',
		) );
		add_image_size("event-home-square", 400, 400, true);

		add_theme_support( 'custom-background', apply_filters( 'event_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );


	}
}


add_action( 'after_setup_theme', 'event_setup' );

/*---------------------------------------------------------*/
/* Register Sidebar */
/*---------------------------------------------------------*/
function event_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'event_content_width', 1170 );
}
add_action( 'after_setup_theme', 'event_content_width', 0 );

function event_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'event' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'event' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	 register_sidebar( array(
        'name'          => __( 'Before Footer Section', 'event' ),
        'id'            => 'before-footer-right',
        'description'   => __( 'before footer section, right side', 'event' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
	 register_sidebar( array(
        'name'          => __( 'Footer Bottom Section', 'event' ),
        'id'            => 'footer-bottom',
        'description'   => __( 'footer section, bottom side', 'event' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

}
add_action( 'widgets_init', 'event_widgets_init' );

/*---------------------------------------------------------*/
/* Include Theme assets */
/*---------------------------------------------------------*/

function event_assets(){
	$var = '1.0';

	/* FONTS */
	wp_enqueue_style('google-fonts','//fonts.googleapis.com/css?family=Barlow:300,400,500,700%7CWork+Sans:400,500,700&display=swap');
	/* CSS */
	wp_enqueue_style('bootstrap',get_theme_file_uri('/assets/css/bootstrap.min.css'),null,$var);
	wp_enqueue_style('fontawesome',get_theme_file_uri('/assets/css/font-awesome.min.css'),null,$var);	
	wp_enqueue_style('owl-carousel',get_theme_file_uri('/assets/plugins/owlcarousel/owl.carousel.min.css'),null,$var);		
	wp_enqueue_style('magnific-popup',get_theme_file_uri('/assets/plugins/megnipic-popup/magnific-popup.css'),null,$var);
	wp_enqueue_style('style',get_theme_file_uri('/assets/css/style.css'),null,$var);
	wp_enqueue_style('custom',get_theme_file_uri('/assets/css/custom.css'),null,$var);
	wp_enqueue_style('event-css',get_stylesheet_uri());

	/* JavaScripts */

	wp_enqueue_script("jquery-min", get_theme_file_uri("/assets/js/jquery-3.3.1.min.js"), null, "1.0");
	wp_enqueue_script('bootstrap',get_theme_file_uri('/assets/js/bootstrap.bundle.min.js'),['jquery'],'default',true);
	wp_enqueue_script('waypoints-min',get_theme_file_uri('/assets/js/jquery.waypoints.min.js'),['jquery'],'default',true);
	wp_enqueue_script('owlcarousel-min',get_theme_file_uri('/assets/plugins/owlcarousel/owl.carousel.min.js'),['jquery'],'default',true);
	wp_enqueue_script('countdown-min',get_theme_file_uri('/assets/plugins/countdown-timer/countdown.min.js'),['jquery'],'default',true);
	wp_enqueue_script('magnific-popup',get_theme_file_uri('/assets/plugins/megnipic-popup/jquery.magnific-popup.min.js'),['jquery'],'default',true);
	wp_enqueue_script('retina',get_theme_file_uri('/assets/plugins/retinajs/retina.min.js'),['jquery'],'default',true);
	wp_enqueue_script('menu',get_theme_file_uri('/assets/js/menu.min.js'),['jquery'],'default',true);
	wp_enqueue_script('main',get_theme_file_uri('/assets/js/main.js'),['jquery'],'default',true);
	wp_enqueue_script('main',get_theme_file_uri('/assets/js/custom.js'),['jquery'],'default',true);


}
add_action('wp_enqueue_scripts','event_assets');



function event_csf_metabox()
{
    CSFramework_Taxonomy::instance(array());  
    CSFramework_Metabox::instance(array());
//    CSFramework_Shortcode_Manager::instance(array());
    // $settings = array(
    //     'menu_title'      => __( 'Event Options', 'event' ),
    //     'menu_type'       => 'submenu',
    //     'menu_parent'     => 'themes.php',
    //     'menu_slug'       => 'meal_option_panel',
    //     'framework_title' => __( 'Event Options', 'event' ),
    //     'menu_icon'       => 'dashicons-dashboard',
    //     'menu_position'   => 20,
    //     'ajax_save'       => false,
    //     'show_reset_all'  => true
    // );
    // new CSFramework($settings,meal_get_theme_options());
}


add_action('init', 'event_csf_metabox');








