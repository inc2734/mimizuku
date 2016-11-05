<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Tags;

/**
 * Callback function of the each pings
 *
 * @return void
 */
function the_pings() {
	?>
	<li <?php comment_class( [ '_c-trackbacks__item' ] ); ?> id="li-comment-<?php comment_ID() ?>">
		<?php \Mimizuku\App\Tags\get_template_part( 'template-parts/trackback' ); ?>
	<?php
}
