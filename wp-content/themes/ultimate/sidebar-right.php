<?php
/**
 * Displays the right sidebar of the theme.
 *
 * @package Theme Horse
 * @subpackage Ultimate
 * @since Ultimate 1.0
 */
?>
<?php
	/**
	 * ultimate_before_right_sidebar
	 */
	do_action( 'ultimate_before_right_sidebar' );
?>
<?php
	/** 
	 * ultimate_right_sidebar hook
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * ultimate_display_right_sidebar 10
	 */
	do_action( 'ultimate_right_sidebar' );
?>
<?php
	/**
	 * ultimate_after_right_sidebar
	 */
	do_action( 'ultimate_after_right_sidebar' );
?>
