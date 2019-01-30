<?php
/**
 * Assets load handler.
 *
 * @package     PolishedWP\ModulusPro\
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        http://www.polishedwp.com
 * @license     GNU General Public License 2.0+
 */

namespace PolishedWP\ModulusPro;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueues scripts and styles.
 *
 * @since 1.0.0
 */
function enqueue_assets() {

	wp_enqueue_style(
		CHILD_TEXT_DOMAIN . '-fonts',
		'//fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700',
		array(),
		CHILD_THEME_VERSION 
	);

	wp_enqueue_style( 'dashicons' );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script(
		CHILD_TEXT_DOMAIN . '-responsive-menu',
		get_stylesheet_directory_uri() . "/assets/js/responsive-menus{$suffix}.js",
		array( 'jquery' ),
		CHILD_THEME_VERSION,
		true
	);

	wp_localize_script(
		CHILD_TEXT_DOMAIN . '-responsive-menu',
		'genesis_responsive_menu',
		responsive_menu_settings()
	);

	wp_enqueue_script(
		CHILD_TEXT_DOMAIN,
		get_stylesheet_directory_uri() . '/assets/js/genesis-sample.js',
		array( 'jquery' ),
		CHILD_THEME_VERSION,
		true
	);

}

/**
 * Defines responsive menu settings.
 *
 * @since 1.0.0
 */
function responsive_menu_settings() {

	$settings = array(
		'mainMenu'         => __( 'Menu', CHILD_TEXT_DOMAIN ),
		'menuIconClass'    => 'dashicons-before dashicons-menu',
		'subMenu'          => __( 'Submenu', CHILD_TEXT_DOMAIN ),
		'subMenuIconClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'      => array(
			'combine' => array(
				'.nav-primary',
			),
			'others'  => array(),
		),
	);

	return $settings;

}