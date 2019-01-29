<?php
/**
 * Load minified CSS
 *
 @package     	PolishedWP\ModulusPro
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        http://www.polishedwp.com
 * @license     GNU General Public License 2.0+
 */

namespace PolishedWP\ModulusPro\Functions;

add_filter( 'stylesheet_uri', function( $stylesheet_uri, $stylesheet_dir_uri ) {
	return trailingslashit( $stylesheet_dir_uri ) . 'style.min.css';
}, 10, 2 );
