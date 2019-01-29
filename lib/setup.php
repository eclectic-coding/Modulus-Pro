<?php
/**
 * Setup child theme.
 *
 * @package     PolishedWP\ModulusPro
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        http://www.polishedwp.com
 * @license     GNU General Public License 2.0+
 */

namespace PolishedWP\ModulusPro;

// Sets up the Theme.
require_once CHILD_THEME_DIR . '/config/theme-defaults.php';

add_action( 'genesis_setup', __NAMESPACE__ . '\setup_child_theme', 15 );
/**
 * Setup child theme
 *
 * @since 1.0.0
 *
 * @return void
 */
function setup_child_theme() {

	load_child_theme_textdomain( 'genesis-sample', get_stylesheet_directory() . '/assets/languages' );

	load_gutenberg_support();

	adds_theme_supports();

	adds_new_image_sizes();

	unregister_genesis_callbacks();

	add_filter( 'genesis_load_deprecated', '__return_false' );
}

/**
 * Adds theme supports to the site.
 *
 * @since 1.0.0
 *
 * @return void
 */
function adds_theme_supports() {
	$config = array(
		'genesis-responsive-viewport'     => null,
		'genesis-after-entry-widget-area' => null,
		'genesis-footer-widgets'          => 3,
	);
	foreach ( $config as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

	// Adds support for HTML5 markup structure.
	add_theme_support( 'html5', genesis_get_config( 'html5' ) );
	add_theme_support( 'genesis-accessibility', genesis_get_config( 'accessibility' ) );
	add_theme_support( 'custom-logo', genesis_get_config( 'custom-logo' ) );
	add_theme_support( 'genesis-menus', genesis_get_config( 'menus' ) );
}

/**
 * Adds new image sizes
 *
 * @since 1.0.0
 *
 * @return void
 */
function adds_new_image_sizes() {
	$config = array(
		'featured-image'   => array(
			'width'  => 720,
			'height' => 400,
			'crop'   => true,
		),
		'sidebar-featured' => array(
			'width'  => 75,
			'height' => 75,
			'crop'   => true,
		),
	);

	foreach ( $config as $name => $args ) {
		$crop = array_key_exists( 'crop', $args ) ? $args['crop'] : false;

		add_image_size( $name, $args['width'], $args['height'], $crop );
	}

	add_action( 'genesis_site_title', 'the_custom_logo', 0 );
}

/**
 * Unregister Genesis callbacks.  We do this here because the child theme loads before Genesis.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_genesis_callbacks() {
	unregister_menu_callbacks();
}

/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 2.7.0
 */
function load_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once CHILD_THEME_DIR . '/lib/components/gutenberg/init.php';
}

