<?php
/**
 * functions hooks
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 2.5
 */
// Testimonial Style 1 Function 

function carforyou_testimonial($atts){
ob_start();	
extract(shortcode_atts(array('show' =>''), $atts));?>
    <div class="row">
        <div id="testimonial-slider">
            <div class="owl-carousel">
                <?php $loop = new WP_Query( array( 'post_type' => 'testimonial', 'post_status' => 'publish', 'posts_per_page'=>$show,) ); ?>
                <?php while ($loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="testimonial-m">
                            <div class="testimonial-img">
                                <?php the_post_thumbnail('carforyou_small');?>
                            </div>
                            <div class="testimonial-content">
                                <div class="testimonial-heading">
                                    <h5><?php the_title(); ?></h5>
                                    <span class="client-designation"><?php echo esc_html(get_post_meta( get_the_ID(), 'auto_tes_designation', true )); ?></span>
                                </div>
                               <?php the_excerpt(); ?>
                            </div>
                        </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
        </div>    
    </div>
<?php 
}
// Testimonial Style 2 Function
function carforyou_testimonial_2($atts){
ob_start();	
extract(shortcode_atts(array('show' =>''), $atts));?>
    <div id="testimonial-slider-2">
        <div class="owl-carousel">
          <?php  $loop = new WP_Query( array( 'post_type' => 'testimonial', 'post_status' => 'publish','posts_per_page'=>$show,) ); ?>
          <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
               <div class="testimonial_wrap">
                   <div class="testimonial-img">
                      <?php the_post_thumbnail('carforyou_small');?>
                   </div>
                   <div class="testimonial-heading">
                      <h5><?php the_title(); ?></h5>
                      <span class="client-designation"><?php echo esc_html(get_post_meta( get_the_ID(), 'auto_tes_designation', true )); ?></span> 
                   </div>
                   <p><?php the_excerpt(); ?></p>
               </div>
          <?php endwhile; wp_reset_query(); ?>
        </div>  
    </div>
<?php } 

// Testimonial style 3

function carforyou_testimonial_3($atts){
ob_start();	
extract(shortcode_atts(array('show' =>''), $atts));?>
    <div id="testimonial-slider-3">
	<div class="owl-carousel">
          <?php  $loop = new WP_Query( array( 'post_type' => 'testimonial', 'post_status' => 'publish','posts_per_page'=>$show,) ); ?>
          <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
               <div class="testimonial">
                   <div class="pic">
                      <?php the_post_thumbnail('carforyou_small');?>
                   </div>
                   <div class="testimonial-profile">
                      <h5><?php the_title(); ?></h5>
                      <span class="client-designation"><?php echo esc_html(get_post_meta( get_the_ID(), 'auto_tes_designation', true )); ?></span> 
                   </div>
                   <p class="description"><?php the_excerpt(); ?></p>
               </div>
          <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
<?php } 

// Testimonial style 4

function carforyou_testimonial_4($atts){
ob_start();	
extract(shortcode_atts(array('show' =>''), $atts));?>
    <div id="testimonial-slider-4">
	<div class="owl-carousel">
          <?php  $loop = new WP_Query( array( 'post_type' => 'testimonial', 'post_status' => 'publish','posts_per_page'=>$show,) ); ?>
          <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
               <div class="b-reviews">
			   <blockquote class="b-reviews__blockquote">
                <div class="b-reviews__wrap">
                <p><?php the_excerpt(); ?></p>
                </div>
                 <cite class="b-reviews__cite" title="Blockquote Title">
				 <span class="b-reviews__inner">
				 <span class="b-reviews__name"> <?php the_title(); ?></span>
				 <span class="b-reviews__category"><?php echo esc_html(get_post_meta( get_the_ID(), 'auto_tes_designation', true )); ?></span>
				 </span>
				 <span class="b-reviews__author">
				 <?php the_post_thumbnail('carforyou_small');?>
				 </span>
				 </cite>
                 </blockquote>
               </div>
			 
			   
          <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
<?php } 

// Latest Post Blog
function carforyou_Latestblog($atts){ 
ob_start();
extract(shortcode_atts(array('show' =>''), $atts));?>
<?php $loop = new WP_Query( array('post_type' => 'post', 'post_status' =>' publish', 'posts_per_page'=>$show,));
while ($loop->have_posts()) : $loop->the_post(); ?>
    <div class="col-md-4 col-sm-4">
        <article class="blog-list">
          <div class="blog-info-box"> 
          <a href="<?php the_permalink(); ?>">
          <?php if (has_post_thumbnail() ):
               the_post_thumbnail('carforyou_small', array('class' => 'img-responsive'));
                else:
                echo "<div class='is-empty-img-box'></div>";
                endif;
              ?>
              </a>
            <ul>
             
              <li><i class="fa fa-user" aria-hidden="true"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></li>
              <li><i class="fa fa-calendar" aria-hidden="true"></i><a href="<?php the_permalink(); ?>"><?php the_time('d M Y') ?></a></li>
              <li><a href="<?php the_permalink(); ?>"><i class="fa fa-comment-o" aria-hidden="true"></i><?php echo get_comments_number(); ?><?php esc_html_e(' Comments', 'carforyou'); ?></a></li>
            </ul>
          </div>
          <div class="blog-content">
            <h5><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h5>
            <p><?php echo wp_trim_words( get_the_content(), 30, '...' ); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn-link"><?php esc_html_e('Read More','carforyou'); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </div>
        </article>
      </div>
<?php endwhile; wp_reset_query();
}


// Latest Post Blog 1
function carforyou_Latestblog_1($atts){ 
ob_start();
extract(shortcode_atts(array('show' =>''), $atts));?>
<?php $loop = new WP_Query( array('post_type' => 'post', 'post_status' =>' publish', 'posts_per_page'=>$show,));
while ($loop->have_posts()) : $loop->the_post(); ?>
    <div class="col-md-6 col-sm-6 newblog">
        <article class="blog-list">
          <div class="blog-info-box new"> 
          <a href="<?php the_permalink(); ?>">
          <?php if (has_post_thumbnail() ):
               the_post_thumbnail('carforyou_small', array('class' => 'img-responsive'));
                else:
                echo "<div class='is-empty-img-box'></div>";
                endif;
              ?>
              </a>
            
          </div>
          <div class="blog-content news">
		  <ul>
             
              <li><i class="fa fa-user" aria-hidden="true"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></li>
              <li><i class="fa fa-calendar" aria-hidden="true"></i><a href="<?php the_permalink(); ?>"><?php the_time('d M Y') ?></a></li>
              <li><a href="<?php the_permalink(); ?>"><i class="fa fa-comment-o" aria-hidden="true"></i><?php echo get_comments_number(); ?><?php esc_html_e(' Comments', 'carforyou'); ?></a></li>
            </ul>
            <h5><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h5>
            <p><?php echo wp_trim_words( get_the_content(), 30, '...' ); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn-link"><?php esc_html_e('Read More','carforyou'); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </div>
        </article>
      </div>
<?php endwhile; wp_reset_query();
}

// Trending Car List 
function carforyou_trendcar($atts){
ob_start();	
extract(shortcode_atts(array('show' =>''), $atts));?>
    <div class="col-lg-12">
            <div id="trending_slider">
                <div class="owl-carousel">
                    <?php $args = array('post_type' => 'post','posts_per_page'=>$show, 'meta_key' => 'meta-checkbox', 'meta_value' => '1');
                    $trending = new WP_Query($args);
                    if ($trending->have_posts()): while($trending->have_posts()): $trending->the_post(); ?>
                        <div class="trending-car-m">
                        <div class="trending-car-img">
                         <?php if (has_post_thumbnail() ):
                           the_post_thumbnail('carforyou_small', array('class' => 'img-responsive'));
                            else:
                            echo "<div class='is-empty-img-box'></div>";
                            endif;
                          ?>
                        </div>
                        <div class="trending-hover">
                          <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        </div>
                        </div>
                    <?php  endwhile; endif; wp_reset_query(); ?>
                </div>
            </div>
          </div>
<?php }

// Team Member Function
function carforyou_team($atts){
ob_start();	
extract(shortcode_atts(array('show' =>''), $atts));?>
    <div class="row">
    <?php $loop = new WP_Query( array('post_type' => 'team', 'post_status' => 'publish', 'posts_per_page'=>$show,)); 
          global $post;
    	  while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <div class="col-md-4 col-sm-4">
            <div class="team_member">
                <div class="team_img">
                    <?php the_post_thumbnail('carforyou_small');?>
                    <div class="team_more_info">
                        <div class="info_wrap">
                        <?php if(!empty($post->auto_member_phone)): echo '<p><span>'.esc_html('Phone:', 'carforyou').'</span> <a href="tel:'.esc_html($post->auto_member_phone).'">'.esc_html($post->auto_member_phone).'</a></p>'; endif; ?>                <?php if(!empty($post->auto_member_email)): echo '<p><span>Email:</span> <a href="mailto:'.esc_html($post->auto_member_email).'">'.esc_html($post->auto_member_email).'</a></p>'; endif; ?>                
                            <ul>
                            <?php 
                            if(!empty($post->auto_member_fb)): echo '<li><a href="'.esc_url($post->auto_member_fb).'" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>'; endif; 
                            if(!empty($post->auto_member_tw)): echo '<li><a href="'.esc_url($post->auto_member_tw).'" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>'; endif; 
                            if(!empty($post->auto_member_link)): echo '<li><a href="'.esc_url($post->auto_member_link).'" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>'; endif; 
                            if(!empty($post->auto_member_google)): echo '<li><a href="'.esc_url($post->auto_member_google).'" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>'; endif; 
                            ?>
                            </ul>
                        </div>
                    </div>                
                </div>
                <div class="team_info">
                    <h6><?php the_title(); ?></h6>
                    <?php if(!empty($post->auto_member_designation)): echo '<p>'.esc_html($post->auto_member_designation).'</p>';endif;?>
                </div>        
            </div>
        </div>
    <?php endwhile; wp_reset_query(); ?>
    </div>
<?php }  
// UseNewCar Function
function carforyou_UseNewCar($atts){
ob_start();	
extract( shortcode_atts(array('show' =>''), $atts ));
$optKmMiles= carforyou_get_option('optKmMiles');
if($optKmMiles=='2'):
	$KmMiles=" Miles";
else:
	$KmMiles=" km";
endif;                  
 $texonomy_enable = carforyou_get_option('texonomy_enable');
 if($texonomy_enable == 1 ){

?>
        <div class="row">
            <div class="recent-tab">
			<ul class="nav nav-tabs" role="tablist">
                  <?php  
                  global $wpdb;
$type = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}term_taxonomy WHERE taxonomy = 'type-car'", OBJECT );
$counter=0;
foreach($type as $infos){
$tiid= $infos->term_taxonomy_id;

$resultsss = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}terms WHERE term_id = '$tiid' LIMIT 0,1", OBJECT );
foreach($resultsss as $keys){ 
$counter++;
$name = $keys->name;
$id = $keys->term_id;
?>
<li role="presentation"  class="post-<?php the_ID(); ?> <?php if($counter == 1){ echo 'active'; }?>"><a href="#<?php echo esc_html($id, 'carforyou'); ?>" aria-controls="usedcar" role="tab" data-toggle="tab"><?php esc_html_e($name,'carforyou') ?></a></li>
<?php }
}
?>
   
                </ul>
		 </div>
            <div class="tab-content">
			 <?php  
                  global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}term_taxonomy WHERE taxonomy = 'type-car'", OBJECT );
