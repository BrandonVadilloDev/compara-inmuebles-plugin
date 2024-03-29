<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://https://github.com/BrandonVadilloDev
 * @since      1.0.0
 *
 * @package    Compara_inmuebles_plugin
 * @subpackage Compara_inmuebles_plugin/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Compara_inmuebles_plugin
 * @subpackage Compara_inmuebles_plugin/includes
 * @author     Brandon Vadillo <brandon.vadillo@devitm.com>
 */
class Compara_inmuebles_plugin {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Compara_inmuebles_plugin_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'COMPARA_INMUEBLES_PLUGIN_VERSION' ) ) {
			$this->version = COMPARA_INMUEBLES_PLUGIN_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'compara_inmuebles_plugin';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Compara_inmuebles_plugin_Loader. Orchestrates the hooks of the plugin.
	 * - Compara_inmuebles_plugin_i18n. Defines internationalization functionality.
	 * - Compara_inmuebles_plugin_Admin. Defines all hooks for the admin area.
	 * - Compara_inmuebles_plugin_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-compara_inmuebles_plugin-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-compara_inmuebles_plugin-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-compara_inmuebles_plugin-admin.php';
		/**
		 * Archivos Custom post types aquí
		 */

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/custom-post-types/inmueble-post-type.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/custom-post-types/testimonio-post-type.php';

		 /**
			* Archivos custom taxonomies aquí
		  */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/custom-taxonomies/tipo-inmueble-taxonomy.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/custom-taxonomies/estado-de-inmueble-taxonomy.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/custom-taxonomies/amenidades-taxonomy.php';
		 /**
			* Archivos cmb2 aquí
		  */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/cmb2_functions.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/custom-metaboxes/inmuebles-fields.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/custom-metaboxes/crear-inmuebles-fields.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/custom-metaboxes/inmuebles-meta-functions.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/custom-metaboxes/crear-inmuebles-functions.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/custom-metaboxes/front-page-fields.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/custom-metaboxes/theme-fields.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/custom-metaboxes/theme-options-functions.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/custom-metaboxes/taxonomias-fields.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/custom-metaboxes/testimonios-fields.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/custom-metaboxes/preguntas-frecuentes-fields.php';
		/**
		 * Widgets
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/widgets/buscador-ci-widget.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/widgets/inmuebles-populares-widget.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/widgets/tipos-inmuebles-populares-widget.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/widgets/amenidades-populares-widget.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/widgets/tipos-inmuebles-filtro-widget.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/widgets/estado-inmuebles-filtro-widget.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/widgets/amenidades-filtro-widget.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-files/widgets/filtro-precio-widget.php';
		/**
		 * 
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-compara_inmuebles_plugin-public.php';

		$this->loader = new Compara_inmuebles_plugin_Loader();

	}


	 

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Compara_inmuebles_plugin_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Compara_inmuebles_plugin_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Compara_inmuebles_plugin_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Compara_inmuebles_plugin_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Compara_inmuebles_plugin_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
