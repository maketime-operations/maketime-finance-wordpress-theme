<?php
/**
 * Make Time Finance — block theme bootstrap.
 *
 * Block themes do most of their work through theme.json and the
 * templates/ & parts/ folders. This file is kept small: it registers
 * theme supports, enqueues the shared stylesheet, and loads any
 * custom block patterns.
 *
 * @package MakeTimeFinance
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'maketime_finance_setup' ) ) {
	/**
	 * Theme setup.
	 */
	function maketime_finance_setup() {
		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable featured images on posts & pages.
		add_theme_support( 'post-thumbnails' );

		// HTML5 markup for core widgets / forms.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Automatic feed links in <head>.
		add_theme_support( 'automatic-feed-links' );

		// Editor styles share the front-end stylesheet.
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/theme.css' );

		// Register menu locations (for classic menu fallback — the block
		// theme uses Navigation blocks by default, but this is harmless).
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'maketime-finance' ),
				'footer'  => __( 'Footer Menu',  'maketime-finance' ),
			)
		);

		// Load translations.
		load_theme_textdomain( 'maketime-finance', get_template_directory() . '/languages' );
	}
}
add_action( 'after_setup_theme', 'maketime_finance_setup' );


/**
 * Enqueue the front-end stylesheet and Google Font.
 */
function maketime_finance_enqueue_assets() {
	// Noto Serif Georgian from Google Fonts — matches the design.
	wp_enqueue_style(
		'maketime-finance-google-font',
		'https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);

	// Theme-wide CSS.
	wp_enqueue_style(
		'maketime-finance-theme',
		get_theme_file_uri( 'assets/theme.css' ),
		array( 'maketime-finance-google-font' ),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts',    'maketime_finance_enqueue_assets' );
add_action( 'enqueue_block_assets',  'maketime_finance_enqueue_assets' );


/**
 * Register custom block pattern categories so the patterns defined
 * in /patterns/*.php are grouped nicely in the inserter.
 */
function maketime_finance_register_pattern_categories() {
	if ( ! function_exists( 'register_block_pattern_category' ) ) {
		return;
	}

	register_block_pattern_category(
		'maketime-finance',
		array(
			'label'       => __( 'Make Time Finance', 'maketime-finance' ),
			'description' => __( 'Reusable sections for the Make Time Finance theme.', 'maketime-finance' ),
		)
	);
}
add_action( 'init', 'maketime_finance_register_pattern_categories' );


/**
 * Print a generator meta tag so the active theme version is trivial to
 * verify after a deploy: `curl -s https://maketime.finance/ | grep maketime`.
 */
function maketime_finance_print_version_meta() {
	$version = wp_get_theme()->get( 'Version' );
	printf(
		'<meta name="generator" content="maketime-finance %s">' . "\n",
		esc_attr( $version )
	);
}
add_action( 'wp_head', 'maketime_finance_print_version_meta' );


/**
 * [mt_theme_version] shortcode — resolves to the active theme version,
 * so the footer can show it without hardcoding.
 */
function maketime_finance_version_shortcode() {
	return esc_html( wp_get_theme()->get( 'Version' ) );
}
add_shortcode( 'mt_theme_version', 'maketime_finance_version_shortcode' );
