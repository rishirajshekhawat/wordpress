<?php
/**
 * functions hooks
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 2.5
 */
 // Detail page side bar   
function carforyou_detail_sidebar(){ ?>
<div class="cardetail-widget">
	<?php carforyou_share_vehicle();
	$sidebar_s_form_enable = carforyou_get_option('sidebar_s_form_enable'); 
	if($sidebar_s_form_enable=='1'|| $sidebar_s_form_enable==''): ?>
      <div class="sidebar_widget">
        <?php 
             $Search = carforyou_get_option('serch_car');
            if(!empty($Search)) : ?>
        <div class="widget_heading">
          <h5><i class="fa fa-filter" aria-hidden="true"></i><?php echo esc_html($Search);?></h5>
        </div>
        <?php endif; ?>
        <div class="sidebar_filter">
          <?php carforyou_sidebar_filter(); ?>
        </div>
      </div>
  	<?php endif;
    $clc_enable = carforyou_get_option('financing_clc_enable');
    if($clc_enable=='1'|| $clc_enable==''):  ?>
      <div class="sidebar_widget">
        <div class="widget_heading">
          <h5><i class="fa fa-calculator" aria-hidden="true"></i>
            <?php esc_html_e('Financing Calculator','carforyou'); ?>
          </h5>
        </div>
        <div class="financing_calculatoe">
          <div class="payment-form">
            <div class="form-group">
              <label class="form-label">
                <?php esc_html_e('Vehicle Price','carforyou'); ?>
                <span>(
                <?php carforyou_curcy_prefix(); ?>
                )</span></label>
              <input class="payment-price form-control" value="" type="text" readonly>
            </div>
            <div class="form-group">
              <label class="form-label">
                <?php esc_html_e('Down Payment','carforyou'); ?>
                <span>(
                <?php esc_html_e('%','carforyou'); ?>
                )</span></label>
              <div class="select">
                <select class="down-pay-percent form-control">
                  <option value="10" data-input="9">
                  <?php esc_html_e('10','carforyou'); ?>
                  </option>
                  <option value="20" data-input="5">
                  <?php esc_html_e('20','carforyou'); ?>
                  </option>
                  <option value="30" data-input="3">
                  <?php esc_html_e('30','carforyou'); ?>
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">
                <?php esc_html_e('Annual Rate','carforyou'); ?>
                <span>(
                <?php esc_html_e('%','carforyou'); ?>
                )</span></label>
              <input value="" class="pay_rate form-control" type="text">
            </div>
            <div class="form-group">
              <label class="form-label">
                <?php esc_html_e('Period in Month','carforyou'); ?>
              </label>
              <div class="select">
                <select class="down-pay-years form-control">
                  <option value="12">
                  <?php esc_html_e('12 Month','carforyou'); ?>
                  </option>
                  <option value="18">
                  <?php esc_html_e('18 Month','carforyou'); ?>
                  </option>
                  <option value="24">
                  <?php esc_html_e('24 Month','carforyou'); ?>
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <button class="payment_cal_btn btn btn-block" value="">
              <?php esc_html_e('Calculator','carforyou'); ?>
              </button>
            </div>
          </div>
          <div class="payment_result">
            <p>
              <?php esc_html_e('Monthy Payment','carforyou');?>
              <span class="strong">
              <?php carforyou_curcy_prefix(); ?>
              <strong class="monthy"></strong></span></p>
            <p>
              <?php esc_html_e('Total Interest','carforyou');?>
              <span class="strong">
              <?php carforyou_curcy_prefix(); ?>
              <strong class="free-amount"></strong></span></p>
            <p>
              <?php esc_html_e('Total Amount Pay','carforyou');?>
              <span class="strong">
              <?php carforyou_curcy_prefix(); ?>
              <strong class="total-pay"></strong></span></p>
          </div>
        </div>
      </div>
    <?php endif; ?>
</div>
<?php }

function carforyou_Similar_Car(){
$similar_car = carforyou_get_option('similar_car_enable');
if($similar_car=='1'|| $similar_car==''):  ?>
<div class="similar_cars">
  <?php 
	$similar_car_heading = carforyou_get_option('similar_car_text');
	if(!empty($similar_car_heading)) : ?>
  <h3><?php echo esc_html($similar_car_heading); ?></h3>
  <?php endif; ?>
  <div class="row">
    <?php 
	global $post;
	$similarpages = carforyou_get_option('similar_car_limit');
	$loop = new WP_Query( array('category__in' => get_term_by(get_the_ID(), 'auto-brand'), 'posts_per_page' => $similarpages, 'post__not_in' => array($post->ID),'post_type' => 'auto', 'post_status' => 'publish', 'meta_key' => 'DREAM_auto_condition', 'meta_value'	=> 'new')); 
	while ($loop->have_posts()) : $loop->the_post(); ?>
    <div class="col-md-4 grid_listing">
      <div class="product-listing-m gray-bg">
        <div class="product-listing-img"> <a href="<?php the_permalink()?>">
          <?php the_post_thumbnail( 'large', array( 'class' => 'img-responsive' ) ); ?>
          </a>
          <div class="label_icon">
            <?php esc_html_e('New','carforyou') ?>
          </div>
          <div class="compare_item">
            <div class="checkbox">
              <button id="compare_auto_btn" onclick="<?php echo esc_js('javascript:productCompare('.$post->ID.')'); ?>">
              <?php esc_html_e('Compare','carforyou'); ?>
              </button>
            </div>
          </div>
        </div>
        <div class="product-listing-content">
          <h5><a href="<?php the_permalink(); ?>">
            <?php $title = get_the_title(); echo mb_strimwidth($title, 0, 30, '...'); ?>
            </a></h5>
          <?php  if(!empty($post->DREAM_auto_price)): ?>
          <p class="list-price">
            <?php carforyou_curcy_prefix(); ?>
            <?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></p>
          <?php endif; ?>
          <?php $location = $post->DREAM_auto_address;
											$pieces = explode(' ', $location);
											$last_word = array_pop($pieces);?>
          <?php  if(!empty($location)): ?>
          <div class="car-location"> <span><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo esc_html($last_word); ?></span> </div>
          <?php endif; ?>
          <ul class="features_list">
	          <?php carforyou_featuredList();?>
          </ul>
        </div>
      </div>
    </div>
    <?php endwhile; wp_reset_query(); ?>
  </div>
</div>
<?php endif; 

}

