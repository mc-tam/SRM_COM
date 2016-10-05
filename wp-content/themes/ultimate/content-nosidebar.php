<?php
/**
 * This file displays page with no sidebar.
 *
 * @package Theme Horse
 * @subpackage Ultimate
 * @since Ultimate 1.0
 */
?>
<?php
   /**
    * ultimate_before_loop_content
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * ultimate_loop_before 10
    */
   do_action( 'ultimate_before_loop_content' );
   /**
    * ultimate_loop_content
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * ultimate_theloop 10
    */
   do_action( 'ultimate_loop_content' );
   /**
    * ultimate_after_loop_content
	 *
	 * HOOKED_FUNCTION_NAME PRIORITY
	 *
	 * ultimate_next_previous 5
	 * ultimate_loop_after 10
    */
   do_action( 'ultimate_after_loop_content' );
?>
