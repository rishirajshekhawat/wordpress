<?php

/**

 *Template Name: Car Listing Page

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

if ( have_posts() ) :while ( have_posts() ) : the_post();?>

<!--Page Header-->
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
              <?php  echo esc_html(wp_count_posts('auto')->publish); ?>
              <span>
              <?php esc_html_e('Listings','carforyou'); ?>
              </span></p>
          </div>
          <?php carforyou_FilterbyOrder(); ?>
        </div>
        <?php carforyou_ClassicList(); ?>
      </div>
      <aside class="<?php echo esc_attr($side_grid); ?>">
        <?php carforyou_listpagesidebar(); ?>
      </aside>
    </div>
  </div>
</section>
<?php  endwhile; endif; 

 get_footer(); ?>
