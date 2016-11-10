<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$comments_by_type = $wp_query->comments_by_type;
?>
<section class="_p-trackbacks">
	<h2 class="_p-trackbacks__title"><?php esc_html_e( 'Trackbacks and Pingbacks on this post', 'mimizuku' ); ?></h2>

	<?php if ( ! empty( $comments_by_type['pings'] ) ) : ?>

		<ol class="_p-trackbacks__list">
			<?php
			wp_list_comments( [
				'type'     => 'pings',
				'callback' => '\Mimizuku\App\Tags\the_pings',
			] );
			?>
		</ol>

	<?php else : ?>

		<p class="_p-trackbacks__notrackbacks">
			<?php esc_html_e( 'No trackbacks.', 'mimizuku' ); ?>
		</p>

	<?php endif; ?>

	<?php if ( pings_open() ) : ?>

		<div class="_p-trackbacks__trackback-url">
			<dl>
				<dt><?php esc_html_e( 'TrackBack URL', 'mimizuku' ); ?></dt>
				<dd><input class="_c-form-control" type="text" size="50" value="<?php trackback_url( true ); ?>" readonly="readonly" /></dd>
			</dl>
		</div>

	<?php endif; ?>

</section>
