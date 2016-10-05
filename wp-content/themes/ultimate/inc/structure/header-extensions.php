<?php
/**
 * Adds header structures.
 *
 * @package 		Theme Horse
 * @subpackage 		Ultimate
 * @since 			Ultimate 1.0
 * @license 		http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link 			http://themehorse.com/themes/ultimate
 */
/****************************************************************************************/
add_action('ultimate_title', 'ultimate_add_meta_name', 5);
/**
 * Add meta tags.
 */
function ultimate_add_meta_name() { ?>
	<meta charset="<?php bloginfo('charset');?>" />
	<?php
	global $options, $array_of_default_settings;
	$options = wp_parse_args( get_option( 'ultimate_theme_options', array() ), ultimate_get_option_defaults());
		if ('on' == $options['site_design']) {?>
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<?php } else {?>
			<meta name="viewport" content="width=1078" />
		<?php }
}
/****************************************************************************************/
add_action('ultimate_links', 'ultimate_add_links', 10);
/**
 * Adding link to stylesheet file
 *
 * @uses get_stylesheet_uri()
 */
function ultimate_add_links() {
	?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url');?>" />
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri();?>/js/html5.js"></script>
	<![endif]-->
	<?php
}
/****************************************************************************************/
// Load Favicon in Header Section
add_action('ultimate_links', 'ultimate_favicon', 15);
// Load Favicon in Admin Section
add_action('admin_head', 'ultimate_favicon');
/**
 * Get the favicon Image from Customizer
 * display favicon
 *
 */
function ultimate_favicon() {
	$ultimate_favicon = '';
	global $options, $array_of_default_settings;
	$options = wp_parse_args( get_option( 'ultimate_theme_options', array() ), ultimate_get_option_defaults());
	if (1 != $options['disable_favicon']) {
		if (!empty($options['favicon'])) {
			$ultimate_favicon .= '<link rel="shortcut icon" href="'.esc_url($options['favicon']).'" type="image/x-icon" />';
		}
	}
	echo $ultimate_favicon;
}
/****************************************************************************************/
// Load webpageicon in Header Section
add_action('ultimate_links', 'ultimate_webpage_icon', 20);
/**
 * Get the webpageicon Image from Customizer
 * display webpageicon
 *
 */
function ultimate_webpage_icon() {
	$ultimate_webpage_icon = '';
	global $options, $array_of_default_settings;
	$options = wp_parse_args( get_option( 'ultimate_theme_options', array() ), ultimate_get_option_defaults());
	if (1 != $options['disable_webpageicon']) {
		if (!empty($options['webpageicon'])) {
			$ultimate_webpage_icon .= '<link rel="apple-touch-icon-precomposed" href="'.esc_url($options['webpageicon']).'" />';
		}
	}
	echo $ultimate_webpage_icon;
}
/****************************************************************************************/
add_action('ultimate_header', 'ultimate_headercontent_details', 10);
/**
 * Shows Header content details
 *
 * Shows the site logo, title, description, searchbar, social icons and many more
 */
