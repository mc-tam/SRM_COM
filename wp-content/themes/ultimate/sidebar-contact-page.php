<?php
/**
 * Displays the sidebar on contact page template.
 *
 * @package Theme Horse
 * @subpackage Ultimate
 * @since Ultimate 1.0
 */
?>
<?php
	/**
	 * ultimate_before_contact_page_sidebar
	 */
	do_action( 'ultimate_before_contact_page_sidebar' );
?>
<?php
	/** 
	 * ultimate_contact_page_sidebar hook
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * ultimate_display_contact_page_sidebar 10
	 */
	do_action( 'ultimate_contact_page_sidebar' );
?>
<?php
	/**
	 * ultimate_after_contact_page_sidebar
	 */
	do_action( 'ultimate_after_contact_page_sidebar' );
?>
