<?php
/**
 * Changelog handler.
 *
 * @package PJ_Conversation_Starter
 */

namespace PJ_Conversation_Starter;

/**
 * The changelog class.
 */
class Changelog {

	/**
	 * Stub method.
	 */
	public function __construct() {}

	/**
	 * The transient name
	 *
	 * @var $transient_name The name of the transient.
	 */
	private static $transient_name = '_pj_convo_activation';

	/**
	 * The admin page slug
	 *
	 * @var $page_slug The changelog url slug for the admin.
	 */
	private static $page_slug = 'conversation-starter-changelog';

	/**
	 * The hooks for this class.
	 */
	public static function hooks() {

		register_activation_hook(
			PJ_CONVO_PATH . 'pj-convo.php',
			[ __CLASS__, 'welcome_transient' ]
		);
		add_action( 'admin_init', [ __CLASS__, 'welcome_redirect' ] );
		add_action( 'admin_menu', [ __CLASS__, 'admin_page' ] );
		add_action( 'admin_enqueue_scripts', [ __CLASS__, 'enqueue_style' ], 10, 1 );
		add_filter( 'plugin_action_links_conversation-starter/pj-convo.php', [ __CLASS__, 'plugin_link' ], 10, 1 );

	}

	/**
	 * Set a transient when this plugin is activated.
	 */
	public static function welcome_transient() {

		set_transient( self::$transient_name, true, 30 );

	}

	/**
	 * Redirect to changelog when plugin is activated.
	 */
	public static function welcome_redirect() {

		// If no transient set, return.
		if ( ! get_transient( self::$transient_name ) ) {
			return;
		}

		// Delete the transient to prevent multiple redirects.
		delete_transient( self::$transient_name );

		// Do not redirect on network activate or bulk activate.
		if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification
			return;
		}

		// Redirect to the changelog.
		wp_safe_redirect(
			add_query_arg( 'page', self::$page_slug, admin_url() )
		);

	}

	/**
	 * Adds admin page.
	 */
	public static function admin_page() {

		add_submenu_page(
			null,
			__( 'Conversation Starter Changelog', 'pj-convo' ),
			__( 'Conversation Starter Changelog', 'pj-convo' ),
			'manage_options',
			self::$page_slug,
			[ __CLASS__, 'render_admin_page' ]
		);

	}

	/**
	 * Renders admin page.
	 */
	public static function render_admin_page() {

		require_once PJ_CONVO_PATH . 'views/changelog.php';

	}

	/**
	 * Enqueue style to changelog page.
	 *
	 * @param string $hook The name of the hook.
	 */
	public static function enqueue_style( $hook = '' ) {

		if ( 'dashboard_page_' . self::$page_slug !== $hook ) {
			return;
		}

		wp_enqueue_style(
			'conversation-starter-changelog',
			PJ_CONVO_ASSETS . 'css/changelog.css',
			[],
			PJ_CONVO_VERSION,
			'all'
		);

	}

	/**
	 * Add Changelog link to plugins page
	 *
	 * @param array $links THe links that show up on the plugins page.
	 */
	public static function plugin_link( $links = [] ) {

		$links['changlog'] = sprintf(
			'<a href="%s" aria-label="%s">%s</a>',
			add_query_arg( 'page', self::$page_slug, admin_url() ),
			esc_attr__( 'Conversation Starter Changelog', 'pj-convo' ),
			esc_html__( 'Changelog', 'pj-convo' )
		);
		return $links;

	}

}

Changelog::hooks();
