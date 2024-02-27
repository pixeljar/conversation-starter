<?php
/**
 * Frontend JS
 *
 * @package PJ_Conversation_Starter
 */

if ( ! isset( $_GET['convo-id'] ) ) {
	return;
}

$prompt = get_post_meta( intval( wp_unslash( $_GET['convo-id'] ) ), 'prompt', true ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
?>
jQuery( document ).ready( function( $ ) {
	$( 'textarea[name="comment"]' ).parents()
		.map(
			function () {

				console.log(this.tagName);
				if ( this.tagName == 'FORM' ) {

					$( this ).before( '<div id="pj-convo-comment-prompt"><?php echo esc_html( $prompt ); ?></div>' );

				}
			}
		);
});
