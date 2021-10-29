<?php

/**

 * Template name: Dashboard

 *

 * Learn more: http://codex.wordpress.org/Template_Hierarchy

 *

 * @package WordPress

 */

 ?>

 <?php

	function count_user_posts_by_status($post_type = 'listing',$post_status = 'publish',$user_id = 0, $userListing=false){

		global $wpdb;

		$count = 0;

		if($userListing==false){

			$count = $wpdb->get_var(

				$wpdb->prepare( 

				"

				SELECT COUNT(ID) FROM $wpdb->posts 

				WHERE post_status = %s

				AND post_type = %s

				AND post_author = %d",

				$post_status,

				$post_type,

				$user_id

				)

			);

			

		}

		else{

			$pid = $wpdb->get_col(

				$wpdb->prepare( 

				"

				SELECT ID FROM $wpdb->posts 

				WHERE post_status = %s

				AND post_type = %s

				AND post_author = %d",

				$post_status,

				$post_type,

				$user_id

				)

			);

			if(!empty($pid)){

				foreach($pid as $id){

					$listingID = listing_get_metabox_by_ID('ads_listing', $id);

					$uid = get_post_field( 'post_author', $listingID );

					if($uid==$user_id){

						$count++;

					}

				}

			}

		}

		return ($count) ? $count : 0;

	}

	$recentReviews = array();

    $recentReviews = getAllReviewsArray();

	function count_user_reviews_by_status($post_type = 'reviews', $review_status = 'publish',$user_id = 0, $userReview=false, $recentReviews = 'post__in'){

		global $wpdb;

		$count = 0;

		if($userReview==false){

			$count = $wpdb->get_var(

				$wpdb->prepare( 

				"

				SELECT COUNT(ID) FROM $wpdb->posts 

				WHERE post_status = %s

				AND post_type = %s

				AND post_author = %d",

				$review_status,

				$post_type,

				$user_id,

				$recentReviews

				)

			);

			

		}

		else{

			$rid = $wpdb->get_col(

				$wpdb->prepare( 

				"

				SELECT ID FROM $wpdb->posts 

				WHERE post_status = %s

				AND post_type = %s

				AND post_author = %d",

				$review_status,

				$post_type,

				$user_id,

				$recentReviews

				)

			);

			if(!empty($rid)){

				foreach($rid as $id){

					$reviewID = listing_get_metabox_by_ID('review_status', $id);

					$uid = get_post_field( 'post_author', $reviewID );

					if($uid==$user_id){

						$count++;

					}

				}

			}

		}

		return ($count) ? $count : 0;

	}

	

	

	

	$userID = '';

	if(is_user_logged_in()){

		$current_user = wp_get_current_user();

		$userID = $current_user->ID;		

	}else{

		wp_redirect( home_url() ); exit;

	}

	$published_listings = ''; 

	$pending_listings=''; 

	$expired_listings = ''; 

	$all_listings='';

	$count_listings = wp_count_posts( 'listing', 'readable' );

	$published_listings = count_user_posts_by_status('listing', 'publish',$userID, false);

	$pending_listings = count_user_posts_by_status('listing', 'pending',$userID, false);

	$expired_listings = count_user_posts_by_status('listing', 'trash',$userID, false);

	$all_listings = $published_listings + $pending_listings + $expired_listings;

	

	$review_received = '';

	$review_submited = '';

	$count_listings = wp_count_posts( 'reviews', 'readable' );

	$review_received = count_user_reviews_by_status('reviews', 'rating', $userID, false);

	$review_submited = count_user_reviews_by_status('reviews', 'publish',$userID, false);

	

	$simpleDashboard=false;

	if( empty($published_listings) && empty($pending_listings)){

		$simpleDashboard = false;

	}

	

	$updateTab = false;

	global $user_id, $listinghub_options;

	

	$current_user = wp_get_current_user();

	$user_id = $current_user->ID; 

	$rmessage = '';

	$rType = '';

	if(isset($_POST['removeid']) && !empty($_POST['removeid'])){

		$rID = $_POST['removeid'];

		$rpost = get_post( $rID ); 

		$rpost_author = $rpost->post_author;

		if($user_id == $rpost_author){

			wp_delete_post($rID);

			$rmessage = esc_html__('Post has deleted succesfully', "olomo");

			$rType = 'success';

		}else{

			$rmessage = esc_html__('You have no permission to delete this post', "olomo");

			$rType = 'warning';

		}

		

	}

	

	$current_user = wp_get_current_user();

	$user_id = $current_user->ID; 

	// User Name

	$user_fname = get_the_author_meta('first_name', $user_id);

	$user_lname = get_the_author_meta('last_name', $user_id);

	// User contact meta

	$user_address = get_the_author_meta('address', $user_id);

	$user_phone = get_the_author_meta('phone', $user_id);

	$user_email = get_the_author_meta('user_email', $user_id);

	// User Social links

	$user_facebook = get_the_author_meta('facebook', $user_id);

	$user_google = get_the_author_meta('google', $user_id);

	$user_linkedin = get_the_author_meta('linkedin', $user_id);

	$user_instagram = get_the_author_meta('instagram', $user_id);

	$user_twitter = get_the_author_meta('twitter', $user_id);

	$user_pinterest = get_the_author_meta('pinterest', $user_id);

	// User BIO

	$user_desc = get_the_author_meta('description', $user_id);

	$user_ID = $user_id;

	if ($user_ID) {



		if(isset($_POST['profileupdate'])) {



			$message = esc_html__("Your profile updated successfully.", "olomo");

			$mType = 'success';



			$first = sanitize_text_field($_POST['first_name']);

			$last = sanitize_text_field($_POST['last_name']);

			$email = sanitize_email($_POST['email']);

			$user_phone = sanitize_text_field($_POST['phone']);

			$user_address = sanitize_textarea_field($_POST['address']);

			$description = sanitize_textarea_field($_POST['desc']);



			$facebook = sanitize_text_field($_POST['facebook']);

			$google = sanitize_text_field($_POST['google']);

			$linkedin = sanitize_text_field($_POST['linkedin']);

			$instagram = sanitize_text_field($_POST['instagram']);

			$twitter = sanitize_text_field($_POST['twitter']);

			$pinterest = sanitize_text_field($_POST['pinterest']);



			$password = sanitize_text_field($_POST['pwd']);

			$confirm_password = sanitize_text_field($_POST['confirm']);



			update_user_meta( $user_ID, 'first_name', $first );

			update_user_meta( $user_ID, 'last_name', $last );

			update_user_meta( $user_ID, 'phone', $user_phone );

			update_user_meta( $user_ID, 'address', $user_address );

			update_user_meta( $user_ID, 'description', $description );



			update_user_meta( $user_ID, 'facebook', $facebook );

			update_user_meta( $user_ID, 'google', $google );

			update_user_meta( $user_ID, 'linkedin', $linkedin );

			update_user_meta( $user_ID, 'instagram', $instagram );

			update_user_meta( $user_ID, 'twitter', $twitter );

			update_user_meta( $user_ID, 'pinterest', $pinterest );

			

			$your_image_url = $_POST['your_author_image_url'];

			$author_avatar_url = get_user_meta($user_ID, "listinghub_author_img_url", true); 

			if($your_image_url != ''){

				update_user_meta( $user_ID, 'listinghub_author_img_url', $your_image_url );

			}else{

				update_user_meta( $user_ID, 'listinghub_author_img_url', $author_avatar_url );

			}



			if(isset($email) && is_email($email)) {

				wp_update_user( array ('ID' => $user_ID, 'user_email' => $email) ) ;

			}else { 

				$message = esc_html__("Please enter a valid email id.", "olomo");

				$mType = 'error';

			}



			if($password) {

				if (strlen($password) < 5 || strlen($password) > 15) {

					$message = esc_html__("Password must be 5 to 15 characters in length", "olomo");

					$mType = 'error';

				}

				//elseif( $password == $confirm_password ) {

				elseif(isset($password) && $password != $confirm_password) {

					$message = "Password Mismatch";

					$mType = 'error';

				} elseif ( isset($password) && !empty($password) ) {

					$update = wp_set_password( $password, $user_ID );

					$message = esc_html__("Your profile updated successfully.", "olomo");

					$mType = 'success';

				}

			}

			$updateTab = true;

		}

	}	

			$published_campaings = count_user_posts_by_status('ads', 'publish',$userID, true);

 ?>

