<?php
/**
 * Template name: Log In / Sign Up Page
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 */
get_header(); 
global $olomo_options;
?>
<script type="text/javascript">
    function IsTermChecked() {
        if (!$("input:checkbox").is(":checked")) {
            alert("You must agree to the terms of service.");
            return false;
        }
        else
            return true;
    }

</script>
<?php 
if(!is_user_logged_in()){?>
<section class="primary-bg">
  <div class="container">
    <div id="login_signup">
      <div class="form_wrap_m">
        <div class="white_box">
          <div class="siginincontainer">
            <h3> <?php esc_html_e('Hey, Welcome Back!','olomo'); ?></h3>
            <form id="login" action="" method="get">
              <p class="status"></p>
              <div class="form-group">
                <input type="text" class="form-control" id="username" name="username" placeholder="<?php esc_attr_e('Username','olomo'); ?>"/>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="<?php esc_attr_e('Password','olomo'); ?>">
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-block" value="<?php esc_attr_e('Login','olomo'); ?>">
              </div>
              <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
            </form>
            <p><?php esc_html_e('Do not have an account?','olomo'); ?> <a class="signUpClick"><?php esc_html_e('Signup Here','olomo'); ?></a></p>
            <p><a class="forgetPasswordClick" ><?php esc_html_e('Lost your password?','olomo'); ?></a></p>
            <div class="back_home"><a class="btn outline-btn btn-sm" href="<?php echo esc_url(home_url('/'));?>"><i class="fa fa-angle-double-left"></i> <?php esc_html_e('Back to Home','olomo'); ?></a></div>
          </div>
          <div class="siginupcontainer">
            <h1 class="text-center">
              <?php esc_html_e('Sign Up','olomo'); ?>
            </h1>
            <form id="register"  method="post">
              <p class="status"></p>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="<?php esc_attr_e('Username','olomo'); ?>" id="username2" name="username">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="<?php esc_attr_e('Email Address','olomo'); ?>" id="email" name="email" >
              </div>
			  <div class="form-group">
				<span class="tandc"><input type="checkbox" class="form-control" id="term-condition" name="terms" >I agree to the <a href="<?php echo $olomo_options['term-condition']; ?>" target="_blank">Terms & conditions.</a></span>
			  </div>
              <div class="form-group">
                <input type="submit" class="btn btn-block" value="<?php esc_attr_e('Sign Up','olomo'); ?>" onclick="return IsTermChecked();">
              </div>
              <?php wp_nonce_field( 'ajax-register-nonce', 'security2' ); ?>
            </form>
            <p><?php esc_html_e('Already have an account?','olomo'); ?> <a class="signInClick" ><?php esc_html_e('Sign In','olomo'); ?></a></p>
            <p><a  class="forgetPasswordClick"><?php esc_html_e('Lost your password?','olomo'); ?></a></p>
            <div class="back_home"><a class="btn outline-btn btn-sm" href="<?php echo esc_url(home_url('/'));?>"><i class="fa fa-angle-double-left"></i><?php esc_html_e('Back to Home','olomo'); ?> </a></div>
          </div>
          <div class="forgetpasswordcontainer">
            <h3>
              <?php esc_html_e('Forgot Password','olomo'); ?>
            </h3>
            <form id="forget_pass_form" method="post">
              <p class="status"></p>
              <div class="form-group">
                <input type="email" class="form-control" id="email3"  name="user_login" placeholder="<?php esc_attr_e('Email Address','olomo'); ?>">
              </div>
              <div class="form-group">
                <input type="submit" name="submit"  class="btn btn-block"  value="<?php esc_attr_e('Get New Password','olomo'); ?>" />
              </div>
              <?php wp_nonce_field( 'ajax-forgetpass-nonce', 'security3' ); ?>
            </form>
            <p><a class="cancelClick">
              <?php esc_html_e('Cancel','olomo'); ?>
              </a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
}else{
wp_redirect(esc_url(home_url('/')));
exit();
}
get_footer();