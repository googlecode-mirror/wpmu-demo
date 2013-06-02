<?php
/*
Plugin Name: Unoslider
Plugin URI: http://unoslider.com?ref=wp_plugins
Description: UnoSlider is an advanced image and content slider which is built with responsive design and mobile devices in mind.
Version: 1.0
Author: Unodor
Author URI: http://codecanyon.net/user/unodor?ref=unodor
*/

$symlink_hack = __FILE__;
if ( isset( $mu_plugin ) ) {
	$symlink_hack = $mu_plugin;
}
if ( isset( $network_plugin ) ) {
	$symlink_hack = $network_plugin;
}
if ( isset( $plugin ) ) {
	$symlink_hack = $plugin;
}
//define('UNOSLIDER_PATH', plugin_dir_url($symlink_hack));
define('UNOSLIDER_PATH', get_template_directory_uri() . '/sliders/unoslider/');
define('UNOSLIDER_BASE', dirname(__FILE__));
define('UNOSLIDER_NAME', 'UnoSlider');
define('UNOSLIDER_VERSION', '1.0');
if(isset($wp_version)) define('WP_VERSION', $wp_version);
define('UNOSLIDER_ENV', 'production');

require_once 'application/bootstrap.php';

$app = new Unoslider;

register_activation_hook($symlink_hack, array('Unoslider', 'activate'));
register_deactivation_hook($symlink_hack, array('Unoslider', 'deactivate'));
register_uninstall_hook($symlink_hack, array('Unoslider', 'uninstall'));

$app->run();