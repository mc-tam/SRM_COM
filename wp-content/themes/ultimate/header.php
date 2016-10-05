<?php
/**
 * Displays the header section of the theme.
 *
 * @package Theme Horse
 * @subpackage Ultimate
 * @since Ultimate 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes();?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes();?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes();?>>
<!--<![endif]-->
<head>
<?php
/**
 * ultimate_title hook
 *
 * HOOKED_FUNCTION_NAME PRIORITY
 *
 * ultimate_add_meta_name 5
 *
 */
//global $ultimate_theme_setting_value;
//echo $ultimate_theme_setting_value['home_slogan1' ];
do_action('ultimate_title');

/**
 * ultimate_meta hook
 */
do_action('ultimate_meta');

/**
 * ultimate_links hook
 *
 * HOOKED_FUNCTION_NAME PRIORITY
 *
 * ultimate_add_links 10
 * ultimate_favicon 15
 * ultimate_webpage_icon 20
 *
 */
do_action('ultimate_links');?>
<?php
/**
 * This hook is important for WordPress plugins and other many things
 */
wp_head();
?>
</head>
<body <?php body_class();?>>
<?php
/**
 * ultimate_before hook
 */
do_action('ultimate_before');
?>
<div class="wrapper">
<?php
/**
 * ultimate_before_header hook
 */
do_action('ultimate_before_header');
?>
<header id="branding" >
<?php
/**
 * ultimate_header hook
 *
 * HOOKED_FUNCTION_NAME PRIORITY
 *
 * ultimate_headercontent_details 10
 */
do_action('ultimate_header');
?>
<?php if(is_home() || is_front_page()){
echo '</div><!-- .container -->';
	} ?>
</div><!-- .header-main -->
</header>
<?php
/**
 * ultimate_after_header hook
 */
do_action('ultimate_after_header');
?>
<?php
/**
 * ultimate_before_main hook
 */
do_action('ultimate_before_main');
?>
<div id="main">
<?php if(!is_page_template( 'page-templates/page-template-business.php' )){
echo '<div class="container clearfix">';
} ?>