foreach($results as $info){
$tid= $info->term_taxonomy_id;

$resultss = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}terms WHERE term_id = '$tid'", OBJECT );
foreach($resultss as $key){
$tename[]=$key->slug;
$teid = $key->term_id;
$result = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}term_relationships WHERE term_taxonomy_id = '$teid'", OBJECT );
foreach($result as $term){
$poid[]  = $term->object_id;
}
}
}
if($tename[0]==$tename[0]){
$resul = $wpdb->get_results( "SELECT term_id FROM {$wpdb->prefix}terms WHERE slug = '".$tename[0]."'", OBJECT );
foreach($resul as $xt){
$post = $xt->term_id;

$res = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}term_relationships WHERE term_taxonomy_id = '$post'", OBJECT );
foreach($res as $sanj){
$sus[] = $sanj->object_id;
}
}

$args = array(
  'post__in' => $sus, 
  'post_type' => 'auto',
  'post_status' => 'publish',
  'posts_per_page' => $show
);
//print_r($sus);
}?>
                <div role="tabpanel" class="tab-pane active" id="<?php echo esc_html($post,'carforyou'); ?>">
                   <?php

$loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                    global $post; ?>
                        <div class="col-list-3">	
                            <div class="recent-car-list">
                                 <div class="car-info-box">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail() ):
                                                the_post_thumbnail('carforyou_small', array('class' => 'img-responsive'));
                                                else:
                                                echo "<div class='is-empty-img-box'></div>";
                                                endif;
                                         ?>
                                    </a> 
                                    <div class="compare_item">
                                        <div class="checkbox">
                                        <button id="compare_auto_btn" onclick="<?php echo esc_js('javascript:productCompare('.$post->ID.')'); ?>"><?php esc_html_e('Compare','carforyou'); ?></button>
                                    </div>
                                    </div>
                                    <ul>
                                    <?php 
                                        $km_done = get_post_meta(get_the_ID(), 'DREAM_auto_km_done', true);
                                        if(!empty($km_done)): 
                                            echo '<li><i class="fa fa-road" aria-hidden="true"></i>'.number_format_i18n(esc_html($km_done)).' '.$KmMiles.'</li>';
                                                        else:
                                            echo '<li><i class="fa fa-road" aria-hidden="true"></i>0,000 km</li>';
                                        endif;
                                        $term_list = wp_get_post_terms($post->ID, 'year-model', array("fields" => "all"));
                                        foreach($term_list as $term_single) 
                                        $year_model = $term_single->name;
                                            if(!empty($year_model)): 
                                                echo '<li><i class="fa fa-calendar" aria-hidden="true"></i>'.esc_html($year_model).' Model</li>';
                                            endif;
                                       // $term_list = wp_get_post_terms($post->ID, 'auto-location', array("fields" => "all"));
                                       // foreach($term_list as $term_single) 
                                            $location = $post->DREAM_auto_address;
											$pieces = explode(' ', $location);
											$last_word = array_pop($pieces);
                                            if(!empty($location)):
                                                echo '<li><i class="fa fa-map-marker" aria-hidden="true"></i>'.esc_html($last_word).'</li>';
                                            endif; 
                                    ?>
                                    </ul>  
                                  </div>  
                                 <div class="car-title-m">
                                    <h6><a href="<?php the_permalink();?>"><?php $title = get_the_title(); echo mb_strimwidth($title, 0, 28, '...'); ?> </a></h6>
                                     <?php  if(!empty($post->DREAM_auto_price)): ?>
                                        <span class="price"><?php carforyou_curcy_prefix(); ?><?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></span>
                                     <?php endif; ?>
                                 </div> 
                                 <div class="inventory_info_m">
                                 	<p><?php echo wp_trim_words( get_the_content(), 15, '...' ); ?></p>
                                 </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_query(); ?>
               </div>
               <!-- Recently Listed Used Cars -->
			   <?php
				if($tename[1]==$tename[1]){
$resul1 = $wpdb->get_results( "SELECT term_id FROM {$wpdb->prefix}terms WHERE slug = '".$tename[1]."'", OBJECT );
foreach($resul1 as $xt1){
$post1 = $xt1->term_id;

$res1 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}term_relationships WHERE term_taxonomy_id = '$post1'", OBJECT );
foreach($res1 as $sanj1){
$sus1[] = $sanj1->object_id;

}
}
$arg = array(
  'post__in'         => $sus1, 
  'post_type' => 'auto',
  'post_status' => 'publish',
  'posts_per_page' => $show	
);
}?>
                <div role="tabpanel" class="tab-pane" id="<?php echo esc_html($post1,'carforyou'); ?>">
                <?php 
