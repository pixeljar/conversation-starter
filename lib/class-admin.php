<?php
/**
 * Core functionality.
 *
 * @package Conversation_Starter
 */

namespace PJ_Conversation_Starter;

/**
 * Core functionality.
 */
class Admin {

	/**
	 * Plugin Name.
	 *
	 * @var string $pluginname
	 */
	public static $pluginname = 'Conversation Starter';

	/**
	 * Plugin URL.
	 *
	 * @var string $pluginurl
	 */
	public static $pluginurl = 'https://wordpress.org/plugins/conversation-starter';

	/**
	 * Support Forum URL.
	 *
	 * @var string $forumurl
	 */
	public static $forumurl = 'https://wordpress.org/support/plugin/conversation-starter/';

	/**
	 * Options.
	 *
	 * @var array $options
	 */
	public static $options = [];

	/**
	 * INIT FUNCTION
	 * - This function is called when the class is instantiated
	 * - It sets up the options array
	 * - It calls the parent class's hooks function
	 */
	public static function init() {

		/*
			OPTION TYPES:
			- checkbox: name, id, desc, std, type
			- radio: name, id, desc, std, type, options
			- text: name, id, desc, std, type
			- colorpicker: name, id, desc, std, type
			- select: name, id, desc, std, type, options
			- textarea: name, id, desc, std, type, options
		*/
		self::$options = [
			[
				'name' => __( 'Default Prompt Text', 'pj-convo' ),
				'desc' => __( 'set up your default prompt', 'pj-convo' ),
				'type' => 'subhead',
			],
			[
				'name' => __( 'Default Text', 'pj-convo' ),
				'id'   => 'conversation-starter_default_prompt_text',
				'desc' => __( 'It\'s important to customize the prompt text on a post-by-post basis for this plugin to be most effective. This field will become the generic, default text if you choose not to customize the text on posts.', 'pj-convo' ),
				'std'  => 'What do you think about this post?',
				'type' => 'text',
			],
			[
				'name' => __( 'Color Scheme', 'pj-convo' ),
				'desc' => __( 'customize your color scheme', 'pj-convo' ),
				'type' => 'subhead',
			],
			[
				'name' => __( 'Background color', 'pj-convo' ),
				'id'   => 'conversation-starter_background_color',
				'desc' => __( 'Use hex values and be sure to include the leading #.', 'pj-convo' ),
				'std'  => '#efefef',
				'type' => 'colorpicker',
			],

			[
				'name' => __( 'Border Options', 'pj-convo' ),
				'desc' => __( 'choose border styles', 'pj-convo' ),
				'type' => 'subhead',
			],
			[
				'name'    => __( 'Show Border', 'pj-convo' ),
				'id'      => 'conversation-starter_show_border',
				'desc'    => __( 'If enabled, a border will appear around your prompt.', 'pj-convo' ),
				'std'     => 'enabled',
				'type'    => 'select',
				'options' => [
					'enabled'  => __( 'Enabled', 'pj-convo' ),
					'disabled' => __( 'Disabled', 'pj-convo' ),
				],
			],
			[
				'name'    => __( 'Border Type', 'pj-convo' ),
				'id'      => 'conversation-starter_border_type',
				'desc'    => __( 'Choose from the following border types: ', 'pj-convo' ),
				'std'     => 'solid',
				'type'    => 'select',
				'options' => [
					'solid'  => __( 'Solid', 'pj-convo' ),
					'dotted' => __( 'Dotted', 'pj-convo' ),
					'dashed' => __( 'Dashed', 'pj-convo' ),
				],
			],
			[
				'name' => __( 'Border color', 'pj-convo' ),
				'id'   => 'conversation-starter_border_color',
				'desc' => __( 'Use hex values and be sure to include the leading #.', 'pj-convo' ),
				'std'  => '#cccccc',
				'type' => 'colorpicker',
			],
			[
				'name' => __( 'Border Width', 'pj-convo' ),
				'id'   => 'conversation-starter_border_width',
				'desc' => __( 'The width of your border (in pixels).', 'pj-convo' ),
				'std'  => '1',
				'type' => 'text',
			],
			[
				'name' => __( 'Border Radius', 'pj-convo' ),
				'id'   => 'conversation-starter_border_radius',
				'desc' => __( 'The radius of your border (in pixels).', 'pj-convo' ),
				'std'  => '0',
				'type' => 'text',
			],
			[
				'name' => __( 'Margin/Padding Options', 'pj-convo' ),
				'desc' => __( 'set spacing to match your design', 'pj-convo' ),
				'type' => 'subhead',
			],
			[
				'name' => __( 'Message Padding', 'pj-convo' ),
				'id'   => 'conversation-starter_div_padding',
				'desc' => __( 'The padding (inside the box) of your message (in pixels).', 'pj-convo' ),
				'std'  => '10',
				'type' => 'text',
			],
			[
				'name' => __( 'Message Margin', 'pj-convo' ),
				'id'   => 'conversation-starter_div_margin',
				'desc' => __( 'The margin (outside the box) of your message (in pixels).', 'pj-convo' ),
				'std'  => '0',
				'type' => 'text',
			],
			[
				'name' => __( 'Font Options', 'pj-convo' ),
				'desc' => __( 'choose font styles', 'pj-convo' ),
				'type' => 'subhead',
			],
			[
				'name' => __( 'Font Color', 'pj-convo' ),
				'id'   => 'conversation-starter_font_color',
				'desc' => __( 'Use hex values and be sure to include the leading #.', 'pj-convo' ),
				'std'  => '#ffffff',
				'type' => 'colorpicker',
			],
			[
				'name'    => __( 'Font Weight', 'pj-convo' ),
				'id'      => 'conversation-starter_font_weight',
				'desc'    => __( 'If you want your text to be bold, you can set that here.', 'pj-convo' ),
				'std'     => 'normal',
				'type'    => 'select',
				'options' => [
					'normal' => __( 'Normal', 'pj-convo' ),
					'bold'   => __( 'Bold', 'pj-convo' ),
				],
			],
		];

		self::hooks();

	}

