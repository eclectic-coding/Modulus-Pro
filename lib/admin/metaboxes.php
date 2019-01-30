<?php
/**
 * Changes to the metaboxes in the admin.
 *
 * @package     PolishedWP\ModulusPro\Admin
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        https://www.polishedwp.com
 * @license     GNU General Public License 2+
 */

namespace PolishedWP\ModulusPro\Admin;

// Removes unused admin metaboxes.
add_action( 'genesis_theme_settings_metaboxes', function( $_genesis_admin_settings ) {
	remove_meta_box( 'genesis-theme-settings-header', $_genesis_admin_settings, 'main' );
	remove_meta_box( 'genesis-theme-settings-nav', $_genesis_admin_settings, 'main' );
});