<?php
/**
 * General Class: ExampleShortcode.
 *
 * This class adds an example shortcode in the frontend.
 *
 * @package SigmaDevs\KlaroConsent
 * @since   1.0.0
 */

namespace SigmaDevs\KlaroConsent\Controllers\General\Shortcodes;

use SigmaDevs\KlaroConsent\Common\
{
	Abstracts\Base,
	Traits\Singleton
};

/**
 * General Class: ExampleShortcode.
 *
 * @since 1.0.0
 */
class ExampleShortcode extends Base {

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
		add_shortcode( 'klaro_consent_shortcode', [ $this, 'shortcode' ] );
	}

	/**
	 * Method to render the shortcodes.
	 *
	 * @param array $atts shortcode attributes.
	 *
	 * @return void|string
	 * @since  1.0.0
	 */
	public function shortcode( $atts ) {
		$atts   = shortcode_atts(
			[],
			$atts
		);
		$result = '';

		ob_start();
		?>

		<div>
			<p>My Awesome Shortcode :)</p>
		</div>

		<?php
		$result .= ob_get_clean();

		return $result;
	}
}
