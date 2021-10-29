<?php
$current_user = wp_get_current_user();
global $listinghub_options;
$authorURL = $listinghub_options['listing-author'];
 ?>
<!-- Titlebar -->
<div id="titlebar">
  <div class="row">
    <div class="col-md-12">
      <h2>
        <?php esc_html_e('Dashboard','olomo'); ?>
      </h2>
      <!-- Breadcrumbs -->
      <nav id="breadcrumbs">
        <ul>
          <li><a href="<?php echo esc_url(home_url('/')); ?>">
            <?php esc_html_e('Home','olomo'); ?>
            </a></li>
          <li>
            <?php esc_html_e('Dashboard','olomo'); ?>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>
<!-- Notice -->
<div class="row">
  <div class="col-md-12">
    <div class="notification alert alert-success alert-dismissible" role="alert">
      <p><?php esc_html_e('Welcome! ','olomo'); ?><strong><?php echo esc_html($current_user->user_login); ?></strong></p>
    </div>
	
	<div class="dashboard-info-box">
	<?php
	$recentReviews = array();
     $recentReviews = getAllReviewsArray();
	
	$recentviews = array();
    $recentviews = getAllPostViews();
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
	 $all_reviews = $review_received + $review_submited;
	
	?>
                <div class="dashboard-info color-1">
                    <h4><?php echo esc_html($published_listings); ?></h4> <span><?php esc_html_e('Published Listings','olomo'); ?></span>
                </div>
                <div class="dashboard-info color-2">
                    <h4><?php echo esc_html($pending_listings); ?></h4> <span><?php esc_html_e('Pending Listings','olomo'); ?></span>
                </div>
                <div class="dashboard-info color-3">
                    <h4><?php echo esc_html($expired_listings); ?></h4> <span><?php esc_html_e('Expired Listings','olomo'); ?></span>
                </div>
                <div class="dashboard-info color-4">
                    <h4><?php echo $recentviews; ?></h4> <span><?php esc_html_e('Total Views','olomo'); ?></span>
                </div>
                <div class="dashboard-info color-5">
                    <h4><?php echo esc_html($all_reviews); ?></h4> <span><?php esc_html_e('Total Reviews','olomo'); ?></span>
                </div>
                <div class="dashboard-info color-6">
				<?php $countBookmarked = array();
						$countBookmarked = getSaved(); ?>
                    <h4><?php echo count($countBookmarked); ?></h4> <span><?php esc_html_e('Bookmarked Listings','olomo'); ?></span>
                </div>
            </div>
  </div>
  <!-- Copyrights -->
  <div class="col-md-12">
	<?php 
        $copy_right = $listinghub_options['copy_right'];
        if($copy_right):
            echo '<div class="copyrights">'.wp_kses_post($copy_right).'</div>';
        else:
		echo '<div class="copyrights">';
		printf( esc_html__('&copy; 2018 %s. Created by', 'olomo'), 'olomo');
		echo wp_kses_post(' <a href="'.esc_url(__('http://webmasterdriver.net/', 'olomo')).'" target="_blank">'.esc_html__( 'WebMasterDriver','olomo').'</a>');
		echo '</div>';
		
        endif;
    ?>    
    </div>
</div>
