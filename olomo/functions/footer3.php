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
$footer_full_background_image = $olomo_options['footer_full_background_image']['url'];
?>
<footer id="footer" class="parallex-bg footer_style_3" style="background-image:url('<?php echo esc_url($footer_full_background_image); ?>');">
	<div class="dark-overlay"></div>
    	<div class="container">
        	<div class="row">
            	<div class="col-md-3">
                	 <?php olomo_footer_menu(); ?>
                </div>
                <div class="col-md-4">
                	<div class="footer_widgets">
                    	<div class="footer_contact">
                        	<ul>
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
                <div class="col-md-4 col-md-offset-1">
                	<div class="footer_widgets">
                     <?php $enable_newsletter= $olomo_options['enable_f_newsletter'];
		           if($enable_newsletter=='1'): ?>
                       <?php  echo do_shortcode($olomo_options['f_newsletter']); ?>
                       <?php endif; ?> 
                        
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
   
	
    
    <div class="footer_bottom">
    	<div class="container">
        	<div class="row">            	
                <div class="col-md-12">
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
            </div>
        </div>
    </div>
</footer>