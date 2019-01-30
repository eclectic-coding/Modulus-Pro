<?php
/**
 * Modulus-Pro child theme..
 *
 * Onboarding config to load plugins and homepage content on theme activation.
 *
 * @package     PolishedWP\ModulusPro\Config
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        http://www.polishedwp.com
 * @license     GNU General Public License 2.0+
 */

namespace PolishedWP\ModulusPro\Config;

return array(
	'dependencies' => array(
		'plugins' => array(
			array(
				'name'        => __( 'Atomic Blocks', CHILD_TEXT_DOMAIN ),
				'slug'        => 'atomic-blocks/atomicblocks.php',
			),
		),
	),
	'content' => array(
		'homepage' => array(
			'post_title'     => 'Homepage',
			'post_name'      => 'homepage-gutenberg',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/homepage.php',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'page_template'  => 'template-blocks.php',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
		),
	),
);
