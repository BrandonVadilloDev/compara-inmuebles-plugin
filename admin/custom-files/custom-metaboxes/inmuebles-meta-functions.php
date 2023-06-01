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

  register_rest_field( 'inmuebles', 'administrative_area_level_1', array(
    'get_callback' => function ( $data ) {
      return get_post_meta( $data['id'], 'administrative_area_level_1', true );
    },
  ));

  register_rest_field( 'inmuebles', 'locality', array(
    'get_callback' => function ( $data ) {
      return get_post_meta( $data['id'], 'locality', true );
    },
  ));

  register_rest_field('inmuebles', 'tipos_de_inmuebles_nombre', array(
    'get_callback' => 'ci_get_tipos_inmuebles_names'
  ));

  register_rest_field('inmuebles', 'estados_de_inmueble_nombre', array(
    'get_callback' => 'ci_get_estados_de_inmueble_names'
  ));

  register_rest_field('inmuebles', 'areas_amenidades_nombre', array(
    'get_callback' => 'ci_get_areas_amenidades_names'
  ));

}
add_action( 'rest_api_init', 'register_inmuebles_new_meta' );

if ( ! function_exists( 'guardar_dir_inmueble' ) ) {

  function guardar_dir_inmueble($post_id, $post, $update) {

    if ('inmuebles' == $post->post_type){
  
      $field_location = get_post_meta($post_id,'field_location', true);
  
      if( ! empty( $field_location ) ) {
  
        $url_maps = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$field_location['latitude'].",".$field_location['longitude']."&sensor=false&key=".PW_GOOGLE_API_KEY;
        $json_data = json_decode( @file_get_contents( $url_maps ) );
        //geocode
        $geocode = $json_data;
        $meta_geocode = 'geocode';
        //formatted_address
        $formatted_address = $json_data->results[0]->formatted_address;
        $meta_formatted_address = 'inmueble_direccion';
        //address_components
        $address_components = $json_data->results[0]->address_components;
        //locality
        $locality = $address_components[3]->long_name;
        $meta_locality = 'locality';
        //administrative_area_level_1
        $administrative_area_level_1 = $address_components[4]->long_name;
        $meta_administrative_area_level_1 = 'administrative_area_level_1';
        //country
        $country = $address_components[5]->long_name;
        $meta_country = 'country';
        //zipcode
        $zipcode = $address_components[6]->long_name;
        $meta_zipcode = 'zipcode';
        if ( $update ) {
          update_post_meta( $post_id, $meta_formatted_address, $formatted_address );
          update_post_meta( $post_id, $meta_locality, $locality );
          update_post_meta( $post_id, $meta_administrative_area_level_1, $administrative_area_level_1 );
          update_post_meta( $post_id, $meta_country, $country );
          update_post_meta( $post_id, $meta_zipcode, $zipcode );
        }
        else {
          add_post_meta( $post_id, $meta_formatted_address, $formatted_address );
          add_post_meta( $post_id, $meta_locality, $locality );
          add_post_meta( $post_id, $meta_administrative_area_level_1, $administrative_area_level_1 );
          add_post_meta( $post_id, $meta_country, $country );
          add_post_meta( $post_id, $meta_zipcode, $zipcode );
        }
  
      }
      
    }
    
  }
  add_action( 'save_post', 'guardar_dir_inmueble', 20, 3);

}

if( ! function_exists( 'get_feature_media_url' ) ) {

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

function ci_get_tipos_inmuebles_names($object, $field_name, $request){
  if ($object['tipos_inmuebles']){
    $names = array();
    foreach ($object['tipos_inmuebles'] as $id_term){
      $names[] = get_term($id_term)->name;
    }
    return $names;
  }
  return false;
}

function ci_get_estados_de_inmueble_names($object, $field_name, $request){
  if ($object['estados_de_inmueble']){
    $names = array();
    foreach ($object['estados_de_inmueble'] as $id_term){
      $names[] = get_term($id_term)->name;
    }
    return $names;
  }
  return false;
}

function ci_get_areas_amenidades_names($object, $field_name, $request){
  if ($object['areas_amenidades']){
    $names = array();
    foreach ($object['areas_amenidades'] as $id_term){
      $names[] = get_term($id_term)->name;
    }
    return $names;
  }
  return false;
}