<?php
/*
 *  Plugin Name:    Chat for Skype
 *  Plugin URI:     https://wpchatplugins.com/
 *  Description:    Can easily create Bubble & buttons for chat skype in any WordPress site. Elementor and shortcodes supported.
 *  Author:         ThemeAtelier
 *  Author URI:     http://themeatelier.net/
 *  Requirements:   PHP 5.2.4 or above, WordPress 3.3 or above.
 *  Version:        1.1.0
 *  License:        GPLv2 or later
*   License URI:    http://www.gnu.org/licenses/gpl-2.0.html
 *  Text Domain:    chat-skype
 *  Domain Path:    /languages
 */

// Block Direct access
if (!defined('ABSPATH')) {
	die('You should not access this file directly!.');
}

// Define Constants for direct access alert message.
if (!defined('SCS_ALERT_MSG')) {
	define('SCS_ALERT_MSG', esc_html__('You should not access this file directly.!', 'chat-skype'));
}

// Define constants for plugin directory path.
if (!defined('SCS_DIR_PATH')) {
	define('SCS_DIR_PATH', plugin_dir_path(__FILE__));
}

// Define constants for view directory path.
if (!defined('SCS_VIEW_DIR_PATH')) {
	define('SCS_VIEW_DIR_PATH', SCS_DIR_PATH . 'view/');
}


// Define constants for plugin directory path.
if (!defined('SCS_DIR_URL')) {
	define('SCS_DIR_URL', plugin_dir_url(__FILE__));
}

// load text domain from plugin folder
function scs_load_textdomain()
{
	load_plugin_textdomain('', false, __DIR__ . '/languages');
}
add_action('plugins_loaded', 'scs_load_textdomain');

// Plugin settings in plugin list
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'scs_settings_link');
function scs_settings_link(array $links)
{
	$url           = get_admin_url() . 'admin.php?page=scs';
	$settings_link = '<a href="' . esc_url($url) . '">' . esc_html__('Settings', 'chat-skype') . '</a>';
	$links[]       = $settings_link;
	return $links;
}

// Script enqueue class include
require_once SCS_DIR_PATH . 'inc/class-enqueue.php';

// View Shortcodes
require_once SCS_DIR_PATH . '/view/elementor-widgets/elementor-widget.php';
require_once SCS_DIR_PATH . 'view/shortcodes/custom-shortcode.php';

// buttons functions
require_once SCS_DIR_PATH . 'inc/functions.php';
// Button template class
require_once SCS_DIR_PATH . 'inc/class-custom-buttons-templates.php';

// single chat bubble template
require_once SCS_DIR_PATH . '/view/chat-bubbles/chat-bubbles.php';

// include framework for admin panel
require_once SCS_DIR_PATH . 'admin/ta-framework/codestar-framework.php';
require_once SCS_DIR_PATH . 'inc/scs-plugin-options.php';



function skype_chat_cyber_week_sale_notice()
{
?>
	<div class="notice notice-success is-dismissible" style="display:flex;align-items:center;gap:20px;justify-content:space-between">
		<!-- <h3>Upgrade to the premium version of the WhatsApp plugin</h3> -->
		<a href="https://1.envato.market/ta-plugins" target="_blank"><img src="https://i.ibb.co/tMQ5R34/envato-onsale.webp" alt="ThemeAtelier Items On Sale at Envato">
		</a>
		<div>
			<a href="https://1.envato.market/skype" target="_blank" style="color:#fff;text-transform: uppercase; letter-spacing: 1px; display: inline-block; background: #05AAF1; text-decoration: none; padding: 12px 22px; margin-top: 10px; margin-bottom: 10px;text-align:center">Upgrade Skype chat support</a>
		</div>
	</div>

<?php
}
add_action('admin_notices', 'skype_chat_cyber_week_sale_notice');
