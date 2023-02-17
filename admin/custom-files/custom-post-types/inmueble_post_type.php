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
			 'name'                  => _x( 'Inmuebles', 'Post Type General Name', 'text_domain' ),
			 'singular_name'         => _x( 'Inmueble', 'Post Type Singular Name', 'text_domain' ),
			 'menu_name'             => __( 'Inmuebles', 'text_domain' ),
			 'name_admin_bar'        => __( 'Inmuebles', 'text_domain' ),
			 'archives'              => __( 'Item Archives', 'text_domain' ),
			 'attributes'            => __( 'Item Attributes', 'text_domain' ),
			 'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			 'all_items'             => __( 'Todos los inmuebles', 'text_domain' ),
			 'add_new_item'          => __( 'Agregar nuevo inmueble', 'text_domain' ),
			 'add_new'               => __( 'Agregar inmueble', 'text_domain' ),
			 'new_item'              => __( 'Nuevo inmueble', 'text_domain' ),
			 'edit_item'             => __( 'Editar inmueble', 'text_domain' ),
			 'update_item'           => __( 'Actualizar inmueble', 'text_domain' ),
			 'view_item'             => __( 'Ver inmueble', 'text_domain' ),
			 'view_items'            => __( 'Ver inmuebles', 'text_domain' ),
			 'search_items'          => __( 'Buscar inmueble', 'text_domain' ),
			 'not_found'             => __( 'Not found', 'text_domain' ),
			 'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			 'featured_image'        => __( 'Imagen destacada', 'text_domain' ),
			 'set_featured_image'    => __( 'Poner imagen destacada', 'text_domain' ),
			 'remove_featured_image' => __( 'Eliminar imagen destacada', 'text_domain' ),
			 'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
			 'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			 'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			 'items_list'            => __( 'Items list', 'text_domain' ),
			 'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			 'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		 );
		 $args = array(
			 'label'                 => __( 'Inmueble', 'text_domain' ),
			 'description'           => __( 'Post type de los inmuebles', 'text_domain' ),
			 'labels'                => $labels,
			 'supports'              => array( 'title', 'editor', 'thumbnail'),
			 'taxonomies'            => array( 'category', 'post_tag' ),
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
		 register_post_type( 'inmuebles', $args );
	 
	 }
	 add_action( 'init', 'inmueble_post_type', 0 );
 }