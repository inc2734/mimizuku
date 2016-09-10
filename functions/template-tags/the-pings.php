<?php
namespace Mimizuku\Tags;

/**
 * Callback function of the each pings
 *
 * @return void
 */
function the_pings() {
	?>
	<li <?php comment_class( ['_c-trackbacks__item'] ); ?> id="li-comment-<?php comment_ID() ?>">
		<dl class="_p-trackback" id="comment-<?php comment_ID(); ?>">
			<dt class="_p-trackback__meta">
				<?php
				printf(
					__( '<cite class="fn">%1$s</cite> said on %2$s at %3$s', 'mimizuku' ),
					get_comment_author_link(),
					get_comment_date(),
					get_comment_time()
				);
				edit_comment_link( 'edit', '  ', '' );
				?>
			</dt>
			<dd class="_p-trackback__body">
				<?php comment_text() ?>
			</dd>
		</dl>
	<?php
}
