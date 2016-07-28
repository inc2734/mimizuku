<?php
$comments_by_type = $wp_query->comments_by_type;
?>
<section class="_c-comments">
	<h1 class="_c-comments__title"><?php esc_html_e( 'Comments on this post', 'mimizuku' ); ?></h1>

	<?php if ( ! empty( $comments_by_type['comment'] ) ) : ?>

		<ol class="_c-comments__list">
			<?php
			wp_list_comments( [
				'type'     => 'comment',
				'callback' => 'Mimizuku\Tags\the_comments',
			] );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="_p-pagination">
				<?php the_comments_pagination(); ?>
			</div>
		<?php endif; ?>

	<?php else : ?>

		<p class="_c-comments__nocomments">
			<?php esc_html_e( 'No comments.', 'mimizuku' ); ?>
		</p>

	<?php endif; ?>

	<?php if ( comments_open() ) : ?>

		<div id="respond" class="_c-comments__respond">

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

				<div class="_c-comments__form">
					<?php comment_form(); ?>
				</div>

			<?php endif; ?>

		</div>

	<?php endif; ?>

</section>
