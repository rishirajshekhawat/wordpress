<?php



/**



 * functions hooks



 * @package WordPress



 * @subpackage carforyou



 * @since carforyou 2.5



 */



 



//Car List Grid Style 



function carforyou_gridstyle(){



global $paged, $post, $wp_query, $my_query1;



	if(isset($_REQUEST['vehicle_order'])):



		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;



		$price_order= $_REQUEST['vehicle_order'];	

		if($price_order=='Asc'):

		$args = array( 'post_status' => 'publish', 'post_type' => 'auto','orderby' => 'title', 'order' => 'ASC', 'paged' =>$paged, 'posts_per_page' => 12);

		

		elseif($price_order=='price_low'):		



		 $args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'meta_key' => 'DREAM_auto_price', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'paged' =>$paged, 'posts_per_page' => 12);	



		elseif($price_order=='price_high'):



		 $args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'meta_key' => 'DREAM_auto_price', 'orderby' => 'meta_value_num', 'order' => 'DESC', 'paged' =>$paged, 'posts_per_page' => 12);	



		elseif($price_order=='newItem'):



		  $args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'order' => 'DESC', 'paged' =>$paged, 'posts_per_page' => 12);	



		else:



		  $args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'order' => 'ASC', 'paged' =>$paged, 'posts_per_page' => 12);	



		endif;



		$wp_query = new WP_Query($args);



		while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>



<div class="col-md-4 grid_listing">

  <div class="product-listing-m gray-bg">

    <div class="product-listing-img"> <a href="<?php the_permalink(); ?>">

      <?php 

			if (has_post_thumbnail() ):

				the_post_thumbnail('carforyou_small', array('class' => 'img-responsive'));

			else:

				echo "<div class='is-empty-img-box'></div>";

			endif;

	 ?>

      </a>

      <?php carforyou_AutoType(); ?>

      <div class="compare_item">

        <div class="checkbox">

          <button id="compare_auto_btn" onclick="<?php echo esc_js('javascript:productCompare('.$post->ID.')'); ?>"><?php esc_html_e('Compare','carforyou'); ?></button>

        </div>

      </div>

    </div>

    <div class="product-listing-content">

      <h5><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h5>

      <?php  if(!empty($post->DREAM_auto_price)): ?>

      <p class="list-price">

        <?php carforyou_curcy_prefix(); ?>

        <?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></p>

      <?php endif; ?>

      <div class="car-location">

        <?php $location = $post->DREAM_auto_address;
											$pieces = explode(' ', $location);
											$last_word = array_pop($pieces);

			  if(!empty($location)): ?>

    			    <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html($last_word); ?> </span>

        	<?php endif; ?>

      </div>

      <ul class="features_list">

        <?php carforyou_featuredList(); ?>

      </ul>

    </div>

  </div>

</div>

<?php endwhile;

		carforyou_pagination(); 	 

		else:

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$args = array( 'post_type' => 'auto','orderby' => 'title', 'order' => 'ASC','paged' =>$paged, 'posts_per_page' => 12);

		$my_query1  = new WP_Query( $args );

		while ( $my_query1 ->have_posts() ) : $my_query1 ->the_post(); ?>

<div class="col-md-4 grid_listing">

  <div class="product-listing-m gray-bg">

    <div class="product-listing-img"> <a href="<?php the_permalink(); ?>">

      <?php if (has_post_thumbnail() ):

				the_post_thumbnail('carforyou_small', array('class' => 'img-responsive'));

			else:

				echo "<div class='is-empty-img-box'></div>";

			endif;

	 ?>

      </a>

      <?php carforyou_AutoType(); ?>

      <div class="compare_item">

        <div class="checkbox">

          <button id="compare_auto_btn" onclick="<?php echo esc_js('javascript:productCompare('.$post->ID.')'); ?>"><?php esc_html_e('Compare','carforyou'); ?></button>

        </div>

      </div>

    </div>

    <div class="product-listing-content">

      <h5><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h5>

      <?php  if(!empty($post->DREAM_auto_price)): ?>

      <p class="list-price">

        <?php carforyou_curcy_prefix(); ?>

        <?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></p>

      <?php endif; ?>

      <div class="car-location">

        <?php $location = $post->DREAM_auto_address;
											$pieces = explode(' ', $location);
											$last_word = array_pop($pieces);

			  if(!empty($location)): ?>

    			    <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html($last_word); ?> </span>

        	<?php endif; ?>

      </div>

      <ul class="features_list">

        <?php carforyou_featuredList(); ?>

      </ul>

    </div>

  </div>

