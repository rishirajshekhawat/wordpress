<?php
if(!function_exists('olomo_get_all_reviews')){
	function olomo_get_all_reviews($postid){
		$key = 'reviews_ids';
		$review_idss = listing_get_metabox_by_ID($key ,$postid);
		$review_ids = '';
		if( !empty($review_idss) ){
			$review_ids = explode(",",$review_idss);
		}
		$active_reviews_ids = array();
		if( !empty($review_ids) && is_array($review_ids) ){
			$review_ids = array_unique($review_ids);
			foreach($review_ids as $reviewID){
				if(get_post_status($reviewID)=="publish"){
					$active_reviews_ids[] = $reviewID;
				}
			}
			if(count($active_reviews_ids) == 1){
				$label = esc_html__('Review for ','olomo').''.get_the_title($postid);
			}else{
				$label = esc_html__('Reviews for ','olomo').''.get_the_title($postid);
			}
			echo '<div class="widget_title"><h4><span>'.count($active_reviews_ids).' '.esc_html($label).'</h4></div>';
		}
		else{			
		}
		
		if( !empty($review_ids) && count($review_ids)>0 ){
			echo '<div class="all_review_m">';
			foreach( $review_ids as $key=>$review_id ){
				$args = array(
					'post_type'  => 'reviews',
					'orderby'    => 'date',
					'order'      => 'ASC',
					'p'			 => $review_id,
					'post_status'	=> 'publish'
			 	);
			 	$query = new WP_Query( $args );
 				if ( $query->have_posts() ) {
					echo '';
					while ( $query->have_posts() ) {
						$query->the_post();
						global $post;
						echo '<article class="review_wrap">';
						// moin here strt
						$review_reply = '';
						$review_reply = listing_get_metabox_by_ID('review_reply' ,get_the_ID());
						
						$review_reply_time = '';
						$review_reply_time = listing_get_metabox_by_ID('review_reply_time' ,get_the_ID());
						// moin here ends
						$rating = listing_get_metabox_by_ID('rating' ,get_the_ID());
						$rate = $rating;
						
						$author_id = $post->post_author;
						
						$author_avatar_url = get_user_meta($author_id, "olomo_author_img_url", true); 
						$avatar;
						if(!empty($author_avatar_url)) {
							$avatar =  $author_avatar_url;
						} else { 			
							$avatar_url = olomo_get_avatar_url ( $author_id, $size = '94' );
							$avatar =  $avatar_url;
						}
						$user_reviews_count = count_user_posts( $author_id , 'reviews' );
						?>
						<div class="review_author">
							<div class="review-thumbnail">
								<img src="<?php  echo esc_url($avatar); ?>">
							</div>
						</div>
						<div class="review_detail">
							<div class="top-section">
								<h5><?php the_title(); ?></h5>
							</div>
							<div class="content-section">
								<p><?php the_content(); ?></p>
								<?php
										$interests = '';
										$Lols = '';
										$loves = '';
										$interests = listing_get_metabox_by_ID('review_interesting',get_the_ID());
										$Lols = listing_get_metabox_by_ID('review_lol',get_the_ID());
										$loves = listing_get_metabox_by_ID('review_love',get_the_ID());
										
										if(empty($interests)){
											$interests = 0;
										}
										if(empty($Lols)){
											$Lols = 0;
										}
										if(empty($loves)){
											$loves = 0;
										}
								?>
								<div class="bottom-section" style="display:none;">
									<form action="#">
										<span><?php echo esc_html__('Was this review ...?', 'olomo'); ?></span>
										<ul>
											<li>
				<a class="instresting reviewRes" href="#" data-reacted ="<?php echo esc_attr__('You already reacted', 'olomo'); ?>" data-restype='interesting' data-id='<?php the_ID(); ?>' data-score='<?php echo esc_attr($interests); ?>'>
													<i class="fa fa-thumbs-o-up"></i><?php echo esc_html__(' Interesting ', 'olomo'); ?><span class="interests-score"><?php if(!empty($interests)) echo esc_attr($interests); ?></span>
													<span class="state"></span>
												</a>
												
											</li>
											<li>
												<a class="lol reviewRes" href="#" data-reacted ="<?php echo esc_attr__('You already reacted', 'olomo'); ?>" data-restype='lol' data-id='<?php the_ID(); ?>' data-score='<?php echo esc_attr($Lols); ?>'>
													<i class="fa fa-smile-o"></i><?php echo esc_html__(' Lol ', 'olomo'); ?><span class="interests-score"><?php if(!empty($Lols)) echo esc_attr($Lols); ?></span>
													<span class="state"></span>
												</a>
												
											</li>
											<li>
												<a class="love reviewRes" href="#" data-reacted ="<?php echo esc_attr__('You already reacted', 'olomo'); ?>" data-restype='love' data-id='<?php the_ID(); ?>' data-score='<?php echo esc_attr($loves); ?>'>
													<i class="fa fa-heart-o"></i><?php echo esc_html__(' Love ', 'olomo'); ?><span class="interests-score"><?php if(!empty($loves)) echo esc_attr($loves); ?></span>
													<span class="state"></span>
												</a>
												
											</li>
										</ul>
									</form>
								</div>
                                <div class="listing_rating">
                                	<p><?php echo cal_listing_rate(get_the_ID(),'review', true); ?> </p>
                                	<p><i class="fa fa-clock-o"></i> <?php echo get_the_time('F j, Y g:i a'); ?></p>
                                </div>
							</div>
						</div>
						
						<?php if(!empty($review_reply)) { ?>
							<section class="details detail-sec">
								<div class="owner-response">
									<h3><?php esc_html_e('Owner Response', 'olomo'); ?></h3>
										<?php
										if(!empty($review_reply_time)) { ?>
											<time><?php echo esc_html($review_reply_time); ?></time>
										<?php } ?>
											<p><?php echo esc_html($review_reply); ?></p>
										
								</div>
							</section>
							<?php } ?>
						<!-- moin here ends-->
						<?php
						echo '</article>';
					}
					echo '';
					wp_reset_postdata();
				} else {}
			}
			echo '</div>';
		} 
		
	}
}