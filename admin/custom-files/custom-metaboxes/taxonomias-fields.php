<?php
if (!function_exists('ci_image_register_taxonomy_metabox')){
  add_action('cmb2_init', 'ci_image_register_taxonomy_metabox');
  function ci_image_register_taxonomy_metabox(){
    $taxonomy = new_cmb2_box(array(
      'id' => 'taxonomy_fields',
      'title' => 'Campos taxonomia',
      'object_types' => array('term'),
      'taxonomies' => array('tipos_inmuebles'),
      'show_in_rest' => WP_REST_Server::ALLMETHODS,
    ));
  
    $taxonomy->add_field(array(
      'name' => 'Imagen de término.',
      'id' => 'image',
      'type' => 'file',
      'query_args' => array(
        'type' => 'image/jpeg',
      ),
      'preview_size' => 'large', 
    ));
  }
}