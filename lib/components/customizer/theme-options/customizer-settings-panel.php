<?php
/**
 * Customizer handler.
 *
 * @package     PolishedWP\PWPBase\Customizer
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        http://www.polishedwp.com
 * @license     GNU General Public License 2.0+
 */

namespace PolishedWP\PWPBase\Customizer;

use WP_Customize_Manager;

add_action( 'customize_register', __NAMESPACE__ . '\customize_settings_panel' );
/**
 * Registers settings and controls with the Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function customize_settings_panel( $wp_customize ) {

	/*
	 * New Main settings panel.
	 *****************************************************************/
	$wp_customize->add_panel( CHILD_TEXT_DOMAIN . '-settings', array(
		'theme-options', array(
			'priority'    => 80,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'       => __( CHILD_THEME_NAME . ' Settings', CHILD_TEXT_DOMAIN ),
			'description' => __( 'Set up the ' . CHILD_THEME_NAME . 'Pro settings and defaults.', CHILD_TEXT_DOMAIN ),
			)
		)
	);
}
