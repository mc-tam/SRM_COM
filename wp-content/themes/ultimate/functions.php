<?php
/**
* Ultimate defining constants, adding files and WordPress core functionality.
*
* Defining some constants, loading all the required files and Adding some core functionality.
* @uses add_theme_support() To add support for post thumbnails and automatic feed links.
* @uses register_nav_menu() To add support for navigation menu.
* @uses set_post_thumbnail_size() To set a custom post thumbnail size.
*
* @package Theme Horse
* @subpackage Ultimate
* @since Ultimate 1.0
*/
add_action('after_setup_theme', 'ultimate_setup');
/**
* This content width is based on the theme structure and style.
*/
function ultimate_setup() {
global $content_width;
	if (!isset($content_width)) {
	$content_width = 700;
	}
}
add_action('ultimate_init', 'ultimate_constants', 10);
/**
* This function defines the Ultimate theme constants
*
* @since 1.0
*/
function ultimate_constants() {
	/** Define Directory Location Constants */
	define('ULTIMATE_PARENT_DIR', get_template_directory());
	define('ULTIMATE_CHILD_DIR', get_stylesheet_directory());
	define('ULTIMATE_IMAGES_DIR', ULTIMATE_PARENT_DIR.'/images');
	define('ULTIMATE_INC_DIR', ULTIMATE_PARENT_DIR.'/inc');
	define('ULTIMATE_PARENT_CSS_DIR', ULTIMATE_PARENT_DIR.'/css');
	define('ULTIMATE_ADMIN_DIR', ULTIMATE_INC_DIR.'/admin');
	define('ULTIMATE_ADMIN_IMAGES_DIR', ULTIMATE_ADMIN_DIR.'/images');
	define('ULTIMATE_ADMIN_JS_DIR', ULTIMATE_ADMIN_DIR.'/js');
	define('ULTIMATE_ADMIN_CSS_DIR', ULTIMATE_ADMIN_DIR.'/css');
	define('ULTIMATE_JS_DIR', ULTIMATE_PARENT_DIR.'/js');
	define('ULTIMATE_CSS_DIR', ULTIMATE_PARENT_DIR.'/css');
	define('ULTIMATE_FUNCTIONS_DIR', ULTIMATE_INC_DIR.'/functions');
	define('ULTIMATE_SHORTCODES_DIR', ULTIMATE_INC_DIR.'/footer_info');
	define('ULTIMATE_STRUCTURE_DIR', ULTIMATE_INC_DIR.'/structure');
	if (!defined('ULTIMATE_LANGUAGES_DIR'))/** So we can define with a child theme */
	{
	define('ULTIMATE_LANGUAGES_DIR', ULTIMATE_PARENT_DIR.'/languages');
	}
	define('ULTIMATE_WIDGETS_DIR', ULTIMATE_INC_DIR.'/widgets');
	/** Define URL Location Constants */
	define('ULTIMATE_PARENT_URL', get_template_directory_uri());
	define('ULTIMATE_CHILD_URL', get_stylesheet_directory_uri());
	define('ULTIMATE_IMAGES_URL', ULTIMATE_PARENT_URL.'/images');
	define('ULTIMATE_INC_URL', ULTIMATE_PARENT_URL.'/inc');
	define('ULTIMATE_ADMIN_URL', ULTIMATE_INC_URL.'/admin');
	define('ULTIMATE_ADMIN_JS_URL', ULTIMATE_ADMIN_URL.'/js');
	define('ULTIMATE_JS_URL', ULTIMATE_PARENT_URL.'/js');
	define('ULTIMATE_CSS_URL', ULTIMATE_PARENT_URL.'/css');
	define('ULTIMATE_FUNCTIONS_URL', ULTIMATE_INC_URL.'/functions');
	define('ULTIMATE_SHORTCODES_URL', ULTIMATE_INC_URL.'/footer_info');
	define('ULTIMATE_STRUCTURE_URL', ULTIMATE_INC_URL.'/structure');
	if (!defined('ULTIMATE_LANGUAGES_URL'))/** So we can predefine to child theme */
	{
	define('ULTIMATE_LANGUAGES_URL', ULTIMATE_PARENT_URL.'/languages');
	}
	define('ULTIMATE_WIDGETS_URL', ULTIMATE_INC_URL.'/widgets');
}
add_action('ultimate_init', 'ultimate_load_files', 15);
/**
* Loading the included files.
*
* @since 1.0
*/
function ultimate_load_files() {
/**
* ultimate_add_files hook
*
* Adding other addtional files if needed.
*/
do_action('ultimate_add_files');
/** Load functions */
require_once (ULTIMATE_FUNCTIONS_DIR.'/i18n.php');
require_once (ULTIMATE_FUNCTIONS_DIR.'/custom-header.php');
require_once (ULTIMATE_FUNCTIONS_DIR.'/functions.php');
require_once (ULTIMATE_FUNCTIONS_DIR.'/customizer.php');
require_once (ULTIMATE_FUNCTIONS_DIR.'/custom-style.php');
require_once (ULTIMATE_ADMIN_DIR.'/ultimate-themedefaults-value.php');
require_once (ULTIMATE_ADMIN_DIR.'/ultimate-metaboxes.php');
/** Load Shortcodes */
require_once (ULTIMATE_SHORTCODES_DIR.'/ultimate-footer_info.php');
/** Load Structure */
require_once (ULTIMATE_STRUCTURE_DIR.'/header-extensions.php');
require_once (ULTIMATE_STRUCTURE_DIR.'/searchform-extensions.php');
require_once (ULTIMATE_STRUCTURE_DIR.'/sidebar-extensions.php');
require_once (ULTIMATE_STRUCTURE_DIR.'/footer-extensions.php');
require_once (ULTIMATE_STRUCTURE_DIR.'/content-extensions.php');
/** Load Widgets and Widgetized Area */
require_once (ULTIMATE_WIDGETS_DIR.'/ultimate_widgets.php');
}
add_action('ultimate_init', 'ultimate_core_functionality', 20);
/**
* Adding the core functionality of WordPess.
*
* @since 1.0
*/
function ultimate_core_functionality() {
/**
* ultimate_add_functionality hook
*
* Adding other addtional functionality if needed.
*/
do_action('ultimate_add_functionality');
// Add default posts and comments RSS feed links to head
add_theme_support('automatic-feed-links');
/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );
// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page.
add_theme_support('post-thumbnails');
// This theme uses wp_nav_menu() in header menu location.
register_nav_menu('primary', __('Primary Menu', 'ultimate'));
// Add Ultimate custom image sizes
add_image_size('featured-medium', 250, 215, true);// used to show blog post medium
add_image_size('slider', 978, 440, true);// used to show featured slider and blog post large
add_image_size('gallery', 475, 345, true);// used to show gallery and recent work
add_image_size('services', 460, 250, true);//used to show services on business layout
/**
* This theme supports custom background color and image
*/
add_theme_support('custom-background');
// Adding excerpt option box for pages as well
add_post_type_support('page', 'excerpt');
}
/**
* ultimate_init hook
*
* Hooking some functions of functions.php file to this action hook.
*/
do_action('ultimate_init');
?>
