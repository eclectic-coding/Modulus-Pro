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

add_action( 'customize_register', __NAMESPACE__ . '\customize_settings_sections' );
/**
 * Registers settings and controls with the Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function customize_settings_sections( $wp_customize ) {

	//
	// Section - Basic setting
	// =======================
	$wp_customize->add_section( CHILD_TEXT_DOMAIN . '-basic-settings', array(
		'description' => sprintf( '<strong>%s</strong>', __( 'Modify the ' . CHILD_THEME_NAME . ' Theme basic settings.', CHILD_TEXT_DOMAIN ) ),
		'title'       => __( 'Basic Settings', CHILD_TEXT_DOMAIN ),
		'panel'       => CHILD_TEXT_DOMAIN . '-settings',
	) );


	//
	// Section - Header Styles
	// =======================
	$wp_customize->add_section( CHILD_TEXT_DOMAIN . '-header-style', array(
		'description' => sprintf( '<strong>%s</strong>', __( 'Modify the ' . CHILD_THEME_NAME . ' Theme header style.', CHILD_TEXT_DOMAIN ) ),
		'title'       => __( 'Header Style', CHILD_TEXT_DOMAIN ),
		'panel'       => CHILD_TEXT_DOMAIN . '-settings',
	) );

	//
	// Navigation section.
	// =======================
	$wp_customize->add_section( CHILD_TEXT_DOMAIN . '-menu-locations', array(
		'description' => sprintf( '<strong>%s</strong>', __( 'Modify the ' . CHILD_THEME_NAME . ' menu locations.', CHILD_TEXT_DOMAIN ) ),
		'title'       => __( 'Primary menu location', CHILD_TEXT_DOMAIN ),
		'panel'       => CHILD_TEXT_DOMAIN . '-settings',
	) );

}



