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

if (!function_exists('amenidades_taxonomia')){
	function amenidades_taxonomia() {
	
		$labels = array(
			'name'                       => _x( 'Áreas de amenidades', 'Taxonomy General Name', 'compara_inmuebles_plugin' ),
			'singular_name'              => _x( 'Àrea de amenidad', 'Taxonomy Singular Name', 'compara_inmuebles_plugin' ),
			'menu_name'                  => __( 'Áreas de amenidades', 'compara_inmuebles_plugin' ),
			'all_items'                  => __( 'Todas las áreas de amenidades', 'compara_inmuebles_plugin' ),
			'parent_item'                => __( 'Parent Item', 'compara_inmuebles_plugin' ),
			'parent_item_colon'          => __( 'Parent Item:', 'compara_inmuebles_plugin' ),
			'new_item_name'              => __( 'Nueva área de amenidad', 'compara_inmuebles_plugin' ),
			'add_new_item'               => __( 'Agregar área de amenidad', 'compara_inmuebles_plugin' ),
			'edit_item'                  => __( 'Editar área de amenidad', 'compara_inmuebles_plugin' ),
			'update_item'                => __( 'Actualizar área de amenidad', 'compara_inmuebles_plugin' ),
			'view_item'                  => __( 'Ver área de amenidad', 'compara_inmuebles_plugin' ),
			'separate_items_with_commas' => __( 'Separa las amenidades con comas', 'compara_inmuebles_plugin' ),
			'add_or_remove_items'        => __( 'Agregar o eliminar área de amenidad', 'compara_inmuebles_plugin' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'compara_inmuebles_plugin' ),
			'popular_items'              => __( 'Áreas de amenidades populares', 'compara_inmuebles_plugin' ),
			'search_items'               => __( 'Buscar área de amenidad', 'compara_inmuebles_plugin' ),
			'not_found'                  => __( 'Sin resultados', 'compara_inmuebles_plugin' ),
			'no_terms'                   => __( 'Sin áreas de amenidades', 'compara_inmuebles_plugin' ),
			'items_list'                 => __( 'Items list', 'compara_inmuebles_plugin' ),
			'items_list_navigation'      => __( 'Items list navigation', 'compara_inmuebles_plugin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
		);
		register_taxonomy( 'areas_amenidades', array( 'inmuebles' ), $args );
	
	}
	add_action( 'init', 'amenidades_taxonomia', 0 );
}