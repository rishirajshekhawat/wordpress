<?php

/*

Theme Name:olomo

Theme URI:http://themes.webmasterdriver.net/olomo/

Author:Team of WebMasterDriver

Author URI: https://themeforest.net/user/webmasterdriver

Description: this theme create in 2018 this theme is new release in 2019

Version: 1.5

License:GNU General Public License v2 or later

/*-----------------------------------------------------------------------------------*/

/*  - Define Constants

/*-----------------------------------------------------------------------------------*/

define('OLOMO_THEME_PATH', get_template_directory());

define('OLOMO_CSS_DIR_UIR', get_stylesheet_directory_uri());

define('OLOMO_JS_DIR_UIR', get_template_directory_uri());

/* ============== Theme Setup ============ */

add_action('after_setup_theme', 'olomo_theme_setup');

function olomo_theme_setup() {

  /* Text Domain */

  load_theme_textdomain('olomo', get_template_directory() . '/languages');

  /* Theme supports */		
  
  add_theme_support('post-thumbnails');

  add_theme_support("title-tag");

  add_theme_support("custom-header");

  add_theme_support("custom-background") ;

  add_theme_support('automatic-feed-links');

  remove_post_type_support( 'page', 'thumbnail' );		

  /*

   * Switch default core markup for search form, comment form, and comments

   * to output valid HTML5.

   */

  add_theme_support(

	  'html5', array(

	  'search-form',

	  'comment-form',

	  'comment-list'

	  )

  ); 

  // We are using three menu locations.

  register_nav_menus( array(

	  'primary'         => esc_html__('Main Menu', 'olomo'),

  ) );

  

  /* Image sizes */

  add_image_size('olomo-blog-grid', 798, 528, true);		

  add_image_size('olomo-listing-gallery', 400, 528, true); 		

}

	

if ( ! isset( $content_width ) ) $content_width = 900;

require_once OLOMO_THEME_PATH . '/templates/blog-comments.php';	

require_once OLOMO_THEME_PATH . "/include/search-filter.php";

require_once OLOMO_THEME_PATH . "/include/reviews/ratings.php";

require_once OLOMO_THEME_PATH . "/include/reviews/last-review.php";

require_once OLOMO_THEME_PATH . "/include/time-status.php";

require_once OLOMO_THEME_PATH . "/include/favorite-function.php";

require_once OLOMO_THEME_PATH . "/include/reviews/reviews-form.php";

require_once OLOMO_THEME_PATH . "/include/reviews/all-reviews.php";

require_once OLOMO_THEME_PATH . "/include/reviews/approve-review.php";

require_once OLOMO_THEME_PATH . "/include/listingdata-db-save.php";

require_once OLOMO_THEME_PATH . "/include/home-map.php";

require_once OLOMO_THEME_PATH . "/functions/basic-fun.php";

require_once OLOMO_THEME_PATH . "/functions/listing-fun.php";

require_once OLOMO_THEME_PATH . "/functions/general-fun.php";

require_once OLOMO_THEME_PATH . "/include/icons.php";	

require_once OLOMO_THEME_PATH . "/include/classes/install-plugin.php";	

require_once OLOMO_THEME_PATH . "/include/options-config.php";	





/* ==============Header 1,2,3 Style   Load ============ */

add_action('header_js_css1', 'olomo_header_style1');

function olomo_header_style1() {

wp_enqueue_style('header-2', OLOMO_CSS_DIR_UIR . '/assets/css/header_style.css', array(), '', 'all' );

}





add_action('header_js_css2', 'olomo_header_style2');

function olomo_header_style2() {

wp_enqueue_style('header-2', OLOMO_CSS_DIR_UIR . '/assets/css/header_style2.css', array(), '', 'all' );



wp_enqueue_script('interface', OLOMO_JS_DIR_UIR . '/assets/js/interface.js', 'jquery', '', true);

}





add_action('header_js_css3', 'olomo_header_style3');

function olomo_header_style3() {

wp_enqueue_style('header-3', OLOMO_CSS_DIR_UIR . '/assets/css/header_style3.css', array(), '', 'all' );

}

/* ==============Header 1,2,3 Style   Load ============ */





