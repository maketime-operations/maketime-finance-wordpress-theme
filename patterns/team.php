<?php
/**
 * Title: Team
 * Slug: maketime-finance/team
 * Categories: maketime-finance
 * Inserter: false
 * Description: Two-column team section for the About page. PHP-resolved
 *   so the headshot paths follow whatever folder the theme is installed under.
 */

$img = function ( $file ) { return esc_url( get_theme_file_uri( 'assets/img/' . $file ) ); };
?>
<!-- wp:columns {"className":"mt-team"} -->
<div class="wp-block-columns mt-team">
	<!-- wp:column {"className":"mt-person"} -->
	<div class="wp-block-column mt-person">
		<!-- wp:image {"sizeSlug":"large","className":"mt-person__photo"} -->
		<figure class="wp-block-image size-large mt-person__photo"><img src="<?php echo $img( 'wendy.png' ); ?>" alt="Wendy Laing"/></figure>
		<!-- /wp:image -->
		<!-- wp:heading {"level":2} --><h2 class="wp-block-heading">Wendy Laing</h2><!-- /wp:heading -->
		<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">CFO &mdash; Finance and Accountant</h3><!-- /wp:heading -->
		<!-- wp:paragraph --><p>A CIMA qualified Management Accountant with over 20 years experience. I love numbers and diving into your accounts to make sure they&rsquo;re clean and reconciled. I want you to trust the reports we provide to give you actionable insights.</p><!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
	<!-- wp:column {"className":"mt-person"} -->
	<div class="wp-block-column mt-person">
		<!-- wp:image {"sizeSlug":"large","className":"mt-person__photo"} -->
		<figure class="wp-block-image size-large mt-person__photo"><img src="<?php echo $img( 'david.jpeg' ); ?>" alt="David Laing"/></figure>
		<!-- /wp:image -->
		<!-- wp:heading {"level":2} --><h2 class="wp-block-heading">David Laing</h2><!-- /wp:heading -->
		<!-- wp:heading {"level":3} --><h3 class="wp-block-heading">CTO &mdash; IT and AI</h3><!-- /wp:heading -->
		<!-- wp:paragraph --><p>An experienced software engineer who&rsquo;s been programming since I was 10. I have a special interest in using AI and IT to find ways to reduce repeatable work and provide useful insights &mdash; so we can make time for important things like decision making and coffee.</p><!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
