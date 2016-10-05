<?php
/**
 * Displays the footer sidebar of the theme.
 *
 * @package Theme Horse
 * @subpackage Ultimate
 * @since Ultimate 1.0
 */
?>
<?php
	/**
	 * ultimate_before_footer_sidebar
	 */
	do_action( 'ultimate_before_footer_sidebar' );
?>
<?php
	/** 
	 * ultimate_footer_sidebar hook
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * ultimate_display_footer_sidebar 10
	 */
	do_action( 'ultimate_footer_sidebar' );
?>
<?php
	/**
	 * ultimate_after_footer_sidebar
	 */
	do_action( 'ultimate_after_footer_sidebar' );
?>
