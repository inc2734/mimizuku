<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\Tags;

/**
 * Callback function of the each comments
 *
 * @param WP_Comment $comment Comment to display
 * @param array $args An array of arguments
 * @param int $depth Depth of the current comment
 * @return void
 */
function the_comments( $comment, $args, $depth ) {
	?>
	<li <?php comment_class( [ '_p-comments__item' ] ); ?> id="li-comment-<?php comment_ID() ?>">
		<div class="_p-comment" id="comment-<?php comment_ID(); ?>">
			<div class="_p-comment__figure">
				<?php echo get_avatar( $comment, '48' ); ?>
			</div>
			<div class="_p-comment__body">
				<?php if ( 0 === $comment->comment_approved ) : ?>
				<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'mimizuku' ) ?></em>
				<?php endif; ?>
				<div class="_p-comment__meta">
					<?php
					$author = sprintf( '<cite>%s</cite>', get_comment_author_link() );
					$date   = get_comment_date();
					$time   = get_comment_time();
					printf(
						esc_html__( '%1$s said on %2$s at %3$s', 'mimizuku' ),
						wp_kses_post( $author ),
						wp_kses_post( $date ),
						wp_kses_post( $time )
					);
					edit_comment_link( 'edit', '  ', '' );
					?>
				</div>

				<?php comment_text() ?>

				<?php
				$args = array_merge( $args, [
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
				] );
				?>

				<?php if ( ! empty( get_comment_reply_link( $args ) ) ) : ?>
				<div class="_p-comment__reply">
					<?php comment_reply_link( $args ); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	<?php
}
