<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Filters the default gallery shortcode output
 *
 * @param string $output The gallery output. Default empty.
 * @param array $attr Attributes of the gallery shortcode.
 *   @var link string null|file|none
 *   @var size string null|thumbnail|medium|large|full
 *   @var columns int
 *   @var ids string
 *   @var orderby string rand|null
 * @param int $instance Unique numeric ID of this gallery shortcode instance.
 */
add_filter( 'post_gallery', function( $output, $attr, $instance ) {
	$post = get_post();

	if ( ! empty( $attr['ids'] ) ) {
		if ( empty( $attr['orderby'] ) ) {
			$attr['orderby'] = 'post__in';
		}
		$attr['include'] = $attr['ids'];
	}

	$atts = shortcode_atts( [
		'id'      => $post ? $post->ID : 0,
		'link'    => '',
		'size'    => 'thumbnail',
		'columns' => 3,
		'order'   => 'ASC',
		'orderby' => 'menu_order ID',
		'include' => '',
	], $attr );

	$id = intval( $atts['id'] );

	if ( ! empty( $atts['include'] ) ) {
		$attachments = get_posts( array(
			'include'        => $atts['include'],
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => $atts['order'],
			'orderby'        => $atts['orderby'],
		) );
	} else {
		$attachments = get_children( array(
			'post_parent'    => $id,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => $atts['order'],
			'orderby'        => $atts['orderby'],
		) );
	}

	if ( empty( $attachments ) ) {
		return '';
	}

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $attachment ) {
			$output .= wp_get_attachment_link( $attachment->ID, $atts['size'], true ) . "\n";
		}
		return $output;
	}

	$attachments = array_values( $attachments );

	ob_start();
	?>
	<div class="c-gallery c-gallery--<?php echo esc_attr( $atts['columns'] ); ?>-columns">
		<?php $attachments_count = count( $attachments ); ?>
		<?php for ( $i = 0; $i < $attachments_count; $i ++ ) : ?>
			<?php
			$attachment = $attachments[ $i ];
			?>
			<div class="c-gallery__item">
				<?php if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) : ?>
					<a class="c-gallery__thumbnail" href="#c-gallery-id-<?php echo esc_attr( esc_attr( $attachment->ID ) ); ?>" style="
						background-image: url(<?php echo esc_url( wp_get_attachment_image_url( $attachment->ID, $atts['size'], false ) ); ?>);
					"></a>
				<?php elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) : ?>
					<div class="c-gallery__thumbnail" style="
						background-image: url(<?php echo esc_url( wp_get_attachment_image_url( $attachment->ID, $atts['size'], false ) ); ?>);
					"></div>
				<?php else : ?>
					<a class="c-gallery__thumbnail" href="<?php echo esc_url( get_attachment_link( $attachment->ID ) ); ?>" style="
						background-image: url(<?php echo esc_url( wp_get_attachment_image_url( $attachment->ID, $atts['size'], false ) ); ?>);
					"></a>
				<?php endif; ?>

				<?php if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) : ?>
					<div class="c-gallery__overlay" id="c-gallery-id-<?php echo esc_attr( $attachment->ID ); ?>">
						<a class="c-gallery__close-btn" href="#_">
							<i class="fa fa-close" aria-hidden="true"></i>
						</a>

						<?php if ( isset( $attachments[ $i - 1 ] ) ) : ?>
							<a class="c-gallery__prev-btn" href="#c-gallery-id-<?php echo esc_attr( $attachments[ $i - 1 ]->ID ); ?>">
								<i class="fa fa-angle-left" aria-hidden="true"></i>
							</a>
						<?php endif; ?>

						<?php if ( isset( $attachments[ $i + 1 ] ) ) : ?>
							<a class="c-gallery__next-btn" href="#c-gallery-id-<?php echo esc_attr( $attachments[ $i + 1 ]->ID ); ?>">
								<i class="fa fa-angle-right" aria-hidden="true"></i>
							</a>
						<?php endif; ?>

						<a class="c-gallery__overlay-inner" href="#_">
							<?php $size = image_downsize( $attachment->ID, 'full' ); ?>
							<div class="c-gallery__image" style="
								background-image: url(<?php echo esc_url( wp_get_attachment_image_url( $attachment->ID, 'full', false ) ); ?>);
								height: <?php echo esc_attr( $size[2] ); ?>px;
								width: <?php echo esc_attr( $size[1] ); ?>px;
							"></div>
						</a>
					</div>
				<?php endif; ?>
			</div>
		<?php endfor; ?>
	</div>
	<?php
	return ob_get_clean();
}, 10, 3 );

/**
 * Change style of gallery in wysiwyg
 *
 * @param array $mce_init
 */
add_filter( 'tiny_mce_before_init', function( $mce_init ) {
	$styles  = '.wpview .gallery { margin: 0; display: block; border: 2px solid #666; text-align: center; height: 80px; }';
	$styles .= '.wpview .gallery > * { display: none; }';
	$styles .= '.wpview .gallery::before { margin-top: 20px; display: inline-block; content: \'\\\\f161\'; font-family: dashicons; font-size: 18px; color: #666 }';
	if ( isset( $mce_init['content_style'] ) ) {
		$mce_init['content_style'] .= $styles;
	} else {
		$mce_init['content_style'] = $styles;
	}
	return $mce_init;
} );
