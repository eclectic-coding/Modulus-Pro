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

require_once 'lib/init.php';

require_once 'lib/functions/autoload.php';


// Starts the engine.
require_once get_template_directory() . '/lib/init.php';


add_filter( 'site_transient_update_themes', __NAMESPACE__ . '\disable_theme_update_notification' );
/**
 * Disable individual theme update notification WordPress
 *
 * @since 1.0.0
 *
 * @param mixed $value qqqq.
 *
 * @return mixed
 */
function disable_theme_update_notification( $value ) {
	if ( isset( $value ) && is_object( $value ) ) {
		unset( $value->response['modulus-pro'] );
	}

	return $value;
}
