<?php
global $olomo_options;
$authorURL = $olomo_options['listing-author'];
 ?>

<div id="titlebar">
  <div class="row">
    <div class="col-md-12">
      <h2>
        <?php esc_html_e('Update Profile','olomo'); ?>
      </h2>
      <!-- Breadcrumbs -->
      <nav id="breadcrumbs">
        <ul>
          <li><a href="<?php echo esc_url(home_url('/')); ?>">
            <?php esc_html_e('Home','olomo'); ?>
            </a></li>
          <li><a href="<?php echo esc_url($authorURL); ?>">
            <?php esc_html_e('Dashboard','olomo'); ?>
            </a></li>
          <li>
            <?php esc_html_e('My Profile','olomo'); ?>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>
<div class="tab-pane fade in active" id="updateprofile">
  <?php
	global $olomo_options;
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

			$message = "Your profile updated successfully.";
			$mType = 'alert-success';

			$first = sanitize_text_field($_POST['first_name']);
			$last = sanitize_text_field($_POST['last_name']);
			$email = sanitize_text_field($_POST['email']);
			$user_phone = sanitize_text_field($_POST['phone']);
			$user_address = sanitize_text_field($_POST['address']);
			$description = sanitize_text_field($_POST['desc']);

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
			
			$your_image_url = sanitize_text_field($_POST['your_author_image_url']);
			$author_avatar_url = get_user_meta($user_ID, "olomo_author_img_url", true); 
			if($your_image_url != ''){
				update_user_meta( $user_ID, 'olomo_author_img_url', $your_image_url );
			}else{
				update_user_meta( $user_ID, 'olomo_author_img_url', $author_avatar_url );
			}

			if(isset($email) && is_email($email)) {
				wp_update_user( array ('ID' => $user_ID, 'user_email' => $email) ) ;
			}else { 
				$message = __('Please enter a valid email id.', 'olomo');
				$mType = __('alert-danger', 'olomo');
			}

			if($password) {
				if (strlen($password) < 5 || strlen($password) > 15) {
					$message = __('Password must be 5 to 15 characters in length', 'olomo');
					$mType = __('alert-danger', 'olomo');
				}
				elseif(isset($password) && $password != $confirm_password) {
					$message = __('Password Mismatch' , 'olomo');
					$mType = __('alert-danger', 'olomo');
				} elseif ( isset($password) && !empty($password) ) {
					$update = wp_set_password( $password, $user_ID );
					$message = __('Your profile updated successfully.', 'olomo');
					$mType = __('success','olomo');
				}
			}
			$updateTab = true;
		}
	}
