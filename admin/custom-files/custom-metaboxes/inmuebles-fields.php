<?php
/**
 * Estos son los campos personalizados para el custom post type de inmuebles
 * 
 * @link https://github.com/CMB2/CMB2
 * @since v1.0.0
 */

if (!function_exists('register_properties_metaboxes')){
  add_action( 'cmb2_init', 'register_properties_metaboxes' );
  /**
   * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
   */
  function register_properties_metaboxes() {
    /**
     * Sample metabox to demonstrate each field type included
     */
    $property_metabox = new_cmb2_box( array(
      'id'            => 'properties_metabox',
      'title'         => esc_html__( 'Inmuebes_metabox', 'cmb2' ),
      'object_types'  => array( 'inmuebles' ), // Post type
      'show_in_rest' => WP_REST_Server::ALLMETHODS, // WP_REST_Server::READABLE|WP_REST_Server::EDITABLE, // Determines which HTTP methods the box is visible in.
      // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
      // 'context'    => 'normal',
      // 'priority'   => 'high',
      // 'show_names' => true, // Show field names on the left
      // 'cmb_styles' => false, // false to disable the CMB stylesheet
      // 'closed'     => true, // true to keep the metabox closed by default
      // 'classes'    => 'extra-class', // Extra cmb2-wrap classes
      // 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
  
      /*
       * The following parameter is any additional arguments passed as $callback_args
       * to add_meta_box, if/when applicable.
       *
       * CMB2 does not use these arguments in the add_meta_box callback, however, these args
       * are parsed for certain special properties, like determining Gutenberg/block-editor
       * compatibility.
       *
       * Examples:
       *
       * - Make sure default editor is used as metabox is not compatible with block editor
       *      [ '__block_editor_compatible_meta_box' => false/true ]
       *
       * - Or declare this box exists for backwards compatibility
       *      [ '__back_compat_meta_box' => false ]
       *
       * More: https://wordpress.org/gutenberg/handbook/extensibility/meta-box/
       */
      // 'mb_callback_args' => array( '__block_editor_compatible_meta_box' => false ),
    ) );
  
    $property_metabox->add_field( array(
      'name'       => esc_html__( 'Tamaño de terreno', 'cmb2' ),
      'desc'       => esc_html__( 'Ingresa el tamaño del inmueble en metros cuadrados', 'cmb2' ),
      'id'         => 'field_tamano_terreno',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number'
      ),
      'show_in_rest' => WP_REST_Server::READABLE,// WP_REST_Server::ALLMETHODS|WP_REST_Server::READABLE, // Determines which HTTP methods the field is visible in. Will override the cmb2_box 'show_in_rest' param.
      //'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
      // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
      // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
      // 'on_front'        => false, // Optionally designate a field to wp-admin only
      // 'repeatable'      => true,
      // 'column'          => true, // Display field value in the admin post-listing columns
    ) );
  
    $property_metabox->add_field( array(
      'name'       => esc_html__( 'Tamaño de construccion', 'cmb2' ),
      'desc'       => esc_html__( 'Ingresa el tamaño de la construcción del inmueble en metros cuadrados', 'cmb2' ),
      'id'         => 'field_tamano_construccion',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number'
      ),
      'show_in_rest' => WP_REST_Server::READABLE,// WP_REST_Server::ALLMETHODS|WP_REST_Server::READABLE, // Determines which HTTP methods the field is visible in. Will override the cmb2_box 'show_in_rest' param.
      //'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
      // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
      // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
      // 'on_front'        => false, // Optionally designate a field to wp-admin only
      // 'repeatable'      => true,
      // 'column'          => true, // Display field value in the admin post-listing columns
    ) );

    $property_metabox->add_field( array(
      'name'         => esc_html__( 'Galeria de imagenes', 'cmb2' ),
      'desc'         => esc_html__( 'Sube una o mas fotos del inmueble', 'cmb2' ),
      'id'           => 'field_galeria_imagenes',
      'type'         => 'file_list',
      'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
      'query_args' => array(
        'type' => 'image',
      ),
      'text' => array(
        'add_upload_files_text' => 'Agregar imagenes'
      ),
      'show_in_rest' => WP_REST_Server::READABLE,// WP_REST_Server::ALLMETHODS|WP_REST_Server::READABLE, // Determines which HTTP methods the field is visible in. Will override the cmb2_box 'show_in_rest' param.
    ) );
    
  
  }
}