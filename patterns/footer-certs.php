<?php
/**
 * Title: Footer Certifications
 * Slug: maketime-finance/footer-certs
 * Categories: maketime-finance
 * Inserter: false
 * Description: Xero + QuickBooks certification badges as colored pills.
 *   PHP-resolved asset URIs so the paths follow wherever the theme is installed.
 */
?>
<!-- wp:group {"className":"mt-footer__cert","style":{"spacing":{"margin":{"top":"20px"}}}} -->
<div class="wp-block-group mt-footer__cert" style="margin-top:20px">
	<!-- wp:group {"className":"mt-footer__cert-item mt-footer__cert-item--xero","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group mt-footer__cert-item mt-footer__cert-item--xero">
		<!-- wp:image {"width":"24px","sizeSlug":"full"} -->
		<figure class="wp-block-image is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/xero-cert.svg' ) ); ?>" alt="Xero Advisor" style="width:24px"/></figure>
		<!-- /wp:image -->
		<!-- wp:paragraph --><p><strong>Certified Xero Advisor</strong></p><!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	<!-- wp:group {"className":"mt-footer__cert-item mt-footer__cert-item--quickbooks","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group mt-footer__cert-item mt-footer__cert-item--quickbooks">
		<!-- wp:image {"width":"24px","sizeSlug":"full"} -->
		<figure class="wp-block-image is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/quickbooks.png' ) ); ?>" alt="QuickBooks" style="width:24px"/></figure>
		<!-- /wp:image -->
		<!-- wp:paragraph --><p><strong>QuickBooks Online Certified</strong></p><!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
