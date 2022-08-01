<?php
/**
 * Frontend Class: Enqueue
 *
 * This class enqueues required styles & scripts in the frontend pages.
 *
 * @package SigmaDevs\KlaroConsent
 * @since   1.0.0
 */

declare( strict_types = 1 );

namespace SigmaDevs\KlaroConsent\Controllers\Frontend;

use SigmaDevs\KlaroConsent\Common\
{
	Traits\Singleton,
	Abstracts\Enqueue as EnqueueBase
};

/**
 * Class: Enqueue
 *
 * @package ThePluginName\App\Backend
 * @since 1.0.0
 */
class Enqueue extends EnqueueBase {

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
	 * This frontend class is only being instantiated in the frontend
	 * as requested in the Bootstrap class.
	 *
	 * @see Requester::isFrontend()
	 * @see Bootstrap::registerServices
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function register() {
		$this->assets();

		if ( empty( $this->assets() ) ) {
			return;
		}

		\add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
	}

	/**
	 * Method to accumulate styles list.
	 *
	 * @return Enqueue
	 * @since 1.0.0
	 */
	protected function getStyles() {
		$styles = [];

		$styles[] = [
			'handle'    => 'klaro-consent-frontend-styles',
			'asset_uri' => $this->plugin->assetsUri() . '/css/frontend' . $this->plugin->suffix . '.css',
			'version'   => $this->plugin->version(),
		];

		$this->enqueues['style'] = \apply_filters( 'klaro_consent_registered_frontend_styles', $styles, 10, 1 );

		return $this;
	}

	/**
	 * Method to accumulate scripts list.
	 *
	 * @return Enqueue
	 * @since 1.0.0
	 */
	protected function getScripts() {
		$scripts = [];

		$scripts[] = [
			'handle'     => 'klaro-consent-frontend-script',
			'asset_uri'  => $this->plugin->assetsUri() . '/js/frontend' . $this->plugin->suffix . '.js',
			'dependency' => [ 'jquery' ],
			'in_footer'  => true,
			'version'    => $this->plugin->version(),
		];

		$this->enqueues['script'] = \apply_filters( 'klaro_consent_registered_frontend_scripts', $scripts, 10, 1 );

		return $this;
	}

	/**
	 * Method to enqueue scripts.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function enqueue() {
		$this
			->registerScripts()
			->enqueueScripts()
			->localize( $this->localizeData() );
	}

	/**
	 * Localized data.
	 *
	 * @return array
	 * @since 1.0.0
	 */
	private function localizeData() {

		// Send variables to JS.
		global $wp_query;

		return [
			'handle' => 'klaro-consent-frontend-script',
			'object' => 'klaro_consent_frontend_object',
			'data'   => [
				'ajaxUrl'     => esc_url( admin_url( 'admin-ajax.php' ) ),
				'wpQueryVars' => $wp_query->query_vars,
			],
		];
	}
}
