<?php
/**
 * Modulus-Pro child theme.
 *
 * @package     PolishedWP\ModulusPro\Config
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        http://www.polishedwp.com
 * @license     GNU General Public License 2.0+
 */

namespace PolishedWP\ModulusPro\Config;

/**
 * Editor font sizes config.
 */
return array(
	array(
		'name'      => __( 'Small', CHILD_TEXT_DOMAIN ),
		'size'      => 12,
		'slug'      => 'small',
	),
	array(
		'name'      => __( 'Normal', CHILD_TEXT_DOMAIN ),
		'size'      => 16,
		'slug'      => 'normal',
	),
	array(
		'name'      => __( 'Large', CHILD_TEXT_DOMAIN ),
		'size'      => 20,
		'slug'      => 'large',
	),
	array(
		'name'      => __( 'Larger', CHILD_TEXT_DOMAIN ),
		'size'      => 24,
		'slug'      => 'larger',
	),
);
