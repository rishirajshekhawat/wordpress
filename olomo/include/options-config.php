<?php
    if (!class_exists('Redux')){
        return;
    }
	$allowed_html_array = array(
		'i' => array(
			'class' => array()
		),
		'span' => array(
		'class' => array()
		),
		'a' => array(
		'href' => array(),
		'title' => array(),
		'target' => array()
		)
	);
  // This is your option name where all the Redux data is stored.
    $opt_name = "olomo_options";
    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );
    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */
    $sampleHTML = '';
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        //'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'olomo' ),
        'page_title'           => esc_html__( 'Theme Options', 'olomo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.
        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
    );
    Redux::setArgs( $opt_name, $args );
	Redux::setSection( $opt_name, array(
			'title' => esc_html__(' General Settings', 'olomo'),
			'desc' => esc_html__('General olomo Settings', 'olomo'),
			'icon' => 'el el-th',
			'fields' => array(										  
			 )
		));
       Redux::setSection( $opt_name, array(
        'title'            => esc_html__('URL Rewrite', 'olomo'),
        'customizer_width' => '400px',
        'icon'             => 'el el-caret-right',
		'subsection' => true,
        'fields'     => array(
			array(
				'id'    => 'info_warning',
				'type'  => 'info',
				'title' => esc_html__('URL Rewrite', 'olomo'),
				'style' => 'warning',
				'desc'  => esc_html__('Please update permalinks ( under Settings menu ) after any change you made in following slugs ( to avoice 404 page ) ', 'olomo')
			),
			array(
                'id'       => 'listing_slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Rewrite listing slug', 'olomo' ),
                'subtitle' => esc_html__( 'Default is "listing"', 'olomo' ),
                'default'  => esc_html__( 'listing','olomo'),
            ),
			array(
                'id'       => 'listing_cat_slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Rewrite listing category slug', 'olomo' ),
                'subtitle' => esc_html__( 'Default is "listing-category"', 'olomo' ),
                'default'  => esc_html__( 'listing-category','olomo'),
            ),
			array(
                'id'       => 'listing_loc_slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Rewrite location slug', 'olomo' ),
                'subtitle' => esc_html__( 'Default is "location"', 'olomo' ),
                'default'  => esc_html__('location','olomo'),
            ),
			array(
                'id'       => 'listing_features_slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Rewrite features slug', 'olomo' ),
                'subtitle' => esc_html__( 'Default is "features"', 'olomo' ),
                'default'  => esc_html__('features','olomo'),
            ),
        )
    ) );
       Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Price Range Symbol', 'olomo'),
        'customizer_width' => '400px',
        'icon'             => 'el el-caret-right',
		'subsection' => true,
        'fields'     => array(
			array(
                'id'       => 'listing_pricerange_symbol',
                'type'     => 'text',
                'title'    => esc_html__( 'Currency symbol for price range', 'olomo' ),
                'subtitle' => esc_html__( 'For example "$/¥/£/ etc". Use only one currency symbol', 'olomo' ),
                'default'  => '$',
            ),
        )
    ) );
       Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Theme Color', 'olomo'),
        'customizer_width' => '400px',
        'icon'             => 'el el-caret-right',
		'subsection' => true,
        'fields'     => array(
			array(
                'id'       => 'theme_color',
                'type'     => 'color',
                'title'    => esc_html__('Primary Theme Color', 'olomo'), 
                'default'  => '#38ccff',
                'transparent' => false,
                'validate' => 'color',
            ),
			array(
                'id'       => 'hover_color',
                'type'     => 'color',
                'title'    => esc_html__('Theme Hover Color', 'olomo'), 
                'default'  => '#03aee9',
                'transparent' => false,
                'validate' => 'color',
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Typography', 'olomo'),
        'icon'             => 'el el-th',
		'fields'     => array(
		)
    ) );
	Redux::setSection( $opt_name, array(
		'title' => esc_html__('Typography', 'olomo'),
		'desc' => esc_html__('Typography Settings', 'olomo'),
		'icon' => 'el el-caret-right',
		'subsection' => true,
		'fields' => array(
					array(
						'id'       => 'typography_h1',
						'type'     => 'typography',
						'title'    => esc_html__('H1 Setting', 'olomo'),
						'subtitle' => esc_html__('Specify the H1 font properties.', 'olomo'),
						'google'   => false,
						'font-family' => false,
						'font-style' => false,
						'font-weight'=> false,
						'font-backup' => false,
						'text-align'  => false,
						'color'       => false,
						'all_styles'  => false,
						'default'     => array(
							'font-size'    => '55',
							'line-height'  => ''
						),
					),
					array(
						'id'       => 'typography_h2',
						'type'     => 'typography',
						'title'    => esc_html__( 'H2 Setting', 'olomo' ),
						'subtitle' => esc_html__( 'Specify the H2 font properties.', 'olomo' ),
						'google'   => false,
						'font-family' => false,
						'font-style'  => false,
						'font-weight' => false,
						'font-backup' => false,
						'text-align'  => false,
						'color'       => false,
						'all_styles'=> false,
						'default'     => array(
							'font-size'   => '40',
							'line-height' => ''
						),
					),
					array(
						'id'       => 'typography_h3',
						'type'     => 'typography',
						'title'    => esc_html__('H3 Setting', 'olomo'),
						'subtitle' => esc_html__('Specify the H3 font properties.', 'olomo'),
						'google'   => false,
						'font-family' => false,
						'font-style'  => false,
						'font-weight' => false,
						'font-backup' => false,
						'text-align'  => false,
						'color'       => false,
						'all_styles'  => false,
						'default'     => array(
							'font-size'   => '32',
							'line-height' => ''
						),
					),
					array(
						'id'       => 'typography_h4',
						'type'     => 'typography',
						'title'    => esc_html__('H4 Setting', 'olomo'),
						'subtitle' => esc_html__('Specify the H4 font properties.', 'olomo'),
						'google'   => false,
						'font-family' => false,
						'font-style'  => false,
						'font-weight' => false,
						'font-backup' => false,
						'text-align'  => false,
						'color'       => false,
						'all_styles'  => false,
						'default'     => array(
							'font-size'   => '24',
							'line-height' => ''
						),
					),
					array(
						'id'       => 'typography_h5',
						'type'     => 'typography',
						'title'    => esc_html__('H5 Setting', 'olomo'),
						'subtitle' => esc_html__('Specify the H5 font properties.', 'olomo'),
						'google'   => false,
						'font-family' => false,
						'font-style'  => false,
						'font-weight' => false,
						'font-backup' => false,
						'text-align'  => false,
						'color'       => false,
						'all_styles'  => false,
						'default'     => array(
							'font-size'   => '22',
							'line-height' => ''
						),
					),
					array(
						'id'       => 'typography_h6',
						'type'     => 'typography',
						'title'    => esc_html__('H6 Setting', 'olomo'),
						'subtitle' => esc_html__('Specify the H6 font properties.', 'olomo'),
						'google'   => false,
						'font-family' => false,
						'font-style'  => false,
						'font-weight' => false,
						'font-backup' => false,
						'text-align'  => false,
						'color'       => false,
						'all_styles'  => false,
						'default'     => array(
							'font-size'   => '20',
							'line-height' => ''
						),
					),
					array(
						'id'       => 'typographyh_p',
						'type'     => 'typography',
						'title'    => esc_html__('P Tag Setting', 'olomo'),
						'subtitle' => esc_html__('Specify the P Tag font properties.', 'olomo'),
						'google'   => false,
						'font-family' => false,
						'font-style'  => false,
						'font-weight' => false,
						'font-backup' => false,
						'text-align'  => false,
						'color'       => false,
						'all_styles'  => false,
						'default'     => array(
							'font-size'   => '16',
							'line-height' => ''
						),
					),
		)
	));
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Header', 'olomo'),
        'icon'             => 'el el-th',
		'fields'     => array(
		)
    ) );
	Redux::setSection( $opt_name, array(
	'title' => esc_html__('Header Style', 'olomo'),
	'icon' => 'el el-credit-card',
	'subsection' => true,
	'fields' => array(
					array(
					'id' => 'header_style',
					'title' => esc_html__('Header Layouts', 'olomo'),
					'subtitle' => esc_html__('select a layout for header', 'olomo'),
					'type' => 'image_select',
					'options' => array(
						'1' => get_template_directory_uri().'/assets/images/header_style1.jpg',
						'header_style_2' => get_template_directory_uri().'/assets/images/header_style2.jpg',
						'header_style_3' => get_template_directory_uri().'/assets/images/header_style3.jpg',	
					),
						'default' => '1'
				),
		)
	));
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Site Logo', 'olomo'),
        'subsection' => true,
        'icon'             => 'el el-caret-right',
		'fields'     => array(	
			array(
                'id'       => 'theme_favicon',
                'type'     => 'media',
                'title'    => esc_html__('Site Favicon', 'olomo' ),
                'compiler' => 'true',
                'desc'     => esc_html__('Upload your Favicon here', 'olomo'),
                	'default'  => array( 'url' => esc_url(get_template_directory_uri().'/assets/images/favicon.png' ))
            ),
			array(
                'id'       => 'primary_logo',
                'type'     => 'media',
                'title'    => esc_html__('Light Logo', 'olomo'),
                'compiler' => 'true',
                'desc'     => esc_html__('Upload Site Logo', 'olomo'),
                'default' => array(
									'url' => esc_url(get_template_directory_uri() . '/assets/images/logo.png', 'olomo')
								)
            ),	
			array(
                'id'       => 'primary_logo2',
                'type'     => 'media',
                'title'    => esc_html__('Dark Color Logo', 'olomo'),
                'compiler' => 'true',
                'desc'     => esc_html__('Upload Dark Logo', 'olomo'),
                'default' => array(
									'url' => esc_url(get_template_directory_uri() . '/assets/images/logo2.png', 'olomo')
								)
            ),	
        )
    ) );
	 Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Footer', 'olomo'),
        'icon'             => 'el el-th',
		'fields'     => array(
		)
    ) );
	Redux::setSection( $opt_name, array(
	'title' => esc_html__('Footer Style', 'olomo'),
	'icon' => 'el el-credit-card',
	'subsection' => true,
	'fields' => array(
				  array(
						'id'       => 'footer_style',
						'type'     => 'image_select',
						'title'    => esc_html__('Select Footer layout', 'olomo'), 
						'options'  => array(
						'footer_style_1'  => array(
						'alt'   => esc_html__('Footer Style1','olomo'),
						'img'   => get_template_directory_uri().'/assets/images/footer_style1.jpg'
						),
						'1' => array(
						'alt'   => esc_html__('Footer Style2','olomo'),
						'img'   => get_template_directory_uri().'/assets/images/footer_style2.jpg'
						),
						'footer_style_3' => array(
						'alt'   => esc_html__('Footer Style3','olomo'),
						'img'   => get_template_directory_uri().'/assets/images/footer_style3.jpg'
						),
						'footer_style_4' => array(
						'alt'   => esc_html__('Footer Style4','olomo'),
						'img'   => get_template_directory_uri().'/assets/images/footer_style4.jpg'
						),
						),
						'default' => '1'
				  ),
		)
	));
	Redux::setSection( $opt_name, array(
		'title'            => esc_html__( 'Footer', 'olomo' ),
		'id'               => 'footer_section_information',
		'subsection' => true,
		'customizer_width' => '400px',
		'icon'             => 'el el-th',
		'fields'     => array(
		    array(
				'id'       => 'enable_f_linktitle',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Links Title', 'olomo' ),
				'default'  => 0,
				'on'       => esc_html__( 'Enabled', 'olomo' ),
				'off'      => esc_html__( 'Disabled', 'olomo' ),
			),	
			array(
				'id'=>'f_linktitle',
				'type' => 'text',
				'title' => esc_html__("Links Title", 'olomo'),
				'default' => esc_html__('Important Links','olomo'),
				'required' => array( 'footer_style', '=', array('footer_style_1','footer_style_3','footer_style_4'), ),
			),
			array(
				'id'       => 'footer_menu',
				'type'     => 'select',
				'title'    => esc_html__('Select Menu Link', 'olomo'), 
				'data'     => 'menu',
			),			
			array(
				'id'=>'f_contactemail',
				'type' => 'text',
				'title' => esc_html__("Contact Email", 'olomo'),
				'default' => esc_html__( 'contact@example.com','olomo'),
				'required' => array( 'footer_style', '=',  array('footer_style_3','footer_style_4') ),
			),
			array(
				'id'=>'f_contactno',
				'type' => 'text',
				'title' => esc_html__("Contact No", 'olomo'),
				'default' => '+61-1234-5678-09',
				'required' => array( 'footer_style', '=',  array('footer_style_3','footer_style_4') ),
			),
			array(
                'id'       => 'footer_full_background_image',
                'type'     => 'media',
                'title'    => esc_html__(' Footer full Background Image', 'olomo'),
                'compiler' => 'true',
                'default' => array(
									'url' => esc_url(get_template_directory_uri() . '/assets/images/footer_full_background_image.jpg', 'olomo')
								),
				'required' => array( 'footer_style', '=',  array('footer_style_3') ),
            ),	
			array(
                'id'       => 'footer_half_background_image',
                'type'     => 'media',
                'title'    => esc_html__('Footer Half Background Image', 'olomo'),
                'compiler' => 'true',
                'default' => array(
									'url' => esc_url(get_template_directory_uri() . '/assets/images/footer_half_background_image.jpg', 'olomo')
								),
				'required' => array( 'footer_style', '=',  array('footer_style_4') )				
            ),	
			array(
				'id'=>'footer_site_short_desc',
				'type' => 'textarea',
				'title' => esc_html__("Footer Website Short Description", 'olomo'),
				'default' => 'Footer Website Short Description Coming Soon',
				'required' => array( 'footer_style', '=',  array('footer_style_4') )	
			 ),
			array(
				'id'       => 'enable_f_newsletter',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Newsletter', 'olomo' ),
				'default'  => 0,
				'on'       => esc_html__( 'Enabled', 'olomo' ),
				'off'      => esc_html__( 'Disabled', 'olomo' ),
			),			
			array(
				'id'=>'f_newsletter',
				'type' => 'textarea',
				'title' => esc_html__("MailChimp Newsletter", 'olomo'),
				'desc' => esc_html__('MailChimp Newsletter Sortcode:', 'olomo' ),
				'required' => array( 'enable_f_newsletter', '=', '1' ),
			),
			array(
				'id'=>'social_url_title',
				'type' => 'text',
				'title' => esc_html__("Social URL Title", 'olomo'),
				'default' => 'Connect with Us',
				'required' => array( 'footer_style', '=',  array('footer_style_1') )	
			 ),
			array(
				'id'=>'fb',
				'type' => 'text',
				'title' => esc_html__("Facebook URL", 'olomo'),
				'default' => '#'
			),
			array(
				'id'=>'tw',
				'type' => 'text',
				'title' => esc_html__("Twitter URL", 'olomo'),
				'default' => '#'
			),
			array(
				'id'=>'gog',
				'type' => 'text',
				'title' => esc_html__("Google URL", 'olomo'),
				'default' => '#'
			),
			array(
				'id'=>'insta',
				'type' => 'text',
				'title' => esc_html__("Instagram URL", 'olomo'),
				'default' => '#'
			),
			array(
				'id'=>'tumb',
				'type' => 'text',
				'title' => esc_html__("Tumbler URL", 'olomo'),
				'default' => '#'
			),
			array(
				'id'=>'copy_right',
				'type' => 'text',
				'title' => esc_html__("Copy right information", 'olomo'),
				'default' => esc_html__('Copyright © 2019 olomo','olomo'),
			),				
		)
	) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__('Listing Filter', 'olomo'),
        'id'               => 'search_settings',
        'customizer_width' => '400px',
        'icon'             => 'el el-th',
		'fields'     => array(
		//	array(
//
//                'id'       => 'search_heading',
//
//                'type'     => 'text',
//
//                'title'    => esc_html__('Search Heading Title', 'olomo'),
//
//                'default'  => esc_html__('Find Your Destination','olomo'),
//
//            ),
//
//			array(
//
//                'id'       => 'search_form_bg',
//
//                'type'     => 'media',
//
//                'title'    => esc_html__('Search Form BG Image', 'olomo'),
//
//				'default'  => array('url' => get_template_directory_uri().'/assets/images/banner.jpg'),
//
//               
//
//            ),
			array(
				'id'       => 'default_search_cats',
				'type' => 'select',
                'data' => 'terms',
				'args' => array('taxonomies'=>'listing-category'),
                'multi' => true,
                'title' => esc_html__('Select listing Categories dropdown in search', 'olomo'),
                'subtitle' => esc_html__('These categories will be appeared on search dropdown', 'olomo'),
				'default' => '',
			),
			array(
                'id'       => 'search_placeholder',
                'type'     => 'text',
                'title'    => esc_html__('Categories Default Text', 'olomo'),
                'default'  => esc_html__('What are you looking for?','olomo'),
            ),
			array(
                'id'       => 'location_default_text',
                'type'     => 'text',
                'title'    => esc_html__('Location Default Text', 'olomo'),
                'default'  => esc_html__('Location','olomo'),
            ),
        )
    ) );
	// -> START Basic Fields
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Map Settings', 'olomo' ),
			'id'               => 'map_settings',
			'customizer_width' => '400px',
			'icon'             => 'el el el-th',
			'fields'     => array(
				array(
					'id'       => 'google_map_api',
					'type'     => 'text',
					'title'    => esc_html__( 'Google Map API', 'olomo' ),
					'subtitle' => esc_html__( 'Please set your own google map API key for your site( default key is only for demo)', 'olomo' ),					
					'default'  => 'AIzaSyDQIbsz2wFeL42Dp9KaL4o4cJKJu4r8Tvg',
				),
				array(
					'id'       => 'map_option',
					'type'     => 'select',
					'title'    => esc_html__('Select Search Mode', 'olomo'), 
					'options'  => array(
						'google' => esc_html__('Google Map','olomo'),
						'mapbox' => esc_html__('MapBox API','olomo'),
					),
					'default'  => esc_html__('google','olomo'),
				),
				array(
					'id'       => 'map_shows',
					'type'     => 'select',
					'title'    => esc_html__('Select Map Option', 'olomo'), 
					'options'  => array(
						'visitor' => esc_html__('Visitor IP Address','olomo'),
						'alllisting' => esc_html__('All Listing','olomo'),
					),
					'default'  => esc_html__('alllisting','olomo'),
				),
				array(
					'id'       => 'mapbox_token',
					'type'     => 'text',
					'title'    => esc_html__( 'Mapbox Token (Optional)', 'olomo' ),
					'subtitle' => esc_html__( 'Put here MapBox token, If you leave it empty then Google map will work', 'olomo' ),
					'required' => array( 
						array('map_option','equals','mapbox') 
					),
					'default'  => '',
				),	
				array(
                    'id'       => 'map_style',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Mapbox Map style', 'olomo'), 
                    'subtitle' => esc_html__('Select any style', 'olomo'),
					'required' => array( 
						array('map_option','equals','mapbox') 
					),
                    'options'  => array(
                        'mapbox.streets-basic'      => array(
                            'alt'   => esc_html__('streets-basic','olomo'), 
                            'img'   => get_template_directory_uri().'/assets/images/map/streets-basic.png'
                        ),
                        'mapbox.streets'      => array(
                            'alt'   => esc_html__('streets','olomo'), 
                            'img'   => get_template_directory_uri().'/assets/images/map/streets.png'
                        ),
                        'mapbox.outdoors'      => array(
                            'alt'   => esc_html__('outdoors','olomo'),
                            'img'   => get_template_directory_uri().'/assets/images/map/outdoors.png'
                        ),
						'mapbox.light'      => array(
                            'alt'   => esc_html__('light','olomo'),
                            'img'   => get_template_directory_uri().'/assets/images/map/light.png'
                        ),
						'mapbox.emerald'      => array(
                            'alt'   => esc_html__('emerald', 'olomo'),
                            'img'   => get_template_directory_uri().'/assets/images/map/emerald.png'
                        ),
						'mapbox.satellite'      => array(
                            'alt'   => esc_html__('satellite','olomo'), 
                            'img'   => get_template_directory_uri().'/assets/images/map/satellite.png'
                        ),
						'mapbox.pencil'      => array(
                            'alt'   => esc_html__('pencil','olomo'), 
                            'img'   => get_template_directory_uri().'/assets/images/map/pencil.png'
                        ),
						'mapbox.pirates'      => array(
                            'alt'   => 'pirates', 
                            'img'   => get_template_directory_uri().'/assets/images/map/pirates.png'
                        ),
                    ),
                    'default' => '1'
                ),				
			)
		) );
		// -> START Basic Fields
		Redux::setSection( $opt_name, array(
    		'title'            => esc_html__('Listing Setting', 'olomo'),
    		'id'               => 'general_settings',
    		'customizer_width' => '400px',
    		'icon'             => 'el el el-th',			
    		'fields'     => array(
    		)
    	) );
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Listing View', 'olomo' ),
			'id'               => 'listing_view',
			'customizer_width' => '400px',
			'subsection' => true,
			'icon'             => 'el el-caret-right',
			'fields'     => array(
                array(
                    'id'       => 'listing_style',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Listing page layout', 'olomo'), 
                    'options'  => array(
                        'half_map_listing'  => array(
                            'alt'   => esc_html__('Half Map With Listing','olomo'),
                            'img'   => get_template_directory_uri().'/assets/images/list_with_map.jpg'
                        ),
                        'listing_grid_listing' => array(
                            'alt'   => 'Listing Grid', 
                            'img'   => get_template_directory_uri().'/assets/images/list_with_grid.jpg'
                        ),
						'listing_advertisement_sidebar_listing' => array(
                            'alt'   => 'Listing Grid with Advertisement Banner', 
                            'img'   => get_template_directory_uri().'/assets/images/list_with_advertisement.jpg'
                        ),	
                    ),
                    'default' => 'half_map_listing'
                ),
                array(
                    'id'       => 'single_listing_style',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Single Listing Layout', 'olomo'), 
                    'options'  => array(
                        '1'      => array(
						'alt'   => 'Single Listing 1', 
                            'img'   => get_template_directory_uri().'/assets/images/listing-style1.jpg'
                        ),
                        '2'      => array(
						'alt'   => 'Single Listing 2', 
                            'img'   => get_template_directory_uri().'/assets/images/listing-style2.jpg'
                        ),
                    ),
                    'default' => '1'
                ),
				array(
					'id' => 'single_listing_banner',
					'type' => 'media',
					'title' => esc_html__('Single Listing 2 Banner Image', 'olomo'),
					'compiler' => 'true',
					'desc' => esc_html__('Upload Banner Image', 'olomo'),
					'default' => array(
									'url' => esc_url(get_template_directory_uri() . '/assets/images/banner.jpg', 'olomo')
								)
					),
					'required' => array( 
										array('single_listing_style','equal','2')
					),
					array(
					'id' => 'single_sidebar_banner',
					'type' => 'media',
					'title' => esc_html__('Sidebar Left Big Advertise Image', 'olomo'),
					'compiler' => 'true',
					'desc' => esc_html__('Upload Left Advertise Sidebar Image', 'olomo'),
					'default' => array(
									'url' => esc_url(get_template_directory_uri() . '/assets/images/ad_350x350.jpg', 'olomo')
								)
					),
					array(
					'id' => 'single_sidebar_banner_link',
					'type' => 'text',
					'title' => esc_html__('Sidebar Left Big Image Advertise Link', 'olomo'),
					'placeholder' => esc_html__('http://', 'olomo'),
					'compiler' => 'true',
					'desc' => esc_html__('Sidebar Left Big Image Advertise Link', 'olomo'),
					'default' => ''
					),
					array(
					'id' => 'single_sidebar_banner1',
					'type' => 'media',
					'title' => esc_html__('Sidebar Advertise Small Image 1', 'olomo'),
					'compiler' => 'true',
					'desc' => esc_html__('Upload Left Advertise Sidebar Image', 'olomo'),
					'default' => array(
									'url' => esc_url(get_template_directory_uri() . '/assets/images/ad_here_left.jpg', 'olomo')
								)
					),
					array(
					'id' => 'single_sidebar_banner1_link',
					'type' => 'text',
					'title' => esc_html__('Sidebar Left Small Image Advertise Link1', 'olomo'),
					'placeholder' => esc_html__('http://', 'olomo'),
					'compiler' => 'true',
					'desc' => esc_html__('Sidebar Left Small Image Advertise Link1', 'olomo'),
					'default' => ''
					),
					array(
					'id' => 'single_sidebar_banner2',
					'type' => 'media',
					'title' => esc_html__('Sidebar Advertise Small Image 2', 'olomo'),
					'compiler' => 'true',
					'desc' => esc_html__('Upload Right Advertise Sidebar Image', 'olomo'),
					'default' => array(
									'url' => esc_url(get_template_directory_uri() . '/assets/images/ad_here_right.jpg', 'olomo')
								)
					),
					array(
					'id' => 'single_sidebar_banner2_link',
					'type' => 'text',
					'title' => esc_html__('Sidebar Left Small Image 2 Advertise Link2', 'olomo'),
					'placeholder' => esc_html__('http://', 'olomo'),
					'compiler' => 'true',
					'desc' => esc_html__('Sidebar Left Small Image 2 Advertise Link2', 'olomo'),
					'default' => ''
					),
			)
		) );
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__('Submit & Edit Listing', 'olomo' ),
			'id'               => 'listing_submit_settings',
			'customizer_width' => '400px',
			'icon'             => 'el el-caret-right',
			'subsection' => true,
			'fields'     => array(
                array(
                    'id'       => 'listing_title_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Title Text', 'olomo' ),
                    'default' => esc_html__('Listing Title','olomo'),
                ),
                array(
                    'id'       => 'listing_city_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add City Text', 'olomo' ),
                    'default' => esc_html__('City','olomo'),
                ),
                array(
                    'id'       => 'listing_gadd_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Google Address Text', 'olomo' ),
                    'default' => esc_html__('Full Address (Geolocation)','olomo'),
                ),
                array(
                    'id'       => 'phone_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Phone ON/OFF', 'olomo'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_ph_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Phone Text', 'olomo' ),
                    'required' => array('phone_switch','equals','1'),
                    'default' => esc_html__('Phone','olomo'),
                ),
                array(
                    'id'       => 'web_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Website URL ON/OFF', 'olomo'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_web_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Website Text', 'olomo' ),
                    'required' => array('web_switch','equals','1'),
                    'default' => esc_html__('Website','olomo'),
                ),
                array(
                    'id'       => 'oph_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Hours ON/OFF', 'olomo'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_oph_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Operational Hours Text', 'olomo' ),
                    'required' => array('oph_switch','equals','1'),
                    'default' => esc_html__('Add Business Hours','olomo'),
                ),
                array(
                    'id'       => 'listing_cat_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Category Text', 'olomo' ),
                    'default' => esc_html__('Category','olomo'),
                ),
                array(
                    'id'       => 'digit_price_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Price From ON/OFF', 'olomo'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_digit_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Price From Text', 'olomo' ),
                    'required' => array('digit_price_switch','equals','1'),
                    'default' => esc_html__('Price From','olomo'),
                ),
                array(
                    'id'       => 'price_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Price To ON/OFF', 'olomo'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_price_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Price To Text', 'olomo' ),
                    'required' => array('price_switch','equals','1'),
                    'default' => esc_html__('Price To','olomo'),
                ),
                array(
                    'id'       => 'listing_desc_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Description Text', 'olomo' ),
                    'default' => esc_html__('Description','olomo'),
                ),
                array(
                    'id'       => 'tw_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Twitter URL ON/OFF', 'olomo'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'fb_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Facebook URL ON/OFF', 'olomo'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'lnk_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('LinkedIn ON/OFF', 'olomo'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'google_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Google Plus ON/OFF', 'olomo'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'yt_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Youtube ON/OFF', 'olomo'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'insta_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Instagram ON/OFF', 'olomo'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'tags_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Tags field ON/OFF', 'olomo'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_tags_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Tags Text', 'olomo' ),
                    'required' => array('fb_switch','equals','1'),
                    'default' => esc_html__('Tags or keywords (Comma seprated)','olomo'),
                ),
                array(
                    'id'       => 'vdo_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Business video ON/OFF', 'olomo'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_vdo_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Business video Text', 'olomo' ),
                    'required' => array('vdo_switch','equals','1'),
                    'default' => esc_html__('Your Business video','olomo'),
                ),
                array(
                    'id'       => 'file_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Image Uploading ON/OFF', 'olomo'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'listing_email_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Email Text', 'olomo' ),
                    'default'   => esc_html__( 'Enter email to signup & recieve notification upon listing approval', 'olomo' ),
                ),
                array(
                    'id'       => 'listing_btn_text',
                    'type' => 'text',
                    'title'    => esc_html__( 'Add Submit Listing Button Text', 'olomo' ),
                    'default' => esc_html__( 'Save & Preview','olomo'),
                ),
				array(
					'id'       => 'listing_edit_btn_text',
					'type' => 'text',
					'title'    => esc_html__( 'Add Edit Listing Button Text', 'olomo' ),
					'default' => esc_html__( 'Update & Preview','olomo'),
				),
			)
		) );
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Reviews Option', 'olomo' ),
			'id'               => 'listing_review_submit_option',
			'customizer_width' => '400px',
			'icon'             => 'el el-caret-right',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'   => 'info_post_review',
					'type' => 'info',
					'desc' => esc_html__('This section is for submit review option. You can ON/OFF reviews submission. You can also allow user to submit their reviews on listing by either option.', 'olomo')
				),
				array(
                    'id'       => 'review_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Review ON/OFF', 'olomo'),
                    'subtitle' => esc_html__('', 'olomo'),
                    'default'  => true,
                ),
				array(
					'id'       => 'review_submit_options',
					'type'     => 'select',
					'title'    => esc_html__('Post Review', 'olomo'),
					'required' => array('review_switch','equals','1'),					
					'subtitle' => esc_html__('Select option about review submit', 'olomo'),
					'options'  => array(
						'sign_in' => esc_html__( 'Only by logged in User','olomo'),
						'instant_sign_in' => 'Instant signup',
					),
					'default'  => 'instant_sign_in',
				)
			)
			)
		);
		/* **********************************************************************
		 * Lead form
		 * **********************************************************************/
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'Leads Form', 'olomo' ),
			'id'               => 'listing_lead_form_option',
			'customizer_width' => '400px',
			'icon'             => 'el el-caret-right',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'   => 'info_lead form',
					'type' => 'info',
					'desc' => esc_html__('Show / Hide leads form from listing detail page', 'olomo')
				),
				array(
                    'id'       => 'lead_form_switch',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Review ON/OFF', 'olomo'),
                    'default'  => true,
                ),
			)
		));		