</div>

<?php endwhile; 

		 carforyou_pagination(); 

	endif;

}



// Car List Classic List Style 



function carforyou_ClassicList(){



global $paged, $post, $wp_query, $my_query1;



	if(isset($_REQUEST['vehicle_order'])):



		global $paged, $post;



		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;



		$price_order= $_REQUEST['vehicle_order'];	

		if($price_order=='Asc'):		



		 $args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'orderby' => 'title', 'order' => 'ASC', 'paged' =>$paged, 'posts_per_page' => 12);

		 

		elseif($price_order=='price_low'):		



		 $args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'meta_key' => 'DREAM_auto_price', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'paged' =>$paged, 'posts_per_page' => 12);	



		elseif($price_order=='price_high'):



		 $args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'meta_key' => 'DREAM_auto_price', 'orderby' => 'meta_value_num', 'order' => 'DESC', 'paged' =>$paged, 'posts_per_page' => 12);	



		elseif($price_order=='newItem'):



		  $args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'order' => 'DESC', 'paged' =>$paged, 'posts_per_page' => 12);	



		else:



		  $args = array( 'post_status' => 'publish', 'post_type' => 'auto', 'order' => 'ASC', 'paged' =>$paged, 'posts_per_page' => 12);	



		endif;



		$wp_query = new WP_Query($args);



		while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

<div class="product-listing-m gray-bg">

  <div class="product-listing-img"> <a href="<?php the_permalink(); ?>">

    <?php if (has_post_thumbnail() ):



							the_post_thumbnail('carforyou_small', array('class' => 'img-responsive'));



							else:



							echo "<div class='is-empty-img-box'></div>";



							endif;



					 ?>

    </a>

    <?php carforyou_AutoType(); ?>

    <div class="compare_item">

      <div class="checkbox">

        <button id="compare_model_btn" onclick="javascript:productCompare('<?php echo esc_html($post->ID); ?>');">

        <?php esc_html_e('Compare','carforyou'); ?>

        </button>

      </div>

    </div>

  </div>

  <div class="product-listing-content">

    <h5><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h5>

    <?php  if(!empty($post->DREAM_auto_price)): ?>

    <p class="list-price">

      <?php carforyou_curcy_prefix(); ?>

      <?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></p>

    <?php endif; ?>

    <ul>

      <?php carforyou_featuredList(); ?>

    </ul>

    <a href="<?php the_permalink(); ?>" class="btn">

    <?php esc_html_e('View Details ','carforyou'); ?>

    <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>

    <div class="car-location">

        <?php $location = $post->DREAM_auto_address;
											$pieces = explode(' ', $location);
											$last_word = array_pop($pieces);

			  if(!empty($location)): ?>

    			    <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html($last_word); ?> </span>

        	<?php endif; ?>

      </div>

  </div>

</div>

<?php 



		endwhile; 



		carforyou_pagination(); 	 



		else:



		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;



		$args = array( 'post_type' => 'auto','orderby' => 'title', 'order' => 'ASC','paged' =>$paged, 'posts_per_page' => 12);



		$my_query1  = new WP_Query( $args );



		while ( $my_query1 ->have_posts() ) : $my_query1 ->the_post(); ?>

<div class="product-listing-m gray-bg">

  <div class="product-listing-img"> <a href="<?php the_permalink(); ?>">

<?php if (has_post_thumbnail() ):



	the_post_thumbnail('carforyou_small', array('class' => 'img-responsive'));



	else:



	echo "<div class='is-empty-img-box'></div>";



	endif;



