<?php
/**
 * The template for displaying comments.
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package olomo
 */
 if ( post_password_required() ) {
	return;
} ?>

<div class="comments-container margin-top-50">
<div id="comments" class="comments-area">
  <?php if ( have_comments() ) : ?>
  <h5 class="block-head">
    <?php
				printf( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'olomo' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
  </h5>
  <?php echo paginate_comments_links(); ?>
  <ul class="commentlist">
    <?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>
  </ul>
  <?php echo paginate_comments_links(); ?>
  <?php endif; ?>
  <?php
		if (!comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
  <p class="no-comments">
    <?php esc_html_e('Comments are closed.', 'olomo'); ?>
  </p>
  <?php endif; ?>
  <?php comment_form(); ?>
</div>
</div>
<!-- .comments-area --> 