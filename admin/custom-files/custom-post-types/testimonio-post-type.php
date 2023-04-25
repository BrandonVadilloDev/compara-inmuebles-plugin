<?php
// Register Custom Post Type
/**
 * Este post type fue generado en 
 * 
 * @link https://generatewp.com/post-type/
 * 
 * @since v1.0.0
 */
// Register Custom Post Type
if (!function_exists('ci_testimonial_post_type')){
  function ci_testimonial_post_type() {
    $labels = array(
      'name'                  => _x( 'Testimonios', 'Post Type General Name', 'compara_inmuebles_plugin' ),
      'singular_name'         => _x( 'Testimonio', 'Post Type Singular Name', 'compara_inmuebles_plugin' ),
      'menu_name'             => __( 'Testimonios', 'compara_inmuebles_plugin' ),
      'name_admin_bar'        => __( 'Testimonios', 'compara_inmuebles_plugin' ),
      'archives'              => __( 'Item Archives', 'compara_inmuebles_plugin' ),
      'attributes'            => __( 'Item Attributes', 'compara_inmuebles_plugin' ),
      'parent_item_colon'     => __( 'Parent Item:', 'compara_inmuebles_plugin' ),
      'all_items'             => __( 'Todos los testimonios', 'compara_inmuebles_plugin' ),
      'add_new_item'          => __( 'Agregar testimonio', 'compara_inmuebles_plugin' ),
      'add_new'               => __( 'Agregar testimonio', 'compara_inmuebles_plugin' ),
      'new_item'              => __( 'Nuevo testimonio', 'compara_inmuebles_plugin' ),
      'edit_item'             => __( 'Editar testimonio', 'compara_inmuebles_plugin' ),
      'update_item'           => __( 'Actualizar testimonio', 'compara_inmuebles_plugin' ),
      'view_item'             => __( 'Ver testimonio', 'compara_inmuebles_plugin' ),
      'view_items'            => __( 'Ver testimonios', 'compara_inmuebles_plugin' ),
      'search_items'          => __( 'Buscar testimonio', 'compara_inmuebles_plugin' ),
      'not_found'             => __( 'Not found', 'compara_inmuebles_plugin' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'compara_inmuebles_plugin' ),
      'featured_image'        => __( 'Imagen destacada', 'compara_inmuebles_plugin' ),
      'set_featured_image'    => __( 'Establecer imagen destacada', 'compara_inmuebles_plugin' ),
      'remove_featured_image' => __( 'Quitar imagen destacada', 'compara_inmuebles_plugin' ),
      'use_featured_image'    => __( 'Usar imagen destacada', 'compara_inmuebles_plugin' ),
      'insert_into_item'      => __( 'Insert into item', 'compara_inmuebles_plugin' ),
      'uploaded_to_this_item' => __( 'Uploaded to this item', 'compara_inmuebles_plugin' ),
      'items_list'            => __( 'Items list', 'compara_inmuebles_plugin' ),
      'items_list_navigation' => __( 'Items list navigation', 'compara_inmuebles_plugin' ),
      'filter_items_list'     => __( 'Filter items list', 'compara_inmuebles_plugin' ),
    );
    $args = array(
      'label'                 => __( 'Testimonio', 'compara_inmuebles_plugin' ),
      'description'           => __( 'Testimoniales del sitio', 'compara_inmuebles_plugin' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'thumbnail' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
      'show_in_rest'          => true,
    );
    register_post_type( 'testimonios', $args );
  
  }
  add_action( 'init', 'ci_testimonial_post_type', 0 );
}