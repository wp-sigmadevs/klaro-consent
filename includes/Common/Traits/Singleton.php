<?php
/**
 * Trait: Singleton.
 * The singleton skeleton trait to instantiate the class only once.
 *
 * @package SigmaDevs\KlaroConsent
 * @since   1.0.0
 */

declare( strict_types = 1 );

namespace SigmaDevs\KlaroConsent\Common\Traits;

/**
 * Trait: Singleton.
 *
 * @since 1.0.0
 */
trait Singleton {
	/**
	 * Refers to a single instance of this class.
	 *
	 * @static
	 * @var null|object
	 * @since 1.0.0
	 */
	private static $instance;

	/**
	 * Prevent cloning of the instance.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function __clone() {}

	/**
	 * Prevent serialization of the instance.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function __sleep() {}

	/**
	 * Prevent deserialization of the instance.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function __wakeup() {}

	/**
	 * Access the single instance of this class.
	 *
	 * @static
	 * @return Singleton
	 * @since 1.0.0
	 */
	final public static function instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}
