<?php
/**
 * Title: Testimonial
 * Slug: maketime-finance/testimonial
 * Categories: maketime-finance
 * Description: Client success story with logo and blockquote.
 */
?>
<!-- wp:group {"tagName":"section","className":"mt-section mt-section--alt","style":{"spacing":{"padding":{"top":"88px","bottom":"88px"}}},"backgroundColor":"background-alt","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group mt-section mt-section--alt has-background-alt-background-color has-background" style="padding-top:88px;padding-bottom:88px">

	<!-- wp:group {"className":"mt-section__head","layout":{"type":"constrained","contentSize":"780px"}} -->
	<div class="wp-block-group mt-section__head">
		<!-- wp:paragraph {"align":"center","className":"mt-eyebrow","textColor":"accent","style":{"typography":{"fontSize":"13px","textTransform":"uppercase","fontWeight":"700","letterSpacing":"0.14em"}}} -->
		<p class="has-text-align-center mt-eyebrow has-accent-color has-text-color" style="font-size:13px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase">Client Success Stories</p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"level":2,"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center">See how we've helped businesses like yours weave their financial data into beautiful new systems.</h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"mt-testimonial","style":{"spacing":{"margin":{"top":"48px"}}}} -->
	<div class="wp-block-group mt-testimonial" style="margin-top:48px">
		<!-- wp:columns {"verticalAlignment":"center"} -->
		<div class="wp-block-columns are-vertically-aligned-center">
			<!-- wp:column {"verticalAlignment":"center","width":"200px","className":"mt-testimonial__logo"} -->
			<div class="wp-block-column is-vertically-aligned-center mt-testimonial__logo" style="flex-basis:200px">
				<!-- wp:image {"align":"center"} -->
				<figure class="wp-block-image aligncenter"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/smartlight.png' ) ); ?>" alt="Smartlight Solutions"/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:column -->
			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center">
				<!-- wp:quote -->
				<blockquote class="wp-block-quote"><p>"The attention to detail was impressive. They didn't just migrate our data; they improved it. Our financial records are now as neatly organized as a perfectly wound ball of yarn."</p><cite><strong>Ian Crawford Brunt</strong> — Smartlight Solutions Ltd</cite></blockquote>
				<!-- /wp:quote -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