// Car Detail Page Style 1

function carforyou_detail_page1(){

global $post;

$sidebar = carforyou_get_option('detail_sidebar_style');

if($sidebar=='left_style'):

	$page_grid="col-md-9 col-md-push-3";

	$side_grid="col-md-3 col-md-pull-9";

else:

	$page_grid="col-md-9";

	$side_grid="col-md-3";

endif;	

	?>
<!--Add Code For Slider Here-->

<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });

</script>
<section id="listing_img_slider">
  <div class="owl-carousel">
    <div>
      <?php the_post_thumbnail('carforyou_large', array('class' => 'img-responsive')); ?>
    </div>
    <?php

            $images = rwmb_meta( 'DREAM_auto_slider', 'size=carforyou_large' );

            if ( !empty($images )):

                foreach ($images as $image):

				echo "<div><a href='{$image['url']}' data-toggle='lightbox' data-gallery='example-gallery' data-type='image' class='cursorimage'><img src='{$image['url']}' alt='{$image['alt']}' title='{$image['title']}' class='img-responsive img-fluid'  ></a></div>";
                  //echo "<div><img src='{$image['url']}' alt='{$image['alt']}' title='{$image['title']}' class='img-responsive' ></div>";

                endforeach;

            endif; 

            ?>
  </div>
</section>

<!--/Listing-Image-Slider-->

<section class="listing_other_info secondary-bg">
  <?php carforyou_other_info_forms(); ?>
</section>

<!-- Filter-Form -->

<section id="filter_form" class="inner-filter gray-bg">
  <div class="container">
    <?php $serch_filter = carforyou_get_option('serch_filter');

                if(!empty($serch_filter)) : ?>
    <h3><?php echo wp_kses_post($serch_filter); ?></h3>
    <?php endif; ?>
    <div class="row">
      <?php carforyouFilterForm(); ?>
    </div>
  </div>
</section>

<!-- /Filter-Form --> 

<!--Listing-detail-->

