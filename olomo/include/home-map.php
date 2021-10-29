<?php

/* ============== Get Home map content ============ */

/* ============== Get child term (tags) in search ============ */
global $olomo_options;
if (!function_exists('olomo_home_map')) {		

	function olomo_home_map(){

		wp_register_script('olomo_home_map', get_template_directory_uri() . '/assets/js/home-map.js', array('jquery') ); 

		wp_enqueue_script('olomo_home_map');

		wp_localize_script( 'olomo_home_map', 'olomo_home_map_object', array( 

			'ajaxurl' => admin_url( 'admin-ajax.php' ),

		));

	}

	if(!is_admin()){

		add_action('init', 'olomo_home_map');

	}

}

if (!function_exists('olomo_home_map_content')) {	

	add_action('wp_ajax_olomo_home_map_content','olomo_home_map_content');

	add_action('wp_ajax_nopriv_olomo_home_map_content', 'olomo_home_map_content');

	function olomo_home_map_content() {
		global $olomo_options;
		$final;

		$lat;

		$long;

		$action = $_POST['trig'];
		
		$country = $_POST['country'];
		$mapShows = $olomo_options['map_shows'];
		if($action == 'home_map'){

			$type = 'listing';

			$args=array(

				'post_type' => $type,

				'post_status' => 'publish',

				'posts_per_page' => -1,

			);

			$my_query = new WP_Query($args);

			if( $my_query->have_posts() ) {

				while ($my_query->have_posts()) : $my_query->the_post();

				if ( has_post_thumbnail()) {

					$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'olomo-blog-grid' );

						if(!empty($image[0])){

							$image = "<a href='".get_the_permalink()."' >

									<img src='" .esc_url($image[0]). "' />

								</a>";

						}	

				}else {

					$image = '<img src="'.esc_url('https://placeholdit.imgix.net/~text?txtsize=33&w=372&h=284').'">';

				}



				$ids = get_the_ID();

				$cats = get_the_terms(get_the_ID(), 'listing-category');										

				foreach ( $cats as $cat ) {

					$category_image1 = listing_get_tax_meta($cat->term_id,'category','image');	

					if(!empty($category_image1)){

						$category_image = listing_get_tax_meta($cat->term_id,'category','image');	

					}

					else{

					$category_image = get_template_directory_uri()."/assets/images/caticon.png";		

					}

				}

				$gAddress = listing_get_metabox('gAddress');

				$url = get_the_permalink();

				$lat = listing_get_metabox('latitude');

				$long = listing_get_metabox('longitude');
				
				$split = explode(" ", $gAddress);
				
				$lastword = $split[count($split)-1];
				if($mapShows == 'visitor')
				{
				if($lastword == $country)
				{

				$output[$ids] = array("latitude"=>$lat,"longitude"=>$long,"title"=>get_the_title(),"icon"=>$category_image,"address"=>$gAddress,"url"=>$url,"image"=>$image,"mapshows"=>$mapShows);
				}
				}
				else
				{
				$output[$ids] = array("latitude"=>$lat,"longitude"=>$long,"title"=>get_the_title(),"icon"=>$category_image,"address"=>$gAddress,"url"=>$url,"image"=>$image,"mapshows"=>$mapShows);	
				}
				endwhile;

				wp_reset_query();	

			}

		}

		$final = json_encode($output);

		die($final);

	}

}