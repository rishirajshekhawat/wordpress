<?php

if(!function_exists('listing_draft_save')){

	function listing_draft_save($postid, $userID = null){		

		global $olomo_options;

		global $wpdb;

		$dbprefix = '';

		$dbprefix = $wpdb->prefix;

		$user_ID = '';

		$plan_ID = '';

		$plan_title = '';

		$postmeta = get_post_meta($postid, 'olomo_options', true);

		$plan_ID = $postmeta['Plan_id'];

		$plan_title = get_the_title( $plan_ID );

		$plan_price = '';

		$plan_price = get_post_meta($plan_ID, 'plan_price', true);

		$plan_time = '';

		$plan_time = get_post_meta($plan_ID, 'plan_time', true);

		$plan_type = '';

		$plan_type = get_post_meta($plan_ID, 'plan_package_type', true);

		$currency_code = '';

		$currency_code = $olomo_options['currency_paid_submission'];



		$fname = '';

		$lname = '';

		$usermail = '';



		if(empty($userID)){

			$user_ID = get_current_user_id();

			$user_info = get_userdata($user_ID);

			$usermail = $user_info->user_email;

			$fname = $user_info->first_name;

			$lname = $user_info->last_name;

		}

		else{

			$user_ID = $userID;

			$user_info = get_userdata($userID);

			$usermail = $user_info->user_email;

			$fname = $user_info->first_name;

			$lname = $user_info->last_name;

		}



		if(empty($usermail)){

			$usermail = 'user@site.com';

		}



		if(empty($fname)){

			$fname = 'fname';

		}



		if(empty($lname)){

			$lname = 'lname';

		}



		$start = 11111111;

		$end = 999999999;

		$ord_num = random_int($start, $end);

		$wpdb->query("CREATE TABLE IF NOT EXISTS `".$dbprefix."listing_orders` (



                      `main_id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,

                      `user_id` TEXT NOT NULL ,

                      `post_id` TEXT NOT NULL ,

                      `plan_id` TEXT NOT NULL ,

                      `plan_name` TEXT NOT NULL ,

                      `plan_type` TEXT NOT NULL ,

                      `payment_method` TEXT NOT NULL ,

                      `token` TEXT NOT NULL ,

                      `price` FLOAT UNSIGNED NOT NULL ,

                      `currency` TEXT NOT NULL ,

                      `days` TEXT NOT NULL ,

                      `date` TEXT NOT NULL ,

                      `status` TEXT NOT NULL ,

                      `used` TEXT NOT NULL ,

                      `transaction_id` TEXT NOT NULL ,

                      `firstname` TEXT NOT NULL ,

                      `lastname` TEXT NOT NULL ,

                      `email` TEXT NOT NULL ,

                      `description` TEXT NOT NULL ,

                      `summary` TEXT NOT NULL ,

                      `order_id` TEXT NOT NULL 

                      ) ENGINE = MYISAM; ");

		 $post_info_array = array(

		'user_id'	=> $user_ID ,

		'post_id'	=> $postid,

		'plan_id'	=> $plan_ID ,

		'plan_name' => $plan_title,

		'plan_type' => $plan_type,

		'token' => '',

		'price' => $plan_price,

		'currency'	=> $currency_code ,

		'days'	=> $plan_time ,

		'date'	=> date('Y-m-d H:i:s'),

		'status'	=> 'in progress',

		'used'	=> '' ,

		'transaction_id'	=>'',

		'firstname'	=> $fname,

		'lastname'	=> $lname,

		'email'	=> $usermail ,

		'description'	=> '' ,

		'summary'	=> '' ,

		'order_id'	=> $ord_num ,

		);



		if( !empty($plan_type) && $plan_type=="Pay Per Listing" ){

			$wpdb->insert($dbprefix."listing_orders", $post_info_array);

		}

		else if( !empty($plan_type) && $plan_type=="Package" ){

			$used = 0;

			$post_ids = '';

			$post_allowed_in_plan = '';

			$posts_allowed_in_plan = get_post_meta($plan_ID, 'plan_text', true);

			$results = $wpdb->get_results( "SELECT * FROM ".$dbprefix."listing_orders WHERE user_id ='$user_ID' AND plan_Id='$plan_ID' AND plan_type='$plan_type' AND status = 'success'" );



			if( !empty($results) && count($results) > 0 ){

				$used = 0;

				foreach ( $results as $info ) {

						$used = $info->used;

						$post_ids = $info->post_id;

						$used++;

				}

				

				if(!empty($post_ids)){

					$post_ids = $post_ids.','.$postid;

				}

				else{

					$post_ids = $postid;

				}

				if( $used < $posts_allowed_in_plan ){

					$update_data = array('post_id' => $post_ids, 'used' => $used);

					$where = array('user_id' => $user_ID, 'plan_id'=> $plan_ID, 'plan_type' => $plan_type, 'status' => 'success');

					$update_format = array('%s', '%s');

					$wpdb->update($dbprefix.'listing_orders', $update_data, $where, $update_format);

				}

				else if( $used  == $posts_allowed_in_plan || $used  > $posts_allowed_in_plan ){

					$update_data = array('post_id' => $post_ids,'used' => $used);

					$where = array('user_id' => $user_ID, 'plan_id'=> $plan_ID, 'plan_type' => $plan_type, 'status' => 'success');

					$update_format = array('%s', '%s');

					$wpdb->update($dbprefix.'listing_orders', $update_data, $where, $update_format);

					$update_status = array('status' => 'expired');

					$wheree = array('user_id' => $user_ID, 'plan_id'=> $plan_ID, 'plan_type' => $plan_type, 'used' => $posts_allowed_in_plan);

					$update_formatt = array('%s');

					$wpdb->update($dbprefix.'listing_orders', $update_status, $wheree, $update_formatt);	

				}	

			}

			else{

				$wpdb->insert($dbprefix."listing_orders", $post_info_array);

			}	

		}	

	}

}