<section class="listing-detail">
  <div class="container">
    <div class="listing_detail_head row">
      <div class="col-md-9">
        <h2>
          <?php the_title(); ?>
        </h2>
        <?php  if(!empty($post->DREAM_auto_address)): ?>
        <div class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html($post->DREAM_auto_address); ?></span> </div>
        <?php endif; ?>
      </div>
      <div class="col-md-3">
        <div class="price_info">
          <?php  if(!empty($post->DREAM_auto_price)): ?>
          <p class="pcd-pricing"><span class="pcd-price">
            <?php carforyou_curcy_prefix(); ?><?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></span></p>
          <?php endif; ?>
        </div>
        <!--Add Slider Code Here-->
       <?php if(function_exists('pf_show_link')){echo pf_show_link();} ?>
      </div>
    </div>
    <div class="row">
      <div class="<?php echo esc_attr($page_grid); ?>">
        <div class="main_features">
          <ul>
            <?php  if(!empty($post->DREAM_auto_km_done)): ?>
            <li> <i class="fa fa-tachometer" aria-hidden="true"></i>
              <h5><?php echo number_format_i18n(esc_html($post->DREAM_auto_km_done)); ?></h5>
              <p>
              <?php 
                $optKmMiles= carforyou_get_option('optKmMiles');
                if($optKmMiles=='2'):
					esc_html_e('Total Miles','carforyou');
                else:
                     esc_html_e('Total Kilometres','carforyou');
                endif;                  
              ?>
              </p>
            </li>
            <?php endif; ?>
            <?php $term_list = wp_get_post_terms($post->ID, 'year-model', array("fields" => "all"));
					foreach($term_list as $term_single) 
					$year_model = $term_single->name;
					 if(!empty($year_model)): ?>
		            <li> <i class="fa fa-calendar" aria-hidden="true"></i>
              <h5><?php echo esc_html($year_model); ?></h5>
              <p>
                <?php esc_html_e('Reg.Year','carforyou'); ?>
              </p>
            </li>
            <?php endif; ?>
            <?php  if(!empty($post->DREAM_fuel_type)): ?>
            <li> <i class="fa fa-cogs" aria-hidden="true"></i>
              <h5><?php echo esc_html($post->DREAM_fuel_type); ?></h5>
              <p>
                <?php esc_html_e('Fuel Type','carforyou') ?>
              </p>
            </li>
            <?php endif; ?>
            <?php  if(!empty($post->DREAM_auto_transmission)): ?>
            <li> <i class="fa fa-power-off" aria-hidden="true"></i>
              <h5><?php echo esc_html($post->DREAM_auto_transmission); ?></h5>
              <p>
                <?php esc_html_e('Transmission','carforyou') ?>
              </p>
            </li>
            <?php endif; ?>
            <?php  if(!empty($post->DREAM_auto_engine)): ?>
            <li> <i class="fa fa-superpowers" aria-hidden="true"></i>
              <h5><?php echo esc_html($post->DREAM_auto_engine); ?></h5>
              <p>
                <?php esc_html_e('Engine','carforyou') ?>
              </p>
            </li>
            <?php endif; ?>
            <?php  if(!empty($post->DREAM_auto_seat_capacity)): ?>
            <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
              <h5><?php echo esc_html($post->DREAM_auto_seat_capacity); ?></h5>
              <p>
                <?php esc_html_e('Seats','carforyou') ?>
              </p>
            </li>
            <?php endif; ?>
          </ul>
        </div>
        <div class="listing_more_info">
          <div class="listing_detail_wrap"> 
            
            <!-- Nav tabs -->
            
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">
                <?php esc_html_e('Vehicle Overview','carforyou') ?>
                </a></li>
              <li role="presentation"><a href="#specification" aria-controls="specification" role="tab" data-toggle="tab">
                <?php esc_html_e('Technical Specification','carforyou') ?>
                </a></li>
              <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">
                <?php esc_html_e('Accessories','carforyou') ?>
                </a></li>
				<?php if(!empty($post->DREAM_auto_address)){ ?>
			  <li role="presentation"><a href="#location" aria-controls="location" role="tab" data-toggle="tab">
                <?php esc_html_e('Location','carforyou') ?>
                </a></li>		
				<?php } ?>
            </ul>
            
            <!-- Tab panes -->
            
            <div class="tab-content"> 
              
              <!-- vehicle-overview -->
              
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                <?php the_content(); ?>
              </div>
              
              <!-- Technical-Specification -->
              
              <div role="tabpanel" class="tab-pane" id="specification">
                <div class="table-responsive"> 
                  
                  <!--Basic-Info-Table-->
                   <!--Basic Information alphabetically order-->
                <script>
				 jQuery( window ).on( "load", function() {
				 var mylist = jQuery('#specificationtable');
				 var listitems = mylist.find('tr');
listitems.sort(function(a, b) {
   return jQuery(a).text().toUpperCase().localeCompare(jQuery(b).text().toUpperCase());
})
jQuery.each(listitems, function(idx, itm) { mylist.append(itm); });
 });
				</script>
                  <table>
                    <thead>
                      <tr>
                        <th colspan="2"><?php esc_html_e('Basic Information','carforyou') ?></th>
                      </tr>
                    </thead>
                    <tbody id="specificationtable">
                      <?php  if(!empty($post->DREAM_auto_condition)): ?>
                      <tr>
                        <td><?php esc_html_e('Vehicle Condition','carforyou') ?></td>
                        <td><?php echo esc_html(ucfirst($post->DREAM_auto_condition)); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php $term_list = wp_get_post_terms($post->ID, 'auto-brand', array("fields" => "all"));

                                            foreach($term_list as $term_single) 

                                                $brand_model = $term_single->name;

                                                if(!empty($brand_model)): ?>
                      <tr>
                        <td><?php esc_html_e('Brand','carforyou') ?></td>
                        <td><?php echo esc_html(ucfirst($brand_model));?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_model)): ?>
                      <tr>
                        <td><?php esc_html_e('Model','carforyou') ?></td>
                        <td><?php echo esc_html(ucfirst($post->DREAM_auto_model)); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php $term_list = wp_get_post_terms($post->ID, 'year-model', array("fields" => "all"));

                                            foreach($term_list as $term_single) 

                                                $year_model = $term_single->name;

                                                if(!empty($year_model)): ?>
                      <tr>
                        <td><?php esc_html_e('Model Year','carforyou') ?></td>
                        <td><?php echo esc_html($year_model);?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_no_of_Owners)): ?>
                      <tr>
                        <td><?php esc_html_e('No. of Owners','carforyou') ?></td>
                        <td><?php echo esc_html($post->DREAM_auto_no_of_Owners); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_km_done)): ?>
                      <tr>
                        <td><?php esc_html_e('KMs Driven','carforyou') ?></td>
                        <td><?php echo number_format_i18n(esc_html($post->DREAM_auto_km_done)); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_fuel_type)): ?>
                      <tr>
                        <td><?php esc_html_e('Fuel Type','carforyou') ?></td>
                        <td><?php echo esc_html(ucfirst($post->DREAM_fuel_type)); ?></td>
                      </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                  
                  <!--Technical-Specification-Table-->
                  <script>
				 jQuery( window ).on( "load", function() {
				 var mylist = jQuery('#specificationtable');
				 var listitems = mylist.find('tr');
listitems.sort(function(a, b) {
   return jQuery(a).text().toUpperCase().localeCompare(jQuery(b).text().toUpperCase());
})
jQuery.each(listitems, function(idx, itm) { mylist.append(itm); });
 });
				</script>
                 <table>
                    <thead>
                      <tr>
                        <th colspan="2"><?php esc_html_e('Technical Specification','carforyou') ?></th>
                      </tr>
                    </thead>
                    <tbody id="specificationtable">
                      <?php  if(!empty($post->DREAM_auto_engine_type)): ?>
                      <tr>
                        <td><?php esc_html_e('Engine Type','carforyou') ?></td>
                        <td><?php echo esc_html($post->DREAM_auto_engine_type); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_engine_description)): ?>
                      <tr>
                        <td><?php esc_html_e('Engine Description','carforyou') ?></td>
                        <td><?php echo esc_html($post->DREAM_auto_engine_description); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_no_of_cylinders)): ?>
                      <tr>
                        <td><?php esc_html_e('No. of Cylinders','carforyou') ?></td>
                        <td><?php echo esc_html($post->DREAM_auto_no_of_cylinders); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_mileage_city)): ?>
                      <tr>
                        <td><?php esc_html_e('Mileage-City','carforyou') ?></td>
                        <td><?php echo esc_html($post->DREAM_auto_mileage_city); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_mileage_highway)): ?>
                      <tr>
                        <td><?php esc_html_e('Mileage-Highway','carforyou') ?></td>
                        <td><?php echo esc_html($post->DREAM_auto_mileage_highway); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_fuel_tank_capacity)): ?>
                      <tr>
                        <td><?php esc_html_e('Fuel Tank Capacity','carforyou') ?></td>
                        <td><?php echo esc_html($post->DREAM_auto_fuel_tank_capacity); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_seat_capacity)): ?>
                      <tr>
                        <td><?php esc_html_e('Seating Capacity','carforyou') ?></td>
                        <td><?php echo esc_html($post->DREAM_auto_seat_capacity); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_transmission)): ?>
                      <tr>
                        <td><?php esc_html_e('Transmission Type','carforyou') ?></td>
                        <td><?php echo esc_html($post->DREAM_auto_transmission); ?></td>
                      </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              
              <!-- Accessories -->
              
              <div role="tabpanel" class="tab-pane" id="accessories"> 
                
                <!--Accessories-->
                 <!--Accessories alphabetically order-->
                <script>
				 jQuery( window ).on( "load", function() {
				 var mylist = jQuery('#accessoriestable');
				 var listitems = mylist.find('tr');
listitems.sort(function(a, b) {
   return jQuery(a).text().toUpperCase().localeCompare(jQuery(b).text().toUpperCase());
})
jQuery.each(listitems, function(idx, itm) { mylist.append(itm); });
 });
				</script>
                <table>
                  <thead>
                    <tr>
                      <th colspan="2"><?php esc_html_e('Accessories','carforyou'); ?></th>
                    </tr>
                  </thead>
                  <tbody id="accessoriestable">
                  <?php  if(!empty($post->DREAM_cruise_control)): ?>
                   <tr>
                      <td><?php esc_html_e('Cruise Control','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_electrically_mirrors)): ?>
                    <tr>
                      <td><?php esc_html_e('Electrically folding doors mirrors','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_heated_exteriors)): ?>
                    <tr>
                      <td><?php esc_html_e('Heated exteriors mirrors','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                      <?php  if(!empty($post->DREAM_electric_windows)): ?>
                    <tr>
                      <td><?php esc_html_e('Electric windows front+rear','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                      <?php  if(!empty($post->DREAM_leather_furnishing)): ?>
                    <tr>
                      <td><?php esc_html_e('Leather Furnishing','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                     <?php  if(!empty($post->DREAM_armrest_for)): ?>
                    <tr>
                      <td><?php esc_html_e('Armrest for','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                     <?php  if(!empty($post->DREAM_rain_sensor)): ?>
                     <tr>
                      <td><?php esc_html_e('Rain Sensor','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                     <?php  if(!empty($post->DREAM_start_stop)): ?>
                    <tr>
                      <td><?php esc_html_e('Start/Stop System','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                     <?php  if(!empty($post->DREAM_gear_lever)): ?>
                    <tr>
                      <td><?php esc_html_e('Gear lever covered with leather','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                     <?php  if(!empty($post->DREAM_automatic_climate)): ?>
                     <tr>
                      <td><?php esc_html_e('Automatic Climate Control','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_electrically_adjustable)): ?>
                    <tr>
                      <td><?php esc_html_e('Electrically adjustable door mirrors','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                     <?php  if(!empty($post->DREAM_central_door)): ?>
                     <tr>
                      <td><?php esc_html_e('Central door locking with remote control','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                     <?php  if(!empty($post->DREAM_seat_heating)): ?>
                     <tr>
                      <td><?php esc_html_e('Seat Heating','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_leather_steering)): ?>
                    <tr>
                      <td><?php esc_html_e('Leather Steering Wheel','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_light_sensor)): ?>
                    <tr>
                      <td><?php esc_html_e('Light sensor','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr> 
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_sports_suspension)): ?>
                    <tr>
                      <td><?php esc_html_e('Sports Suspension','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                     <?php /*?><?php  if(!empty($post->DREAM_power_steering)): ?>
                    <tr>
                      <td><?php esc_html_e('Power Steering','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?><?php */?>
                     <?php  if(!empty($post->DREAM_tinted_heat)): ?>
                    <tr>
                      <td><?php esc_html_e('Tinted and heat-resistant glass','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                      <?php  if(!empty($post->DREAM_abs_safety)): ?>
                    <tr>
                      <td><?php esc_html_e('ABS','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_airbag_passenger)): ?>
                    <tr>
                      <td><?php esc_html_e('Airbag Passenger','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_alarm_system)): ?>
                    <tr>
                      <td><?php esc_html_e('Alarm System','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_isofix_safety)): ?>
                     <tr>
                      <td><?php esc_html_e('Isofix (Child Seat Confirmation)','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_traction_control)): ?>
                    <tr>
                      <td><?php esc_html_e('Traction Control','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_airbag_driver)): ?>
                    <tr>
                      <td><?php esc_html_e('Airbag Driver','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_side_airbags)): ?>
                     <tr>
                      <td><?php esc_html_e('Side Airbags','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_esp_safety)): ?>
                    <tr>
                      <td><?php esc_html_e('ESP','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_parking_sensors)): ?>
                    <tr>
                      <td><?php esc_html_e('Rear Parking Sensors','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_bi_xenon)): ?>
                    <tr>
                      <td><?php esc_html_e('Bi Xenon Headlights','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_led_daytime)): ?>
                     <tr>
                      <td><?php esc_html_e('LED Daytime running lights','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_led_tail)): ?>
                    <tr>
                      <td><?php esc_html_e('LED tail lights','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_front_fog)): ?>
                    <tr>
                      <td><?php esc_html_e('Front Fog Lights','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                     <?php  if(!empty($post->DREAM_headlights_washers)): ?>
                     <tr>
                      <td><?php esc_html_e('Headlights Washers','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_sports_package)): ?>
                    <tr>
                      <td><?php esc_html_e('Sports Package','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_alloy_wheels)): ?>
                    <tr>
                      <td><?php esc_html_e('Alloy Wheels','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_maintenance_history)): ?>
                    <tr>
                      <td><?php esc_html_e('Maintenance History Present','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_particle_filter)): ?>
                    <tr>
                      <td><?php esc_html_e('Particle Filter','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_air_conditioner)): ?>
                     <tr>
                      <td><?php esc_html_e('Air Conditioner','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_braking_system)): ?>
                    <tr>
                      <td><?php esc_html_e('AntiLock Braking System','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_power_steering)): ?>
                    <tr>
                      <td><?php esc_html_e('Power Steering','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_power_window)): ?>
                    <tr>
                      <td><?php esc_html_e('Power Windows','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_CD_player)): ?>
                    <tr>
                      <td><?php esc_html_e('CD Player','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_leather_seats)): ?>
                    <tr>
                      <td><?php esc_html_e('Leather Seats','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_central_locking)): ?>
                    <tr>
                      <td><?php esc_html_e('Central Locking','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_power_door_lock)): ?>
                    <tr>
                      <td><?php esc_html_e('Power Door Locks','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_brake_assist)): ?>
                    <tr>
                      <td><?php esc_html_e('Brake Assist','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_driver_airbag)): ?>
                    <tr>
                      <td><?php esc_html_e('Driver Airbag','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_passenger_airbag)): ?>
                    <tr>
                      <td><?php esc_html_e('Passenger Airbag','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_crash_sensor)): ?>
                    <tr>
                      <td><?php esc_html_e('Crash Sensor','carforyou'); ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_engine_check_warning)): ?>
                    <tr>
                      <td><?php esc_html_e('Engine Check Warning','carforyou'); ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_automatic_headlamps)): ?>
                    <tr>
                      <td><?php esc_html_e('Automatic Headlamps','carforyou'); ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
                
                <!--Technical-Specification-Table-->
                
                <table>
                  <?php  

						$propertyDetail = new Dream_Auto( get_the_ID() );

						$additional_details = $propertyDetail->get_additional_details();

						if ( ! empty ( $additional_details ) and is_array( $additional_details ) ) {

						$additional_details = array_filter( $additional_details );

						if ( 0 < count( $additional_details ) ) {

							if( ! empty ( $additional_details ) ){

								echo '<thead><tr><th colspan="2">'.esc_html('Extra Opties','carforyou').'</th></tr></thead>';

							}

							echo "<tbody>";

								foreach ( $additional_details as $key => $value ) {

									echo sprintf( "<tr><td>%s</td> <td> %s</td></tr>", $key, $value );

								}

							echo "</tbody>";		

						} }?>
                </table>
              </div>
			  
			  <!-- Location -->
			  <?php if(!empty($post->DREAM_auto_address)){ ?>
			  <div role="tabpanel" class="tab-pane" id="location"> 
			  
			  <a class="md-trigger parimary-link singlebigmaptrigger" data-lat="<?php echo esc_html($post->latitude); ?>" data-lan="<?php echo esc_html($post->longitude); ?>" data-modal="modal-4"></a>
			  
			  <div class="map-directions">
              <a href="https://www.google.com/maps?daddr=<?php echo esc_attr($post->longitude); ?>,<?php echo esc_attr($post->longitude); ?>" target="_blank" ><i class="fa fa-map-o"></i><?php echo esc_html__('Get Directions', 'olomo'); ?></a>
               </div>
			  <div id="singlepostmap" class="singlemap"></div>
			  
			  </div>
			  <?php } ?>
              
              <!--  More Car Feature  --> 
              
            </div>
          </div>
          <?php 
			$vedio_url = $post->DREAM_video_link;
			if (!empty( $vedio_url)): 
			$step1=explode('v=', $vedio_url);
			$step2 =explode('&',$step1[1]);
			$video_url = $step2[0]; ?>
          <div class="video_wrap">
            <h6>
              <?php esc_html_e('Watch Video','carforyou');?>
            </h6>
          </div>
          <div class="video-box">
            <iframe class="mfp-iframe" src="https://www.youtube.com/embed/<?php echo esc_html($video_url); ?>"></iframe>
          </div>
          <?php endif;?>
          <?php comments_template(); ?>
        </div>
      </div>
      
      <!--Side-Bar-->
      
      <aside class="<?php echo esc_attr($side_grid); ?>">
        <?php carforyou_detail_sidebar(); ?>
      </aside>
      
      <!--/Side-Bar--> 
      
    </div>
    <div class="space-20"></div>
    <div class="divider"></div>
    
    <!--Similar-Cars-->
    
    <?php carforyou_Similar_Car(); ?>
    
    <!--/Similar-Cars--> 
    
  </div>
</section>
<?php

}

// Car Detail Page Style 2

function carforyou_detail_page2(){

	$sidebar = carforyou_get_option('detail_sidebar_style');

	if($sidebar=='left_style'):

		$page_grid="col-md-9 col-md-push-3";

		$side_grid="col-md-3 col-md-pull-9";

	else:

		$page_grid="col-md-9";

		$side_grid="col-md-3";

	endif;

	$details_innerpageimg = carforyou_get_option('details_innerpageimg'); 

	$details_innerpage = $details_innerpageimg['url']; 

	global $post;

?>
<!--Add Slider Code Here-->

<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });

</script>
<section class="listing_detail_header parallex-bg" style="background-image:url(<?php echo esc_url($details_innerpage);?> )">
  <div class="container">
    <div class="listing_detail_head white-text div_zindex row">
      <div class="col-md-9">
        <h2><?php echo esc_html(the_title());?></h2>
        <?php  if(!empty($post->DREAM_auto_address)): ?>
        <div class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html($post->DREAM_auto_address); ?></span></div>
        <?php endif; ?>
        <div class="add_compare">
          <?php carforyou_share_vehicle(); ?>
        </div>
      </div>
      <div class="col-md-3">
        <?php  if(!empty($post->DREAM_auto_price)): ?>
        <div class="price_info">
          <p class="pcd-pricing"><span class="pcd-price">
            <?php carforyou_curcy_prefix(); ?><?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></span></p>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>

<!-- /Listing-detail-header -->

<section class="listing_other_info secondary-bg">
  <?php carforyou_other_info_forms(); ?>
</section>

<!-- Filter-Form -->

<section id="filter_form" class="inner-filter gray-bg">
  <div class="container">
    <?php $serch_filter = carforyou_get_option('serch_filter');

                if(!empty($serch_filter)) : ?>
    <h3><?php echo wp_kses_post($serch_filter); ?></h3>
    <?php endif; ?>
    <div class="row">
      <?php carforyouFilterForm(); ?>
    </div>
  </div>
</section>

<!-- /Filter-Form --> 

<!--Listing-detail-->

<section class="listing-detail">
  <div class="container">
    <div class="row">
      <div class="<?php echo esc_attr($page_grid); ?>">
        <div class="listing_images">
          <div class="listing_images_slider">
            <div>
              <?php the_post_thumbnail('carforyou_large', array('class' => 'img-responsive center-block')); ?>
            </div>
            <?php

                $images = rwmb_meta( 'DREAM_auto_slider', 'size=carforyou_large' );

                if ( !empty($images )):

                    foreach ($images as $image):

					echo "<div><a href='{$image['url']}' data-toggle='lightbox' data-gallery='example-gallery' data-type='image' class='cursorimage'><img src='{$image['url']}' alt='{$image['alt']}' title='{$image['title']}' class='center-block img-responsive img-fluid'  ></a></div>";
                     //echo "<div><img src='{$image['url']}' alt='{$image['alt']}' title='{$image['title']}' class='center-block img-responsive' ></div>";

                    endforeach;

                endif; 

               ?>
          </div>
          <div class="listing_images_slider_nav">
            <div>
              <?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive center-block')); ?>
            </div>
            <?php

                $images = rwmb_meta( 'DREAM_auto_slider', 'size=thumbnail' );

                if ( !empty($images )):

                    foreach ($images as $image):

                      echo "<div><img src='{$image['url']}' alt='{$image['alt']}' title='{$image['title']}' class='center-block img-responsive' ></div>";

                    endforeach;

                endif; 

               ?>
          </div>
        </div>
        <div class="main_features">
          <ul>
            <?php  if(!empty($post->DREAM_auto_km_done)): ?>
            <li> <i class="fa fa-tachometer" aria-hidden="true"></i>
              <h5><?php echo number_format_i18n(esc_html($post->DREAM_auto_km_done)); ?></h5>
              <p>
              <?php 
                $optKmMiles= carforyou_get_option('optKmMiles');
                if($optKmMiles=='2'):
                     $KmMiles="Total Miles";
					echo esc_html($KmMiles);
                else:
                     $KmMiles="Total Kilometres";
					 echo esc_html($KmMiles);
                endif;                  
              ?>
              </p>
            </li>
            <?php endif; ?>
            <?php $term_list = wp_get_post_terms($post->ID, 'year-model', array("fields" => "all"));

                                    foreach($term_list as $term_single) 

                                        $year_model = $term_single->name;

                         if(!empty($year_model)): ?>
            <li> <i class="fa fa-calendar" aria-hidden="true"></i>
              <h5><?php echo esc_html($year_model); ?></h5>
              <p>
                <?php esc_html_e('Reg.Year','carforyou') ?>
              </p>
            </li>
            <?php endif; ?>
            <?php  if(!empty($post->DREAM_fuel_type)): ?>
            <li> <i class="fa fa-cogs" aria-hidden="true"></i>
              <h5><?php echo esc_html($post->DREAM_fuel_type); ?></h5>
              <p>
                <?php esc_html_e('Fuel Type','carforyou') ?>
              </p>
            </li>
            <?php endif; ?>
            <?php  if(!empty($post->DREAM_auto_transmission)): ?>
            <li> <i class="fa fa-power-off" aria-hidden="true"></i>
              <h5><?php echo esc_html($post->DREAM_auto_transmission); ?></h5>
              <p>
                <?php esc_html_e('Transmission','carforyou') ?>
              </p>
            </li>
            <?php endif; ?>
            <?php  if(!empty($post->DREAM_auto_engine)): ?>
            <li> <i class="fa fa-superpowers" aria-hidden="true"></i>
              <h5><?php echo esc_html($post->DREAM_auto_engine); ?></h5>
              <p>
                <?php esc_html_e('Engine','carforyou') ?>
              </p>
            </li>
            <?php endif; ?>
            <?php  if(!empty($post->DREAM_auto_seat_capacity)): ?>
            <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
              <h5><?php echo esc_html($post->DREAM_auto_seat_capacity); ?></h5>
              <p>
                <?php esc_html_e('Seats','carforyou') ?>
              </p>
            </li>
            <?php endif; ?>
          </ul>
        </div>
        <div class="listing_more_info">
          <div class="listing_detail_wrap"> 
            
            <!-- Nav tabs -->
            
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">
                <?php esc_html_e('Vehicle Overview','carforyou') ?>
                </a></li>
              <li role="presentation"><a href="#specification" aria-controls="specification" role="tab" data-toggle="tab">
                <?php esc_html_e('Technical Specification','carforyou') ?>
                </a></li>
              <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">
                <?php esc_html_e('Accessories','carforyou') ?>
                </a></li>
            </ul>
            
            <!-- Tab panes -->
            
            <div class="tab-content"> 
              
              <!-- vehicle-overview -->
              
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                <?php the_content(); ?>
              </div>
              
              <!-- Technical-Specification -->
              
              <div role="tabpanel" class="tab-pane" id="specification">
                <div class="table-responsive"> 
                  
                  <!--Basic-Info-Table-->
                  
                  <table>
                    <thead>
                      <tr>
                        <th colspan="2"><?php esc_html_e('Basic Information','carforyou') ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php  if(!empty($post->DREAM_auto_condition)): ?>
                      <tr>
                        <td><?php esc_html_e('Vehicle Condition','carforyou') ?></td>
                        <td><?php echo esc_html(ucfirst($post->DREAM_auto_condition)); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php $term_list = wp_get_post_terms($post->ID, 'auto-brand', array("fields" => "all"));
						foreach($term_list as $term_single) 
							$brand_model = $term_single->name;
							 if(!empty($brand_model)): ?>
                      <tr>
                        <td><?php esc_html_e('Brand','carforyou') ?></td>
                        <td><?php echo esc_html(ucfirst($brand_model));?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_model)): ?>
                      <tr>
                        <td><?php esc_html_e('Model','carforyou') ?></td>
                        <td><?php echo esc_html(ucfirst($post->DREAM_auto_model)); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php $term_list = wp_get_post_terms($post->ID, 'year-model', array("fields" => "all"));

                                        foreach($term_list as $term_single) 

                                            $year_model = $term_single->name;

                                        ?>
                      <?php  if(!empty($year_model)): ?>
                      <tr>
                        <td><?php esc_html_e('Model Year','carforyou') ?></td>
                        <td><?php echo esc_html($year_model);?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_no_of_Owners)): ?>
                      <tr>
                        <td><?php esc_html_e('No. of Owners','carforyou') ?></td>
                        <td><?php echo esc_html($post->DREAM_auto_no_of_Owners); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_km_done)): ?>
                      <tr>
                        <td><?php esc_html_e('KMs Driven','carforyou') ?></td>
                        <td><?php echo number_format_i18n(esc_html($post->DREAM_auto_km_done)); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_fuel_type)): ?>
                      <tr>
                        <td><?php esc_html_e('Fuel Type','carforyou') ?></td>
                        <td><?php echo esc_html(ucfirst($post->DREAM_fuel_type)); ?></td>
                      </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                  
                  <!--Technical-Specification-Table-->
                  
                  <table>
                    <thead>
                      <tr>
                        <th colspan="2"><?php esc_html_e('Technical Specification','carforyou') ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php  if(!empty($post->DREAM_auto_engine_type)): ?>
                      <tr>
                        <td><?php esc_html_e('Engine Type','carforyou') ?></td>
                        <td><?php echo esc_html(ucfirst($post->DREAM_auto_engine_type)); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_engine_description)): ?>
                      <tr>
                        <td><?php esc_html_e('Engine Description','carforyou') ?></td>
                        <td><?php echo esc_html($post->DREAM_auto_engine_description); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_no_of_cylinders)): ?>
                      <tr>
                        <td><?php esc_html_e('No. of Cylinders','carforyou') ?></td>
                        <td><?php echo esc_html($post->DREAM_auto_no_of_cylinders); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_mileage_city)): ?>
                      <tr>
                        <td><?php esc_html_e('Mileage-City','carforyou') ?></td>
                        <td><?php echo esc_html($post->DREAM_auto_mileage_city); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_mileage_highway)): ?>
                      <tr>
                        <td><?php esc_html_e('Mileage-Highway','carforyou') ?></td>
                        <td><?php echo esc_html($post->DREAM_auto_mileage_highway); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_fuel_tank_capacity)): ?>
                      <tr>
                        <td><?php esc_html_e('Fuel Tank Capacity','carforyou') ?></td>
                        <td><?php echo esc_html($post->DREAM_auto_fuel_tank_capacity); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_seat_capacity)): ?>
                      <tr>
                        <td><?php esc_html_e('Seating Capacity','carforyou') ?></td>
                        <td><?php echo esc_html($post->DREAM_auto_seat_capacity); ?></td>
                      </tr>
                      <?php endif; ?>
                      <?php  if(!empty($post->DREAM_auto_transmission)): ?>
                      <tr>
                        <td><?php esc_html_e('Transmission Type','carforyou') ?></td>
                        <td><?php echo esc_html($post->DREAM_auto_transmission); ?></td>
                      </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              
              <!-- Accessories -->
              
              <div role="tabpanel" class="tab-pane" id="accessories"> 
                
                <!--Accessories-->
                 <!--Accessories alphabetically order-->
                <script>
				 jQuery( window ).on( "load", function() {
				 var mylist = jQuery('#accessoriestable');
				 var listitems = mylist.find('tr');
listitems.sort(function(a, b) {
   return jQuery(a).text().toUpperCase().localeCompare(jQuery(b).text().toUpperCase());
})
jQuery.each(listitems, function(idx, itm) { mylist.append(itm); });
 });
				</script>
                <table>
                  <thead>
                    <tr>
                      <th colspan="2"><?php esc_html_e('Accessories','carforyou'); ?></th>
                    </tr>
                  </thead>
                  <tbody id="accessoriestable">
                  <?php  if(!empty($post->DREAM_cruise_control)): ?>
                   <tr>
                      <td><?php esc_html_e('Cruise Control','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_electrically_mirrors)): ?>
                    <tr>
                      <td><?php esc_html_e('Electrically folding doors mirrors','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_heated_exteriors)): ?>
                    <tr>
                      <td><?php esc_html_e('Heated exteriors mirrors','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                      <?php  if(!empty($post->DREAM_electric_windows)): ?>
                    <tr>
                      <td><?php esc_html_e('Electric windows front+rear','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                      <?php  if(!empty($post->DREAM_leather_furnishing)): ?>
                    <tr>
                      <td><?php esc_html_e('Leather Furnishing','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                     <?php  if(!empty($post->DREAM_armrest_for)): ?>
                    <tr>
                      <td><?php esc_html_e('Armrest for','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                     <?php  if(!empty($post->DREAM_rain_sensor)): ?>
                     <tr>
                      <td><?php esc_html_e('Rain Sensor','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                     <?php  if(!empty($post->DREAM_start_stop)): ?>
                    <tr>
                      <td><?php esc_html_e('Start/Stop System','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                     <?php  if(!empty($post->DREAM_gear_lever)): ?>
                    <tr>
                      <td><?php esc_html_e('Gear lever covered with leather','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                     <?php  if(!empty($post->DREAM_automatic_climate)): ?>
                     <tr>
                      <td><?php esc_html_e('Automatic Climate Control','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_electrically_adjustable)): ?>
                    <tr>
                      <td><?php esc_html_e('Electrically adjustable door mirrors','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                     <?php  if(!empty($post->DREAM_central_door)): ?>
                     <tr>
                      <td><?php esc_html_e('Central door locking with remote control','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                     <?php  if(!empty($post->DREAM_seat_heating)): ?>
                     <tr>
                      <td><?php esc_html_e('Seat Heating','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_leather_steering)): ?>
                    <tr>
                      <td><?php esc_html_e('Leather Steering Wheel','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_light_sensor)): ?>
                    <tr>
                      <td><?php esc_html_e('Light sensor','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr> 
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_sports_suspension)): ?>
                    <tr>
                      <td><?php esc_html_e('Sports Suspension','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                     <?php /*?><?php  if(!empty($post->DREAM_power_steering)): ?>
                    <tr>
                      <td><?php esc_html_e('Power Steering','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?><?php */?>
                     <?php  if(!empty($post->DREAM_tinted_heat)): ?>
                    <tr>
                      <td><?php esc_html_e('Tinted and heat-resistant glass','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                      <?php  if(!empty($post->DREAM_abs_safety)): ?>
                    <tr>
                      <td><?php esc_html_e('ABS','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_airbag_passenger)): ?>
                    <tr>
                      <td><?php esc_html_e('Airbag Passenger','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_alarm_system)): ?>
                    <tr>
                      <td><?php esc_html_e('Alarm System','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_isofix_safety)): ?>
                     <tr>
                      <td><?php esc_html_e('Isofix (Child Seat Confirmation)','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_traction_control)): ?>
                    <tr>
                      <td><?php esc_html_e('Traction Control','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_airbag_driver)): ?>
                    <tr>
                      <td><?php esc_html_e('Airbag Driver','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_side_airbags)): ?>
                     <tr>
                      <td><?php esc_html_e('Side Airbags','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_esp_safety)): ?>
                    <tr>
                      <td><?php esc_html_e('ESP','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_parking_sensors)): ?>
                    <tr>
                      <td><?php esc_html_e('Rear Parking Sensors','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_bi_xenon)): ?>
                    <tr>
                      <td><?php esc_html_e('Bi Xenon Headlights','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_led_daytime)): ?>
                     <tr>
                      <td><?php esc_html_e('LED Daytime running lights','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_led_tail)): ?>
                    <tr>
                      <td><?php esc_html_e('LED tail lights','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_front_fog)): ?>
                    <tr>
                      <td><?php esc_html_e('Front Fog Lights','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                     
                    </tr>
                     <?php endif; ?>
                     <?php  if(!empty($post->DREAM_headlights_washers)): ?>
                     <tr>
                      <td><?php esc_html_e('Headlights Washers','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_sports_package)): ?>
                    <tr>
                      <td><?php esc_html_e('Sports Package','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_alloy_wheels)): ?>
                    <tr>
                      <td><?php esc_html_e('Alloy Wheels','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_maintenance_history)): ?>
                    <tr>
                      <td><?php esc_html_e('Maintenance History Present','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_particle_filter)): ?>
                    <tr>
                      <td><?php esc_html_e('Particle Filter','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_air_conditioner)): ?>
                     <tr>
                      <td><?php esc_html_e('Air Conditioner','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_braking_system)): ?>
                    <tr>
                      <td><?php esc_html_e('AntiLock Braking System','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_power_steering)): ?>
                    <tr>
                      <td><?php esc_html_e('Power Steering','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_power_window)): ?>
                    <tr>
                      <td><?php esc_html_e('Power Windows','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_CD_player)): ?>
                    <tr>
                      <td><?php esc_html_e('CD Player','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_leather_seats)): ?>
                    <tr>
                      <td><?php esc_html_e('Leather Seats','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_central_locking)): ?>
                    <tr>
                      <td><?php esc_html_e('Central Locking','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_power_door_lock)): ?>
                    <tr>
                      <td><?php esc_html_e('Power Door Locks','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_brake_assist)): ?>
                    <tr>
                      <td><?php esc_html_e('Brake Assist','carforyou') ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_driver_airbag)): ?>
                    <tr>
                      <td><?php esc_html_e('Driver Airbag','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_passenger_airbag)): ?>
                    <tr>
                      <td><?php esc_html_e('Passenger Airbag','carforyou') ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_crash_sensor)): ?>
                    <tr>
                      <td><?php esc_html_e('Crash Sensor','carforyou'); ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                     <?php  if(!empty($post->DREAM_engine_check_warning)): ?>
                    <tr>
                      <td><?php esc_html_e('Engine Check Warning','carforyou'); ?></td>
                     
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                    <?php  if(!empty($post->DREAM_automatic_headlamps)): ?>
                    <tr>
                      <td><?php esc_html_e('Automatic Headlamps','carforyou'); ?></td>
                      
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      
                    </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
                
                <!--Technical-Specification-Table-->
                
                <table>
                  <?php  

						$propertyDetail = new Dream_Auto( get_the_ID() );

						$additional_details = $propertyDetail->get_additional_details();

						if ( ! empty ( $additional_details ) and is_array( $additional_details ) ) {

						$additional_details = array_filter( $additional_details );

						if ( 0 < count( $additional_details ) ) {

							if( ! empty ( $additional_details ) ){

								echo '<thead><tr><th colspan="2">'.esc_html('Extra Opties','carforyou').'</th></tr></thead>';

							}

							echo "<tbody>";

								foreach ( $additional_details as $key => $value ) {

									echo sprintf( "<tr><td>%s</td> <td> %s</td></tr>", $key, $value );

								}

							echo "</tbody>";		

						} }?>
                </table>
              </div>
              
              <!--  More Car Feature  --> 
              
            </div>
          </div>
          <?php 
                    $vedio_url = $post->DREAM_video_link;
                    if (!empty( $vedio_url)): 
                    $step1=explode('v=', $vedio_url);
                    $step2 =explode('&',$step1[1]);
                    $video_url = $step2[0]; ?>
          <div class="video_wrap">
            <h6>
              <?php esc_html_e('Watch Video','carforyou');?>
            </h6>
          </div>
          <div class="video-box">
            <iframe class="mfp-iframe" src="https://www.youtube.com/embed/<?php echo esc_html($video_url); ?>"></iframe>
          </div>
          <?php endif;?>
          <?php comments_template(); ?>
        </div>
      </div>
      
      <!--Side-Bar-->
      
      <aside class="<?php echo esc_attr($side_grid); ?>">
        <?php carforyou_detail_sidebar(); ?>
      </aside>
      
      <!--/Side-Bar--> 
      
    </div>
    <div class="space-20"></div>
    <div class="divider"></div>
    
    <!--Similar-Cars-->
    
    <?php carforyou_Similar_Car(); ?>
    
    <!--/Similar-Cars--> 
    
  </div>
</section>

<!--/Listing-detail-->

<?php

}

// Car Detail Page Style 

function carforyou_detail_page_style(){ 

$car_detail_style= carforyou_get_option('car_detail_style');

	if($car_detail_style=='car_detail_style2'):
		carforyou_detail_page2();
	else:
		carforyou_detail_page1();
	endif; 

  }



function carforyou_other_info_forms(){?>
<div class="container">
  <div id="filter_toggle" class="search_other"> <i class="fa fa-filter" aria-hidden="true"></i>
    <?php esc_html_e('Search Car','carforyou'); ?>
  </div>
  <div id="other_info"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
  <div id="info_toggle">
    <?php

                    $Schedule_enable = carforyou_get_option('Schedule_enable');

                    if($Schedule_enable=='1'|| $Schedule_enable==''):

                    $schedule = carforyou_get_option('schedule');

                    if(!empty($schedule)) : ?>
    <button type="button" data-toggle="modal" data-target="#schedule"> <i class="fa fa-car" aria-hidden="true"></i> <?php echo esc_html($schedule);?> </button>
    <?php endif;endif;

                    $make_offer_enable = carforyou_get_option('make_offer_enable');

                    if($make_offer_enable=='1'|| $make_offer_enable==''):

                    $make_offer = carforyou_get_option('make_offer');

                    if(!empty($make_offer)) : ?>
    <button type="button" data-toggle="modal" data-target="#make_offer"> <i class="fa fa-money" aria-hidden="true"></i> <?php echo esc_html($make_offer);?> </button>
    <?php endif;endif;

                    $email_friend_enable = carforyou_get_option('email_friend_enable');

                    if($email_friend_enable=='1'|| $email_friend_enable==''):

                    $email_friend = carforyou_get_option('email_friend');

                    if(!empty($email_friend)) : ?>
    <button type="button" data-toggle="modal" data-target="#email_friend"> <i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html($email_friend);?> </button>
    <?php endif;endif;

                     $request_more_enable = carforyou_get_option('request_more_enable');

                    if($request_more_enable=='1'|| $request_more_enable==''):

                    $req_more_Info = carforyou_get_option('request_more_Info');

                    if(!empty($req_more_Info)) : ?>
    <button type="button" data-toggle="modal" data-target="#more_info"> <i class="fa fa-file-text-o" aria-hidden="true"></i> <?php echo esc_html($req_more_Info);?> </button>
    <?php endif;endif; ?>
  </div>
</div>
<?php }		
