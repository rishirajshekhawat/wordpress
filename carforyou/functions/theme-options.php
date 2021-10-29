<?php

/**

 * ReduxFramework Sample Config File

 * For full documentation, please visit: https://docs.reduxframework.com

 * */
if(!isset($_SESSION['random'])){  
     $_SESSION['random'] = wp_rand();  
}  
$random = $_SESSION['random'];  
if ( ! class_exists( 'Redux' ) ) {

	return;

}

// This is your option name where all the Redux data is stored.

global $opt_name;

$allowed_html_array = '';

$opt_name = "carforyou_options";

$theme = wp_get_theme(); 

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

	'allow_sub_menu'       => false,

	// Show the sections below the admin menu item or not

	'menu_title'           => esc_html__( 'Theme Options', 'carforyou' ),

	'page_title'           =>esc_html__( 'Theme Options', 'carforyou' ),

	// You will need to generate a Google API key to use this feature.

	// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth

	'google_api_key'       => '',

	// Set it you want google fonts to update weekly. A google_api_key value is required.

	'google_update_weekly' => false,

	// Must be defined to add google fonts to the typography module

	'async_typography'     => true,

	// Use a asynchronous font on the front end or font string

	//'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader

	'admin_bar'            => true,

	// Show the panel pages on the admin bar

	'admin_bar_icon'       => 'dashicons-admin-settings',

	// Choose an icon for the admin bar menu

	'admin_bar_priority'   => 50,

	// Choose a priority for the admin bar menu

	'global_variable'      => '',

	// Set a different name for your global variable other than the opt_name

	'dev_mode'             => false,

	// Show the time the page took to load, etc

	'update_notice'        => false,

	// If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo

	'customizer'           => true,

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

	'page_slug'            => '_carforyou_options',

	// Page slug used to denote the panel

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

	'system_info'          => false,

	// REMOVE

	//'compiler'             => true,

	// HINTS

	'hints'                => array(

		'icon'          => 'el el-question-sign',

		'icon_position' => 'right',

		'icon_color'    => 'lightgray',

		'icon_size'     => 'normal',

		'tip_style'     => array(

			'color'   => 'light',

			'shadow'  => true,

			'rounded' => false,

			'style'   => '',

		),

		

		'tip_position'  => array(

			'my' => 'top left',

			'at' => 'bottom right',

		),



		'tip_effect'    => array(

			'show' => array(

				'effect'   => 'slide',

				'duration' => '500',

				'event'    => 'mouseover',

			),



			'hide' => array(

				'effect'   => 'slide',

				'duration' => '500',

				'event'    => 'click mouseleave',

			),

		),

	)

);



  Redux::setArgs( $opt_name, $args );

            /**

             * Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples

             * */

            // Background Patterns Reader

            $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';

            $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';

            $sample_patterns      = array();

$icons = array(

    "icon-tools-2",	"icon-tools",	"icon-presentation",	"icon-search",	"icon-gears",	"icon-mobile",	"icon-layers",	"icon-compass",	"icon-clipboard",	"icon-video",	"icon-happy",	"icon-download",	"icon-envelope",	"icon-chat",	"icon-genius",	"icon-envelope",	"icon-megaphone",	"icon-heart",	"icon-dial",	"icon-laptop",	"icon-desktop",	"icon-tablet",	"icon-phone",	"icon-document",	"icon-documents",	"icon-clipboard",	"icon-newspaper",	"icon-notebook",	"icon-book-open",	"icon-browser",	"icon-calendar",	"icon-picture",	"icon-pictures",	"icon-camera",	"icon-printer",	"icon-toolbox",	"icon-briefcase",	"icon-wallet",	"icon-gift",	"icon-bargraph",	"icon-grid",	"icon-expand",	"icon-focus",	"icon-edit",	"icon-adjustments",	"icon-ribbon", "icon-hourglass", "icon-lock", "icon-shield", "icon-trophy", "icon-flag", "icon-map", "icon-puzzle", "icon-basket", "icon-streetsign", "icon-telescope", "icon-key", "icon-paperclip", "icon-attachment", "icon-pricetags", "icon-lightbulb", "icon-pencil", "icon-scissors", "icon-paintbrush", "icon-magnifying-glass", "icon-circle-compass", "icon-linegraph", "icon-mic", "icon-strategy", "icon-beaker", "icon-caution", "icon-recycle", "icon-anchor", "icon-profile-male", "icon-profile-female", "icon-bike", "icon-wine", "icon-hotairballoon", "icon-glob", "icon-map-pin", "icon-dial", "icon-cloud", "icon-upload", "icon-traget", "icon-hazardous", "icon-piechart", "icon-speedometer", "icon-global", "icon-compass", "icon-lifesaver", "icon-clock", "icon-aperture", "icon-quote", "icon-scope", "icon-alarmclock", "icon-refresh", "icon-sad", "icon-facebook", "icon-twitter", "icon-googleplus", "icon-rss", "icon-tumblr", "icon-linkedin", "icon-dribbble"

);



sort( $icons );

$iconArray = array();

foreach ( $icons as $icon ) {

    $name                       = ucwords( str_replace( '-', ' ', str_replace( array(

        'icon-',

        '-play',

        '-square',

        '-alt',

        '-circle'

    ), '', $icon ) ) );

    $iconArray[ '' . $icon ] = $name;

}

