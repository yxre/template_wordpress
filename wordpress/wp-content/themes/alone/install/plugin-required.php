<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 */

require_once get_template_directory() . '/install/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'alone_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function alone_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$pathfile = 'https://download.beplusthemes.com/';

  $plugin_includes = array(
    array(
      'name'     => 'Elementor Website Builder',
      'slug'     => 'elementor',
      'required'     => true,
    ),
    array(
      'name'          => 'Elementor Pro',
      'slug'          => 'elementor-pro',
      'source'        => $pathfile . 'elementor-pro.zip',
      'required'      => false,
    ),
    array(
      'name'          => 'Bearsthemes Addons',
      'slug'          => 'bearsthemes-addons',
      'source'        => $pathfile . 'bearsthemes-addons.zip',
      'required'      => true,
    ),
    array(
      'name'          => 'UberMenu 3 - The Ultimate WordPress Mega Menu',
      'slug'          => 'ubermenu',
      'source'        => $pathfile . 'ubermenu.zip',
      'required'      => false,
    ),
    array(
      'name'          => 'Kirki Customizer Framework',
      'slug'          => 'kirki',
      'required'      => true,
    ),
		array(
      'name'          => 'Advanced Custom Fields PRO',
      'slug'          => 'advanced-custom-fields-pro',
      'source'        => $pathfile . 'advanced-custom-fields-pro.zip',
      'required'      => true,
    ),
		array(
      'name'          => 'Advanced Custom Fields: Font Awesome',
      'slug'          => 'advanced-custom-fields-font-awesome',
      'required'      => true,
    ),
    array(
      'name'          => 'GiveWP – Donation Plugin and Fundraising Platform',
      'slug'          => 'give',
      'required'      => true,
    ),
    array(
      'name'          => 'The Events Calendar',
      'slug'          => 'the-events-calendar',
      'required'      => true,
    ),
    array(
      'name'          => 'Sermon\'e - Sermons Management',
      'slug'          => 'sermone',
			'source'        => $pathfile . 'sermone.zip',
      'required'      => true,
    ),
    array(
      'name'          => 'Yoast SEO',
      'slug'          => 'wordpress-seo',
      'required'      => true,
    ),
    array(
      'name'          => 'WooCommerce',
      'slug'          => 'woocommerce',
      'required'      => false,
    ),
    array(
      'name'          => 'Custom Twitter Feeds',
      'slug'          => 'custom-twitter-feeds',
      'required'      => false,
    ),
    array(
      'name'          => 'Smash Balloon Instagram Feed',
      'slug'          => 'instagram-feed',
      'required'      => false,
    ),
    array(
      'name'          => 'Smash Balloon Custom Facebook Feed',
      'slug'          => 'custom-facebook-feed',
      'required'      => false,
    ),

  );

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugin_includes, $config );
}
