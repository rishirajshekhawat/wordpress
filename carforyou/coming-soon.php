<?php
/**
 *Template Name: Coming Soon
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 2.5
 */
/**
Call header using WordPress function  
*/
get_header();?>
<div class="coming_soon_wrap div_zindex white-text"> 
  <!--Header-->
  <header class="navbar-fixed-top">
    <div class="default-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-md-2">
            <div class="logo">
              <?php 
               $site_logo =  carforyou_get_option( 'site_logo' );
               $site_name = esc_html(get_bloginfo('name', 'display'));
                if($site_logo['url']):
                    echo '<a  href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home" ><img src="'.esc_url($site_logo['url']).'" alt="image"></a>';
                else:
                    echo '<a  href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home" >'.esc_html($site_name).'</a>';
                endif;
              ?>
            </div>
          </div>
          <div class="col-sm-9 col-md-10">
            <div class="send_msg">
              <button type="button" class="btn" data-toggle="modal" data-target="#contact_form_popup">
              <?php esc_html_e('Send Message','carforyou'); ?>
              <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span> </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--/Header-->
<?php while ( have_posts() ) : the_post(); ?>
<section class="coming_soon_content">
<div class="container">
  <div class="row">
    <?php the_content();?>
  </div>
</div>
</section>
<?php endwhile; ?>
<!--Footer-->

  <footer class="coming-soon-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-push-6">
          <div class="footer_widget">
            <ul>
              <?php 

	      	 $facebook_link = carforyou_get_option('footer_facebook_link');

			if(!empty($facebook_link)) : ?>
              <li><a href="<?php echo esc_url($facebook_link); ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
              <?php endif; ?>
              <?php $twitter_link = carforyou_get_option('footer_twitter_link');

			if(!empty($twitter_link)) : ?>
              <li><a href="<?php echo esc_url($twitter_link); ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
              <?php endif; ?>
              <?php $linkedin_link = carforyou_get_option('footer_linkedin_link');

			if(!empty($linkedin_link)) : ?>
              <li><a href="<?php echo esc_url($linkedin_link); ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
              <?php endif; ?>
              <?php $instagram_link = carforyou_get_option('footer_Instagram_link');

			if(!empty($instagram_link)) : ?>
              <li><a href="<?php echo esc_url($instagram_link); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              <?php endif; ?>
              <?php $google_link = carforyou_get_option('footer_google_link');

			if(!empty($google_link)) : ?>
              <li><a href="<?php echo esc_url($google_link); ?>"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
              <?php endif; ?>
              <?php $pinterese_link = carforyou_get_option('footer_pinterest_link');

			if(!empty($pinterese_link)) : ?>
              <li><a href="<?php echo esc_url($pinterese_link); ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-md-pull-6">
          <p class="copy-right">
            <?php $copyrights = carforyou_get_option('footer_copyrights');
			if(!empty($copyrights)) : ?>
            <?php echo wp_kses_post($copyrights); ?>
            <?php endif; ?>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!--/Footer--> 
</div>
<?php
function carforyou_soon_bg(){
$coming_soon_bg =  carforyou_get_option( 'coming_soon_bg' );
if(!empty($coming_soon_bg['url'])):
 $bgimg= $coming_soon_bg['url'];
	echo  esc_url($bgimg);
endif;
}
?>

<div class="coming_soon_bg" style="background:url(<?php carforyou_soon_bg();?>)">
  <div class="dark-overlay"></div>
</div>
<!-- Coontact-Form -->
<?php $shortcode_form = carforyou_get_option('shortcode_form1');
if(!empty($shortcode_form)) : ?>
<div class="modal fade" id="contact_form_popup">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php 
            $form_heading = carforyou_get_option('form_heading');
            if(!empty($form_heading)) : ?>
        <h3>
          <?php  echo esc_html($form_heading);?>
        </h3>
        <?php endif; ?>
      </div>
      <div class="modal-body"> <?php echo do_shortcode($shortcode_form); ?> </div>
    </div>
  </div>
</div>
<?php endif; ?>
<!-- /Coontact-Form -->
<?php
if(function_exists('carforyou_countdown_timer')):	
	carforyou_countdown_timer();
endif; 
get_footer();
