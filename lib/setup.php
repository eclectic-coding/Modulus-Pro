<?php
/**
 * Setup child theme.
 *
 * @package     PolishedWP\Modulus
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        http://www.polishedwp.com
 * @license     GNU General Public License 2.0+
 */

namespace PolishedWP\Modulus;

//use PolishedWP\Modulus\Utilities;

add_action( 'genesis_setup', __NAMESPACE__ . '\setup_child_theme', 15 );
/**
 * Setup child theme
 *
 * @since 1.0.0
 *
 * @return void
 */
function setup_child_theme() {
	load_child_theme_textdomain( 'CHILD_TEXT_DOMAIN', CHILD_THEME_DIR . '/assets/languages' );

	unregister_genesis_callbacks();

	adds_theme_supports();
	
	adds_new_image_sizes();

	add_filter( 'genesis_load_deprecated', '__return_false' );
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
 * Adds theme supports to the site.
 *
 * @since 1.0.0
 *
 * @return void
 */
function adds_theme_supports() {
	$config = array( 'html5', 'genesis-accessibility', 'custom-logo' );

	foreach ( $config as $feature ) {
		add_theme_support( $feature, genesis_get_config( $feature ) );
	}

	add_theme_support( 'genesis-menus', genesis_get_config( 'menus' ) );
	
	// Legacy (Genesis <2.7) theme supports
	add_theme_support( 'genesis-responsive-viewport' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'genesis-after-entry-widget-area' );
	add_theme_support( 'genesis-footer-widgets', 3 );

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
		'featured-image' => array(
			'width'  => 720,
			'height' => 400,
			'crop'   => true,
		),
		'sidebar-featured' => array(
			'width' => 75, 
			'height' => 75, 
			'crop' => true,
		),
	);

	foreach ( $config as $name => $args ) {
		$crop = array_key_exists( 'crop', $args ) ? $args['crop'] : false;

		add_image_size( $name, $args['width'], $args['height'], $crop );
	}

	add_action( 'genesis_site_title', 'the_custom_logo', 0 );
}

//
// Gutenberg
// =====================
add_action( 'after_setup_theme', __NAMESPACE__ . '\load_gutenberg_support' );
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 2.7.0
 */
function load_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once CHILD_DIR . '/lib/components/gutenberg/init.php';
}

require_once get_stylesheet_directory() . '/lib/functions/theme-defaults.php';

