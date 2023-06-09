<?php
/**
 * Factory Feedback
 *
 * @author        Artem Prihodko <webtemyk@yandex.ru>
 * @author        Alexander Kovalev <alex.kovalevv@gmail.com>, Github: https://github.com/alexkovalevv
 * @since         1.0.0
 *
 * @package       factory-feedback
 * @copyright (c) 2019, Webcraftic Ltd
 *
 * @version       1.0.0
 */

// Exit if accessed directly
if( !defined('ABSPATH') ) {
	exit;
}

if( defined('FACTORY_FEEDBACK_104_LOADED') || (defined('FACTORY_FEEDBACK_BLOCK') && FACTORY_FEEDBACK_BLOCK) ) {
	return;
}

# Устанавливаем константу, что модуль уже загружен
define('FACTORY_FEEDBACK_104_LOADED', true);

# Устанавливаем версию модуля
define('FACTORY_FEEDBACK_104_VERSION', '1.0.4');

# Регистрируем текстовый домен, для интернализации интерфейса модуля
load_plugin_textdomain('wbcr_factory_feedback_104', false, dirname(plugin_basename(__FILE__)) . '/langs');

# Устанавливаем директорию модуля
define('FACTORY_FEEDBACK_104_DIR', dirname(__FILE__));

# Устанавливаем url модуля
define('FACTORY_FEEDBACK_104_URL', plugins_url(null, __FILE__));

require_once(FACTORY_FEEDBACK_104_DIR . '/includes/class-base.php');
require_once(FACTORY_FEEDBACK_104_DIR . '/includes/class-rest-request.php');

/**
 * @param Wbcr_Factory429_Plugin $plugin
 */
add_action('wbcr_factory_feedback_104_plugin_created', function ($plugin) {
	new WBCR\Factory_Feedback_104\Base($plugin);
});
