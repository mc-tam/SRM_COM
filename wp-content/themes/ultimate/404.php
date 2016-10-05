<?php
/**
 * Displays the 404 error page of the theme.
 *
 * @package Theme Horse
 * @subpackage Ultimate
 * @since Ultimate 1.0
 */
?>
<?php get_header(); ?>
<?php
	/** 
	 * ultimate_404_content hook
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * ultimate_display_404_page_content 10
	 */
	do_action( 'ultimate_404_content' );
?>
<?php get_footer(); ?>