/* ==============Footer 3,4 Style   Load ============ */

add_action('footer_css3', 'olomo_footer_style3');

function olomo_footer_style3() {

wp_enqueue_style('footer-3', OLOMO_CSS_DIR_UIR . '/assets/css/footer_style3.css', array(), '', 'all' );



}



add_action('footer_css4', 'olomo_footer_style4');

function olomo_footer_style4() {

wp_enqueue_style('footer-4', OLOMO_CSS_DIR_UIR . '/assets/css/footer_style4.css', array(), '', 'all' );

}

/* ==============Footer 3,4 Style   Load ============ */







	

/* ============== Style Load ============ */

add_action('wp_enqueue_scripts', 'olomo_style');

function olomo_style() {

wp_enqueue_style('bootstrap', OLOMO_CSS_DIR_UIR . '/assets/css/bootstrap.min.css', array(), '3.3.7', 'all' );

wp_enqueue_style('magnific-popup', OLOMO_CSS_DIR_UIR . '/assets/css/magnific-popup.css', array(), '1.7.5', 'all' );

wp_enqueue_style('font-awesome', OLOMO_CSS_DIR_UIR . '/assets/lib/font-awesome/css/font-awesome.min.css', array(), '4.7.0', 'all' );

wp_enqueue_style('mapbox', OLOMO_CSS_DIR_UIR . '/assets/css/mapbox.css', array(), '3.1.1', 'all' );

wp_enqueue_style('jquery-ui', OLOMO_CSS_DIR_UIR . '/assets/css/jquery-ui.css', array(), '1.11.4', 'all' );

wp_enqueue_style('olomo-main', OLOMO_CSS_DIR_UIR . '/assets/css/main.css', array(), '1.0.0', 'all' );

wp_enqueue_style('select2', OLOMO_CSS_DIR_UIR . '/assets/css/select2.css', array(), '1.7.5', 'all' );

wp_enqueue_style('prettyphoto', OLOMO_CSS_DIR_UIR . '/assets/css/prettyphoto.css', array(), '3.1.6', 'all' );

wp_enqueue_style('olomo-style', OLOMO_CSS_DIR_UIR . '/style.css', array(), '1.0.0', 'all' );

wp_enqueue_style('olomo-custome', OLOMO_CSS_DIR_UIR . '/assets/css/custome-style.css', array(), '1.0.0', 'all' );

wp_enqueue_style('owl-carousel', OLOMO_CSS_DIR_UIR . '/assets/css/owl.carousel.min.css', array(), '2.2.0', 'all' );

wp_enqueue_style('olomo-dashboard', OLOMO_CSS_DIR_UIR . '/assets/css/dashboard.css', array(), '1.0.0', 'all' );

}







	

/* ============== Script Load ============ */

add_action('wp_enqueue_scripts', 'olomo_scripts');

