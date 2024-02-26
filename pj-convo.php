<?php
/**
 * Plugin Name: Conversation Starter
 * Plugin URI: https://www.pixeljar.com/wordpress-plugin-development/conversation-manager/
 * Description: This plugin prompts readers to answer a question in your comments.
 * Author: brandondove, jeffreyzinn, STDestiny, vegasgeek, drewstrojny
 * Version: 1.4
 * Author URI: https://www.pixeljar.com
 * Text Domain: pj-convo

 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @package PJ_Conversation_Starter
 */

namespace PJ_Conversation_Starter;

define( 'PJ_CONVO_URL', plugin_dir_url( __FILE__ ) ); // Includes ending slash.
define( 'PJ_CONVO_PATH', plugin_dir_path( __FILE__ ) ); // Includes ending slash.
define( 'PJ_CONVO_ASSETS', PJ_CONVO_URL . 'assets/' );
define( 'PJ_CONVO_LIB', PJ_CONVO_PATH . 'lib/' );
define( 'PJ_CONVO_VERSION', '1.4' );

require_once PJ_CONVO_LIB . 'class-changelog.php';
require_once PJ_CONVO_LIB . 'class-meta-box.php';
require_once PJ_CONVO_LIB . 'class-frontend.php';

add_action( 'activate_conversation-starter/pj-convo.php', [ &$convo_starter, 'activateMe' ] );


/**
 * FRONTEND CSS & JS files
 *
 * @param mixed $wp WordPress.
 */
function pj_convo_parse_request( $wp ) {

	// Only process requests with "my-plugin=ajax-handler".
	if (
		array_key_exists( 'conversation-starter', $wp->query_vars ) &&
		'frontend_css' === $wp->query_vars['conversation-starter']
	) {

		include PJ_CONVO_PATH . 'stylesheets/frontend.php';
		die();

	} elseif (
		array_key_exists( 'conversation-starter', $wp->query_vars ) &&
		'frontend_js' === $wp->query_vars['conversation-starter']
	) {

		include PJ_CONVO_PATH . 'javascripts/frontend.php';
		die();

	}

}
add_action( 'wp', 'pj_convo_parse_request' );

/**
 * Registers query variables.
 *
 * @param  array $vars The variables array.
 * @return array
 */
function pj_convo_query_vars( $vars = [] ) {

	$vars[] = 'conversation-starter';
	$vars[] = 'convo-id';
	return $vars;

}
add_filter( 'query_vars', 'pj_convo_query_vars' );

/**
 * ADMIN Page functionality
 */
require PJ_CONVO_PATH . 'PluginCore/extend.php';
