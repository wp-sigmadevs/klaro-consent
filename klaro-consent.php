<?php
/**
 * Plugin Name: Klaro Consent Manager
 * Plugin URI: https://github.com/wp-sigmadevs/klaro-consent
 * Description: Klaro! A Simple Consent Manager.
 * Version: 1.0.0
 * Author: SigmaDevs
 * Author URI: https://github.com/wp-sigmadevs
 * License: GPLv2 or later
 * Text Domain: klaro-consent
 * Domain Path: /languages
 * Namespace: SigmaDevs\KlaroConsent
 *
 * @package SigmaDevs\KlaroConsent
 * @since   1.0.0
 */

/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

declare( strict_types = 1 );

// If this file is called directly, abort!!!
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define the default root file of the plugin.
 *
 * @since 1.0.0
 */
define( 'KLARO_CONSENT_PLUGIN_ROOT_FILE', __FILE__ );

/**
 * Load PSR4 autoloader.
 *
 * @since 1.0.0
 */
$klaro_consent_autoloader = require plugin_dir_path( KLARO_CONSENT_PLUGIN_ROOT_FILE ) . 'vendor/autoload.php';

/**
 * Setup hooks (activation, deactivation, uninstall)
 *
 * @since 1.0.0
 */
register_activation_hook( __FILE__, [ 'SigmaDevs\KlaroConsent\Config\Setup', 'activation' ] );
register_deactivation_hook( __FILE__, [ 'SigmaDevs\KlaroConsent\Config\Setup', 'deactivation' ] );
register_uninstall_hook( __FILE__, [ 'SigmaDevs\KlaroConsent\Config\Setup', 'uninstall' ] );

/**
 * Bootstrap the plugin.
 *
 * @param object $klaro_consent_autoloader Autoloader Object.
 *
 * @since 1.0.0
 */
if ( ! class_exists( 'SigmaDevs\KlaroConsent\\Bootstrap' ) ) {
	wp_die( esc_html__( 'Klaro Consent Manager is unable to find the Bootstrap class.', 'klaro-consent' ) );
}

add_action(
	'plugins_loaded',
	static function () use ( $klaro_consent_autoloader ) {
		$app = \SigmaDevs\KlaroConsent\Bootstrap::instance();
		$app->registerServices( $klaro_consent_autoloader );
	}
);

/**
 * Create a main function for external uses.
 *
 * @return \SigmaDevs\KlaroConsent\Common\Functions\Functions
 * @since 1.0.0
 */
function sd_klaro_consent() {
	return new \SigmaDevs\KlaroConsent\Common\Functions\Functions();
}