function olomo_scripts() {

global $olomo_options;

//JS File

wp_enqueue_script('owl-carousel', OLOMO_JS_DIR_UIR . '/assets/js/owl.carousel.min.js', 'jquery', '', true);

wp_enqueue_script('olomo-interface', OLOMO_JS_DIR_UIR. '/assets/js/olomo-interface.js', 'jquery', '', true);

if(class_exists('Redux')){

	wp_enqueue_script('olomo-custom', OLOMO_JS_DIR_UIR. '/assets/js/olomo-custom.js', 'jquery', '', true);

}

wp_enqueue_script('mapbox', OLOMO_JS_DIR_UIR . '/assets/js/mapbox.js', 'jquery', '', true);

//if(is_page('home-2') || is_singular('listing') ){

wp_enqueue_script('leaflet-markercluster', OLOMO_JS_DIR_UIR . '/assets/js/leaflet.markercluster.js', 'jquery', '', true);

//}

wp_enqueue_script('bootstrap', OLOMO_JS_DIR_UIR . '/assets/js/bootstrap.min.js', 'jquery', '', true);	

wp_enqueue_script('olomo-plugin',OLOMO_JS_DIR_UIR . '/assets/js/olomo-plugin.js', 'jquery', '', true);

wp_enqueue_script('olomo-plugin',OLOMO_JS_DIR_UIR . '/assets/js/olomo-custom.js', 'jquery', '', true);

wp_enqueue_script('olomo-plugin',OLOMO_JS_DIR_UIR . '/assets/js/review-submit.js', 'jquery', '', true);

wp_enqueue_script('magnific-popup', OLOMO_JS_DIR_UIR . '/assets/js/jquery.magnific-popup.min.js', 'jquery', '', true);

wp_enqueue_script('select2-full', OLOMO_JS_DIR_UIR . '/assets/js/select2.full.min.js', 'jquery', '', true);

wp_enqueue_script('bootstrap-rating', OLOMO_JS_DIR_UIR . '/assets/js/bootstrap-rating.js', 'jquery', '', true);

if(class_exists('Redux')){

	$mapAPI = '';

	$mapAPI = $olomo_options['google_map_api'];

 if( $olomo_options['submit-listing'] == get_permalink() || $olomo_options['edit-listing'] == get_permalink() || is_page('Submit Your Listing') || is_page('Edit Your Listing') || is_page(992) || is_front_page() || is_page_template( 'search-filter-result.php' )){

	wp_enqueue_script('maps', 'https://maps.googleapis.com/maps/api/js?key='.$mapAPI.'&amp;libraries=places', 'jquery', '', true);			

 }else{

		wp_enqueue_script('maps', 'https://maps.googleapis.com/maps/api/js?v=3&amp;key='.$mapAPI.'', 'jquery', '', false);

	}

}

/* IF ie9 */

//	wp_enqueue_script('html5', 'https://html5shim.googlecode.com/svn/trunk/html5.js', array(), '1.0.0', true);

wp_enqueue_script('html5', OLOMO_JS_DIR_UIR. '/assets/js/html5shiv.js', array(), '1.0.0', true);

wp_script_add_data('html5', 'conditional', 'lt IE 9');

wp_enqueue_script('jquery-prettyPhoto', OLOMO_JS_DIR_UIR. '/assets/js/jquery.prettyPhoto.js', 'jquery', '', true);

wp_enqueue_script('jquery-nicescroll', OLOMO_JS_DIR_UIR. '/assets/js/jquery.nicescroll.min.js', 'jquery', '', true);

wp_enqueue_script('chosen-jquery', OLOMO_JS_DIR_UIR . '/assets/js/chosen.jquery.min.js', 'jquery', '', true);

if(is_singular('listing')){

	wp_enqueue_script('olomo-singlemap', OLOMO_JS_DIR_UIR. '/assets/js/singlepostmap.js', 'jquery', '', true);

}

if ( is_single() && comments_open() ) wp_enqueue_script( 'comment-reply' );

wp_enqueue_script('imageuploader', OLOMO_JS_DIR_UIR . '/assets/js/custom.js', 'jquery', '', true);
	
wp_enqueue_script('latitude-longitude', OLOMO_JS_DIR_UIR . '/assets/js/lat-long.js', 'jquery', '', true);

}



/* ============== Load media ============ */

if (!function_exists( 'olomo_load_media')){

	function olomo_load_media() {

	  wp_enqueue_media();

	}

}	

add_action('admin_enqueue_scripts', 'olomo_load_media');

if ( ! function_exists('olomo_admin_css')){

	function olomo_admin_css() {

	  wp_enqueue_style('olomo-admin-style', OLOMO_CSS_DIR_UIR . '/assets/css/admin-style.css');

	}

}	

add_action('admin_enqueue_scripts', 'olomo_admin_css');

			

/* ============== User avatar URL ============ */

if (!function_exists('olomo_get_avatar_url')) {

	function olomo_get_avatar_url($author_id, $size){

		$get_avatar = get_avatar( $author_id, $size );

		preg_match("/src='(.*?)'/i", $get_avatar, $matches);

		return ( $matches[1] );

	}

}

	

/* ============== Author image ============ */

if (!function_exists('olomo_author_image')) {

	function olomo_author_image() {

		if(is_user_logged_in()){

			$current_user = wp_get_current_user();	

			$author_avatar_url = get_user_meta($current_user->ID, "olomo_author_img_url", true); 

			if(!empty($author_avatar_url)) {

				$avatar =  $author_avatar_url;

			} else { 			

				$avatar_url = olomo_get_avatar_url ( $current_user->ID, $size = '94' );

				$avatar =  $avatar_url;

			}

		}				 

		return $avatar;	

	}

}

	

