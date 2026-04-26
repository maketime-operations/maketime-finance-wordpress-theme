<?php
/**
 * Title: Hero — Make Time Finance
 * Slug: maketime-finance/hero
 * Categories: maketime-finance, featured
 * Description: Two-column hero with logo mark and pitch.
 */
?>
<!-- wp:group {"tagName":"section","className":"mt-hero","style":{"spacing":{"padding":{"top":"48px","bottom":"48px"}}},"backgroundColor":"background-alt","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group mt-hero has-background-alt-background-color has-background" style="padding-top:48px;padding-bottom:48px">
	<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"56px"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"260px","className":"mt-hero__mark"} -->
		<div class="wp-block-column is-vertically-aligned-center mt-hero__mark" style="flex-basis:260px">
			<!-- wp:image {"width":"220px","sizeSlug":"full","align":"center"} -->
			<figure class="wp-block-image aligncenter is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/logo.svg' ) ); ?>" alt="Make Time Finance" style="width:220px"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","className":"mt-hero__body"} -->
		<div class="wp-block-column is-vertically-aligned-center mt-hero__body">
			<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"30px","lineHeight":"1.25"}}} -->
			<h1 class="wp-block-heading" style="font-size:30px;line-height:1.25">We specialise in untangling your financial data, so you can trust it and use it to make business decisions.</h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"mt-hero__lede","style":{"typography":{"fontSize":"20px","lineHeight":"1.45"}},"textColor":"ink"} -->
			<p class="mt-hero__lede has-ink-color has-text-color" style="font-size:20px;line-height:1.45">Make Time's caring approach makes migrating to new online accounts software easy. We're Xero and QuickBooks Advisors.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"className":"mt-hero__cta","style":{"spacing":{"margin":{"top":"22px"},"blockGap":"14px"}}} -->
			<div class="wp-block-buttons mt-hero__cta" style="margin-top:22px">
				<!-- wp:button {"className":"mt-btn mt-btn--primary"} -->
				<div class="wp-block-button mt-btn mt-btn--primary"><a class="wp-block-button__link wp-element-button" href="/contact/">Get In Touch Today</a></div>
				<!-- /wp:button -->
				<!-- wp:button {"className":"mt-btn mt-btn--ghost","backgroundColor":"background-alt","textColor":"ink","style":{"border":{"width":"1.5px","color":"#8d6e63"}}} -->
				<div class="wp-block-button mt-btn mt-btn--ghost"><a class="wp-block-button__link has-ink-color has-background-alt-background-color has-text-color has-background has-border-color wp-element-button" href="/services/" style="border-color:#8d6e63;border-width:1.5px">See how we help →</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
