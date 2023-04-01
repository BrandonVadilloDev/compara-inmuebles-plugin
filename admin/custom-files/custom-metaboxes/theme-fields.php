<?php
add_action( 'cmb2_init', 'compara_inmuebles_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function compara_inmuebles_theme_options_metabox() {

	/**
	 * Registers options page menu item and form.
	 */
	$cmb_options = new_cmb2_box( array(
		'id'           => 'compara_inmuebles_options_page',
		'title'        => esc_html__( 'Compara inmuebles', 'cmb2' ),
		'object_types' => array( 'options-page' ),
    'show_in_rest' => WP_REST_Server::ALLMETHODS,

		/*
		 * The following parameters are specific to the options-page box
		 * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
		 */

		'option_key'      => 'compara_inmuebles_theme_options', // The option key and admin menu page slug.
		'icon_url'        => 'dashicons-palmtree', // Menu icon. Only applicable if 'parent_slug' is left empty.
		// 'menu_title'              => esc_html__( 'Options', 'cmb2' ), // Falls back to 'title' (above).
		// 'parent_slug'             => 'themes.php', // Make options page a submenu item of the themes menu.
		// 'capability'              => 'manage_options', // Cap required to view options-page.
		// 'position'                => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
		// 'admin_menu_hook'         => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
		// 'priority'                => 10, // Define the page-registration admin menu hook priority.
		// 'display_cb'              => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
		// 'save_button'             => esc_html__( 'Save Theme Options', 'cmb2' ), // The text for the options-page save button. Defaults to 'Save'.
		// 'disable_settings_errors' => true, // On settings pages (not options-general.php sub-pages), allows disabling.
		// 'message_cb'              => 'yourprefix_options_page_message_callback',
		// 'tab_group'               => '', // Tab-group identifier, enables options page tab navigation.
		// 'tab_title'               => null, // Falls back to 'title' (above).
		// 'autoload'                => false, // Defaults to true, the options-page option will be autloaded.
	) );

	/**
	 * Options fields ids only need
	 * to be unique within this box.
	 * Prefix is not needed.
	 */
  $cmb_options->add_field( array(
    'name'       => esc_html__( 'Dias de cache', 'cmb2' ),
    'desc'       => esc_html__( 'Ingresa el número de dias en el que se refresca la cache', 'cmb2' ),
    'id'         => 'dias_cache',
    'type'       => 'text',
    'attributes' => array(
      'type' => 'number',
      'min' => '0',
    ),
    'default' => '1'
  ) );
}