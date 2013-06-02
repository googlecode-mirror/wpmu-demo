<?php
/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
include_once('option-tree/ot-loader.php');
/**
 * Theme Options
 */
include_once('option-tree/theme-options.php');

/* URI shortcuts
================================================== */
define( 'THEME_ASSETS', get_bloginfo( 'template_url' ) . '/assets/', true );
define( 'GETTEXT_DOMAIN', 'fusion' );

/* Localization v 1.0.2
================================================== */
add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain( GETTEXT_DOMAIN, get_template_directory() . '/languages');
}

/* Register WP Menus
================================================== */
function register_menu() {
	register_nav_menu('primary-menu', __('Primary Menu'));
}
add_action('init', 'register_menu');

/* Thumbnails
================================================== */
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 56, 56, true ); // Normal post thumbnails
	add_image_size( 'blog', 692, 262, true ); // Blog thumbnail
	add_image_size( 'post-tabs-widget', 46, 46, true ); // Post tabs widget thumbnail
	add_image_size( 'posts-widget', 82, 82, true ); // Posts widget 2 thumbnail
	add_image_size( 'full-width-page', 932, 370, true ); // Full width template thumbnail
    add_image_size( '460x306', 460, 306, true ); // 460x306 thumbnail
    add_image_size( '700x465', 700, 465, true ); // 700x465 thumbnail
    add_image_size( '420x207', 420, 207, true ); // 420x207 thumbnail
    add_image_size( '412x229', 412, 229, true ); // 412x229 thumbnail    
}
/* Register and load JS, CSS
================================================== */
function theme_enqueue_scripts() {
    
    // register scripts
    wp_register_style('fusion-hoveralls', THEME_ASSETS . 'css/fusionHoverAlls.css');
    wp_register_style('hoveralls', THEME_ASSETS . 'hoveralls/css/hoveralls.css');
    wp_register_style('pp-styles', THEME_ASSETS . 'prettyPhoto/prettyPhoto.css');
    
	wp_deregister_script('jquery');
    wp_register_script('jquery', THEME_ASSETS.'js/google.load.jquery.js');
    wp_register_script('jqueryui', THEME_ASSETS.'js/google.load.jqueryui.js', 'jquery');
    wp_register_script('jqueryui-function', THEME_ASSETS.'js/jqueryui.function.js', 'jquery');
    wp_register_script('caroufredsel', THEME_ASSETS.'js/carouFredSel/jquery.carouFredSel-5.5.0-packed.js', 'jquery');
    wp_register_script('caroufredsel-function', THEME_ASSETS.'js/carouFredSel/jquery.carouFredSel-functions.js', 'jquery');
    wp_register_script('animate-colors', THEME_ASSETS.'js/jquery.animate-colors-min.js', 'jquery');
    wp_register_script('seaofclouds', THEME_ASSETS.'js/seaofclouds/jquery.tweet.js', 'jquery');
    wp_register_script('easing', THEME_ASSETS.'hoveralls/js/jquery.easing.1.3.min.js', 'jquery');
    wp_register_script('hoveralls', THEME_ASSETS.'hoveralls/js/jquery.hoveralls.min.js', 'jquery');
    wp_register_script('hoveralls-functions', THEME_ASSETS.'hoveralls/js/jquery.hoveralls-functions.js', 'jquery');
    wp_register_script('hoverintent', THEME_ASSETS.'js/superfish-1.4.8/hoverIntent.js', 'jquery');
    wp_register_script('superfish', THEME_ASSETS.'js/superfish-1.4.8/superfish.js', 'jquery');
    wp_register_script('superfish-functions', THEME_ASSETS.'js/superfish-1.4.8/superfish.function.js', 'jquery');
    wp_register_script('pp', THEME_ASSETS.'prettyPhoto/jquery.prettyPhoto.js', 'jquery');
    wp_register_script('pp-function', THEME_ASSETS.'prettyPhoto/prettyPhoto.function.js', 'jquery');
    wp_register_script('navigation-function', THEME_ASSETS.'js/navigation.function.js', 'jquery');
    wp_register_script('functions', THEME_ASSETS.'js/functions.js', 'jquery');
	
	// enqueue scripts
	wp_enqueue_script('jquery');
    wp_enqueue_script('jqueryui');
    wp_enqueue_script('jqueryui-function');
    wp_enqueue_script('caroufredsel');
    wp_enqueue_script('caroufredsel-function');
    wp_enqueue_script('animate-colors');
    wp_enqueue_script('seaofclouds');
    wp_enqueue_style('fusion-hoveralls');
    wp_enqueue_style('hoveralls');
    wp_enqueue_script('easing');
    wp_enqueue_script('hoveralls');
    wp_enqueue_script('hoveralls-functions');
    wp_enqueue_script('hoverintent');
    wp_enqueue_script('superfish');
    wp_enqueue_script('superfish-functions');
    wp_enqueue_script('navigation-function');
    wp_enqueue_script('functions');
    wp_enqueue_style('pp-styles');
    wp_enqueue_script('pp');
    wp_enqueue_script('pp-function'); 

}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

