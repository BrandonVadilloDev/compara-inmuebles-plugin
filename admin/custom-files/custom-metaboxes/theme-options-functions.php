<?php
function ci_guardar_ubicacion_theme_options( $cmb_id ) {
  if ( 'compara_inmuebles_theme_options' === $cmb_id ) {
    $location = cmb2_get_option($cmb_id,'location');

    if( ! empty( $location ) ) {

      $url_maps = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$location['latitude'].",".$location['longitude']."&sensor=false&key=".PW_GOOGLE_API_KEY;
      $json_data = json_decode( @file_get_contents( $url_maps ) );

      //geocode
      $geocode = $json_data;

      //formatted_address
      $formatted_address = $json_data->results[0]->formatted_address;

      //address_components
      $address_components = $json_data->results[0]->address_components;

      //Short name
      $short_address =  $address_components[0]->short_name . ', ' .  $address_components[1]->short_name .', '. $address_components[4]->short_name;

      //locality
      $locality = $address_components[3]->long_name;

      //administrative_area_level_1
      $administrative_area_level_1 = $address_components[4]->long_name;

      //country
      $country = $address_components[5]->long_name;

      //zipcode
      $zipcode = $address_components[6]->long_name;

      cmb2_update_option($cmb_id, 'direccion', $formatted_address );
      cmb2_update_option($cmb_id, 'short_address', $short_address );
      cmb2_update_option($cmb_id, 'locality', $locality );
      cmb2_update_option($cmb_id, 'administrative_area_level_1', $administrative_area_level_1 );
      cmb2_update_option($cmb_id, 'country', $country );
      cmb2_update_option($cmb_id, 'zipcode', $zipcode );
    }
  }
}
add_action( 'cmb2_save_options-page_fields', 'ci_guardar_ubicacion_theme_options' );
