<?php
/**
 * Config Class: I18n.
 *
 * Internationalization and localization definitions.
 *
 * @package SigmaDevs\KlaroConsent
 * @since   1.0.0
 */

declare( strict_types = 1 );

namespace SigmaDevs\KlaroConsent\Config;

use SigmaDevs\KlaroConsent\Common\
{
	Abstracts\Base,
	Traits\Singleton
};

/**
 * Class: I18n.
 *
 * @since 1.0.0
 */
final class I18n extends Base {

	/**
	 * Singleton trait.
	 *
	 * @see Singleton
	 * @since 1.0.0
	 */
	use Singleton;

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @docs https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/#loading-text-domain
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function load() {
		load_plugin_textdomain(
			$this->plugin->textDomain(),
			false,
			dirname( plugin_basename( KLARO_CONSENT_PLUGIN_ROOT_FILE ) ) . $this->plugin->data()['domain-path']
		);
	}
}