$f_icons = array(

"fa fa-mobile",	"fa fa-life-ring", "fa fa-user", "fa fa-clock-o", "fa fa-calendar", "fa fa-bookmark", "fa fa-trophy", "fa fa-car", "fa fa-cogs", "fa fa-desktop", "fa fa-transgender-alt", "fa fa-mobile","fa fa-adjust","fa fa-anchor","fa fa-archive","fa fa-area-chart","fa fa-arrows","fa fa-arrows-h","fa fa-arrows-v","fa fa-asterisk","fa fa-at","fa fa-car","fa fa-balance-scale","fa fa-ban","fa fa-university","fa fa-bar-chart","fa fa-barcode","fa fa-bars","fa fa-battery-half","fa fa-battery-full","fa fa-battery-empty","fa fa-battery-quarter","fa fa-battery-three-quarters","fa fa-bed","fa fa-beer","fa fa-bell","fa fa-bell-o","fa fa-bell-slash","fa fa-bell-slash-o","fa fa-bicycle","fa fa-binoculars","fa fa-birthday-cake","fa fa-bolt","fa fa-bomb","fa fa-book","fa fa-bookmark","fa fa-bookmark-o","fa fa-briefcase","fa fa-bug","fa fa-building","fa fa-building-o","fa fa-bullhorn","fa fa-bullseye", "fa fa-taxi","fa fa-calculator","fa fa-calendar","fa fa-calendar-check-o","fa fa-calendar-minus-o","fa fa-calendar-o","fa fa-calendar-plus-o","fa fa-calendar-times-o","fa fa-camera","fa fa-camera-retro","fa fa-car","fa fa-caret-square-o-down","fa fa-caret-square-o-left","fa fa-caret-square-o-right","fa fa-caret-square-o-up","fa fa-cart-arrow-down","fa fa-cart-plus","fa fa-cc","fa fa-certificate","fa fa-check","fa fa-check-circle","fa fa-check-circle-o","fa fa-check-square","fa fa-check-square-o","fa fa-child","fa fa-circle","fa fa-circle-o","fa fa-circle-o-notch","fa fa-circle-thin","fa fa-clock-o","fa fa-clone","fa fa-times","fa fa-cloud","fa fa-cloud-download","fa fa-cloud-upload","fa fa-code","fa fa-code-fork","fa fa-coffee","fa fa-cog","fa fa-comment","fa fa-comment-o","fa fa-commenting","fa fa-commenting-o","fa fa-comments","fa fa-comments-o","fa fa-compass","fa fa-copyright","fa fa-creative-commons","fa fa-credit-card","fa fa-crop","fa fa-crosshairs","fa fa-cube","fa fa-cubes","fa fa-cutlery","fa fa-tachometer","fa fa-database","fa fa-diamond","fa fa-dot-circle-o","fa fa-download","fa fa-pencil-square-o","fa fa-ellipsis-h","fa fa-ellipsis-v","fa fa-envelope","fa fa-envelope-o","fa fa-envelope-square","fa fa-eraser","fa fa-exchange","fa fa-exclamation","fa fa-exclamation-circle","fa fa-exclamation-triangle","fa fa-exclamation-circle","fa fa-external-link","fa fa-external-link-square","fa fa-eye","fa fa-eye-slash","fa fa-eyedropper","fa fa-fax","fa fa-rss","fa fa-female","fa fa-fighter-jet","fa fa-file-archive-o","fa fa-file-audio-o","fa fa-file-code-o","fa fa-file-excel-o","fa fa-file-image-o","fa fa-file-video-o","fa fa-file-pdf-o","fa fa-file-image-o","fa fa-file-powerpoint-o","fa fa-file-audio-o","fa fa-file-word-o","fa fa-film","fa fa-filter","fa fa-fire","fa fa-fire-extinguisher","fa fa-flag","fa fa-flag-checkered","fa fa-flag-o","fa fa-flask","fa fa-folder","fa fa-folder-o","fa fa-folder-open","fa fa-folder-open-o","fa fa-frown-o","fa fa-futbol-o","fa fa-gamepad","fa fa-gavel","fa fa-gift","fa fa-glass","fa fa-globe","fa fa-graduation-cap","fa fa-users","fa fa-hand-rock-o","fa fa-hand-lizard-o","fa fa-hand-paper-o","fa fa-hand-peace-o","fa fa-hand-pointer-o","fa fa-hand-rock-o","fa fa-hand-scissors-o","fa fa-hand-spock-o","fa fa-hdd-o","fa fa-headphones","fa fa-heart","fa fa-heart-o","fa fa-heartbeat","fa fa-history","fa fa-home","fa fa-hourglass","fa fa-hourglass-start","fa fa-hourglass-half","fa fa-hourglass-end","fa fa-hourglass-o","fa fa-i-cursor","fa fa-picture-o","fa fa-inbox","fa fa-industry","fa fa-info","fa fa-info-circle","fa fa-key","fa fa-keyboard-o","fa fa-language","fa fa-laptop","fa fa-leaf","fa fa-lemon-o","fa fa-level-down","fa fa-level-up","fa fa-life-ring","fa fa-lightbulb-o","fa fa-line-chart","fa fa-location-arrow","fa fa-lock","fa fa-magic","fa fa-magnet","fa fa-share","fa fa-reply","fa fa-reply-all","fa fa-male","fa fa-map","fa fa-map-marker","fa fa-map-o","fa fa-map-pin","fa fa-map-signs","fa fa-meh-o","fa fa-microphone","fa fa-microphone-slash","fa fa-minus","fa fa-minus-circle","fa fa-minus-square","fa fa-minus-square-o","fa fa-money","fa fa-moon-o","fa fa-graduation-cap","fa fa-motorcycle","fa fa-mouse-pointer","fa fa-music","fa fa-newspaper-o","fa fa-object-group","fa fa-object-ungroup","fa fa-paint-brush","fa fa-paper-plane","fa fa-paper-plane-o","fa fa-paw","fa fa-pencil","fa fa-pencil-square","fa fa-pencil-square-o","fa fa-phone","fa fa-phone-square","fa fa-picture-o","fa fa-pie-chart","fa fa-plane","fa fa-plug","fa fa-plus","fa fa-plus-circle","fa fa-plus-square","fa fa-plus-square-o","fa fa-power-off","fa fa-print","fa fa-puzzle-piece", "fa fa-mars", "fa fa-link", "fa fa-globe", "fa fa-file-text","fa fa-refresh", "fa fa-rocket", "fa fa-desktop", "fa fa-tachometer", "fa fa-database","fa fa-group", "fa fa-hourglass-1", "fa fa-headphones", "fa fa-gears", "fa fa-android", "fa fa-apple");

sort( $f_icons );

$f_iconArray = array();

foreach ( $f_icons as $f_icon ) {

    $name                       = ucwords( str_replace( '-', ' ', str_replace( array(

        'icon-',

        '-play',

        '-square',

        '-alt',

        '-circle'

    ), '', $f_icon ) ) );

    $f_iconArray[ '' . $f_icon ] = $name;

}





/////////////////////////////////////////////////////////////////////////////// 1. OVERALL //



Redux::setSection( $opt_name, array(

	'title' => esc_html__('Overall Setup', 'carforyou'),

	'desc' => esc_html__('Here in overall setup section you can edit basic settings related to overall website.', 'carforyou'),

	'icon' => 'el-icon-cogs',

	'indent' => true,

	'fields' => array(

		array(

			'title' => esc_html__('Title', 'carforyou'),

			'desc' => esc_html__('Description and image maybe.', 'carforyou')

		)

	)

));


       

//////////////////////////////////////////////////////////////////////////// 2. General  Setting 



Redux::setSection( $opt_name, array(

	'title' => esc_html__('General', 'carforyou'),

	'desc' => esc_html__('General carforyou Settings', 'carforyou'),

	'icon' => 'el el-th',

	'fields' => array(
	
				array(
						'id' => 'primary_color',
						'type' => 'color',
						'title' => esc_html__('Theme Primary Color ', 'carforyou'),
						'compiler' => 'true',
						'desc' => esc_html__('Theme Primary Color Scheme.', 'carforyou'),
						'transparent' => false,
						'default' => '#fa2837'
					),
				array(
						'id' => 'hover_color',
						'type' => 'color',
						'title' => esc_html__('Theme Hover Color ', 'carforyou'),
						'compiler' => 'true',
						'desc' => esc_html__('Theme Hover Color Scheme.', 'carforyou'),
						'transparent' => false,
						'default' => '#c60210'
					),
				array(
						'id'       => 'font_style',
						'type'     => 'select',
						'title'    => esc_html__('Select Font Family', 'carforyou'), 
						'desc'     => esc_html__('Please Select A Font Family', 'carforyou'),
						'options'  => array(
							'Montserrat' => 'Montserrat',
							'Lato' => 'Lato',
							'MartelSans' => 'Martel Sans',
							'OpenSans' => 'Open Sans',
							'Roboto' => 'Roboto',
						),
						'default'  => 'Lato',						
					) ,
					array(
						'id'       => 'currency_symbols',
						'type'     => 'text',
						'title'    => esc_html__('Currency Symbol', 'carforyou'), 
						'subtitle' => esc_html__('Please Input Currency symbol', 'carforyou'),
						'default' => '$'
					),
					array(
						'id'       => 'optKmMiles',
						'type'     => 'radio',
						'title'    => esc_html__('Show KM/Miles Options', 'carforyou'), 
						'subtitle' => esc_html__('No validation can be done on this field type', 'carforyou'),
						'desc'     => esc_html__('Show KM/Miles Auto list', 'carforyou'),
						//Must provide key => value pairs for radio options
						'options'  => array(
							'1' => 'KM', 
							'2' => 'Miles', 
						),
						'default' => '1'
					),
				 array(
					'subtitle' => esc_html__('Breadcrumb Enable/Disable', 'carforyou'),
					'id' => 'breadcrumb',
					'type' => 'switch',
					'title' => esc_html__('Breadcrumb Enable and Disable', 'carforyou'),
					'default' => true
				),					
				
		array(

					'id'       => 'texonomy_enable',

					'type'     => 'switch', 

					'title'    => esc_html__('Type of Car Show', 'carforyou'),

					'subtitle' => esc_html__('', 'carforyou'),

					'default'  => true,

					'required' => array( 

               			array('header_style','greater_equal','1')

            			),



					),
					
				array(
						'title'    => __( 'Select Types of Category', 'carforyou' ),
						'id'       => 'filter_product_types',
						'type'     => 'select',
							'data' => 'terms',
							'args' => array('taxonomies'=>'type-car', 'args'=>array()),
							//'args' => array('taxonomy' => 'taxonomy name'),
						'multi'    => false,
						'sortable' => false,
						'default'  => '',
						'required' => array( 

               				 array('texonomy_enable','greater_equal','1')

            			),

					  //'options'  => $f_iconArray
						
				    ),	
					
	)

));

