<?php
/**
 * Template Name: Contact Page Template
 *
 * Displays the contact page template.
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
		 * ultimate_contact_page_template_content hook
		 *
		 * HOOKED_FUNCTION_NAME PRIORITY
		 *
		 * ultimate_display_contact_page_template_content 10
		 */
		do_action( 'ultimate_contact_page_template_content' );
	?>
	<?php
		/** 
		 * ultimate_after_main_container hook
		 */
		do_action( 'ultimate_after_main_container' );
	?>
<?php get_footer(); ?>
