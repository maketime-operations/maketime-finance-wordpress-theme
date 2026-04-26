<?php
/**
 * Title: Header Logo
 * Slug: maketime-finance/header-logo
 * Categories: maketime-finance
 * Inserter: false
 * Description: Brand mark for the header. PHP-resolved so the path
 *   follows whatever folder the theme is installed under.
 */
?>
<!-- wp:image {"width":"56px","sizeSlug":"full","className":"mt-logo__mark"} -->
<figure class="wp-block-image is-resized mt-logo__mark"><a href="/"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/logo.svg' ) ); ?>" alt="Make Time Finance" style="width:56px"/></a></figure>
<!-- /wp:image -->