?>

    </a>

    <?php carforyou_AutoType(); ?>

    <div class="compare_item">

      <div class="checkbox">

        <button id="compare_model_btn" onclick="javascript:productCompare('<?php echo esc_html($post->ID); ?>');">

        <?php esc_html_e('Compare','carforyou'); ?>

        </button>

      </div>

    </div>

  </div>

  <div class="product-listing-content">

    <h5><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h5>

    <?php  if(!empty($post->DREAM_auto_price)): ?>

    <p class="list-price">

      <?php carforyou_curcy_prefix(); ?>

      <?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></p>

    <?php endif; ?>

    <ul>

      <?php carforyou_featuredList(); ?>

    </ul>

    <a href="<?php the_permalink(); ?>" class="btn"><?php esc_html_e('View Details','carforyou'); ?> <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>

   <div class="car-location">

        <?php $location = $post->DREAM_auto_address;
											$pieces = explode(' ', $location);
											$last_word = array_pop($pieces);

			  if(!empty($location)): ?>

    			    <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html($last_word); ?> </span>

        	<?php endif; ?>

      </div>

  </div>

</div>

<?php endwhile; 

  carforyou_pagination(); 

	endif;	

}



// List SideBar Page



function carforyou_listpagesidebar(){ ?>

<div class="widgets-sidebar">

  <?php $serch_car_enable = carforyou_get_option('serch_car_enable'); 



	if($serch_car_enable=='1'|| $serch_car_enable==''): ?>

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

  <?php endif; ?>

  <?php $sell_car_enable = carforyou_get_option('sell_car_enable'); 



		if($sell_car_enable=='1'|| $sell_car_enable==''): ?>

  <?php function carforyou_carsellimage(){

            $sell_car_image = carforyou_get_option('sell_car_image');

            echo esc_url($sell_car_image['url']);

        } ?>

  <div class="sidebar_widget sell_car_quote" style="background:url(<?php carforyou_carsellimage();?>)">

    <div class="white-text div_zindex text-center">

      <?php 



         $sell_car_title = carforyou_get_option('sell_car_title');



        if(!empty($sell_car_title)) : ?>

      <h3><?php echo esc_html($sell_car_title); ?></h3>

      <?php endif; ?>

      <?php 



         $sell_car_desc = carforyou_get_option('sell_car_desc');



        if(!empty($sell_car_desc)) : ?>

      <p><?php echo esc_html($sell_car_desc);?></p>

      <?php endif; ?>

      <?php 



         $request_quote = carforyou_get_option('request_quote');



        if(!empty($request_quote)) : ?>

      <a href="<?php echo esc_url(get_permalink(carforyou_get_option('sellcar_page_link'))); ?>" class="btn"><?php echo esc_html($request_quote);?> <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>

      <?php endif; ?>

    </div>

    <div class="dark-overlay"></div>

  </div>

  <?php endif; ?>

  <?php $recently_car_enable = carforyou_get_option('recently_car_enable'); 



		if($recently_car_enable=='1'|| $recently_car_enable==''): ?>

  <div class="sidebar_widget">

    <?php 



         $recently_listed = carforyou_get_option('recently_listed');



        if(!empty($recently_listed)) : ?>

    <div class="widget_heading">

      <h5><i class="fa fa-car" aria-hidden="true"></i><?php echo esc_html($recently_listed); ?></h5>

    </div>

    <?php endif; ?>

    <div class="recent_addedcars">

      <ul>

        <?php  $recentlypages = carforyou_get_option('recently_listed_limit'); 

        $loop = new WP_Query( array('post_type' => 'auto', 'post_status' => 'publish', 'meta_key' => 'DREAM_auto_condition', 'posts_per_page' => $recentlypages));

        while ($loop->have_posts()) : $loop->the_post();

        global $post; 

        ?>

        <li class="gray-bg">

          <div class="recent_post_img"> <a href="<?php the_permalink(); ?>">

			<?php if (has_post_thumbnail() ):

					the_post_thumbnail('thumbnail', array('class' => 'img-responsive'));

					else:

					echo "<div class='is-empty-img-box'></div>";

					endif;

			 ?>

            </a></div>

          <div class="recent_post_title"> <a href="<?php the_permalink(); ?>">

            <?php $title = get_the_title(); echo mb_strimwidth($title, 0, 30, '...'); ?>

            </a>

            <?php  if(!empty($post->DREAM_auto_price)): ?>

            <p class="widget_price">

              <?php carforyou_curcy_prefix(); ?>

              <?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></p>

            <?php endif; ?>

          </div>

        </li>

        <?php endwhile; wp_reset_query(); ?>

      </ul>

    </div>

  </div>

  <?php endif; ?>

</div>

<!--/Side-Bar-->

<?php }



