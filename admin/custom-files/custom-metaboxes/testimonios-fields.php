<?php
if (!function_exists('ci_image_register_testimonios_metabox')){
  add_action('cmb2_init', 'ci_image_register_testimonios_metabox');
  function ci_image_register_testimonios_metabox(){
    $property_metabox = new_cmb2_box(array(
      'id' => 'testimonio_fields',
      'title' => 'Información testimonio',
      'object_types' => array('testimonios'),
      'show_in_rest' => WP_REST_Server::READABLE, // WP_REST_Server::READABLE|WP_REST_Server::EDITABLE, // Determines which HTTP methods the box is visible in.
    ));

    $property_metabox->add_field( array(
      'name'       => 'Puesto',
      'id'         => 'puesto_testimonio',
      'type'       => 'text',
    ) );
  
    $property_metabox->add_field(array(
      'name' => 'Imagen testimonio',
      'desc' => 'Subir imagen de 200x200',
      'id' => 'imagen',
      'type' => 'file',
      'query_args' => array(
        'type' => 'image/jpeg',
      ),
      'preview_size' => 'post-thumbnail'
    ));
  }
}