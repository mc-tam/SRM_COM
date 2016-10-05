<?php 
/**
 * @package Theme Horse
 * @subpackage Ultimate
 * @since Ultimate 3.0
 */
function ultimate_textarea_register($wp_customize){
	class Ultimate_Customize_Ultimate_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
		<div class="theme-info"> 
			<a title="<?php esc_attr_e( 'Donate', 'ultimate' ); ?>" href="<?php echo esc_url( 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=BRLCCUGP2ACYN' ); ?>" target="_blank">
			<?php _e( 'Donate', 'ultimate' ); ?>
			</a>
			<a title="<?php esc_attr_e( 'Review Ultimate', 'ultimate' ); ?>" href="<?php echo esc_url( 'http://wordpress.org/support/view/theme-reviews/ultimate' ); ?>" target="_blank">
			<?php _e( 'Rate Ultimate', 'ultimate' ); ?>
			</a>
			<a href="<?php echo esc_url( 'http://themehorse.com/theme-instruction/ultimate/' ); ?>" title="<?php esc_attr_e( 'Ultimate Theme Instructions', 'ultimate' ); ?>" target="_blank">
			<?php _e( 'Theme Instructions', 'ultimate' ); ?>
			</a>
			<a href="<?php echo esc_url( 'http://themehorse.com/support-forum/' ); ?>" title="<?php esc_attr_e( 'Support Forum', 'ultimate' ); ?>" target="_blank">
			<?php _e( 'Support Forum', 'ultimate' ); ?>
			</a>
			<a href="<?php echo esc_url( 'http://themehorse.com/preview/ultimate/' ); ?>" title="<?php esc_attr_e( 'Ultimate Demo', 'ultimate' ); ?>" target="_blank">
			<?php _e( 'View Demo', 'ultimate' ); ?>
			</a>
		</div>
		<?php
		}
	}
	class Ultimate_Customize_Ultimate_upgrade_to_pro extends WP_Customize_Control {
		public function render_content() { ?>
			<a href="<?php echo esc_url( 'http://themehorse.com/themes/ultimate-pro/' ); ?>" title="<?php esc_attr_e( 'Upgrade to Ultimate Pro', 'ultimate' ); ?>" target="_blank">
			<?php _e( 'Upgrade to Ultimate Pro', 'ultimate' ); ?>
			</a><?php _e('to get more aditional features like (Advanced Slider, Color Options, Typography Options and many more.)','ultimate');?>
		<?php
		}
	}
	class Ultimate_Customize_Category_Control extends WP_Customize_Control {
		/**
		* The type of customize control being rendered.
		*/
		public $type = 'multiple-select';
		/**
		* Displays the multiple select on the customize screen.
		*/
		public function render_content() {
		global $options, $array_of_default_settings;
		$options = wp_parse_args(  get_option( 'ultimate_theme_options', array() ),  ultimate_get_option_defaults());
		$categories = get_categories(); ?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
				<option value="0" <?php if ( empty( $options['front_page_category'] ) ) { selected( true, true ); } ?>><?php _e( '--Disabled--', 'ultimate' ); ?></option>
				<?php
					foreach ( $categories as $category) :?>
						<option value="<?php echo $category->cat_ID; ?>" <?php if ( in_array( $category->cat_ID, $options['front_page_category']) ) { echo 'selected="selected"';}?>><?php echo $category->cat_name; ?></option>
					<?php endforeach; ?>
				</select>
			</label>
		<?php 
		}
	}
}