/* Sidebar
================================================== */
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Main Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Footer',
		'before_widget' => '<div class="four columns"><div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Contact Page Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Portfolio Post Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Front Page',
        'description' => 'The Sidebar for (Service Widget, Portfolio Widget and News Widget)  widgets.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
}
/* Excerpt filter 30 words 
================================================== */
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/* Excerpt&content words filter
================================================== */  
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'&#91;...&#93;';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'&#91;...&#93;';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

/* Unregister all default WP Widgets
================================================== */
function unregister_default_wp_widgets() {
    unregister_widget('WP_Widget_Calendar');;
    unregister_widget('WP_Widget_Search');
}
add_action('widgets_init', 'unregister_default_wp_widgets', 1);

/* Theme Widgets
================================================== */
require_once (TEMPLATEPATH. '/functions/widget-post-tabs.php');
require_once (TEMPLATEPATH. '/functions/widget-cse.php');
require_once (TEMPLATEPATH. '/functions/widget-search.php');
require_once (TEMPLATEPATH. '/functions/widget-posts.php');
require_once (TEMPLATEPATH. '/functions/widget-posts2.php');
require_once (TEMPLATEPATH. '/functions/widget-twitter.php');
require_once (TEMPLATEPATH. '/functions/widget-testimonial.php');
require_once (TEMPLATEPATH. '/functions/widget-accordion.php');
require_once (TEMPLATEPATH. '/functions/widget-toggle.php');
require_once (TEMPLATEPATH. '/functions/widget-tabs.php');
require_once (TEMPLATEPATH. '/functions/widget-carousel.php');
require_once (TEMPLATEPATH. '/functions/widget-service.php');
require_once (TEMPLATEPATH. '/functions/widget-portfolio.php');
require_once (TEMPLATEPATH. '/functions/widget-news.php');
require_once (TEMPLATEPATH. '/functions/widget-contact.php');

/*  include the library for the layers slider
================================================== */
require_once dirname(__FILE__) . '/sliders/LayerSlider/layerslider.php';

function get_layerslider() {
    
    $slides = unserialize(get_option('layerslider-slides'));
    $sliders = array();
    
    if ( ! is_array( $slides ) || empty( $slides ) )
        return array();
                            
    foreach ( $slides as $id => $options )
        $sliders[ $id+1 ] = 'LayerSlider #' . ($id+1);
    return $sliders;
    
}
/*  include the library for the uno slider
================================================== */
require_once dirname(__FILE__) . '/sliders/unoslider/unoslider.php';

$plugin = dirname(__FILE__) . '/sliders/unoslider/unoslider.php';

$plugin = plugin_basename( trim( $plugin ) );
do_action( 'activate_plugin', $plugin);
do_action( 'activate_' . $plugin);
do_action( 'activated_plugin', $plugin);

function get_unoslider() {
    global $wpdb;
    $table_name = $wpdb->prefix . "unoslider";
    $slides = $wpdb->get_results("SELECT id, title FROM $table_name ORDER BY id");
    foreach ( $slides as $id => $options)    
        $sliders[ $id+1 ] .= $options->title;
    return $sliders;
}
/* Theme Options
================================================== */
require_once (TEMPLATEPATH. '/functions/theme_walker.php');
require_once (TEMPLATEPATH. '/functions/theme_breadcrumb.php');
require_once (TEMPLATEPATH. '/functions/theme_comments.php');
require_once (TEMPLATEPATH. '/functions/custom-post_fields.php');
require_once (TEMPLATEPATH. '/functions/theme_video.php');
require_once (TEMPLATEPATH. '/functions/shortcodes.php');
include_once (TEMPLATEPATH. '/admin/shortcode-tinymce.php');
require_once (TEMPLATEPATH. '/functions/post_types.php');
require_once (TEMPLATEPATH. '/functions/custom-portfolio_fields.php');
require_once (TEMPLATEPATH. '/functions/custom-page_fields.php');
require_once (TEMPLATEPATH. '/functions/custom-page-portfolio_fields.php');
?>