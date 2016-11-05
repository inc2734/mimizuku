<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Tags;

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
		<?php
		\Mimizuku\App\Tags\get_template_part( 'template-parts/comment', [
			'_comment' => $comment,
			'_args'    => $args,
			'_depth'   => $depth,
		] );
		?>
	<?php
}
