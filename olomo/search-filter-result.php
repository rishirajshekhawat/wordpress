<?php 



/*



Template Name: Search Filter Result



*/



get_header(); 



global $olomo_options;



	$listing_style = '';



		$listing_style = $olomo_options['listing_style'];



		if(isset($_GET['list-style']) && !empty($_GET['list-style'])){



			$listing_style = $_GET['list-style'];



		}



		



			if($listing_style == 'half_map_listing'){



				$listing_style = 'col-md-6 col-sm-6';



				$postGridnumber = 2;



			}



			elseif($listing_style == 'listing_advertisement_sidebar_listing'){



				



				$listing_style = 'col-md-6 col-sm-6';



				$postGridnumber =2;



				



			}



			else{



				$listing_style = 'col-md-4 col-sm-6';



				$postGridnumber =3;



			}



		



?>



<!-- Inner-Banner -->



<script>



jQuery(document).ready(function() {



  jQuery('#order_list').on('change', function() {



     document.forms['sortinglisting'].submit();



  });



});



</script>







<?php if(has_post_thumbnail()){ ?>

<section id="inner_banner" class="parallex-bg" style="background:url(<?php echo the_post_thumbnail_url( 'full' ); ?>)">

<?php } else { ?>

<section id="inner_banner" class="parallex-bg" style="background:url(<?php echo site_url(); ?>/wp-content/themes/olomo/assets/images/page-banner.jpg)">

<?php } ?>



  <div class="container">



    <div class="white-text text-center div_zindex">



      <h1>



        <?php single_post_title();?>



      </h1>



    </div>



  </div>



  <div class="dark-overlay"></div>



</section>







<!-- /Inner-Banner -->



<section id="inner_pages"> 



  <div class="container">



    <div class="row">



      <div class="col-md-4 col-sm-12 col-sx-12">



        <div class="search-sidebar">



          <div class="search-heading-zone"> <i class="fa fa-search" aria-hidden="true"></i> <span class="h4"><?php echo esc_html__('Search Filters', 'olomo'); ?></span> </div>



          <aside class="listing-widget-sidebar">



            <?php  echo do_shortcode('[search-filter-sidebar]'); ?>



          </aside>



        </div>



      </div>



     



          <?php 



		  



if(isset($_REQUEST['listing_order']))



