<?php
/**
 * Title: Footer Socials
 * Slug: maketime-finance/footer-socials
 * Categories: maketime-finance
 * Inserter: false
 * Description: LinkedIn, Facebook and RSS feed icons. PHP-resolved
 *   feed URL so it works in any environment (local dev / production).
 */
?>
<!-- wp:social-links {"iconColor":"background","iconColorValue":"#f5f0e8","className":"is-style-logos-only"} -->
<ul class="wp-block-social-links has-icon-color is-style-logos-only">
	<!-- wp:social-link {"url":"https://www.linkedin.com/company/make-time-finance","service":"linkedin"} /-->
	<!-- wp:social-link {"url":"https://www.facebook.com/MakeTime.ie","service":"facebook"} /-->
	<!-- wp:social-link {"url":"<?php echo esc_url( home_url( '/feed/' ) ); ?>","service":"feed"} /-->
</ul>
<!-- /wp:social-links -->