/* **********************************************************************
 * Payment setting
 * **********************************************************************/
Redux::setSection( $opt_name, array(
    'title'  => esc_html__('Payment Settings', 'olomo' ),
    'id'     => 'payment-settings',
    'icon'   => 'el el-th',
    'fields'		=> array(
        array(
            'id'       => 'listings_admin_approved',
            'type'     => 'select',
            'title'    => esc_html__('Submited Listings Should be Approved by Admin ?', 'olomo'),
            'subtitle' => '',
            'desc'     => '',
            'options'  => array(
                'yes'   => esc_html__( 'Yes', 'olomo' ),
                'no'   => esc_html__( 'No', 'olomo' )
            ),
            'default'  => esc_html__('no','olomo'),
        ),
        array(
            'id'       => 'enable_paid_submission',
            'type'     => 'select',
            'title'    => esc_html__('Enable Paid Submission', 'olomo'),
            'subtitle' => '',
            'desc'     => '',
            'options'  => array(
                'no'   => esc_html__( 'No', 'olomo' ),
                'yes'   => esc_html__( 'Yes', 'olomo' ),
            ),
            'default'  => esc_html__('no','olomo'),
        ),
        array(
            'id'       => 'per_listing_expire',
            'type'     => 'text',
            'required' => array( 'per_listing_expire_unlimited', '=', '1' ),
            'title'    => esc_html__('Number of Expire Days', 'olomo'),
            'subtitle' => esc_html__('No of days until a listings will expire. Starts from the moment the listing is published on the website','olomo'),
            'default'  => '30',
        ),
        array(
            'id'       => 'currency_paid_submission',
            'type'     => 'select',
            'title'    => esc_html__('Currency For Paid Submission', 'olomo'),
            'options'  => array(
                'USD'  => 'USD',
                'EUR'  => 'EUR',
                'AUD'  => 'AUD',
                'BRL'  => 'BRL',
                'CAD'  => 'CAD',
                'CHF'  => 'CHF',
                'CZK'  => 'CZK',
                'DKK'  => 'DKK',
                'HKD'  => 'HKD',
                'HUF'  => 'HUF',
                'IDR'  => 'IDR',
                'ILS'  => 'ILS',
                'INR'  => 'INR',
                'JPY'  => 'JPY',
                'KOR'  => 'KOR',
                'KSH'  => 'KSH',
                'MYR'  => 'MYR',
                'MXN'  => 'MXN',
                'NGN'  => 'NGN',
                'NOK'  => 'NOK',
                'NZD'  => 'NZD',
                'PHP'  => 'PHP',
                'PLN'  => 'PLN',
                'GBP'  => 'GBP',
                'SGD'  => 'SGD',
                'SEK'  => 'SEK',
                'TWD'  => 'TWD',
                'THB'  => 'THB',
                'TRY'  => 'TRY',
                'VND'  => 'VND',
                'ZAR'  => 'ZAR'
            ),
            'default'  => 'USD',
        ),
        array(
            'id'       => 'paypal_api',
            'type'     => 'select',
            'title'    => esc_html__('Paypal And Checkout Api', 'olomo'),
            'subtitle' => esc_html__('Sandbox = test API. LIVE = real payments API', 'olomo'),
            'desc'     => esc_html__('Update PayPal Checkout settings according to API type selection', 'olomo'),
            'options'  => array(
                'sandbox'=> 'Sandbox',
                'live'   => 'Live',
            ),
            'default'  => 'sandbox',
        ),
        array(
            'id'       => 'payment_terms_condition',
            'type'     => 'select',
            'data'     => 'pages',
            'title'    => esc_html__( 'Terms & Conditions', 'olomo' ),
            'subtitle' => esc_html__( 'Select terms & conditions page.', 'olomo' ),
			'default'  => '',
        ),
         array(
            'id'       => 'payment-checkout',
            'type'     => 'select',
            'data'     => 'pages',
            'title'    => esc_html__( 'Checkout Page', 'olomo' ),
            'subtitle' => esc_html__( 'Select checkout page', 'olomo' ),
			'default'  => '',
        ), 
		array(
			'id'=>'payment_fail',
			'type' => 'select',
			'data'     => 'pages',
			'title' => esc_html__('Failed Payment page - after failed payment', 'olomo'),
			'subtitle' => esc_html__('This must be an URL.', 'olomo'),
			'default'  => '',
		),
		array(
			'id'=>'payment_success',
			'type' => 'select',
			'data'     => 'pages',
			'title' => esc_html__('Thank you page - after successful payment', 'olomo'),
			'subtitle' => esc_html__('This must be an URL.', 'olomo'),
			'default'  => '',
		),
    ),
));
Redux::setSection( $opt_name, array(
    'title'  => esc_html__('Paypal Settings', 'olomo' ),
    'id'     => 'mem-paypal-settings',
    'icon'   => 'el el-caret-right',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'enable_paypal',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable Paypal', 'olomo' ),
            'desc'     => '',
            'subtitle' => '',
            'default'  => 0,
            'on'       => esc_html__( 'Enabled', 'olomo' ),
            'off'      => esc_html__( 'Disabled', 'olomo' ),
        ),
        array(
            'id'       => 'paypal_api_username',
            'type'     => 'text',
            'required' => array( 'enable_paypal', '=', '1' ),
            'title'    => esc_html__('Paypal API Username', 'olomo'),
            'subtitle' => '',
            'desc'     => '',
            'default'  => '',
        ),
        array(
            'id'       => 'paypal_api_password',
            'type'     => 'text',
            'required' => array( 'enable_paypal', '=', '1' ),
            'title'    => esc_html__('Paypal API Password', 'olomo'),
            'default'  => '',
        ),
        array(
            'id'       => 'paypal_api_signature',
            'type'     => 'text',
            'required' => array( 'enable_paypal', '=', '1' ),
            'title'    => esc_html__('Paypal API Signature', 'olomo'),
            'default'  => '',
        ),
        array(
            'id'       => 'paypal_receiving_email',
            'type'     => 'text',
            'required' => array( 'enable_paypal', '=', '1' ),
            'title'    => esc_html__('Paypal Receiving Email', 'olomo'),
            'default'  => '',
        ),
    )
));
$adminMail = get_option('admin_email');
$blogName = get_option('blogname');
/* **********************************************************************
 * Email Management
 * **********************************************************************/
