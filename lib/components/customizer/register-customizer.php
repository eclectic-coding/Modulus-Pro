<?php
/**
 *
 * This file adds the Customizer additions to the Modulus Theme.
 *
 * @package     PolishedWP\ModulusPro\Customizer
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        http://www.polishedwp.com
 * @license     GNU General Public License 2.0+
 */

namespace PolishedWP\ModulusPro\Customizer;

use WP_Customize_Color_Control;

add_action( 'customize_register', __NAMESPACE__ . '\set_customizer_register' );
/**
 * Registers settings and controls with the Customizer.
 *
 * @since 2.2.3
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function set_customizer_register( $wp_customize ) {

	$wp_customize->add_setting(
		CHILD_TEXT_DOMAIN . '_link_color',
		array(
			'default'           => get_default_link_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			CHILD_TEXT_DOMAIN . '_link_color',
			array(
				'description' => __( 'Change the color of post info links, hover color of linked titles, hover color of menu items, and more.', CHILD_TEXT_DOMAIN ),
				'label'       => __( 'Link Color', CHILD_TEXT_DOMAIN ),
				'section'     => 'colors',
				'settings'    => 'genesis_sample_link_color',
			)
		)
	);

	$wp_customize->add_setting(
		CHILD_TEXT_DOMAIN . '_accent_color',
		array(
			'default'           => get_default_accent_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			CHILD_TEXT_DOMAIN . 'genesis_sample_accent_color',
			array(
				'description' => __( 'Change the default hover color for button links, the menu button, and submit buttons. This setting does not apply to buttons created with the Buttons block.', CHILD_TEXT_DOMAIN ),
				'label'       => __( 'Accent Color', CHILD_TEXT_DOMAIN ),
				'section'     => 'colors',
				'settings'    => CHILD_TEXT_DOMAIN . '_accent_color',
			)
		)
	);

	$wp_customize->add_setting(
		'genesis_sample_logo_width',
		array(
			'default'           => 350,
			'sanitize_callback' => 'absint',
		)
	);

	// Add a control for the logo size.
	$wp_customize->add_control(
		'genesis_sample_logo_width',
		array(
			'label'       => __( 'Logo Width', CHILD_TEXT_DOMAIN ),
			'description' => __( 'The maximum width of the logo in pixels.', CHILD_TEXT_DOMAIN ),
			'priority'    => 9,
			'section'     => 'title_tagline',
			'settings'    => CHILD_TEXT_DOMAIN . '_logo_width',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 100,
			),

		)
	);

}