if(!function_exists('Carforyou_all_type_car')){

function Carforyou_all_type_car(){

	global $paged, $post, $wp_query, $my_query1;





		global $paged, $post;

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$price_order= $_REQUEST['vehicle_order'];	

		$custom_terms = get_terms('type-car');

		$allterm[] = array();

		foreach($custom_terms as $custom_term) {

			$allterm[] = $custom_term->slug;

		}

	

		if($price_order=='Asc'){		



		 $args = array('post_type' => 'auto',  

						'orderby' => 'title',

						'order' => 'ASC',

						'tax_query' => array(

            array(

                'taxonomy' => 'type-car',

                'field' => 'slug',

                'terms' => $allterm,

            ),

        ),

		'paged' =>$paged);

			}

		elseif($price_order=='price_low'){

			

		$args = array('post_type' => 'auto',  

					'tax_query' => array(

            array(

                'taxonomy' => 'type-car',

                'field' => 'slug',

                'terms' => $allterm,

            ),

			

		),

           

                'meta_key' => 'DREAM_auto_price',

                'orderby' => 'meta_value_num',

                'order' => 'ASC',

           

      

		'paged' =>$paged);	

			

		}

		elseif($price_order=='price_high'){

			

		$args = array('post_type' => 'auto',  

					'tax_query' => array(

            array(

                'taxonomy' => 'type-car',

                'field' => 'slug',

                'terms' => $allterm,

            ),

			

		),

           

                'meta_key' => 'DREAM_auto_price',

                'orderby' => 'meta_value_num',

                'order' => 'DESC',

           

      

		'paged' =>$paged);	

			

		}elseif($price_order=='newItem'){

			

		$args = array('post_type' => 'auto', 

						'order' => 'DESC',

						'tax_query' => array(

            array(

                'taxonomy' => 'type-car',

                'field' => 'slug',

                'terms' => $allterm,

            ),

        ),

		'paged' =>$paged);	

			

		}else{

		$args = array('post_type' => 'auto',  'orderby' => 'title',

						'order' => 'ASC',

						'tax_query' => array(

            array(

                'taxonomy' => 'type-car',

                'field' => 'slug',

                'terms' => $allterm,

            ),

        ),

		'paged' =>$paged);	

			

		}

		

		



		$my_query1  = new WP_Query( $args );



		while ( $my_query1 ->have_posts() ) : $my_query1 ->the_post(); ?>

	<div class="product-listing-m gray-bg">

  <div class="product-listing-img"> <a href="<?php the_permalink(); ?>">

<?php if (has_post_thumbnail() ):



	the_post_thumbnail('carforyou_small', array('class' => 'img-responsive'));



	else:



	echo "<div class='is-empty-img-box'></div>";



	endif;



?>

    </a>

    <?php carforyou_AutoType(); ?>

    <div class="compare_item">

      <div class="checkbox">

        <button id="compare_model_btn" onclick="javascript:productCompare('<?php echo esc_html($post->ID); ?>');">

        <?php esc_html_e('Compare','carforyou'); ?>

        </button>

      </div>

    </div>

  </div>

  <div class="product-listing-content">

    <h5><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h5>

    <?php  if(!empty($post->DREAM_auto_price)): ?>

    <p class="list-price">

      <?php carforyou_curcy_prefix(); ?>

      <?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></p>

    <?php endif; ?>

    <ul>

      <?php carforyou_featuredList(); ?>

    </ul>

    <a href="<?php the_permalink(); ?>" class="btn"><?php esc_html_e('View Details','carforyou'); ?> <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>

    <div class="car-location">

        <?php $location = $post->DREAM_auto_address;
											$pieces = explode(' ', $location);
											$last_word = array_pop($pieces);

			  if(!empty($location)): ?>

    			    <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html($last_word); ?> </span>

        	<?php endif; ?>

      </div>

  </div>

</div>

<?php endwhile; 

  carforyou_pagination(); 

}

	

	

	

}



