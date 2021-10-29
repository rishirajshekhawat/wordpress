<?php
session_start();
/**
 * Form posting handler
 */
require_once site_url() . '/wp-load.php';
/**
* Add transaction info to database 
*/
global $wpdb;
global $method, $post_id, $wpdb, $olomo_options;
$dbprefix = $wpdb->prefix; 
	$post_id = ''; 
	$method = ''; 
	$user_id = '';
	$payment_desc = '';
	$plan_price = '';
	$plan_time = '';
	$date = '';
	$amount = '';
	$currency_code = '';
	$payment_success = '';
	$payment_fail = '';

	 if(!empty($_POST['post_id']) && isset($_POST['post_id']) && !empty($_POST['method']) && isset($_POST['method'])){ 
			$method = $_POST['method'];
			$post_id = $_POST['post_id'];
			//updating payment method
			$update_data = array('payment_method' => $method);
			$where = array('post_id' => $post_id);
			$update_format = array('%s', '%s');
			$wpdb->update($dbprefix.'listing_orders', $update_data, $where, $update_format);
			$plan_id = listing_get_metabox_by_ID('Plan_id' , $post_id);
			$user_id = get_current_user_id();
			$payment_desc = esc_html__('Enjoy using our features of Listings subscription in very cheap price', 'olomo');
			$plan_price = get_post_meta($plan_id, 'plan_price', true);
			$plan_time = listing_get_metabox_by_ID('plan_time' , $plan_id);
			$date = date('d/m/Y H:i:s');
			$payment_fail = $olomo_options['payment_fail']; 
			$payment_success = $olomo_options['payment_success'];
			$currency_code = $olomo_options['currency_paid_submission'];

			$planID = $plan_id;
			$amount = $plan_price;
			$plan_name = $plan_time;
			$currency = $currency_code;
			$token = '';
			if( !empty($method) && $method=="wire" ){
				//updating payment method

				$update_data = array('status' => 'pending');
				$where = array('post_id' => $post_id);
				$update_format = array('%s', '%s');
				$wpdb->update($dbprefix.'listing_orders', $update_data, $where, $update_format);
				
				$_SESSION['post_id'] = $post_id;
				$_SESSION['plan_id'] = $planID;
				$_SESSION['amount'] = $amount;
				$_SESSION['currency'] = $currency;

				$checkout = $olomo_options['payment-checkout'];
				$checkout_url = get_permalink( $checkout );
				$perma = '';
				$methodQuery = 'method=wire';
				global $wp_rewrite;
				if ($wp_rewrite->permalink_structure == ''){
					$perma = "&";

				}else{
					$perma = "?";
				}

				$redirect = '';
				$redirect = $checkout_url.$perma.$methodQuery;
				wp_redirect($redirect);
				exit();
			}
			else if(!empty($method) && $method=="stripe"){
				$update_data = array('status' => 'in progress');
				$where = array('post_id' => $post_id);
				$update_format = array('%s', '%s');
				$wpdb->update($dbprefix.'listing_orders', $update_data, $where, $update_format);
				$current_user_obj = wp_get_current_user();
				$current_user_mail = $current_user_obj->user_email;
				$_SESSION['post_id'] = $post_id;
				$_SESSION['currency'] = $currency;
				$_SESSION['price'] = $amount;
				$_SESSION['mail'] = $current_user_mail;
				$redirect = '';
				$redirect = get_template_directory_uri().'/include/stripe/index.php';
				wp_redirect($redirect);
				exit();
			}
	 }
/**
* End function
*/
	require get_template_directory().'/include/paypal/paypalapi.php';

	if ( isset($_GET['func']) && $_GET['func'] == 'confirm' && isset($_GET['token']) && isset($_GET['PayerID']) ) {
	  $var = new wp_PayPalAPI();
	  $var->ConfirmExpressCheckout();

	  if ( isset( $_SESSION['RETURN_URL'] ) ) {
		$url = $_SESSION['RETURN_URL'];
		unset($_SESSION['RETURN_URL']);
		header('Location: '.$url);
		exit;
	  }
	  
	  if ( is_numeric(get_option('paypal_success_page')) && get_option('paypal_success_page') > 0 )
		header('Location: '.get_permalink(get_option('paypal_success_page')));
	  else
		header('Location: '.home_url());
	  exit;
	}

	if ( ! count($_POST) )
	  trigger_error('Payment error code: #00001', E_USER_ERROR);
	$allowed_func = array('start');
	if ( count($_POST) && (! isset($_POST['func']) || ! in_array($_POST['func'], $allowed_func)) )
	  trigger_error('Payment error code: #00002', E_USER_ERROR);
	  
	if ( count($_POST) && (! isset($plan_price) || ! is_numeric($plan_price) || $plan_price < 0) )
	  trigger_error('Payment error code: #00003', E_USER_ERROR);

	switch ( $_POST['func'] ) {

	  case 'start':

		$var = new wp_PayPalAPI();
		$var->StartExpressCheckout();
		break;
	}