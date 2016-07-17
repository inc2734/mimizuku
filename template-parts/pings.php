<?php
$comments_by_type = $wp_query->comments_by_type;
?>
<section class="p-trackbacks">
	<h1 class="p-trackbacks__title"><?php esc_html_e( 'Trackbacks and Pingbacks on this post', 'mimizuku' ); ?></h1>

	<?php if ( ! empty( $comments_by_type['pings'] ) ) : ?>

		<ol class="p-trackbacks__list">
			<?php
			wp_list_comments( [
				'type'     => 'pings',
				'callback' => 'Mimizuku\Tags\the_pings'
			] );
			?>
		</ol>

	<?php else : ?>

		<p class="p-trackbacks__notrackbacks">
			<?php esc_html_e( 'No trackbacks.', 'mimizuku' ); ?>
		</p>

	<?php endif; ?>

	<?php if ( pings_open() ) : ?>

		<div class="p-trackbacks__trackback-url">
			<dl>
				<dt><?php esc_html_e( 'TrackBack URL', 'mimizuku' ); ?></dt>
				<dd><input class="_c-form-control" type="text" size="50" value="<?php trackback_url( true ); ?>" readonly="readonly" /></dd>
			</dl>
		</div>

	<?php endif; ?>

</section>
