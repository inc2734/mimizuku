<?php
namespace Mimizuku\Functions\PasswordForm;

/**
 * Sets up password form markup
 *
 * @param string $output
 * @return string
 */
function the_password_form( $output ) {
	ob_start();
	?>
	<form action="<?php echo esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ); ?>" class="post-password-form" method="post">
    <p>
			<?php echo __( 'This content is password protected. To view it please enter your password below:' ); ?>
		</p>
		<div class="_c-input-group">
			<div class="_c-input-group__addon">
				<?php echo __( 'Password:' ); ?>
			</div>
			<div class="_c-input-group__field">
				<input class="_c-input-group__control" name="post_password" type="password" size="20" />
			</div><input class="_c-input-group__btn" type="submit" name="Submit" value="<?php echo esc_attr_x( 'Enter', 'post password form' ); ?>" />
		</div>
	</form>
	<?php
	$output = ob_get_clean();
	$output = str_replace( ["\n", "\r", "\n\r", "\t"], '', $output );
	return $output;
}
add_action( 'the_password_form', __NAMESPACE__ . '\\the_password_form' );

/**
 * Remove unnecessary tags
 *
 * @param string $content
 * @return string
 */
function the_content( $content ) {
	return preg_replace( '/<p>(<input class="_c-input-group__btn")/', '$1', $content );
}
add_action( 'the_content', __NAMESPACE__ . '\\the_content' );
