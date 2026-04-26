<?php
/**
 * Title: Services — three cards
 * Slug: maketime-finance/services-cards
 * Categories: maketime-finance
 * Description: Three cards describing Detailed Data Cleaning, Careful Migration and Useful Reporting.
 */
$img = function ( $file ) { return esc_url( get_theme_file_uri( 'assets/img/' . $file ) ); };
?>
<!-- wp:group {"tagName":"section","className":"mt-section mt-section--alt","style":{"spacing":{"padding":{"top":"88px","bottom":"88px"}}},"backgroundColor":"background-alt","layout":{"type":"constrained","contentSize":"1180px"}} -->
<section class="wp-block-group mt-section mt-section--alt has-background-alt-background-color has-background" style="padding-top:88px;padding-bottom:88px">

	<!-- wp:group {"className":"mt-section__head","layout":{"type":"constrained","contentSize":"780px"}} -->
	<div class="wp-block-group mt-section__head">
		<!-- wp:paragraph {"align":"center","className":"mt-eyebrow","style":{"typography":{"fontSize":"13px","textTransform":"uppercase","fontWeight":"700","letterSpacing":"0.14em"}},"textColor":"accent"} -->
		<p class="has-text-align-center mt-eyebrow has-accent-color has-text-color" style="font-size:13px;font-weight:700;letter-spacing:0.14em;text-transform:uppercase">Our Services</p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"level":2,"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center">We carefully weave your financial data into a beautiful new system</h2>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"18px"}}} -->
		<p class="has-text-align-center" style="font-size:18px">…with the patience and precision of an expert knitter.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"className":"mt-cards","style":{"spacing":{"margin":{"top":"48px"},"blockGap":{"left":"28px"}}}} -->
	<div class="wp-block-columns mt-cards" style="margin-top:48px">

		<!-- wp:column {"className":"mt-card"} -->
		<div class="wp-block-column mt-card">
			<!-- wp:image {"align":"center","className":"mt-card__icon"} -->
			<figure class="wp-block-image aligncenter mt-card__icon"><img src="<?php echo $img( 'service-selecting.png' ); ?>" alt=""/></figure>
			<!-- /wp:image -->
			<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">Detailed Data Cleaning</h3><!-- /wp:heading -->
			<!-- wp:heading {"level":4} --><h4 class="wp-block-heading">Sorting and organizing with attention to detail</h4><!-- /wp:heading -->
			<!-- wp:paragraph --><p>We meticulously sort through your financial records, ensuring your data is clean and reliable. Like selecting the finest yarn for a cherished project, our team identifies inconsistencies, removes duplicates and reconciles statements.</p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"mt-card"} -->
		<div class="wp-block-column mt-card">
			<!-- wp:image {"align":"center","className":"mt-card__icon"} -->
			<figure class="wp-block-image aligncenter mt-card__icon"><img src="<?php echo $img( 'service-tangle.png' ); ?>" alt=""/></figure>
			<!-- /wp:image -->
			<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">Careful Migration</h3><!-- /wp:heading -->
			<!-- wp:heading {"level":4} --><h4 class="wp-block-heading">Moving your data with care and precision</h4><!-- /wp:heading -->
			<!-- wp:paragraph --><p>After carefully untangling your financial data, we thoughtfully migrate it to Xero, ensuring every thread is in its right place. We work with you throughout the process to minimize disruption to your business operations.</p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"mt-card"} -->
		<div class="wp-block-column mt-card">
			<!-- wp:image {"align":"center","className":"mt-card__icon"} -->
			<figure class="wp-block-image aligncenter mt-card__icon"><img src="<?php echo $img( 'service-report.png' ); ?>" alt=""/></figure>
			<!-- /wp:image -->
			<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">Useful Reporting</h3><!-- /wp:heading -->
			<!-- wp:heading {"level":4} --><h4 class="wp-block-heading">Setting up reports that give you useful insights</h4><!-- /wp:heading -->
			<!-- wp:paragraph --><p>After spending time understanding what your particular information needs are, we weave together the threads of data to produce pictures of your business. So you know what decisions will help achieve your goals.</p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
