<?php
/**
 * Remove AdSense settings.
 *
 * Removal from Customizer is happening in 'customizer/remove-adsense.php'
 *
 * Changes to the Layout.
 *
 * @package     PolishedWP\Modulus\Admin
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        http://www.polishedwp.com
 * @license     GNU General Public License 2.0+
 */

namespace PolishedWP\Modulus\Admin;

// Sets AdSense ID to always be an empty string - stops meta box from appearing on Post screens.
add_filter( 'genesis_pre_get_option_adsense_id', '__return_empty_string' );

// Removes AdSense metabox from Theme Settings.
add_action( 'genesis_theme_settings_metaboxes', function () {
	remove_meta_box( 'genesis-theme-settings-adsense', 'toplevel_page_genesis', 'main' );
});

// Removal from Customizer is in 'lib/components/customizer/remove-adsense.php.
