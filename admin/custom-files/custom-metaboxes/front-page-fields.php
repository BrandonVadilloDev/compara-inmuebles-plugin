<?php
/**
 * Estos son los campos personalizados para el custom post type de inmuebles
 * 
 * @link https://github.com/CMB2/CMB2
 * @since v1.0.0
 */

if (!function_exists('register_properties_metaboxes_front_page')){
  add_action( 'cmb2_init', 'register_properties_metaboxes_front_page' );
  /**
   * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
   */
  function register_properties_metaboxes_front_page() {
    $prefix = 'front_page_';
    $id_home = get_option('page_on_front');
    /**
     * Sample metabox to demonstrate each field type included
     */
    
    $property_metabox = new_cmb2_box( array(
      'id'            => $prefix.'metabox',
      'title'         => esc_html__( 'Campos pagina inicio', 'cmb2' ),
      'object_types'  => array( 'page' ), // Post type
      'show_in_rest' => WP_REST_Server::ALLMETHODS, // WP_REST_Server::READABLE|WP_REST_Server::EDITABLE, // Determines which HTTP methods the box is visible in.
      'show_on' => array(
        'id' => array($id_home),
      ),
    ) );
    $group_slider = $property_metabox->add_field( array(
      'id'          => $prefix.'grupo_slider1',
      'type'        => 'group',
      'description' => __( 'Grupo de datos del slide', 'cmb2' ),
      'repeatable'  => true, // use false if you want non-repeatable group
      'options'     => array(
        'group_title'       => __( 'Datos del slide {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        'add_button'        => __( 'Añadir otra slide', 'cmb2' ),
        'remove_button'     => __( 'Remover slide', 'cmb2' ),
        'sortable'          => true,
        'closed'         => true, // true to have the groups closed by default
        // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
      ),
    ) );

    $property_metabox->add_group_field( $group_slider, array(
      'name' => 'Titulo',
      'id'   => 'title',
      'type' => 'text',
      // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );

    $property_metabox->add_group_field( $group_slider, array(
      'name' => 'Texto',
      'description' => 'Texto para slide',
      'id'   => 'description',
      'type' => 'textarea_small',
    ) );

    $property_metabox->add_group_field( $group_slider, array(
      'name' => 'Imagen slide',
      'id'   => 'image',
      'type' => 'file',
    ) );

    $property_metabox->add_group_field( $group_slider, array(
      'name' => 'Texto boton 1',
      'id'   => 'text_btn_1',
      'type' => 'text',
    ) );
    
    $all_pages = get_pages();
    $options_select = array();
    foreach ($all_pages as $page){
      $options_select[get_permalink($page->ID)] = $page->post_title;
    }

    $property_metabox->add_group_field( $group_slider, array(
      'name'             => 'Pagina a redireccionar boton 1',
      'desc'             => 'Select an option',
      'id'               => 'selec_btn_1',
      'type'             => 'select',
      'show_option_none' => true,
      'options'          => $options_select,
    ) );
  }
}