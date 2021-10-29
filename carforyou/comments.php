<?php

/*

The comments page for Carforyou

*

 * @package WordPress

 * @subpackage carforyou

 * @since carforyou 2.5

*/
if ( post_password_required() ) {
	return;
}
$review_enable = carforyou_get_option('review_enable');
if($review_enable=='1'|| $review_enable==''){ ?>
<div id="comments" class="comments-area">
  <?php if ( have_comments() ) : ?>
  <h5 class="block-head">
    <?php
				printf( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'carforyou' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
  </h5>
  <?php carforyou_comment_nav(); ?>
  <ul class="commentlist">
    <?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>
  </ul>
  <!-- .comment-list -->
  <?php carforyou_comment_nav(); ?>
  <?php endif; // have_comments() ?>
  <?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
  <p class="no-comments">
    <?php _e( 'Comments are closed.', 'carforyou' ); ?>
  </p>
  <?php endif; ?>
  <?php comment_form(); ?>
</div>
<?php }?>
<!-- .comments-area --> 