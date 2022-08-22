<?php
/**
 * Admin View: Header
 *
 * Admin header template.
 *
 * @package SigmaDevs\KlaroConsent
 * @since   1.0.0
 */

?>

<div class="header-banner">
	<div class="logo-container sigma-d-flex sigma-align-center">
		<img src="<?php echo esc_url( sd_klaro_consent()->getData()['plugin_uri'] ); ?>/assets/images/sigma-klaro-logo.svg" alt="Sigma-Klaro-Consent-Manager">
		<h1><?php esc_html_e( 'Klaro Consent Manager', 'klaro-consent' ); ?></h1>
	</div>
	<div class="navbar-container">
		<nav id="header-nav">
			<ul>
				<li><?php esc_html_e( 'Dashboard', 'klaro-consent' ); ?></li>
			</ul>
		</nav>
	</div>
</div>
