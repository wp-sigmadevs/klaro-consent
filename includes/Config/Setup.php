<?php
/**
 * Config Class: Setup.
 *
 * Plugin setup hooks (activation, deactivation, uninstall)
 *
 * @package SigmaDevs\KlaroConsent
 * @since   1.0.0
 */

declare( strict_types = 1 );

namespace SigmaDevs\KlaroConsent\Config;

/**
 * Class: Setup.
 *
 * @since 1.0.0
 */
class Setup {
	/**
	 * Run only once after plugin is activated.
	 *
	 * @static
	 * @return void
	 * @since 1.0.0
	 */
	public static function activation() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		// Clear the permalinks.
		\flush_rewrite_rules();
	}

	/**
	 * Run only once after plugin is deactivated.
	 *
	 * @static
	 * @return void
	 * @since 1.0.0
	 */
	public static function deactivation() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		// Clear the permalinks.
		\flush_rewrite_rules();
	}

	/**
	 * Run only once after plugin is uninstalled.
	 *
	 * @static
	 * @return void
	 * @since 1.0.0
	 */
	public static function uninstall() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}
	}
}
