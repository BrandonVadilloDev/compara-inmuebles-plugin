<?php
if (!function_exists('ci_image_register_faq_metabox')){
  add_action('cmb2_init', 'ci_image_register_faq_metabox');
  function ci_image_register_faq_metabox(){
    $metaboxes = new_cmb2_box(array(
      'id' => 'faq_fields',
      'title' => 'Preguntas frecuentes',
      'show_in_rest' => WP_REST_Server::READABLE,
      'object_types' => array( 'page' ), // post type
	    'show_on'      => array( 'key' => 'page-template', 'value' => 'page-faq.php' ),
    ));

    $grupo_preguntas = $metaboxes->add_field( array(
      'id'          => 'grupo_preguntas',
      'type'        => 'group',
      'repeatable'  => true, // use false if you want non-repeatable group
      'options'     => array(
        'group_title'       => 'Pregunta {#}', // since version 1.1.4, {#} gets replaced by row number
        'add_button'        => 'Agregar otra pregunta',
        'remove_button'     => 'Remover pregunta',
        'sortable'          => true,
        // 'closed'         => true, // true to have the groups closed by default
        // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
      ),
    ) );

    $metaboxes->add_group_field( $grupo_preguntas, array(
      'name' => 'Pregunta',
      'id' => 'pregunta',
      'type' => 'text',
    ) );

    $metaboxes->add_group_field( $grupo_preguntas, array(
      'name' => 'Respuesta',
      'id' => 'respuesta',
      'type' => 'textarea_small'
    ) );
  }
}