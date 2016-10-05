<?php
/**
 * Contains all the current date, year of the theme.
 *
 * @package Theme Horse
 * @subpackage Ultimate
 * @since Ultimate 1.0
 */
/**
 * To display the current year.
 *
 * @uses date() Gets the current year.
 * @return string
 */
function ultimate_the_year() {
   return date( 'Y' );
}
/**
 * To display a link back to the site.
 *
 * @uses get_bloginfo() Gets the site link
 * @return string
 */
function ultimate_site_link() {
   return '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" ><span>' . get_bloginfo( 'name', 'display' ) . '</span></a>';
}
/**
 * To display a link to WordPress.org.
 *
 * @return string
 */
function ultimate_wp_link() {
   return '<a href="'.esc_url( 'http://wordpress.org' ).'" target="_blank" title="' . esc_attr__( 'WordPress', 'ultimate' ) . '"><span>' . __( 'WordPress', 'ultimate' ) . '</span></a>';
}
/**
 * To display a link to ultimate.com.
 *
 * @return string
 */
function ultimate_themehorse_link() {
   return '<a href="'.esc_url( 'http://themehorse.com' ).'" target="_blank" title="'.esc_attr__( 'Theme Horse', 'ultimate' ).'" ><span>'.__( 'Theme Horse', 'ultimate') .'</span></a>';
}
?>
