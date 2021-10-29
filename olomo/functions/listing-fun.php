<?php 
/**
 * functions hooks
 * @package WordPress
 * @subpackage olomo
 * @since olomo 1.5
 */
//Listing Categoty Style 1 Function
function olomo_listingcategory1($atts){
ob_start();
extract(shortcode_atts(array('show' =>''), $atts));?>
<div id="category_slider">
    <div class="owl-carousel owl-theme">
        <?php 
        $categories = get_terms( 'listing-category', array('number' =>$show));
        foreach($categories as $category) {
        	$category_image = listing_get_tax_meta($category->term_id,'category','image');?>	
            <div class="item">
                <a href="<?php echo get_term_link($category->term_id, 'listing-category');?>">
                   <?php 
				   echo '<div class="category_icon">';
                   if(!empty($category_image)){
                       echo '<img class="icon icons-banner-cat" src="'.esc_url($category_image).'" alt="'.esc_attr($category->name).'" />';	
                    }
					else{
                       echo '<img class="icon icons-banner-cat" src="'.get_template_directory_uri().'/assets/images/caticon.png" alt="'.esc_attr($category->name).'" />';	
					}
                   echo '</div>';	
					?> 
                    <p><?php echo esc_html($category->name); ?></p>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
<?php     
return ob_get_clean();             
}

//Listing Categoty Style 2 Function
function olomo_listingcategory2($atts){
ob_start();
extract(shortcode_atts(array('show' =>''), $atts));?>
<div id="category_slider2">
    <div class="owl-carousel owl-theme">
    <?php 
    $categories = get_terms( 'listing-category', array('number' =>$show));
    foreach($categories as $category) {
        $category_image = listing_get_tax_meta($category->term_id,'category','image');
        $category_banner = listing_get_tax_meta($category->term_id,'category','banner'); ?>	
        <div class="item" style="background-image:url(<?php echo esc_url($category_banner); ?>);">
            <a href="<?php echo get_term_link($category->term_id, 'listing-category');?>">
                <div class="category_icon">
                    <span class="category_listing_n"><?php echo esc_html($category->count); ?></span>
                    <?php
                     if(!empty($category_image)){
                        echo '<img class="icon icons-banner-cat" src="'.esc_url($category_image).'" alt="'.esc_attr($category->name).'" />';
                     }
                     else{
                         echo '<img class="icon icons-banner-cat" src="'.get_template_directory_uri().'/assets/images/caticon.png" alt="'.esc_attr($category->name).'" />';
                    } ?>
                </div>
                <p><?php echo esc_html($category->name); ?></p>
            </a>
        </div>
   <?php } ?>                
    </div>
</div>
<?php     
return ob_get_clean();             
}

/**** Location ****/
// Location Function Style 1
function olomo_listinglocation($atts){
ob_start();
extract(shortcode_atts(array('show' =>''), $atts));?>
<div class="row">
	<?php 
    $locations = get_terms('location', array('number' =>$show));
    foreach($locations as $location) {
        $location_image = listing_get_tax_meta($location->term_id,'location','image');?>	
        <div class="col-sm-6 col-md-3">
            <div class="cities_list" style="background-image:url(<?php echo esc_url($location_image); ?>);">
                <div class="city_listings_info">
                    <h4><?php echo esc_html($location->name); ?></h4>
                    <div class="listing_number"><span><?php echo esc_html($location->count); ?> <?php esc_html_e('Listings', 'olomo') ?> </span> </div>
                </div>
                <a href="<?php echo get_term_link($location->term_id, 'location');?>" class="overlay_link"></a>
            </div>
        </div>
    <?php } ?>
</div>
<?php     
return ob_get_clean();             
}

// Location Function Style 2
function olomo_listinglocation2($atts){
ob_start();
extract(shortcode_atts(array('show' =>''), $atts));?>
<div class="row">
	<?php 
    $locations = get_terms('location', array('number' =>$show));
	$number=1;
    foreach($locations as $location) {
        	$location_image = listing_get_tax_meta($location->term_id,'location','image');
			if($number % 2 == 0):?>
            <div class="col-md-6">
					<div class="city_panel">
						<a href="<?php echo get_term_link($location->term_id, 'location');?>" class="overlay_link"></a>
						<div class="city_picture col-md-push-0" style="background-image :url(<?php echo esc_url($location_image); ?>);"></div>
						<div class="city_content col-md-pull-0">
							<h6><?php echo esc_html($location->name); ?></h6>
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							<p><?php echo term_description($location->term_id,'location') ?></p>
						</div>
					</div>
				</div>
			<?php 
			else:?>
			<div class="col-md-6">
				  <div class="city_panel">
						<a href="<?php echo get_term_link($location->term_id, 'location');?>" class="overlay_link"></a>
						<div class="city_picture col-md-push-6" style="background-image :url(<?php echo esc_url($location_image); ?>);"></div>
						<div class="city_content col-md-pull-6">
							<h6><?php echo esc_html($location->name); ?></h6>
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							<p><?php echo term_description($location->term_id,'location'); ?></p>
						</div>
					</div>
			</div>
		  <?php endif; ?>  
    <?php $number++; } ?>
</div>
<?php     
return ob_get_clean();             
}


/* ============== Recent Listing ============ */
function olomo_recent_listing($atts) {
ob_start();	
extract(shortcode_atts(array('show' =>''), $atts));	
$loop = new WP_Query( array('post_type' => 'listing', 'post_status' => 'publish', 'posts_per_page'=>$show));?>
<div id="popular_listing_slider">
    <div class="owl-carousel owl-theme">  
    <?php
	if($loop->have_posts()){
        while ($loop->have_posts()):$loop->the_post();
                get_template_part('listing-loop3');	
        endwhile; wp_reset_postdata();
	}
	?>
    </div>
</div>
<?php 
return ob_get_clean();             
}

//Featured  Listing Function
function olomo_featured_listing($atts) {
ob_start();	
extract(shortcode_atts(array('show' =>''), $atts));	
$loop = new WP_Query( array('post_type' => 'listing', 'post_status' => 'publish', 'posts_per_page'=>$show, 'orderby' => 'meta_value_num', 'meta_query' => array( array( 'key' => '_is_ds_featured_post', 'value' =>'yes'))));?>
<div id="popular_listing_slider">
    <div class="owl-carousel owl-theme">  
    <?php
	if($loop->have_posts()){
        while ($loop->have_posts()):$loop->the_post();
                get_template_part('listing-loop2');	
        endwhile; wp_reset_postdata();
	}
	?>
    </div>
</div>
<?php 
return ob_get_clean();             
}

// Popular Listing Function
function olomo_popular($atts){
ob_start();		
extract(shortcode_atts(array('show' =>''), $atts));?>
<?php 
$loop = new WP_Query( array('post_type' => 'listing', 'post_status' => 'publish', 'posts_per_page'=>$show, 'orderby' => 'meta_value_num', 'meta_query' => array( array( 'key' => 'listing_reviewed', ) ) )); ?>
<div id="popular_listing_slider">
    <div class="owl-carousel owl-theme">
        <?php 	
        while ($loop->have_posts()):$loop->the_post();
                get_template_part('listing-loop2');	
        endwhile; wp_reset_postdata();
        ?>
    </div>
</div>
<?php
return ob_get_clean();             
}
// Banner Form
function olomo_forms(){
	$listCats=array();
	$catIcon = '';
	$defaultCats = null;
	global $olomo_options;
	$search_placeholder = $olomo_options['search_placeholder'];
	$location_default_text = $olomo_options['location_default_text'];
	
	$term_ID = '';
	$srchBr = '';
	$slct = '';
	$srchBr = 'ui-widget';
	$slct = 'select2';?>
    <div class="search_form">
        <form autocomplete="off" class="" action="<?php echo esc_url(home_url()); ?>" method="get">
                <div class="form-group select">
                	<div class="inner_form">
                        <div class="what-placeholder pos-relative" data-holder="">
                        <input autocomplete="off" type="text" class="form-control ui-autocomplete-input dropdown_fields" name="select" id="select" placeholder="<?php echo esc_attr($search_placeholder); ?>" data-prev-value='0'>
                        <input type="hidden" name="s_cat" id="s_cat">
                        <input type="hidden" name="s" value="listfilter">
                        <input type="hidden" name="post_type" value="listing">
                        </div>
                        <div id="input-dropdown">
                            <ul>
                                <?php
                                    $args = array('post_type' => 'listing', 'order' => 'ASC', 'hide_empty' => false, 'parent' => 0);
                                    $default_search_cats = '';
                                    if(isset($olomo_options['default_search_cats'])){
                                        $default_search_cats = $olomo_options['default_search_cats'];
                                    }
                                    if(empty($default_search_cats)){
                                        $listCatTerms = get_terms( 'listing-category',$args);
                                        if (!empty($listCatTerms ) && ! is_wp_error( $listCatTerms)){
                                            foreach ($listCatTerms as $term) {
                                                $catIcon = olomo_get_term_meta( $term->term_id,'category_image' );
                                                if(!empty($catIcon)){
                                                    $catIcon = '<img class="d-icon" src="'.esc_url($catIcon).'" />';
                                                }
                                                echo '<li class="wrap-cats" data-catid="'.$term->term_id.'">'.$catIcon.'<span class="s-cat">'.$term->name.'</span></li>';
                                                $defaultCats .='<li class="wrap-cats" data-catid="'.$term->term_id.'">'.$catIcon.'<span class="s-cat">'.$term->name.'</span></li>';
                                            }
                                        }
                                    }
                                    else{
                                            foreach ( $default_search_cats as $catTermID ) {
                                                $term = get_term_by('id', $catTermID, 'listing-category');
                                                $catIcon = olomo_get_term_meta( $term->term_id,'category_image' );
                                                if(!empty($catIcon)){
                                                    $catIcon = '<img class="d-icon" src="'.esc_url($catIcon).'" />';
                                                }
                                                echo '<li class="wrap-cats" data-catid="'.$term->term_id.'">'.$catIcon.'<span class="s-cat">'.$term->name.'</span></li>';
                                                
                                                $defaultCats .='<li class="wrap-cats" data-catid="'.$term->term_id.'">'.$catIcon.'<span class="s-cat">'.$term->name.'</span></li>';
                                            }
                                    }
                                ?>
                            </ul>
                            <div style="display:none" id="def-cats"><?php echo esc_html($defaultCats);?></div>
                        </div>
                    </div>   
                </div>
                <div class="form-group location-search">
                    <div data-option="" class="<?php echo esc_attr($srchBr); ?>">
                    <select class=" form-control <?php echo esc_attr($slct); ?>" name="s_loc" id="searchlocation">
                    <option id="def_location" value=""><?php echo esc_html($location_default_text); ?></option>
                    <?php 
                        $args = array('post_type' => 'listing', 'order' => 'ASC', 'hide_empty' => false, 'parent' => 0 );
                        $locations = get_terms( 'location',$args);
                        if (!empty($locations)&&!is_wp_error($locations)){
                            foreach($locations as $location) {
                                if(is_tax('location') && $term_ID == $location->term_id){
                                    $selected = 'selected';
                                }else{
                                    $selected = '';
                                }
                                echo '<option '.$selected.' value="'.esc_attr($location->term_id).'">'.esc_html($location->name).'</option>';
                            }
                        }
                    ?>
                  </select>
                </div>
                </div>
                <div class="form-group search_btn">
                    <input value="<?php echo esc_attr__('Search','olomo');?>" class="btn btn-block" type="submit">
            </div>
        </form>
    </div>      
<?php
}
// Banner Map With Form Style 1
function olomo_bannerMap($atts){
ob_start();
global $olomo_options;
$height = '';
$height = ' style="height:90vh;"';
?>
<div id="intro_map">
 	<div class="home" id="homeMap" style="height:90vh;"> 
    </div>  
  <?php olomo_forms(); ?>  
</div>            
<?php 
return ob_get_clean();             
}


// Banner Map With Form Style 2
function olomo_bannerMap2($atts){
ob_start();
global $olomo_options;
$height = '';
$height = ' style="height:90vh;"';?>
<div id="intro_map">
 	<div id="map">
    	<div class="home" id="homeMap" style="height:90vh;"></div>
    </div>  
    <div class="intro_search intro_search_parent">
        	<div class="intro_search_content">
            	<h2><?php esc_html_e('Find Your Destination', 'olomo'); ?></h2>
  				<?php olomo_forms(); ?> 
   			</div>
        </div>
</div>            
<?php 
return ob_get_clean();             
}
/* ============== Partner List ============ */
function olomo_partner($atts) {
ob_start();	
extract(shortcode_atts(array('show' =>''), $atts));	
$loop = new WP_Query( array('post_type' => 'partner', 'post_status' => 'publish', 'posts_per_page'=>$show));?>
    
<div class="partners_logo">
    <ul>
    <?php
	if($loop->have_posts()){
        while ($loop->have_posts()):$loop->the_post();?>
    	<li><a href="#" target="_blank"> <?php the_post_thumbnail('thumbnail');?></a></li>
		<?php 
        endwhile; 
		wp_reset_postdata();
	}
	?>
    </ul>
</div>
<?php 
return ob_get_clean();             
}