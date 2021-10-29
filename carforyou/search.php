<?php

/**

 * The template for displaying Category pages

 *

 * @link https://codex.wordpress.org/Template_Hierarchy

 *

 * @package WordPress

 * @subpackage carforyou

 * @since carforyou 2.5

 */

get_header(); ?>

<!-- Banners -->

<section class="page-header blog_page" style="background:url(<?php carforyou_InnerHeader();?> )">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1 class="page_title"><?php printf(esc_html__( 'Search Results for: %s', 'carforyou' ), get_search_query() ); ?></h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="<?php echo esc_url(home_url('/'));?>">
          <?php esc_html_e('Home','carforyou') ?>
          </a></li>
        <li>
          <?php esc_html_e('Search Page','carforyou') ?>
        </li>
      </ul>
    </div>
  </div>
  
  <!-- Dark Overlay-->
  
  <div class="dark-overlay"></div>
</section>

<!-- /Banners --> 

<!-- Our Articles -->

<section class="our_blog">
  <div class="container">
    <div class="row">
      <?php if(have_posts()): 

                   carforyou_BlogStyle();

                  else:?>
      <div class="col-lg-9 col-md-8">
        <h2>
          <?php esc_html_e('Search Result Not Found...', 'carforyou'); ?>
        </h2>
      </div>
      
      <!--Side-bar-->
      
      <aside class="col-lg-3 col-md-4">
        <?php get_sidebar(); ?>
      </aside>
      
      <!--Side-bar-->
      
      <?php endif; ?>
    </div>
  </div>
</section>
<!-- /Our Articles -->
<?php get_footer();

