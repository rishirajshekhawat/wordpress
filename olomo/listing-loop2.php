<?php
$output = null;
	global $olomo_options;		
	$latitude = listing_get_metabox('latitude');
	$longitude = listing_get_metabox('longitude');
	$gAddress = listing_get_metabox('gAddress');
	$isfavouriteicon = olomo_is_favourite_grids(get_the_ID(),$onlyicon=true);
	$isfavouritetext = olomo_is_favourite_grids(get_the_ID(),$onlyicon=false);
	
	$tagline_text = listing_get_metabox('tagline_text');
?>
<div class="show_listing grid-box-contianer" data-title="<?php echo get_the_title(); ?>" data-postid="<?php echo get_the_ID(); ?>" data-lattitue="<?php echo esc_attr($latitude); ?>" data-longitute="<?php echo esc_attr($longitude); ?>" data-posturl="<?php echo get_the_permalink(); ?>">
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
                            echo '<span class="cate_icon"><a href="'.esc_url($term_link).'"><img class="icon icons8-Food" src="'.esc_url($category_image).'"></span></a>';
                        }
                    }
                }                ?>
                <span class="listing_like"><?php olomo_listinglikes(); ?></span>            
            </div>
				<?php 		
                    $random_ads = get_post_meta(get_the_ID(), '_is_ds_featured_post', true);
                    if(!empty($random_ads)) {?>
                    <div class="featured_label"><?php esc_html_e('Featured', 'olomo');?></div>
					<?php
                    }
                ?>
    		<div class="like_post">
                <a href="#" data-post-type="grids" data-post-id="<?php echo get_the_ID(); ?>" data-success-text="Saved" class="status-btn add-to-fav add-to-fav <?php echo esc_attr($isfavouritetext); ?>"><i class="fa <?php echo esc_attr($isfavouriteicon); ?>"></i></a>
                <span class="save_text"><?php echo esc_html($isfavouritetext); ?></span>
           </div>
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
                endif;
            ?>
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
			}
		?>
      </div>
      <h4><a href="<?php echo get_the_permalink(); ?>"> <?php the_title(); ?></a></h4>
      <?php if(!empty($tagline_text)): ?>
        	<p><?php echo esc_html($tagline_text); ?></p>
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
				echo '('.$NumberRating; ?> <?php echo esc_html($review).')';
			}
			else{
				echo cal_listing_rate(get_the_ID());
			}?> 
        </p>
        <p class="listing_map_m">
          <?php
			$cats = get_the_terms(get_the_ID(), 'location');
			echo '<i class="fa fa-map-marker"></i>';
			if(!empty($cats)){
				foreach ( $cats as $cat ) {
					$term_link = get_term_link($cat);
					echo '
					<a href="'.esc_url($term_link).'">
						'.esc_html($cat->name).'
					</a>';
				}
			}?>
        </p>
        <?php if(!empty($gAddress)) { ?>
      <div class="hide"> <span class="cat-icon"> <?php echo olomo_icons('mapMarkerGrey'); ?> </span> <span class="text gaddress"><?php echo substr($gAddress, 0, 30); ?>...</span> </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>