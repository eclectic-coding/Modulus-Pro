<?php
/**
 * Gutenberg theme support.
 *
 * @package     PolishedWP\Modulus\Gutenberg
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        http://www.polishedwp.com
 * @license     GNU General Public License 2.0+
 */

namespace PolishedWP\Modulus\Gutenberg;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_gut_frontend_styles' );
/**
 * Enqueues Gutenberg front-end styles.
 *
 * @since 2.7.0
 */
function enqueue_gut_frontend_styles() {

	$child_theme_slug = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : CHILD_TEXT_DOMAIN;

	wp_enqueue_style(
		CHILD_TEXT_DOMAIN . '-gutenberg',
		get_stylesheet_directory_uri() . '/lib/gutenberg/front-end.css',
		array( $child_theme_slug ),
		CHILD_THEME_VERSION
	);

}

add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\set_block_editor_styles' );
/**
 * Enqueues Gutenberg admin editor fonts and styles.
 *
 * @since 2.7.0
 */
function set_block_editor_styles() {

	wp_enqueue_style(
		CHILD_TEXT_DOMAIN . '-gutenberg-fonts',
		'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700',
		array(),
		CHILD_THEME_VERSION
	);

}

add_filter( 'body_class', __NAMESPACE__ . '\set_gut_blocks_body_classes' );
/**
 * Adds body classes to help with block styling.
 *
 * - `has-no-blocks` if content contains no blocks.
 * - `first-block-[block-name]` to allow changes based on the first block (such as removing padding above a Cover block).
 * - `first-block-align-[alignment]` to allow styling adjustment if the first block is wide or full-width.
 *
 * @since 2.8.0
 *
 * @param array $classes The original classes.
 * @return array The modified classes.
 */
function set_gut_blocks_body_classes( $classes ) {

	if ( ! is_singular() || ! function_exists( 'has_blocks' ) || ! function_exists( 'parse_blocks') ) {
		return $classes;
	}

	if ( ! has_blocks() ) {
		$classes[] = 'has-no-blocks';
		return $classes;
	}

	$post_object = get_post( get_the_ID() );
	$blocks      = (array) parse_blocks( $post_object->post_content );

	if ( isset( $blocks[0]['blockName'] ) ) {
		$classes[] = 'first-block-' . str_replace( '/', '-', $blocks[0]['blockName'] );
	}

	if ( isset( $blocks[0]['attrs']['align'] ) ) {
		$classes[] = 'first-block-align-' . $blocks[0]['attrs']['align'];
	}

	return $classes;

}

add_action( 'after_setup_theme', __NAMESPACE__ . '\set_gut_theme_supports', 0 );
/**
 * Description of expected behavior
 *
 * @since 1.0.0
 *
 * @return void
 */
function set_gut_theme_supports() {
	$config = array( 'editor-styles', 'align-wide', 'responsive-embeds' );
	foreach ( $config as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}

// Enqueue editor styles.
add_editor_style( '/lib/gutenberg/style-editor.css' );


add_theme_support( 'editor-font-sizes', genesis_get_config( 'editor-font-sizes' ));
add_theme_support( 'editor-color-palette', genesis_get_config( 'editor-color-palette' ));

add_action( 'after_setup_theme', __NAMESPACE__ . '\set_gut_content_width', 0 );
/**
 * Set content width to match the “wide” Gutenberg block width.
 */
function set_gut_content_width() {

	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound -- See https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/924
	$GLOBALS['content_width'] = apply_filters( 'set_gut_content_width', 1062 );

}
