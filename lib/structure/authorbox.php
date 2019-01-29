<?php
/**
 * Comments HTML markup structure.
 *
 * @package     PolishedWP\ModulusPro
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        http://www.polishedwp.com
 * @license     GNU General Public License 2.0+
 */

namespace PolishedWP\ModulusPro;

add_filter( 'genesis_comment_list_args', __NAMESPACE__ . '\setup_comments_gravatar' );
/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 1.0.0
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
function setup_comments_gravatar( array $args ) {

	$args['avatar_size'] = 60;
	return $args;

}
