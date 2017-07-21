<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Print Google Analytics script
 *
 * @return void
 */
add_action( 'mimizuku_prepend_body', function() {
	$traking_id = get_theme_mod( 'google-analytics-tracking-id' );
	if ( ! $traking_id ) {
		return;
	}

	if ( ! preg_match( '/^UA-\d+-\d+$/', $traking_id ) ) {
		return;
	}
	?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', <?php echo esc_js( $traking_id ); ?>, 'auto');
  ga('send', 'pageview');
</script>
	<?php
} );
