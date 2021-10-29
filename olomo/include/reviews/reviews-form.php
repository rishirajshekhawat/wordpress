<?php
if(!function_exists('olomo_get_reviews_form')){
	function olomo_get_reviews_form($postid){
		if (class_exists('ListingReviews')) {
			global $olomo_options;
			$Reviews_OPT = $olomo_options['review_submit_options'];			
			if( is_user_logged_in() ){
				?>
					<div class="review_form">
						<div class="widget_title"><h4> <?php esc_html_e('Write Review','olomo'); ?> </h4></div>
						<form  id = "rewies_form" name = "rewies_form" action = "" method = "post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="form-label"><?php esc_html_e('Your Rating','olomo'); ?></label>
                                <div class="list-style-none form-review-stars">
                                    <input type="hidden" id="review-rating" name="rating" class="rating-tooltip" data-filled="fa fa-star fa-2x" data-empty="fa fa-star-o fa-2x" />
                                </div>
                            </div>
							<div class="form-group">
								<label class="form-label" for = "post_title"><?php esc_html_e('Title','olomo'); ?></label>
								<input placeholder="<?php esc_attr_e('Title','olomo'); ?>" type = "text" id = "post_title" class="form-control" name = "post_title" />
							</div>
							<div class="form-group">
								<label class="form-label" for = "post_description"><?php esc_html_e('Review','olomo'); ?></label>
								<textarea placeholder="<?php esc_attr_e('Yout Comments','olomo'); ?>" id = "post_description" class="form-control" rows="" name = "post_description" ></textarea>
								
							</div>
							<div class="form-submit">
								<input name="submit_review" type="submit" id="submit" class="btn" value="<?php esc_attr_e('Submit Review','olomo'); ?>"> 
								<input type="hidden" name="comment_post_ID" value="<?php echo esc_attr($postid); ?>" id="comment_post_ID">
								<span class="review_status"></span>
							</div>
						</form>
					</div>
				<?php
			}
			else  { ?>
				<div class="review_form">
					<div class="widget_title"><h4> <?php esc_html_e('Write Review','olomo'); ?> </h4></div>
					<?php
						if($Reviews_OPT=="instant_sign_in"){
					?>
						<form  id = "rewies_form" name="rewies_form" action=""  method="post" enctype="multipart/form-data">
					<?php
						}
						else{
					?>
						<form id = "rewies_form" name = "rewies_form" action = "#" method = "post" enctype="multipart/form-data">
						
					<?php } ?>
					
							<div class="form-group">
								 <label class="form-label"><?php esc_html_e('Your Rating','olomo'); ?></label>
								<div class="list-style-none form-review-stars">
									<input type="hidden" name="rating" class="rating-tooltip" data-filled="fa fa-star fa-2x" data-empty="fa fa-star-o fa-2x" />
								</div>
							</div>
						<div class="clearfix"></div>
						<?php
							if($Reviews_OPT=="instant_sign_in"){
						?>
							<div class="form-group">
								<label class="form-label" for = "u_mail"><?php esc_html_e('Email','olomo'); ?></label>
								<input type = "email" placeholder="<?php esc_attr_e('example@website.com','olomo'); ?>" id = "u_mail" class="form-control" name = "u_mail" />
							</div>
							<?php } ?>
						<div class="form-group">
							<label class="form-label" for = "post_title"><?php esc_html_e('Title','olomo'); ?></label>
							<input type = "text" placeholder="<?php esc_attr_e('Title of Your Review','olomo'); ?>" id = "post_title" class="form-control" name = "post_title" />
						</div>
						<div class="form-group">
							<label class="form-label" for = "post_description"><?php esc_html_e('Review','olomo'); ?></label>
							<textarea placeholder="<?php esc_attr_e('Yout Comments','olomo'); ?>" id = "post_description" class="form-control" rows="" name = "post_description" ></textarea>
							<p><?php esc_html_e('Review recommended to be at least 100 characters.','olomo'); ?></p>
						</div>
						<p class="form-submit">
							<?php
								if($Reviews_OPT=="sign_in"){
							?>
								<input name="submit_review" type="submit" id="submit" class="btn md-trigger" data-modal="modal-3" value="<?php echo esc_attr__('Submit Review ', 'olomo');?>">
							<?php
								}elseif($Reviews_OPT=="instant_sign_in"){
							?>
								<input name="submit_review" type="submit" id="submit" class="btn" value="<?php echo esc_attr__('Signup & Submit Review', 'olomo');?>">
							<?php } ?>
							<input type="hidden" name="comment_post_ID" value="<?php echo esc_attr($postid); ?>" id="comment_post_ID">
							<span class="review_status"></span>
						</p>
					</form>
				</div>
				<?php
			}
		}
	}
}