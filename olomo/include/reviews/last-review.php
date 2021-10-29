<?php 
/* ============== Last review by List ID ============ */
	if (!function_exists('olomo_last_review_by_list_ID')) {
		function olomo_last_review_by_list_ID($postid) {
			$key = 'reviews_ids';
			$review_ids = listing_get_metabox_by_ID($key ,$postid);
			$review_ids = explode(",",$review_ids);
			$tagline_text = listing_get_metabox_by_ID('tagline_text' ,$postid);			
			if(!empty($review_ids) && !empty($review_ids[0])){
				$count = count($review_ids);
				$last = $count - 1;
				$reviewID = $review_ids[$last];
				if(get_post_status($reviewID)=="publish"){
					$author_id = get_post_field( 'post_author', $reviewID );
					$content = get_post_field( 'post_content', $reviewID );
					$author_avatar_url = get_user_meta($author_id, "olomo_author_img_url", true); 
					$avatar;
					if(!empty($author_avatar_url)) {
						$avatar =  $author_avatar_url;
					} else { 			
						$avatar_url = olomo_get_avatar_url ( $author_id, $size = '94' );
						$avatar =  $avatar_url;
					}
					?>
					<div class="review">
						<div class="review-post">
							<div class="reviewer-thumb">
								<img src="<?php  echo esc_url($avatar); ?>">
							</div>
							<div class="reviewer-details">
								<?php echo esc_html(get_the_title($reviewID)); ?> <?php echo esc_html(get_the_date('l F j, Y',$reviewID)); ?>
								<p><?php echo substr($content, 0, 95); ?>...</p>
							</div>
						</div>
					</div>
				<?php 
				} else{
					echo '<p><span class="icon"><i class="fa fa-tags"></i></span>'.esc_html($tagline_text).'</p>';
				} 
			}else{
				echo '<p><span class="icon"><i class="fa fa-tags"></i></span>'.esc_html($tagline_text).'</p>';
			}
		}
	}