{







	//$ratingRange = array();



	$category = $_REQUEST['category'];



	$status = $_REQUEST['status'];



	$search_by_title = $_REQUEST['search_by_title'];



	$gAddress = $_REQUEST['gAddress'];



	$location = $_REQUEST['location'];



	$search_by_tags_keywords = $_REQUEST['search_by_tags_keywords'];



	$priceRange = $_REQUEST['priceRange'];



	$ratingFrom = $_REQUEST['ratingFrom'];



	$ratingTo = $_REQUEST['ratingTo'];



	$parts = preg_split('/(?:"[^"]*"|)\K\s*(,\s*|$)/', $priceRange);



	//print_r($parts);



	//echo $parts[0];



	//echo $parts[1];



	$t=date('d-m-Y');



    $today_day = date("l",strtotime($t));



	if($status == 'open')



	{



		$open = $today_day;



	}



	elseif($status == 'closed')



	{



		$close = $today_day;



	}



	



	







	if($_REQUEST['listing_order'] == 'newItem')



 {



	$order = 'DESC';



 }



 elseif($_REQUEST['listing_order'] == 'oldItem')



 {



	



	$order = 'ASC';



 }



 elseif($_REQUEST['listing_order'] == 'Asc')



 { 



	$order = 'ASC';



	$orderby = 'title';



 }



$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;



  $args = array(  



		'post_type' => 'listing', 



		'posts_per_page' => 10, 



		'orderby'=> $orderby,



		'order' => $order,



		'paged' => $paged,



		



	);



	$custom_query = new WP_Query( $args );



   $postargs = array(  



		'post_type' => 'listing', 



		'posts_per_page' => -1, 



	);



	$postcount = new WP_Query( $postargs );



$posts = $postcount->post_count;



	?>



     <div class="col-md-8 col-sm-12 col-xs-12">



        <div class="result-sorting-wrapper">



          <div class="sorting-count">



            <p><?php echo $posts; ?> <span> Listings</span></p>



          </div>



          <div class="result-sorting-by">



            <p> Sort by: </p>



            <form action="" method="get" id="ShortOrder" name="sortinglisting">



              <div class="form-group select sorting-select">



                <select id="order_list" class="form-control" name="listing_order"  onChange="document.form.submit();">



                  <!--<option value="">



        Sort Listing        </option>-->



                  <option value="Asc" <?php if(isset($_REQUEST['listing_order']) && $_REQUEST['listing_order'] == "Asc") echo 'selected="selected"';?>> A-Z </option>



                  <option value="newItem" <?php if(isset($_REQUEST['listing_order']) && $_REQUEST['listing_order']== "newItem") echo 'selected="selected"';?>> Newest Items </option>



                  <option value="oldItem" <?php if(isset($_REQUEST['listing_order']) && $_REQUEST['listing_order'] == "oldItem") echo 'selected="selected"';?>> Oldest Items </option>



                </select>



              </div>



            </form>



          </div>



        </div>



        <div class="search-result-listing">



    <?php 



	if($custom_query->have_posts()) {



	while($custom_query->have_posts()) : 



   $custom_query->the_post();



	$olomo_option = get_post_meta(get_the_ID(),'olomo_options',true);



	//echo '<pre>';



	//print_r($olomo_option);



	



			



		 



		?>



          <div class="<?php echo esc_attr($listing_style); ?> show_listing grid-box-contianer bookmark-listing" data-title="<?php echo get_the_title(); ?>" data-postid="<?php echo get_the_ID(); ?>" data-lattitue="<?php echo esc_attr($olomo_option['latitude']); ?>" data-longitute="<?php echo esc_attr($olomo_option['longitude']); ?>" data-posturl="<?php echo get_the_permalink(); ?>">



            <div class="listing_wrap">



              <div class="listing_img">



                <div class="listing_cate">



                  <?php



                $cats = get_the_terms(get_the_ID(), 'listing-category');



                if(!empty($cats)){



                    foreach ($cats as $cat) {



                        $category_image = listing_get_tax_meta($cat->term_id,'category','image');



                        $term_link = get_term_link($cat);



                        if(!empty($category_image)){



                            echo '<span class="cate_icon"><a href="'.esc_url($term_link).'"><img class="icon icons8-Food" src="'.esc_url($category_image).'" alt="cat-icon"></span></a>';



                        }



						else{



						   echo '<span class="cate_icon"><a href="'.esc_url($term_link).'"><img class="icon icons8-Food" src="'.get_template_directory_uri().'/assets/images/caticon.png" alt="cat-icon"></span></a>';



	                    }



                    }



                }



                ?>



                  <span class="listing_like">



                  <?php olomo_listinglikes(); ?>



                  </span> </div>



                <?php 		



                    $random_ads = get_post_meta(get_the_ID(), '_is_ds_featured_post', true);



                    if(!empty($random_ads)) {?>



                <div class="featured_label">



                  <?php esc_html_e('Featured', 'olomo');?>



                </div>



                <?php



                    }



                ?>



                <div class="like_post"> <a href="#" data-post-type="grids" data-post-id="<?php echo get_the_ID(); ?>" data-success-text="Saved" class="status-btn add-to-fav add-to-fav Save"><i class="fa fa-bookmark-o"></i></a> <span class="save_text">Save</span> </div>



                <div class="grid-box-thumb">



                  <?php



                if(has_post_thumbnail()){



                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'olomo-blog-grid');



                        if(!empty($image[0])){



                            echo "<a href='".get_the_permalink()."' >



                                    <img src='" . esc_url($image[0]) . "' />



                                </a>";



                        }



                } ?>



                  <div class="hide-img olomo-list-thumb">



                    <?php



                if (has_post_thumbnail()):



                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'olomo-blog-grid');



                        if(!empty($image[0])){



                            echo "<a href='".get_the_permalink()."' >



                                        <img src='" . esc_url($image[0]) . "' />



                                  </a>";



                        }



                endif; ?>



                  </div>



                </div>



              </div>



              <div class="listing_info">



                <div class="post_category">



                  <?php



			$cats = get_the_terms(get_the_ID(), 'listing-category');



			if(!empty($cats)){



				foreach ( $cats as $cat ) {



					$term_link = get_term_link( $cat );



					echo '<a href="'.esc_url($term_link).'">



						'.esc_html($cat->name).'



					</a>';



				}



			}?>



                </div>



                <h4><a href="<?php echo get_the_permalink(); ?>">



                  <?php the_title(); ?>



                  </a></h4>



                <?php if(!empty($olomo_option['tagline_text'])): ?>



                <p><?php echo esc_html($olomo_option['tagline_text']); ?></p>



                <?php endif; ?>



                <div class="listing_review_info">



                  <p>



                    <?php



			$NumberRating = olomo_ratings_numbers($post->ID);



			if($NumberRating != 0){



				if($NumberRating <= 1){



					$review = esc_html__('Review', 'olomo');



				}else{



					$review = esc_html__('Reviews', 'olomo');



				}



				echo cal_listing_rate(get_the_ID());											



				echo '('.$NumberRating; ?>



                    <?php echo esc_html($review).')';



			}



			else{



				echo cal_listing_rate(get_the_ID());



			}?> </p>



                  <p class="listing_map_m">



                    <?php



			$cats = get_the_terms(get_the_ID(), 'location');



			echo '<i class="fa fa-map-marker"></i>';



			if(!empty($cats)){



				foreach ( $cats as $cat ) {



					$term_link = get_term_link( $cat );



					echo '<a href="'.esc_url($term_link).'">



						'.esc_html($cat->name).'



					</a>';



				}



			}?>



                  </p>



                  <?php if(!empty($olomo_option['gAddress'])) { ?>



                  <div class="hide"> <span class="cat-icon"> <?php echo olomo_icons('mapMarkerGrey'); ?> </span> <span class="text gaddress"><?php echo esc_html($olomo_option['gAddress']); ?></span> </div>



                  <?php } ?>



                </div>



              </div>



            </div>



          </div>



          <?php 	



		



		







		



	endwhile;



	if (function_exists("pagination")) {



    pagination($custom_query->max_num_pages);



}



	}



	else



	{



	echo '<div class="form-group"><h3 class="text-center">Sorry...No listing found</h3></div>';	



	}



	



	wp_reset_query();



}



		  



