<?php
/**
 * Frontend handler.
 *
 * @package PJ_Conversation_Starter
 */

class Frontend {

	/**
	 * Stub method.
	 */
	public function __construct() {}

	/**
	 * The hooks for this class.
	 */
	public static function hooks() {

		add_action( 'wp_footer', [ __CLASS__, 'footer_js' ] );

	}

	/**
	 * Adds javascript to the footer in the worst possible way.
	 *
	 * @return void
	 */
	public static function footer_js() {

		global $post;
		echo '<script language="javascript" src="' . get_option( 'home' ) . '/index.php?conversation-starter=frontend_js&convo-id=' . $post->ID . '"></script>';

	}

}

Frontend::hooks();
