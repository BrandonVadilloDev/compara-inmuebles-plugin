<?php
// Register Custom Taxonomy

/**
 * Esta taxonomia fue generada en 
 * 
 * @link https://generatewp.com/taxonomy/
 * 
 * @since v1.0.0
 */

if (!function_exists('tipo_inmueble_taxonomia')){
  function tipo_inmueble_taxonomia() {
  
    $labels = array(
      'name'                       => _x( 'Tipo de inmuebles', 'Taxonomy General Name', 'compara_inmuebles_plugin' ),
      'singular_name'              => _x( 'Tipo de inmueble', 'Taxonomy Singular Name', 'compara_inmuebles_plugin' ),
      'menu_name'                  => __( 'Tipo de inmueble', 'compara_inmuebles_plugin' ),
      'all_items'                  => __( 'Todos los tipos de inmuebles', 'compara_inmuebles_plugin' ),
      'parent_item'                => __( 'Parent Item', 'compara_inmuebles_plugin' ),
      'parent_item_colon'          => __( 'Parent Item:', 'compara_inmuebles_plugin' ),
      'new_item_name'              => __( 'Nuevo tipo de inmueble', 'compara_inmuebles_plugin' ),
      'add_new_item'               => __( 'Agregar tipo de inmueble', 'compara_inmuebles_plugin' ),
      'edit_item'                  => __( 'Editar tipo de inmueble', 'compara_inmuebles_plugin' ),
      'update_item'                => __( 'Actualizar tipo de inmueble', 'compara_inmuebles_plugin' ),
      'view_item'                  => __( 'Ver tipo de inmueble', 'compara_inmuebles_plugin' ),
      'separate_items_with_commas' => __( 'Separar objetos con comas', 'compara_inmuebles_plugin' ),
      'add_or_remove_items'        => __( 'Agregar o eliminar tipo de inmueble', 'compara_inmuebles_plugin' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'compara_inmuebles_plugin' ),
      'popular_items'              => __( 'Tipos de inmuebles populares', 'compara_inmuebles_plugin' ),
      'search_items'               => __( 'Buscar tipo de inmueble', 'compara_inmuebles_plugin' ),
      'not_found'                  => __( 'No encontrado', 'compara_inmuebles_plugin' ),
      'no_terms'                   => __( 'Sin tipos de inmuebles', 'compara_inmuebles_plugin' ),
      'items_list'                 => __( 'Items list', 'compara_inmuebles_plugin' ),
      'items_list_navigation'      => __( 'Items list navigation', 'compara_inmuebles_plugin' ),
    );
    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
      'show_in_rest'               => true,
    );
    register_taxonomy( 'tipos_inmuebles', array( 'inmuebles' ), $args );
  
  }
  add_action( 'init', 'tipo_inmueble_taxonomia', 0 );
}