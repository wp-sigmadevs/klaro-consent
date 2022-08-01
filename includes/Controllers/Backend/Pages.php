<?php
/**
 * Backend Class: Pages
 *
 * This class creates the necessary admin pages.
 *
 * @package SigmaDevs\KlaroConsent
 * @since   1.0.0
 */

declare( strict_types = 1 );

namespace SigmaDevs\KlaroConsent\Controllers\Backend;

use SigmaDevs\KlaroConsent\Common\Models\Settings;
use SigmaDevs\KlaroConsent\Common\Functions\Callbacks;

use SigmaDevs\KlaroConsent\Common\
{
	Abstracts\Base,
	Traits\Singleton
};

/**
 * Backend Class: Pages
 *
 * @since 1.0.0
 */
class Pages extends Base {

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
	 * This backend class is only being instantiated in the backend
	 * as requested in the Bootstrap class.
	 *
	 * @see Requester::isAdminBackend()
	 * @see Bootstrap::registerServices
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function register() {
		new Settings(
			$this->setPages(),
			$this->setSubPages(),
			[
				'settings' => $this->setSettings(),
				'sections' => $this->setSections(),
				'fields'   => [],
			]
		);
	}

	/**
	 * Method to accumulate admin pages list.
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function setPages() {
		return [
			[
				'page_title'     => __( 'Klaro Consent Manager', 'klaro-consent' ),
				'menu_title'     => __( 'Klaro Consent', 'klaro-consent' ),
				'capability'     => 'manage_options',
				'menu_slug'      => 'klaro_consent',
				'callback'       => [ Callbacks::class, 'adminDashboard' ],
				'icon_url'       => 'dashicons-admin-settings',
				'position'       => 110,
				'top_menu_title' => __( 'Dashboard', 'klaro-consent' ),
			],
		];
	}

	/**
	 * Method to accumulate admin pages list.
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function setSubPages() {
		return [
			[
				'parent_slug' => 'klaro_consent',
				'page_title'  => __( 'Settings', 'klaro-consent' ),
				'menu_title'  => __( 'Settings', 'klaro-consent' ),
				'capability'  => 'manage_options',
				'menu_slug'   => 'klaro_consent_settings',
				'callback'    => [ Callbacks::class, 'subPage' ],
			],
			[
				'parent_slug' => 'klaro_consent',
				'page_title'  => __( 'Customize', 'klaro-consent' ),
				'menu_title'  => __( 'Customize', 'klaro-consent' ),
				'capability'  => 'manage_options',
				'menu_slug'   => 'klaro_consent_customize',
				'callback'    => [ Callbacks::class, 'subPage2' ],
			],
			[
				'parent_slug' => 'klaro_consent',
				'page_title'  => __( 'Cookie Groups', 'klaro-consent' ),
				'menu_title'  => __( 'Cookie Groups', 'klaro-consent' ),
				'capability'  => 'manage_options',
				'menu_slug'   => 'klaro_consent_cookie_groups',
				'callback'    => [ Callbacks::class, 'subPage2' ],
			],
			[
				'parent_slug' => 'klaro_consent',
				'page_title'  => __( 'Cookies', 'klaro-consent' ),
				'menu_title'  => __( 'Cookies', 'klaro-consent' ),
				'capability'  => 'manage_options',
				'menu_slug'   => 'klaro_consent_cookies',
				'callback'    => [ Callbacks::class, 'subPage2' ],
			],
		];
	}

	/**
	 * Method to accumulate settings list.
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function setSettings() {
		return [
			[
				'option_group' => 'klaro_consent_settings',
				'option_name'  => 'klaro_consent',
				'callback'     => '',
			],
		];
	}

	/**
	 * Method to accumulate sections list
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function setSections() {
		return [
			[
				'id'       => 'klaro_consent_admin_index',
				'title'    => __( 'Settings Manager', 'klaro-consent' ),
				'callback' => [ Callbacks::class, 'adminSectionManager' ],
				'page'     => 'klaro_consent',
			],
		];
	}
}