if(isset($_REQUEST['search_listing']))



{



	//$ratingRange = array();



	$category = $_REQUEST['category'];



	$status = $_REQUEST['status'];



	$search_by_title = $_REQUEST['search_by_title'];



	$gAddress = $_REQUEST['gAddress'];



	$location = $_REQUEST['location'];



	$search_by_tags_keywords = $_REQUEST['search_by_tags_keywords'];



	$priceRange = $_REQUEST['priceRange'];



	$ratingFrom = $_REQUEST['ratingFrom'];



	$ratingTo = $_REQUEST['ratingTo'];



	$parts = preg_split('/(?:"[^"]*"|)\K\s*(,\s*|$)/', $priceRange);



	//print_r($parts);



	//echo $parts[0];



	//echo $parts[1];



	$t=date('d-m-Y');



    $today_day = date("l",strtotime($t));



	if($status == 'open')



	{



		$open = $today_day;



	}



	elseif($status == 'closed')



	{



		$close = $today_day;



	}



	



	



	$tax_query = array();



	if($category != '')



	{



	$tax_query[] = array( 



		'taxonomy' => 'listing-category', //or tag or custom taxonomy



		'field' => 'name', 



		'terms' => $category 



        ) ;



	}



	else



	{



	$tax_query[] =  '';



	}



	if($location != '')



	{



	$tax_query[] = array( 



		'taxonomy' => 'location', //or tag or custom taxonomy



		'field' => 'name', 



		'terms' => $location 



		) ;



	}



	else



	{



	$tax_query[] =  '';	



	}



	if($search_by_tags_keywords  != '')



	{



	$tax_query[] = array( 



		'taxonomy' => 'list-tags', //or tag or custom taxonomy



		'field' => 'name', 



		'terms' => $search_by_tags_keywords 



		) ;



	}



	else



	{



	$tax_query[] =  '';	



	}



	



	$meta_query = array();	



	if($gAddress != '')



	{



	$meta_query[] = array(



			'key' => 'olomo_options',



			'value' => $gAddress,



			'compare' => 'LIKE'



			);



	}



	else



	{



	$meta_query[] = '';



	}



	if($ratingFrom != '' && $ratingTo != '')



	{



	$meta_query[] = array(



			'key' => 'listing_rate',



			'value' => array($ratingFrom,$ratingTo),



			'type' => 'decimal',



            'compare' => 'BETWEEN'



			);	



	}



	else



	{



	$meta_query[] = '';	



	}



	if($status == 'open')



	{



	$meta_query[] = array(



			'key' => 'olomo_options',



			'value' => $today_day,



			'compare' => 'LIKE'



			);	



	}



	else



	{



	$meta_query[] = '';	



	}



	



	if($parts[0] != '' && $parts[1] != '')



	{



	$meta_query[] = array(



			'key' => 'list_price',



			'value' => array($parts[0],$parts[1]),



			'type' => 'decimal',



			'compare' => 'BETWEEN'



			);	



	$meta_query[] = array(



			'key' => 'list_price_to',



		    'value' => array($parts[0],$parts[1]),



			'type' => 'decimal',



			'compare' => 'BETWEEN'



			);			



	



	}



	else



	{



	$meta_query[] = '';	



	}



	



	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;



 



	$args = array(  



		'post_type' => 'listing', 



		'paged' => $paged, 



		'posts_per_page' => 10, 



		's' => $search_by_title,



		'tax_query' => array( 



		'relation' => 'AND',



		   $tax_query



		) ,



		'meta_query' => array(



		 'relation' => 'AND',



			$meta_query



		)



	); 



	$search_query = new WP_Query( $args );



	 $postargs = array(  



		'post_type' => 'listing', 



		'posts_per_page' => -1, 



		's' => $search_by_title,



		'tax_query' => array( 



		'relation' => 'AND',



		   $tax_query



		) ,



		'meta_query' => array(



		 'relation' => 'AND',



			$meta_query



		)



	); 



	$postcount = new WP_Query( $postargs );



$posts = $postcount->post_count;



	?>



     <div class="col-md-8 col-sm-12 col-xs-12">



        <div class="result-sorting-wrapper">



          <div class="sorting-count">



            <p><?php echo $posts; ?> <span> Listings</span></p>



          </div>



          <div class="result-sorting-by">



            <p> Sort by: </p>



            <form action="" method="get" id="ShortOrder" name="sortinglisting">



              <div class="form-group select sorting-select">



                <select id="order_list" class="form-control" name="listing_order"  onChange="document.form.submit();">



                  <!--<option value="">



        Sort Listing        </option>-->



                  <option value="Asc" <?php if(isset($_REQUEST['listing_order']) && $_REQUEST['listing_order'] == "Asc") echo 'selected="selected"';?>> A-Z </option>



                  <option value="newItem" <?php if(isset($_REQUEST['listing_order']) && $_REQUEST['listing_order']== "newItem") echo 'selected="selected"';?>> Newest Items </option>



                  <option value="oldItem" <?php if(isset($_REQUEST['listing_order']) && $_REQUEST['listing_order'] == "oldItem") echo 'selected="selected"';?>> Oldest Items </option>



                </select>



              </div>



            </form>



          </div>



        </div>



        <div class="search-result-listing">



    <?php 



	if($search_query->have_posts()) { 



	while($search_query->have_posts()) : $search_query->the_post(); 



	$olomo_option = get_post_meta(get_the_ID(),'olomo_options',true);



	//echo '<pre>';



	//print_r($olomo_option);



	/*if(isset($olomo_option['business_hours'][$today_day]) && $status == 'open' )



	{*/



	



			



			



		 



		?>



          <div class="<?php echo esc_attr($listing_style); ?> show_listing grid-box-contianer bookmark-listing" data-title="<?php echo get_the_title(); ?>" data-postid="<?php echo get_the_ID(); ?>" data-lattitue="<?php echo esc_attr($olomo_option['latitude']); ?>" data-longitute="<?php echo esc_attr($olomo_option['longitude']); ?>" data-posturl="<?php echo get_the_permalink(); ?>">



            <div class="listing_wrap">



              <div class="listing_img">



                <div class="listing_cate">



                  <?php



                $cats = get_the_terms(get_the_ID(), 'listing-category');



                if(!empty($cats)){



                    foreach ($cats as $cat) {



                        $category_image = listing_get_tax_meta($cat->term_id,'category','image');



                        $term_link = get_term_link($cat);



                        if(!empty($category_image)){



                            echo '<span class="cate_icon"><a href="'.esc_url($term_link).'"><img class="icon icons8-Food" src="'.esc_url($category_image).'" alt="cat-icon"></span></a>';



                        }



						else{



						   echo '<span class="cate_icon"><a href="'.esc_url($term_link).'"><img class="icon icons8-Food" src="'.get_template_directory_uri().'/assets/images/caticon.png" alt="cat-icon"></span></a>';



	                    }



                    }



                }



                ?>



                  <span class="listing_like">



                  <?php olomo_listinglikes(); ?>



                  </span> </div>



                <?php 		



                    $random_ads = get_post_meta(get_the_ID(), '_is_ds_featured_post', true);



                    if(!empty($random_ads)) {?>



                <div class="featured_label">



                  <?php esc_html_e('Featured', 'olomo');?>



                </div>



                <?php



                    }



                ?>



                <div class="like_post"> <a href="#" data-post-type="grids" data-post-id="<?php echo get_the_ID(); ?>" data-success-text="Saved" class="status-btn add-to-fav add-to-fav Save"><i class="fa fa-bookmark-o"></i></a> <span class="save_text">Save</span> </div>



                <div class="grid-box-thumb">



                  <?php



                if(has_post_thumbnail()){



                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'olomo-blog-grid');



                        if(!empty($image[0])){



                            echo "<a href='".get_the_permalink()."' >



                                    <img src='" . esc_url($image[0]) . "' />



                                </a>";



                        }



                } ?>



                  <div class="hide-img olomo-list-thumb">



                    <?php



                if (has_post_thumbnail()):



                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'olomo-blog-grid');



                        if(!empty($image[0])){



                            echo "<a href='".get_the_permalink()."' >



                                        <img src='" . esc_url($image[0]) . "' />



                                  </a>";



                        }



                endif; ?>



                  </div>



                </div>



              </div>



              <div class="listing_info">



                <div class="post_category">



                  <?php



			$cats = get_the_terms(get_the_ID(), 'listing-category');



			if(!empty($cats)){



				foreach ( $cats as $cat ) {



					$term_link = get_term_link( $cat );



					echo '<a href="'.esc_url($term_link).'">



						'.esc_html($cat->name).'



					</a>';



				}



			}?>



                </div>



                <h4><a href="<?php echo get_the_permalink(); ?>">



                  <?php the_title(); ?>



                  </a></h4>



                <?php if(!empty($olomo_option['tagline_text'])): ?>



                <p><?php echo esc_html($olomo_option['tagline_text']); ?></p>



                <?php endif; ?>



                <div class="listing_review_info">



                  <p>



                    <?php



			$NumberRating = olomo_ratings_numbers($post->ID);



			if($NumberRating != 0){



				if($NumberRating <= 1){



					$review = esc_html__('Review', 'olomo');



				}else{



					$review = esc_html__('Reviews', 'olomo');



				}



				echo cal_listing_rate(get_the_ID());											



				echo '('.$NumberRating; ?>



                    <?php echo esc_html($review).')';



			}



			else{



				echo cal_listing_rate(get_the_ID());



			}?> </p>



                  <p class="listing_map_m">



                    <?php



			$cats = get_the_terms(get_the_ID(), 'location');



			echo '<i class="fa fa-map-marker"></i>';



			if(!empty($cats)){



				foreach ( $cats as $cat ) {



					$term_link = get_term_link( $cat );



					echo '<a href="'.esc_url($term_link).'">



						'.esc_html($cat->name).'



					</a>';



				}



			}?>



                  </p>



                  <?php if(!empty($olomo_option['gAddress'])) { ?>



                  <div class="hide"> <span class="cat-icon"> <?php echo olomo_icons('mapMarkerGrey'); ?> </span> <span class="text gaddress"><?php echo esc_html($olomo_option['gAddress']); ?></span> </div>



                  <?php } ?>



                </div>



              </div>



            </div>



          </div>



          <?php 



		



		



		







	endwhile; 



	if (function_exists("pagination")) {



    pagination($search_query->max_num_pages);



}



	}



	else



	{



	echo '<div class="form-group"><h3 class="text-center">Sorry...No listing found</h3></div>';	



	} wp_reset_postdata();



	wp_reset_query();



}







?>



        </div>



      </div>



    </div>



  </div>



</section>



<?php 



get_footer();







