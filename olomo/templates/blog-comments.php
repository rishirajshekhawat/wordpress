<?php
/* ============== Blog Comments Layout ============ */
	function olomo_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		?>
		<div class="comments-box" <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			<div class="comments-thumb">
				<?php echo get_avatar($comment,85); ?>
			</div>
			<div class="comments-content">
				<div class="comments-meta-box">
					<div class="comments-author text-left">
						<div class="comments-name">	<?php echo get_comment_author_link(); ?></div>
						<div class="comments-date">
							<?php printf(esc_attr__('%1$s at %2$s', 'olomo'), get_comment_date(),  get_comment_time()) ?>
							<?php $rating = get_comment_meta(get_comment_ID(), 'rate', true);
							 if(!empty($rating)){ ?>	
								<div class="post-reviews">
									<?php for($i=1;$i<=$rating;$i++){ ?>
											<i class="fa fa-star"></i>
									<?php }
									$emptyStars = 5 - $rating;
									if($emptyStars != '0'){
									for($i=1;$i<=$emptyStars;$i++){ ?>
											<i class="fa fa-star-o"></i>
									<?php }
									}
									?>
								</div>
								 <?php } ?>
						</div>
					</div>
					<div class="comments-replay text-right">
						<?php comment_reply_link(array_merge( $args, array('reply_text' => esc_html('Reply'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?>
						<?php edit_comment_link(esc_html('Edit')); ?>
					</div>
				</div>
				<div class="comments-description">
					<?php if ($comment->comment_approved == '0') { ?>
						<em><i class="icon-info-sign"></i> <?php esc_html_e('Comment awaiting approval', 'olomo'); ?></em>
						<br />
					<?php }elseif($comment->comment_approved == '1'){ ?>
						<?php comment_text(); ?>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php 
	}
	
	/* ============== Blog Comments Fields ============ */
	
	add_filter('comment_form_default_fields', 'custom_fields');
	function custom_fields($fields) {
		
		if(is_singular('listing')){
			
			$commenter = wp_get_current_commenter();
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );
			$fields[ 'author' ] = '<div class="col-md-6 padding-left-0">
				<div class="form-group clearfix">
					<label for="inputName">Name</label>'.
				  ( $req ? '' : '' ).
				  '<input class="form-control" id="inputName"  name="author" type="text" value="'. esc_attr( $commenter['comment_author'] ) .
				  '" size="30" tabindex="1"' . $aria_req . ' />
				</div>
			</div>
			';

			$fields[ 'email' ] = '<div class="col-md-6 padding-right-0">
				<div class="form-group clearfix">
					<label for="inputEmail">Email</label>'.
				  ( $req ? '' : '' ).
				  '<input class="form-control" id="inputEmail" name="email" type="text" value="'. esc_attr( $commenter['comment_author_email'] ) .
				  '" size="30"  tabindex="2"' . $aria_req . ' />
				</div>
			</div>
			  ';
			$fields[ 'url' ] = '';
			 $fields[ 'comment_field' ] ='<div class="form-group">
					<label for="inputComments">Review</label>
					<textarea name="comment" class="form-control" rows="8" id="inputComments" aria-required="true" required="required"></textarea>
				</div>';
		}else{
			$commenter = wp_get_current_commenter();
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );
			$fields[ 'author' ] = '<div class="form-group">
									<label for="inputName">Name</label>'.
			  ( $req ? '' : '' ).
			  '<input class="form-control" id="inputName"  name="author" type="text" value="'. esc_attr( $commenter['comment_author'] ) .
			  '" size="30" tabindex="1"' . $aria_req . ' /></div>';
			$fields[ 'email' ] = '<div class="form-group">
									<label for="inputEmail">Email</label>'.
			  ( $req ? '' : '' ).
			  '<input class="form-control" id="inputEmail" name="email" type="text" value="'. esc_attr( $commenter['comment_author_email'] ) .
			  '" size="30"  tabindex="2"' . $aria_req . ' /></div>';
			$fields[ 'url' ] = '<div class="form-group">
									<label for="inputWebsite">Website</label>'.
			  ( $req ? '' : '' ).
			  '<input class="form-control" id="inputWebsite" name="website" type="text" value="'. esc_attr( $commenter['comment_author_url'] ) .
			  '" size="30" tabindex="1"' . esc_attr($aria_req) . ' /></div>';
			 $fields[ 'comment_field' ] =
				'<div class="form-group">
									<label for="inputComments">Comment</label>
					<textarea name="comment" class="form-control" rows="8" id="inputComments" aria-required="true" required="required"></textarea>
				</div>';
		}
	  return $fields;
	}
	function listing_comment_field($comment_field){
		if(is_singular('listing')){
			$comment_field =
				'<div class="form-group">
					<label for="inputComments">Review</label>
					<textarea name="comment" placeholder="Listing comment" class="form-control" rows="8" id="inputComments" aria-required="true" required="required"></textarea>
				</div>';
		 
			return $comment_field;
		}else{
			$comment_field =
			'<div class="form-group">
				<textarea placeholder="Write your comment here..." name="comment" class="form-control" rows="8" id="inputComments" aria-required="true" required="required"></textarea>
			</div>';
			return $comment_field;
		}
	}
	if(is_user_logged_in()){ 
			add_filter('comment_form_field_comment', 'listing_comment_field');
	}
	function remove_textarea($defaults){
		$defaults['comment_field'] = '';
		return $defaults;
	}
	if(!is_user_logged_in()){ 
		add_filter( 'comment_form_defaults', 'remove_textarea' );
	}
	
	function add_comment_meta_values($comment_id) {
			if(isset($_POST['rate'])) {
				$age = wp_filter_nohtml_kses($_POST['rate']);
				add_comment_meta($comment_id, 'rate', $age, false);
			}
	}
	add_action ('comment_post', 'add_comment_meta_values', 1);
	function remove_comment_fields($fields) {
		if(is_singular('listing')){
			unset($fields['url']);
			$commenter = wp_get_current_commenter();		
			return $fields;
		}else{
			return $fields;
		}
	}      
	 function add_bcw_fields(){
		if(is_singular('listing')){?>
		 <div class="form-group margin-bottom-40">
					<p class="padding-bottom-15"> <?php esc_html_e('Your Rating for this listing','olomo'); ?></p>
					<div class="list-style-none form-review-stars">
						<input type="hidden" name="rate" class="rating-tooltip" data-filled="fa fa-star fa-2x" data-empty="fa fa-star-o fa-2x" />
					</div>
				</div>
      <?php           
		}else{}
	}
	add_action( 'comment_form_logged_in_after', 'add_bcw_fields' );
	add_filter('comment_form_default_fields','remove_comment_fields');