$loops = new WP_Query($arg);
 while ($loops->have_posts()) : $loops->the_post();?>
                    <div class="col-list-3">	
                        <div class="recent-car-list">
                             <div class="car-info-box">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail() ):
                                            the_post_thumbnail('carforyou_small', array('class' => 'img-responsive'));
                                            else:
                                            echo "<div class='is-empty-img-box'></div>";
                                            endif;
                                     ?>
                                </a> 
                                <div class="compare_item">
                                    <div class="checkbox">
                                        <button id="compare_auto_btn" onclick="<?php echo esc_js('javascript:productCompare('.$post->ID.')'); ?>"><?php esc_html_e('Compare','carforyou'); ?></button>
                                    </div>
                                </div>
                                <ul>
                                
                                
                                        <?php 
                                        $km_done = get_post_meta(get_the_ID(), 'DREAM_auto_km_done', true);
                                        if(!empty($km_done)): 
                                            echo '<li><i class="fa fa-road" aria-hidden="true"></i>'.number_format_i18n(esc_html($km_done)).' '.$KmMiles.'</li>';
                                                        else:
                                            echo '<li><i class="fa fa-road" aria-hidden="true"></i>0,000 km</li>';
                                        endif;
                                    
                                     $term_list = wp_get_post_terms($post->ID, 'year-model', array("fields" => "all"));
                                        foreach($term_list as $term_single) 
                                        $year_model = $term_single->name;
                                            if(!empty($year_model)): 
                                                echo '<li><i class="fa fa-calendar" aria-hidden="true"></i>'.esc_html($year_model).' Model</li>';
                                            endif;
                                            
                                            
                                    //$term_list = wp_get_post_terms($post->ID, 'auto-location', array("fields" => "all"));
                                       // foreach($term_list as $term_single) 
                                            $location = $post->DREAM_auto_address;
											$pieces = explode(' ', $location);
											$last_word = array_pop($pieces);
                                            if(!empty($location)):
                                                echo '<li><i class="fa fa-map-marker" aria-hidden="true"></i>'.esc_html($last_word).'</li>';
                                            endif; 
                                    ?>
                                    </ul>   
                              </div>  
                             <div class="car-title-m">
                                    <h6><a href="<?php the_permalink();?>"><?php $title = get_the_title(); echo mb_strimwidth($title, 0, 28, '...'); ?> </a></h6>
                                    <?php  if(!empty($post->DREAM_auto_price)): ?>
                                    <span class="price"><?php carforyou_curcy_prefix(); ?> <?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></span>
                                    <?php endif; ?>
                            </div>
                             <div class="inventory_info_m">
                                 	<p><?php echo wp_trim_words( get_the_content(), 15, '...' ); ?></p>
                             </div>
                        </div>
                    </div>
                 <?php endwhile; wp_reset_query(); ?>   
                </div>
           </div>     
        </div>
