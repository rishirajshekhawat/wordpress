<?php
$output = null;
	global $olomo_options;		
	$latitude = listing_get_metabox('latitude');
	$longitude = listing_get_metabox('longitude');
	$gAddress = listing_get_metabox('gAddress');
	$isfavouriteicon = olomo_is_favourite_grids(get_the_ID(),$onlyicon=true);
	$isfavouritetext = olomo_is_favourite_grids(get_the_ID(),$onlyicon=false);
?>
<div class="show_listing grid-box-contianer" data-title="<?php echo get_the_title(); ?>" data-postid="<?php echo get_the_ID(); ?>" data-lattitue="<?php echo esc_attr($latitude); ?>" data-longitute="<?php echo esc_attr($longitude); ?>" data-posturl="<?php echo get_the_permalink(); ?>">
	<div class="listing_wrap recent_listing_panel">
    	<div class="listing_img">
            <div class="member_social_info">
                    <ul>
                        <li> <a href="http://www.facebook.com/share.php?u=<?php echo esc_url(get_the_permalink()); ?>&title=<?php echo get_the_title(); ?>" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url(get_the_permalink()); ?>&title=<?php echo get_the_title(); ?>&source=<?php echo esc_url(home_url('/')); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="http://twitter.com/home?status=<?php echo get_the_title(); ?>+<?php echo esc_url(get_the_permalink()); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://plus.google.com/share?url=<?php echo esc_url(get_the_permalink()); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
            </div>
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
                }
                ?>
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
          <h4><a href="<?php echo get_the_permalink(); ?>"> <?php the_title(); ?></a></h4>
          <p><?php echo olomo_excerpt(10); ?></p>
          <div class="listing_review_info">
            <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date();?></p>
            <p class="listing_map_m">
              <?php
                $cats = get_the_terms(get_the_ID(), 'location');
                echo '<i class="fa fa-map-marker"></i>';
                if(!empty($cats)){
                    foreach ( $cats as $cat ) {
                        $term_link = get_term_link( $cat );
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