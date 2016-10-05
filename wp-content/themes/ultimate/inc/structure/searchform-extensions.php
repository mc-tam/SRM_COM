<?php
/**
 * Renders the search form of the theme.
 *
 * @package 		Theme Horse
 * @subpackage 		Ultimate
 * @since 			Ultimate 1.0
 * @license 		http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link 			http://themehorse.com/themes/ultimate
 */
add_action( 'ultimate_searchform', 'ultimate_display_searchform', 10 );
/**
 * Displaying the search form.
 */
function ultimate_display_searchform() {
?>
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="searchform clearfix">
		<label class="assistive-text">
			<?php _e( 'Search', 'ultimate' ); ?>
		</label>
		<input type="search" placeholder="<?php esc_attr_e( 'Search', 'ultimate' ); ?>" class="s field" name="s">
		<input type="submit" value="<?php esc_attr_e( 'Search', 'ultimate' ); ?>" class="search-submit">
	</form><!-- .search-form -->
	<?php
} ?>
