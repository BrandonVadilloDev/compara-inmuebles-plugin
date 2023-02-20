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
    ) );

    /*$property_metabox->add_field( array(
      'name'           => 'Tipo de inmueble',
      'desc'           => 'Escoger el tipo de inmueble',
      'id'             => 'select_tipo_inmueble',
      'taxonomy'       => 'tipos_inmuebles', //Enter Taxonomy Slug
      'type'           => 'taxonomy_select',
      'remove_default' => 'true', // Removes the default metabox provided by WP core.
      // Optionally override the args sent to the WordPress get_terms function.
      'query_args' => array(
        // 'orderby' => 'slug',
        // 'hide_empty' => true,
      ),
    ) );*/
  
    $property_metabox->add_field( array(
      'name'       => esc_html__( 'Precio', 'cmb2' ),
      'desc'       => esc_html__( 'Ingresa el precio del inmueble', 'cmb2' ),
      'id'         => 'field_precio',
      'type'       => 'text_money',
      'show_in_rest' => WP_REST_Server::READABLE,// WP_REST_Server::ALLMETHODS|WP_REST_Server::READABLE, // Determines which HTTP methods the field is visible in. Will override the cmb2_box 'show_in_rest' param.
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
    ) );

    $property_metabox->add_field( array(
      'name'       => esc_html__( 'Número de cuartos', 'cmb2' ),
      'desc'       => esc_html__( 'Ingresa el número de cuartos', 'cmb2' ),
      'id'         => 'field_numero_cuartos',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number'
      ),
      'show_in_rest' => WP_REST_Server::READABLE,// WP_REST_Server::ALLMETHODS|WP_REST_Server::READABLE, // Determines which HTTP methods the field is visible in. Will override the cmb2_box 'show_in_rest' param.
    ) );

    $property_metabox->add_field( array(
      'name'       => esc_html__( 'Número de baños', 'cmb2' ),
      'desc'       => esc_html__( 'Ingresa el número de baños', 'cmb2' ),
      'id'         => 'field_numero_banos',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number'
      ),
      'show_in_rest' => WP_REST_Server::READABLE,// WP_REST_Server::ALLMETHODS|WP_REST_Server::READABLE, // Determines which HTTP methods the field is visible in. Will override the cmb2_box 'show_in_rest' param.
    ) );

    $property_metabox->add_field( array(
      'name'       => esc_html__( 'Número de medios baños', 'cmb2' ),
      'desc'       => esc_html__( 'Ingresa el número de medios baños', 'cmb2' ),
      'id'         => 'field_numero_medios_banos',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number'
      ),
      'show_in_rest' => WP_REST_Server::READABLE,// WP_REST_Server::ALLMETHODS|WP_REST_Server::READABLE, // Determines which HTTP methods the field is visible in. Will override the cmb2_box 'show_in_rest' param.
    ) );

    $property_metabox->add_field( array(
      'name'       => esc_html__( 'Cajones de estacionamiento', 'cmb2' ),
      'desc'       => esc_html__( 'Ingresa el número de cajones de estacionamiento', 'cmb2' ),
      'id'         => 'field_cajones_estacionamiento',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number'
      ),
      'show_in_rest' => WP_REST_Server::READABLE,// WP_REST_Server::ALLMETHODS|WP_REST_Server::READABLE, // Determines which HTTP methods the field is visible in. Will override the cmb2_box 'show_in_rest' param.
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