	/**
	 * Hook into WordPress.
	 *
	 * @return void
	 */
	public static function hooks() {

		// Initialize the settings.
		register_activation_hook(
			PJ_CONVO_PATH . 'pj-convo.php',
			[ __CLASS__, 'activate_me' ]
		);

		// Normal hooks.
		add_action( 'admin_enqueue_scripts', [ __CLASS__, 'admin_enqueue_scripts' ] );
		add_action( 'admin_menu', [ __CLASS__, 'add_admin_page' ] );

	}

	/**
	 * Enqueue Admin Scripts.
	 */
	public static function admin_enqueue_scripts() {

		$screen = get_current_screen();
		if ( false !== strpos( $screen->base, 'conversation-starter' ) ) {

			// Admin CSS.
			wp_enqueue_style(
				'conversation-starter_admin_css',
				PJ_CONVO_ASSETS . 'css/admin.css',
				[ 'farbtastic' ],
				PJ_CONVO_VERSION
			);

			// Admin JS.
			wp_enqueue_script(
				'conversation-starter_admin_js',
				PJ_CONVO_ASSETS . 'js/admin.js',
				[ 'jquery', 'farbtastic' ],
				PJ_CONVO_VERSION,
				true
			);
		}

	}

	/**
	 * Create all the default options when activating the plugin.
	 */
	public static function activate_me() {

		foreach ( self::$options as $option ) {

			if ( isset( $option['id'], $option['std'] ) ) {

				update_option( $option['id'], $option['std'] );

			}

		}

	}

	/**
	 * Add the admin page.
	 */
	public static function add_admin_page() {

		add_options_page(
			self::$pluginname . __( ' Options', 'pj-convo' ),
			self::$pluginname . __( ' Options', 'pj-convo' ),
			'manage_options',
			'conversation-starter',
			[ __CLASS__, 'admin_page_view' ]
		);

	}

	/**
	 * Admin Page View.
	 */
	public static function admin_page_view() {

		$screen = get_current_screen();
		if ( false !== strpos( $screen->base, 'conversation-starter' ) ) {

			if (
				isset( $_REQUEST['action'], $_REQUEST['_wpnonce'] ) &&
				wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ), 'conversation-starter-update-options_styling' ) &&
				'save' === sanitize_text_field( wp_unslash( $_REQUEST['action'] ) )
			) {

				foreach ( self::$options as $value ) {

					if ( isset( $value['id'], $_REQUEST[ $value['id'] ] ) ) {

						update_option( $value['id'], sanitize_text_field( wp_unslash( $_REQUEST[ $value['id'] ] ) ) );

					} elseif ( isset( $value['id'] ) ) {

						delete_option( $value['id'] );

					}

				}

				printf(
					'<div class="notice notice-success is-dismissible"><p>%s</p></div>',
					esc_html__( 'Settings saved!', 'pj-convo' )
				);

			} elseif (
				isset( $_REQUEST['action'], $_REQUEST['_wpnonce'] ) &&
				wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ), 'conversation-starter-reset-options_styling' ) &&
				'reset' === sanitize_text_field( wp_unslash( $_REQUEST['action'] ) )
			) {

				self::activate_me();

				printf(
					'<div class="notice notice-success is-dismissible"><p>%s</p></div>',
					esc_html__( 'Settings reset!', 'pj-convo' )
				);

			}

		}

		require_once PJ_CONVO_PATH . 'views/options.php';

	}

}

Admin::init();
