<?php
/**
 * Modulus Theme.
 *
 * This file adds the default theme settings.
 *
 * @package     PolishedWP\Modulus
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        http://www.polishedwp.com
 * @license     GNU General Public License 2.0+
 */

namespace PolishedWP\Modulus;

add_filter( 'genesis_theme_settings_defaults', __NAMESPACE__ . '\set_theme_defaults' );

/**
 * Updates theme settings on reset.
 *
 * @since 1.0.0
 *
 * @param array $defaults Original theme settings defaults.
 * @return array Modified defaults.
 */
function set_theme_defaults( $defaults ) {

	$defaults['blog_cat_num']              = 6;
	$defaults['breadcrumb_front_page']     = 0;
	$defaults['content_archive']           = 'full';
	$defaults['content_archive_limit']     = 0;
	$defaults['content_archive_thumbnail'] = 0;
	$defaults['posts_nav']                 = 'numeric';
	$defaults['site_layout']               = 'content-sidebar';

	return $defaults;

}

add_action( 'after_switch_theme', __NAMESPACE__ . '\set_theme_setting_defaults' );
/**
 * Updates theme settings on activation.
 *
 * @since 1.0.0
 */
function set_theme_setting_defaults() {

	if ( function_exists( 'genesis_update_settings' ) ) {

		genesis_update_settings(
			array(
				'blog_cat_num'              => 6,
				'breadcrumb_front_page'     => 0,
				'content_archive'           => 'full',
				'content_archive_limit'     => 0,
				'content_archive_thumbnail' => 0,
				'posts_nav'                 => 'numeric',
				'site_layout'               => 'content-sidebar',
			)
		);

	}

	update_option( 'posts_per_page', 6 );

}

add_filter( 'simple_social_default_styles', __NAMESPACE__ . '\set_social_default_styles' );
/**
 * Set Simple Social Icon defaults.
 *
 * @since 1.0.0
 *
 * @param array $defaults Social style defaults.
 * @return array Modified social style defaults.
 */
function set_social_default_styles( $defaults ) {

	$args = array(
		'alignment'              => 'alignleft',
		'background_color'       => '#f5f5f5',
		'background_color_hover' => '#333333',
		'border_radius'          => 3,
		'border_width'           => 0,
		'icon_color'             => '#333333',
		'icon_color_hover'       => '#ffffff',
		'size'                   => 40,
	);

	$args = wp_parse_args( $args, $defaults );

	return $args;

}
