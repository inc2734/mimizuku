<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$comments_by_type = $wp_query->comments_by_type;
?>
<section class="_p-comments">
	<h2 class="_p-comments__title"><?php esc_html_e( 'Comments on this post', 'mimizuku' ); ?></h2>

	<?php if ( ! empty( $comments_by_type['comment'] ) ) : ?>

		<ol class="_p-comments__list">
			<?php
			wp_list_comments( [
				'type'     => 'comment',
				'callback' => '\Mimizuku\App\Tags\the_comments',
			] );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="_p-pagination">
				<?php the_comments_pagination(); ?>
			</div>
		<?php endif; ?>

		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p class="_p-comments__nocomments">
				<?php esc_html_e( 'Comments are closed.', 'mimizuku' ); ?>
			</p>
		<?php endif; ?>

	<?php else : ?>

		<p class="_p-comments__nocomments">
			<?php esc_html_e( 'No comments.', 'mimizuku' ); ?>
		</p>

	<?php endif; ?>

	<?php if ( comments_open() ) : ?>

		<div id="respond" class="_p-comments__respond">

			<div class="_p-comments__form">
				<?php comment_form(); ?>
			</div>

		</div>

	<?php endif; ?>

</section>
