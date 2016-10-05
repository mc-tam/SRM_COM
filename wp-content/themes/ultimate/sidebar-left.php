<?php
/**
 * Displays the left sidebar of the theme.
 *
 * @package Theme Horse
 * @subpackage Ultimate
 * @since Ultimate 1.0
 */
?>
<?php
	/**
	 * ultimate_before_left_sidebar
	 */
	do_action( 'ultimate_before_left_sidebar' );
?>
<?php
	/** 
	 * ultimate_left_sidebar hook
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * ultimate_display_left_sidebar 10
	 */
	do_action( 'ultimate_left_sidebar' );
?>
<?php
	/**
	 * ultimate_after_left_sidebar
	 */
	do_action( 'ultimate_after_left_sidebar' );
?>
