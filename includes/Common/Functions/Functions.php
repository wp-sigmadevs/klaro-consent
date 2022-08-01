<?php
/**
 * Functions Class: Functions
 *
 * Main function class for external uses
 *
 * @package SigmaDevs\KlaroConsent
 * @since   1.0.0
 */

declare( strict_types = 1 );

namespace SigmaDevs\KlaroConsent\Common\Functions;

use SigmaDevs\KlaroConsent\Common\Abstracts\Base;
use SigmaDevs\KlaroConsent\Common\Models\Templates;

/**
 * Functions Class: Functions
 *
 * @since 1.0.0
 */
class Functions extends Base {

	/**
	 * Get plugin data by using sd_klaro_consent()->getData()
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function getData() {
		return $this->plugin->data();
	}

	/**
	 * Get plugin data by using sd_klaro_consent()->templatesPath()
	 *
	 * @return string
	 * @since 1.0.0
	 */
	public function templatesPath() {
		return $this->plugin->templatePath();
	}

	/**
	 * Get the template class using sd_klaro_consent()->templates()
	 *
	 * @return Templates
	 * @since 1.0.0
	 */
	public function templates() {
		return new Templates();
	}
}
