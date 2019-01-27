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

// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/functions/theme-defaults.php';

add_action( 'after_setup_theme', __NAMESPACE__ . '\genesis_sample_localization_setup' );
/**
 * Sets localization (do not remove).
 *
 * @since 1.0.0
 */
function genesis_sample_localization_setup() {

	load_child_theme_textdomain( 'genesis-sample', get_stylesheet_directory() . '/assets/languages' );

}

add_action( 'after_setup_theme', __NAMESPACE__ . '\setup_child_theme', 15 );
/**
 * Setup child theme
 *
 * @since 1.0.0
 *
 * @return void
 */
function setup_child_theme() {

	load_gutenberg_support();

//	adds_theme_supports();

	adds_new_image_sizes();

//	add_filter( 'genesis_load_deprecated', '__return_false' );
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

	 //Legacy (Genesis <2.7) theme supports
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
//add_action( 'after_setup_theme', __NAMESPACE__ . '\load_gutenberg_support' );
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 2.7.0
 */
function load_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once CHILD_THEME_DIR . '/lib/components/gutenberg/init.php';
}

