<?php
/**
 * Sidebar HTML markup structure.
 *
 * @package     PolishedWP\PWPBase
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        http://www.polishedwp.com
 * @license     GNU General Public License 2.0+
 */

namespace PolishedWP\PWPBase;

/**
 * Unregister sidebar callbacks.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_sidebar_callbacks() {
	// Removes header right widget area.
	unregister_sidebar( 'header-right' );

	// Removes secondary sidebar.
	unregister_sidebar( 'sidebar-alt' );

	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );
	
}