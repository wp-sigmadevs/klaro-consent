<?php
/**
 * Config Class: Classes.
 *
 * This array of classes is being used in the Bootstrap file
 * to instantiate the classes.
 *
 * @package SigmaDevs\KlaroConsent
 * @since   1.0.0
 */

declare( strict_types = 1 );

namespace SigmaDevs\KlaroConsent\Config;

/**
 * Class: Classes.
 *
 * @since 1.0.0
 */
final class Classes {
	/**
	 * Init the classes inside these folders based on type of request.

	 * @return array
	 * @since 1.0.0
	 */
	public static function register() {
		// phpcs:disable
		// Ignore for readable array values on a single line.
		return [
			[ 'register' => 'Integrations' ],
			[ 'register' => 'Controllers\\General' ],
			[ 'register' => 'Controllers\\Frontend', 'on_request' => 'frontend' ],
			[ 'register' => 'Controllers\\Backend', 'on_request' => 'backend' ],
		];
		// phpcs:enable
	}
}
