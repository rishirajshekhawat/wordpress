<?php

/**

 * functions hooks

 * @package WordPress

 * @subpackage carforyou

 * @since carforyou 2.5

 */

function carforyou_popup(){ 

$schedule_form = carforyou_get_option('schedule_form');

if(!empty($schedule_form)) : ?>

    <!--Schedule-Test-Drive -->

    <div class="modal fade" id="schedule">

      <div class="modal-dialog" role="document">

        <div class="modal-content">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            <?php 

            $schedule = carforyou_get_option('schedule');

            if(!empty($schedule)) : ?>

            <h3 class="modal-title" id="myModalLabel"><?php echo esc_html($schedule);?></h3>

            <?php endif; ?>

          </div>

          <div class="modal-body">

              <?php echo do_shortcode($schedule_form); ?>

          </div>

        </div>

      </div>

    </div>

    <!--/Schedule-Test-Drive -->

<?php endif; 

$offer_form = carforyou_get_option('make_offer_form');

if(!empty($offer_form)) : ?>

    <!--Make-Offer -->

    <div class="modal fade" id="make_offer">

      <div class="modal-dialog" role="document">

        <div class="modal-content">

          <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <?php 

                    $make_offer = carforyou_get_option('make_offer');

                    if(!empty($make_offer)) : ?>

                       <h3 class="modal-title" id="myModalLabel"><?php  echo esc_html($make_offer);?></h3>

                <?php endif; ?>

          </div>

          <div class="modal-body">

        <?php echo do_shortcode($offer_form); ?>

      </div>

        </div>

      </div>

    </div>

    <!--/Make-Offer -->

<?php endif; 

$email_form = carforyou_get_option('email_friend_form');

if(!empty($email_form)) : ?>

    <!--Email-to-Friend -->

    

    <div class="modal fade" id="email_friend">

      <div class="modal-dialog" role="document">

        <div class="modal-content">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            <?php 

            $email_friend = carforyou_get_option('email_friend');

            if(!empty($email_friend)) : ?>

            <h3 class="modal-title" id="myModalLabel"><?php  echo esc_html($email_friend);?></h3>

            <?php endif; ?>

          </div>

          <div class="modal-body">

            <?php echo do_shortcode($email_form); ?>

          </div>

        </div>

      </div>

    </div>

 <!--/Email-to-Friend -->

     

<?php endif;

$friend_form = carforyou_get_option('request_more_form');

if(!empty($friend_form)) : ?>

    <!--Request-More-Info -->

    <div class="modal fade" id="more_info">

      <div class="modal-dialog" role="document">

        <div class="modal-content">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            <?php 

                $req_more_Info = carforyou_get_option('request_more_Info');

                if(!empty($req_more_Info)) : ?>

                    <h3 class="modal-title" id="myModalLabel"><?php echo esc_html($req_more_Info);?></h3>

                <?php endif; ?>

          </div>

          <div class="modal-body">

              <?php echo do_shortcode($friend_form); ?>

          </div>

        </div>

      </div>

    </div>

    <!--/Request-More-Info -->

<?php endif; 
?>
<div class="modal fade" id="adnaced_search">

      <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            

            <h3 class="modal-title" id="myModalLabel"> <?php $advanced_filter = carforyou_get_option('serch_filter_ad');
                if(!empty($advanced_filter)) : ?> <h3><?php echo wp_kses_post($advanced_filter); ?></h3>
			  <?php endif; ?></h3>

           
          </div>

          <div class="modal-body">
		  
		  <?php echo do_shortcode('[advancedfilter]'); ?>
		  
		  </div>

        </div>

      </div>

    </div>

<?php

}