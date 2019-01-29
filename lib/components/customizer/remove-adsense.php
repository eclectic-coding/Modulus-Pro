<?php
/**
 * Remove AdSense settings.
 *
 * @package     PolishedWP\ModulusPRO\Customizer\
 * @since       1.0.0
 * @author      Christoph Herr
 * @link        https://www.christophherr.com
 * @license     GNU General Public License 2+
 */

namespace PolishedWP\ModulusPRO\Customizer;

add_filter( 'genesis_customizer_theme_settings_config', function( $config ) {
	unset( $config['genesis']['sections']['genesis_adsense'] );
	return $config;
});
