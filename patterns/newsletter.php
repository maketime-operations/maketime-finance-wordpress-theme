<?php
/**
 * Title: Newsletter signup
 * Slug: maketime-finance/newsletter
 * Categories: maketime-finance
 * Description: Dark newsletter CTA with inline email form.
 */
?>
<!-- wp:group {"tagName":"section","className":"mt-section mt-section--tight","style":{"spacing":{"padding":{"top":"56px","bottom":"56px"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group mt-section mt-section--tight" style="padding-top:56px;padding-bottom:56px">
	<!-- wp:group {"className":"mt-newsletter"} -->
	<div class="wp-block-group mt-newsletter">
		<!-- wp:columns {"verticalAlignment":"center"} -->
		<div class="wp-block-columns are-vertically-aligned-center">
			<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
				<!-- wp:paragraph {"className":"mt-eyebrow","style":{"color":{"text":"#10b981"},"typography":{"fontSize":"13px","textTransform":"uppercase","fontWeight":"700","letterSpacing":"0.14em"}}} -->
				<p class="mt-eyebrow has-text-color" style="color:#10b981;font-size:13px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase">Newsletter</p>
				<!-- /wp:paragraph -->
				<!-- wp:heading {"level":2,"style":{"color":{"text":"#ffffff"}}} -->
				<h2 class="wp-block-heading has-text-color" style="color:#ffffff">Occasional, useful emails.</h2>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.82)"}}} -->
				<p class="has-text-color" style="color:rgba(255,255,255,0.82)">Migration guides, accounting tips, and the occasional Xero / QuickBooks update. No spam — unsubscribe any time.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center">
				<!-- wp:html -->
				<form onsubmit="event.preventDefault(); this.querySelector('button').textContent='Thanks ✓';">
					<input type="email" required placeholder="you@yourbusiness.com" aria-label="Email">
					<button type="submit" class="mt-btn mt-btn--primary">Subscribe</button>
				</form>
				<!-- /wp:html -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
