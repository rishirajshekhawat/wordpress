<?php

/**

 * Main template file

 *

 * This is the most generic template file in a WordPress theme

 * and one of the two required files for a theme (the other being style.css).

 * It is used to display a page when nothing more specific matches a query.

 * E.g., it puts together the home page when no home.php file exists.

 * Learn more: http://codex.wordpress.org/Template_Hierarchy

 * @package WordPress

 * @subpackage carforyou

 * @since carforyou 2.5

 */

get_header(); ?>
<?php  if ( have_posts() ) : ?>
<!-- Our Articles -->
<section class="our_blog">
  <div class="container">
    <div class="row">
      <?php carforyou_BlogStyle(); ?>
    </div>
  </div>
</section>
<!-- /Our Articles -->
<?php  endif; ?>
<?php  get_footer();
