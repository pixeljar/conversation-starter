<?php
/**
 * Frontend CSS
 *
 * @package PJ_Conversation_Starter
 */

$padding          = \PJ_Conversation_Starter\Helpers::get_padding();
$margin           = \PJ_Conversation_Starter\Helpers::get_margin();
$show_border      = \PJ_Conversation_Starter\Helpers::show_border();
$border_color     = \PJ_Conversation_Starter\Helpers::get_border_color();
$border_type      = \PJ_Conversation_Starter\Helpers::get_border_type();
$border_width     = \PJ_Conversation_Starter\Helpers::get_border_width();
$border_radius    = \PJ_Conversation_Starter\Helpers::get_border_radius();
$background_color = \PJ_Conversation_Starter\Helpers::get_background_color();
$font_color       = \PJ_Conversation_Starter\Helpers::get_font_color();
$font_weight      = \PJ_Conversation_Starter\Helpers::get_font_weight();
?>
#pj-convo-comment-prompt{<?php

	// Padding.
	printf(
		'padding:%dpx %dpx %dpx %dpx;',
		intval( $padding['top'] ),
		intval( $padding['right'] ),
		intval( $padding['bottom'] ),
		intval( $padding['left'] )
	);

	// Margin.
	printf(
		'margin:%dpx %dpx %dpx %dpx;',
		intval( $margin['top'] ),
		intval( $margin['right'] ),
		intval( $margin['bottom'] ),
		intval( $margin['left'] )
	);

	// Border.
	if ( $show_border ) {

		printf(
			'border:%dpx %s %s;',
			intval( $border_width ),
			$border_type, // phpcs:ignore
			$border_color // phpcs:ignore
		);

		printf(
			'border-radius:%dpx;',
			intval( $border_radius )
		);

	}

	// Background color.
	printf(
		'background-color:%s;',
		$background_color // phpcs:ignore
	);

	// Font color.
	printf(
		'color:%s;',
		$font_color // phpcs:ignore
	);

	// Font weight.
	printf(
		'font-weight:%s;',
		$font_weight // phpcs:ignore
	);

?>}
