<?php
// Register Custom Taxonomy

/**
 * Esta taxonomia fue generada en 
 * 
 * @link https://generatewp.com/taxonomy/
 * 
 * @since v1.0.0
 */
// Register Custom Taxonomy
if(!function_exists('estado_de_inmueble_taxonomia')){
  function estado_de_inmueble_taxonomia() {
  
    $labels = array(
      'name'                       => _x( 'Estados de inmueble', 'Taxonomy General Name', 'compara_inmuebles_plugin' ),
      'singular_name'              => _x( 'Estado de inmueble', 'Taxonomy Singular Name', 'compara_inmuebles_plugin' ),
      'menu_name'                  => __( 'Estados de inmueble', 'compara_inmuebles_plugin' ),
      'all_items'                  => __( 'Todos los estados de inmueble', 'compara_inmuebles_plugin' ),
      'parent_item'                => __( 'Parent Item', 'compara_inmuebles_plugin' ),
      'parent_item_colon'          => __( 'Parent Item:', 'compara_inmuebles_plugin' ),
      'new_item_name'              => __( 'Nuevo estado de inmueble', 'compara_inmuebles_plugin' ),
      'add_new_item'               => __( 'Agregar estado de inmueble', 'compara_inmuebles_plugin' ),
      'edit_item'                  => __( 'Editar estado de inmueble', 'compara_inmuebles_plugin' ),
      'update_item'                => __( 'Actualizar estado de inmueble', 'compara_inmuebles_plugin' ),
      'view_item'                  => __( 'Ver estado de inmueble', 'compara_inmuebles_plugin' ),
      'separate_items_with_commas' => __( 'Separar objetos con coma', 'compara_inmuebles_plugin' ),
      'add_or_remove_items'        => __( 'Agregar o eliminar estado de inmueble', 'compara_inmuebles_plugin' ),
      'choose_from_most_used'      => __( 'Escoger de los mas usados', 'compara_inmuebles_plugin' ),
      'popular_items'              => __( 'Estados de inmueble populares', 'compara_inmuebles_plugin' ),
      'search_items'               => __( 'Buscar estado de inmueble', 'compara_inmuebles_plugin' ),
      'not_found'                  => __( 'Sin resultados', 'compara_inmuebles_plugin' ),
      'no_terms'                   => __( 'Sin estados de inmueble', 'compara_inmuebles_plugin' ),
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
    register_taxonomy( 'estados_de_inmueble', array( 'inmuebles' ), $args );
  
  }
  add_action( 'init', 'estado_de_inmueble_taxonomia', 0 );
}
