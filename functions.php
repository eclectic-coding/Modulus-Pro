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