function ultimate_headercontent_details() { ?>
	<?php
	global $options, $array_of_default_settings;
	$options = wp_parse_args( get_option( 'ultimate_theme_options', array() ), ultimate_get_option_defaults());
	$elements = array();
	$elements = array(
		$options['social_facebook'],
		$options['social_twitter'],
		$options['social_googleplus'],
		$options['social_pinterest'],
		$options['social_youtube'],
		$options['social_vimeo'],
		$options['social_linkedin'],
		$options['social_flickr'],
		$options['social_tumblr'],
		$options['social_rss'],
	);
	$set_flags = 0;
	if (!empty($elements)) {
		foreach ($elements as $option) {
			if (!empty($option)) {
				$set_flags = 1;
			} else {
				$set_flags = 0;
			}
			if (1 == $set_flags) {
				break;
			}
		}
	}?>
	<?php if (!function_exists('ultimate_footer_infoblog')):
	/**
	 * This function for social links display on header
	 *
	 * Get links through Theme Options
	 */
	function ultimate_footer_infoblog($set_flags, $place = '') {
		global $options, $array_of_default_settings;
		$options = wp_parse_args( get_option( 'ultimate_theme_options', array() ), ultimate_get_option_defaults());
		$ultimate_footer_infoblog 			= '';
		$place                    			= '';
		if (!empty($options['social_phone']) || !empty($options['social_email']) || !empty($options['social_location']) || !empty($options['social_skype'])) {
			if($options['disable_infobar_footer_background_image'] == "0"){
				if(!empty($options['footer_infobar_background_image'])){
				$ultimate_footer_infoblog 	  .= '<div class="info-bar" style="background-image:url(';
				$ultimate_footer_infoblog	  .= " ' ";
				$ultimate_footer_infoblog	  .= $options['footer_infobar_background_image'];
				$ultimate_footer_infoblog	  .= "'";
				$ultimate_footer_infoblog	  .= ');">';
				}else{
				$ultimate_footer_infoblog 	  .= '<div class="info-bar">';
				}
			}else{
				$ultimate_footer_infoblog 	  .= '<div class="info-bar">';

			}
				$ultimate_footer_infoblog 	  .= '<div class="container clearfix">';
				$ultimate_footer_infoblog 	  .= '<div class="info clearfix"><ul>';
			if (!empty($options['social_phone'])) {
				$ultimate_footer_infoblog .= '<li class='.'"phone-number"'.'><a title='.__('"Call Us"', 'ultimate' ).' '.'href='.'"tel:';
				$ultimate_footer_infoblog .= preg_replace("/[^() 0-9+-]/", '', $options['social_phone']);
				$ultimate_footer_infoblog .= '">';
				$ultimate_footer_infoblog .= preg_replace("/[^() 0-9+-]/", '', $options['social_phone']);
				$ultimate_footer_infoblog .= '</a></li>';
			}
			if (!empty($options['social_email'])) {
				$ultimate_footer_infoblog .= '<li class='.'"email"'.'><a title='.__('"Mail Us"', 'ultimate' ).' '.'href='.'"mailto:';
				$ultimate_footer_infoblog .= is_email($options['social_email']);
				$ultimate_footer_infoblog .= '">';
				$ultimate_footer_infoblog .= is_email($options['social_email']);
				$ultimate_footer_infoblog .= '</a></li>';
			}
			if (!empty($options['social_location'])) {
				$ultimate_footer_infoblog .= '<li class='.'"address"'.'><a title='.__('"My Location"', 'ultimate' ).' target ='.'"_blank"'.' '.'href='.'"';
				$ultimate_footer_infoblog .= esc_url($options['social_location_url']);
				$ultimate_footer_infoblog .= '">';
				$ultimate_footer_infoblog .= esc_attr($options['social_location']);
				$ultimate_footer_infoblog .= '</a></li>';
			}
			if (!empty($options['social_skype'])) {
				$ultimate_footer_infoblog .= '<li class='.'"skype"'.'><a title='.__('"Connect with Us"', 'ultimate' ).' '.'href='.'"skype:';
				$ultimate_footer_infoblog .= esc_attr($options['social_skype']);
				$ultimate_footer_infoblog .= '?chat">';
				$ultimate_footer_infoblog .= esc_attr($options['social_skype']);
				$ultimate_footer_infoblog .= '</a></li>';
			}
				$ultimate_footer_infoblog .= '</ul></div><!-- .info --></div><!-- .container --></div><!-- .info-bar -->';
		}
		echo $ultimate_footer_infoblog;
	}
	endif;
	?>
	<?php $header_image = get_header_image();
	if (!empty($header_image)):?>
			<a href="<?php echo esc_url(home_url('/'));?>"><img src="<?php echo esc_url($header_image);?>" class="header-image" width="<?php echo get_custom_header()->width;?>" height="<?php echo get_custom_header()->height;?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display'));?>"> 
			</a>
	<?php
		endif;?>
	<div class="hgroup-wrap">
		<div class="container clearfix">
			<section class="hgroup-right">
	<?php /****************************************************************************************/
	if (!function_exists('ultimate_socialnetworks')):
	/**
	 * This function for social links display on header
	 *
	 * Get links through Theme Options
	 */
	function ultimate_socialnetworks($set_flags) {
		global $options, $array_of_default_settings;
		$options = wp_parse_args( get_option( 'ultimate_theme_options', array() ), ultimate_get_option_defaults());
		$ultimate_socialnetworks = '';
	if ( ( 1 != $set_flags ) || ( 1 == $set_flags ) )  {
			$social_links      	 = array();
			$social_links_name 	 = array();
			$social_links_name 	 = array(__('Facebook', 'ultimate'), // __ double underscore gets the value for translation
				__('Twitter', 'ultimate'),
				__('Google Plus', 'ultimate'),
				__('Pinterest', 'ultimate'),
				__('Youtube', 'ultimate'),
				__('Vimeo', 'ultimate'),
				__('LinkedIn', 'ultimate'),
				__('Flickr', 'ultimate'),
				__('Tumblr', 'ultimate'),
				__('RSS', 'ultimate')
			);
			$social_links = array('Facebook' => 'social_facebook',
				'Twitter'                     => 'social_twitter',
				'Google-Plus'                 => 'social_googleplus',
				'Pinterest'                   => 'social_pinterest',
				'You-tube'                    => 'social_youtube',
				'Vimeo'                       => 'social_vimeo',
				'linkedin'                    => 'social_linkedin',
				'Flickr'                      => 'social_flickr',
				'Tumblr'                      => 'social_tumblr',
				'RSS'                         => 'social_rss',
			);
			$i = 0;
			$a = '';
			foreach ($social_links as $key => $value) {
				if (!empty($options[$value])) {
					$a .=
					'<li class="'.strtolower($key).'"><a href="'.esc_url($options[$value]).'" title="'.sprintf(esc_attr__('%1$s on %2$s', 'ultimate'), get_bloginfo('name'), $social_links_name[$i]).'" target="_blank">'.'</a></li>';
				}
				$i++;
			}
			if (($i > 0) && (!empty($a))) {
				$ultimate_socialnetworks .= '<div class="social-profiles clearfix">';
				$ultimate_socialnetworks .= '<ul>';
				$ultimate_socialnetworks .= $a;
				$ultimate_socialnetworks .= '</ul></div><!-- .social-profiles -->';
			}
		}
		echo $ultimate_socialnetworks;
	}
	endif;
	if(1 != $options['hide_header_searchform'] || 1 == $set_flags){
		ultimate_socialnetworks($set_flags);
	if (1 != $options['hide_header_searchform']) { ?>
		<div class="search-toggle"></div><!-- .search-toggle -->
		<div id="search-box" class="hide">
			<?php get_search_form();?>
			<span class="arrow"></span>
		</div><!-- #search-box -->
		<?php }
	}
	/****************************************************************************************/?>
	<button class="menu-toggle">Responsive Menu</button>
			</section><!-- .hgroup-right -->
	<?php
		if ($options['header_show'] != 'disable-both' && $options['header_show'] == 'header-text') {
			?>
			<section id="site-logo" class="clearfix">
			<?php if(is_single() || (!is_page_template('page-templates/page-template-business.php' )) && !is_home()){ ?>
				<h2 id="site-title"> 
					<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_attr(get_bloginfo('name', 'display'));?>" rel="home">
					<?php bloginfo('name');?>
					</a> 
				</h2><!-- #site-title -->
				<?php } else { ?>
				<h1 id="site-title"> 
					<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_attr(get_bloginfo('name', 'display'));?>" rel="home">
					<?php bloginfo('name');?>
					</a> 
				</h1><!-- #site-title -->
				<?php  }
			$site_description = get_bloginfo( 'description', 'display' );
				if($site_description){?>
				<h2 id="site-description">
					<?php bloginfo('description');?>
				</h2>
			<?php } ?>
			</section> <!-- #site-logo -->
			<?php
		}	elseif ($options['header_show'] != 'disable-both' && $options['header_show'] == 'header-logo') {
			?>
			<section id="site-logo" class="clearfix">
			<?php if(is_single() || (!is_page_template('page-templates/page-template-business.php' )) && !is_home()){ ?>
				<h2 id="site-title">
					<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_attr(get_bloginfo('name', 'display'));?>" rel="home"> <img src="<?php echo $options['header_logo'];?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display'));?>"></a>
				</h2>
				<?php }else{ ?>
				<h1 id="site-title">
					<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_attr(get_bloginfo('name', 'display'));?>" rel="home"> <img src="<?php echo $options['header_logo'];?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display'));?>"></a>
				</h1>
				<?php } ?>
			</section><!-- #site-logo -->
		<?php }?>
		</div><!-- .container -->
	</div><!-- .hgroup-wrap -->
	<?php  if(is_home() || is_front_page()) { ?>
	<div class="header-main" 
		<?php if(!empty($options['slider_background_image']) && ($options['disable_background_image'] == 0)){ ?>style="background-image:url('<?php echo esc_url($options['slider_background_image']);?>');" <?php } ?> >
		<?php }else{ ?>
		<div class="header-main"
		<?php if(!empty($options['sitetitle_background_image']) && ($options['disable_sitetitle_background_image'] == 0)){ ?>style="background-image:url('<?php echo esc_url($options['sitetitle_background_image']);?>');" <?php } ?> >
		<?php }
			if (has_nav_menu('primary')) {// if there is nav menu then content displayed from nav menu else from pages
				$args = array(
					'theme_location' => 'primary',
					'container'      => '',
					'items_wrap'     => '<ul class="nav-menu">%3$s</ul>',
				);
				echo '<nav id="access" class="clearfix">
				<div class="container clearfix">';
			wp_nav_menu($args);//extract the content from apperance-> nav menu
			echo '</div> </nav><!-- #access -->';
			} else {// extract the content from page menu only
				echo '<nav id="access" class="clearfix">
			<div class="container clearfix">';
			wp_page_menu(array('menu_class' => 'nav-menu'));
			echo '</div></nav><!-- #access -->';
			}
		?>
		<?php
			if ('above-slider' == $options['slogan_position'] && (is_home() || is_front_page())) {
				echo '<div class="container">';
				if (function_exists('ultimate_home_slogan')) {
					ultimate_home_slogan();
				}
			}
			if (is_home() || is_front_page()) {
				if( 'below-slider' == $options[ 'slogan_position' ] && ( is_home() || is_front_page() ) ) {
					echo '<div class="container">';
				}
				if ("0" == $options['disable_slider']) {
					if (function_exists('ultimate_pass_slider_effect_cycle_parameters')) {
						ultimate_pass_slider_effect_cycle_parameters();
					}
					if (function_exists('ultimate_featured_sliders')) {
						ultimate_featured_sliders();
					}
				}
			} else {
				if (('' != ultimate_header_title()) || function_exists('bcn_display_list')) { ?>
					<div class="page-title-wrap">
						<div class="container clearfix">
						<?php if(is_home()){?>
							<h2 class="page-title"><?php echo ultimate_header_title();?></h2><!-- .page-title -->
							<?php } else { ?>
							<h1 class="page-title"><?php echo ultimate_header_title();?></h1><!-- .page-title -->
						<?php }
							if (function_exists('ultimate_breadcrumb')) {
								ultimate_breadcrumb();
							}
						?>
						</div>
					</div>
			<?php
				}
			}
	if ('below-slider' == $options['slogan_position'] && (is_home() || is_front_page())) {
		if (function_exists('ultimate_home_slogan')) {
			ultimate_home_slogan();
		}
	}
}
if (!function_exists('ultimate_home_slogan')):
/**
 * Display Home Slogan.
 *
 * Function that enable/disable the home slogan1 and home slogan2.
 */
