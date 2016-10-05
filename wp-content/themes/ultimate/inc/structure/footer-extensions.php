<?php
/**
 * Adds footer structures.
 *
 * @package 		Theme Horse
 * @subpackage 		Ultimate
 * @since 			Ultimate 1.0
 * @license 		http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link 			http://themehorse.com/themes/ultimate
 */
/****************************************************************************************/
global $options, $array_of_default_settings;
$options = wp_parse_args( get_option( 'ultimate_theme_options', array() ), ultimate_get_option_defaults());
/****************************************************************************************/
if ((1 != $options['disable_bottom']) && (!empty($options['social_phone'] ) || !empty($options['social_email'] ) || !empty($options['social_location']))) {
add_action( 'ultimate_footer', 'ultimate_footer_infoblog', 5 );
}
/****************************************************************************************/
add_action( 'ultimate_footer', 'ultimate_footer_widget_area', 15 );
/** 
 * Displays the footer widgets
 */
function ultimate_footer_widget_area() {
	get_sidebar( 'footer' );
}
/****************************************************************************************/
add_action( 'ultimate_footer', 'ultimate_open_sitegenerator_div', 20 );
/**
 * Opens the site generator div.
 */
function ultimate_open_sitegenerator_div() {
	echo '
	<div id="site-generator">
				<div class="container clearfix">';
}
/****************************************************************************************/
add_action( 'ultimate_footer', 'ultimate_socialnetworks', 25 );
/****************************************************************************************/
add_action( 'ultimate_footer', 'ultimate_footer_info', 30 );
/**
 * function to show the footer info, copyright information
 */
function ultimate_footer_info() {         
   $output = '<div class="copyright">'.__( 'Copyright &copy;', 'ultimate' ).' '.ultimate_the_year().' ' .ultimate_site_link().' | ' . ' '.__( 'Theme by:', 'ultimate' ).' '.ultimate_themehorse_link().' | '.' '.__( 'Powered by:', 'ultimate' ).' '.ultimate_wp_link() .'</div><!-- .copyright -->';
   echo $output;
}
/****************************************************************************************/
add_action( 'ultimate_footer', 'ultimate_close_sitegenerator_div', 35 );
/**
 * Shows the back to top icon to go to top.
 */
function ultimate_close_sitegenerator_div() {
echo '</div><!-- .container -->	
			</div><!-- #site-generator -->';
}
/****************************************************************************************/
add_action( 'ultimate_footer', 'ultimate_backtotop_html', 40 );
/**
 * Shows the back to top icon to go to top.
 */
function ultimate_backtotop_html() {
	echo '<div class="back-to-top"><a href="#branding">'.__( ' ', 'ultimate' ).'</a></div>';
} 
?>