///////////////////////////////////////////////////////////////////////////////////////////// 4. HOME PAGE  Slider//
// Redux::setSection( $opt_name, array(
	// 'title' => esc_html__('Home Slider', 'carforyou'),
	// 'desc' => esc_html__('Home Page Slider Settings', 'carforyou'),
	// 'icon' => 'el el-home',
	// 'fields' => array(
		// array(
			// 'title' => esc_html__('Title', 'carforyou'),
			// 'desc' => esc_html__('Description and image maybe.', 'carforyou')
		// ),
		// array(
				// 'id' => 'read_more_btn',
				// 'type' => 'text',
				// 'title' => esc_html__('Read More Button Text', 'carforyou'),
				// 'compiler' => 'true',
				// 'desc' => esc_html__('Please Input Read More Button Text.', 'carforyou'),
				// 'default'  => 'Read More'
			// ),
		// array(
			// 'id'          => 'home_slider',
			// 'type'        => 'slides',
			// 'title'       => esc_html__('Slides Options', 'carforyou'),
			// 'subtitle'    => esc_html__('Unlimited slides with drag and drop sortings.', 'carforyou'),
		// ),
				 
			
					
	// )
// ));

//////////////////////////////////////////////////////////////////////////// 3. Header  Settings 



Redux::setSection( $opt_name, array(

	'title' => esc_html__('Header', 'carforyou'),

	'desc' => esc_html__('Header carforyou Settings', 'carforyou'),

	'icon' => 'el el-credit-card',

	'fields' => array(

		array(

			'title' => esc_html__('Title', 'carforyou'),

			'desc' => esc_html__('Description and image maybe.', 'carforyou')

		)

	)

));



//////////////////////////////////////////////////////////////////////////// Header Style 