<?php get_header();?>

<?php

	$dashPage = '';

	$opendClass = '';

	$activeListing = '';

	$activePending = '';

	$activeExpired = '';

	if(isset($_GET['dashboard'])){

		$dashPage = $_GET['dashboard'];

	}

	

	if(!empty($dashPage) && ($dashPage=="listing" || $dashPage=="pending" || $dashPage=="expired")){

		$opendClass = 'opened';



		if($dashPage=="listing"){

			$activeListing = 'class="active"';

		}

		else if($dashPage=="pending"){

			$activePending = 'class="active"';

		}

		else if($dashPage=="expired"){

			$activeExpired = 'class="active"';

		}

	}

	

	$lft_panel = '';

	$openedClass = '';

	$invcListing = '';

	if(isset($_GET['dashboard'])){

		$lft_panel = $_GET['dashboard'];

	}

	

	

	if(!empty($lft_panel) && ($lft_panel=="list-invoices")){

		$openedClasss = 'opened';

		

		if($lft_panel=="ads-invoices"){

			$invcListing = 'class="active"';

		}

	}

	

	$review_panel = '';

	$reviewOpenedClass = '';

	$review_Listing = '';

	$activeReviewListing = '';

	if(isset($_GET['dashboard'])){

		$review_panel = $_GET['dashboard'];

	}

	if(!empty($review_panel) && ($review_panel=="reviews" || $review_panel=="reviews-submited")){

		$reviewOpenedClass = 'opened';

		

		if($review_panel=="reviews"){

			$review_Listing = 'class="active"';

		}

		else if($review_panel=="reviews-submited"){

			$activeReviewListing = 'class="active"';

		}

	}

	$activeDashboardMenu = '';

	$activeprofileMenu = '';

	$activebookmarkedMenu = '';

	$activeinvoicesMenu = '';

	$activepackagesMenu = '';

	$activereviewsMenu = '';

	$activeBookingsMenu = '';

	if(!empty($dashPage)){

		if($dashPage=="main-screen"){

			$activeDashboardMenu = 'class="active-dash-menu"';

		}

		else if($dashPage=="update-profile"){

			$activeprofileMenu = 'class="active-dash-menu"';

		}

		else if($dashPage=="bookmarked"){

			$activebookmarkedMenu = 'class="active-dash-menu"';

		}

		else if($dashPage=="invoices"){

			$activeinvoicesMenu = 'class="active-dash-menu"';

		}

		else if($dashPage=="packages"){

			$activepackagesMenu = 'class="active-dash-menu"';

		}

	}

	$currentURL = '';

	$perma = '';

	$dashQuery = 'dashboard=';

	$currentURL = get_permalink();

	global $wp_rewrite;

	if ($wp_rewrite->permalink_structure == ''){

		$perma = "&";

	}else{

		$perma = "?";

	}

