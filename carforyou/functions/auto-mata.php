<?php

/**

 * functions hooks

 * @package WordPress

 * @subpackage carforyou

 * @since carforyou 2.5

 */

function carforyou_featuredList(){ ?>
<?php 
$optKmMiles= carforyou_get_option('optKmMiles');
if($optKmMiles=='2'):
	$KmMiles=" Miles";
else:
	$KmMiles=" km";
endif;                  
$km_done = get_post_meta(get_the_ID(), 'DREAM_auto_km_done', true);
if(!empty($km_done)): 
	 echo '<li><i class="fa fa-tachometer" aria-hidden="true"></i>'.number_format_i18n(esc_html($km_done)).''.$KmMiles.'</li>';
endif;
$fuel_type = get_post_meta(get_the_ID(), 'DREAM_fuel_type', true);
if(!empty($fuel_type)): 
	 echo '<li><i class="fa fa-car" aria-hidden="true"></i>'.esc_html($fuel_type).'</li>';
endif;
$term_list = wp_get_post_terms(get_the_ID(), 'year-model', array("fields" => "all"));
		foreach($term_list as $term_single) 
		$year_model = $term_single->name;
            if(!empty($year_model)): 
				echo '<li><i class="fa fa-calendar" aria-hidden="true"></i>'.esc_html($year_model).'</li>';
		    endif;
$engine = get_post_meta(get_the_ID(), 'DREAM_auto_engine', true);
if(!empty($engine)):
			echo '<li><i class="fa fa-superpowers" aria-hidden="true"></i>'.esc_html($engine).'</li>'; 
endif;
$seats = get_post_meta(get_the_ID(), 'DREAM_auto_seat_capacity', true);
if(!empty($seats)): 
	 echo '<li><i class="fa fa-user" aria-hidden="true"></i>'.esc_html($seats).'seats</li>';
endif;
$transmission = get_post_meta(get_the_ID(), 'DREAM_auto_transmission', true);
if(!empty($transmission)):
			echo '<li><i class="fa fa-road" aria-hidden="true"></i>'.esc_html($transmission).'</li>'; 
endif;

 }

 

// AutoType 
function carforyou_AutoType(){
	$term_list1 = wp_get_post_terms(get_the_ID(), 'type-car', array("fields" => "names"));
							  foreach($term_list1 as $termlist) {
								 // print_r($termlist);
							  echo '<div class="label_icon">'.$termlist.'</div>';
							  } 
}
