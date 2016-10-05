<?php
/**
 * Displays the footer section of the theme.
 *
 * @package 		Theme Horse
 * @subpackage 		Ultimate
 * @since 			Ultimate 1.0
 */
?>
<?php if(!is_page_template( 'page-templates/page-template-business.php' )){
echo '</div><!-- .container -->';
} ?>
</div><!-- #main -->
<?php
	      /** 
	       * ultimate_after_main hook
	       */
	      do_action( 'ultimate_after_main' );
	   ?>
<?php 
	   	/**
	   	 * ultimate_before_footer hook
	   	 */
	   	do_action( 'ultimate_before_footer' );
	   ?>
<footer id="colophon" class="clearfix">
  <?php
	      /** 
	       * ultimate_footer hook		       
			 *
			 * HOOKED_FUNCTION_NAME PRIORITY
			 *
			 * ultimate_footer_widget_area 5
			 * ultimate_footer_infoblog 10
			 * ultimate_footer_div_close 15
			 * ultimate_open_sitegenerator_div 20
			 * ultimate_socialnetworks 25
			 * ultimate_footer_info 30
			 * ultimate_close_sitegenerator_div 35
			 * ultimate_backtotop_html 40
	       */
	      do_action( 'ultimate_footer' );
		   ?>
</footer>
<?php 
	   	/**
	   	 * ultimate_after_footer hook
	   	 */
	   	do_action( 'ultimate_after_footer' );
	   ?>
</div><!-- .wrapper -->
<?php
		/** 
		 * ultimate_after hook
		 */
		do_action( 'ultimate_after' );
	?>
<?php wp_footer(); ?>
	</body>
</html>