Redux::setSection( $opt_name, array(
    'title'  => esc_html__('Email Management', 'olomo' ),
    'id'     => 'olomo-email-management',
    'desc'   => esc_html__( 'Global variables: %website_url as website url,%website_name as website name, %user_email as user_email, %username as username', 'olomo' ),
    'icon'   => 'el el-th',
    'fields'		=> array(
		/* ===================================Email General Setting======================================== */
		array(
			'id'     => 'olomo-general-listing-email-info',
			'type'   => 'info',
			'notice' => false,
			'style'  => 'info',
			'title'  => wp_kses(__( '<span class="font24">General Email Settings</span>', 'olomo' ), $allowed_html_array),
			'subtitle' => esc_html__('Set email address and email sender name here', 'olomo'),
			'desc'   => ''
		),
		array(
			'id'       => 'olomo_general_email_address',
			'type'     => 'text',
			'title'    => esc_html__('Email Address', 'olomo'),
			'subtitle' => esc_html__('Email address for general email sending', 'olomo'),
			'desc'     => esc_html__('Enter email address here','olomo'),
			'default'  => $adminMail,
		),
		array(
			'id'       => 'olomo_general_email_from',
			'type'     => 'text',
			'title'    => esc_html__('Email From', 'olomo'),
			'subtitle' => esc_html__('Email sender name for general email sending', 'olomo'),
			'desc'     => esc_html__('Enter email sender name here','olomo'),
			'default'  => $blogName,
		),
		/* ===================================New User Registration======================================== */
		array(
            'id'     => 'email-new-user-info',
            'type'   => 'info',
            'notice' => false,
            'style'  => 'info',
            'title'  => wp_kses(__( '<span class="font24">New Registered User</span>', 'olomo' ), $allowed_html_array),
            'desc'   => esc_html__( '%user_login_register as username, %user_pass_register as user password, %user_email_register as new user email', 'olomo' )
        ),
        array(
            'id'       => 'olomo_subject_new_user_register',
            'type'     => 'text',
            'title'    => esc_html__('Subject for New User Notification', 'olomo'),
            'subtitle' => esc_html__('Email subject for new user notification', 'olomo'),
            'desc'     => '',
            'default'  => esc_html__('Welcome to %website_url', 'olomo'),
        ),
        array(
            'id'       => 'olomo_new_user_register',
            'type'     => 'editor',
            'title'    => esc_html__('Content for New User Notification', 'olomo'),
            'subtitle' => esc_html__('Email content for new user notification', 'olomo'),
            'desc'     => '',
            'default'  => esc_html__('Hi there,
									Welcome to %website_url! You can login now using the below credentials:
									Username:%user_login_register
									Password: %user_pass_register
									If you have any problems, please contact us.
									Thank you!', 'olomo'),
            'args' => array(
                'teeny' => false,
                'textarea_rows' => 10
            )
        ),
        array(
            'id'       => 'olomo_subject_admin_new_user_register',
            'type'     => 'text',
            'title'    => esc_html__('Subject for New User Admin Notification', 'olomo'),
            'subtitle' => esc_html__('Email subject for new user admin notification', 'olomo'),
            'default'  => esc_html__('New User Registration', 'olomo'),
        ),
        array(
            'id'       => 'olomo_admin_new_user_register',
            'type'     => 'editor',
            'title'    => esc_html__('Content for New User Admin Notification', 'olomo'),
            'subtitle' => esc_html__('Email content for new user admin notification', 'olomo'),
            'default'  => esc_html__('New user registration on %website_url.
									Username: %user_login_register,
									E-mail: %user_email_register', 'olomo'),
            'args' => array(
                'teeny' => false,
                'textarea_rows' => 10
            )
        ),
		/* ==================================New Listing Submit======================================= */
		array(
            'id'     => 'olomo-new-listing-submit-info',
            'type'   => 'info',
            'notice' => false,
            'style'  => 'info',
            'title'  => wp_kses(__( '<span class="font24">Submit Listing</span>', 'olomo' ), $allowed_html_array),
            'subtitle' => esc_html__('New listing submit mail', 'olomo'),
            'desc'   => ''
        ),
        array(
            'id'       => 'olomo_subject_new_submit_listing',
            'type'     => 'text',
            'title'    => esc_html__('Subject', 'olomo'),
            'subtitle' => esc_html__('Email subject', 'olomo'),
            'desc'     => '',
            'default'  => esc_html__('Your listing has been submitted', 'olomo'),
        ),
        array(
            'id'       => 'olomo_new_submit_listing_content',
            'type'     => 'editor',
            'title'    => esc_html__('Content', 'olomo'),
            'subtitle' => esc_html__('Email Content', 'olomo'),
            'desc'     => '',
            'default'  => esc_html__('<a><img src="http://themes.webmasterdriver.net/olomowp/wp-content/uploads/2017/03/logo.png" /></a>
<p>New  Listing has been submitted on <a href="%website_url" >%website_name</a> </p>
<h2>%listing_title</h2>
<h3>Details are Following:</h3>
<p><strong>Listing Name:</strong>%listing_title</p>
<p><strong>Listing URL:</strong>%listing_url</p>
<h3>Other Details:</h3>
<p><strong>Full Adress:</strong>452 New York City USA</p>','olomo'),
            'args' => array(
                'teeny' => false,
                'textarea_rows' => 10
            )
        ),
		array(
            'id'       => 'olomo_subject_new_submit_listing_admin',
            'type'     => 'text',
            'title'    => esc_html__('Subject(for admin)', 'olomo'),
            'subtitle' => esc_html__('Email subject', 'olomo'),
            'desc'     => '',
            'default'  => esc_html__('New listing has been submitted', 'olomo'),
        ),
		array(
            'id'       => 'olomo_new_submit_listing_content_admin',
            'type'     => 'editor',
            'title'    => esc_html__('Content(for admin)', 'olomo'),
            'subtitle' => esc_html__('Email content', 'olomo'),
            'desc'     => '',
            'default'  => esc_html__('<a><img src="http://themes.webmasterdriver.net/olomowp/wp-content/uploads/2017/03/logo.png" /></a>
<p>New  Listing has been submitted on <a href="%website_url" >%website_name</a> </p>
<h2>%listing_title</h2>
<h3>Details are Following:</h3>
<p><strong>Listing Name:</strong>%listing_title</p>
<p><strong>Listing URL:</strong>%listing_url</p>
<h3>Other Details:</h3>
<p><strong>Full Adress:</strong>452 New York City USA</p>','olomo'),
            'args' => array(
                'teeny' => false,
                'textarea_rows' => 10
            )
        ),
	/* =====================================Purchased Activated==================================== */
        array(
            'id'     => 'email-purchase-activated-info',
            'type'   => 'info',
            'notice' => false,
            'style'  => 'info',
            'title'  => wp_kses(__( '<span class="font24">Purchase Activated</span>', 'olomo' ), $allowed_html_array),
            'subtitle' => esc_html__('Package / Pay per listing has been purchased', 'olomo'),
            'desc'   => ''
        ),
        array(
            'id'       => 'olomo_subject_purchase_activated',
            'type'     => 'text',
            'title'    => esc_html__('Subject', 'olomo'),
            'subtitle' => esc_html__('Email subject for purchase activated', 'olomo'),
            'desc'     => '',
            'default'  => esc_html__('Your purchase has  activated', 'olomo'),
        ),
        array(
            'id'       => 'olomo_content_purchase_activated',
            'type'     => 'editor',
            'title'    => esc_html__('Content', 'olomo'),
            'subtitle' => esc_html__('Email content for Purchase Activated', 'olomo'),
            'desc'     => '',
            'default'  => esc_html__('<a><img src="http://themes.webmasterdriver.net/olomowp/wp-content/uploads/2017/03/logo.png" /></a>
<p>Your purchase has been successful on <a href="%website_url">%website_name</a></p>
<h3>Details are Following:</h3>
<p><strong>Plan Name:</strong>%plan_title</p>
<p><strong>Plan Price:</strong>%plan_price</p>
<p><strong>Listing Submitted:</strong>%listing_title</p>
<p><strong>Listing URL:</strong>%listing_url</p>
<p><strong>Payment Method:</strong>%payment_method</p>
<h3>Other Details:</h3>
<p><strong>Full Adress:</strong>452 New York City USA</p>','olomo'),
            'args' => array(
                'teeny' => false,
                'textarea_rows' => 10
            )
        ),
		array(
            'id'       => 'olomo_subject_purchase_activated_admin',
            'type'     => 'text',
            'title'    => esc_html__('Subject(for admin)', 'olomo'),
            'subtitle' => esc_html__('Email subject for purchase activated', 'olomo'),
            'default'  => esc_html__('A purchased has been made', 'olomo'),
        ),
		array(
            'id'       => 'olomo_content_purchase_activated_admin',
            'type'     => 'editor',
            'title'    => esc_html__('Content(for admin)', 'olomo'),
            'subtitle' => esc_html__('Email content', 'olomo'),
            'default'  => esc_html__('<a><img src="http://themes.webmasterdriver.net/olomowp/wp-content/uploads/2017/03/logo.png" /></a>
<p>Your purchase has been successful on  <a href="%website_url">%website_name</a></p>
<h3>Details are Following:</h3>
<p><strong>Plan Name:</strong>%plan_title</p>
<p><strong>Plan Price:</strong>%plan_price</p>
<p><strong>Listing Submitted:</strong>%listing_title</p>
<p><strong>Listing URL:</strong>%listing_url</p>
<p ><strong >Payment Method:</strong>%payment_method</p>
<h3>Other Details:</h3>
<p><strong>Full Adress:</strong>452 New York City USA</p>','olomo'),
            'args' => array(
                'teeny' => false,
                'textarea_rows' => 10
            )
        ),
	/* =====================================Listing Approved==================================== */
        array(
            'id'     => 'email-approved-info',
            'type'   => 'info',
            'notice' => false,
            'style'  => 'info',
            'title'  => wp_kses(__( '<span class="font24">Approved Listing</span>', 'olomo' ), $allowed_html_array),
            'subtitle' => esc_html__('You can use %listing_title as listing title, %listing_url as listing link', 'olomo'),
            'desc'   => ''
        ),
        array(
            'id'       => 'olomo_subject_listing_approved',
            'type'     => 'text',
            'title'    => esc_html__('Subject for Approved Listing', 'olomo'),
            'subtitle' => esc_html__('Email subject for approved listing', 'olomo'),
            'default'  => esc_html__('Your listing approved', 'olomo'),
        ),
        array(
            'id'       => 'olomo_listing_approved',
            'type'     => 'editor',
            'title'    => esc_html__('Content for Listing Approved', 'olomo'),
            'subtitle' => esc_html__('Email content for listing approved', 'olomo'),
            'default'  => esc_html__('<a><img src="http://themes.webmasterdriver.net/olomowp/wp-content/uploads/2017/03/logo.png" /></a>
<p>New  Listing has been submitted on <a href="%website_url" >%website_name</a> </p>
<h2>%listing_title</h2>
<h3>Details are Following:</h3>
<p><strong>Listing Name:</strong>%listing_title</p>
<p><strong>Listing URL:</strong>%listing_url</p>
<h3>Order  Details:</h3>
<p><strong>Full Adress:</strong>P-11, Paradise Floor, Sadiq Trade Center</p>','olomo'),
            'args' => array(
                'teeny' => false,
                'textarea_rows' => 10
            )
        ),
	/* =====================================Listing Expired==================================== */
        array(
            'id'     => 'email-expired-info',
            'type'   => 'info',
            'notice' => false,
            'style'  => 'info',
            'title'  => wp_kses(__( '<span class="font24">Expired Listing</span>', 'olomo' ), $allowed_html_array),
            'subtitle' => esc_html__('You can use %listing_title as listing title, %listing_url as listing link', 'olomo'),
        ),
        array(
            'id'       => 'olomo_subject_listing_expired',
            'type'     => 'text',
            'title'    => esc_html__('Subject for Expired Listing', 'olomo'),
            'subtitle' => esc_html__('Email subject for expired listing', 'olomo'),
            'default'  => esc_html__('Your listing expired', 'olomo'),
        ),
        array(
            'id'       => 'olomo_listing_expired',
            'type'     => 'editor',
            'title'    => esc_html__('Content for Listing Expired', 'olomo'),
            'subtitle' => esc_html__('Email content for listing expired', 'olomo'),
            'desc'     => '',
            'default'  => esc_html__('<a><img src="http://themes.webmasterdriver.net/olomowp/wp-content/uploads/2017/03/logo.png" /></a>
<p>New  Listing has been submitted on <a href="%website_url" >%website_name</a> </p>
<h2>%listing_title</h2>
<h3>Details are Following:</h3>
<p><strong>Listing Name:</strong>%listing_title</p>
<p><strong>Listing URL:</strong>%listing_url</p>
<h3>Order  Details:</h3>
<p><strong>Full Adress:</strong>A-1455, Paradise Floor, Sadiq USA</p>','olomo'),
            'args'   => array(
                'teeny'            => true,
                'textarea_rows'    => 10
            )
        ),
    ),
));
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__('URL Config', 'olomo' ),
			'id'               => 'URL settings',
			'customizer_width' => '400px',
			'icon'             => 'el el-th',
			'fields'     => array(
				array(
					'id'=>'login-page',
					'type' => 'text',
					'title' => esc_html__('Login Page URL', 'olomo'),
					'subtitle' => esc_html__('This must be an URL.', 'olomo'),
					'validate' => 'url',
					'default' => ''.esc_url(get_site_url()).'/login',
				),
				array(
					'id'=>'listing-author',
					'type' => 'text',
					'title' => esc_html__('Author Page URL', 'olomo'),
					'subtitle' => esc_html__('This must be an URL.', 'olomo'),
					'validate' => 'url',
					'default' => ''.esc_url(get_site_url()).'/dashboard',
				),
				array(
					'id'=>'submit-listing',
					'type' => 'text',
					'title' => esc_html__('Submit Listing', 'olomo'),
					'subtitle' => esc_html__('This must be an URL.', 'olomo'),
					'desc' => esc_html__('This is a page for Submiting new listing', 'olomo'),
					'validate' => 'url',
					'default' => ''.esc_url(get_site_url()).'/submit-your-listing',
				),
				array(
					'id'=>'edit-listing',
					'type' => 'text',
					'title' => esc_html__('Edit Listing', 'olomo'),
					'subtitle' => esc_html__('This must be an URL.', 'olomo'),
					'desc' => esc_html__('This is a page for Edit your listing', 'olomo'),
					'validate' => 'url',
					'default' => ''.esc_url(get_site_url()).'/edit-your-listing',
				),
				array(
					'id'=>'pricing-plan',
					'type' => 'text',
					'title' => esc_html__('Price plans', 'olomo'),
					'subtitle' => esc_html__('This must be an URL.', 'olomo'),
					'desc' => esc_html__('This is a page for selecting price plans', 'olomo'),
					'validate' => 'url',
					'default' => ''.esc_url(get_site_url()).'/pricing-plan',
				),
				array(
					'id'=>'term-condition',
					'type' => 'text',
					'title' => esc_html__('Terms & conditions', 'olomo'),
					'subtitle' => esc_html__('This must be an URL.', 'olomo'),
					'desc' => esc_html__('This is a page for Terms & conditions', 'olomo'),
					'validate' => 'url',
					'default' => ''.esc_url(get_site_url()).'/terms-conditions',
				),
			)
		) );
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__('Blog Page', 'olomo' ),
			'desc'            => esc_html__('Translate all text strings into your own language', 'olomo' ),
			'id'               => 'blog_page',
			'customizer_width' => '400px',
			'icon'             => 'el el-th'
		) );	
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__('Blog Page', 'olomo' ),
			'desc'            => esc_html__('Blog Page Setting', 'olomo' ),
			'id'               => 'blog_page_information',
			'customizer_width' => '400px',
			'icon'             => 'el el-caret-right',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'       => 'blog_style',
					'type'     => 'select',
					'title'    => esc_html__('Blog Page Style', 'olomo'),
					'subtitle' => esc_html__('Select Blgo Page Style', 'olomo'),
					'options'  => array(
						'BlogGrid' => 'Blog Grid Style',
						'BlogList' => 'Blog List Style',
					),
					'default'  => 'BlogList',
				),				
			)
		) );
		/*  */
    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-th',
            'title'  => esc_html__( 'Documentation', 'olomo' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>'.ecs_html__('The compiler hook has run!','olomo').'</h1>';
            echo "<pre>";
            print_r( $changed_values );
            echo "</pre>";
        }
    }
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }
            $return['value'] = $value;
            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }
            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }
            return $return;
        }
    }
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'olomo' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'olomo' ),
                'icon'   => 'el el-paper-clip',
                'fields' => array()
            );
            return $sections;
        }
    }
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            return $args;
        }
    }
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';
            return $defaults;
        }
    }
    if ( ! function_exists( 'remove_demo' ) ) {
        /*function remove_demo() {
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }*/
    }