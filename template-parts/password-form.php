<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<form action="<?php echo esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ); ?>" class="post-password-form" method="post">
	<p>
		<?php esc_html_e( 'This content is password protected. To view it please enter your password below:', 'mimizuku' ); ?>
	</p>
	<div class="_c-input-group">
		<div class="_c-input-group__addon">
			<?php esc_html_e( 'Password:', 'mimizuku' ); ?>
		</div>
		<div class="_c-input-group__field">
			<input class="_c-input-group__control" name="post_password" type="password" size="20" />
		</div><input class="_c-input-group__btn" type="submit" name="Submit" value="<?php echo esc_attr_x( 'Enter', 'post password form', 'mimizuku' ); ?>" />
	</div>
</form>