/* ============== Single Author image ============ */

if (!function_exists('olomo_single_author_image')) {

	function olomo_single_author_image() {

		if(is_single()){

			$author_avatar_url = get_user_meta(get_the_author_meta('ID'), "olomo_author_img_url", true); 

			if(!empty($author_avatar_url)) {

				$avatar =  $author_avatar_url;

			} else { 			

				$avatar_url = olomo_get_avatar_url (get_the_author_meta('ID'), $size = '94');

				$avatar =  $avatar_url;

			}

		}

		return $avatar;

	}

}





function getPostViews($postID){

    $count_key = 'post_view_count';

    $count = get_post_meta($postID, $count_key, true);

    if($count==''){

        delete_post_meta($postID, $count_key);

        add_post_meta($postID, $count_key, '0');

        return "0 View";

    }

    return $count.' Views';

}







function getAllPostViews(){

		$result = 0;

		$visitor_count_array = array();

		$current_user = wp_get_current_user();

		$user_id = $current_user->ID;

		$postid = array();

		$args = array(

			'post_type' => 'listing',

			'author' => $user_id,

			'post_status' => 'publish',

			'posts_per_page' => -1

		);

		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) {

			while ( $the_query->have_posts() ) {

				$the_query->the_post();

				$key = 'post_view_count'; 

				$visitor_count_array[] = get_post_meta(get_the_ID(), 'post_view_count' ,true);

				

				if( !empty($visitor_count_array) ){

					

					$result = array_sum($visitor_count_array);					

				}

			}

			wp_reset_postdata();

		}

		return $result;

}



function user_ip() {

 foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {

     if (array_key_exists($key, $_SERVER) === true) {

         foreach (explode(',', $_SERVER[$key]) as $ip) {

            if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {

            return $ip;

          }

        }

     }

  }

}

 



function setPostViews($postID) {	



    //$user_ip = esc_html($_SERVER['REMOTE_ADDR']);

    $user_ip = user_ip();

    $key = $user_ip . 'x' . $postID;

    $value = array($user_ip, $postID);

    $visited = get_transient($key); 

   

    if ( false === ( $visited ) ) {

        set_transient( $key, $value, 60*60*12 );

        $count_key = 'post_view_count';

        $count = get_post_meta($postID, $count_key, true);

        if($count==''){

            $count = 0;

            delete_post_meta($postID, $count_key);

            add_post_meta($postID, $count_key, '1');

        }else{

            $count++;

            update_post_meta($postID, $count_key, $count);

        }





    }

}







		



/* ============== Subscriber can upload media ============ */

if (!function_exists('olomo_subscriber_capabilities')) {

if ( current_user_can('subscriber')) {



  add_action('init', 'olomo_subscriber_capabilities');



}

		

function olomo_subscriber_capabilities() {

	

	$contributor = get_role('subscriber');

	$contributor->add_cap('upload_files');

	$contributor->add_cap('edit_posts');

	$contributor->add_cap('assign_location');

	$contributor->add_cap('assign_list-tags');

	$contributor->add_cap('assign_listing-category');

	$contributor->add_cap('assign_features');

}

}

	

if ( ! function_exists( 'olomo_admin_capabilities' ) ) {

  add_action('init', 'olomo_admin_capabilities');

  function olomo_admin_capabilities() {

	  $contributor = get_role('administrator');

	  $contributor->add_cap('assign_location');

	  $contributor->add_cap('assign_list-tags');

	  $contributor->add_cap('assign_listing-category');

	  $contributor->add_cap('assign_features');

  }

}

	

	

if( !function_exists('olomo_vcSetAsTheme') ) {

	add_action('vc_before_init', 'olomo_vcSetAsTheme');

	function olomo_vcSetAsTheme(){

		vc_set_as_theme($disable_updater = false);

	}

}

	

/* ============== Block admin acccess ============ */

