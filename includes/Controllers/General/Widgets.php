<?php
/**
 * Controller Class: Widgets.
 *
 * Registers all the widgets.
 *
 * @package SigmaDevs\KlaroConsent
 * @since   1.0.0
 */

declare( strict_types = 1 );

namespace SigmaDevs\KlaroConsent\Controllers\General;

use SigmaDevs\KlaroConsent\Integrations\Widgets as Integrations;
use SigmaDevs\KlaroConsent\Common\
{
	Abstracts\Base,
	Traits\Singleton
};

/**
 * Class: Widgets
 *
 * @since 1.0.0
 */
class Widgets extends Base {

	/**
	 * Singleton trait.
	 *
	 * @see Singleton
	 * @since 1.0.0
	 */
	use Singleton;

	/**
	 * Registers the class.
	 *
	 * @since 1.0.0
	 */
	public function register() {
		/**
		 * This general class is always being instantiated as
		 * requested in the Bootstrap class
		 *
		 * @see Bootstrap::registerServices
		 *
		 * Widget is registered from the Integrations folder, but it can
		 * also be registered from the integration class file itself.
		 *
		 * @see MediaWidget::register()
		 */
		\add_action( 'widgets_init', [ $this, 'widgets' ] );
	}

	/**
	 * Widgets list.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function widgets() {
		$widgets = [
			Integrations\MediaWidget::class,
		];

		foreach ( $widgets as $widget ) {
			\register_widget( $widget );
		}
	}
}
