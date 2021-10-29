<?php 
/**

 * functions hooks

 * @package WordPress

 * @subpackage carforyou

 * @since carforyou 2.5

 */
function carforyou_footer() {?>
<footer>
<?php  if(is_active_sidebar('carforyou_footer')): ?>
	  <div class="footer-top">
    <div class="container">
      <div class="row">
        <?php dynamic_sidebar( 'carforyou_footer'); ?>
      </div>
    </div>
  </div>
<?php endif;?>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-push-6 text-right">
          <?php $footer_our_apps = carforyou_get_option('footer_our_apps'); 
			if($footer_our_apps=='1'): ?>
              <div class="footer_widget">
                <?php $our_app = carforyou_get_option('our_app');
    
                    if(!empty($our_app)) : ?>
                <p><?php echo esc_html($our_app); ?></p>
                <?php endif; ?>
                <ul>
                  <?php $app_icon_1= carforyou_get_option('fan_fact_icon3');
    
                        if(!empty($app_icon_1)) : ?>
                  <?php $our_appurl_1 = carforyou_get_option('our_appurl_1'); ?>
                  <li><a href="<?php echo esc_url($our_appurl_1); ?>"><i class="<?php echo esc_html($app_icon_1); ?>" aria-hidden="true"></i></a></li>
                  <?php endif; ?>
                  <?php $app_icon_2= carforyou_get_option('fan_fact_icon4');
    
                        if(!empty($app_icon_2)) : ?>
                  <?php $our_appurl_2 = carforyou_get_option('our_appurl_2'); ?>
                  <li><a href="<?php echo esc_url($our_appurl_2); ?>"><i class="<?php echo esc_html($app_icon_2); ?>" aria-hidden="true"></i></a></li>
                  <?php endif; ?>
                </ul>
              </div>
          <?php endif; 

             $connect_with_us_enable = carforyou_get_option('connect_with_us_enable'); 

			if($connect_with_us_enable=='1'): ?>
                  <div class="footer_widget">
                    <?php $connect_with_us_text = carforyou_get_option('connect_with_us_text');
        
                        if(!empty($connect_with_us_text)) : ?>
                    <p><?php echo esc_html($connect_with_us_text); ?></p>
                    <?php endif; ?>
                    <ul>
                      <?php 
                            $facebook_link = carforyou_get_option('footer_facebook_link');
                            if(!empty($facebook_link)) : ?>
                              <li><a href="<?php echo esc_url($facebook_link); ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                          <?php endif; 
                            $twitter_link = carforyou_get_option('footer_twitter_link');
                            if(!empty($twitter_link)) : ?>
                              <li><a href="<?php echo esc_url($twitter_link); ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                      <?php endif;
        
                            $linkedin_link = carforyou_get_option('footer_linkedin_link');
                            if(!empty($linkedin_link)) : ?>
                              <li><a href="<?php echo esc_url($linkedin_link); ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                      <?php endif;
                            $instagram_link = carforyou_get_option('footer_Instagram_link');
                            if(!empty($instagram_link)) : ?>
                              <li><a href="<?php echo esc_url($instagram_link); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                      <?php endif;
                            $google_link = carforyou_get_option('footer_google_link');
                            if(!empty($google_link)) : ?>
                              <li><a href="<?php echo esc_url($google_link); ?>"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                      <?php endif; 
                            $pinterese_link = carforyou_get_option('footer_pinterest_link');
                            if(!empty($pinterese_link)) : ?>
                              <li><a href="<?php echo esc_url($pinterese_link); ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                      <?php endif; ?>
                    </ul>
                  </div>
          <?php endif; ?>
        </div>
        <?php $copyrights_enable = carforyou_get_option('copyrights_enable'); 
			if($copyrights_enable=='1'|| $copyrights_enable==''): ?>
        <div class="col-md-6 col-md-pull-6">
          <p class="copy-right">
			<?php $copyrights = carforyou_get_option('footer_copyrights');
            if(!empty($copyrights)) : 
                    echo wp_kses_post($copyrights); 
			else:
				echo esc_html('Proudly powered by CarForYou', 'carforyou' );		
            endif; ?>
          </p>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer>
<?php }