Redux::setSection( $opt_name, array(

	'title' => esc_html__('Header Style', 'carforyou'),

	'icon' => 'el el-credit-card',

	'subsection' => true,

	'fields' => array(

					array(

					'id' => 'header_style',

					'title' => esc_html__('Header Layouts', 'carforyou'),

					'subtitle' => esc_html__('select a layout for header', 'carforyou'),

					'type' => 'image_select',

					'options' => array(

						'1' => get_template_directory_uri().'/assets/images/h-default.png',

						'header_style_2' => get_template_directory_uri().'/assets/images/side-menu.jpg',
						
						'header_style_3' => get_template_directory_uri().'/assets/images/h-menu.png',

					),

						'default' => '1'

				),

				

				array(

					'id'       => 'email_enable',

					'type'     => 'switch', 

					'title'    => esc_html__('Show Email', 'carforyou'),

					'subtitle' => esc_html__('Show your Email Header', 'carforyou'),

					'default'  => true,

					'required' => array( 

               			array('header_style','greater_equal','1')

            			),



					),

					

				array(

					  'id'       => 'fan_fact_icon1',

					  'type'     => 'select',

					  'select2'  => array( 'containerCssClass' => 'fa' ),

					  'title'    => 'Select Fan Fact Icon 1',

					  'class'    => ' font-icons',

					  'default'  => 'fa fa-envelope',

					  'required' => array( 

               				 array('email_enable','greater_equal','1')

            			),

					  'options'  => $f_iconArray

		 			 ),

					 

				array(

		

						'id' => 'email_heading',

						'type' => 'text',

						'title' => esc_html__('Header Email Heading', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input your Email Heading.', 'carforyou'),

						'required' => array( 

               				 array('email_enable','greater_equal','1')

            			),

						'default'  => 'For Support Mail us :'	

					),

										

				array(

		

						'id' => 'header_email',

						'type' => 'text',

						'title' => esc_html__('Header Email ID', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input your Email ID.', 'carforyou'),

						'required' => array( 

               				 array('email_enable','greater_equal','1')

            			),

						'default'  => 'info@example.com'

					),

					

				array(

					'id'       => 'contact_enable',

					'type'     => 'switch', 

					'title'    => esc_html__('Show Contact Number', 'carforyou'),

					'subtitle' => esc_html__('Show your Contact Number Header', 'carforyou'),

					'default'  => true,

					'required' => array( 

               			array('header_style','greater_equal','1')

            			),

					),

				

				array(

					  'id'       => 'fan_fact_icon2',

					  'type'     => 'select',

					  'select2'  => array( 'containerCssClass' => 'fa' ),

					  'title'    => 'Select Fan Fact Icon 2',

					  'class'    => ' font-icons',

					  'default'  => 'fa fa-phone',

					  'required' => array( 

               				 array('contact_enable','greater_equal','1')

            			),

					  'options'  => $f_iconArray

					 

		 			 ),

					

				array(



						'id' => 'contact_heading',

						'type' => 'text',

						'title' => esc_html__('Header Contact Number Heading', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input your Contact Number Heading.', 'carforyou'),

						 'required' => array( 

               				 array('contact_enable','greater_equal','1')

            			),

						'default'  => 'Service Helpline Call Us:'

						),

							

				array(

						'id' => 'auto_contact_number',

						'type' => 'text',

						'title' => esc_html__('Header Contact Number', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input your Contact Number.', 'carforyou'),

						 'required' => array( 

               				 array('contact_enable','greater_equal','1')

            			),

						'default'  => '+61-1234-5678-9'

						),

						

	)

));





//////////////////////////////////////////////////////////////////////////// Header saction 

Redux::setSection( $opt_name, array(

	'title' => esc_html__('Logo', 'carforyou'),

	'desc' => esc_html__('Upload logo for website.', 'carforyou'),

	'icon' => 'el el-picture',

	'subsection' => true,

	'fields' => array(

				array(

					'id' => 'site_logo',

					'type' => 'media',

					'title' => esc_html__('Site Logo', 'carforyou'),

					'compiler' => 'true',

					'desc' => esc_html__('Upload site logo', 'carforyou')

				),

				array(

						'id' => 'site_favicon',

						'type' => 'media',

						'title' => esc_html__('Site Favicon', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Upload site favicon.', 'carforyou')

					),

	)

));





////////////////////////////////////////////////////////////////////////////  Inner Page Header Image

 

Redux::setSection( $opt_name, array(

	'title' => esc_html__('Inner Page Header', 'carforyou'),

	'desc' => esc_html__('Inner Page  Banner Setting', 'carforyou'),

	'icon' => 'el el-picture',

	'subsection' => true,

	'fields' => array(

		array(

			'id'       => 'InnerPageImg',

			'type'     => 'media', 

			'url'      => true,

			'title'    => esc_html__('Inner Page Banner Image w/ URL', 'carforyou'),

			'desc'     => esc_html__('Please Uploade Inner Page Header Banner Image.', 'carforyou'),

			'default'  => array(

				'url'=>'http://s.wordpress.org/style/images/codeispoetry.png'

			),

		),

	 )

));



////////////////////////////////////////////////////////////////////////////  Header  Social  Icons 



            Redux::setSection( $opt_name, array(

                'title' => esc_html__('Social', 'carforyou'),

                'desc' => esc_html__('Setup social profiles in Header.', 'carforyou'),

                'icon' => 'el el-network',

                'subsection' => true,

                'fields' => array(

				

					array(

					'id'       => 'header_Social_enable',

					'type'     => 'switch', 

					'title'    => esc_html__('Show Social Icons', 'carforyou'),

					'subtitle' => esc_html__('Show your Social Icons Header', 'carforyou'),

					'default'  => true,

					),

					

                    array(

                        'id' => 'header_facebook_link',

                        'type' => 'text',

                        'title' => esc_html__('Facebook Page link', 'carforyou'),

                        'compiler' => 'true',

                        'desc' => esc_html__('Please Input link to your facebook page', 'carforyou'),

						'required' => array( 

               				 array('header_Social_enable','greater_equal','1')

            				),

						'default'  => 'https://www.facebook.com'

                    ),

                    array(

                        'id' => 'header_twitter_link',

                        'type' => 'text',

                        'title' => esc_html__('Twitter Page link', 'carforyou'),

                        'compiler' => 'true',

                        'desc' => esc_html__('Please Input link to your twitter page', 'carforyou'),

						'required' => array( 

               				 array('header_Social_enable','greater_equal','1')

            				),

						'default'  => 'https://twitter.com/login'

                    ),

                    array(

                        'id' => 'header_linkedin_link',

                        'type' => 'text',

                        'title' => esc_html__('Linkedin Page link', 'carforyou'),

                        'compiler' => 'true',

                        'desc' => esc_html__('Please Input link to your Linkedin page', 'carforyou'),

						'required' => array( 

               				 array('header_Social_enable','greater_equal','1')

            				),

						'default'  => 'https://www.linkedin.com/uas/login'

                    ),

                    array(

                        'id' => 'header_google_link',

						'type' => 'text',

                        'title' => esc_html__('Google+ Page link', 'carforyou'),

                        'compiler' => 'true',

                        'desc' => esc_html__('Please Input link to your google+ page', 'carforyou'),

						'required' => array( 

               				 array('header_Social_enable','greater_equal','1')

            				),

						'default'  => 'https://plus.google.com'

                    ),

                    

					array(

							'id' => 'header_instagram_link',

							'type' => 'text',

							'title' => esc_html__('Instagram link', 'carforyou'),

							'compiler' => 'true',

							'desc' => esc_html__('Please Input link to your instagram page', 'carforyou'),

							'required' => array( 

               				 array('header_Social_enable','greater_equal','1')

            				),

							'default'  => 'https://www.instagram.com/accounts/login/'

						),

					

					array(

                        'id' => 'header_pinterest_link',

                        'type' => 'text',

                        'title' => esc_html__('Pinterest Page link', 'carforyou'),

                        'compiler' => 'true',

                        'desc' => esc_html__('Please Input link to your Pinterest page', 'carforyou'),

						'required' => array( 

               				 array('header_Social_enable','greater_equal','1')

            				),

						'default'  => 'https://in.pinterest.com/'

                    ),

					

                )

            ));

//////////////////////////////////////////////////////////////////////////////////// 6. Footer Settings



Redux::setSection( $opt_name, array(

	'title' => esc_html__('Footer', 'carforyou'),

	'desc' => esc_html__('Footer carforyou Settings', 'carforyou'),

	'icon' => 'el el-credit-card',

	'fields' => array(

		array(

			'title' => esc_html__('Title', 'carforyou'),

			'desc' => esc_html__('Description and image maybe.', 'carforyou')

		)

	)

));

 

Redux::setSection( $opt_name, array(

	'title' => esc_html__('Footer Bottom ', 'carforyou'),

	'desc' => esc_html__('Footer Bottom Setting', 'carforyou'),

	'icon' => 'el el-fork',

	'subsection' => true,

	'fields' => array(

					

		array(

					'id'       => 'footer_brand',

					'type'     => 'switch', 

					'title'    => esc_html__('Show Footer Brands', 'carforyou'),

					'subtitle' => esc_html__('Show Footer Brands', 'carforyou'),

					'default'  => true,

		),

		

		array(

			'id' => 'brand_text',

			'type' => 'text',

			'title' => esc_html__('Popular Brands Text', 'carforyou'),

			'compiler' => 'true',

			'desc' => esc_html__('Please Input Popular Brands Text.', 'carforyou'),

			'required' => array( 

               				array('footer_brand','greater_equal','1')

            ),

			'default'  => 'Popular Brands'

		),

		array(

						'id' => 'footer_brand_limit',

						'type' => 'text',

						'title' => esc_html__('Footer Popular Brands show at most', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input your Number show the most Brands Default is "6".', 'carforyou'),

						'required' => array( 

               				array('footer_brand','greater_equal','1')

            			),

						'default'  => '12'

		),

		

		array(

					'id'       => 'copyrights_enable',

					'type'     => 'switch', 

					'title'    => esc_html__('Copy Right Text', 'carforyou'),

					'subtitle' => esc_html__('Show Footer Copy Right Text', 'carforyou'),

					'default'  => true,

		),

			

		array(

			'id' => 'footer_copyrights',

			'type' => 'textarea',

			'title' => esc_html__('Copy Right Text', 'carforyou'),

			'compiler' => 'true',

			'rows' => '3',

			'desc' => esc_html__('Please Input copyrights.', 'carforyou'),

			'required' => array( 

               				array('copyrights_enable','greater_equal','1')

            ),

			'default'  => 'Copyright © 2019 <a>CarForYou</a> All Rights Reserved'

		),

		

		array(

					'id'       => 'footer_our_apps',

					'type'     => 'switch', 

					'title'    => esc_html__('Our Apps', 'carforyou'),

					'subtitle' => esc_html__('Show Footer Our Apps', 'carforyou'),

					'default'  => true,

		),

		

		array(

			'id' => 'our_app',

			'type' => 'text',

			'title' => esc_html__('Download Our APP Text:', 'carforyou'),

			'compiler' => 'true',

			'desc' => esc_html__('Please Input Download APP Text:.', 'carforyou'),

			'required' => array( 

               				array('footer_our_apps','greater_equal','1')

            ),

			'default'  => 'Download Our APP:'

		),

		

		array(

					  'id'       => 'fan_fact_icon3',

					  'type'     => 'select',

					  'select2'  => array( 'containerCssClass' => 'fa' ),

					  'title'    => 'Our App Icon 1',

					  'class'    => ' font-icons',

					  'default'  => 'fa fa-android',

					  'required' => array( 

               				array('footer_our_apps','greater_equal','1')

           			 ),

					  'options'  => $f_iconArray

		 	),

			

			array(

                        'id' => 'our_appurl_1',

                        'type' => 'text',

                        'title' => esc_html__('Our App link ', 'carforyou'),

                        'compiler' => 'true',

						'default'  => 'https://play.google.com/store',

						'required' => array( 

               				array('footer_our_apps','greater_equal','1')

            			),

                        'desc' => esc_html__('Please Input Our App link', 'carforyou')

                   ),

					

			

			array(

					  'id'       => 'fan_fact_icon4',

					  'type'     => 'select',

					  'select2'  => array( 'containerCssClass' => 'fa' ),

					  'title'    => 'Our App Icon 2',

					  'class'    => ' font-icons',

					  'default'  => 'fa fa-apple',

					  'required' => array( 

               				array('footer_our_apps','greater_equal','1')

           				 ),

					  'options'  => $f_iconArray

		 		),

				

			array(

						'id' => 'our_appurl_2',

						'type' => 'text',

						'title' => esc_html__('Our App link', 'carforyou'),

						'compiler' => 'true',

						'default'  => 'https://play.google.com/store',

						'required' => array( 

               				array('footer_our_apps','greater_equal','1')

           				 ),

						'desc' => esc_html__('Please Input Our App link', 'carforyou')

				),

		array(

            'subtitle' => __('Enable button back to top.', 'carforyou'),

            'id' => 'footer_botton_back_to_top',

            'type' => 'switch',

            'title' => esc_html__('Back To Top', 'carforyou'),

            'default' => true,

        ),

	 )

));

////////////////////////////////////////////////////////////////////////////////////  Footer Social Settings



            Redux::setSection( $opt_name, array(

                'title' => esc_html__('Social', 'carforyou'),

                'desc' => esc_html__('Setup social profiles in footer.', 'carforyou'),

                'icon' => 'el el-network',

                'subsection' => true,

                'fields' => array(

				

					array(

					'id'       => 'connect_with_us_enable',

					'type'     => 'switch', 

					'title'    => esc_html__('Connect with Us', 'carforyou'),

					'subtitle' => esc_html__('Show Footer Connect with Us Social Icons', 'carforyou'),

					'default'  => true,

					),

					array(

					'id' => 'connect_with_us_text',

					'type' => 'text',

					'title' => esc_html__('Connect with Us: ', 'carforyou'),

					'compiler' => 'true',

					'desc' => esc_html__('Please Input Connect with Us Text.', 'carforyou'),

					'required' => array( 

               				 array('connect_with_us_enable','greater_equal','1')

            			),

					'default'  => 'Connect with Us:'

					),				

                    array(

                        'id' => 'footer_facebook_link',

                        'type' => 'text',

                        'title' => esc_html__('Facebook Page link', 'carforyou'),

                        'compiler' => 'true',

                        'desc' => esc_html__('Please Input link to your facebook page', 'carforyou'),

						'required' => array( 

               				 array('connect_with_us_enable','greater_equal','1')

            			),

						'default'  => 'https://www.facebook.com'

                    ),

                    array(

                        'id' => 'footer_twitter_link',

                        'type' => 'text',

                        'title' => esc_html__('Twitter Page link', 'carforyou'),

                        'compiler' => 'true',

                        'desc' => esc_html__('Please Input link to your twitter page', 'carforyou'),

						'required' => array( 

               				 array('connect_with_us_enable','greater_equal','1')

            			),

						'default'  => 'https://twitter.com/login'

                    ),

                    array(

                        'id' => 'footer_linkedin_link',

                        'type' => 'text',

                        'title' => esc_html__('Linkedin Page link', 'carforyou'),

                        'compiler' => 'true',

                        'desc' => esc_html__('Please Input link to your Linkedin page', 'carforyou'),

						'required' => array( 

               				 array('connect_with_us_enable','greater_equal','1')

            			),

						'default'  => 'https://www.linkedin.com/uas/login'

                    ),

                    array(

                        'id' => 'footer_google_link',

                        'type' => 'text',

                        'title' => esc_html__('Google+ Page link', 'carforyou'),

                        'compiler' => 'true',

                        'desc' => esc_html__('Please Input link to your google+ page', 'carforyou'),

						'required' => array( 

               				 array('connect_with_us_enable','greater_equal','1')

            			),

						'default'  => 'https://plus.google.com'

                    ),

					

					array(

                        'id' => 'footer_Instagram_link',

                        'type' => 'text',

                        'title' => esc_html__('Instagram Page link', 'carforyou'),

                        'compiler' => 'true',

                        'desc' => esc_html__('Please Input link to your Instagram page', 'carforyou'),

						'required' => array( 

               				 array('connect_with_us_enable','greater_equal','1')

            			),

						'default'  => 'https://www.instagram.com/accounts/login/'



                    ),

					

					array(

						'id' => 'footer_pinterest_link',

						'type' => 'text',

						'title' => esc_html__('Pinterest link', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input link to your pinterest page', 'carforyou'),

						'required' => array( 

               				 array('connect_with_us_enable','greater_equal','1')

            			),

						'default'  => 'https://in.pinterest.com/'

					),

					

                )

            ));



//////////////////////////////////////////////////////////////////////////// 4. Search Filter 

Redux::setSection( $opt_name, array(

	'title' => esc_html__('Search Filter', 'carforyou'),

	'desc' => esc_html__('Search Form Car For You Settings', 'carforyou'),

	'icon' => 'el el-filter',

	'fields' => array(

		array(

			'title' => esc_html__('Title', 'carforyou'),

			'desc' => esc_html__('Search Filter Car For You', 'carforyou')

		)

	)

));



Redux::setSection( $opt_name, array(
	'title' => esc_html__('Normal Filter Form', 'carforyou'),
	'icon' => 'el el-search',
	'subsection' => true,
	'fields' => array(
				array(
				'id' => 'serch_filter',
				'type' => 'text',
				'title' => esc_html__('Search Filter Heading', 'carforyou'),
				'compiler' => 'true',
				'desc' => esc_html__('Please Input Search Filter Heading ', 'carforyou'),
				'default'  => '<h3>Find Your Dream Car <span>(Easy search from here)</span></h3>'
				),
				array(
                'id'       => 'serch_filter_pagelink',
                'type'     => 'select',
                'multi'    => false,
                'data'      => 'pages',
                'args' => array('post_type' =>'page'),
                'title'    => esc_html__('Search Filter Page Link', 'carforyou'),
                'subtitle' => esc_html__('Selected Pages will be displayed in Search Filter Page Link', 'carforyou'),
				),
				array(
				'id'       => 'form_info',
				'type'     => 'info', 
				'desc' => esc_html__('Search Filter field enalble and disabled', 'carforyou'),
				),
				array(
					'id'       => 'brand_enalble',
					'type'     => 'switch', 
					'title'    => esc_html__('Auto Brand Enable', 'carforyou'),
					'subtitle' => esc_html__('Show auto Brand Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				array(
					'id'       => 'year_enalble',
					'type'     => 'switch', 
					'title'    => esc_html__('Auto Year Moddel Enable', 'carforyou'),
					'subtitle' => esc_html__('Show Auto Year Moddel Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				array(
					'id'       => 'price_enalble',
					'type'     => 'switch', 
					'title'    => esc_html__('Auto Price Range Slider Enable', 'carforyou'),
					'subtitle' => esc_html__('Show Auto Price Range Slider Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				array(
					'id'       => 'fuel_enalble',
					'type'     => 'switch', 
					'title'    => esc_html__('Auto Fuel Enable', 'carforyou'),
					'subtitle' => esc_html__('Show Auto Fuel Type Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				array(
					'id'       => 'type_enalble',
					'type'     => 'switch', 
					'title'    => esc_html__('Auto Type Enable', 'carforyou'),
					'subtitle' => esc_html__('Show Auto Type New and Used Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				array(
					'id'       => 'advanced_enalble',
					'type'     => 'switch', 
					'title'    => esc_html__('Advanced Option Enable', 'carforyou'),
					'subtitle' => esc_html__('Show Advanced Search Filter Option Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				array(
					'id'       => 'clear_enalble',
					'type'     => 'switch', 
					'title'    => esc_html__('Clear All Enable', 'carforyou'),
					'subtitle' => esc_html__('Show Clear All Button Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				
			

	)

));


Redux::setSection( $opt_name, array(
	'title' => esc_html__('Advanced Filter Form', 'carforyou'),
	'icon' => 'el el-search',
	'subsection' => true,
	'fields' => array(
	
				
				array(
				'id' => 'serch_filter_ad',
				'type' => 'text',
				'title' => esc_html__('Advanced Search Filter Heading', 'carforyou'),
				'compiler' => 'true',
				'desc' => esc_html__('Please Input Advanced Search Filter Heading ', 'carforyou'),
				'default'  => '<h3>Find Your Dream Car <span>(advanced search here)</span></h3>'
				),
				
				array(
				'id'       => 'form_info_ad',
				'type'     => 'info', 
				'desc' => esc_html__('Advanced Search Filter field enalble and disabled', 'carforyou'),
				),
				array(
					'id'       => 'location_enalble_ad',
					'type'     => 'switch', 
					'title'    => esc_html__('Auto Location Enable', 'carforyou'),
					'subtitle' => esc_html__('Show auto Location Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				array(
					'id'       => 'brand_enalble_ad',
					'type'     => 'switch', 
					'title'    => esc_html__('Auto Brand Enable', 'carforyou'),
					'subtitle' => esc_html__('Show auto Brand Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				array(
					'id'       => 'year_enalble_ad',
					'type'     => 'switch', 
					'title'    => esc_html__('Auto Year Moddel Enable', 'carforyou'),
					'subtitle' => esc_html__('Show Auto Year Moddel Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				array(
					'id'       => 'price_enalble_ad',
					'type'     => 'switch', 
					'title'    => esc_html__('Auto Price Range Slider Enable', 'carforyou'),
					'subtitle' => esc_html__('Show Auto Price Range Slider Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				array(
					'id'       => 'type_enalble_ad',
					'type'     => 'switch', 
					'title'    => esc_html__('Auto Type Enable', 'carforyou'),
					'subtitle' => esc_html__('Show Auto Type New and Used Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				array(
					'id'       => 'milage_enalble_ad',
					'type'     => 'switch', 
					'title'    => esc_html__('Auto Milage Enable', 'carforyou'),
					'subtitle' => esc_html__('Show Auto Milage Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				array(
					'id'       => 'ceat_capacity_enalble_ad',
					'type'     => 'switch', 
					'title'    => esc_html__('Auto Seat Capacity Enable', 'carforyou'),
					'subtitle' => esc_html__('Show Auto Seat Capacity Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				array(
					'id'       => 'transmission_enalble_ad',
					'type'     => 'switch', 
					'title'    => esc_html__('Auto Transmission Enable', 'carforyou'),
					'subtitle' => esc_html__('Show Auto Transmission Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				array(
					'id'       => 'owner_enalble_ad',
					'type'     => 'switch', 
					'title'    => esc_html__('Auto No. of Owner Enable', 'carforyou'),
					'subtitle' => esc_html__('Show Auto No. Of Owner Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				array(
					'id'       => 'engine_enalble_ad',
					'type'     => 'switch', 
					'title'    => esc_html__('Auto Engine Type Enable', 'carforyou'),
					'subtitle' => esc_html__('Show Auto Engine Type Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				array(
					'id'       => 'fuel_tank_enalble_ad',
					'type'     => 'switch', 
					'title'    => esc_html__('Auto Fuel Tank Capacity Enable', 'carforyou'),
					'subtitle' => esc_html__('Show Auto Fuel Tank Capacity Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				array(
					'id'       => 'ad_clear_enalble',
					'type'     => 'switch', 
					'title'    => esc_html__('Clear All Enable', 'carforyou'),
					'subtitle' => esc_html__('Show Clear All Button Enable and Disabled', 'carforyou'),
					'default'  => true,
				),
				
			

	)

));



//////////////////////////////////////////////////////////////////////////// 5. Compare Auto Car 



Redux::setSection( $opt_name, array(

	'title' => esc_html__('Compare Car', 'carforyou'),

	'desc' => esc_html__('Compared  Car For You Settings', 'carforyou'),

	'icon' => 'el el-car',

	'fields' => array(

		array(

			'title' => esc_html__('Title', 'carforyou'),

			'desc' => esc_html__('Compare Car For You', 'carforyou')

		)

	)

));



Redux::setSection( $opt_name, array(

	'title' => esc_html__('Compare Settings', 'carforyou'),

	'icon' => 'el el-link',

	'subsection' => true,

	'fields' => array(

			array(

						'id' => 'compared_heading',

						'type' => 'text',

						'title' => esc_html__('Compare Car Heading', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input Compare Car Heading ', 'carforyou'),

						'default'  => 'Compared Auto'

					),

				array(

                'id'       => 'compared_pagelink',

                'type'     => 'select',

                'multi'    => false,

                'data'      => 'pages',

                'args' => array('post_type' =>'page'),

                'title'    => esc_html__('Compare Car Page Link', 'carforyou'),

                'subtitle' => esc_html__('Compare Car Pages will be displayed in Compare Page Link', 'carforyou'),

            ),

				

	)

));


/////////////////////////////////////////////////////////////////////////////////////////// 8. Blgo Page //



Redux::setSection( $opt_name, array(

	'title' => esc_html__('Blog ', 'carforyou'),

	'desc' => esc_html__('Blog Side Bar settings.', 'carforyou'),

	'icon' => 'el el-website',

	'fields' => array(

		array(

			'title' => esc_html__('Title', 'carforyou'),

			'desc' => esc_html__('Description and image maybe.', 'carforyou')

		)

	)

));



Redux::setSection( $opt_name, array(

	'title' => esc_html__('Blog Side Bar', 'carforyou'),

	'desc' => esc_html__('Setup Side Bar Layout.', 'carforyou'),

	'icon' => 'el el-website',

	'subsection' => true,

	'fields' => array(

					

					array(

							'subtitle' => 'Select main content and sidebar alignment.',

							'id' => 'blog-style',

							'type' => 'image_select',

							'options' => array(

								'right-sidebar' => get_template_directory_uri().'/assets/images/2col.png',

								'left-sidebar' => get_template_directory_uri().'/assets/images/2cl.png'

							),

							'title' => 'Blog Side Bar Layout',

							'default' => 'right-sidebar'

        			),

					

	)

));

Redux::setSection( $opt_name, array(

	'title' => esc_html__('Blog Single', 'carforyou'),

	'desc' => esc_html__('Blog Single Settings.', 'carforyou'),

	'icon' => 'el-icon-livejournal',

	'subsection' => true,

	'fields' => array(
        			 array(
						'subtitle' => 'Show Tags and Socials Icon at bottom of single post',
						'id' => 'show_social_post',
						'type' => 'switch',
						'title' => 'Show Tags and Socials Icon',
						'default' => false
					),
       				 array(
						'subtitle' => 'Previous/Next Pagination',
						'id' => 'show_navigation_post',
						'type' => 'switch',
						'title' => 'Previous/Next Pagination',
						'default' => false
        			),					
	)

));


/////////////////////////////////////////////////////////////////////////////////////////// 10. Listing Page Setting 



Redux::setSection( $opt_name, array(

	'title' => esc_html__('Car Listing Page', 'carforyou'),

	'desc' => esc_html__('Car Listing Style Settings', 'carforyou'),

	'icon' => 'el el-th-list',

	'fields' => array(

		array(

			'title' => esc_html__('Title', 'carforyou'),

		)

	)

));



Redux::setSection( $opt_name, array(

	'title' => esc_html__('Car Listing', 'carforyou'),

	'desc' => esc_html__('', 'carforyou'),

	'icon' => 'el el-list-alt',

	'subsection' => true,

	'fields' => array(

					array(

							'subtitle' => 'Select main Car Listing Page content alignment.',

							'id' => 'car_listing_style',

							'type' => 'image_select',

							'options' => array(

								'classic_style' => get_template_directory_uri().'/assets/images/car-listing.png',
								'grid_style' => get_template_directory_uri().'/assets/images/listing-grid.png'

							),

							'title' => 'Page Layout',

							'default' => 'classic_style'

        			),

					

					array(

							'subtitle' => 'Select main Car Listing Page sidebar alignment.',

							'id' => 'car_listing_sidebar',

							'type' => 'image_select',

							'options' => array(

								'car_list_right' => get_template_directory_uri().'/assets/images/2col.png',

								'car_list_left' => get_template_directory_uri().'/assets/images/2cl.png'

							),

							'title' => 'Sidebar Layout',

							'default' => 'car_list_right'

							

        			), 

					

					array(

					'id'       => 'serch_car_enable',

					'type'     => 'switch', 

					'title'    => esc_html__('Search Car', 'carforyou'),

					'subtitle' => esc_html__('Show Search Car Tab Side Bar Enable', 'carforyou'),

					'default'  => true,

					),

					array(

		

						'id' => 'serch_car',

						'type' => 'text',

						'title' => esc_html__('Search Car Heading Side Bar Text', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input your Heading Default is "Find Your Dream Car".', 'carforyou'),

						'required' => array( 

               				 array('serch_car_enable','greater_equal','1')

            				),

						'default'  => 'Find Your Dream Car'

					),

					

					array(

					'id'       => 'sell_car_enable',

					'type'     => 'switch', 

					'title'    => esc_html__('Sell Car', 'carforyou'),

					'subtitle' => esc_html__('Show Sell Car Tab Side Bar Enable', 'carforyou'),

					'default'  => true,

					),

					

					array(

		

						'id' => 'sell_car_title',

						'type' => 'text',

						'title' => esc_html__('Sell Car Heading Side Bar', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input your Heading Default is "Sell Your Car".', 'carforyou'),

						'required' => array( 

               				 array('sell_car_enable','greater_equal','1')

            				),

						'default'  => 'Sell Your Car'

					),

					

					array(

		

						'id' => 'sell_car_desc',

						'type' => 'text',

						'title' => esc_html__('Sell Car Description Side Bar', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input your Description Default is "Request a quote and sell your car now!".', 'carforyou'),

						'required' => array( 

               				 array('sell_car_enable','greater_equal','1')

            				),

						'default'  => 'Request a quote and sell your car now!'

						

					),

					array(

					'id' => 'sell_car_image',

					'type' => 'media',

					'title' => esc_html__('Sell Car Image Upload', 'carforyou'),

					'compiler' => 'true',

					'desc' => esc_html__('Please Input your Sell Car Image Upload', 'carforyou'),

					'required' => array( 

               				 array('sell_car_enable','greater_equal','1')

            				)

					

				),

				

					array(

		

						'id' => 'request_quote',

						'type' => 'text',

						'title' => esc_html__('Request a quote Button ', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input your Button Text Default is "Request a quote".', 'carforyou'),

						'required' => array( 

               				 array('sell_car_enable','greater_equal','1')

            				),

						'default'  => 'Request a quote'

						

					),

				

					array(

						'id'       => 'sellcar_page_link',

						'type'     => 'select',

						'multi'    => false,

						'data'      => 'pages',

						'args' => array('post_type' =>'page'),

						'title'    => esc_html__('Request a quote Link', 'carforyou'),

						'subtitle' => esc_html__('Selected Pages will be displayed in Sell Car Request a quote Link', 'carforyou'),

						'required' => array( 

               				 array('sell_car_enable','greater_equal','1')

            				)

            		),               

					

					array(

					'id'       => 'recently_car_enable',

					'type'     => 'switch', 

					'title'    => esc_html__('Recently Car', 'carforyou'),

					'subtitle' => esc_html__('Show Recently Car Tab Side Bar Enable', 'carforyou'),

					'default'  => true,

					),

		

					array(

		

						'id' => 'recently_listed',

						'type' => 'text',

						'title' => esc_html__('Recently Listed Cars Heading Text', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input your Heading Default is "Recently Listed Cars".', 'carforyou'),

						'required' => array( 

               				 array('recently_car_enable','greater_equal','1')

            				),

						'default'  => 'Recently Listed Cars'

					),

					array(

		

						'id' => 'recently_listed_limit',

						'type' => 'text',

						'title' => esc_html__('Recently Listed show at most', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input your show the Recently Listed Default is "4".', 'carforyou'),

						'required' => array( 

               				 array('recently_car_enable','greater_equal','1')

            				),

						'default'  => '4'

					),

					

	)

));


////////////////////////////////////////////////////////////////////////////////////////////
//14. Google Map Api

Redux::setSection( $opt_name, array(
			'title'            => esc_html__('Google Map', 'carforyou' ),
			'customizer_width' => '400px',
			'icon'             => 'el el-th',
			'fields'     => array(
			array(
					'id'       => 'google_map_api',
					'type'     => 'text',
					'title'    => esc_html__( 'Google Map API', 'carforyou' ),
					'subtitle' => esc_html__( 'Please set your own google map API key for your site( default key is only for demo)', 'carforyou' ),					
					'default'  => 'AIzaSyAQsTHPE1hhsGg77C0BG8p5uIAIuFraE0w',
				),
				
			)
		) 
	
);


/////////////////////////////////////////////////////////////////////////////////////////// 9. Listiing Detail Page Setting 



Redux::setSection( $opt_name, array(

	'title' => esc_html__('Car Detail Page', 'carforyou'),

	'desc' => esc_html__('Car Listing Style Settings', 'carforyou'),

	'icon' => 'el el-indent-left',

	'fields' => array(

		array(

			'title' => esc_html__('Title', 'carforyou'),

		)

	)

));



Redux::setSection( $opt_name, array(

	'title' => esc_html__('Detail Page Setting ', 'carforyou'),

	'desc' => esc_html__('', 'carforyou'),

	'icon' => 'el el-compass',

	'subsection' => true,

	'fields' => array(

						

					array(

							'subtitle' => 'Select main Car Detail Page Layout.',

							'id' => 'car_detail_style',

							'type' => 'image_select',

							'options' => array(

								'car_detail_style1' => get_template_directory_uri().'/assets/images/listing-detail-1.png',

								'car_detail_style2' => get_template_directory_uri().'/assets/images/listing-detail-2.png'

							),

							'title' => 'Page Layout',

							'default' => 'car_detail_style1'

        			),
					
					array(
							'subtitle' => 'Select main Car Detail Page sidebar alignment.',
							'id' => 'detail_sidebar_style',
							'type' => 'image_select',
							'options' => array(
								'right_style' => get_template_directory_uri().'/assets/images/2col.png',
								'left_style' => get_template_directory_uri().'/assets/images/2cl.png'
							),
							'title' => 'Side Bar Layout',
							'default' => 'right_style'
        			),
					array(
						'id'       => 'details_innerpageimg',
						'type'     => 'media', 
						'url'      => true,
						'title'    => esc_html__('Detail Page Banner Image w/ URL', 'carforyou'),
						'desc'     => esc_html__('Please Uploade Inner Page Car Detail Page Banner Image.', 'carforyou'),
						'default'  => array(
							'url'=>'http://s.wordpress.org/style/images/codeispoetry.png'

						),
					),
					array(
							'id'       => 'sidebar_s_form_enable',
							'type'     => 'switch', 
							'title'    => esc_html__('Show Search Filter', 'carforyou'),
							'subtitle' => esc_html__('Show Search Filter Enable and Disable', 'carforyou'),
							'default'  => true,
					),
					array(
							'id'       => 'financing_clc_enable',
							'type'     => 'switch', 
							'title'    => esc_html__('Show Financing Calculator', 'carforyou'),
							'subtitle' => esc_html__('Show Financing Calculator', 'carforyou'),
							'default'  => true,
					),
					array(
							'id'       => 'similar_car_enable',
							'type'     => 'switch', 
							'title'    => esc_html__('Show Similar Cars', 'carforyou'),
							'subtitle' => esc_html__('Show Similar Cars', 'carforyou'),
							'default'  => true,
					),
					array(
							'id'       => 'review_enable',
							'type'     => 'switch', 
							'title'    => esc_html__('Review ON/OFF', 'carforyou'),
							'subtitle' => esc_html__('Review ON/OFF', 'carforyou'),
							'default'  => true,
					),
					array(
						'id' => 'similar_car_text',
						'type' => 'text',
						'title' => esc_html__('Heading Similar Cars', 'carforyou'),
						'compiler' => 'true',
						'desc' => esc_html__('Please Input your Heading Default is "Similar Cars".', 'carforyou'),
						'default'  => 'Similar Cars',
						'required' => array( 
               				 array('similar_car_enable','greater_equal','1')
            				)
					),

					array(

		

						'id' => 'similar_car_limit',

						'type' => 'text',

						'title' => esc_html__('Similar Cars show at most', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input your limit Default is "3".', 'carforyou'),

						'required' => array( 

               				array('similar_car_enable','greater_equal','1')

            				),

						'default'  => '3'

					),

	)

));



Redux::setSection( $opt_name, array(

	'title' => esc_html__('Detail other Info', 'carforyou'),

	'desc' => esc_html__('Detail Info', 'carforyou'),

	'icon' => 'el el-compass',

	'subsection' => true,

	'fields' => array(

						

					array(

							'id'       => 'Schedule_enable',

							'type'     => 'switch', 

							'title'    => esc_html__('Show Schedule', 'carforyou'),

							'subtitle' => esc_html__('Show Schedule Enable', 'carforyou'),

							'default'  => true,

					),

				

					array(

		

						'id' => 'schedule',

						'type' => 'text',

						'title' => esc_html__('Schedule Heading Text', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input your Heading Default is "Schedule Test Drive".', 'carforyou'),

						'required' => array( 

               				array('Schedule_enable','greater_equal','1')

            				),

						'default'  => 'Schedule Test Drive'

					),

					array(

		

						'id' => 'schedule_form',

						'type' => 'textarea',

						'title' => esc_html__('Schedule Form Shortcode', 'carforyou'),

						'compiler' => 'true',

						'rows' => '3',

						'desc' => esc_html__('Please Input your Schedule Form Short code Contact Form 7.', 'carforyou'),

						'required' => array( 

               				array('Schedule_enable','greater_equal','1')

            				),

						'default'  => '[contact-form-7 id="484" title="Schedule Test Drive"]'

					),

					

					array(

							'id'       => 'make_offer_enable',

							'type'     => 'switch', 

							'title'    => esc_html__('Show Make Offer', 'carforyou'),

							'subtitle' => esc_html__('Show Make Offer Enable', 'carforyou'),

							'default'  => true,

					),

					

					array(

		

						'id' => 'make_offer',

						'type' => 'text',

						'title' => esc_html__('Make An Offer Heading Text', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input your Heading Default is "Make an Offer".', 'carforyou'),

						'required' => array( 

               				array('make_offer_enable','greater_equal','1')

            				),

						'default'  => 'Make an Offer'

					),

					array(

		

						'id' => 'make_offer_form',

						'type' => 'textarea',

						'title' => esc_html__('Make Offer Form Shortcode', 'carforyou'),

						'compiler' => 'true',

						'rows' => '3',

						'desc' => esc_html__('Please Input your Offer Form Short code Contact Form 7.', 'carforyou'),

						'required' => array( 

               				array('make_offer_enable','greater_equal','1')

            				),

						'default'  => '[contact-form-7 id="485" title="Make an Offer"]'	

					),

					

					array(

							'id'       => 'email_friend_enable',

							'type'     => 'switch', 

							'title'    => esc_html__('Show Email Friend', 'carforyou'),

							'subtitle' => esc_html__('Show Email Friend Enable', 'carforyou'),

							'default'  => true,

					),

		

					array(

		

						'id' => 'email_friend',

						'type' => 'text',

						'title' => esc_html__('Email Friend Heading Text', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input your Heading Default is "Email to a Friend".', 'carforyou'),

						'required' => array( 

               				array('email_friend_enable','greater_equal','1')

            				),

						'default'  => 'Email to a Friend'

					),

					array(

		

						'id' => 'email_friend_form',

						'type' => 'textarea',

						'title' => esc_html__('Email Friend Form Shortcode', 'carforyou'),

						'compiler' => 'true',

						'rows' => '3',

						'desc' => esc_html__('Please Input your Email Friend Form Short code Contact Form 7.', 'carforyou'),

						'required' => array( 

               				array('email_friend_enable','greater_equal','1')

            				),

						'default'  => '[contact-form-7 id="486" title="Email to a Friend"]'

					),

					

					array(

							'id'       => 'request_more_enable',

							'type'     => 'switch', 

							'title'    => esc_html__('Show Request More', 'carforyou'),

							'subtitle' => esc_html__('Show Request More Enable', 'carforyou'),

							'default'  => true,

					),

					

					array(

		

						'id' => 'request_more_Info',

						'type' => 'text',

						'title' => esc_html__('Request More Info Heading Text', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input your Heading Default is "Request More Info".', 'carforyou'),

						'required' => array( 

               				array('request_more_enable','greater_equal','1')

            				),

						'default'  => 'Request More Info'

					),

					array(

		

						'id' => 'request_more_form',

						'type' => 'textarea',

						'title' => esc_html__('Request Form Shortcode', 'carforyou'),

						'compiler' => 'true',

						'rows' => '3',

						'desc' => esc_html__('Please Input your Request More Form Short code Contact Form 7.', 'carforyou'),

						'required' => array( 

               				array('request_more_enable','greater_equal','1')

            				),

						'default'  => '[contact-form-7 id="487" title="Request More Info"]'	

					),

																		

	)

));

////////////////////////////////////////////////////////////////////////////////////////////
//14. App Setup

Redux::setSection( $opt_name, array(
			'title'            => esc_html__('APP Setup', 'carforyou' ),
			'id'               => 'APP settings',
			'customizer_width' => '400px',
			'icon'             => 'el el-th',
			'fields'     => array(
			array(
                'id'       => 'security_key',
                'type'     => 'text',
				'style'	   => 'info',
				'readonly' => true,
                'title'    => esc_html__( 'Protected Key:', 'carforyou' ),
				'default' => esc_html__($random, 'carforyou'),
            ),	
			array(
            'id'     => 'download_app',
            'type'   => 'info',
            'notice' => false,
            'style'  => 'info',
            'title'  => wp_kses(__( '<a href="http://themes.webmasterdriver.net/carforyou/android/carforyou.apk" class="btn btn-primary">Download APP</a>', 'carforyou' ), $allowed_html_array),
            'subtitle' => esc_html__('You can download app on clicking above dowload button', 'carforyou'),
        ),
			
				array(
            'id'       => 'enable_app',
            'type'     => 'switch',
            'title'    => esc_html__( 'Enable APP', 'carforyou' ),
            'desc'     => '',
            'subtitle' => '',
            'default'  => 0,
            'on'       => esc_html__( 'Enabled', 'carforyou' ),
            'off'      => esc_html__( 'Disabled', 'carforyou' ),
        ),
		array(

					'id' => 'app_logo',

					'type' => 'media',

					'title' => esc_html__('APP Logo', 'carforyou'),

					'compiler' => 'true',

					'desc' => esc_html__('Upload APP logo', 'carforyou')

				),
			array(
						'id' => 'splash_color',
						'type' => 'color',
						'title' => esc_html__('Splash Screen Color ', 'carforyou'),
						'compiler' => 'true',
						'desc' => esc_html__('App Splash Screen Color.', 'carforyou'),
						'transparent' => false,
						'default' => '#fa2837'
					),
			array(
                'id'       => 'app_title',
                'type'     => 'text',
                'title'    => esc_html__( 'App Title', 'carforyou' ),
					'default' => get_bloginfo('name', 'display'),
            ),
			array(
                'id'       => 'app_url',
                'type'     => 'text',
				'readonly' => true,
                'title'    => esc_html__( 'App URL', 'carforyou' ),
                'subtitle' => esc_html__( 'Add Url which you run into APP', 'carforyou' ),
                'validate' => 'url',
					'default' => ''.esc_url(get_site_url()).'/',
            ),
			
		
				
			)
		) );



/////////////////////////////////////////////////////////////////////////////////////////// 13. Coming Soon Form Setting
Redux::setSection( $opt_name, array(

	'title' => esc_html__('Coming Soon', 'carforyou'),

	'desc' => esc_html__('Coming Soon Form', 'carforyou'),

	'icon' => 'el el-file-new-alt',

	'fields' => array(

		array(

			'title' => esc_html__('Title', 'carforyou'),

		)

	)

));



Redux::setSection( $opt_name, array(

	'title' => esc_html__('Coming Soon Form Settings', 'carforyou'),

	'icon' => 'el el-cog',

	'subsection' => true,

	'fields' => array(
						
						array(

						'id'       => 'coming_soon_bg',

						'type'     => 'media', 

						'url'      => true,

						'title'    => esc_html__('Coming Soon Page background Image w/ URL', 'carforyou'),

						'desc'     => esc_html__('Please Uploade Coming Soon Page background Image.', 'carforyou'),

						'default'  => array(

							'url'=>'http://s.wordpress.org/style/images/codeispoetry.png'

						),

					),
					
						array(

						'id' => 'form_heading',

						'type' => 'text',

						'title' => esc_html__('Coming Soon Form Heading ', 'carforyou'),

						'compiler' => 'true',

						'desc' => esc_html__('Please Input your Heading Default is "Do you have any Questions?".', 'carforyou'),

						'default'  => 'Do you have any Questions?'

						),

						

						array(

		

						'id' => 'shortcode_form1',

						'type' => 'textarea',

						'title' => esc_html__('Coming Soon Form short code ', 'carforyou'),

						'compiler' => 'true',

						'rows' => '3',

						'desc' => esc_html__('Please Input your short code Contact Form 7.', 'carforyou'),

						'default'  => '[contact-form-7 id="842" title="Coming Soon"]'

						),
						
						array(
						'id' => 'countdown_timer',
						'type' => 'date',
						'date-format' => 'M-d-y',
						'title' => esc_html__('Add Date Countdown Timer', 'carforyou'),
						'compiler' => 'true',
						'default'=> '03/22/2020',
						'desc' => esc_html__('Examples:- mm/dd/yy', 'carforyou')
					) ,

	)

));



/////////////////////////////////////////////////////////////////////////////////////////// 14. 404 page settings Settings



            Redux::setSection( $opt_name, array(

                'title' => esc_html__('404 Page', 'carforyou'),

                'desc' => esc_html__('404 page settings.', 'carforyou'),

                'icon' => 'el el-question-sign',

                'fields' => array(

                    array(

                        'title' => esc_html__('Title', 'carforyou'),

                        'desc' => esc_html__('Description and image maybe.', 'carforyou')

                    )

                )

            ));



            Redux::setSection( $opt_name, array(

                'title' => esc_html__('404 Page Content', 'carforyou'),

                'desc' => esc_html__('Setup 404 Page details here.', 'carforyou'),

                'icon' => 'el el-cog-alt',

                'subsection' => true,

                'fields' => array(

								array(

										'id' => '404_header_image',

										'type' => 'media',

										'title' => esc_html__('404 Page Header Image', 'carforyou'),

										'compiler' => 'true',

										'desc' => esc_html__('Upload 404 Page Header Image.', 'carforyou')

									),

								 array(

									'id' => '404_page_title',

									'type' => 'text',

									'title' => esc_html__('404 Title', 'carforyou'),

									'compiler' => 'true',

									'desc' => esc_html__('Input 404 Page Title here Ex. Page Not Found', 'carforyou'),

									'default'  => 'Error 404'

								) ,

								 array(

									'id' => '404_page_mid_title',

									'type' => 'text',

									'title' => esc_html__('Title', 'carforyou'),

									'compiler' => 'true',

									'desc' => esc_html__('Input 404 Page section Mid title here Ex.Error This page is out of site', 'carforyou'),

									'default'  => '4<span>0</span>4'

								) ,

								array(

									'id' => '404_page_content',

									'type' => 'textarea',

									'title' => esc_html__('404 Content', 'carforyou'),

									'compiler' => 'true',

									'desc' => esc_html__('Input 404 Page Content here', 'carforyou'),

								) ,

                )

            ));