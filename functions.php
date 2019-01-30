<?php
/**
 * Default Theme Codebase.
 *
 * @package     PolishedWP\ModulusPro
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        http://www.polishedwp.com
 * @license     GNU General Public License 2.0+
 */

namespace PolishedWP\ModulusPro;

include_once( 'lib/init.php' );

include_once( 'lib/functions/autoload.php' );

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Adds support for HTML5 markup structure.
add_theme_support( 'html5', genesis_get_config( 'html5' ) );

// Adds support for accessibility.
add_theme_support( 'genesis-accessibility', genesis_get_config( 'accessibility' ) );

// Adds viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Adds custom logo in Customizer > Site Identity.
add_theme_support( 'custom-logo', genesis_get_config( 'custom-logo' ) );

// Renames primary and secondary navigation menus.
add_theme_support( 'genesis-menus', genesis_get_config( 'menus' ) );

// Adds image sizes.
add_image_size( 'sidebar-featured', 75, 75, true );

// Adds support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Adds support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

add_filter( 'site_transient_update_themes', __NAMESPACE__ . '\disable_theme_update_notification' );
/**
 * Disable individual theme update notification WordPress
 *
 * @since 1.0.0
 *
 * @param $value
 *
 * @return mixed
 */
function disable_theme_update_notification( $value ) {
	if ( isset( $value ) && is_object( $value ) ) {
		unset( $value->response['modulus-pro'] );
	}
	return $value;
}
