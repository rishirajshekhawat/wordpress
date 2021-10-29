<?php 
/**

 *Template Name: All Type Car

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
get_header(); 
?>
<?php carforyou_inner_header(); ?>

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
            <p>
              <?php  
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;			  
			 $custom_terms = get_terms('type-car');
				$allterm[] = array();
				foreach($custom_terms as $custom_term) {
					$allterm[] = $custom_term->slug;
				}
				
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
		
				$wp_query = new WP_Query($args);

				echo esc_html($wp_query->found_posts);
				?>
              <span>
              <?php esc_html_e('Listings','carforyou'); ?>
              </span></p>
          </div>
          <?php carforyou_FilterbyOrder(); ?>
        </div>
        <?php 
		
		Carforyou_all_type_car(); ?>
      </div>
      <aside class="<?php echo esc_attr($side_grid); ?>">
        <?php carforyou_listpagesidebar(); ?>
      </aside>
    </div>
  </div>
</section>
<?php get_footer(); ?>