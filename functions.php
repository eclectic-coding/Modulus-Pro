<?php
/**
 * Default Theme Codebase.
 *
 * @package     PolishedWP\ModulusPRO
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        http://www.polishedwp.com
 * @license     GNU General Public License 2.0+
 */

namespace PolishedWP\ModulusPRO;

include_once( 'lib/init.php' );

include_once( 'lib/functions/autoload.php' );

// Removes output of primary navigation right extras.
remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10, 2 );
remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10, 2 );