if(!function_exists('Carforyou_single_type_car')){

function Carforyou_single_type_car(){

	global $paged, $post, $wp_query, $my_query1;



$var =  rwmb_meta( 'auto_new_status' , 'type=taxonomy&taxonomy=type-car' );



		global $paged, $post;

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$price_order= $_REQUEST['vehicle_order'];	

		$custom_terms = get_terms('type-car');

		if($price_order=='Asc'){		



		 $args = array('post_type' => 'auto',  

						'orderby' => 'title',

						'order' => 'ASC',

						'tax_query' => array(

            array(

                'taxonomy' => 'type-car',

                'field' => 'slug',

                'terms' => $var->slug,

            ),

        ),

		'paged' =>$paged);

			}

		elseif($price_order=='price_low'){

			

		$args = array('post_type' => 'auto',  

					'tax_query' => array(

            array(

                'taxonomy' => 'type-car',

                'field' => 'slug',

                'terms' => $var->slug,

            ),

			

		),

           

                'meta_key' => 'DREAM_auto_price',

                'orderby' => 'meta_value_num',

                'order' => 'ASC',

           

      

		'paged' =>$paged);	

			

		}

		elseif($price_order=='price_high'){

			

		$args = array('post_type' => 'auto',  

					'tax_query' => array(

            array(

                'taxonomy' => 'type-car',

                'field' => 'slug',

                'terms' => $var->slug,

            ),

			

		),

		'meta_key' => 'DREAM_auto_price',

                'orderby' => 'meta_value_num',

                'order' => 'DESC',

           

      

		'paged' =>$paged);	

			

		}elseif($price_order=='newItem'){

			

		$args = array('post_type' => 'auto', 

						'order' => 'DESC',

						'tax_query' => array(

            array(

                'taxonomy' => 'type-car',

                'field' => 'slug',

                'terms' => $var->slug,

            ),

        ),

		'paged' =>$paged);	

			

		}else{

		$args = array('post_type' => 'auto',  'orderby' => 'title',

						'order' => 'ASC',

						'tax_query' => array(

            array(

                'taxonomy' => 'type-car',

                'field' => 'slug',

                'terms' => $var->slug,

            ),

        ),

		'paged' =>$paged);	

			

		}

		

		



		$my_query1  = new WP_Query( $args );



		while ( $my_query1 ->have_posts() ) : $my_query1 ->the_post(); ?>

	<div class="product-listing-m gray-bg">

  <div class="product-listing-img"> <a href="<?php the_permalink(); ?>">

<?php if (has_post_thumbnail() ):



	the_post_thumbnail('carforyou_small', array('class' => 'img-responsive'));



	else:



	echo "<div class='is-empty-img-box'></div>";



	endif;



?>

    </a>

    <?php carforyou_AutoType(); ?>

    <div class="compare_item">

      <div class="checkbox">

        <button id="compare_model_btn" onclick="javascript:productCompare('<?php echo esc_html($post->ID); ?>');">

        <?php esc_html_e('Compare','carforyou'); ?>

        </button>

      </div>

    </div>

  </div>

  <div class="product-listing-content">

    <h5><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h5>

    <?php  if(!empty($post->DREAM_auto_price)): ?>

    <p class="list-price">

      <?php carforyou_curcy_prefix(); ?>

      <?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></p>

    <?php endif; ?>

    <ul>

      <?php carforyou_featuredList(); ?>

    </ul>

    <a href="<?php the_permalink(); ?>" class="btn"><?php esc_html_e('View Details','carforyou'); ?> <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>

   <div class="car-location">

        <?php $location = $post->DREAM_auto_address;
											$pieces = explode(' ', $location);
											$last_word = array_pop($pieces);

			  if(!empty($location)): ?>

    			    <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html($last_word); ?> </span>

        	<?php endif; ?>

      </div>

  </div>

</div>

<?php endwhile; 

  carforyou_pagination(); 

}

	

	

	

}