function ultimate_customize_register($wp_customize){
	$wp_customize->add_panel( 'ultimate_layout_options_panel', array(
	'priority'       => 200,
	'capability'     => 'edit_theme_options',
	'title'          => __('Layout Options', 'ultimate')
	));
	$wp_customize->add_panel( 'ultimate_design_options_panel', array(
	'priority'       => 300,
	'capability'     => 'edit_theme_options',
	'title'          => __('Design Options', 'ultimate')
	));

	$wp_customize->add_panel( 'ultimate_advanced_options_panel', array(
	'priority'       => 400,
	'capability'     => 'edit_theme_options',
	'title'          => __('Advance Options', 'ultimate')
	));

	$wp_customize->add_panel( 'ultimate_featured_post_page_panel', array(
	'priority'       => 500,
	'capability'     => 'edit_theme_options',
	'title'          => __('Featured Post/Page Slider', 'ultimate')
	));

	$wp_customize->add_panel( 'ultimate_contact_social_panel', array(
	'priority'       => 600,
	'capability'     => 'edit_theme_options',
	'title'          => __('Contact / Social Links', 'ultimate')
	));

	global $options, $array_of_default_settings;
	$options = wp_parse_args(  get_option( 'ultimate_theme_options', array() ), ultimate_get_option_defaults());
/********************Ultimate Upgrade ******************************************/
	$wp_customize->add_section('ultimate_upgrade_to_pro', array(
		'title'					=> __('What is new on Ultimate Pro?', 'ultimate'),
		'priority'				=> 0.5,
	));
	$wp_customize->add_setting( 'ultimate_theme_settings[ultimate_upgrade_to_pro]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Ultimate_Customize_Ultimate_upgrade_to_pro(
		$wp_customize,
		'ultimate_upgrade_to_pro',
			array(
				'label'					=> __('Ultimate Upgrade','ultimate'),
				'section'				=> 'ultimate_upgrade_to_pro',
				'settings'				=> 'ultimate_theme_settings[ultimate_upgrade_to_pro]',
			)
		)
	);
	$wp_customize->add_section('ultimate_upgrade', array(
		'title'					=> __('Ultimate Support', 'ultimate'),
		'description'			=> __('Hey! Buy us a beer and we shall come with new features and update.','ultimate'),
		'priority'				=> 1,
	));
	$wp_customize->add_setting( 'ultimate_theme_options[ultimate_upgrade]', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Ultimate_Customize_Ultimate_upgrade(
		$wp_customize,
		'ultimate_upgrade',
			array(
				'label'					=> __('Ultimate Upgrade','ultimate'),
				'section'				=> 'ultimate_upgrade',
				'settings'				=> 'ultimate_theme_options[ultimate_upgrade]',
			)
		)
	);
	/******************** Layout Options ******************************************/
	/********************Site Layout******************************************/
	$wp_customize->add_section('ultimate_site_layout', array(
		'title'					=> __('Site Layout', 'ultimate'),
		'priority'				=> 210,
		'panel'					=>'ultimate_layout_options_panel'
	));
	$wp_customize->add_setting('ultimate_theme_options[site_layout]', array(
		'default'				=> 'wide-layout',
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control('ultimate_site_layout', array(
		'label'					=> __('Site Layout','ultimate'),
		'description'			=> __('This change is reflected in whole website','ultimate'),
		'section'				=> 'ultimate_site_layout',
		'settings'				=> 'ultimate_theme_options[site_layout]',
		'type'					=> 'radio',
		'checked'				=> 'checked',
		'choices'				=> array(
			'narrow-layout'					=> __('Narrow Layout','ultimate'),
			'wide-layout'					=> __('Wide Layout','ultimate'),
		),
	));
	/********************Content Layout******************************************/
	$wp_customize->add_section('ultimate_default_layout', array(
		'title'					=> __('Content Layout', 'ultimate'),
		'priority'				=> 220,
		'panel'					=>'ultimate_layout_options_panel'
	));
	$wp_customize->add_setting('ultimate_theme_options[default_layout]', array(
		'default'				=> 'right-sidebar',
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control('ultimate_default_layout', array(
		'label'					=> __('Layouts','ultimate'),
		'section'				=> 'ultimate_default_layout',
		'settings'				=> 'ultimate_theme_options[default_layout]',
		'type'					=> 'radio',
		'checked'				=> 'checked',
		'choices'				=> array(
			'no-sidebar'			=> __('No Sidebar','ultimate'),
			'no-sidebar-full-width'			=> __('No Sidebar, Full Width','ultimate'),
			'left-sidebar'				=> __('Left Sidebar','ultimate'),
			'right-sidebar'				=> __('Right Sidebar','ultimate'),
		),
	));
	/********************Responsive Layout******************************************/
	$wp_customize->add_section('ultimate_site_design', array(
		'title'					=> __('Responsive Layout', 'ultimate'),
		'priority'				=> 230,
		'panel'					=>'ultimate_layout_options_panel'
	));
	$wp_customize->add_setting('ultimate_theme_options[site_design]', array(
		'default'				=> 'on',
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control('ultimate_site_design', array(
		'label'					=> __('Responsive Layout','ultimate'),
		'section'				=> 'ultimate_site_design',
		'settings'				=> 'ultimate_theme_options[site_design]',
		'type'					=> 'radio',
		'checked'				=> 'checked',
		'choices'				=> array(
			'on'					=> __('ON(Responsive view will be displayed in small devices )','ultimate'),
			'off'					=> __('OFF(Full site will display as desktop view)','ultimate'),
		),
	));

	/******************** Design Options ******************************************/
	/******************** Custom Header ******************************************/
	$wp_customize->add_section('custom_header_setting', array(
		'title'					=> __('Custom Header', 'ultimate'),
		'priority'				=> 200,
		'panel'					=>'ultimate_design_options_panel'
	));
	$wp_customize->add_setting( 'ultimate_theme_options[hide_header_searchform]', array(
		'default'				=> 0,
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control( 'custom_header_setting', array(
		'label'					=> __('Hide Searchform from Header', 'ultimate'),
		'section'				=> 'custom_header_setting',
		'settings'				=> 'ultimate_theme_options[hide_header_searchform]',
		'type'					=> 'checkbox',
	));
	$wp_customize->add_setting( 'ultimate_theme_options[header_logo]',array(
		'sanitize_callback'	=> 'esc_url_raw',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
		$wp_customize,
		'header_logo',
			array(
				'label'				=> __('Header Logo','ultimate'),
				'section'			=> 'custom_header_setting',
				'settings'			=> 'ultimate_theme_options[header_logo]'
			)
		)
	);
	$wp_customize->add_setting('ultimate_theme_options[header_show]', array(
		'default'				=> 'header-text',
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control('custom_header_display', array(
		'label'					=> __('Show', 'ultimate'),
		'section'				=> 'custom_header_setting',
		'settings'				=> 'ultimate_theme_options[header_show]',
		'type'					=> 'radio',
		'checked'				=> 'checked',
			'choices'			=> array(
			'header-logo'		=> __('Header Logo Only','ultimate'),
			'header-text'		=> __('Header Text Only','ultimate'),
			'disable-both'		=> __('Disable','ultimate'),
			),
	));
	/********************Fav Icon ******************************************/
	$wp_customize->add_section('fav_icon_setting', array(
		'title'					=> __('Fav Icon Options', 'ultimate'),
		'priority'				=> 210,
		'panel'					=>'ultimate_design_options_panel',
	));
	$wp_customize->add_setting( 'ultimate_theme_options[disable_favicon]', array(
		'default'				=> 1,
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
		$wp_customize->add_control( 'fav_icon_setting', array(
		'label'					=> __('Disable Favicon', 'ultimate'),
		'section'				=> 'fav_icon_setting',
		'settings'				=> 'ultimate_theme_options[disable_favicon]',
		'type'					=> 'checkbox',
	));
	$wp_customize->add_setting( 'ultimate_theme_options[favicon]',array(
		'sanitize_callback'	=> 'esc_url_raw',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
		$wp_customize,
		'favicon',
			array(
				'section'			=> 'fav_icon_setting',
				'settings'			=> 'ultimate_theme_options[favicon]',
			)
		)
	);
	/********************Web Icon ******************************************/
	$wp_customize->add_section('webclip_icon_setting', array(
		'title'					=> __('Web Clip Icon Options', 'ultimate'),
		'priority'				=> 220,
		'panel'					=>'ultimate_design_options_panel'
	));
	$wp_customize->add_setting( 'ultimate_theme_options[disable_webpageicon]', array(
		'default'				=> 1,
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control( 'webclip_icon_setting', array(
		'label'					=> __('Disable Web Clip Icon', 'ultimate'),
		'section'				=> 'webclip_icon_setting',
		'settings'				=> 'ultimate_theme_options[disable_webpageicon]',
		'type'					=> 'checkbox',
	));
	$wp_customize->add_setting( 'ultimate_theme_options[webpageicon]',array(
		'sanitize_callback'=> 'esc_url_raw',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
		$wp_customize,
		'webpageicon',
			array(
				'section'			=> 'webclip_icon_setting',
				'settings'			=> 'ultimate_theme_options[webpageicon]'
			)
		)
	);
	/********************Custom Css ******************************************/
	$wp_customize->add_section( 'ultimate_custom_css', array(
		'title'					=> __('Custom CSS', 'ultimate'),
		'priority'				=> 250,
		'panel'					=>'ultimate_design_options_panel'
	));
	$wp_customize->add_setting( 'ultimate_theme_options[custom_css]', array(
		'default'				=> '',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control( 'custom_css', array(
		'label'					=> __('Enter your custom CSS styles.','ultimate'),
		'description'			=> __('This CSS will overwrite the CSS of style.css file.','ultimate'),
		'section'				=> 'ultimate_custom_css',
				'settings'				=> 'ultimate_theme_options[custom_css]',
				'type'					=> 'textarea'
	));

	/******************** Advanced Options ******************************************/
	/******************** Home Slogan Options ******************************************/
	$wp_customize->add_section('home_slogan_options', array(
		'title'					=> __('Home Slogan Options', 'ultimate'),
		'priority'				=> 410,
		'panel'					=>'ultimate_advanced_options_panel'
	));
	$wp_customize->add_setting( 'ultimate_theme_options[disable_slogan]', array(
		'default'				=> 0,
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control( 'disable_slogan', array(
		'label'					=> __('Disable Slogan Part', 'ultimate'),
		'section'				=> 'home_slogan_options',
		'settings'				=> 'ultimate_theme_options[disable_slogan]',
		'type'					=> 'checkbox',
	));
	$wp_customize->add_setting('ultimate_theme_options[slogan_position]', array(
		'default'				=> 'above-slider',
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control('slogan_position', array(
		'label'					=> __('Slogan Position', 'ultimate'),
		'section'				=> 'home_slogan_options',
		'settings'				=> 'ultimate_theme_options[slogan_position]',
		'type'					=> 'radio',
		'checked'				=> 'checked',
		'choices'				=> array(
			'above-slider'					=> __('Above Slider','ultimate'),
			'below-slider'					=> __('Below Slider','ultimate'),
		),
	));
	$wp_customize->add_setting( 'ultimate_theme_options[home_slogan1]', array(
		'default'				=> '',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options',
		'sanitize_callback'	=> 'esc_textarea'
	));
	$wp_customize->add_control( 'home_slogan1', array(
		'label'					=> __('Home Page Primary Slogan', 'ultimate'),
		'description'			=> __('TThe appropriate length of the slogan is around 10 words.','ultimate'),
		'section'				=> 'home_slogan_options',
		'settings'				=> 'ultimate_theme_options[home_slogan1]',
		'type'					=> 'textarea'
	));
	$wp_customize->add_setting( 'ultimate_theme_options[home_slogan2]', array(
		'default'				=> '',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options',
		'sanitize_callback'	=> 'esc_textarea'
	));
	$wp_customize->add_control( 'home_slogan2', array(
		'label'					=> __('Home Page Secondary Slogan', 'ultimate'),
		'description'			=> __('The appropriate length of the slogan is around 10 words.','ultimate'),
		'section'				=> 'home_slogan_options',
		'settings'				=> 'ultimate_theme_options[home_slogan2]',
		'type'					=> 'textarea'
	));
	/******************** Homepage Blog Category Setting *********************/
	$wp_customize->add_section(
		'ultimate_category_section', array(
		'title' 						=> __('Homepage Blog Category Setting','ultimate'),
		'description'				=> __('Only posts that belong to the categories selected here will be displayed on the front page. ( You may select multiple categories by holding down the CTRL key. ) ','ultimate'),
		'priority'					=> 420,
		'panel'					=>'ultimate_advanced_options_panel'
	));
	$wp_customize->add_setting( 'ultimate_theme_options[front_page_category]', array(
		'default'					=>array(),
		'sanitize_callback'		=> 'prefix_sanitize_integer',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control(
		new Ultimate_Customize_Category_Control(
		$wp_customize,
			'front_page_category',
			array(
			'label'					=> __('Front page posts categories','ultimate'),
			'section'				=> 'ultimate_category_section',
			'settings'				=> 'ultimate_theme_options[front_page_category]',
			'type'					=> 'multiple-select',
			)
		)
	);
	$wp_customize->add_section('slogan_slider_bg_image', array(
		'title'					=> __('Slogan / Slider Background Image', 'ultimate'),
		'priority'				=> 430,
		'panel'					=>'ultimate_advanced_options_panel'
	));
	$wp_customize->add_setting( 'ultimate_theme_options[disable_background_image]', array(
		'default'				=> 0,
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control( 'slogan_slider_bg_image', array(
		'label'					=> __('Disable Background Image', 'ultimate'),
		'section'				=> 'slogan_slider_bg_image',
		'settings'				=> 'ultimate_theme_options[disable_background_image]',
		'type'					=> 'checkbox',
	));
	$wp_customize->add_setting( 'ultimate_theme_options[slider_background_image]',array(
		'sanitize_callback'	=> 'esc_url_raw',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
		$wp_customize,
		'slider_background_image',
			array(
				'label'				=> __('Background Image','ultimate'),
				'section'			=> 'slogan_slider_bg_image',
				'settings'			=> 'ultimate_theme_options[slider_background_image]'
			)
		)
	);
	$wp_customize->add_section('page_title_bg_image', array(
		'title'					=> __('Page Title Background Image', 'ultimate'),
		'priority'				=> 440,
		'panel'					=>'ultimate_advanced_options_panel'
	));
	$wp_customize->add_setting( 'ultimate_theme_options[disable_sitetitle_background_image]', array(
		'default'				=> 0,
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control( 'page_title_bg_image', array(
		'label'					=> __('Disable Background Image', 'ultimate'),
		'section'				=> 'page_title_bg_image',
		'settings'				=> 'ultimate_theme_options[disable_sitetitle_background_image]',
		'type'					=> 'checkbox',
	));
	$wp_customize->add_setting( 'ultimate_theme_options[sitetitle_background_image]',array(
		'sanitize_callback'	=> 'esc_url_raw',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
		$wp_customize,
		'sitetitle_background_image',
			array(
				'label'				=> __('Background Image','ultimate'),
				'section'			=> 'page_title_bg_image',
				'settings'			=> 'ultimate_theme_options[sitetitle_background_image]'
			)
		)
	);

	/********************Featured Post/ Page Slider******************************************/
	/********************Slider Options ******************************************************/
		$wp_customize->add_section( 'ultimate_featured_content_setting', array(
		'title'					=> __('Slider Options', 'ultimate'),
		'priority'				=> 500,
		'panel'					=>'ultimate_featured_post_page_panel'
	));
	$wp_customize->add_setting( 'ultimate_theme_options[disable_slider]', array(
		'default'					=> 0,
		'sanitize_callback'		=> 'prefix_sanitize_integer',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control( 'ultimate_disable_slider', array(
		'priority'					=>510,
		'label'						=> __('Disable Slider', 'ultimate'),
		'section'					=> 'ultimate_featured_content_setting',
		'settings'					=> 'ultimate_theme_options[disable_slider]',
		'type'						=> 'checkbox',
	));
	$wp_customize->add_setting('ultimate_theme_options[slider_content]', array(
		'default'				=> 'on',
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control('ultimate_slider_content', array(
		'priority'				=> 520,
		'label'					=> __('Slider Content','ultimate'),
		'section'				=> 'ultimate_featured_content_setting',
		'settings'				=> 'ultimate_theme_options[slider_content]',
		'type'					=> 'radio',
		'checked'				=> 'checked',
		'choices'				=> array(
			'on'					=> __('ON (Slider Content will be displayed)','ultimate'),
			'off'					=> __('OFF (Slider Content will not be displayed)','ultimate'),
		),
	));
	$wp_customize->add_setting('ultimate_theme_options[slider_quantity]', array(
		'default'					=> '4',
		'sanitize_callback'		=> 'ultimate_sanitize_delay_transition',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control('slider_quantity', array(
		'priority'					=>530,
		'label'						=> __('Number of Slides', 'ultimate'),
		'section'					=> 'ultimate_featured_content_setting',
		'settings'					=> 'ultimate_theme_options[slider_quantity]',
		'type'						=> 'text',
	) );
	$wp_customize->add_setting('ultimate_theme_options[transition_effect]', array(
		'default'					=> 'fade',
		'sanitize_callback'		=> 'ultimate_sanitize_effect',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control('transition_effect', array(
		'priority'					=>540,
		'label'						=> __('Transition Effect', 'ultimate'),
		'section'					=> 'ultimate_featured_content_setting',
		'settings'					=> 'ultimate_theme_options[transition_effect]',
		'type'						=> 'select',
		'choices'					=> array(
			'fade'					=> __('Fade','ultimate'),
			'wipe'					=> __('Wipe','ultimate'),
			'scrollUp'				=> __('Scroll Up','ultimate' ),
			'scrollDown'			=> __('Scroll Down','ultimate' ),
			'scrollLeft'			=> __('Scroll Left','ultimate' ),
			'scrollRight'			=> __('Scroll Right','ultimate' ),
			'blindX'					=> __('Blind X','ultimate' ),
			'blindY'					=> __('Blind Y','ultimate' ),
			'blindZ'					=> __('Blind Z','ultimate' ),
			'cover'					=> __('Cover','ultimate' ),
			'shuffle'				=> __('Shuffle','ultimate' ),
		),
	));
	$wp_customize->add_setting('ultimate_theme_options[transition_delay]', array(
		'default'					=> '4',
		'sanitize_callback'		=> 'ultimate_sanitize_delay_transition',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control('transition_delay', array(
		'priority'					=>550,
		'label'						=> __('Transition Delay', 'ultimate'),
		'section'					=> 'ultimate_featured_content_setting',
		'settings'					=> 'ultimate_theme_options[transition_delay]',
		'type'						=> 'text',
	) );
	$wp_customize->add_setting('ultimate_theme_options[transition_duration]', array(
		'default'					=> '1',
		'sanitize_callback'		=> 'ultimate_sanitize_delay_transition',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control('transition_duration', array(
		'priority'					=>560,
		'label'						=> __('Transition Length', 'ultimate'),
		'section'					=> 'ultimate_featured_content_setting',
		'settings'					=> 'ultimate_theme_options[transition_duration]',
		'type'						=> 'text',
	) );
	/******************** Featured Post/ Page Slider Options  *********************************************/
		$wp_customize->add_section( 'ultimate_page_post_options', array(
			'title' 						=> __('Featured Post/ Page Slider Options','ultimate'),
			'priority'					=> 570,
			'panel'					=>'ultimate_featured_post_page_panel'
		));
		$wp_customize->add_setting('ultimate_theme_options[exclude_slider_post]', array(
			'default'					=>0,
			'sanitize_callback'		=>'prefix_sanitize_integer',
			'type' 						=> 'option',
			'capability' 				=> 'manage_options'
		));
		$wp_customize->add_control( 'exclude_slider_post', array(
			'priority'					=>580,
			'label'						=> __('Check to exclude', 'ultimate'),
			'description'				=>__('Exclude Slider post from Homepage posts?','ultimate'),
			'section'					=> 'ultimate_page_post_options',
			'settings'					=> 'ultimate_theme_options[exclude_slider_post]',
			'type'						=> 'checkbox',
		));
		// featured post/page
		for ( $i=1; $i <= $options['slider_quantity'] ; $i++ ) {
			$wp_customize->add_setting('ultimate_theme_options[featured_post_slider]['. $i.']', array(
				'default'					=>'',
				'sanitize_callback'		=>'prefix_sanitize_integer',
				'type' 						=> 'option',
				'capability' 				=> 'manage_options'
			));
			$wp_customize->add_control( 'featured_post_slider]['. $i .']', array(
				'priority'					=> 590 . $i,
				'label'						=> __(' Featured Slider Post/Page #', 'ultimate') . ' ' . $i ,
				'section'					=> 'ultimate_page_post_options',
				'settings'					=> 'ultimate_theme_options[featured_post_slider]['. $i .']',
				'type'						=> 'text',
			));
		}
	/******************** Contact / Social Links  *****************************************/
	/******************** Contact Info Bar ******************************************************/
	$wp_customize->add_section('contact_info_bar', array(
		'title'					=> __('Contact Info Bar', 'ultimate'),
		'priority'				=> 610,
		'panel'					=>'ultimate_contact_social_panel'
	));
	$wp_customize->add_setting( 'ultimate_theme_options[disable_bottom]', array(
		'default'				=> 0,
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control( 'disable_bottom', array(
		'priority'				=> 630,
		'label'					=> __('Disable Info Bar', 'ultimate'),
		'section'				=> 'contact_info_bar',
		'settings'				=> 'ultimate_theme_options[disable_bottom]',
		'type'					=> 'checkbox',
	));
	$wp_customize->add_setting('ultimate_theme_options[social_phone]', array(
		'default'					=>'',
		'sanitize_callback'		=> 'prefix_sanitize_phone',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control('social_phone', array(
		'priority'					=>640,
		'label'						=> __('Phone Number', 'ultimate'),
		'description'				=> __('Enter your Phone number only','ultimate'),
		'section'					=> 'contact_info_bar',
		'settings'					=> 'ultimate_theme_options[social_phone]',
		'type'						=> 'text',
	));
	$wp_customize->add_setting('ultimate_theme_options[social_email]', array(
		'default'					=>'',
		'sanitize_callback'		=> 'sanitize_email',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control('social_email', array(
		'priority'					=>650,
		'label'						=> __('Email ID Only', 'ultimate'),
		'description'				=> __('Enter your Email ID','ultimate'),
		'section'					=> 'contact_info_bar',
		'settings'					=> 'ultimate_theme_options[social_email]',
		'type'						=> 'text',
	));
	$wp_customize->add_setting('ultimate_theme_options[social_location]', array(
		'default'					=>'',
		'sanitize_callback'		=> 'sanitize_text_field',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control('social_location', array(
		'priority'					=>660,
		'label'						=> __('Location Only', 'ultimate'),
		'description'				=> __('Enter your Address','ultimate'),
		'section'					=> 'contact_info_bar',
		'settings'					=> 'ultimate_theme_options[social_location]',
		'type'						=> 'text',
	));
	$wp_customize->add_setting('ultimate_theme_options[social_location_url]', array(
		'default'					=>'',
		'sanitize_callback'		=> 'esc_url',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control('social_location_url', array(
		'priority'					=>670,
		'label'						=> __('Location Url Only', 'ultimate'),
		'description'				=> __('Enter your google map url','ultimate'),
		'section'					=> 'contact_info_bar',
		'settings'					=> 'ultimate_theme_options[social_location_url]',
		'type'						=> 'text',
	));
	$wp_customize->add_setting('ultimate_theme_options[social_skype]', array(
		'default'					=>'',
		'sanitize_callback'		=> 'esc_attr',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control('social_skype', array(
		'priority'					=>680,
		'label'						=> __('Skype', 'ultimate'),
		'description'				=> __('Enter your skype ID','ultimate'),
		'section'					=> 'contact_info_bar',
		'settings'					=> 'ultimate_theme_options[social_skype]',
		'type'						=> 'text',
	));
	$wp_customize->add_setting( 'ultimate_theme_options[disable_infobar_footer_background_image]', array(
		'default'				=> 0,
		'sanitize_callback'	=> 'prefix_sanitize_integer',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control( 'contact_info_bar', array(
		'priority'					=>690,
		'label'					=> __('Disable Background Image', 'ultimate'),
		'section'				=> 'contact_info_bar',
		'settings'				=> 'ultimate_theme_options[disable_infobar_footer_background_image]',
		'type'					=> 'checkbox',
	));
	$wp_customize->add_setting( 'ultimate_theme_options[footer_infobar_background_image]',array(
		'sanitize_callback'	=> 'esc_url_raw',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
		$wp_customize,
		'footer_infobar_background_image',
			array(
				'priority'			=>695,
				'label'				=> __('Background Image','ultimate'),
				'section'			=> 'contact_info_bar',
				'settings'			=> 'ultimate_theme_options[footer_infobar_background_image]'
			)
		)
	);
	/******************** Social Links ******************************************/
	$wp_customize->add_section(
		'ultimate_sociallinks_section', array(
		'title' 						=> __('Social Links','ultimate'),
		'priority'					=> 670,
		'panel'					=>'ultimate_contact_social_panel'
	));
	$social_links = array(); 
		$social_links_name = array();
		$social_links_name = array( __( 'Facebook', 'ultimate' ),
									__( 'Twitter', 'ultimate' ),
									__( 'Google Plus', 'ultimate' ),
									__( 'Pinterest', 'ultimate' ),
									__( 'Youtube', 'ultimate' ),
									__( 'Vimeo', 'ultimate' ),
									__( 'LinkedIn', 'ultimate' ),
									__( 'Flickr', 'ultimate' ),
									__( 'Tumblr', 'ultimate' ),
									__( 'RSS', 'ultimate' )
									);
		$social_links = array( 	'Facebook' 		=> 'social_facebook',
										'Twitter' 		=> 'social_twitter',
										'Google-Plus'	=> 'social_googleplus',
										'Pinterest' 	=> 'social_pinterest',
										'You-tube'		=> 'social_youtube',
										'Vimeo'			=> 'social_vimeo',
										'Linked'			=> 'social_linkedin',
										'Flickr'			=> 'social_flickr',
										'Tumblr'			=> 'social_tumblr',
										'RSS'				=> 'social_rss' 
									);
		$i = 0;
		foreach( $social_links as $key => $value ) {
			$wp_customize->add_setting( 'ultimate_theme_options['. $value. ']', array(
				'default'					=>'',
				'sanitize_callback'		=> 'esc_url',
				'type' 						=> 'option',
				'capability' 				=> 'manage_options'
			));
			$wp_customize->add_control( $value, array(
					'label'					=> $social_links_name[ $i ],
					'section'				=> 'ultimate_sociallinks_section',
					'settings'				=> 'ultimate_theme_options['. $value. ']',
					'type'					=> 'text',
					)
			);
			$i++;
		}
}
/********************Sanitize the values ******************************************/
function prefix_sanitize_integer( $input ) {
	return $input;
}
function ultimate_sanitize_effect( $input ) {
	if ( ! in_array( $input, array( 'fade', 'wipe', 'scrollUp', 'scrollDown', 'scrollLeft', 'scrollRight', 'blindX', 'blindY', 'blindZ', 'cover', 'shuffle' ) ) ) {
		$input = 'fade';
	}
	return $input;
}
function ultimate_sanitize_delay_transition( $input ) {
	if(is_numeric($input)){
	return $input;
	}
}
function prefix_sanitize_phone( $input ) {
	$input =  preg_replace("/[^() 0-9+-]/", '', $input);
	return $input;
}
function customize_styles_ultimate_upgrade( $input ) { ?>
	<style type="text/css">
		#customize-theme-controls #accordion-section-ultimate_upgrade_to_pro .accordion-section-title:after {
			color: #fff;
		}
		#customize-theme-controls #accordion-section-ultimate_upgrade_to_pro .accordion-section-title {
			background-color: rgba(53, 172, 168, 0.9);
			color: #fff;
			border: 0 none;
		}
		#customize-theme-controls #accordion-section-ultimate_upgrade_to_pro .accordion-section-title:hover {
			background-color: rgba(53, 172, 168, 1);
		}
		#customize-theme-controls #accordion-section-ultimate_upgrade a {
			padding: 5px 0;
			display: block;
		}
		#customize-theme-controls #accordion-section-ultimate_upgrade_to_pro a {
			color: rgba(53, 172, 168, 1);
		}
		#customize-theme-controls #accordion-section-ultimate_upgrade_to_pro a:hover {
			text-decoration: underline;
		}
	</style>
<?php }
function ultimate_upgrade_notice() {
	// Enqueue the script
	wp_enqueue_script(
		'ultimate-upgrade-pro',
		get_template_directory_uri() . '/inc/admin/js/ultimate_customizer.js',
		array(), '3.0',
		true
	);
	// Localize the script
	wp_localize_script(
		'ultimate-upgrade-pro',
		'ultimateproupgrade',
		array(
			'ultimateprourl'		=> esc_url( 'http://themehorse.com/themes/ultimate-pro/' ),
			'ultimateprolabel'	=> __( 'Upgrade to Ultimate Pro', 'ultimate' ),
		)
	);
}
add_action( 'customize_controls_enqueue_scripts', 'ultimate_upgrade_notice' );
add_action('customize_register', 'ultimate_textarea_register');
add_action('customize_register', 'ultimate_customize_register');
add_action( 'customize_controls_print_styles', 'customize_styles_ultimate_upgrade');
?>