<?php } 
}

// FeaturedCar Function 
function carforyou_FeaturedCar($atts){
ob_start();?>
<div class="row">

	<?php 
    extract( shortcode_atts(array('show' =>''), $atts ));
    $loop = new WP_Query( array('post_type' => 'auto', 'posts_per_page'=>$show, 'post_status' =>' publish',
	
	'meta_query' => array(
        array(
            'key' => 'DREAM_featured_auto',
            'value' =>'yes',
			
        ))));
    while ($loop->have_posts()) : $loop->the_post();
    global $post; ?>
        <div class="col-list-3">
          <div class="featured-car-list">
                <div class="featured-car-img">
                    <a href="<?php the_permalink();?>">
                        <?php if(has_post_thumbnail()):
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
                <div class="featured-car-content">
                    <h6><a href="<?php the_permalink(); ?>"><?php $title = get_the_title(); echo mb_strimwidth($title, 0, 30, '...'); ?></a></h6>
                    <div class="price_info">
                        <?php  if(!empty($post->DREAM_auto_price)): ?>
                        <p class="featured-price"><?php carforyou_curcy_prefix(); ?><?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></p>
                        <?php endif; ?>
                        <div class="car-location">
                        <?php //$term_list = wp_get_post_terms($post->ID, 'auto-location', array("fields" => "all"));
                               // foreach($term_list as $term_single) 
							   $location = $post->DREAM_auto_address;
											$pieces = explode(' ', $location);
											$last_word = array_pop($pieces);
                                            
                                   // $location = $term_single->name;
                        ?>
                        <?php  if(!empty($last_word)): ?>
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html($last_word); ?> </span>
                        <?php endif; ?>
                        </div>
                    </div>
                    <ul>
                        <?php carforyou_featuredList(); ?> 
                    </ul>
                </div>
          </div>
        </div>
    <?php endwhile; wp_reset_query(); ?>   
</div>
<?php }

