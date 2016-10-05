<?php
/**
 * Shows the sidebar content.
 *
 * @package 		Theme Horse
 * @subpackage 		Ultimate
 * @since 			Ultimate 1.0
 * @license 		http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link 			http://themehorse.com/themes/ultimate
 */
/****************************************************************************************/
add_action( 'ultimate_left_sidebar', 'ultimate_display_left_sidebar', 10 );
/**
 * Show widgets of left sidebar.
 *
 * Shows all the widgets that are dragged and dropped on the left Sidebar.
 */
function ultimate_display_left_sidebar() {
	// Calling the left sidebar
	if ( is_active_sidebar( 'ultimate_left_sidebar' ) ) :
	dynamic_sidebar( 'ultimate_left_sidebar' );
	endif;
}
/****************************************************************************************/
add_action( 'ultimate_right_sidebar', 'ultimate_display_right_sidebar', 10 );
/**
 * Show widgets of right sidebar.
 *
 * Shows all the widgets that are dragged and dropped on the right Sidebar.
 */
function ultimate_display_right_sidebar() {
	// Calling the right sidebar
	if ( is_active_sidebar( 'ultimate_right_sidebar' ) ) :
	dynamic_sidebar( 'ultimate_right_sidebar' );
	endif;
}
/****************************************************************************************/
add_action( 'ultimate_contact_page_sidebar', 'ultimate_display_contact_page_sidebar', 10 );
/**
 * Show widgets on Contact Page Template's sidebar.
 *
 * Shows all the widgets that are dragged and dropped on the Contact Page Sidebar.
 */
function ultimate_display_contact_page_sidebar() {
	// Calling the conatact page sidebar
	if ( is_active_sidebar( 'ultimate_contact_page_sidebar' ) ) :
	dynamic_sidebar( 'ultimate_contact_page_sidebar' );
	endif;
}
/****************************************************************************************/
add_action( 'ultimate_footer_sidebar', 'ultimate_display_footer_sidebar', 10 );
/**
 * Show widgets on Footer of the theme.
 *
 * Shows all the widgets that are dragged and dropped on the Footer Sidebar.
 */
function ultimate_display_footer_sidebar() {
	if( is_active_sidebar( 'ultimate_footer_sidebar' ) || is_active_sidebar( 'ultimate_footer_column2' ) || is_active_sidebar( 'ultimate_footer_column3' ) ) {
		?>
<div class="widget-wrap">
  <div class="container">
    <div class="widget-area clearfix">
      <div class="one-third">
        <?php
			// Calling the footer column 1 sidebar
			if ( is_active_sidebar( 'ultimate_footer_sidebar' ) ) :
			dynamic_sidebar( 'ultimate_footer_sidebar' );
			endif;
			?>
      </div><!-- .one-third -->
      <div class="one-third">
        <?php
			// Calling the footer column 2 sidebar
			if ( is_active_sidebar( 'ultimate_footer_column2' ) ) :
			dynamic_sidebar( 'ultimate_footer_column2' );
			endif;
			?>
      </div><!-- .one-third -->
      <div class="one-third">
        <?php
			// Calling the footer column 3 sidebar
			if ( is_active_sidebar( 'ultimate_footer_column3' ) ) :
			dynamic_sidebar( 'ultimate_footer_column3' );
			endif;
			?>
      </div><!-- .one-third --> 
    </div><!-- .widget-area --> 
  </div><!-- .container --> 
</div><!-- .widget-wrap -->
<?php
	}
}
?>
