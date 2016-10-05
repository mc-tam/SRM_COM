<?php
/**
 * Displays the index section of the theme.
 *
 * @package Theme Horse
 * @subpackage Ultimate
 * @since Ultimate 1.0
 */
?>
<?php get_header(); ?>
<?php
	/** 
	 * ultimate_before_main_container hook
	 */
	do_action( 'ultimate_before_main_container' );
?>
<?php
		/** 
		 * ultimate_main_container hook
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * ultimate_content 10
		 */
		do_action( 'ultimate_main_container' );
	?>
<?php
	/** 
	 * ultimate_after_main_container hook
	 */
	do_action( 'ultimate_after_main_container' );
?>
<?php get_footer(); ?>
