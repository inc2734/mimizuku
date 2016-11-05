<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup;

class Password_Form {

	public function __construct() {
		add_action( 'the_password_form', [ $this, 'password_form' ] );
		add_action( 'the_content', [ $this, 'remove_unnecessary_tags' ] );
	}

	/**
	 * Sets up password form markup
	 *
	 * @param string $output
	 * @return string
	 */
	public function password_form( $output ) {
		ob_start();
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
		<?php
		$output = ob_get_clean();
		$output = str_replace( [ "\n", "\r", "\n\r", "\t" ], '', $output );
		return $output;
	}

	/**
	 * Remove unnecessary tags
	 *
	 * @param string $content
	 * @return string
	 */
	public function remove_unnecessary_tags( $content ) {
		return preg_replace( '/<p>(<input class="_c-input-group__btn")/', '$1', $content );
	}
}