if (!function_exists('olomo_block_admin_access')) {

	add_action('init', 'olomo_block_admin_access');

	function olomo_block_admin_access(){

		if( is_user_logged_in() ) {

			if (is_admin() && !current_user_can('administrator') && isset( $_GET['action'] ) != 'delete' && !(defined('DOING_AJAX') && DOING_AJAX)) {

				wp_die(esc_html__("You don't have permission to access this page.", "olomo"));

				exit;

			}

		}

	}

}

	

/* ============== Media Uploader ============ */

if (!function_exists('olomo_add_media_upload_scripts')) {

	function olomo_add_media_upload_scripts(){

		if ( is_admin() ) {

			 return;

		   }

		wp_enqueue_media();

	}

}

add_action('admin_enqueue_scripts', 'olomo_load_media');



/* ============== Search Form ============ */

if (!function_exists('olomo_search_form')) {

	function olomo_search_form() {

		$form = '<form role="search" method="get" action="' . esc_url(home_url('/')) . '" >

			<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__('Search...', 'olomo') . '"><div class="search_btn"><button><i class="fa fa-search"></i></button></div>

		</form>';

		return $form;

	}

}

add_filter('get_search_form', 'olomo_search_form');

	

	/* ============== Favicon ============ */

if ( ! function_exists('olomo_favicon')){

	function olomo_favicon() {

				global $olomo_options;

			   if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {

				   if($olomo_options['theme_favicon'] != ''){

						echo '<link rel="shortcut icon" href="' . wp_kses_post($olomo_options['theme_favicon']['url']) . '"/>';

					} else {

						echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/assets/images/favicon.png"/>';

					}

				}

			}

}



/* ============== Main menu ============ */

if (!function_exists('olomo_main_menu')) {

	function olomo_main_menu() {

		if(has_nav_menu('primary')):

wp_nav_menu(array('theme_location' => 'primary', 'container_class' => 'main-menu-container', 'items_wrap' => '<ul class="nav navbar-nav">%3$s</ul>', 'after' => '<span class="arrow" ></span>'));	

		endif;

	}

}

		

/* ============== Footer menu ============ */

