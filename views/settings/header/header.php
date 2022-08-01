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
	<h1>Klaro Consent Manager</h1>
	<div class="logo-container">
		<img src="<?php echo esc_url( sd_klaro_consent()->getData()['plugin_uri'] ); ?>/assets/images/merryll-logo.png" alt="merryll">
	</div>
</div>
