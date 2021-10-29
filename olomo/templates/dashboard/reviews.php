<?php
global $olomo_options;
$authorURL = $olomo_options['listing-author'];?>
<div id="titlebar">
  <div class="row">
    <div class="col-md-12">
      <h2><?php esc_html_e('Reviews','olomo'); ?></h2>
      <!-- Breadcrumbs -->
      <nav id="breadcrumbs">
        <ul>
          <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home','olomo'); ?></a></li>
          <li><a href="<?php echo esc_url($authorURL); ?>"><?php esc_html_e('Dashboard','olomo'); ?></a></li>
          <li><?php esc_html_e('Reviews Received','olomo'); ?></li>
        </ul>
      </nav>
    </div>
  </div>
</div>
<?php 
	$post_author = get_post_field( 'post_author', get_the_ID() );
	$author_obj = get_user_by('id', $post_author);
	$username = $author_obj->user_login;
	$userEmail = $author_obj->user_email;
?>
<div class="row">			
  <div class="col-lg-12 col-md-12">
     <div class="dashboard-list-box">
        <h4><?php esc_html_e('Received Reviews', 'olomo'); ?></h4>
        <?php
    global $paged, $wp_query;
    if(isset($_POST['submit_response'])){
        $pid = '';
        $userName = '';
        $userEmail = '';
        $pid = sanitize_textarea_field($_POST['rewID']);
        $userName = sanitize_textarea_field($_POST['userName']);
        $userEmail = sanitize_email($_POST['userEmail']);
        $review_res = '';
        $review_res = sanitize_textarea_field($_POST['review_reply']);
        
        $review_reply_time = '';
        $review_reply_time = sanitize_textarea_field($_POST['reviewTime']);
        listing_set_metabox('review_reply_time', $review_reply_time, $pid);
        
        $body = $review_res;
        listing_set_metabox('review_reply', $review_res, $pid);
    }
    
    $recentReviews = array();
    $recentReviews = getAllReviewsArray();
    if(!empty($recentReviews) && count($recentReviews)>0){
    $args = array(
        'post_type' => 'reviews', 
        'posts_per_page' => -1, 
        'post__in'	=> $recentReviews,
        'orderby' => 'date',
        'order'   => 'DESC',
        'paged' => $paged,
        'post_status'	=> 'publish'
    );
    
    $wp_query = new WP_Query( $args );

    if($wp_query->have_posts()){?>
		 <ul>
		<?php
		$i =1;
        while($wp_query->have_posts()){
            $wp_query->the_post();
            $authorid = $wp_query->post_author;
            $review_post = listing_get_metabox_by_ID('listing_id', get_the_ID());
            $rating = listing_get_metabox_by_ID('rating' ,get_the_ID());
            if(!empty($rating)){
                $rate = $rating;
            }
            else{
                $rate = 0;
            }
            ?> 
            <li id="review-<?php echo get_the_ID();?>" class="listing-reviews">
            <div class="review_img">
                   <img class="author-avatar" src="<?php echo esc_url(olomo_author_image()); ?>"/>
            </div>
            <div class="review_comments">
                    <div class="comment-by"><?php echo get_the_author_meta('display_name'); ?> <span><?php  esc_html_e('On', 'olomo'); ?> </span><a href="<?php echo get_the_permalink($review_post); ?>"><?php echo get_the_title($review_post); ?></a>
                        <div class="listing_review_info"> 
                            <p>
                            <?php 
                            if( !empty($rating) ){
                                $blankstars = 5;
                                while( $rating > 0 ){
                                    echo '<i class="fa fa-star fa-2x active"></i>';
                                    $rating--;
                                    $blankstars--;
                                }
                                while( $blankstars > 0 ){
                                    echo '<i class="fa fa-star fa-2x"></i>';
                                    $blankstars--;
                                }
                            }
                             ?>
                           </p>
                        </div>
                    </div>
                    <span class="date"><?php  echo get_the_date() ?></span> 
                    <?php the_content();   ?>
                    
                     
            </div>
          </li>  
      <?php $i = $i + 1; }?>
	</ul>
	<?php 
         wp_reset_postdata();
      }
    }
else{?>
        <div class="error-column box-shadownon">
            <i class="fa fa-frown-o" aria-hidden="true"></i>
            <h1><?php esc_html_e('Sorry','olomo'); ?></h1>
            <h2><?php esc_html_e('You have not received any review yet.','olomo'); ?></h2>
         </div>
<?php } ?>          
	  </div>	
  </div>
  <div class="col-md-12">
	<?php 
        $copy_right = $olomo_options['copy_right'];
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