<?php
/**
 * Alone back compat functionality
 *
 * Prevents Alone from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package WordPress
 * @subpackage Alone
 * @since Alone 7.0.0
 */

/**
 * Prevent switching to Alone on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Alone 7.0.0
 */
function alone_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'alone_upgrade_notice' );
}
add_action( 'after_switch_theme', 'alone_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Alone on WordPress versions prior to 4.7.
 *
 * @since Alone 7.0.0
 *
 * @global string $wp_version WordPress version.
 */
function alone_upgrade_notice() {
	/* translators: %s: WordPress version. */
	$message = sprintf( __( 'Alone requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'alone' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Alone 7.0.0
 *
 * @global string $wp_version WordPress version.
 */
function alone_customize() {
	wp_die(
		sprintf(
			/* translators: %s: WordPress version. */
			__( 'Alone requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'alone' ),
			$GLOBALS['wp_version']
		),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'alone_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Alone 7.0.0
 *
 * @global string $wp_version WordPress version.
 */
function alone_preview() {
	if ( isset( $_GET['preview'] ) ) {
		/* translators: %s: WordPress version. */
		wp_die( sprintf( __( 'Alone requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'alone' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'alone_preview' );