//LatestCar Function
function carforyou_LatestCar($atts){
ob_start();?>
<div class="row">

	<?php 
    extract( shortcode_atts(array('show' =>''), $atts ));
    $loop = new WP_Query( array('post_type' => 'auto', 'posts_per_page'=>$show, 'offset' => 1
));
    while ($loop->have_posts()) : $loop->the_post();
    global $post; ?>
        <div class="col-list-3">
          <div class="featured-car-list">
                <div class="featured-car-img">
                    <a href="<?php the_permalink();?>">
                        <?php if(has_post_thumbnail()):
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
                <div class="featured-car-content">
                    <h6><a href="<?php the_permalink(); ?>"><?php $title = get_the_title(); echo mb_strimwidth($title, 0, 30, '...'); ?></a></h6>
                    <div class="price_info">
                        <?php  if(!empty($post->DREAM_auto_price)): ?>
                        <p class="featured-price"><?php carforyou_curcy_prefix(); ?><?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></p>
                        <?php endif; ?>
                        <div class="car-location">
                        <?php  $location = $post->DREAM_auto_address;
											$pieces = explode(' ', $location);
											$last_word = array_pop($pieces);
                        ?>
                        <?php  if(!empty($location)): ?>
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html($last_word); ?> </span>
                        <?php endif; ?>
                        </div>
                    </div>
                    <ul>
                        <?php carforyou_featuredList(); ?> 
                    </ul>
                </div>
          </div>
        </div>
    <?php endwhile; wp_reset_query(); ?>   
</div>
<?php }

// Currency Symbols
function carforyou_curcy_prefix(){
$curcy_symbol = carforyou_get_option('currency_symbols');
	echo esc_html($curcy_symbol);
}

//Home Banner slider

