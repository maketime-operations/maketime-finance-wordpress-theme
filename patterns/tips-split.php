<?php
/**
 * Title: Tips split
 * Slug: maketime-finance/tips-split
 * Categories: maketime-finance
 * Description: Lightbulb illustration + tips pitch, two-column.
 */
?>
<!-- wp:group {"tagName":"section","className":"mt-section","style":{"spacing":{"padding":{"top":"88px","bottom":"88px"}}},"layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group mt-section" style="padding-top:88px;padding-bottom:88px">
	<!-- wp:columns {"verticalAlignment":"center","className":"mt-split","style":{"spacing":{"blockGap":{"left":"56px"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center mt-split">

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"align":"center","width":"260px","sizeSlug":"full"} -->
			<figure class="wp-block-image aligncenter is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/lightbulb.png' ) ); ?>" alt="" style="width:260px"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:paragraph {"className":"mt-eyebrow","textColor":"accent","style":{"typography":{"fontSize":"13px","textTransform":"uppercase","fontWeight":"700","letterSpacing":"0.14em"}}} -->
			<p class="mt-eyebrow has-accent-color has-text-color" style="font-size:13px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase">Tips</p>
			<!-- /wp:paragraph -->
			<!-- wp:heading {"level":2} --><h2 class="wp-block-heading">Helpful advice for your migration.</h2><!-- /wp:heading -->
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
			<p style="font-size:18px;max-width:540px">We regularly share practical tips and insights to help make your migration to a new online accounting package smoother. Visit our tips section for guidance on preparing your data, choosing the right time to migrate, and getting the most from your new system.</p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"mt-btn mt-btn--ghost","backgroundColor":"background","textColor":"ink","style":{"border":{"width":"1.5px","color":"#8d6e63"}}} -->
				<div class="wp-block-button mt-btn mt-btn--ghost"><a class="wp-block-button__link has-ink-color has-background-background-color has-text-color has-background has-border-color wp-element-button" href="/tips/" style="border-color:#8d6e63;border-width:1.5px">Read the Tips →</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