?>
  <div class="dashboard-list-box margin-top-0">
    <div class="updateprofile-tab">
      <div class="updateprofile-tab">
        <?php if(isset($message) && !empty($message)){ ?>
        <div class="alert <?php echo esc_attr($mType); ?> clearfix">
          <div class="noti-icon"> </div>
          <p><?php echo esc_html($message); ?></p>
        </div>
        <?php } ?>
        <h4>
          <?php esc_html_e('Edit Profile', 'olomo'); ?>
        </h4>
        <form class="form-horizontal form_dashboard" id="profileupdate" action="" method="POST" enctype="multipart/form-data">
          <div class="user-avatar-upload border-bottom page-innner-container padding_4x4_30">
            <div class="user-avatar_top">
              <div class="user-avatar-preview avatar-circle"> <img class="author-avatar" src="<?php echo olomo_author_image(); ?>" /> </div>
              <div class="user-avatar-heading">
                <p class="paragraph-form">
                  <?php  esc_html_e('Update your photo manually.', 'olomo'); ?>
                  <br>
                </p>
                <div class="user-avatar-description">
                  <div class="upload-photo margin-top-25"> <span class="file-input file-upload-btn btn-first-hover btn-file outline-btn">
                    <?php  esc_html_e('Edit Image', 'olomo'); ?>
                    <input class="upload-author-image" type="file" accept="image/*" />
                    </span>
                    <input class="criteria-image-url" id="your_image_url" type="text" size="36" name="your_author_image_url" style="display: none;" value="<?php if (isset($your_image_url)){ echo esc_attr($your_image_url); } ?>" />
                    <input class="criteria-image-id" id="your_image_id" type="text" size="36" name="your_author_image_id" style="display: none;" value="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="clear"></div>
          <div class="page-innner-container padding_4x4_30">
            <div class="form-group">
              <div class="col-sm-6">
                <label for="Fname">
                  <?php  esc_html_e('First Name', 'olomo'); ?>
                  *</label>
                <input value="<?php echo esc_attr($user_fname); ?>" type="text" class="form-control" name="first_name" id="Fname" placeholder="First Name" />
              </div>
              <div class="col-sm-6">
                <label for="Lname">
                  <?php esc_html_e('Last Name', 'olomo'); ?>
                  *</label>
                <input value="<?php echo esc_attr($user_lname); ?>" type="text" class="form-control" name="last_name" id="Lname" placeholder="Last Name" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
                <label for="email">
                  <?php  esc_html_e('Email', 'olomo'); ?>
                  *</label>
                <input value="<?php echo esc_attr($user_email); ?>" type="email" class="form-control" name="email" id="email" placeholder="<?php esc_attr_e('Email Id','olomo'); ?>" />
              </div>
              <div class="col-sm-6">
                <label for="phone">
                  <?php  esc_html_e('Phone', 'olomo'); ?>
                  *</label>
                <input value="<?php echo esc_attr($user_phone); ?>" type="text" class="form-control" name="phone" id="phone" placeholder="+00-1111-0000" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label for="about">
                  <?php esc_html_e('Address', 'olomo'); ?>
                </label>
                <textarea  class="form-control" name="address" id="about" rows="3" placeholder="<?php esc_attr_e('Address','olomo'); ?>"><?php echo esc_html($user_address); ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label for="about">
                  <?php esc_html_e('Biographical', 'olomo'); ?>
                </label>
                <textarea  class="form-control" name="desc" id="about" rows="8" placeholder="<?php esc_attr_e('Biographical Info','olomo'); ?>"><?php echo esc_html($user_desc); ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
                <label for="facebook">
                  <?php esc_html_e('Facebook', 'olomo'); ?>
                </label>
                <input value="<?php echo esc_attr($user_facebook); ?>" type="text" class="form-control" name="facebook" id="facebook" placeholder="<?php esc_attr_e('Facebook Url','olomo'); ?>" />
              </div>
              <div class="col-sm-6">
                <label for="twitter">
                  <?php esc_html_e('Twitter', 'olomo'); ?>
                </label>
                <input value="<?php echo esc_attr($user_twitter); ?>" type="text" class="form-control" name="twitter" id="twitter" placeholder="<?php esc_attr_e('Twitter Url','olomo'); ?>" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
                <label for="linkedin">
                  <?php esc_html_e('Linkedin', 'olomo'); ?>
                </label>
                <input value="<?php echo esc_attr($user_linkedin); ?>" type="text" class="form-control" name="linkedin" id="linkedin" placeholder="<?php esc_attr_e('Linkedin Url','olomo'); ?>" />
              </div>
              <div class="col-sm-6">
                <label for="google">
                  <?php esc_html_e('Google', 'olomo'); ?>
                </label>
                <input value="<?php echo esc_attr($user_google); ?>" type="text" class="form-control" name="google" id="google" placeholder="<?php esc_attr_e('Profile Url','olomo'); ?>" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
                <label for="instagram">
                  <?php esc_html_e('Instagram', 'olomo'); ?>
                </label>
                <input value="<?php echo esc_attr($user_instagram); ?>" type="text" class="form-control" name="instagram" id="instagram" placeholder="<?php esc_attr_e('Instagram Url','olomo'); ?>" />
              </div>
              <div class="col-sm-6">
                <label for="pinterest">
                  <?php  esc_html_e('Pinterest', 'olomo'); ?>
                </label>
                <input value="<?php echo esc_attr($user_pinterest); ?>" type="text" class="form-control" name="pinterest" id="pinterest" placeholder="<?php esc_attr_e('Pinterest Url','olomo'); ?>" />
              </div>
            </div>
          </div>
          <h4>
            <?php esc_html_e('Update Password', 'olomo'); ?>
          </h4>
          <div class="page-innner-container padding_4x4_30">
            <div class="form-group">
              <div class="col-sm-6">
                <label for="npassword">
                  <?php  esc_html_e('New Password', 'olomo'); ?>
                </label>
                <input type="password" class="form-control" name="pwd" id="npassword" placeholder="<?php esc_attr_e('New Password','olomo'); ?>" />
              </div>
              <div class="col-sm-6">
                <label for="rnpassword">
                  <?php esc_html_e('Confirm Password', 'olomo'); ?>
                </label>
                <input type="password" class="form-control" name="confirm" id="rnpassword" placeholder="<?php esc_attr_e('Confirm Password','olomo'); ?>" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <input type="submit" name="profileupdate" value="<?php esc_attr_e('Update Profile', 'olomo'); ?>" class="btn" />
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--updateprofile-->