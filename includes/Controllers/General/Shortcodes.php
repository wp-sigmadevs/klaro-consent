<?php
/**
 * General Class: Shortcodes.
 *
 * This class initializes all the defined Shortcodes.
 *
 * @package SigmaDevs\KlaroConsent
 * @since   1.0.0
 */

namespace SigmaDevs\KlaroConsent\Controllers\General;

use SigmaDevs\KlaroConsent\Controllers\General\Shortcodes\ExampleShortcode;
use SigmaDevs\KlaroConsent\Common\
{
	Abstracts\Base,
	Traits\Singleton
};

/**
 * General Class: Shortcodes.
 *
 * @since 1.0.0
 */
class Shortcodes extends Base {

	/**
	 * Singleton Trait.
	 *
	 * @see Singleton
	 * @since 1.0.0
	 */
	use Singleton;

	/**
	 * Registers the class.
	 *
	 * This general class is always being instantiated as requested in the
	 * Bootstrap class
	 *
	 * @see Bootstrap::registerServices
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function register() {
		add_action( 'init', [ $this, 'registerShortcodes' ] );
	}

	/**
	 * Accumulates all the shortcode classes inside an array
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function registerShortcodes() {
		return [
			ExampleShortcode::class,
		];
	}
}