function carforyou_banner_slider($atts){
ob_start();?>
<div id="homebannerslider" style="margin-bottom: -30px;">
<div class="owl-carousel owl-theme">
<?php 
    extract( shortcode_atts(array('show' =>''), $atts ));
    $loop = new WP_Query( array('post_type' => 'slider', 'posts_per_page'=>-1
));
    while ($loop->have_posts()) : $loop->the_post();
    global $post; 
      
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');?>
<div class="slides" style="background-image: url('<?php echo esc_url($featured_img_url); ?>');     background-position: center center;
    background-size: cover;
    height: 80vh;
    position: relative; ">
<div class="container">
	<div class="wpb_column vc_column_container vc_col-sm-12">
		<div class="vc_column-inner">
			<div class="wpb_wrapper">
				<div class="vc_row wpb_row vc_inner vc_row-fluid">
					<div class="wpb_column vc_column_container vc_col-sm-8">
						<div class="vc_column-inner">
							<div class="wpb_wrapper"></div>
						</div>
					</div>
					<div class="banner_content wpb_column vc_column_container vc_col-sm-4" style="padding-top: 120px;">
						<div class="vc_column-inner">
							<div class="wpb_wrapper">
							<h1 style="font-size: 40px;color: #ffffff;line-height: 50px;text-align: left" class="vc_custom_heading"><?php the_title(); ?></h1>
								<div class="wpb_text_column wpb_content_element ">
									<div class="wpb_wrapper">
										<p><?php the_content(); ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div></div>
    <?php endwhile; wp_reset_query(); ?>   
</div>
</div>
<?php }

//Home Banner slider 2

