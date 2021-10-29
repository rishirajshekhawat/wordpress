<?php

/* The loop starts here. */

global $olomo_options;

if (have_posts()){

	while (have_posts()) {

		the_post(); 

		$claimed_section = listing_get_metabox('claimed_section');

		$tagline_text = listing_get_metabox('tagline_text');

		

		$plan_id = listing_get_metabox_by_ID('Plan_id',get_the_ID());

		if(!empty($plan_id)){

			$plan_id = $plan_id;

		}else{

			$plan_id = 'none';

		}

		

		$contact_show = get_post_meta( $plan_id, 'contact_show', true );

		$map_show = get_post_meta( $plan_id, 'map_show', true );

		$video_show = get_post_meta( $plan_id, 'video_show', true );

		$gallery_show = get_post_meta( $plan_id, 'gallery_show', true );

		

		if($plan_id=="none"){

			$contact_show = 'true';

			$map_show = 'true';

			$video_show = 'true';

			$gallery_show = 'true';

		}

		$claim = '';

		if($claimed_section == 'claimed') {

			$claim = '<span class="claimed"><i class="fa fa-check"></i> '. esc_html__('Claimed', 'olomo').'</span>';		

			}elseif($claimed_section == 'not_claimed') {

			$claim = '';		

			}

		global $post;

		

		$resurva_url = get_post_meta($post->ID, 'resurva_url', true);

		$menuOption = false;

		$menuTitle = '';

		$menuImg = '';

		$menuMeta = get_post_meta($post->ID, 'menu_listing', true);

		if(!empty($menuMeta)){

			$menuTitle = $menuMeta['menu-title'];

			$menuImg = $menuMeta['menu-img'];

			$menuOption = true;

		}

		

		$timekit = false;

		$timekit_booking = get_post_meta($post->ID, 'timekit_booking', true);

		if(!empty($timekit_booking)){

			$timekitAPP = $timekit_booking['timekit-app'];

			$timekitAPI = $timekit_booking['timekit-api-token'];

			$timekitListing = $timekit_booking['listing_id'];

			$timekitName = $timekit_booking['timekit_name'];

			$timekitEmail = $timekit_booking['timekit_email'];

			$timekit = true;

		}

		

// BG Image

$bgImage=null;

$bgImage=$olomo_options['single_listing_banner']['url'];		

?>

<section class="listing-second-view">

    <!-- Listing-detail-Header -->

    <section class="listing_detail_header style2_header parallex-bg" style="background-image:url(<?php echo esc_url($bgImage); ?>)">

        <div class="container">

            <div class="div_zindex white-text">

                <div class="row">

                    <div class="col-md-8">

                        <h1><?php the_title(); ?> <?php echo esc_html($claim); ?></h1>

                        <?php if(!empty($tagline_text)) { ?>

                            <p><?php echo esc_html($tagline_text); ?></p>

                        <?php } ?>

                        <div class="listing_rating">

                            <p> 

                                <?php

                                $NumberRating = olomo_ratings_numbers($post->ID);

                                if($NumberRating != 0){

                                    echo cal_listing_rate(get_the_ID());											

                                ?>

                                <?php echo esc_html($NumberRating); ?>

                                (<?php echo esc_html__('Reviews', 'olomo'); ?>)

                                <?php		

                                }else{

                                    echo cal_listing_rate(get_the_ID());

                                }

                                ?>

                            </p>

                            <p class="listing_like"><?php olomo_listinglikes(); ?></p>

                            

                            <p class="listing_favorites">

                            <a class="email-address add-to-fav" data-post-type="detail" href="" data-post-id="<?php echo get_the_ID(); ?>" data-success-text="Saved">

                                <i class="fa <?php echo olomo_is_favourite(get_the_ID(),$onlyicon=true); ?>"></i><?php esc_html_e('Add to favorites','olomo'); ?></a>

                            </p>   

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="pricing_info">

                            <?php echo olomo_price_dynesty(get_the_ID()); ?>

                            <?php $leadForm = $olomo_options['lead_form_switch'];

                                  if($leadForm=="1"){?>   

                                    <div class="listing_message"><a class="btn" data-toggle="modal" data-target="#message_modal"><i class="fa fa-envelope-o"></i> <?php esc_html_e('Send Message','olomo'); ?></a></div>

                            <?php } ?> 

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="dark-overlay"></div>

    </section>

    <!-- /Listing-detail-Header -->

    <!-- Listings -->

    <section class="listing_info_wrap listing_detail_2">

        <div class="container">

            <div class="sidebar_wrap listing_action_btn">

                <ul>

                    <li><a data-toggle="modal" data-target="#share_modal"><i class="fa fa-share-alt"></i> <?php esc_html_e('Share This','olomo'); ?></a></li>

                    <li><a data-toggle="modal" data-target="#email_friends_modal"><i class="fa fa-envelope-o"></i> <?php esc_html_e('Email to Friends','olomo'); ?></a></li>

                    <li><a href="#writereview" class="target-scroll"> <i class="fa fa-star"></i> <?php esc_html_e('Write a Review','olomo'); ?></a></li>

                    <li><a data-toggle="modal" data-target="#report_modal"><i class="fa fa-exclamation-triangle"></i> <?php esc_html_e('Report','olomo'); ?></a></li>

                </ul>

            </div>

           

            <div class="image_slider_wrap">

                <div id="listing_img_slider">

                    <div class="owl-carousel owl-theme">

                    <?php 

                        $IDs = get_post_meta( $post->ID, 'gallery_image_ids', true );

                        if($gallery_show=="true"){

                            if(!empty($IDs)){	

                                $imgIDs = explode(',',$IDs);

                                $numImages = count($imgIDs);

                                if($numImages){

                                    $imgSize = 'olomo-listing-gallery';

                                    foreach($imgIDs as $imgID){

                                        $imgurl = wp_get_attachment_image_src( $imgID, $imgSize);

                                        $imgSrc = $imgurl[0];	

                                        $imgFull = wp_get_attachment_image_src( $imgID, 'full');

                                        if(!empty($imgurl[0])){

                                            echo '

                                            <div class="item">

                                                <a href="'. esc_url($imgFull[0]) .'" rel="prettyPhoto[gallery1]" class="cursorimage">

                                                    <img src="'. esc_url($imgSrc) .'" />

                                                </a>

                                            </div>';

                                        }

                                    }

                              } 

                            }

                        }

                        // Featured Image

                        $imgurl = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'olomo-listing-gallery');

                        $imgSrc = $imgurl[0];	

                        $imgFull = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');

                        if(!empty($imgurl[0])){

                            echo '

                            <div class="item">

                                <a href="'. esc_url($imgFull[0]) .'" rel="prettyPhoto[gallery1]" class="cursorimage">

                                    <img src="'. esc_url($imgSrc) .'"/>


                                </a>

                            </div>';

                        }

                        ?>                           

                    </div>   

                </div>

				<?php  

                $latitude = listing_get_metabox('latitude');

                $longitude = listing_get_metabox('longitude');

                if(!empty($latitude) && !empty($longitude)){

                   if($map_show=="true"){ ?>

                    <div class="view_map">

                    <a href="#single_map_m" class="js-target-scroll"><i class="fa fa-map-marker"></i></a>

                </div>

                <?php 

                   } 

                }?>

            </div> 

                           

            <div class="row">

                <div class="col-md-8">

                    <div class="olomo_detail">

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                          <div class="panel panel-default">

                            <div class="panel-heading" role="tab" id="headingOne">

                              <h4 class="panel-title">

                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#description" aria-expanded="true" aria-controls="collapseOne">

                                 <i class="fa  fa-file-text-o"></i> <?php esc_html_e('Listing Description','olomo'); ?></a>

                                </a>

                              </h4>

                            </div>

             <div id="description" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">

                              <div class="panel-body">

                                    <?php  the_content(); ?>

                              </div>

                            </div>

                          </div>

						  <?php

                            $terms = get_the_terms(get_the_ID(), 'features');

                            if(!empty($terms)){?>

                            <div class="panel panel-default">

                            <div class="panel-heading" role="tab" id="headingTwo">

                              <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#amenities" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-align-left"></i> <?php esc_html_e('Amenities','olomo'); ?></a> </h4>

                            </div>

                            <div id="amenities" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">

                              <div class="panel-body">

                                <ul>

                                    <?php foreach ($terms as $term){

										 $url = get_term_link($term->slug, 'features');

										 ?>

                                        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> <?php print "<a href='{$url}'>{$term->name}</a>"; ?></li>

                                    <?php  } ?>

                                </ul>

                              </div>

                            </div>

                            </div>

                          <?php } ?>

                          <?php  

						    $timezone=null;

                            $buisness_hours = listing_get_metabox('business_hours');

                            if(!empty($buisness_hours)){ ?>

                                <div class="panel panel-default">

                                <div class="panel-heading" role="tab" id="headingThree">

                                <h4 class="panel-title">

                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#opening_hours" aria-expanded="false" aria-controls="collapseThree"> <i class="fa fa-calendar-check-o"></i> <?php esc_html_e('Opening Time','olomo'); ?></a>

                              </h4>

                            </div>

                                <div id="opening_hours" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">

                                <div class="panel-body">

                                    <div class="list-opening-m">

                                    <?php

                                            $time = gmdate("H:i", time() + 3600*($timezone+date("I"))); 

                                            $day =  gmdate("l"); 

                                            $lang = get_locale();

                                            setlocale(LC_ALL, $lang.'.utf-8');

                                            $day = strftime("%A");

                                            $time = strtotime($time);

                                            echo '<ul>';

                                            $dayName = esc_html__('Today','olomo');

                                            foreach($buisness_hours as $key=>$value){

                                                $keyArray[] = $key;

                                                if($day == $key){

                                                    $open = $value['open'];

                                                    $open = str_replace(' ', '', $open);

                                                    $close = $value['close'];

                                                    $close = str_replace(' ', '', $close);

                                                    $open = strtotime($open);

                                                    $close = strtotime($close);

                                                    $newTimeOpen = date('h:i A', $open);

                                                    $newTimeClose = date('h:i A', $close);

                                                    echo '<li class="today-timing clearfix"><span class="hours_title"><i class="fa fa-clock-o"></i>'.esc_html($dayName).'</span>';

                                                        if($time > $open && $time < $close){

                                                            echo '<a class="Opened">'.esc_html__('Now Open ','olomo').'</a>';

                                                        }else{

                                                            echo '<a class="closed">'.esc_html__('Closed Today','olomo').'</a>';

                                                        }								

                                                    echo '<span>'.esc_html($newTimeOpen).' - '.esc_html($newTimeClose).'</span></li>';

                                                }

                                            }

                                            if(is_array($keyArray) && !in_array($day, $keyArray)){

                                                echo '<li class=""><span class="hours_title"><i class="fa fa-clock-o"></i>'.esc_html($dayName).'</span>';

                                                echo '<span><a class="closed dayoff">'.esc_html__('Now Closed','olomo').'</a></span></li>';

                                            }

                                            foreach($buisness_hours as $key=>$value){

                                                $dayName = $key;

                                                $open = $value['open'];

                                                $open = str_replace(' ', '', $open);

                                                $close = $value['close'];

                                                $close = str_replace(' ', '', $close);

                                                $open = strtotime($open);

                                                $close = strtotime($close);

                                                $newTimeOpen = date('h:i A', $open);

                                                $newTimeClose = date('h:i A', $close);

                                                echo '<li><span class="hours_title"><i class="fa fa-clock-o"></i>'.esc_html($dayName).'</span>';

                                                echo '<span>'.esc_html($newTimeOpen).' - '.esc_html($newTimeClose).'</span></li>';

                                            }

                                            echo '</ul>';

                                    ?>

                                </div>

                              </div>

                            </div>

                          </div> 

                          <?php } ?>

<?php $repeatable_fields = get_post_meta(get_the_ID(), 'services', true);
if($repeatable_fields){ ?>

<div class="panel panel-default">

                                <div class="panel-heading" role="tab" id="headingService">

                                <h4 class="panel-title">

                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#listing_service" aria-expanded="false" aria-controls="collapseService"> <i class="fa fa-plus-square" aria-hidden="true"></i> <?php esc_html_e('Services','olomo'); ?></a>

                              </h4>

                            </div>

                                <div id="listing_service" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingService">

                                <div class="panel-body">

                                    <div class="list-opening-m">

                                   <div class="pay_services">
							<?php 
	  	foreach ( $repeatable_fields as $field ) { ?>
                                <div class="servicesbox row">
                               <div class="servicename col-xs-4">
                                 <?php echo $field["service_title"]; ?> 
                                </div>
                                <div class="service_price text-center col-xs-4">
                                <span><b>$<?php  echo $field['service_fee']; ?></b></span>
                                </div>
                                
                                <div class="serviceprice text-right col-xs-4">
                                <?php // echo $field['service_fee']; 
									$checkout = $olomo_options['payment-checkout'];
									$checkout_url = get_permalink( $checkout );
									if ($wp_rewrite->permalink_structure == ''){
								//we are using ?page_id
								$checkout_url = $checkout_url."&post=".get_the_ID()."&service_name=".$field["service_title"]."&service_price=".$field["service_fee"];
								}else{
								//we are using permalinks
								$checkout_url = $checkout_url."?post=".get_the_ID()."&service_name=".$field["service_title"]."&service_price=".$field["service_fee"];
								}
								 $paypal_api_environment = $olomo_options['paypal_api'];
      $paypal_success = $olomo_options['payment_success'];
	  $paypal_success = get_permalink($paypal_success);
      $paypal_fail = $olomo_options['payment_fail'];
      $paypal_fail = get_permalink($paypal_fail);
      $paypal_api_username = $olomo_options['paypal_api_username'];
      $paypal_api_password = $olomo_options['paypal_api_password'];
      $paypal_api_signature = $olomo_options['paypal_api_signature'];
      $user_id = get_current_user_id();

	
									?>
                                    <?php if(is_user_logged_in()) { echo do_shortcode('[wp_paypal button="buynow" postid="'.get_the_ID().'" name="'.$field["service_title"].' postid - '. get_the_ID().' user_id - '.$user_id.'" amount="'.$field['service_fee'].'" return="'.$paypal_success.'"]'); } else { echo '<a href="'.site_url().'/login" class="login_book_now" target="_blank">Book Now</a>'; } ?>

                                 <!--  <a href="<?php //echo esc_url($checkout_url);  ?>" class=""><?php //echo esc_html__('Book Now','olomo'); ?></a>-->
									
                                </div>
                                
                                </div>
		<?php }  ?>
                            </div>
                                </div>

                              </div>

                            </div>

                          </div>
                          <?php } ?>
                          <?php 

                            $lat = listing_get_metabox('latitude');

                            $long = listing_get_metabox('longitude');

                            $timezone = getClosestTimezone($lat, $long);

                                                                  

                            $latitude = listing_get_metabox('latitude');

                            $longitude = listing_get_metabox('longitude');

                            if(!empty($latitude) && !empty($longitude)){

                               if($map_show=="true"){?>

                                  <a class="md-trigger parimary-link singlebigmaptrigger" data-lat="<?php echo esc_attr($latitude); ?>" data-lan="<?php echo esc_attr($longitude); ?>" data-modal="modal-4" ></a>

                                  <div  id="single_map_m" class="panel panel-default">

                                        <div class="panel-heading" role="tab" >

                                            <h4 class="panel-title">

                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#map_view" aria-expanded="true"> <i class="fa fa-map"></i> <?php esc_html_e('View Map','olomo'); ?></a>

                                            </h4>

                                        </div>

                                        <div id="map_view" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">

                                            <div class="panel-body">

                                                <div class="map-directions">

                                                    <a href="https://www.google.com/maps?daddr=<?php echo esc_attr($latitude); ?>,<?php echo esc_attr($longitude); ?>" target="_blank" ><i class="fa fa-map-o"></i><?php echo esc_html__('Get Directions', 'olomo'); ?></a>

                                                </div>

                                                <div id="singlepostmap" class="singlemap"></div>

                                            </div>

                                        </div>

                                  </div>	

                          <?php } 

                            }?>

                       </div>

                        <div id="submitreview">

                            <div class="reviews_list">

                                <?php olomo_get_all_reviews($post->ID); ?>

                            </div>    

                        </div>

                        <div id="writereview" >

                            <?php

                                $allowedReviews = $olomo_options['review_switch'];

                                if(!empty($allowedReviews) && $allowedReviews=="1"){

                                    if(get_post_status($post->ID)=="publish"){

                                        olomo_get_reviews_form($post->ID);

                                    }

                                }

                            ?>

                            

                           <?php setPostViews(get_the_ID()); 

						         //echo getPostViews(get_the_ID());

						   ?>

                          

                        

                            

                        </div>

                        <div class="clearfix"></div>

                    </div>

                </div>

                <!-- Sidebar -->

                 <div class="col-md-4">

                    <div class="olomo_sidebar">

                     <?php  echo olomo_post_confirmation($post); ?>

                        <?php 

                        $gAddress = listing_get_metabox('gAddress');

                        $phone = listing_get_metabox('phone');

                        $website = listing_get_metabox('website');

						$email = listing_get_metabox('email');

                        if($gAddress || $phone || $website || $email):?>

                            <div class="sidebar_wrap listing_contact_info">

                            <div class="widget_title">

                                <h6><?php esc_html_e('Contact Info','olomo'); ?></h6>

                            </div>

                            <ul>

                            <?php if(!empty($gAddress)) { ?><li><i class="fa fa-map-marker"></i><?php echo esc_html($gAddress); ?></li><?php }

                                  if(!empty($phone)) {

                                  if($contact_show=="true"){ ?>

                                    <li><i class="fa fa-phone"></i><a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a></li>

                               	  <?php }
								  }
								if(!empty($email)) { ?>

                                    <li><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></li>
                               <?php } 

                                if(!empty($website)) { ?>

                                <li><i class="fa fa-link"></i><a href="<?php echo esc_url($website); ?>" target="_blank"><?php echo esc_url($website); ?></a></li>

                            <?php } ?>

                        </ul>

                            <?php 

                            $facebook = listing_get_metabox('facebook');

                            $twitter = listing_get_metabox('twitter');

                            $linkedin = listing_get_metabox('linkedin');

                            $google_plus = listing_get_metabox('google_plus');

                            $youtube = listing_get_metabox('youtube');

                            $instagram = listing_get_metabox('instagram');

                            if(empty($facebook) && empty($twitter) && empty($linkedin) && empty($google_plus) && empty($youtube) && empty($instagram)){}else{ ?>

                                <div class="social_links">

                                    <?php if(!empty($facebook)){ ?>

                                            <a href="<?php echo esc_url($facebook); ?>" class="facebook_link" target="_blank"><i class="fa fa-facebook-f"></i></a>

                                    <?php } ?>

                                    <?php if(!empty($twitter)){ ?>

                                            <a href="<?php echo esc_url($twitter); ?>" class="twitter_link" target="_blank"><i class="fa fa-twitter"></i></a>

                                    <?php } ?>

                                    <?php if(!empty($linkedin)){ ?>

                                            <a href="<?php echo esc_url($linkedin); ?>" class="linkedin_link" target="_blank"><i class="fa fa-linkedin"></i></a>

                                    <?php } ?>

                                    <?php if(!empty($google_plus)){ ?>

                                            <a href="<?php echo esc_url($google_plus); ?>" class="google_plus_link" target="_blank"><i class="fa fa-google-plus"></i></a>

                                    <?php } ?>

                                    <?php if(!empty($youtube)){ ?>

                                            <a href="<?php echo esc_url($youtube); ?>" class="youtube_link" target="_blank"><i class="fa fa-youtube"></i></a>

                                    <?php } ?>

                                    <?php if(!empty($instagram)){ ?>

                                            <a href="<?php echo esc_url($instagram); ?>" class="instagram_link" target="_blank"><i class="fa fa-instagram"></i></a>

                                    <?php } ?>

                                </div>

                            <?php } ?>

                        </div>

                        <?php endif; ?>
						
                        
                        
                       <?php  $video = listing_get_metabox('video');

                        if(!empty($video)) {

                           if($video_show=="true"){?> 

                              <div class="sidebar_wrap">

                            <div class="widget_title">

                                <h4><?php  esc_html_e('Watch Video', 'olomo'); ?></h4>

                            </div>

                            <div class="listing_video">

                                <a href="<?php echo esc_url($video); ?>" class="btn popup-youtube"><i class="fa fa-youtube-play"></i> <?php  esc_html_e('Watch Video', 'olomo'); ?></a>

                            </div>		

                        </div>

                       <?php } } ?> 

                        <div class="sidebar_wrap">

                            <div class="widget_title">

                                <h4><?php  esc_html_e('Claim Listing', 'olomo'); ?></h4>

                            </div>

                            <div class="listing_claim">

                                <a class="btn popup-claim" data-toggle="modal" data-target="#claim_modal"> <?php  esc_html_e('Claim Now!', 'olomo'); ?></a>

                            </div>		

                        </div>

						<?php

                        $terms = get_the_terms(get_the_ID(), 'list-tags');

                        if(!empty($terms)){?>

                        <div class="sidebar_wrap">

                        <div class="widget_title">

                            <h4><?php  esc_html_e('Tag', 'olomo'); ?></h4>

                        </div>

                        

                        <div class="listing_tag">

                            <ul>

                                <?php foreach ($terms as $term){

                                     $url = get_term_link($term->slug, 'list-tags');

                                     ?>

                                    <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> <?php print "<a href='{$url}'>{$term->name}</a>"; ?></li>

                                <?php  } ?>

                            </ul>

                        </div>   

                        </div>

                        <?php } ?>

                    </div>

                </div>

                <!-- /Sidebar -->

            </div>

        </div>

    </section>

    <!-- /Listings -->

</section>

		<?php 

	} // end while

}

wp_reset_postdata();

get_template_part('templates/single-listing-popups');