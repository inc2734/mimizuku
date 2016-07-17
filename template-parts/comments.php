<?php
$comments_by_type = $wp_query->comments_by_type;
?>
<section class="p-comments">
	<h1 class="p-comments__title"><?php esc_html_e( 'Comments on this post', 'mimizuku' ); ?></h1>

	<?php if ( ! empty( $comments_by_type['comment'] ) ) : ?>

		<ol class="p-comments__list">
			<?php
			wp_list_comments( [
				'type'     => 'comment',
				'callback' => 'Mimizuku\Tags\the_comments',
			] );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="c-pagination">
				<?php the_comments_pagination(); ?>
			</div>
		<?php endif; ?>

	<?php else : ?>

		<p class="comments__nocomments">
			<?php esc_html_e( 'No comments.', 'mimizuku' ); ?>
		</p>

	<?php endif; ?>

	<?php if ( comments_open() ) : ?>

		<div id="respond" class="p-comments__respond">

			<?php if ( get_option( 'comment_registration' ) && empty( $user_ID ) ) : ?>

				<p>
					<?php
					printf(
						__( 'It is necessary to <a href="%/wp-login.php?redirect_to=%s">login</a> to write comment.', 'mimizuku' ),
						home_url(),
						get_permalink()
					);
					?>
				</p>

			<?php else : ?>

				<div class="p-comments__form">
					<?php comment_form(); ?>
				</div>

			<?php endif; ?>

		</div>

	<?php endif; ?>

</section>
