<?php
/**
 * Plugin Name: Conversation Starter
 * Plugin URI: https://www.pixeljar.com/wordpress-plugin-development/conversation-manager/
 * Description: This plugin prompts readers to answer a question in your comments.
 * Version: 1.4
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: Pixel Jar
 * Author URI: https://www.pixeljar.com
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: pj-convo
 * Domain Path: /languages

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

/**
 * Load translations.
 *
 * @return void
 */
function pj_convo_load_textdomain() {

	load_plugin_textdomain( 'pj-convo', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

}
add_action( 'init', '\PJ_Conversation_Starter\pj_convo_load_textdomain' );

require_once PJ_CONVO_LIB . 'class-helpers.php';
require_once PJ_CONVO_LIB . 'class-admin.php';
require_once PJ_CONVO_LIB . 'class-meta-box.php';
require_once PJ_CONVO_LIB . 'class-frontend.php';
require_once PJ_CONVO_LIB . 'class-changelog.php';
