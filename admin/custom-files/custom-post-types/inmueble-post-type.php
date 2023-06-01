<?php
// Register Custom Post Type
/**
 * Este post type fue generado en 
 * 
 * @link https://generatewp.com/post-type/
 * 
 * @since v1.0.0
 */

 if (!function_exists('inmueble_post_type')){
	 function inmueble_post_type() {
	 
		 $labels = array(
			 'name'                  => _x( 'Inmuebles', 'Post Type General Name', 'compara_inmuebles_plugin' ),
			 'singular_name'         => _x( 'Inmueble', 'Post Type Singular Name', 'compara_inmuebles_plugin' ),
			 'menu_name'             => __( 'Inmuebles', 'compara_inmuebles_plugin' ),
			 'name_admin_bar'        => __( 'Inmuebles', 'compara_inmuebles_plugin' ),
			 'archives'              => __( 'Item Archives', 'compara_inmuebles_plugin' ),
			 'attributes'            => __( 'Item Attributes', 'compara_inmuebles_plugin' ),
			 'parent_item_colon'     => __( 'Parent Item:', 'compara_inmuebles_plugin' ),
			 'all_items'             => __( 'Todos los inmuebles', 'compara_inmuebles_plugin' ),
			 'add_new_item'          => __( 'Agregar nuevo inmueble', 'compara_inmuebles_plugin' ),
			 'add_new'               => __( 'Agregar inmueble', 'compara_inmuebles_plugin' ),
			 'new_item'              => __( 'Nuevo inmueble', 'compara_inmuebles_plugin' ),
			 'edit_item'             => __( 'Editar inmueble', 'compara_inmuebles_plugin' ),
			 'update_item'           => __( 'Actualizar inmueble', 'compara_inmuebles_plugin' ),
			 'view_item'             => __( 'Ver inmueble', 'compara_inmuebles_plugin' ),
			 'view_items'            => __( 'Ver inmuebles', 'compara_inmuebles_plugin' ),
			 'search_items'          => __( 'Buscar inmueble', 'compara_inmuebles_plugin' ),
			 'not_found'             => __( 'Not found', 'compara_inmuebles_plugin' ),
			 'not_found_in_trash'    => __( 'Not found in Trash', 'compara_inmuebles_plugin' ),
			 'featured_image'        => __( 'Imagen destacada', 'compara_inmuebles_plugin' ),
			 'set_featured_image'    => __( 'Poner imagen destacada', 'compara_inmuebles_plugin' ),
			 'remove_featured_image' => __( 'Eliminar imagen destacada', 'compara_inmuebles_plugin' ),
			 'use_featured_image'    => __( 'Usar como imagen destacada', 'compara_inmuebles_plugin' ),
			 'insert_into_item'      => __( 'Insert into item', 'compara_inmuebles_plugin' ),
			 'uploaded_to_this_item' => __( 'Uploaded to this item', 'compara_inmuebles_plugin' ),
			 'items_list'            => __( 'Items list', 'compara_inmuebles_plugin' ),
			 'items_list_navigation' => __( 'Items list navigation', 'compara_inmuebles_plugin' ),
			 'filter_items_list'     => __( 'Filter items list', 'compara_inmuebles_plugin' ),
		 );
		 $args = array(
			 'label'                 => __( 'Inmueble', 'compara_inmuebles_plugin' ),
			 'description'           => __( 'Post type de los inmuebles', 'compara_inmuebles_plugin' ),
			 'labels'                => $labels,
			 'supports'              => array( 'title', 'editor', 'thumbnail'),
			 'taxonomies'            => array( /*'category', 'post_tag'*/ ),
			 'hierarchical'          => false,
			 'public'                => true,
			 'paged' 								 => true,
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
		 register_post_type( 'inmuebles', $args );
	 
	 }
	 add_action( 'init', 'inmueble_post_type', 0 );
 }