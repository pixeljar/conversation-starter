<?php
/**
 * Frontend handler.
 *
 * @package PJ_Conversation_Starter
 */

namespace PJ_Conversation_Starter;

/**
 * Frontend handler.
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

		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'scripts_and_styles' ] );
		add_action( 'template_redirect', [ __CLASS__, 'load_dynamic_assets' ] );
		add_filter( 'query_vars', [ __CLASS__, 'query_vars' ] );

	}

	/**
	 * Adds javascript to the footer.
	 *
	 * @return void
	 */
	public static function scripts_and_styles() {

		if ( is_admin() ) {
			return;
		}

		$prompt = get_post_meta( get_the_ID(), 'prompt', true );
		if ( '' !== $prompt ) {

			wp_enqueue_style(
				'conversation-starter-public',
				add_query_arg(
					[
						'conversation-starter' => 'frontend_css',
					],
					home_url( '/index.php' )
				),
				[],
				PJ_CONVO_VERSION
			);

			wp_enqueue_script(
				'conversation-starter-public',
				add_query_arg(
					[
						'conversation-starter' => 'frontend_js',
						'convo-id'             => get_the_ID(),
					],
					home_url( '/index.php' )
				),
				[ 'jquery' ],
				PJ_CONVO_VERSION,
				true
			);

		}

	}

	/**
	 * Generates dynamic JS and CSS for the frontend.
	 *
	 * @return void
	 */
	public static function load_dynamic_assets() {

		$conversation_starter = get_query_var( 'conversation-starter' );

		if ( $conversation_starter && 'frontend_css' === $conversation_starter ) {

			header( 'Content-type: text/css' );
			include PJ_CONVO_PATH . 'assets/css/frontend.php';
			die();

		} elseif ( $conversation_starter && 'frontend_js' === $conversation_starter ) {

			header( 'Content-type: text/javascript' );
			include PJ_CONVO_PATH . 'assets/js/frontend.php';
			die();

		}

	}

	/**
	 * Registers query variables.
	 *
	 * @param  array $vars The variables array.
	 * @return array
	 */
	public static function query_vars( $vars = [] ) {

		$vars[] = 'conversation-starter';
		$vars[] = 'convo-id';
		return $vars;

	}

}

Frontend::hooks();
