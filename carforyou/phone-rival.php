<?php
/**
 * Template Name:Compare Page 
*/
get_header(); ?>
<!--Page Header-->
<?php carforyou_inner_header(); ?>
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
<section class="compare-page inner_pages">
  <div class="container">
    <div class="compare_info">
      <h4>
        <?php esc_html_e('Compare: ','carforyou'); ?>
        <span id="auto_title_1"></span> <span id="auto_title_2"></span> <span id="auto_title_3"></span></h4>
      <div class="compare_product_img">
        <div class="inventory_info_list">
          <ul>
            <li>
              <div id="filter_toggle" class="search_other_inventory"><i class="fa fa-search" aria-hidden="true"></i>
                <?php esc_html_e('Search Other Inventory','carforyou'); ?>
              </div>
              <div class="reset_all_btn"> <a onclick="javascript:resectData();"  class="btn btn-xs">
                <?php esc_html_e('Reset All','carforyou'); ?>
                </a> </div>
            </li>
            <li> <a href="#" class="auto_link_1"><img id="pro_img_1" src="<?php echo esc_url( get_template_directory_uri() )?>/assets/images/auto-img.png" alt="auto-img"></a>
              <div class="more_compare_btn"> <a  id="resetPhone1" href="javascript:void()" class="btn btn-xs">
                <?php esc_html_e('Reset Auto','carforyou'); ?>
                </a> <a id="replace1" href="javascript:void()" class="btn btn-xs">
                <?php esc_html_e('Replace','carforyou'); ?>
                </a> </div>
              <div id="project_search_1" class="hiddens">
                <input id="autoSearch_1"/>
              </div>
            </li>
            <li> <a href="#" class="auto_link_2"><img id="pro_img_2" src="<?php echo esc_url( get_template_directory_uri() )?>/assets/images/auto-img.png" alt="auto-img"></a>
              <div class="more_compare_btn"> <a id="resetPhone2" href="javascript:void()" class="btn btn-xs">
                <?php esc_html_e('Reset Auto','carforyou');?>
                </a> <a id="replace2" href="javascript:void()" class="btn btn-xs">
                <?php esc_html_e('Replace','carforyou'); ?>
                </a> </div>
              <div id="project_search_2" class="hiddens">
                <input id="autoSearch_2"/>
              </div>
            </li>
            <li> <a href="#" class="auto_link_3"><img id="pro_img_3" src="<?php echo esc_url( get_template_directory_uri() )?>/assets/images/auto-img.png" alt="auto-img"></a>
              <div class="more_compare_btn"> <a id="resetPhone3" href="javascript:void()" class="btn btn-xs">
                <?php esc_html_e('Reset Auto','carforyou'); ?>
                </a> <a id="replace3" href="javascript:void()" class="btn btn-xs">
                <?php esc_html_e('Replace','carforyou'); ?>
                </a> </div>
              <div id="project_search_3" class="hiddens">
                <input id="autoSearch_3"/>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="compare_product_title gray-bg">
        <table>
          <tr>
            <td><?php esc_html_e('Compare','carforyou'); ?>
              <br>
              <?php esc_html_e('Inventorys','carforyou'); ?>
              <span class="td_divider"></span></td>
            <td><a href="#" class="auto_link_1"><span id="phone1"></span></a>
              <p class="price">
                <?php carforyou_curcy_prefix(); ?>
                <span id="auto_price_1"></span></p>
              <span class="vs">
              <?php esc_html_e('V/s','carforyou'); ?>
              </span></td>
            <td><a href="#" class="auto_link_2"><span id="phone2"></span></a>
              <p class="price">
                <?php carforyou_curcy_prefix(); ?>
                <span id="auto_price_2"></span></p>
              <span class="vs">
              <?php esc_html_e('V/s','carforyou'); ?>
              </span></td>
            <td><a href="#" class="auto_link_3"><span id="phone3"></span></a>
              <p class="price">
                <?php carforyou_curcy_prefix(); ?>
                <span id="auto_price_3"></span></p></td>
          </tr>
        </table>
      </div>
      <div class="compare_product_info"> 
        
        <!--Basic-Info-Table-->
        
        <table>
          <thead>
            <tr>
              <th><?php esc_html_e('BASIC INFO','carforyou'); ?></th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php esc_html_e('Vehicle Condition','carforyou'); ?></td>
              <td id="auto_condition_1"></td>
              <td id="auto_condition_2"></td>
              <td id="auto_condition_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('Brand','carforyou'); ?></td>
              <td id="auto_brand_1"></td>
              <td id="auto_brand_2"></td>
              <td id="auto_brand_3"></td>
            </tr>
			<tr>
              <td><?php esc_html_e('Model Year','carforyou'); ?></td>
              <td id="auto_model_year_1"></td>
              <td id="auto_model_year_2"></td>
              <td id="auto_model_year_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('Model','carforyou'); ?></td>
              <td id="auto_model_1"></td>
              <td id="auto_model_2"></td>
              <td id="auto_model_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('No. of Owners','carforyou'); ?></td>
              <td id="auto_NoOwner_1"></td>
              <td id="auto_NoOwner_2"></td>
              <td id="auto_NoOwner_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('KMs Driven','carforyou'); ?></td>
              <td id="auto_kms_done_1"></td>
              <td id="auto_kms_done_2"></td>
              <td id="auto_kms_done_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('Fuel Type','carforyou'); ?></td>
              <td id="auto_FuelType_1"></td>
              <td id="auto_FuelType_2"></td>
              <td id="auto_FuelType_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('Body Color','carforyou'); ?></td>
              <td id="auto_body_color_1"></td>
              <td id="auto_body_color_2"></td>
              <td id="auto_body_color_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('Auto Location','carforyou'); ?></td>
              <td id="auto_location_1"></td>
              <td id="auto_location_2"></td>
              <td id="auto_location_3"></td>
            </tr>
          </tbody>
        </table>
        
        <!--Technical-Specification-Table-->
        
        <table>
          <thead>
            <tr>
              <th><?php esc_html_e('Technical Specification','carforyou'); ?></th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php esc_html_e('Engine Type','carforyou'); ?></td>
              <td id="auto_EngineType_1"></td>
              <td id="auto_EngineType_2"></td>
              <td id="auto_EngineType_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('Compare','carforyou'); ?>
                Engine Description</td>
              <td id="auto_EngineDesc_1"></td>
              <td id="auto_EngineDesc_2"></td>
              <td id="auto_EngineDesc_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('No. of Cylinders','carforyou'); ?></td>
              <td id="auto_NoCylinder_1"></td>
              <td id="auto_NoCylinder_2"></td>
              <td id="auto_NoCylinder_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('Mileage-City','carforyou'); ?></td>
              <td id="auto_MileageCity_1"></td>
              <td id="auto_MileageCity_2"></td>
              <td id="auto_MileageCity_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('Mileage-Highway','carforyou'); ?></td>
              <td id="auto_MileageHighway_1"></td>
              <td id="auto_MileageHighway_2"></td>
              <td id="auto_MileageHighway_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('Fuel Tank Capacity','carforyou'); ?></td>
              <td id="auto_FuelTank_1"></td>
              <td id="auto_FuelTank_2"></td>
              <td id="auto_FuelTank_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('Seating Capacity','carforyou'); ?></td>
              <td id="seat_capacity_1"></td>
              <td id="seat_capacity_2"></td>
              <td id="seat_capacity_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('Transmission Type','carforyou'); ?></td>
              <td id="auto_transmission_1"></td>
              <td id="auto_transmission_2"></td>
              <td id="auto_transmission_3"></td>
            </tr>
          </tbody>
        </table>
        
        <!--Accessories-->
        
        <table>
          <thead>
            <tr>
              <th><?php esc_html_e('Accessories','carforyou'); ?></th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php esc_html_e('Air Conditioner','carforyou'); ?></td>
              <td id="auto_air_condi_1"></td>
              <td id="auto_air_condi_2"></td>
              <td id="auto_air_condi_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('AntiLock Braking System','carforyou'); ?></td>
              <td id="braking_system_1"></td>
              <td id="braking_system_2"></td>
              <td id="braking_system_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('Power Steering','carforyou'); ?></td>
              <td id="power_steering_1"></td>
              <td id="power_steering_2"></td>
              <td id="power_steering_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('Power Windows','carforyou'); ?></td>
              <td id="power_window_1"></td>
              <td id="power_window_2"></td>
              <td id="power_window_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('CD Player','carforyou'); ?></td>
              <td id="CD_player_1"></td>
              <td id="CD_player_2"></td>
              <td id="CD_player_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('Leather Seats','carforyou'); ?></td>
              <td id="leather_seats_1"></td>
              <td id="leather_seats_2"></td>
              <td id="leather_seats_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('Central Locking','carforyou'); ?></td>
              <td id="central_locking_1"></td>
              <td id="central_locking_2"></td>
              <td id="central_locking_3"></td>
            </tr>
            <tr>
              <td><?php esc_html_e('Power Door Locks','carforyou'); ?></td>
              <td id="door_lock_1"></td>
              <td id="door_lock_2"></td>
              <td id="door_lock_3"></td>
            </tr>
          </tbody>
        </table>
        <div class="inventory_info_list text-center">
          <ul>
            <li>&nbsp;</li>
            <li><a href="#" class="btn auto_link_1">
              <?php esc_html_e('View Detail','carforyou'); ?>
              </a></li>
            <li><a href="#" class="btn auto_link_2">
              <?php esc_html_e('View Detail','carforyou'); ?>
              </a></li>
            <li><a href="#" class="btn auto_link_3">
              <?php esc_html_e('View Detail','carforyou'); ?>
              </a></li>
          </ul>
        </div>
      </div>
      <div class="hidden">
        <input id="p1" value=""/>
        <input id="p2" value=""/>
        <input id="p3" value=""/>
      </div>
    </div>
  </div>
</section>
<?php
if (function_exists('carforyou_Compare_List')):
	carforyou_Compare_List();
endif;
if (function_exists('carforyou_Compare_getData')):
	carforyou_Compare_getData();
endif;
get_footer();
