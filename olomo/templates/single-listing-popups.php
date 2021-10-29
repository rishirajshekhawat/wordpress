<!-- Share-Listing -->

<div id="share_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

        <h3 class="modal-title"><?php esc_html_e('Share Listing','olomo'); ?></h3>

      </div>

      <div class="modal-body">

      	<?php 

		if (function_exists('olomo_sharing')):

			olomo_sharing();

		endif;

		?>

      </div>

    </div>

  </div>

</div>

<!-- /Share-Listing -->

<!-- Send-Message -->

<div id="message_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">

  	<div class="modal-dialog" role="document">

    	<div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

        <h3 class="modal-title"><?php esc_html_e('Send Message','olomo'); ?></h3>

      </div>

      <div class="modal-body">

        <form  method="post" id="contactOwner">

			<?php

            $author_id = '';

            $author_email = '';

            $author_email = get_the_author_meta( 'user_email' );

            $author_id = get_the_author_meta( 'ID' );

            ?>

            <div class="form-group">

                <input type="text" class="form-control" name="name7" id="name7" placeholder="<?php esc_attr_e('Name:','olomo'); ?>">            </div>

            <div class="form-group">

                <input type="email" class="form-control" name="email7" id="email7" placeholder="<?php esc_attr_e('Email:','olomo'); ?>">

            </div>



            <div class="form-group">

                <input type="text" class="form-control" name="phone" id="phone" placeholder="<?php esc_attr_e('Phone:','olomo'); ?>">

            </div>



            <div class="form-group">

                <textarea class="form-control" rows="5" name="message7" id="message7" placeholder="<?php esc_attr_e('Message:','olomo'); ?>"></textarea>

            </div>



            <div class="form-group margin-bottom-0 pos-relative">

                <input type="submit" value="<?php esc_attr_e('Send Message','olomo'); ?>" class="btn btn-block">

                <input type="hidden" value="<?php the_ID(); ?>" name="post_id">

                <input type="hidden" value="<?php echo esc_attr($author_email); ?>" name="author_email">

                <input type="hidden" value="<?php echo esc_attr($author_id); ?>" name="author_id">

                <div class="form_message">

                	<i class="search-icon fa"></i>

            	</div>

            </div>

        </form>

      </div>

    </div>

  </div>

</div>

<!-- /Send-Message -->

<!-- Report -->

<div id="report_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">

  <div class="modal-dialog" role="document">    

  <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

        <h3 class="modal-title"><?php esc_html_e('Report This Listing','olomo'); ?></h3>

        <p><?php esc_html_e('Please indicate what problem has been found!','olomo'); ?></p>

      </div>

      <div class="modal-body">

        <form method="post" id="reportlisting">

          <div class="form-group">

             <div class="radio">

                <input type="radio" name="report_restion" value="Duplicate Listing" id="DuplicateListing" checked>

                <label for="DuplicateListing"><?php esc_html_e('Duplicate Listing','olomo'); ?></label>

             </div>

             <div class="radio">

                <input type="radio" name="report_restion" value="Wrong Contact Info" id="WrongContactInfo">

                <label for="WrongContactInfo"><?php esc_html_e('Wrong Contact Info','olomo'); ?></label>

             </div>

             <div class="radio">

                <input type="radio" name="report_restion" value="Fake Listing" id="FakeListing">

                <label for="FakeListing"><?php esc_html_e('Fake Listing','olomo'); ?></label>

             </div>

             <div class="radio">

                <input type="radio" name="report_restion" value="Other Problem" id="OtherProblem">

                <label for="OtherProblem"><?php esc_html_e('Other Problem','olomo'); ?></label>

             </div>

          </div>

          <div class="form-group">

            <input class="form-control" placeholder="<?php esc_attr_e('Your Email','olomo'); ?>" type="email" name="report_email" id="report_email">

          </div>

          <div class="form-group">

            <textarea rows="4" class="form-control" placeholder="<?php esc_attr_e('Problem Description','olomo'); ?>" name="report_message" id="report_message"></textarea>

          </div>

          <div class="form-group">

            <input value="Submit" class="btn btn-block" type="submit">

            <input type="hidden" value="<?php the_ID(); ?>" name="post_id">

            <input type="hidden" value="<?php echo esc_attr($author_email); ?>" name="author_email">

            <input type="hidden" value="<?php echo esc_attr($author_id); ?>" name="author_id">

            <div class="form_message">

                	<i class="search-icon fa"></i>

              </div>

          </div>

        </form>

      </div>

    </div>

  </div>

