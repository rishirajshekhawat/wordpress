<?php 

/**

 * The Template for displaying all single posts.

 *

 * @package		carforyou

 * @subpackage	Templates

 * @author		wmd team

 * @copyright	Copyright (c) 2020

 * @link		http://www.webmasterdriver.net

 * @since		carforyou 2.5

 */

get_header(); ?>

<!--Page Header-->

<section class="page-header blog_page" style="background-image:url(<?php carforyou_InnerHeader();?> )">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>
          <?php the_title();?>
        </h1>
      </div>
      <?php carforyou_breadcrumb(); ?>
    </div>
  </div>
  
  <!-- Dark Overlay-->
  
  <div class="dark-overlay"></div>
</section>

<!-- /Page Header-->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
carforyou_setPostViews(get_the_ID()); ?>
<section class="our_blog">
  <div class="container">
    <div class="row">
      <?php carforyou_Blog_Single_Page(); ?>
    </div>
  </div>
</section>
<?php endwhile; endif;

get_footer();