?>

<div id="dashboard">

	<!-- Navigation -->

	<div id="dashboard-nav" class="dashboard-nav">	

		<ul>

			<?php if($simpleDashboard==false){ ?>

                  	<li class="active"><a <?php echo esc_html($activeDashboardMenu); ?> href="<?php echo esc_url($currentURL.$perma.$dashQuery).'main-screen'; ?>"><i class="fa fa-cogs"></i><?php esc_html_e('Dashboard','olomo'); ?></a></li>

            <?php }

			if($simpleDashboard==false){ ?>

	                <li class="dropdown <?php echo esc_html($opendClass) ?>">

                        <a id="MLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-list"></i><?php esc_html_e('My Listing','olomo'); ?> </a>

                        <ul class="dropdown-menu <?php echo esc_html($opendClass) ?>">

                            <li <?php echo esc_html($activeListing); ?> class="publish-lst"><a href="<?php echo esc_url($currentURL.$perma.$dashQuery).'listing'; ?>"><?php esc_html_e('Active','olomo'); ?><span class="nav-tag green"><?php echo esc_html($published_listings); ?></span></a></li>

                            <li <?php echo esc_html($activePending); ?> class="pending-lst"><a href="<?php echo esc_url($currentURL.$perma.$dashQuery).'pending'; ?>"><?php esc_html_e('Pending','olomo'); ?><span class="nav-tag yellow"><?php echo esc_html($pending_listings); ?></span></a></li>

                            <li <?php echo esc_html($activeExpired); ?> class="expired-lst"><a href="<?php echo esc_url($currentURL.$perma.$dashQuery).'expired'; ?>"><?php esc_html_e('Expired','olomo'); ?><span class="nav-tag red"><?php echo esc_html($expired_listings); ?></span></a></li>

                        </ul>

                    </li>

            <?php } ?>

            		<li><a <?php echo esc_html($activebookmarkedMenu); ?> href="<?php echo esc_url($currentURL.$perma.$dashQuery).'bookmarked'; ?>"><i class="fa fa-bookmark-o"></i><?php esc_html_e('Bookmarks','olomo'); ?> </a></li>

			<?php if(class_exists('ListingReviews')) { ?> 

            <?php if($simpleDashboard==false){?>

                    <li class="dropdown <?php echo esc_html($reviewOpenedClass) ?>">

                        <a id="MLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-star-o"></i><?php esc_html_e(' Reviews ','olomo'); ?></a>

                        <ul class="dropdown-menu <?php echo esc_html($reviewOpenedClass) ?>">

                                <li <?php echo esc_html($review_Listing); ?>><a href="<?php echo esc_url($currentURL.$perma.$dashQuery).'reviews'; ?>"><?php esc_html_e(' Reviews Received','olomo'); ?><span class="nav-tag green"><?php echo count($recentReviews); ?></span></a></li>

                            <li <?php echo esc_html($activeReviewListing); ?>><a href="<?php echo esc_url($currentURL.$perma.$dashQuery).'reviews-submited'; ?>"><?php esc_html_e('Reviews Submited ','olomo'); ?> <span class="nav-tag yellow"><?php echo esc_html($review_submited); ?></span> </a></li>

                        </ul>

                    </li>

            <?php } ?>      

            <?php }?>

                    <li><a <?php echo esc_html($activepackagesMenu); ?> href="<?php echo esc_url($currentURL.$perma.$dashQuery).'packages'; ?>"><i class="fa fa-briefcase" aria-hidden="true"></i><?php esc_html_e('Packages &amp; Plan','olomo'); ?> </a></li>

                    <li><a <?php echo esc_html($activepackagesMenu); ?> href="<?php echo esc_url($currentURL.$perma.$dashQuery).'listing-order'; ?>"><i class="fa fa-bars" aria-hidden="true"></i><?php esc_html_e('Your Order History','olomo'); ?> </a></li>

            <?php if($simpleDashboard==false){ ?>

					<li><a <?php echo esc_html($activeprofileMenu); ?> href="<?php echo esc_url($currentURL.$perma.$dashQuery).'update-profile'; ?>"><div class="profile-sidebar-img"> <img class="author-avatar" src="<?php echo olomo_author_image(); ?>" /> </div><?php esc_html_e('My Profile','olomo'); ?></a></li>

			<?php }?>

            		<li><a href="<?php echo wp_logout_url( esc_url(home_url('/')) ); ?>"><i class="fa fa-power-off"></i><?php esc_html_e(' Logout','olomo'); ?></a></li>
                    
                    <li><a href="<?php echo esc_url($currentURL.$perma.$dashQuery).'delete-account'; ?>" onclick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i><?php esc_html_e(' Delete Account','olomo'); ?></a></li>

		</ul>	

		
	</div>

	<!-- Navigation / End -->

	<!-- Content -->

	<div class="dashboard-content">

		<?php if($simpleDashboard==false){ 

              if(isset($_GET['dashboard']) && !empty($_GET['dashboard'])){

                get_template_part('templates/dashboard/'.$_GET['dashboard'].'');

              }else {

                get_template_part('templates/dashboard/main-screen');

              }

           }

		  if($simpleDashboard==true){ 

		 	get_template_part('templates/dashboard/update-profile');

		  } ?>        

	</div>

	<!-- Content / End -->

</div>

<?php get_footer();