<?php
/**
 * Options.php
 *
 * This file is used to display the options page for the plugin
 *
 * @package ConversationStarter
 * @since 1.4
 */

?>
<div class="wrap" id="p-options">
	<h1>Conversation Starter - <?php esc_html_e( 'Options', 'pj-convo' ); ?></h1>
	<div id="vop-header">
		<p>
			<strong><?php esc_html_e( 'Need help with these options?', 'pj-convo' ); ?></strong>
			<?php esc_html_e( 'Visit the', 'pj-convo' ); ?>
			<a href="<?php echo esc_attr( self::$forumurl ); ?>" target="_blank">
				<?php esc_html_e( 'Support Forums', 'pj-convo' ); ?>
			</a>
		</p>
	</div><!--end vop-header-->
	<div id="vop-body">
		<form method="post">
		<?php
		wp_nonce_field( 'conversation-starter-update-options_styling' );
		for ( $i = 0, $max = count( self::$options ); $i < $max; ++$i ) {

			switch ( self::$options[ $i ]['type'] ) {

				case 'subhead':
					if ( 0 !== $i ) {
						?>
								<div class="p-save-button submit">
									<input type="hidden" name="action" value="save" />
									<input class="button-primary" type="submit" value="<?php esc_attr_e( 'Save changes', 'pj-convo' ); ?>" name="save" />
								</div><!--end p-save-button-->
							</div>
						</div><!--end p-option-->
						<?php
					}
					?>
					<div class="p-option">
						<h3><?php echo esc_html( self::$options[ $i ]['name'] ); ?> <span><?php echo esc_html( self::$options[ $i ]['desc'] ); ?></span></h3>
						<div class="p-option-body clear">
							<?php
							$notice = '';
							if ( isset( self::$options[ $i ]['notice'] ) ) {
								$notice = self::$options[ $i ]['notice'];
							}
							if ( '' !== $notice ) {
								?>
								<p class="notice"><?php echo esc_html( $notice ); ?></p>
								<?php
							}
					break;

				case 'checkbox':
					?>
					<div class="p-field check clear">
						<div class="p-field-d"><?php echo esc_html( self::$options[ $i ]['desc'] ); ?></div>
						<input id="<?php echo esc_attr( self::$options[ $i ]['id'] ); ?>" type="checkbox" name="<?php echo esc_attr( self::$options[ $i ]['id'] ); ?>" value="true" <?php checked( empty( get_option( self::$options[ $i ]['id'] ) ), true ); ?> />
						<label for="<?php echo esc_attr( self::$options[ $i ]['id'] ); ?>"><?php echo esc_html( self::$options[ $i ]['name'] ); ?></label>
					</div><!--end p-field check-->
					<?php
					break;


				case 'radio':
					?>
					<div class="p-field radio clear">
						<div class="p-field-d"><?php echo esc_html( self::$options[ $i ]['desc'] ); ?></div>
						<?php
						$radio_setting = get_option( self::$options[ $i ]['id'] );
						$checked       = '';
						foreach ( self::$options[ $i ]['options'] as $key => $val ) {

							if ( '' !== $radio_setting && get_option( self::$options[ $i ]['id'] ) === $key ) {

								$checked = ' checked="checked"';

							} elseif ( $key === self::$options[ $i ]['std'] ) {

								$checked = 'checked="checked"';

							}
							?>
							<input type="radio" name="<?php echo esc_attr( self::$options[ $i ]['id'] ); ?>" value="<?php echo esc_attr( $key ); ?>"<?php echo $checked; ?> />
							<?php echo esc_html( $val ); ?><br />
							<?php
						}
						?>
						<label for="<?php echo esc_attr( self::$options[ $i ]['id'] ); ?>"><?php echo esc_html( self::$options[ $i ]['name'] ); ?></label>
					</div><!--end p-field radio-->
					<?php
					break;

				case 'text':
					?>
					<div class="p-field text clear">
						<div class="p-field-d"><?php echo esc_html( self::$options[ $i ]['desc'] ); ?></div>
						<label for="<?php echo esc_attr( self::$options[ $i ]['id'] ); ?>"><?php echo esc_html( self::$options[ $i ]['name'] ); ?></label>
						<input id="<?php echo esc_attr( self::$options[ $i ]['id'] ); ?>" type="text" name="<?php echo esc_attr( self::$options[ $i ]['id'] ); ?>" value="<?php echo esc_attr( ( '' !== get_option( self::$options[ $i ]['id'] ) ) ? get_option( self::$options[ $i ]['id'] ) : self::$options[ $i ]['std'] ); ?>" />
					</div><!--end p-field text-->
					<?php
					break;

				case 'colorpicker':
					?>
					<div class="p-field colorpicker clear">
						<div class="p-field-d"><?php echo esc_html( self::$options[ $i ]['desc'] ); ?> </div>
						<label for="<?php echo esc_attr( self::$options[ $i ]['id'] ); ?>">
							<?php echo esc_html( self::$options[ $i ]['name'] ); ?>
							<a href="javascript:return false;" onclick="toggleColorpicker( this, '<?php echo esc_js( self::$options[ $i ]['id'] ); ?>', 'open', '<?php echo esc_js( __( 'show color picker', 'pj-convo' ) ); ?>', '<?php echo esc_js( __( 'hide color picker', 'pj-convo' ) ); ?>');">
								<?php esc_html_e( 'show color picker', 'pj-convo' ); ?>
							</a>
						</label>
						<div id="<?php echo esc_attr( self::$options[ $i ]['id'] ); ?>_colorpicker" class="colorpicker_container"></div>
						<input id="<?php echo esc_attr( self::$options[ $i ]['id'] ); ?>" type="text" name="<?php echo esc_attr( self::$options[ $i ]['id'] ); ?>" value="<?php echo esc_attr( ( '' !== get_option( self::$options[ $i ]['id'] ) ) ? get_option( self::$options[ $i ]['id'] ) : self::$options[ $i ]['std'] ); ?>" />
					</div><!--end p-field colorpicker-->
					<?php
					break;

				case 'select':
					?>
					<div class="p-field select clear">
						<div class="p-field-d"><?php echo esc_html( self::$options[ $i ]['desc'] ); ?></div>
						<label for="<?php echo esc_attr( self::$options[ $i ]['id'] ); ?>"><?php echo esc_html( self::$options[ $i ]['name'] ); ?></label>
						<select id="<?php echo esc_attr( self::$options[ $i ]['id'] ); ?>" name="<?php echo esc_attr( self::$options[ $i ]['id'] ); ?>">
							<?php
							foreach ( self::$options[ $i ]['options'] as $key => $val ) {

								if ( '' === get_option( self::$options[ $i ]['id'] ) || is_null( get_option( self::$options[ $i ]['id'] ) ) ) {
									?>
									<option value="<?php echo esc_attr( $key ); ?>"<?php echo ( $key === self::$options[ $i ]['std'] ) ? ' selected="selected"' : ''; ?>><?php echo esc_html( $val ); ?></option>
									<?php
								} else {
									?>
									<option value="<?php echo esc_attr( $key ); ?>"<?php echo get_option( self::$options[ $i ]['id'] ) === $key ? ' selected="selected"' : ''; ?>><?php echo esc_html( $val ); ?></option>
									<?php
								}
							}
							?>
						</select>
					</div><!--end p-field select-->
					<?php
					break;

				case 'textarea':
					?>
					<div class="p-field textarea clear">
						<div class="p-field-d"><?php echo esc_html( self::$options[ $i ]['desc'] ); ?></div>
						<label for="<?php echo esc_attr( self::$options[ $i ]['id'] ); ?>"><?php echo esc_html( self::$options[ $i ]['name'] ); ?></label>
						<textarea id="<?php echo esc_attr( self::$options[ $i ]['id'] ); ?>" name="<?php echo esc_attr( self::$options[ $i ]['id'] ); ?>"<?php echo ( self::$options[ $i ]['options'] ? ' rows="' . esc_attr( self::$options[ $i ]['options']['rows'] ) . '" cols="' . esc_attr( self::$options[ $i ]['options']['cols'] ) . '"' : '' ); ?>><?php
							echo esc_textarea( ( '' !== get_option( self::$options[ $i ]['id'] ) ) ? get_option( self::$options[ $i ]['id'] ) : self::$options[ $i ]['std'] );
						?></textarea>
					</div><!--end vop-p-field textarea-->
					<?php
					break;

			}
		}
		?>
					<div class="p-save-button submit">
						<input class="button-primary" type="submit" value="<?php esc_attr_e( 'Save changes', 'pj-convo' ); ?>" name="save" />
					</div><!--end p-save-button-->
				</div>
			</div>
			<div class="p-saveall-button submit">
				<input class="button-primary" type="submit" value="<?php esc_attr_e( 'Save all changes', 'pj-convo' ); ?>" name="save" />
			</div>
		</form>
		<div class="p-reset-button submit">
			<form method="post">
			<?php wp_nonce_field( 'conversation-starter-reset-options_styling' ); ?>
				<input type="hidden" name="action" value="reset" />
				<input class="p-reset button-secondary delete" type="submit" value="<?php esc_attr_e( 'Reset all options', 'pj-convo' ); ?>" name="reset" />
			</form>
		</div>

		<script type="text/javascript">
		<?php
		for ( $i = 0, $max = count( self::$options ); $i < $max; ++$i ) {
			if ( 'colorpicker' === self::$options[ $i ]['type'] ) {
				?>
				jQuery( '#<?php echo esc_js( self::$options[ $i ]['id'] ); ?>_colorpicker').farbtastic( '#<?php echo esc_js( self::$options[ $i ]['id'] ); ?>' );
				<?php
			}
		}
		?>
			jQuery( '.colorpicker_container' ).hide();
		</script>
	</div><!--end vop-body-->
</div><!--end p-options-->
