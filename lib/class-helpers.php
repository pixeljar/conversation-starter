<?php
/**
 * Helpers to retrieve the data.
 *
 * @package ConversationStarter
 */

namespace PJ_Conversation_Starter;

/**
 * Helpers to retrieve the data.
 */
class Helpers {

	/**
	 * This function returns the padding option.
	 *
	 * @return array
	 */
	public static function get_padding() {
		return [
			'top'    => get_option( 'conversation-starter_div_padding' ),
			'right'  => get_option( 'conversation-starter_div_padding' ),
			'bottom' => get_option( 'conversation-starter_div_padding' ),
			'left'   => get_option( 'conversation-starter_div_padding' ),
		];
	}

	/**
	 * This function returns the margin option.
	 *
	 * @return array
	 */
	public static function get_margin() {
		return array(
			'top'    => get_option( 'conversation-starter_div_margin' ),
			'right'  => get_option( 'conversation-starter_div_margin' ),
			'bottom' => get_option( 'conversation-starter_div_margin' ),
			'left'   => get_option( 'conversation-starter_div_margin' ),
		);
	}

	/**
	 * This function returns the border enabled.
	 *
	 * @return array
	 */
	public static function show_border() {

		if ( 'enabled' === get_option( 'conversation-starter_show_border' ) ) {

			return true;

		} else {

			return false;

		}

	}

	/**
	 * This function returns the border color.
	 *
	 * @return array
	 */
	public static function get_border_color() {

		return get_option( 'conversation-starter_border_color' );

	}

	/**
	 * This function returns the border type.
	 *
	 * @return array
	 */
	public static function get_border_type() {

		return get_option( 'conversation-starter_border_type' );

	}

	/**
	 * This function returns the border width.
	 *
	 * @return array
	 */
	public static function get_border_width() {

		return get_option( 'conversation-starter_border_width' );

	}

	/**
	 * This function returns the border radius.
	 *
	 * @return array
	 */
	public static function get_border_radius() {

		return get_option( 'conversation-starter_border_radius' );

	}

	/**
	 * This function returns the background color.
	 *
	 * @return array
	 */
	public static function get_background_color() {

		return get_option( 'conversation-starter_background_color' );

	}

	/**
	 * This function returns the font color.
	 *
	 * @return array
	 */
	public static function get_font_color() {

		return get_option( 'conversation-starter_font_color' );

	}

	/**
	 * This function returns the font weight.
	 *
	 * @return array
	 */
	public static function get_font_weight() {

		return get_option( 'conversation-starter_font_weight' );

	}

	/**
	 * This function returns the default prompt text.
	 *
	 * @return array
	 */
	public static function get_default_prompt_text() {

		return get_option( 'conversation-starter_default_prompt_text' );

	}

}