if (!function_exists('olomo_footer_menu')) {

		function olomo_footer_menu() {

		global $olomo_options;

		

		if(!empty($olomo_options['footer_menu'])):?>

		  <div class="footer_widgets">

     <?php  $enable_newsletter= $olomo_options['enable_f_linktitle'];

		    if($enable_newsletter=='1'): ?>

          <h5><?php echo esc_html($olomo_options['f_linktitle']); ?></h5>

          <?Php  endif;  ?>

			 <div class="footer_nav">

				<?php  wp_nav_menu(array('menu' =>$olomo_options['footer_menu'], 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>')); ?>

			</div>

		</div>

		<?php  endif;

		}

}

/* ============== Default sidebar ============ */

if (!function_exists('olomo_sidebar')) {

	function olomo_sidebar() {

		register_sidebar(array(

			'name' => esc_html__('Default sidebar', 'olomo'),

			'id' => 'default-sidebar',

			'before_widget' => '<div class="sidebar_widgets" id="%1$s">',

			'after_widget' => '</div>',

			'before_title' => '<div class="widget_title"><h4 class="widget-title">',

			'after_title' => '</h4></div>',

		));

	}

}

add_action('widgets_init', 'olomo_sidebar');



/* ============== Logo ============ */

if (!function_exists('olomo_logo')) {

	function olomo_logo() {

		global $olomo_options;

		$logo = $olomo_options['primary_logo']['url'];

		if(!empty($logo)){

			echo '<img src="'.esc_url($logo).'" />';

		}

		else{

			echo '<span class="logo_text">'.get_bloginfo('name', 'display').'</span>';	

		}

	}

}

	

/* ============== URL Settings ============ */

if (!function_exists('olomo_url')) {

	function olomo_url($link) {

		global $olomo_options;

		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		/*if ( is_plugin_active( 'olomo-plugin/plugin.php' ) ) {*/

			if(function_exists('olomo_plugin_functions')){

			if($link == 'add_listing_url_mode'){

				$paidmode = $olomo_options['enable_paid_submission'];

				if( $paidmode=="per_listing" || $paidmode=="membership" ){

					$url = $olomo_options['pricing-plan'];

				}else{

					$url = $olomo_options['submit-listing'];

				}

			}else{

				$url = $olomo_options[$link];

			}

			return $url;

		}else{

			return false;

		}

	}

}



/* ============== Translation ============ */

if (!function_exists('olomo_translation')) {

	function olomo_translation($word) {

			return $word;

	}

}	



/* ============== Icon8 base64 Icons ============ */

if (!function_exists('olomo_icons')) {

	function olomo_icons($icons) {

		$colors = new olomoIcons();

		$icon = '';

		if($icons != ''){

			$iconsrc = $colors->olomo_icon($icons);	

			$icon = '<img class="icon icons8-'.esc_attr($icons).'" src="'.esc_url($iconsrc).'">';

			return $icon;

		}else{

			return $icon;

		}

	}

}

	

/* ============== Search Filter ============ */

if (!function_exists('olomo_searchFilter')) {

	function olomo_searchFilter() {

		global $wp_post_types;

		$wp_post_types['page']->exclude_from_search = true;

	}

	add_action('init', 'olomo_searchFilter');

}

		

/* ============== Price Dynesty ============ */

if (!function_exists('olomo_price_dynesty')) {

	function olomo_price_dynesty($postid) {

		if(!empty($postid)){

			 $listingpTo = listing_get_metabox('list_price_to');

			 $listingprice = listing_get_metabox_by_ID('list_price', $postid);

			if(!empty($listingprice )){ ?>

						<p class="listing_price">

							<?php 

							global $olomo_options;

							$priceSymbol = $olomo_options['listing_pricerange_symbol'];

							echo '<span>';

									echo esc_html($priceSymbol);

							echo '</span>';

							if(!empty($listingprice)){

								echo esc_html($listingprice);

								if(!empty($listingpTo)){

									echo ' - ';

									echo '<span>';

									echo esc_html($priceSymbol);

									echo '</span>';

									echo esc_html($listingpTo);

								}

							}

							?>

						 </p>		

				<?php

			}

		}

	}		

}



/* ============== Email and mailer filter ============ */

add_filter('wp_mail_from', 'olomo_mail_from');

add_filter('wp_mail_from_name', 'olomo_mail_from_name');



if( !function_exists('olomo_mail_from') ){ 

	function olomo_mail_from($old) {

		$mailFrom = null;

		if(class_exists('Redux')){

			global $olomo_options;

			$mailFrom = $olomo_options['olomo_general_email_address'];

		}

		else{

			$mailFrom = get_option('admin_email');

		}

		return $mailFrom;

	}

}

	

if( !function_exists('olomo_mail_from_name') ){

	function olomo_mail_from_name($old) {

		$mailFromName = null;

		if( class_exists( 'Redux' ) ) {

			global $olomo_options;

			$mailFromName = $olomo_options['olomo_general_email_from'];

		}

		else{

			$mailFromName = get_option( 'blogname' );

		}

		return $mailFromName;

	}

}

	

/* ============== Email html support ============ */

if( !function_exists('olomo_set_content_type') ){

	add_filter('wp_mail_content_type', 'olomo_set_content_type');

	function olomo_set_content_type($content_type) {

		return 'text/html';

	}

}



/* ============== Term Exist ============ */	

if(!function_exists('olomo_term_exist')){

	function olomo_term_exist($name,$taxonomy){

		$term = term_exists($name, $taxonomy);

		if (!empty($term)) {

		 return $term;

		}else{

			return 0;

		}

	}

}

	

// function to get all post meta value by keys

if(!function_exists('getMetaValuesByKey')){

	function getMetaValuesByKey($key){

		global $wpdb;

		$metaVal = $wpdb->get_col("SELECT meta_value

		FROM $wpdb->postmeta WHERE meta_key = '$key'" );

		return $metaVal;

	}

}



//function to get all reviews in array on author's posts

if(!function_exists('getAllReviewsArray')){

	function getAllReviewsArray(){

		$review_ids = '';

		$result = array();

		$review_new = array();

		$review_idss = '';

		$current_user = wp_get_current_user();

		$user_id = $current_user->ID;

		$postid = array();

		$args = array(

			'post_type' => 'listing',

			'author' => $user_id,

			'post_status' => 'publish',

			'posts_per_page' => -1

		);

		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) {

			while ( $the_query->have_posts() ) {

				$the_query->the_post();

				$key = 'reviews_ids';

				$review_idss = listing_get_metabox_by_ID($key ,get_the_ID());

				if( !empty($review_idss) ){

					if (strpos($review_idss, ",") !== false) {

						$review_ids = explode( ',', $review_idss );		

						$result = array_merge($result, $review_ids);

					}

					else{

						$result[] = $review_idss;

					}					

				}

			}

			wp_reset_postdata();

		}

		return $result;

	}

}



/*====================================================================================*/

// Delete post action

if(!function_exists('delete_any_post')){

add_action( 'before_delete_post', 'delete_any_post' );

	function delete_any_post( $postid ){

		global $post_type;

		if($post_type == 'listing'){

			$listing_id = $postid;

			$campaignID = listing_get_metabox_by_ID('campaign_id', $listing_id);

			$get_reviews = listing_get_metabox_by_ID('reviews_ids', $listing_id);

			wp_delete_post($campaignID);

			if(!empty($get_reviews)){

				$reviewsArray = array();

				if (strpos($get_reviews, ',') !== false) {

					$reviewsArray = explode(",",$get_reviews);

				}

				else{

					$reviewsArray[] = $get_reviews;

				}

				$args = array(

					'posts_per_page'      => -1,

					'post__in'            => $reviewsArray,

					'post_type' => 'reviews',

				);

				$query = new WP_Query( $args );

				if ($query->have_posts()){

					while ( $query->have_posts() ) {

						$query->the_post();

						wp_delete_post(get_the_ID());

					}

				    wp_reset_postdata();

				}

			}

		}

		else if($post_type == 'reviews'){

			$review_id = $postid;

			$action = 'delete';

			$listing_id = listing_get_metabox_by_ID('listing_id', $postid);

			olomo_set_listing_ratings($review_id, $listing_id, '', $action);

		}		

	}

}



//=======================================================

//						Pagination

//=======================================================

if(!function_exists('olomo_pagination')){

	function olomo_pagination() {

		global $wp_query;

		$pages = $wp_query->max_num_pages;

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		if (empty($pages)) {

			$pages = 1;

		}

		if (1 != $pages) {

			$big = 9999; // need an unlikely integer

			echo "

			<div class='pagination_nav'>";

				$pagination = paginate_links(

				array(

					'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),

					'end_size' => 3,

					'mid_size' => 6,

					'format' => '?paged=%#%',

					'current' => max(1, get_query_var('paged')),

					'total' => $wp_query->max_num_pages,

					'type' => 'list',

					'prev_text' => __('&laquo;', 'olomo'),

					'next_text' => __('&raquo;', 'olomo'),

				));

				print $pagination;

			echo "</div>";

		}

	}

}

	

function getClosestTimezone($lat, $lng)

{

	$diffs = array();

	foreach(DateTimeZone::listIdentifiers() as $timezoneID) {

	  $timezone = new DateTimeZone($timezoneID);

	  $location = $timezone->getLocation();

	  $tLat = $location['latitude'];

	  $tLng = $location['longitude'];

	  $diffLat = abs($lat - $tLat);

	  $diffLng = abs($lng - $tLng);

	  $diff = $diffLat + $diffLng;

	  $diffs[$timezoneID] = $diff;

	}

	

	$timezone = array_keys($diffs, min($diffs));

	$timestamp = time();

	date_default_timezone_set($timezone[0]);

	$zones_GMT = date('P', $timestamp);

	return $zones_GMT;

  }



// Excerpt

function olomo_excerpt( $len=15, $trim = "&hellip;" ) {

$limit = $len+1;

$excerpt = explode( ' ', get_the_excerpt(), $limit );

$num_words = count( $excerpt );

if ( $num_words >= $len ) {

	$last_item = array_pop( $excerpt );

} else {

	$trim="";

}

$excerpt = implode( " ", $excerpt ) . $trim ;

return $excerpt;

}



if ( ! function_exists( 'olomo_post_nav' ) ) :

function olomo_post_nav() {

	global $post;

	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );

	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )

	return;

	?>

   <div class="wp_nav_links">

    <?php previous_post_link( '%link', esc_attr_x( 'Previous', 'Previous post link', 'olomo' ) ); ?>

    <?php next_post_link( '%link', esc_attr_x( 'Next', 'Next post link', 'olomo' ) ); ?>

  </div>

<?php

}

