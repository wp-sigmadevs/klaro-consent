<?php
/**
 * General Class: Hooks.
 *
 * This class initializes all the Action & Filter Hooks.
 *
 * @package SigmaDevs\KlaroConsent
 * @since   1.0.0
 */

namespace SigmaDevs\KlaroConsent\Controllers\General;

use SigmaDevs\KlaroConsent\Common\
{
	Abstracts\Base,
	Traits\Singleton
};

use SigmaDevs\KlaroConsent\Common\Functions\
{
	Actions,
	Filters
};

/**
 * General Class: Actions Hooks.
 *
 * @since 1.0.0
 */
class Hooks extends Base {

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
		$this
			->actions()
			->filters();
	}

	/**
	 * List of action hooks
	 *
	 * @return Hooks
	 */
	public function actions() {
		// \add_action( 'init', [ Actions::class, 'testAction' ] );

		return $this;
	}

	/**
	 * List of filter hooks
	 *
	 * @return Hooks
	 */
	public function filters() {
		// \add_filter( 'klaro_consent_settings_page_header', [ Filters::class, 'testFilter' ], 99 );

		return $this;
	}
}
