<?php
//Send OTP on forgot password

add_action('wp_ajax_sendotpforgot', 'sendotpforgot');
add_action('wp_ajax_nopriv_sendotpforgot', 'sendotpforgot');
function sendotpforgot()
{	
	$username = $_POST['username'];
	$user = get_user_by( 'login', $username );
	//print_r($user);
	if(empty($user)){
	    $user = get_user_by( 'email', $username );
	    $user_id =  $user->ID;
	    $phone_code = get_user_meta($user_id, 'billing_phone_code', true);
	    $phone_number = get_user_meta($user_id, 'billing_phone', true);
	    $phone= $phone_code.$phone_number;
	}else{
	    $user_id =  $user->ID;
	    $phone_code = get_user_meta($user_id, 'billing_phone_code', true);
	    $phone_number = get_user_meta($user_id, 'billing_phone', true);
	    $phone= $phone_code.$phone_number;
	}
	
	$otp = rand(100000,999999);
	$args = array( 
    			'number_to' => $phone,
    			'message' => '[HoPscan]-To complete your forgot password process please use this OTP '.$otp.' Thank You.' 
     		); 
    $sms = twl_send_sms($args);

    if(is_wp_error($sms)){
		$note = 'OTP failed due to following error :'.$sms->get_error_message();
		$order->add_order_note( $note );
		echo $otp;
	    //$_SESSION['otp_forgot'] = $otp;
		//echo $_SESSION['otp_forgot'];
	}else{
		//$_SESSION['otp_forgot'] = $otp;
		echo $otp;
	}
	exit;
}

// Send OTP on register
add_action('wp_ajax_sendotpregister', 'sendotpregister');
add_action('wp_ajax_nopriv_sendotpregister', 'sendotpregister');
function sendotpregister()
{	
	$phone_code = $_POST['phone_code'];
	$phone_number = $_POST['phone_number'];
	$user_phone = $phone_code.$phone_number;
	$otp = rand(100000,999999);
	$args = array( 
    			'number_to' => $user_phone,
    			'message' => '[HoPscan]-To complete your registration process please use this OTP '.$otp.' Thank You.' 
     		); 
    $sms = twl_send_sms($args);
    
    if(is_wp_error($sms)){
		$note = 'OTP failed due to following error :'.$sms->get_error_message();
		$order->add_order_note( $note );
	    $_SESSION['otp'] = $otp;
		//echo $_SESSION['otp'];
	    echo $otp;
	}else{
		//$_SESSION['otp'] = $otp;
	    echo $otp;
	}
	exit;
}
add_action('wp_ajax_updatestatefield', 'updatestatefield');
add_action('wp_ajax_nopriv_updatestatefield', 'updatestatefield');
function updatestatefield()
{	
	
	
	$selected_country = $_POST['country'];
	$url = get_stylesheet_directory_uri().'/state.json';
  	$str = file_get_contents($url);
  	$country_array = json_decode($str, true);
  	$country_code = array_column($country_array, 'code');
  //	if(array_key_exists($selected_country, $country_code)){
	$key = array_search($selected_country, array_column($country_array, 'code'));
	$country_satate = $country_array[$key]['states'];
  //	}
	

	wp_send_json($country_satate);

	exit;
}

add_action('wp_ajax_upDateMobileCountryCode', 'upDateMobileCountryCode');
add_action('wp_ajax_nopriv_upDateMobileCountryCode', 'upDateMobileCountryCode');
function upDateMobileCountryCode()
{	
	
	
	$selected_country = $_POST['country'];
	$url = get_stylesheet_directory_uri().'/country.json';
  	$str = file_get_contents($url);
  	$country_array = json_decode($str, true);
	$key = array_search($selected_country, array_column($country_array, 'code'));
	$country_telcode = $country_array[$key]['telcode'];
	
	echo json_encode(array('status'=>1, 'countrycode'=>$country_telcode));
	exit;
}

add_action('wp_ajax_send_otp_tophone', 'send_otp_tophone');
add_action('wp_ajax_nopriv_send_otp_tophone', 'send_otp_tophone');
function send_otp_tophone()
{	
	
	$phone = $_POST['phone_num'];
	$type = 'customer';
	if(empty($phone)){
		$phone = $_POST['venodrphone_num'];
		$type = 'vendor';
		}
	$otp = rand(100000,999999);
	$args = array(
    'number_to' => $phone,
    'message' => 'HoPsCan : Your Otp for Registration verification is '.$otp,
     );
    $sms = twl_send_sms($args);
	if(is_wp_error($sms)){
		$status = 0;
		$scmsg = 'Failed';	
	}else{
		
		setcookie('sended_otp', $otp, time()+600, '/', $_SERVER['HTTP_HOST']);
		$status = 1;
		$scmsg = 'Success';	
	}
	echo json_encode(array('status'=>$status, 'msg'=>$scmsg, 'otp'=>$otp, 'type'=>$type));
	exit;
}

add_action('wp_ajax_verify_otp', 'verify_otp');
add_action('wp_ajax_nopriv_verify_otp', 'verify_otp');
function verify_otp()
{	
	$otp_sended = $_COOKIE['sended_otp'];
	$otp = $_POST['otp_customer'];
	if(empty($otp)){
			$otp = $_POST['otp_vendor'];	
		}
	if($otp_sended == $otp){
		$status = 1;
		$scmsg = 'Verified';	
	}else{
		$status = 0;
		$scmsg = 'Failed';		
	}
	echo json_encode(array('status'=>$status, 'msg'=>$scmsg,));
	exit;
}
