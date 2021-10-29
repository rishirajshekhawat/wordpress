<?php 
/**
 * Footer template for our theme *
 * @package WordPress
 * @subpackage olomo
 * @since olomo 1.5
 */ 
global $olomo_options;
$copy_right = $olomo_options['copy_right'];
$fb = $olomo_options['fb'];
$tw = $olomo_options['tw'];
$gog = $olomo_options['gog'];
$insta = $olomo_options['insta'];
$tumb = $olomo_options['tumb'];
$f_contactemail = $olomo_options['f_contactemail'];
$f_contactno = $olomo_options['f_contactno'];
$footer_half_background_image = $olomo_options['footer_half_background_image']['url'];
$footer_site_short_desc = $olomo_options['footer_site_short_desc'];

?>
<footer id="footer" class="secondary-bg footer_style_4">
	<div class="footer_top">
    	<div class="container-fluid">
            	<div class="row">
                	<div class="col-md-6">
                    	<div class="parallex-bg about_bg" style="background-image:url('<?php echo esc_url($footer_half_background_image); ?>');">
                        	<div class="dark-overlay"></div>
                        	<div class="footer_about div_zindex">
                            	<div class="footer_logo">
                                	<a href="<?php echo esc_url(home_url('/')); ?>"><?php olomo_logo(); ?></a>
                                </div>
                                <p>
                                <?php echo esc_html($footer_site_short_desc);?>
                                </p>
                                <ul class="contact_list"> 
                                 <?php if(!empty($f_contactemail)){ ?>                               	
                                    <li>
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                <span><a href="mailto:<?Php echo esc_attr($f_contactemail); ?>"><?Php echo esc_html($f_contactemail); ?></a></span>
                                    </li>
                                     <?php } ?>
                                      <?php if(!empty($f_contactno)){ ?>
                                    <li>
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <span><?Php echo esc_html($f_contactno); ?></span>
                                    </li> 
                                     <?php } ?>                           
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    	<?php olomo_footer_menu(); ?>
                    </div>
                
            </div>
        </div>
    </div>
  
  <div class="footer_bottom">
    <div class="container">
    	<div class="row">
        	<div class="col-md-6 text-left">
            	<?php 
						if($copy_right):
							echo '<p>'.wp_kses_post($copy_right).'</p>';
						else:
						
						echo '<p>';
						printf( esc_html__('&copy; 2018 %s. Created by', 'olomo'), 'olomo');
						wp_kses_post('<a href="'.esc_url(__('http://webmasterdriver.net/', 'olomo')).'" target="_blank">'.esc_html__( 'WebMasterDriver','olomo').'</a>');
						echo '</p>';
						
						
						 /*echo '<p>'.wp_kses_post(esc_html__('&copy; 2018 olomo. Created by', 'olomo').' <a href="'.esc_url(__('http://webmasterdriver.net/', 'olomo')).'" target="_blank">'.esc_html__( 'WebMasterDriver','olomo').'</a>').'</p>';*/	
						endif;
					?> 
            </div>
            <div class="col-md-6">
            	<div class="follow_us">
         <?php if(!empty($tw) || !empty($gog) || !empty($fb) || !empty($insta) || !empty($tumb)){ ?>
						<ul>
						<?php if(!empty($fb)){ ?>
							<li><a href="<?php echo esc_url($fb); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<?php } ?>
						<?php if(!empty($gog)){ ?>
							<li><a href="<?php echo esc_url($gog); ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<?php } ?>
						<?php if(!empty($tw)){ ?>
							<li><a href="<?php echo esc_url($tw); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<?php } ?>
						<?php if(!empty($insta)){ ?>
							<li><a href="<?php echo esc_url($insta); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<?php } ?>
						<?php if(!empty($tumb)){ ?>
							<li> <a href="<?php echo esc_url($tumb); ?>" target="_blank"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
						<?php } ?>
						</ul>
					<?php } ?>
                </div>
            </div>
        </div>
      
    </div>
    
  </div>
</footer>