</div>

<!-- /Report -->

<!-- Email-to-Friends -->

<div id="email_friends_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

        <h3 class="modal-title"><?php esc_html_e('Email to Friend','olomo'); ?></h3>

      </div>

      <div class="modal-body">

        <form  method="post" id="friendemail">

         <div class="form-group">

            <input class="form-control" placeholder="<?php esc_attr_e('Your Name','olomo'); ?>" type="text" name="yr_name" id="yr_name">

          </div>

          <div class="form-group">

            <input class="form-control" placeholder="<?php esc_attr_e('Your Email Address','olomo'); ?>" type="email" name="y_email" id="y_email">

          </div>

          <div class="form-group">

            <input class="form-control" placeholder="<?php esc_attr_e('Friend Email Address','olomo'); ?>" type="email" name="f_email" id="f_email">

          </div>

          <div class="form-group">

            <textarea rows="4" class="form-control" placeholder="<?php esc_attr_e('Message','olomo'); ?>" name="f_message" id="f_message"></textarea>

          </div>

          <div class="form-group">

            <input value="<?php esc_attr_e('Submit','olomo'); ?>" class="btn btn-block" type="submit">

            <input type="hidden" value="<?php the_ID(); ?>" name="listing_id">

              <div class="form_message">

                	<i class="search-icon fa"></i>

              </div>

          </div>

        </form>

      </div>

    </div>

  </div>

</div>

<!-- /Email-to-Friends -->

<!-- Claim-Listing -->

<div id="claim_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

        <h3 class="modal-title"><?php esc_html_e('Claim Listing','olomo'); ?></h3>

      </div>

      <div class="modal-body">

      	<?php 

		if (is_user_logged_in()){

			?>
            <form  method="post" id="claimlistingmail">
			<?php

            $author_id = '';

            $author_email = '';
			
			$admin_email = get_option( 'admin_email' );
			
            $author_email = get_the_author_meta( 'user_email' );

            $author_id = get_the_author_meta( 'ID' );

            ?>

         <div class="form-group">

            <input class="form-control" placeholder="<?php esc_attr_e('Your Name','olomo'); ?>" type="text" name="c_name" id="c_name">

          </div>

          <div class="form-group">

            <input class="form-control" placeholder="<?php esc_attr_e('Your Email Address','olomo'); ?>" type="email" name="c_email" id="c_email">

          </div>

          <div class="form-group">

            <input class="form-control" placeholder="<?php esc_attr_e('Your Phone','olomo'); ?>" type="text" name="c_phone" id="c_phone">

          </div>

          <div class="form-group">

            <textarea rows="4" class="form-control" placeholder="<?php esc_attr_e('Message','olomo'); ?>" name="c_message" id="c_message"></textarea>

          </div>

          <div class="form-group">

            <input value="<?php esc_attr_e('Submit','olomo'); ?>" class="btn btn-block" type="submit">

            <input type="hidden" value="<?php the_ID(); ?>" name="listing_id">

            <input type="hidden" value="<?php echo esc_attr($author_email); ?>" name="author_email">
            
            <input type="hidden" value="<?php echo esc_attr($admin_email); ?>" name="admin_email">

            <input type="hidden" value="<?php echo esc_attr($author_id); ?>" name="author_id">
              <div class="form_message">

                	<i class="search-icon fa"></i>

              </div>

          </div>

        </form>
            <?php 

		}
		else {
			echo 'Please Login first to claim listing. <a href="'.site_url().'/login/">Click here to login</a>';
		
		//wp_redirect(site_url().'/login/');
			
		}

		?>

      </div>

    </div>

  </div>

</div>