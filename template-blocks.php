<?php
/**
 * Modulus Theme.
 *
 * A template to force full-width layout, remove breadcrumbs, and remove the page title.
 *
 * Template Name: Blocks
 *
 * @package     PolishedWP\ModulusPro
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        http://www.polishedwp.com
 * @license     GNU General Public License 2.0+
 */

namespace PolishedWP\ModulusPro;

// Removes the entry header markup and page title.
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

// Forces full width content layout.
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// Removes the breadcrumbs.
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

// Runs the Genesis loop.
genesis();
