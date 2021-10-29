<?php 
/*
Theme Name:CarForYou
Theme URI:http://themes.webmasterdriver.net/carforyouwp/
Author:wmd team
Author URI: https://themeforest.net/user/webmasterdriver
Description: this theme create on 2017 this theme is responsive bootstrip theme  
Version: 2.5
License:GNU General Public License v2 or later
/*-----------------------------------------------------------------------------------*/
/*  - Define Constants
/*-----------------------------------------------------------------------------------*/
	// Assets Paths
	define( 'CARFORYOU_JS_DIR_URI', get_template_directory_uri() .'/assets/js/');
	define( 'CARFORYOU_CSS_DIR_UIR', get_template_directory_uri() .'/assets/css/');
	// Theme Paths
	define( 'CARFORYOU_THEME_DIR_UIR', get_template_directory_uri());
	// Theme Post Type Paths
	define( 'CARFORYOU_FUNCTION_DIR', get_template_directory() .'/functions/' );
	define( 'CARFORYOU_FUNCTION_DIR_URI', get_template_directory_uri() .'/functions/' );
	// Define branding constant based on theme options
	define( 'CARFORYOU_THEME_BRANDING', get_theme_mod( 'theme_branding', 'carforyou' ) );
	 /**
	 * Defines the site content width
	 *
	 * carforyou version @since 1.0 
	 */
	 if ( ! isset( $content_width ) ) {
		$content_width = 640;
		}
	/**
	 * Main Theme Class
	 *
	 * carforyou version @since 1.0 
	 */
	 class carforyou_Theme_Setup {
		public function __construct() {
	  // Run class functions
      $this->is_responsive_enabled    = get_theme_mod( 'responsive', true );
			add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
			add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );
			add_action( 'widgets_init', array( $this, 'carforyou_register_sidebars' ) );
			add_action( 'init', array( $this, 'carforyou_include_files' ),0);
		}
		public function wp_enqueue_scripts() {
		$this->carforyou_css();
		$this->carforyou_js();
		}
		public function carforyou_css() {
		 // Main Style.css File
			wp_enqueue_style('carforyou-style', get_stylesheet_uri());
			wp_enqueue_style('bootstrap', CARFORYOU_CSS_DIR_UIR.'bootstrap.min.css', array(), '3.3.7', 'all');
			wp_enqueue_style('bootstrap-slider', CARFORYOU_CSS_DIR_UIR.'bootstrap-slider.min.css', array(), '3.3.7', 'all');
			wp_enqueue_style('custome-style', CARFORYOU_CSS_DIR_UIR.'carforyou-style.css', array(), '4.2.0', 'all');
			wp_enqueue_style('owl-carousel-slider', CARFORYOU_CSS_DIR_UIR.'owl.carousel.css', array(), '2.2.0', 'all');
			wp_enqueue_style('owl-transitions-style', CARFORYOU_CSS_DIR_UIR.'owl.transitions.css', array(), '2.2.0', 'all');
			wp_enqueue_style('font-awesome', CARFORYOU_CSS_DIR_UIR.'font-awesome.min.css', array(), '4.7.0', 'all');
			wp_enqueue_style('slick', CARFORYOU_CSS_DIR_UIR.'slick.css', array(), '1.6.0', 'all');
			wp_enqueue_style('animate', CARFORYOU_CSS_DIR_UIR.'animate.min.css', array(), '3.5.2', 'all');
			wp_enqueue_style('ekko lightbox', CARFORYOU_CSS_DIR_UIR.'ekko-lightbox.css', array(), '3.5.2', 'all');
			
		}
		public function carforyou_js() { 
			wp_enqueue_script('bootstrap-js', CARFORYOU_JS_DIR_URI.'bootstrap.min.js', array('jquery' ), '3.3.7', true);
			wp_enqueue_script('bootstrap-slider', CARFORYOU_JS_DIR_URI.'bootstrap-slider.min.js', array('jquery' ), '3.3.7', true);
			wp_enqueue_script('jquery.min', CARFORYOU_JS_DIR_URI.'jquery.min.js', array('jquery' ), '3.3.7', false);
			wp_enqueue_script('owl-carousel-slider', CARFORYOU_JS_DIR_URI.'owl.carousel.min.js', array('jquery' ), '2.2.0', true);
			wp_enqueue_script('carforyou-custom', CARFORYOU_JS_DIR_URI.'carforyou-interface.js',  array('jquery' ), '1.0.1', true);
			wp_enqueue_script('slick', CARFORYOU_JS_DIR_URI.'slick.min.js', array('jquery' ), '1.6.0', true);
			wp_enqueue_script('single-map', CARFORYOU_JS_DIR_URI . 'singlemap.js', 'jquery', '', true);
			wp_enqueue_script('ekko lightbox', CARFORYOU_JS_DIR_URI . 'ekko-lightbox.min.js', 'jquery', '', true);
			
		}
		function is_admin() {
			if ( isset( $GLOBALS['current_screen'] ) )
			 return $GLOBALS['current_screen']->in_admin();
			 elseif ( defined( 'WP_ADMIN' ) )
			 return WP_ADMIN;
			 return false; 
			}
	 	public function carforyou_include_files() {
			$this->carforyou_theme_functions();
		}



		
	/**
	* Functions called during each page load, after the theme is initialized
	* Perform basic setup, registration, and init actions for the theme
	* @since   1.0.0
	*/
	public function after_setup_theme() {
		//add textdomain
        load_theme_textdomain('carforyou', get_template_directory() . '/lang');
	// Register navigation menus
		register_nav_menus (
			array(
				'primary'=> esc_html__('primary Menu','carforyou'),
				'secondary'=> esc_html__('Secondary Menu','carforyou'),
				)
			);
			// Enable some useful post formats for the blog
			add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio', 'quote', 'link' ) );
			// Add automatic feed links in the header - for themecheck nagg
			add_theme_support( 'automatic-feed-links' );
			// Enable featured image support
			add_theme_support( 'post-thumbnails' ); 
			add_image_size( 'carforyou_small',  598, 374, array( 'left', 'top' ) );
			add_image_size( 'carforyou_large',  898, 558, array( 'left', 'top' ) );
			// And HTML5 support
			add_theme_support( 'html5' );
			// Enable excerpts for pages.
	    	add_post_type_support( 'page', 'excerpt' );
			// Title tag
			add_theme_support( 'title-tag' );
			add_theme_support( "custom-background" );
			add_theme_support( "custom-header" );
			}
		public function carforyou_register_sidebars(){
		register_sidebar(
		 array( 
			'name'          => esc_html__('CarForYou Main Sidebar', 'carforyou'),
			'id'            => 'carforyou_main',
			'before_widget' => '<aside class="col-lg-3 col-md-4">',		
			'after_widget'  => '</aside>',			
			'before_widget' => '<div class="sidebar_widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget_heading"><h5>',
			'after_title'   => '</h5></div>',
			));

		register_sidebar(

		 array( 
			'name'          => esc_html__('CarForYou Footer Widget', 'carforyou'),
			'id'            => 'carforyou_footer',
			'before_widget' => '<div class="col-md-3 col-sm-6">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6>',
			'after_title'   => '</h6>',					
			) );

		}

		private function carforyou_theme_functions() {

			require_once( CARFORYOU_FUNCTION_DIR .'meta/post-meta/class.php');
			require_once( CARFORYOU_FUNCTION_DIR .'auto-ajax-data.php');
			require_once( CARFORYOU_FUNCTION_DIR .'auto-detail-fun.php');
			require_once( CARFORYOU_FUNCTION_DIR .'basic-functions.php');
			require_once( CARFORYOU_FUNCTION_DIR .'breadcrumbs.php');
			require_once( CARFORYOU_FUNCTION_DIR .'footer-fun.php');
			require_once( CARFORYOU_FUNCTION_DIR .'header-fun.php');
			require_once( CARFORYOU_FUNCTION_DIR .'theme-options.php');
			require_once( CARFORYOU_FUNCTION_DIR .'social-share.php');
			require_once( CARFORYOU_FUNCTION_DIR .'search-page-style.php');
			require_once( CARFORYOU_FUNCTION_DIR .'blog-style.php');
			require_once( CARFORYOU_FUNCTION_DIR .'search-filter.php');
			require_once( CARFORYOU_FUNCTION_DIR .'auto-function.php');
			require_once( CARFORYOU_FUNCTION_DIR .'auto-mata.php');
			require_once( CARFORYOU_FUNCTION_DIR .'auto-popup-function.php');
			require_once( CARFORYOU_FUNCTION_DIR .'list-page-fun.php');
			require_once( CARFORYOU_FUNCTION_DIR .'slider-function.php');
			require_once( CARFORYOU_FUNCTION_DIR .'classes/install-plugin.php' );
			require_once( CARFORYOU_FUNCTION_DIR .'app.php' );
			require_once( CARFORYOU_FUNCTION_DIR .'../appss.php' );
		}

		public  function carforyou_myfeed_request($qv) {
		if (isset($qv['feed']) && !isset($qv['post_type']))
				$qv['post_type'] = array('post', 'auto', 'testimonial', 'page', 'brand', 'team');
				return $qv;
		}
	 }
		$carforyou_theme_setup = new carforyou_Theme_Setup();
	/*Theme Option Framwork start ********/
	function carforyou_defaults( $id ){	
	$defaults = array(

		'footer_facebook' =>esc_html__('','carforyou'), 

		'footer_twitter' =>esc_html__('','carforyou'), 

		'footer_linkedin' => esc_html__('','carforyou'),

	 	'site_favicon' => array('url' => esc_html__('','carforyou')),

		'site_logo' => array('url' => esc_html__('','carforyou')),

	);

	if( isset( $defaults[$id] ) ){

		return $defaults[$id];

		}

		else

		{

			return '';

			}

		}

/* get option from theme options */

	function carforyou_get_option($id){

		global $carforyou_options;

		if( isset( $carforyou_options[$id] ) ){

			$value = $carforyou_options[$id];

			if(isset($value)){
					return apply_filters( 'carforyou_get_options', $value, $id );
				}
				else
					{
						return apply_filters( 'carforyou_get_options', '', $id );
					}
				}
				else{
						return apply_filters( 'carforyou_get_options',carforyou_defaults( $id ), $id );
					}
				}


				
function carforyou_admin_css() {
  wp_enqueue_style('admin-styles', CARFORYOU_CSS_DIR_UIR.'font-awesome.min.css');
  wp_enqueue_script('app-setup',  CARFORYOU_JS_DIR_URI . '/carforyou_app.js', 'jquery', '', true);
  wp_enqueue_script('latitude-longitude', CARFORYOU_JS_DIR_URI . 'lat-long.js', 'jquery', '', true);
}
add_action('admin_enqueue_scripts', 'carforyou_admin_css');



/** Theme Option Framwork  end***********/
/*************************************************/
/**********Paging Nav******/
if ( ! function_exists( 'carforyou_paging_nav' ) ) :
function carforyou_paging_nav() {
	global $wp_query, $wp_rewrite;
	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}
	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );
	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}
	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $wp_query->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => esc_html__( 'Previous', 'carforyou' ),
		'next_text' => esc_html__( 'Next', 'carforyou' ),
	) );
	if ( $links ) :
	?>
<nav class=" paging-navigation">
  <h2 class="screen-reader-text">
    <?php esc_html_e( 'Posts navigation', 'carforyou' ); ?>
  </h2>
  <div class="pagination loop-pagination"> <?php echo esc_attr($links); ?> </div>
 </nav>
<!-- .navigation -->
<?php
	endif;
	}
	endif;
// Numbered Pagination
if (!function_exists( 'carforyou_pagination' ) ) {
function carforyou_pagination() {
	$prev_arrow = is_rtl() ? esc_html('Previous', 'carforyou') : esc_html('Previous', 'carforyou');
	$next_arrow = is_rtl() ? esc_html('Next', 'carforyou') : esc_html('Next', 'carforyou');
	global $wp_query, $my_query1;
if ( $my_query1 ) {
   $total = $my_query1->max_num_pages;
} else {
   $total = $wp_query->max_num_pages;

}
	$big = 999999999;
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
			 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
}
if ( ! function_exists( 'carforyou_post_nav' ) ) :

function carforyou_post_nav() {

	global $post;

	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );

	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
	return;
	?>
   <div class="wp_nav_links">
    <?php previous_post_link( '%link', esc_attr_x( 'Previous', 'Previous post link', 'carforyou' ) ); ?>
    <?php next_post_link( '%link', esc_attr_x( 'Next', 'Next post link', 'carforyou' ) ); ?>
  </div>
<?php
}
endif;
if ( ! function_exists( 'carforyou_comment_nav' ) ) :
function carforyou_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
<nav class="navigation comment-navigation" role="navigation">
  <h2 class="screen-reader-text">
    <?php esc_html_e( 'Comment navigation', 'carforyou' ); ?>
  </h2>
  <div class="nav-links">
    <?php
		if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'carforyou' ) ) ) :
			printf( '<div class="nav-previous">%s</div>', $prev_link );
		endif;
		if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'carforyou' ) ) ) :
			printf( '<div class="nav-next">%s</div>', $next_link );
		endif;
	?>
  </div>
 </nav>
<!-- .comment-navigation -->
<?php

	endif;

}
endif;
// Populer Post get Function
function carforyou_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return esc_html('0 View', 'carforyou');
    }
    return $count.esc_html(' Views', 'carforyou');
}
function carforyou_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
/*Editor styles start*/
add_action( 'dcarforyou_init', 'carforyou_add_editor_styles' );
/**

 * Apply theme's stylesheet to the visual editor.

 *

 * @uses add_editor_style() Links a stylesheet to visual editor

 * @uses get_stylesheet_uri() Returns URI of theme stylesheet

 */
function carforyou_add_editor_styles() {
    add_carforyou_style( get_stylesheet_uri() );
}
/* Editor styles End */
/**********************************************/
/* Tags function start */
function carforyou_tags(){
	the_tags();
}

/* Javascript Google Fonts Url Function Start */

function carforyou_fonts_url() {
		$fonts_url = '';
		$font_style = carforyou_get_option('font_style');	
		//Montserrat font family
		if($font_style=='Montserrat'):
			$Montserrat='';
			if ('off' !== $Montserrat):
				$font_families = array();
					if ('off' !== $Montserrat ) {
						$font_families[] = 'Montserrat:300,400,500,700,800';
					}
				$query_args = array(
					'family' => urlencode( implode( '|', $font_families ) ),
					);
				$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
			endif;
		//Lato font family
		elseif($font_style=='Roboto'):
		    $Roboto='';
			if ('off' !== $Roboto):
				$font_families = array();
					if ('off' !== $Roboto ) {
						$font_families[] = 'Roboto:300,400,500,700,900';
					}
				$query_args = array(
					'family' => urlencode( implode( '|', $font_families ) ),
					);
				$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
			endif;
		
		//OpenSans font family
		elseif($font_style=='OpenSans'):
		     $OpenSans='';
			if ('off' !== $OpenSans):
				$font_families = array();
					if ('off' !== $OpenSans ) {
						$font_families= 'Open+Sans:300,400,600,700,800';
					}
				$query_args = array(
					'family' => $font_families,
					);
				$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
			endif;
		//MartelSans font family	
		elseif($font_style=='MartelSans'):
		$MartelSans='';
			if ('off' !== $MartelSans):
				$font_families = array();
					if ('off' !== $MartelSans ) {
						$font_families= 'Martel+Sans:400,600,700,800';
					}
				$query_args = array(
					'family' => $font_families,
					);
				$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
			endif;
		//Roboto font family
		else:
			$Lato = esc_attr_x( 'on', 'Lato font: on or off', 'carforyou' );
			if ('off' !== $Lato):
				$font_families = array();
					if ('off' !== $Lato ) {
						$font_families[] = 'Lato:300,400,700,900';
					}
				$query_args = array(
					'family' => urlencode( implode( '|', $font_families ) ),
					);
				$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
			endif;
		endif;
		return esc_url_raw( $fonts_url );
	}
		/*Enqueue scripts and styles.*/

function carforyou_add_google_fonts() {
			wp_enqueue_style( 'carforyou-fonts', carforyou_fonts_url(), array(), '1.0.0' );
		}
add_action( 'wp_enqueue_scripts', 'carforyou_add_google_fonts' );