function carforyou_banner_slider_2($atts){
ob_start();?>
<div id="homebannerslider" style="margin-bottom: -30px;">
<div class="owl-carousel owl-theme">
<?php 
    extract( shortcode_atts(array('show' =>''), $atts ));
    $loop = new WP_Query( array('post_type' => 'slider', 'posts_per_page'=>-1
));
    while ($loop->have_posts()) : $loop->the_post();
    global $post; 
      
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');?>
<div class="slides" style="background-image: url('<?php echo esc_url($featured_img_url); ?>');     background-position: center center;
    background-size: cover;
    height: 80vh;
    position: relative; ">
<div class="container">
	<div class="wpb_column vc_column_container vc_col-sm-12">
		<div class="vc_column-inner">
			<div class="wpb_wrapper">
				<div class="vc_row wpb_row vc_inner vc_row-fluid">
					<div class="wpb_column vc_column_container vc_col-sm-8">
						<div class="vc_column-inner">
							<div class="wpb_wrapper"></div>
						</div>
					</div>
					<div class="banner_content wpb_column vc_column_container vc_col-sm-4" style="padding-top: 120px;">
						<div class="vc_column-inner">
							<div class="wpb_wrapper">
							<h1 style="font-size: 40px;color: #ffffff;line-height: 50px;text-align: left" class="vc_custom_heading"><?php the_title(); ?></h1>
								<div class="wpb_text_column wpb_content_element ">
									<div class="wpb_wrapper">
										<p><?php the_content(); ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div></div>
    <?php endwhile; wp_reset_query(); ?>   
</div>
</div>
<?php }
function carforyou_filter_3($atts){
ob_start();	
extract(shortcode_atts(array('show' =>''), $atts));?>
  <div class="sidebar_widget sidebar_3">

    <?php 

         $Search = carforyou_get_option('serch_car');

        if(!empty($Search)) : ?>

    <div class="widget_heading">

      <h5><i class="fa fa-filter" aria-hidden="true"></i><?php echo esc_html($Search);?></h5>

    </div>

    <?php endif; ?>

    <div class="sidebar_filter">

    <?php 
session_start();	
	$autotype1 = $_SESSION["autotype1"];
	$fueltype1 = $_SESSION["fueltype1"];
	$modelyear1 = $_SESSION["modelyear1"];
	$automodel1 = $_SESSION["automodel1"];
	$autobrand1 = $_SESSION["autobrand1"];
	$location1 = $_SESSION["location1"];
$location ='';$automodel ='';$modelyear ='';$brand ='';$autotype ='';
if(isset($_REQUEST['searchauto'])):	
	$location_enalble = carforyou_get_option('location_enalble');
	if($location_enalble=='1'|| $location_enalble==''): 
		$location = $_REQUEST['location'];
	endif;
	$brand_enalble = carforyou_get_option('brand_enalble');
	if($brand_enalble=='1'|| $brand_enalble==''):
		$brand = $_REQUEST['autobrand'];
		$automodel = $_REQUEST['automodel'];
	endif;
	$year_enalble = carforyou_get_option('year_enalble');
	if($year_enalble=='1'|| $year_enalble==''):
		$modelyear = $_REQUEST['modelyear'];
	endif;	
	$type_enalble = carforyou_get_option('type_enalble');
	if($type_enalble=='1'|| $type_enalble==''):
		$autotype = $_REQUEST['autotype'];	
	endif;
   $fuel_enalble = carforyou_get_option('fuel_enalble');
	if($fuel_enalble=='1'|| $fuel_enalble==''):
		$fueltype = $_REQUEST['fueltype'];	
	endif;		
endif;
?>
<form id="filter_home3" action="<?php echo esc_url(get_permalink(carforyou_get_option('serch_filter_pagelink'))); ?>" method="get">
<?php wp_nonce_field( 'style1_value', 'style1_nonce',false); ?>
<?php
$brand_enalble = carforyou_get_option('brand_enalble');
if($brand_enalble=='1'|| $brand_enalble==''): ?>
  <div class="form-group select col-md-6">
    <select name="autobrand" class="form-control autobrand">
      <option value="">
      <?php esc_html_e('Select Brand','carforyou'); ?>
      </option>
      <?php
		$taxonomy = 'auto-brand';
		$tax_terms = get_terms($taxonomy);
		foreach ($tax_terms as $tax_term):
		$selected = "";
						if($autobrand1 == $tax_term->slug){
							
							$selected = 'selected="selected"';
						}?>
      <option value="<?php echo esc_attr($tax_term->slug); ?>" ><?php echo esc_html($tax_term->name); ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group select col-md-6">
    <select name="automodel" class="form-control automodel" >
	<?php 
		$args = array( 'post_type' => 'auto', 'posts_per_page' => -1, 'tax_query' => array( array( 'taxonomy' => 'auto-brand', 'field' => 'slug', 'terms' => $autobrand1) ));                    

			$wp_query1  = new WP_Query( $args );

			while ( $wp_query1 ->have_posts() ) : $wp_query1 ->the_post();   

			   $auto_model = get_post_meta( get_the_ID(), 'DREAM_auto_model', true );

			   if(!empty($auto_model)):
				$selected = ""; 
					if($automodel1 == $auto_model){
						$selected = 'selected="selected"';
						
					}
				   $modal_selects[]='<option value="'.$auto_model.'" '.$selected.'>'.$auto_model.'</option>';

			   endif;

			endwhile; 	 

			$modal_selects = array_unique($modal_selects);

			sort($modal_selects);

			foreach($modal_selects as $modal_select):

				echo esc_html($modal_select);

			endforeach;
	 ?>
		<option value="" <?php if($automodel):?> selected="selected" <?php endif; ?>>
      <?php esc_html_e('Select Brand First','carforyou'); ?>
      </option>
	
      
    </select>
  </div>
<?php endif;
$year_enalble = carforyou_get_option('year_enalble');
		if($year_enalble=='1'|| $year_enalble==''): ?>
          <div class="form-group col-md-6 select">
            <div class="select">
              <select class="form-control modelyear" name="modelyear">
                <option value="">
                <?php esc_html_e('Year of Model','carforyou'); ?>
                </option>
                <?php if($modelyear){ ?>
                <option value="<?php echo esc_attr($modelyear); ?>"><?php echo esc_html($modelyear); ?></option>
                <?php }
				$taxonomy = 'year-model';
				$tax_terms = get_terms($taxonomy);
				foreach ($tax_terms as $tax_term) {
					echo '<option value="'.esc_attr($tax_term->slug).'">'.esc_html($tax_term->name).'</option>';
				}
				?>
              </select>
            </div>
          </div>
		  <!--Type of fuel start-->
		<?php endif;
$fuel_enalble = carforyou_get_option('fuel_enalble');
if($fuel_enalble=='1'|| $fuel_enalble==''):?>
<div class="form-group select col-md-6">
    <div class="select">
       <select class="form-control" name="fueltype">
	  <option value=""><?php esc_html_e('Vehicle Fuel Type','carforyou'); ?></option>
	  <?php if($fueltype){ ?>
      <option value="<?php echo esc_html($fueltype,'carforyou'); ?>" <?php if($fueltype):?> selected="selected" <?php endif; ?>><?php echo esc_html($fueltype,'carforyou'); ?></option>
      <?php }
	   global $wpdb;
	$table_name = $wpdb->prefix . "postmeta"; 
    
	$unique_cities = array();
	foreach( $wpdb->get_results("SELECT * FROM $table_name WHERE meta_key='DREAM_fuel_type' order by meta_value ASC") as $key => $row) { 
	 $my_column = $row->meta_value;
	 if( ! in_array( $my_column, $unique_cities ) ) :
            // add city to array so it doesn't repeat
            $unique_cities[] = $my_column;
			$selected1 = "";
						if($fueltype1 == $my_column){
							
							$selected1 = 'selected="selected"';
						}
    ?>
	<option value="<?php echo esc_html($my_column,'carforyou'); ?>" <?php echo esc_html($selected1,'carforyou'); ?>><?php echo esc_html($my_column,'carforyou'); ?></option>
	
	<?php endif; }

	  
	  ?>
     </select>
    </div>
</div>
<!--Type Of Fuel End-->
<?php endif;
$type_enalble = carforyou_get_option('type_enalble');
		if($type_enalble=='1'|| $type_enalble==''):?>
          <div class="form-group col-md-6 select">
            <div class="select">
              <select class="form-control" name="autotype">
                <option value="">
                <?php esc_html_e('Type of Car','carforyou'); ?>
                </option>
                <?php $typeterm = get_terms('type-car');
					foreach ($typeterm as $typeterms){
						echo '<option value="'.esc_attr($typeterms->slug).'">'.esc_html($typeterms->name).'</option>';
					} ?>
              </select>
            </div>
          </div>
        <?php endif; 
$price_enalble = carforyou_get_option('price_enalble');
if($price_enalble=='1'|| $price_enalble==''):?>
  <div class="form-group col-md-6 price">
    <label class="form-label">
      <?php esc_html_e('Price Range','carforyou');?>
      (
      <?php carforyou_curcy_prefix(); ?>
      ) </label>
    <input name="priceRange" type="text" class="span2 price_range" value="" data-slider-min="<?php carforyou_min_meta_value();?>" data-slider-max="<?php carforyou_max_meta_value();?>" data-slider-step="5" data-slider-value="[<?php carforyou_min_meta_value();?>,<?php carforyou_max_meta_value();?>]"/>
  </div>
<?php endif; ?>
  <div class="form-group submit">
    <button type="submit" name="searchauto" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i>
    <?php esc_html_e('Search Car','carforyou'); ?>
    </button>
  </div>
  
  <?php $advanced_enalble = carforyou_get_option('advanced_enalble');
if($advanced_enalble=='1'|| $advanced_enalble==''):?> 
  <div class="form-group advance_btn">
    <button type="button" class="btn btn-block" data-toggle="modal" data-target="#adnaced_search"><i class="fa fa-search-plus" aria-hidden="true"></i>
    <?php esc_html_e('Advanced Search','carforyou'); ?>
    </button>
  </div>
 <?php endif;  ?> 
  
</form>


    </div>

  </div>
 <script>
var jquery=jQuery.noConflict();

jquery( document ).ready(function() {
	jquery(".autobrand").change(function(){
		 var name=jquery(".autobrand").val();
		// alert(name);
		 var datastring = 'name='+ name;
		 jquery.ajax({ 
				type: "POST",
				url: "<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/carforyou/functions/get_year.php",
				data: datastring,
				cache: false,
				success: function(html)
				{
					jquery(".modelyear").html(html);
				}
			});
		 });
});

</script> 
  
<?php } 