endif;

 

// Listing Likes

if ( class_exists('WPBakeryVisualComposerAbstract') ) {

	if(!function_exists( 'olomo_listinglikes' ) ) :

	function olomo_listinglikes(){?>

	   <?php echo get_simple_likes_button(get_the_ID());?>

	<?php }

	endif;

}



/*Editor styles*/

add_action( 'dolomo_init', 'olomo_add_editor_styles' );

/**

 * Apply theme's stylesheet to the visual editor.

 * @uses add_editor_style() Links a stylesheet to visual editor

 * @uses get_stylesheet_uri() Returns URI of theme stylesheet */

function olomo_add_editor_styles() {

    add_olomo_style( get_stylesheet_uri() );

}



/* Google Fonts Url */

function olomo_fonts_url() {

	$fonts_url = '';

		$OpenSans = esc_attr_x( 'on', 'OpenSans font: on or off', 'olomo' );

		if ('off' !== $OpenSans):

			$font_families = array();

				if ('off' !== $OpenSans ) {

					$font_families= 'Open+Sans:300,400,600,700';

				}

			$query_args = array(

				'family' => $font_families,

				);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	endif;

	return esc_url_raw( $fonts_url );

}

		

/*Enqueue scripts and styles.*/

function olomo_add_google_fonts() {

			wp_enqueue_style( 'olomo-fonts', olomo_fonts_url(), array(), '1.0.0' );

		}

