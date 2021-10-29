<?php
global $olomo_options;
$authorURL = $olomo_options['listing-author'];
 ?>
<div id="titlebar">
    <div class="row">
        <div class="col-md-12">
            <h2><?php esc_html_e('My Listings','olomo'); ?></h2>
            <!-- Breadcrumbs -->
            <nav id="breadcrumbs">
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home','olomo'); ?></a></li>
                    <li><a href="<?php echo esc_url($authorURL); ?>"><?php esc_html_e('Dashboard','olomo'); ?></a></li>
                    <li><?php esc_html_e('My Listings','olomo'); ?></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <!-- Listings -->
    <div class="col-lg-12 col-md-12">
        <div class="dashboard-list-box margin-top-0">
            <h4><?php esc_html_e('Pending Listings','olomo'); ?></h4>
            
                    <?php
                    global $paged, $wp_query;
                    $current_user = wp_get_current_user();
                    $user_id = $current_user->ID;
                    $args=array(
                        'post_type' => 'listing',
                        'post_status' => 'pending',
                        'posts_per_page' => 20,
                        'author' => $user_id,
                        'paged' => $paged,
                    );
                    $wp_query = null;
                    $wp_query = new WP_Query($args);
                    if( $wp_query->have_posts() ) {?>
                    <ul>
					<?php 
                        while ($wp_query->have_posts()) : $wp_query->the_post();  
                            $Plan_id = listing_get_metabox('Plan_id');
                            $plan_time  = get_post_meta($Plan_id, 'plan_time', true);
                            global $wp_rewrite,$olomo_options;
                            $edit_post_page_id = $olomo_options['edit-listing'];
                            $postID = $post->ID;
                            if ($wp_rewrite->permalink_structure == ''){
                                $edit_post = $edit_post_page_id."&post=".$postID;
                            }else{
                                $edit_post = $edit_post_page_id."?post=".$postID;
                            }
                            ?>
                            <li>
                                <div class="list-box-listing">
                                    <div class="list-box-listing-img">
                                        <?php	
                                            if(has_post_thumbnail()){
                                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'medium');
                                                if(!empty($image[0])){
                                                    echo "<a href='".get_the_permalink()."' >
                                                            <img src='" . esc_url($image[0]) . "' />
                                                        </a>";
                                                }
                                            }
                                        ?>	
                                    </div>
                                    <div class="list-box-listing-content">
                                        <div class="inner">
                                            <h3><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>  <span class="full-right"><i class="fa fa-calendar"></i><?php the_time(get_option( 'date_format')); ?></span></h3>
                                            <div class="listing_element_m">
                                                <ul>
                                                    <?php
                                                        $cats = get_the_terms( get_the_ID(), 'listing-category' );
                                                        if(!empty($cats)){
                                                            foreach ( $cats as $cat ) {
                                                                $category_image = listing_get_tax_meta($cat->term_id,'category','image');
                                                                if(!empty($category_image)){ ?>
                                                                    <li class="list_cate_icon">
                                                                        <a href="<?php echo get_term_link($cat); ?>">
                                                                            <img src="<?php echo esc_attr($category_image); ?>" alt="<?php echo esc_attr($cat->name); ?>">
                                                                        </a>
                                                                    </li>
                                                                <?php } ?>
                                                                <li><a href="<?php echo get_term_link($cat); ?>"><?php echo esc_html($cat->name); ?></a></li>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                    <li><i class="fa fa-clock-o"></i>
                                                        <?php 
                                                        if(!empty($plan_time)){
                                                            $startdate = get_the_time('d-m-Y');
                                                            $endDate = date('d-m-Y', strtotime($startdate. ' + '.$plan_time.' days'));		
                                                            $diff = (strtotime($endDate) - time()) / 60 / 60 / 24;
                                                            if ($diff < 1 && $diff > 0) {
                                                                $days = 1;
                                                            } else {
                                                                $days = floor($diff);
                                                            }
                                                        }else{
                                                            $days = esc_html__('Unlimited','olomo');
                                                        }
                                                            echo esc_html($days).esc_html__(' Days Left','olomo');
                                                        ?>
                                                        
                                                    </li>
                                                    <li> <i class="fa fa-check-circle"></i>
                                                        <?php 
                                                            if(get_post_status() == 'publish'){
                                                                echo esc_html__('Published','olomo');
                                                            }elseif(get_post_status() == 'pending'){
                                                                echo esc_html__('Pending','olomo');
                                                            }
                                                        ?>
                                                    </li>
                                                </ul>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons-to-right">
                                <?php
										global $post;
										echo olomo_post_confirmation($post);
								?>
                                    <a target="_blank" href="<?php echo esc_url($edit_post); ?>" class="button gray"><i class="fa fa-pencil"></i></a>       
                                    <a href="#" data-toggle="modal" data-target="#modal-<?php echo esc_attr($postID); ?>" class="md-trigger button red"><i class="fa fa-trash-o"></i></a>
                                </div>
                            </li>
                            
                            <div class="modal fade" id="modal-<?php echo esc_attr($postID); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <form method="post">
                                          <div class="modal-body">
                                                <h3><?php  esc_html_e('Are you sure you want to delete this item?', 'olomo'); ?></h3>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn" data-postid="<?php echo esc_attr($postID); ?>" data-dismiss="modal"> <?php  esc_html_e('No', 'olomo'); ?></button>
                                             <input type="submit" value="<?php esc_attr_e('Yes', 'olomo'); ?>" class="btn">
                                             <input name="removeid" type="hidden" value="<?php echo esc_attr($postID); ?>" />
                                          </div>
                                      </form>
                                    </div>
                                  </div>
                            </div>    
                        <?php endwhile; ?>
                        </ul>
						<?php 
                        echo olomo_pagination();
						wp_reset_postdata();
                    }
					else{
                        ?>
                        <div class="error-column box-shadownon">
                            <i class="fa fa-frown-o" aria-hidden="true"></i>
                            <h1><?php esc_html_e('Sorry','olomo'); ?></h1>
                            <h2><?php esc_html_e('You have no Pending listing.','olomo'); ?></h2>
                       </div>
                        <?php
                    }
                 ?>
            
        </div>
    </div>
    <!-- Copyrights -->
    <div class="col-md-12">
	<?php 
        $copy_right = $olomo_options['copy_right'];
        if($copy_right):
            echo '<div class="copyrights">'.wp_kses_post($copy_right).'</div>';
        else:
        echo '<div class="copyrights">';
		printf( esc_html__('&copy; 2018 %s. Created by', 'olomo'), 'olomo');
		echo wp_kses_post(' <a href="'.esc_url(__('http://webmasterdriver.net/', 'olomo')).'" target="_blank">'.esc_html__( 'WebMasterDriver','olomo').'</a>');
		echo '</div>';
        endif;
    ?>    
    </div>
</div>