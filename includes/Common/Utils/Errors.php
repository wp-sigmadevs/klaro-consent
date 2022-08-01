<?php
/**
 * Utility Class: Error
 *
 * Utility to show plugin errors.
 *
 * @package SigmaDevs\KlaroConsent
 * @since   1.0.0
 */

declare( strict_types = 1 );

namespace SigmaDevs\KlaroConsent\Common\Utils;

use SigmaDevs\KlaroConsent\Config\Plugin;

/**
 * Class: Errors.
 *
 * @since 1.0.0
 */
class Errors {

	/**
	 * Get the plugin data in static form
	 *
	 * @static
	 * @return array
	 * @since 1.0.0
	 */
	public static function getPluginData() {
		return Plugin::instance()->data();
	}

	/**
	 * Deactivates the plugin.
	 *
	 * @static
	 * @return void
	 * @since 1.0.0
	 */
	public static function pluginDie() {
		\add_action( 'admin_init', [ static::class, 'deactivate' ] );
	}

	/**
	 * De-activates the plugin and shows notice error in back-end.
	 *
	 * @static
	 * @param string $message The error message.
	 * @param string $title General title of the error.
	 * @param string $subtitle General subtitle of the error.
	 * @param string $source File source of the error.
	 * @return string
	 * @since 1.0.0
	 */
	public static function errorMessage( $message = '', $title = '', $subtitle = '', $source = '' ) {
		$error = '';

		if ( $message ) {
			$plugin   = self::getPluginData();
			$title    = $title ? esc_html( $title ) : $plugin['name'] . ' ' . $plugin['version'] . ' ' . esc_html__( '&rsaquo; Fatal Error', 'klaro-consent' );
			$subtitle = $subtitle ? esc_html( $subtitle ) : $plugin['name'] . ' ' . $plugin['version'] . ' ' . __( '&#10230; Plugin Disabled', 'klaro-consent' );
			$footer   = $source ? '<small>' .
				sprintf(
					/* translators: %s: file path */
					__( 'Error source: %s', 'klaro-consent' ),
					esc_html( $source )
				) . '</small>' : '';
			$error = '<h3>' . $title . '</h3><strong>' . $subtitle . '</strong><p>' . $message . '</p><hr><p>' . $footer . '</p>';
		}

		return $error;
	}

	/**
	 * Deactivate plugin.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public static function deactivate() {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
		\deactivate_plugins( \plugin_basename( KLARO_CONSENT_PLUGIN_ROOT_FILE ) );

		unset( $_GET['activate'] ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	}
}