add_action( 'wp_enqueue_scripts', 'olomo_add_google_fonts' );

/* Google Fonts Url */

/* Get Active single list total view */

function getSinglePostViews($postID){

    $count_key = 'post_view_count';

    $count = get_post_meta($postID, $count_key, true);

    if($count==''){

        delete_post_meta($postID, $count_key);

        add_post_meta($postID, $count_key, '0');

        return "0";

    }

    return $count;

}

 



function setSinglePostViews($postID) {	



    //$user_ip = esc_html($_SERVER['REMOTE_ADDR']);

    $user_ip = user_ip();

    $key = $user_ip . 'x' . $postID;

    $value = array($user_ip, $postID);

    $visited = get_transient($key); 

   

    if ( false === ( $visited ) ) {

        set_transient( $key, $value, 60*60*12 );

        $count_key = 'post_view_count';

        $count = get_post_meta($postID, $count_key, true);

        if($count==''){

            $count = 0;

            delete_post_meta($postID, $count_key);

            add_post_meta($postID, $count_key, '1');

        }else{

            $count++;

            update_post_meta($postID, $count_key, $count);

        }





    }

}

// numbered pagination
function pagination($pages = '', $range = 4)
{  
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}

// Filter to fix the Post Author Dropdown
add_filter('wp_dropdown_users', 'theme_post_author_override');
function theme_post_author_override($output)
{
    global $post, $user_ID;
     
  // return if this isn't the theme author override dropdown
  if (!preg_match('/post_author_override/', $output)) return $output;
 
  // return if we've already replaced the list (end recursion)
  if (preg_match ('/post_author_override_replaced/', $output)) return $output;
 
  // replacement call to wp_dropdown_users
    $output = wp_dropdown_users(array(
      'echo' => 0,
        'name' => 'post_author_override_replaced',
        'selected' => empty($post->ID) ? $user_ID : $post->post_author,
        'include_selected' => true
    ));
 
    // put the original name back
    $output = preg_replace('/post_author_override_replaced/', 'post_author_override', $output);
 
  return $output;
}

// Rename Listing Services 
function my_text_strings( $translated_text, $text, $domain ) {
switch ( $translated_text ) {
    case 'WP PayPal' :
        $translated_text = __( 'Listing Services', 'wp-paypal' );
        break;
}
return $translated_text;
}
add_filter( 'gettext', 'my_text_strings', 20, 3 );

// Disable update notification for wp-paypal
function filter_plugin_updates( $value ) {
    unset( $value->response['wp-paypal/main.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );