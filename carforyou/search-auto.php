<?php
/**
 *Template Name: Search Auto
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
if(isset($_REQUEST['searchauto'])){
	
if (!isset( $_REQUEST['style1_nonce'] ) || ! wp_verify_nonce( $_REQUEST['style1_nonce'], 'style1_value' )) {	
  wp_redirect( '404-page' );	
  //print '<p><h3><a><center>Sorry, your nonce did not verify.</center></a><h3><p>';	
 //exit;
}
  
}
get_header();
carforyou_inner_header();
$tax_query='';
$meta_query='';
$tax_count='';
session_start();

if(isset($_REQUEST['searchauto'])){
		
	unset($_SESSION['location1']);
	unset($_SESSION['autobrand1']);
	unset($_SESSION['automodel1']);
	unset($_SESSION['modelyear1']);
	unset($_SESSION['min_price1']);
	unset($_SESSION['max_price1']);
	unset($_SESSION['autotype1']);
	unset($_SESSION['fueltype1']);
	unset($_SESSION['automilage1']);
	unset($_SESSION['autoseat1']);
	unset($_SESSION['autotransmission1']);
	unset($_SESSION['autoowner1']);
	unset($_SESSION['autoengine1']);
	unset($_SESSION['autotank1']);
	
$location_enalble = carforyou_get_option('location_enalble');
if($location_enalble=='1'|| $location_enalble==''):	
	$location = $_REQUEST['location'];
	if(!empty($location)):
	$_SESSION['location1'] = $_REQUEST['location'];
	
	endif;	
	
else:
endif;	
$brand_enalble = carforyou_get_option('brand_enalble');
if($brand_enalble=='1'|| $brand_enalble==''):	
	$autobrand = $_REQUEST['autobrand'];
	$automodel = $_REQUEST['automodel'];
	if(!empty($autobrand)):
	$_SESSION['autobrand1'] = $_REQUEST['autobrand'];
	$_SESSION['automodel1'] = $_REQUEST['automodel'];
	
	endif;
else:
$autobrand='';	
$automodel='';	
endif;
$year_enalble = carforyou_get_option('year_enalble');
if($year_enalble=='1'|| $year_enalble==''):	
	$modelyear = $_REQUEST['modelyear'];
	if(!empty($modelyear)):
	$_SESSION['modelyear1'] = $_REQUEST['modelyear'];
	
	
	endif;
else:
$modelyear='';	
endif;	
$price_enalble = carforyou_get_option('price_enalble');
if($price_enalble=='1'|| $price_enalble==''):	
	$priceRange = $_REQUEST['priceRange'];
	$price1= explode(',',$priceRange); 
	$min_price= $price1['0'];
	$max_price =$price1['1'];
	if(!empty($priceRange)):
	$_SESSION['min_price1'] = $min_price;
	$_SESSION['max_price1'] = $max_price;
	
	
	
	endif;
else:
$priceRange='';	
$min_price='';
$max_price='';
endif;	
$type_enalble = carforyou_get_option('type_enalble');
if($type_enalble=='1'|| $type_enalble==''):	
	$autotype = $_REQUEST['autotype'];
	if(!empty($autotype)):
	$_SESSION['autotype1'] = $_REQUEST['autotype'];
	endif;
else:
$autotype='';	
endif;

// ADDED VEHICLE FUEL TYPE IN SEARCH FILTER //
$fuel_enalble = carforyou_get_option('fuel_enalble');
if($fuel_enalble=='1'|| $fuel_enalble==''):	
	$fueltype = $_REQUEST['fueltype'];
	if(!empty($fueltype)):
	$_SESSION['fueltype1'] = $_REQUEST['fueltype'];
	endif;
else:
$fueltype='';	
endif;	


$milage_enalble_ad = carforyou_get_option('milage_enalble_ad');
if($milage_enalble_ad=='1'|| $milage_enalble_ad==''):	
	$milage = $_REQUEST['automilage'];
	if(!empty($milage)):
	$_SESSION['automilage1'] = $_REQUEST['automilage'];
	
	
	endif;
else:
$milage='';	
endif;	

$ceat_capacity_enalble_ad = carforyou_get_option('ceat_capacity_enalble_ad');
if($ceat_capacity_enalble_ad=='1'|| $ceat_capacity_enalble_ad==''):	
	$seat = $_REQUEST['autoseat'];
	if(!empty($seat)):
	$_SESSION['autoseat1'] = $_REQUEST['autoseat'];
	
	
	endif;
else:
$seat='';	
endif;	

$transmission_enalble_ad = carforyou_get_option('transmission_enalble_ad');
if($transmission_enalble_ad=='1'|| $transmission_enalble_ad==''):	
	$trans = $_REQUEST['autotransmission'];
	if(!empty($trans)):
	$_SESSION['autotransmission1'] = $_REQUEST['autotransmission'];
	
	
	endif;
else:
$trans='';	
endif;	

$owner_enalble_ad = carforyou_get_option('owner_enalble_ad');
if($owner_enalble_ad=='1'|| $owner_enalble_ad==''):	
	$owner = $_REQUEST['autoowner'];
	if(!empty($modelyear)):
	$_SESSION['autoowner1'] = $_REQUEST['autoowner'];
	
	
	endif;
else:
$owner='';	
endif;	

$engine_enalble_ad = carforyou_get_option('engine_enalble_ad');
if($engine_enalble_ad=='1'|| $engine_enalble_ad==''):	
	$engine = $_REQUEST['autoengine'];
	if(!empty($engine)):
	$_SESSION['autoengine1'] = $_REQUEST['autoengine'];
	
	
	endif;
else:
$engine='';	
endif;	

$fuel_tank_enalble_ad = carforyou_get_option('fuel_tank_enalble_ad');
if($fuel_tank_enalble_ad=='1'|| $fuel_tank_enalble_ad==''):	
	$tank = $_REQUEST['autotank'];
	if(!empty($tank)):
	$_SESSION['autotank1'] = $_REQUEST['autotank'];
	
	
	endif;
else:
$tank='';	
endif;	

// END HERE //	
	  $tax_query =array();
	  $meta_query =array();
		if($autobrand){
		  $tax_query[] = array (
			 'taxonomy'  => 'auto-brand',
			 'field'     => 'slug',
			 'terms'     => $autobrand
		 );
		}
		
		if($modelyear){
		  $tax_query[] = array (
			  'taxonomy'  => 'year-model',
			  'field'     => 'slug',
			  'terms'     => $modelyear
		   );
		}
	   
	   if($autotype){
		  $tax_query[] = array (
			  'taxonomy'  => 'type-car',
			  'field'     => 'slug',
			  'terms'     => $autotype
		   );
		}
		  if($fueltype){
		  $meta_query[] = array (
			  'key'  => 'DREAM_fuel_type',
			  'value'     => $fueltype,
			  'compare'     => '='
		   );
		}
		
		if($location){
		  $meta_query[] = array (
			  'key'  => 'DREAM_auto_address',
			  'value'     => $location,
			  'compare'     => 'LIKE'
		   );
		}
		
		if($milage){
			if($milage == '0-5kmpl'){
				$first_val= 0;
				$second_val = 5;
			}
			if($milage == '6-10kmpl'){
				$first_val= 6;
				$second_val = 10;
			}
			if($milage == '11-15kmpl'){
				$first_val= 11;
				$second_val = 15;
			}
			if($milage == '+16kmpl'){
				$first_val= 16;
				$second_val = 50;
			}
		  $meta_query[] = array (
			  'key'  => 'DREAM_auto_mileage_city',
			  'value'     => array( $first_val, $second_val),
			  'compare'     => 'BETWEEN',
			  'type'    => 'NUMERIC', 
		   );
		}
		
		
		if($seat){
		  $meta_query[] = array (
			  'key'  => 'DREAM_auto_seat_capacity',
			  'value'     => $seat,
			  'compare'     => '='
		   );
		}
		
		if($trans){
		  $meta_query[] = array (
			  'key'  => 'DREAM_auto_transmission',
			  'value'     => $trans,
			  'compare'     => '='
		   );
		}
		
		if($owner){
		  $meta_query[] = array (
			  'key'  => 'DREAM_auto_no_of_Owners',
			  'value'     => $owner,
			  'compare'     => '='
		   );
		}
		
		if($engine){
			if($engine == '0-100KW'){
				$first_val= 0;
				$second_val = 100;
			}
			if($engine == '101-200KW'){
				$first_val= 101;
				$second_val = 200;
			}
			if($engine == '+201KW'){
				$first_val= 201;
				$second_val = 500;
			}
		  $meta_query[] = array (
			  'key'  => 'DREAM_auto_engine',
			  'value'     => array( $first_val, $second_val),
			  'compare'     => 'BETWEEN',
			  'type'    => 'NUMERIC',
		   );
		}
		
		if($tank){
			if($tank == '0-50(Liters)'){
				$first_val= 0;
				$second_val = 50;
			}
			if($tank == '51-100(Liters)'){
				$first_val= 51;
				$second_val = 100;
			}
			if($tank == '101-150(Liters)'){
				$first_val= 101;
				$second_val = 150;
			}
			if($tank == '+151(Liters)'){
				$first_val= 151;
				$second_val = 500;
			}
		  $meta_query[] = array (
			  'key'  => 'DREAM_auto_fuel_tank_capacity',
			  'value'     => array( $first_val, $second_val),
			  'compare'     => 'BETWEEN',
			  'type'    => 'NUMERIC',
		   );
		}
	/* Logic for Auto Condition Parameters */ 
	if((!empty($_GET['fueltype'])) && ( $_GET['fueltype'] != 'any' ) ){
	$meta_query[] = array(
			'key' => 'DREAM_fuel_type',
			'value' => $_GET['fueltype'],
			'compare' => '=',
		);
		}
	if((!empty($_GET['automodel'])) && ( $_GET['automodel'] != 'any' ) ){
		$meta_query[] = array(
			'key' => 'DREAM_auto_model',
			'value' => $_GET['automodel'],
			'compare' => '=',
		);
	}	
	/* Logic for Auto Condition Parameters */ 
	if((!empty($_GET['typeofcar'])) && ( $_GET['typeofcar'] != 'any' ) ){
		$meta_query[] = array(
			'key' => 'DREAM_auto_condition',
			'value' => $_GET['typeofcar'],
			'compare' => '=',
		);
	}
	/* Logic for Min and Max Price Parameters */
	if( $min_price >= 0 && $max_price > $min_price ){
	$meta_query[] = array(
		'key' => 'DREAM_auto_price',
		'value' => array( $min_price, $max_price ),
		'type' => 'NUMERIC',
		'compare' => 'BETWEEN'
	);
	}
	if( $tax_count > 1 ){
		$tax_query['relation'] = 'AND';
	}
	if( $tax_count > 0 ){
		$tax_query['tax_query'] = $tax_query;
	}
}
/*if(!empty($_SESSION["location1"])){
	$tax_query[] = array (
			 'taxonomy'  => 'auto-location',
			 'field'     => 'slug',
			 'terms'     => $_SESSION["location1"]
		 );
}*/
/*if(!empty($_SESSION["autobrand1"])){
	$tax_query[] = array (
			 'taxonomy'  => 'auto-brand',
			 'field'     => 'slug',
			 'terms'     => $_SESSION["autobrand1"]
		 );
}*/
/*if(!empty($_SESSION["modelyear1"])){
	$tax_query[] = array (
			 'taxonomy'  => 'year-model',
			 'field'     => 'slug',
			 'terms'     => $_SESSION["modelyear1"]
		 );
}*/
/*if(!empty($_SESSION["autotype1"])){
	$tax_query[] = array (
			 'taxonomy'  => 'type-car',
			 'field'     => 'slug',
			 'terms'     => $_SESSION["autotype1"]
		 );
}*/
/*if(!empty($_SESSION["automodel1"])){
		$meta_query[] = array(
			'key' => 'DREAM_auto_model',
			'value' => $_SESSION["automodel1"],
			'compare' => '=',
		);
	}	
	if(!empty($_SESSION["fueltype1"])){
		$meta_query[] = array(
			'key' => 'DREAM_fuel_type',
			'value' => $_SESSION["fueltype1"],
			'compare' => '=',
		);
	}
	
	/* Logic for Min and Max Price Parameters */
	/*if( $_SESSION["min_price1"] >= 0 && $_SESSION["max_price1"] > $_SESSION["min_price1"] ){
	$meta_query[] = array(
		'key' => 'DREAM_auto_price',
		'value' => array( $_SESSION["min_price1"], $_SESSION["max_price1"] ),
		'type' => 'NUMERIC',
		'compare' => 'BETWEEN'
	);
	}*/
	if( $tax_count > 1 ){
		$tax_query['relation'] = 'AND';
	}
	if( $tax_count > 0 ){
		$tax_query['tax_query'] = $tax_query;
	}
	
?>
<section class="listing-page">
	<div class="container">
    	<div class="row">
			<?php
            $sidebar = carforyou_get_option('car_listing_sidebar');
            if($sidebar=='car_list_right'):
                $page_grid="col-md-9";
                $side_grid="col-md-3";
            else:
                $page_grid="col-md-9 col-md-push-3";
                $side_grid="col-md-3 col-md-pull-9";
            endif;
			?> 
    		<div class="<?php echo esc_attr($page_grid); ?>">
                <div class="result-sorting-wrapper">
                    <div class="sorting-count">
                        <?php     
                        global $post;
						 $filtertax_count = "";
						$filtertax_query =array('relation' => 'AND' ,);
	$filtermeta_query =array('relation' => 'AND' ,);
		if($_REQUEST["autobrand_1"]){
		  $filtertax_query[] = array (
			 'taxonomy'  => 'auto-brand',
			 'field'     => 'slug',
			 'terms'     => $_REQUEST["autobrand_1"]
		 );
		}
		if($_REQUEST["lock"]){
		  $filtertax_query[] = array ( 
			'taxonomy'=>'auto-location',
			 'field'=>'slug',
			 'terms'=>$_REQUEST["lock"] );
		}
		if($_REQUEST["modelyear_1"]){
		  $filtertax_query[] = array (
			  'taxonomy'  => 'year-model',
			  'field'     => 'slug',
			  'terms'     => $_REQUEST["modelyear_1"]
		   );
		}
	   
	   if($_REQUEST["autotype_1"]){
		  $filtertax_query[] = array (
			  'taxonomy'  => 'type-car',
			  'field'     => 'slug',
			  'terms'     => $_REQUEST["autotype_1"]
		   );
		}
		if($_REQUEST['automodel_1'] ){
		$filtermeta_query[] = array(
			'key' => 'DREAM_auto_model',
			'value' => $_REQUEST['automodel_1'],
			'compare' => '=',
		);
	}	
	if($_REQUEST['fueltype_1'] ){
		$filtermeta_query[] = array( 
			'key' => 'DREAM_fuel_type',
			'value' => $_REQUEST['fueltype_1'],
			//'type' => '',
		    'compare' => '=',
		);
	}	

	
		if($_REQUEST["min_price_1"] >= 0 && $_REQUEST["max_price_1"] > $_REQUEST["min_price_1"] ){
		$filtermeta_query[] = array(
		'key' => 'DREAM_auto_price',
		'value' => array( $_REQUEST["min_price_1"], $_REQUEST["max_price_1"] ),
		'type' => 'NUMERIC',
		'compare' => 'BETWEEN'
	);
	}
		if( $filtertax_count > 1 ){
		$filtertax_query['relation'] = 'AND';
			}
		if( $filtertax_count > 0 ){
			$filtertax_query['tax_query'] = $filtertax_query;
			}
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						
						$price_order= $_REQUEST['vehicle_order'];
					if($price_order=='Asc'):
	                //$args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'meta_key' => 'DREAM_auto_price', 'orderby' => 'meta_value_num', 'orderby'=> 'title', 'order' => 'ASC', 'paged' =>$paged);
					
					$args = array('post_type' => 'auto',  'orderby' => 'title',
						'order' => 'ASC','tax_query' => $filtertax_query, 'meta_query' =>$filtermeta_query, 'compare' => 'LIKE','paged' =>$paged, 'posts_per_page'=>9);
						
					elseif($price_order=='price_low'):		
                     //$args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'meta_key' => 'DREAM_auto_price', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'paged' =>$paged);
					 
					 $args = array('post_status' => 'publish', 'post_type' => 'auto', 'meta_key' => 'DREAM_auto_price', 'tax_query' => $filtertax_query, 'meta_query' =>$filtermeta_query, 'orderby' => 'meta_value_num', 'order' => 'ASC', 'compare' => 'LIKE','paged' =>$paged, 'posts_per_page'=>9);

										
                    elseif($price_order=='price_high'):
                     //$args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'meta_key' => 'DREAM_auto_price', 'orderby' => 'meta_value_num', 'order' => 'DESC', 'paged' =>$paged);	
					 
					$args = array('post_status' => 'publish', 'post_type' => 'auto', 'meta_key' => 'DREAM_auto_price', 'tax_query' => $filtertax_query, 'meta_query' =>$filtermeta_query, 'orderby' => 'meta_value_num', 'order' => 'DESC', 'compare' => 'LIKE','paged' =>$paged, 'posts_per_page'=>9);
					
               
				 
                    elseif($price_order=='newItem'):
                      //$args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'order' => 'DESC', 'paged' =>$paged);	
					  $args = array('post_type' => 'auto', 'post_status' => 'publish', 'order' => 'DESC', 'tax_query' => $filtertax_query, 'meta_query' =>$filtermeta_query ,'compare' => 'LIKE','paged' =>$paged, 'posts_per_page'=>9);
                    elseif($price_order=='oldItem'):
                      //$args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'order' => 'ASC', 'paged' =>$paged);
					
					$args = array('post_type' => 'auto', 'post_status' => 'publish', 'order' => 'ASC', 'tax_query' => $filtertax_query, 'meta_query' =>$filtermeta_query ,'compare' => 'LIKE','paged' =>$paged, 'posts_per_page'=>9);
                   
					else:	
                        $args = array('post_type' => 'auto',  'orderby' => 'title',
						'order' => 'ASC','tax_query' => $tax_query, 'meta_query' =>$meta_query, 'compare' => 'LIKE','paged' =>$paged, 'posts_per_page'=>9);
					 endif;
					
                        $wp_query = new WP_Query($args); ?>
                        	<p><?php echo esc_html($wp_query->found_posts); ?> <span> <?php esc_html_e('Listings','carforyou'); ?></span></p>
                     </div>  
                     <?php carforyou_FilterbyOrder(); ?>
                </div>
                <div class="product_listing_item">
				
			  <?php 
			 
			 
				if(isset($_REQUEST['vehicle_order'])):  
	
                    global $post;
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $price_order= $_REQUEST['vehicle_order'];
					if($price_order=='Asc'):
	                //$args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'meta_key' => 'DREAM_auto_price', 'orderby' => 'meta_value_num', 'orderby'=> 'title', 'order' => 'ASC', 'paged' =>$paged);
					
					$args = array('post_type' => 'auto',  'orderby' => 'title',
						'order' => 'ASC','tax_query' => $filtertax_query, 'meta_query' =>$filtermeta_query, 'compare' => 'LIKE','paged' =>$paged, 'posts_per_page'=>9);
						
					elseif($price_order=='price_low'):		
                     //$args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'meta_key' => 'DREAM_auto_price', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'paged' =>$paged);
					 
					 $args = array('post_status' => 'publish', 'post_type' => 'auto', 'meta_key' => 'DREAM_auto_price', 'tax_query' => $filtertax_query, 'meta_query' =>$filtermeta_query, 'orderby' => 'meta_value_num', 'order' => 'ASC', 'compare' => 'LIKE','paged' =>$paged, 'posts_per_page'=>9);

										
                    elseif($price_order=='price_high'):
                     //$args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'meta_key' => 'DREAM_auto_price', 'orderby' => 'meta_value_num', 'order' => 'DESC', 'paged' =>$paged);	
					 
					$args = array('post_status' => 'publish', 'post_type' => 'auto', 'meta_key' => 'DREAM_auto_price', 'tax_query' => $filtertax_query, 'meta_query' =>$filtermeta_query, 'orderby' => 'meta_value_num', 'order' => 'DESC', 'compare' => 'LIKE','paged' =>$paged, 'posts_per_page'=>9);
					
               
				 
                    elseif($price_order=='newItem'):
                      //$args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'order' => 'DESC', 'paged' =>$paged);	
					  $args = array('post_type' => 'auto', 'post_status' => 'publish', 'order' => 'DESC', 'tax_query' => $filtertax_query, 'meta_query' =>$filtermeta_query ,'compare' => 'LIKE','paged' =>$paged, 'posts_per_page'=>9);
                    else:
                      //$args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'order' => 'ASC', 'paged' =>$paged);
					
					$args = array('post_type' => 'auto', 'post_status' => 'publish', 'order' => 'ASC', 'tax_query' => $filtertax_query, 'meta_query' =>$filtermeta_query ,'compare' => 'LIKE','paged' =>$paged, 'posts_per_page'=>9);
                    endif;
					
                    $wp_query = new WP_Query($args);
                    while ( $wp_query->have_posts() ) : $wp_query->the_post();
					carforyou_search_style();    
                    endwhile; 
                    carforyou_pagination(); 	 
					elseif(isset($_REQUEST['searchauto'])):
					global $post;
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array('post_type' => 'auto', 'orderby' => 'title','order' => 'ASC','tax_query' => $tax_query, 'meta_query' =>$meta_query, 'compare' => 'LIKE','paged' =>$paged, 'posts_per_page'=>9);
					
					$wp_query = new WP_Query($args);
					if(have_posts()) {
					while ($wp_query ->have_posts()) : $wp_query ->the_post();
						carforyou_search_style();
	            
					endwhile;
				    carforyou_pagination();
					}
					else{ ?>
                    	<h2 class="text-center"><?php esc_html_e('Sorry No Results, please try again.','carforyou'); ?></h2>
					<?php 
					} 
					else:
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array( 'post_type' => 'auto','paged' =>$paged, 'posts_per_page'=>9);
					$my_query1  = new WP_Query( $args );
					while ( $my_query1 ->have_posts() ) : $my_query1 ->the_post();
						carforyou_search_style();
					endwhile;
						carforyou_pagination(); 
					endif;
					?>
              </div>
        </div>
            <aside class="<?php echo esc_attr($side_grid); ?>">
				<?php carforyou_listpagesidebar(); ?>
           </aside>	
        </div>
    </div> 
</section>
<?php get_footer();?>