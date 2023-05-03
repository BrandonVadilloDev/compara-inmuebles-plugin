<?php
add_action( 'cmb2_init', 'compara_inmuebles_theme_options_metabox' );
/**
 * Hook in and register a metabox to handle a theme options page and adds a menu item.
 */
function compara_inmuebles_theme_options_metabox() {

	/**
	 * Registers options page menu item and form.
	 */
	$theme_options = new_cmb2_box( array(
		'id'           => 'compara_inmuebles_options_page',
		'title'        => esc_html__( 'Compara inmuebles', 'cmb2' ),
		'object_types' => array( 'options-page' ),
    'show_in_rest' => WP_REST_Server::READABLE,

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
  $theme_options->add_field( array(
    'name'       => 'Dias de cache',
    'desc'       => 'Ingresa el número de dias en el que se refresca la cache',
    'id'         => 'dias_cache',
    'type'       => 'text',
    'attributes' => array(
      'type' => 'number',
      'min' => '0',
    ),
    'default' => '1'
  ) );

	$theme_options->add_field( array(
		'name'    => 'Logo header',
		'id'      => 'logo_header',
		'type'    => 'file',
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Subir imagen' // Change upload button text. Default: "Add or Upload File"
		),
		'preview_size' => 'large', // Image size to use when previewing in the admin.
	) );

	$theme_options->add_field( array(
		'name'    => 'Logo footer',
		'id'      => 'logo_footer',
		'type'    => 'file',
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Subir imagen' // Change upload button text. Default: "Add or Upload File"
		),
		'preview_size' => 'large', // Image size to use when previewing in the admin.
	) );

	$theme_options->add_field( array(
      'name'       => 'Correo electrónico contacto',
      'desc'       => 'Ingresa el correo de contacto',
      'id'         => 'correo_contacto',
      'type'       => 'text_email',
	) );

	$theme_options->add_field( array(
		'name'       => 'Telefono contacto',
		'id'         => 'telefono_contacto',
		'type'       => 'text',
	) );

	$theme_options->add_field( array(
		'name' => 'Direccion',
		'id' => 'location',
		'type' => 'pw_map',
		'default' => array(
			'latitude' => '19.35589605603477',
			'longitude' => '-99.28028434709879'
		)
		// 'split_values' => true, // Save latitude and longitude as two separate fields
	) );

	$theme_options->add_field( array(
		'name' => 'Url Facebook',
		'id'   => 'facebook',
		'type' => 'text_url',
		// 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
	) );

	$theme_options->add_field( array(
		'name' => 'Url Twitter',
		'id'   => 'twitter',
		'type' => 'text_url',
		// 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
	) );

	$theme_options->add_field( array(
		'name' => 'Url Instagram',
		'id'   => 'instagram',
		'type' => 'text_url',
		// 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
	) );

	$theme_options->add_field( array(
		'name' => 'Url TikTok',
		'id'   => 'tiktok',
		'type' => 'text_url',
		// 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
	) );

	$theme_options->add_field( array(
		'name' => 'Url LinkedIn',
		'id'   => 'linkedin',
		'type' => 'text_url',
		// 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
	) );

	$theme_options->add_field( array(
		'name' => 'Url YouTube',
		'id'   => 'youtube',
		'type' => 'text_url',
		// 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
	) );
}