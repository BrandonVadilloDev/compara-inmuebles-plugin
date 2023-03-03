<?php
/**
 * Función para contar las visitas de un post
 */
function set_post_views($post_id) {
    $count_key = 'post_views_count';
    $count = get_post_meta($post_id, $count_key, true);
     
    if($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}

function register_inmuebles_new_meta() {

  register_rest_field( 'inmuebles', 'post_views_count', array(
    'get_callback' => function ( $data ) {
      return get_post_meta( $data['id'], 'post_views_count', true );
    },
  ));

  register_rest_field( 'inmuebles', 'inmueble_direccion', array(
    'get_callback' => function ( $data ) {
      return get_post_meta( $data['id'], 'inmueble_direccion', true );
    },
  ));

}
add_action( 'rest_api_init', 'register_inmuebles_new_meta' );

function guardar_dir_inmueble($post_id, $post, $update){
  if ('inmuebles' == $post->post_type){
    $url_maps = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".get_post_meta($post_id,'field_location', true)['latitude'].",".get_post_meta(get_the_ID(),'field_location', true)['longitude']."&sensor=false&key=".PW_GOOGLE_API_KEY;
    $json_data = json_decode(@file_get_contents($url_maps));
    $ubicacion = $json_data->results[0]->formatted_address;
    $dir_key = 'inmueble_direccion';
    if ($update){
      update_post_meta($post_id,$dir_key,$ubicacion);
    }
    else{
      add_post_meta($post_id,$dir_key,$ubicacion);
    }
  }
}
add_action( 'save_post', 'guardar_dir_inmueble', 20, 3);

if( ! class_exists( 'get_feature_media_url' ) ) {

  function get_feature_media_url() {

    register_rest_field(
      array('inmuebles'),
      'featured_media_url',
      array(
        'get_callback' => 'ci_get_featured_image',
        'update_callback' => null,
        'schema' => null,
      )
    );
  
  }

}


add_action( 'rest_api_init', 'get_feature_media_url' );

function ci_get_featured_image( $object, $field_name, $request ) {

  if( $object['featured_media'] ) {
    $media = wp_get_attachment_image_src( $object['featured_media'], 'large', false);
    return $media[0];
  }
  return false;

}