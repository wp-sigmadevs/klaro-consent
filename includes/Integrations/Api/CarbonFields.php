<?php
/**
 * General Class: Carbon Fields.
 *
 * This class initializes Carbon Fields.
 *
 * @package SigmaDevs\KlaroConsent
 * @since   1.0.0
 */

namespace SigmaDevs\KlaroConsent\Integrations\Api;

use Carbon_Fields\{
	Field,
	Container,
	Carbon_Fields
};
use SigmaDevs\KlaroConsent\Common\
{
	Abstracts\Base,
	Traits\Singleton
};

/**
 * General Class: Carbon Fields.
 *
 * @since 1.0.0
 */
class CarbonFields extends Base {

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
		if ( ! class_exists( '\Carbon_Fields\Carbon_Fields' ) ) {
			return;
		}

		// Booting up Carbon Fields.
		\add_action( 'after_setup_theme', [ $this, 'boot' ] );

		// Creating pages with Carbon Fields.
		\add_action( 'carbon_fields_register_fields', [ $this, 'createPages' ] );

		// Removing extra menus created by CF.
		\add_action( 'admin_menu', [ $this, 'removeExtraMenus' ], 999 );
	}

	/**
	 * Method to boot Carbon Fields.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function boot() {
		Carbon_Fields::boot();
	}

	/**
	 * Creating Carbon Fields Pages.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function createPages() {
		$page = Container::make(
			'theme_options',
			__( 'Settings', 'klaro-consent' )
		);

		$page
			->set_page_parent( 'klaro_consent' )
			->set_page_file( 'klaro_consent_settings' )
			->set_classes( 'cf-admin-page' )
			->add_fields( $this->customFields() );
	}

	/**
	 * Creating Custom Fields with Carbon Fields.
	 *
	 * These settings needs to accessible in both frontend and backend.
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function customFields() {
		$fields = [];

		$fields[] = Field::make(
			'separator',
			'klaro_consent_cf_posts',
			esc_html__( 'Add Posts', 'klaro-consent' )
		);

		$fields[] = Field::make(
			'complex',
			'klaro_consent_cf_post_list',
			''
		)
			->set_collapsed( true )
			->setup_labels(
				[
					'plural_name'   => esc_html__( 'New', 'klaro-consent' ),
					'singular_name' => esc_html__( 'New', 'klaro-consent' ),
				]
			)
			->add_fields(
				[
					Field::make(
						'text',
						'klaro_consent_cf_post_title',
						esc_html__( 'Post Title', 'klaro-consent' )
					)
					->set_help_text( esc_html__( 'Please enter the post title.', 'klaro-consent' ) ),

					Field::make(
						'rich_text',
						'klaro_consent_cf_post_content',
						esc_html__( 'Post Content', 'klaro-consent' )
					)
					->set_help_text( esc_html__( 'Please enter the post content.', 'klaro-consent' ) ),
				]
			)
			->set_header_template(
				'
				<% if (klaro_consent_cf_post_title) { %>
					Post Title: <%- klaro_consent_cf_post_title %>
				<% } %>
			'
			);

		return $fields;
	}

	/**
	 * Removing Extra Menus
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function removeExtraMenus() {
		global $submenu;

		unset( $submenu['klaro_consent'][5] );
		unset( $submenu['klaro_consent'][6] );
	}
}