function carforyou_home_3_car($atts){
ob_start();?>
<div class="row">

	<?php 
    extract( shortcode_atts(array('show' =>''), $atts ));
    $loop = new WP_Query( array('post_type' => 'auto', 'posts_per_page'=>$show, 'post_status' =>' publish',));
    while ($loop->have_posts()) : $loop->the_post();
    global $post; ?>
	<div class="col-md-4 col-sm-6">
				<div class="featured-listing-wrap">
					<div class="listing-image">
						<a href="<?php the_permalink();?>">
                        <?php if(has_post_thumbnail()):
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
					<h4><a href="<?php the_permalink(); ?>"><?php $title = get_the_title(); echo mb_strimwidth($title, 0, 30, '...'); ?></a></h4>
					<p class="listing-price"><?php carforyou_curcy_prefix(); ?><?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></p>
					<div class="listing-meta">
						<ul>
							<?php
							$fuel_type = get_post_meta(get_the_ID(), 'DREAM_fuel_type', true);
							if(!empty($fuel_type)): 
								 echo '<li><i class="fa fa-car" aria-hidden="true"></i>'.esc_html($fuel_type).'</li>';
							endif;
							?>							
							<?php $km_done = get_post_meta(get_the_ID(), 'DREAM_auto_km_done', true);
							if(!empty($km_done)): 
								 echo '<li><i class="fa fa-tachometer" aria-hidden="true"></i>'.number_format_i18n(esc_html($km_done)).''.$KmMiles.'</li>';
							endif; ?>
							<?php $transmission = get_post_meta(get_the_ID(), 'DREAM_auto_transmission', true);
							if(!empty($transmission)): 
										echo '<li><i class="fa fa-road" aria-hidden="true"></i>'.esc_html($transmission).'</li>'; 
							endif; ?>
						</ul>
					</div>
				</div>
			</div>
    <?php endwhile; wp_reset_query(); ?>   
</div>
<?php }