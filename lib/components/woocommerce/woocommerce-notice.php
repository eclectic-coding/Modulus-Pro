<?php
/**
 * Genesis Sample.
 *
 * This file adds the Genesis Connect for WooCommerce notice to the Genesis Sample Theme.
 *
 * @package     PolishedWP\Modulus\Woocommerce
 * @since       1.0.0
 * @author      Chuck Smith
 * @link        http://www.polishedwp.com
 * @license     GNU General Public License 2.0+
 */

namespace PolishedWP\Modulus\Woocommerce;

add_action( 'admin_print_styles', __NAMESPACE__ . '\remove_woo_notice' );
/**
 * Removes the default WooCommerce Notice.
 *
 * @since 1.0.0
 */
function remove_woo_notice() {

	// If below version WooCommerce 1.0.0, exit early.
	if ( ! class_exists( 'WC_Admin_Notices' ) ) {
		return;
	}

	WC_Admin_Notices::remove_notice( 'theme_support' );

}

add_action( 'admin_notices', __NAMESPACE__ . '\set_woo_theme_notice' );
/**
 * Adds a prompt to activate Genesis Connect for WooCommerce
 * if WooCommerce is active but Genesis Connect is not.
 *
 * @since 1.0.0
 */
function set_woo_theme_notice() {

	// If WooCommerce isn't installed or Genesis Connect is installed, exit early.
	if ( ! class_exists( 'WooCommerce' ) || function_exists( 'gencwooc_setup' ) ) {
		return;
	}

	// If user doesn't have access, exit early.
	if ( ! current_user_can( 'manage_woocommerce' ) ) {
		return;
	}

	// If message dismissed, exit early.
	if ( get_user_option( 'woo_message_dismissed', get_current_user_id() ) ) {
		return;
	}

	/* translators: %s: child theme name */
	$notice_html = sprintf( __( 'Please install and activate <a href="https://wordpress.org/plugins/genesis-connect-woocommerce/" target="_blank">Genesis Connect for WooCommerce</a> to <strong>enable WooCommerce support for %s</strong>.', 'genesis-sample' ), esc_html( CHILD_THEME_NAME ) );

	if ( current_user_can( 'install_plugins' ) ) {
		$plugin_slug  = 'genesis-connect-woocommerce';
		$admin_url    = network_admin_url( 'update.php' );
		$install_link = sprintf(
			'<a href="%s">%s</a>',
			wp_nonce_url(
				add_query_arg(
					array(
						'action' => 'install-plugin',
						'plugin' => $plugin_slug,
					),
					$admin_url
				),
				'install-plugin_' . $plugin_slug
			),
			__( 'install and activate Genesis Connect for WooCommerce', CHILD_TEXT_DOMAIN )
		);

		/* translators: 1: plugin install prompt presented as link, 2: child theme name */
		$notice_html = sprintf( __( 'Please %1$s to <strong>enable WooCommerce support for %2$s</strong>.', CHILD_TEXT_DOMAIN ), $install_link, esc_html( CHILD_THEME_NAME ) );
	}

	echo '<div class="notice notice-info is-dismissible theme-woocommerce-notice"><p>' . wp_kses_post( $notice_html ) . '</p></div>';

}

add_action( 'wp_ajax_dismiss_woocommerce_notice', __NAMESPACE__ . '\dismiss_woocommerce_notice' );
/**
 * Adds option to dismiss Genesis Connect for Woocommerce plugin install prompt.
 *
 * @since 1.0.0
 */
function dismiss_woocommerce_notice() {

	update_user_option( get_current_user_id(), 'woocommerce_message_dismissed', 1 );

}

add_action( 'admin_enqueue_scripts', 'clear_notice_script' );
/**
 * Enqueues script to clear the Genesis Connect for WooCommerce plugin install prompt on dismissal.
 *
 * @since 1.0.0
 */
function clear_notice_script() {

	wp_enqueue_script( 'genesis_sample_notice_script', CHILD_THEME_DIR . '/lib/woocommerce/js/notice-update.js', array( 'jquery' ), '1.0', true );

}

add_action( 'switch_theme', __NAMESPACE__ . '\reset_woo_notice', 10, 2 );
/**
 * Clears the Genesis Connect for WooCommerce plugin install prompt on theme change.
 *
 * @since 1.0.0
 */
function reset_woo_notice() {

	global $wpdb;

	$args  = array(
		'meta_key'   => $wpdb->prefix . 'woocommerce_message_dismissed',
		'meta_value' => 1,
	);
	$users = get_users( $args );

	foreach ( $users as $user ) {
		delete_user_option( $user->ID, 'woocommerce_message_dismissed' );
	}

}

add_action( 'deactivated_plugin', __NAMESPACE__ . '\reset_woo_notice_on_deactivation', 10, 2 );
/**
 * Clears the Genesis Connect for WooCommerce plugin prompt on deactivation.
 *
 * @since 1.0.0
 *
 * @param string $plugin The plugin slug.
 * @param bool   $network_deactivating Whether the plugin is deactivated for all sites in the network. or just the current site.
 */
function reset_woo_notice_on_deactivation( $plugin, $network_deactivating ) {

	// Conditional check to see if we're deactivating WooCommerce or Genesis Connect for WooCommerce.
	if ( 'woocommerce/woocommerce.php' !== $plugin && 'genesis-connect-woocommerce/genesis-connect-woocommerce.php' !== $plugin ) {
		return;
	}

	reset_woo_notice();

}
