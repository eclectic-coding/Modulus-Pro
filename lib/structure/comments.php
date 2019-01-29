<?php
/**
 * Comments HTML markup structure.
 *
 * @package     PolishedWP\ModulusPRO
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        http://www.polishedwp.com
 * @license     GNU General Public License 2.0+
 */

namespace PolishedWP\ModulusPRO;

add_filter( 'genesis_author_box_gravatar_size', __NAMESPACE__ . '\set_author_box_gravatar' );
/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 2.2.3
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
function set_author_box_gravatar( $size ) {

	return 90;

}
