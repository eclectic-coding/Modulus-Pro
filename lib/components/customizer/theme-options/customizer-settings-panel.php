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
		'description' => __( 'Set up the ' . CHILD_THEME_NAME . 'Pro settings and defaults.', CHILD_TEXT_DOMAIN ),
		'priority'    => 80,
		'title'       => __( CHILD_THEME_NAME . ' Settings', CHILD_TEXT_DOMAIN ),
	) );

	//
	// Section - Basic setting
	// =======================
	$wp_customize->add_section( CHILD_TEXT_DOMAIN . '-basic-settings', array(
		'description' => sprintf( '<strong>%s</strong>', __( 'Modify the ' . CHILD_THEME_NAME . ' Theme basic settings.', CHILD_TEXT_DOMAIN ) ),
		'title'       => __( 'Basic Settings', CHILD_TEXT_DOMAIN ),
		'panel'       => CHILD_TEXT_DOMAIN . '-settings',
	) );

	// Hero visibility setting.
	$wp_customize->add_setting( CHILD_TEXT_DOMAIN . '-show-hero-section', array(
		'default'           => 0,
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( CHILD_TEXT_DOMAIN . '-show-hero-section', array(
		'label'       => __( 'Add settings question?', CHILD_TEXT_DOMAIN ),
		'description' => __( 'Check the box to display the hero section on the top of the front page.', CHILD_TEXT_DOMAIN ),
		'section'     => CHILD_TEXT_DOMAIN . '-basic-settings',
		'settings'    => CHILD_TEXT_DOMAIN . '-show-hero-section',
		'type'        => 'checkbox',
	) );

	//
	// Section - Header Styles
	// =======================
	$wp_customize->add_section( CHILD_TEXT_DOMAIN . '-header-style', array(
		'description' => sprintf( '<strong>%s</strong>', __( 'Modify the ' . CHILD_THEME_NAME . ' Theme header style.', CHILD_TEXT_DOMAIN ) ),
		'title'       => __( 'Header Style', CHILD_TEXT_DOMAIN ),
		'panel'       => CHILD_TEXT_DOMAIN . '-settings',
	) );

	// Standard header setting.
	$wp_customize->add_setting( CHILD_TEXT_DOMAIN . '-select-header-style', array(
		'default'           => 'standard_header_style',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control(
		CHILD_TEXT_DOMAIN . '-select-header-style',
		array(
			'label'       => __( 'Primary Menu Placement', CHILD_TEXT_DOMAIN ),
			'description' => __( 'Remember to enable and setup your menus in the Menu Panel.', CHILD_TEXT_DOMAIN ),
			'section'     => CHILD_TEXT_DOMAIN . '-header-style',
			'settings'    => CHILD_TEXT_DOMAIN . '-select-header-style', // _mai_customizer_get_field_name( $settings_field, 'footer_widget_count' ),
			'type'        => 'select',
			'choices'     => array(
				'sticky_header_style'      => __( 'Sticky header' ),
				'nonsticky_header_style'        => __( 'Non-Sticky Header' ),
				'reveal_header_style'        => __( 'Reveal Header' ),
				'sticky_reveal_header_style' => __( 'Sticky/Reveal header' ),
				'reveal_shrink_header_style' => __( 'Reveal/Shrink header' ),
			),
		)
	);

	// Mobile menu setting.
	$wp_customize->add_setting( CHILD_TEXT_DOMAIN . '-select-mobile-style', array(
		'default'           => 'standard_mobile_menu',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control(
		CHILD_TEXT_DOMAIN . '-select-mobile-style',
		array(
			'label'       => __( 'Mobile Menu style', CHILD_TEXT_DOMAIN ),
			'section'     => CHILD_TEXT_DOMAIN . '-header-style',
			'settings'    => CHILD_TEXT_DOMAIN . '-select-mobile-style',
			'type'        => 'select',
			'choices'     => array(
				'standard_mobile_menu'      => __( 'Standard menu' ),
				'side_mobile_menu'        => __( 'Side Menu' ),
			),
		)
	);

	// Footer Widget setting.
	$wp_customize->add_setting( CHILD_TEXT_DOMAIN . '-config-footers', array(
		'default'           => 'footer3',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control(
		CHILD_TEXT_DOMAIN . '-config-footers',
		array(
			'label'       => __( 'Footer Widgets', CHILD_TEXT_DOMAIN ),
//			'priority' => 8,
			'description' => __( 'Save and reload customizer to view changes.', CHILD_TEXT_DOMAIN ),
			'section'     => CHILD_TEXT_DOMAIN . '-header-style',
			'settings'    => CHILD_TEXT_DOMAIN . '-config-footers',
			'type'        => 'select',
			'choices'     => array(
				'footer1'      => __( '1' ),
				'footer2'        => __( '2' ),
				'footer3'        => __( '3' ),
				'footer4'        => __( '4' ),
				'footer5'        => __( '5' ),
				'footer6'        => __( '6' ),
			),
		)
	);

	//
	// Navigation section.
	// =======================
	$wp_customize->add_section( CHILD_TEXT_DOMAIN . '-menu-locations', array(
		'description' => sprintf( '<strong>%s</strong>', __( 'Modify the ' . CHILD_THEME_NAME . ' menu locations.', CHILD_TEXT_DOMAIN ) ),
		'title'       => __( 'Primary menu location', CHILD_TEXT_DOMAIN ),
		'panel'       => CHILD_TEXT_DOMAIN . '-settings',
	) );

	// Header style.
	$wp_customize->add_setting(
		CHILD_TEXT_DOMAIN . '-select-menu-locations',
		array(
			'default'           => 'default_header_style',
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_key',
		)
	);

	$wp_customize->add_control(
		'header_style',
		array(
			'label'       => __( 'Primary Menu Placement', CHILD_TEXT_DOMAIN ),
//			'priority' => 8,
			'description' => __( 'Remember to enable and setup your menus in the Menu Panel.', CHILD_TEXT_DOMAIN ),
			'section'     => CHILD_TEXT_DOMAIN . '-menu-locations',
			'settings'    => CHILD_TEXT_DOMAIN . '-select-menu-locations',
			'type'        => 'select',
			'choices'     => array(
				'default_header_style'      => __( 'Default (site-header)' ),
				'above_header_header_style' => __( 'Above Header' ),
				'below_header_header_style' => __( 'Below Header' ),
				'split_header_style'        => __( 'Split (center logo)' ),
			),
		)
	);
}