/* Javascript Google Fonts Url Function Start */

function carforyou_enqueue_comments_reply() {
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
        wp_enqueue_script( 'comment-reply' ); 
    }
}

// Hook into wp_enqueue_scripts
add_action('comment_form_before', 'carforyou_enqueue_comments_reply');
function carforyou_InnerHeader(){
if (function_exists('carforyou_header_image')):
	carforyou_header_image();
endif;
}
// Scripts  File
function carforyou_scripts_basic()
{
    wp_enqueue_script('jquery-plugin', CARFORYOU_JS_DIR_URI .'jquery.plugin.min.js');
    wp_enqueue_script('jquery-countdown', CARFORYOU_JS_DIR_URI .'jquery.countdown.min.js');
	 wp_enqueue_script('jquery-counter', CARFORYOU_JS_DIR_URI .'counter.js');
}
add_action( 'wp_enqueue_scripts', 'carforyou_scripts_basic' );

/**************************************Comment ***************************************************/
// Unset URL from comment form
function carforyou_move_comment_form_below( $fields ) { 
    $comment_field = $fields['comment']; 
    unset( $fields['comment'] ); 
    $fields['comment'] = $comment_field; 
    return $fields; 
}

add_filter( 'comment_form_fields', 'carforyou_move_comment_form_below' ); 
// Add placeholder for Name and Email

function modify_comment_form_fields($fields){
	global $fields, $commenter, $aria_req, $req;
    $fields['author'] = '<div class="comment-form-author form-group">' . '<input id="author" class="form-control" placeholder="Full Name" name="author" type="text" value="' .
				esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.
				esc_attr( $req ? '<span class="required">*</span>' : '' )  .
				'</div>';
    $fields['email'] = '<div class="comment-form-email form-group">' . '<input id="email" class="form-control" placeholder="Email Address" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="30"' . $aria_req . ' />'  .
				esc_attr($req ? '<span class="required">*</span>' : '') 
				 .
				'</div>';
    return $fields;
}
add_filter('comment_form_default_fields','modify_comment_form_fields');


add_action('wp_ajax_MYDELETEFUNCTION', 'MYDELETEFUNCTION');
add_action('wp_ajax_nopriv_MYDELETEFUNCTION', 'MYDELETEFUNCTION'); 
 function MYDELETEFUNCTION(){
		  
if(isset($_POST['cookid'])){
	$cookid = $_POST['cookid'];
	if(isset($_COOKIE[$cookid])){
		unset($_COOKIE[$cookid]);
	setcookie( $cookid, null, time() + (86400 * 30), "/" );
	}
	
	
	
	exit; 
		  
	}
 exit;
 } 
 add_action('wp_ajax_MyAjaxDelete', 'MyAjaxDelete');
add_action('wp_ajax_nopriv_MyAjaxDelete', 'MyAjaxDelete'); 
 function MyAjaxDelete(){   	
   if(check_ajax_referer('ajaxdelete', 'security'))
	{	 
	  if(isset($_POST['test'])){
		  setcookie( "first", null, time() + (86400 * 30), "/" );
		  setcookie( "second", null, time() + (86400 * 30), "/" );
		  setcookie( "third", null, time() + (86400 * 30), "/" );
	  
	  exit; 
	  }
   }	
exit; 
}

add_action('admin_head', 'carforyou_script_enqueuer');

function carforyou_script_enqueuer() {
    global $current_screen;
    if('page' != $current_screen->id) return;

    echo <<<HTML
        <script type="text/javascript">
        jQuery(document).ready( function($) {

            
            if($('#page_template').val() == 'single-type-term.php') {
                // show the meta box
                $('#show-car-type-on-page').show();
            } else {
                // hide your meta box
                $('#show-car-type-on-page').hide();
            }

            if (typeof console == "object") 
                console.log ('default value = ' + $('#page_template').val());

            $('#page_template').live('change', function(){
                    if($(this).val() == 'single-type-term.php') {
                  
                    $('#show-car-type-on-page').show();
                } else {
                  
                    $('#show-car-type-on-page').hide();
                }

               
                if (typeof console == "object") 
                    $(this).val();
            });                 
        });    
        </script>
HTML;
}