function ultimate_home_slogan() {
	global $options, $array_of_default_settings;
	$options = wp_parse_args( get_option( 'ultimate_theme_options', array() ), ultimate_get_option_defaults());
	$ultimate_home_slogan = '';
	if (!empty($options['home_slogan1']) || !empty($options['home_slogan2'])) {
		if (0 == $options['disable_slogan']) {
			$ultimate_home_slogan .= '<div class="slogan">';
			if (!empty($options['home_slogan1'])) {
				$ultimate_home_slogan .= esc_html($options['home_slogan1']);
			}
			if (!empty($options['home_slogan2'])) {
				$ultimate_home_slogan .= '<span>'.esc_html($options['home_slogan2']).'</span>';
			}
			$ultimate_home_slogan .= '</div><!-- .slogan -->';
		}
	}
	echo $ultimate_home_slogan;
}
endif;
/****************************************************************************************/
if (!function_exists('ultimate_featured_sliders')):
/**
 * displaying the featured image in home page
 *
 */
function ultimate_featured_sliders() {
	global $post;
	global $options, $array_of_default_settings;
	$options = wp_parse_args( get_option( 'ultimate_theme_options', array() ), ultimate_get_option_defaults());
	$ultimate_featured_sliders = '';
	if (!$ultimate_featured_sliders != empty($options['featured_post_slider'])) {
		$slider_size = 'slider';
		$ultimate_featured_sliders 	.= '<div class="featured-slider"><div class="slider-cycle">';
				$get_featured_posts 		= new WP_Query(array(
				'posts_per_page'      	=> $options['slider_quantity'],
				'post_type'           	=> array('post', 'page'),
				'post__in'            	=> $options['featured_post_slider'],
				'orderby'             	=> 'post__in',
				'ignore_sticky_posts' 	=> 1
			));
		$i = 0;
		while ($get_featured_posts->have_posts()):$get_featured_posts->the_post();
					$i++;
					$title_attribute       	 	 = apply_filters('the_title', get_the_title($post->ID));
					$excerpt               	 	 = get_the_excerpt();
					if (1 == $i) {$classes   	 = "slides displayblock";} else { $classes = "slides displaynone";}
			$ultimate_featured_sliders    	.= '<div class="'.$classes.'">';
			if (has_post_thumbnail()) {
				$ultimate_featured_sliders 	.= '<figure><a href="'.get_permalink().'" title="'.the_title('', '', false).'">';
				$ultimate_featured_sliders 	.= get_the_post_thumbnail($post->ID, $slider_size, array('title' => esc_attr($title_attribute), 'alt' => esc_attr($title_attribute), 'class' => 'pngfix')).'</a></figure>';
			}
			if ($title_attribute != '' || $excerpt != '') {
				$ultimate_featured_sliders 	.= '<article class="featured-text">';
				if ($title_attribute != '') {
					$ultimate_featured_sliders .= '<h2 class="featured-title"><a href="'.get_permalink().'" title="'.the_title('', '', false).'">'.get_the_title().'</a></h2><!-- .featured-title -->';
				}
				if ($excerpt != '') {
					$ultimate_featured_sliders .= '<div class="featured-content">'.$excerpt.'</div><!-- .featured-content -->';
				}
				$ultimate_featured_sliders 	.= '<a title='.__('"Read More"','ultimate').' '.'href="'.get_permalink().'"'.' class="call-to-action">'.__('Read More','ultimate').'</a></article><!-- .featured-text -->';
			}
				$ultimate_featured_sliders 	.= '</div><!-- .slides -->';
		endwhile;
				wp_reset_query();
				$ultimate_featured_sliders .= '</div>	<!-- .slider-cycle --><nav id="controllers" class="clearfix"></nav><!-- #controllers --></div><!-- .featured-slider -->';
	}
				echo $ultimate_featured_sliders;
}
endif;
/****************************************************************************************/
if (!function_exists('ultimate_breadcrumb')):
/**
 * Display breadcrumb on header.
 *
 * If the page is home or front page, slider is displayed.
 * In other pages, breadcrumb will display if breadcrumb NavXT plugin exists.
 */
function ultimate_breadcrumb() {
	if (function_exists('bcn_display')) {
		echo '<div class="breadcrumb">';
		bcn_display();
		echo '</div> <!-- .breadcrumb -->';
	}
}
endif;
/****************************************************************************************/
if (!function_exists('ultimate_header_title')):
/**
 * Show the title in header
 *
 * @since Ultimate 1.0
 */
function ultimate_header_title() {
	if (is_archive()) {
		$ultimate_header_title = single_cat_title('', FALSE);
	} elseif (is_404()) {
		$ultimate_header_title = __('Page NOT Found', 'ultimate');
	} elseif (is_search()) {
		$ultimate_header_title = __('Search Results', 'ultimate');
	} elseif (is_page_template()) {
		$ultimate_header_title = get_the_title();
	} else {
		$ultimate_header_title = get_the_title();
	}
	return $ultimate_header_title;
}
endif;
?>
