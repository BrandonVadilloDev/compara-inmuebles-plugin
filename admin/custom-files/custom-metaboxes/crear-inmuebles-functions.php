<?php
  function ci_formulario_instancia(){
    $metabox_id = 'ci_agregar_inmueble';
    $object_id = 'fake-object-id';
    return cmb2_get_metabox($metabox_id, $object_id);
  }
  function ci_formulario_agregar_inmueble_shortcode(){
    $cmb = ci_formulario_instancia();
    $output = '';

    if (($error = $cmb->prop('submission_error')) && is_wp_error( $error )){
      $output.= '<h3>'. sprintf(__('Hubo un error: %s'),'<strong>' . $error->get_error_message().'</strong>').'</h3>';
    }

    if (isset($_GET['post_submitted']) && ($post = get_post(absint($_GET['post_submitted'])))){
      $output.= '<h3>Gracias por publicar tu inmueble</h3>';
    }
    $output.=cmb2_get_metabox_form($cmb, 'fake-object-id', array('save_button' => 'Guardar inmueble'));
    return $output;
  }
  add_shortcode( 'ci_agregar_inmueble_shortcode', 'ci_formulario_agregar_inmueble_shortcode' );

  function ci_publicar_inmueble(){
    if(empty($_POST) || !isset($_POST['submit-cmb'], $_POST['object_id'])){
      return false;
    }

    $cmb = ci_formulario_instancia();

    $post_data = array();

    if (!isset($_POST[$cmb->nonce()]) || !wp_verify_nonce($_POST[$cmb->nonce()],$cmb->nonce())){
      return $cmb->prop('submission_error', new WP_Error('security_fail','Fallo en la seguridad.'));
    }
    #region Validar descripción del inmueble
    if (empty($_POST['titulo_inmueble'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'Se requiere un titulo para publicar el inmueble.'));
    }

    if (empty($_POST['desc_inmueble'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'Se requiere una descripción para publicar el inmueble.'));
    }

    if (empty($_POST['ano_construccion'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'Se requiere el año de construcción para publicar el inmueble.'));
    }
    else{
      if(!preg_match('/^([1-9]\d{3})$/',$_POST['ano_construccion'])){
        return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'El año de construcción introducido no es válido, tiene que ser de 4 digitos.'));
      }
    }

    if (empty($_POST['estado_inmueble'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'Se requiere seleccionar la categoria del estado de inmueble para publicar el inmueble.'));
    }

    if (empty($_POST['tipo_inmueble'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'Se requiere seleccionar la categoria del tipo de inmueble para publicar el inmueble.'));
    }

    #endregion

    #region validar Datos de contacto
    if (empty($_POST['correo_contacto'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'Se requiere un correo de contacto para publicar el inmueble.'));
    }
    else{
      if(!preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/",$_POST['correo_contacto'])){
        return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'El correo de contacto introducido no es válido.'));
      }
    }

    if (empty($_POST['tipo_propietario'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'Se requiere seleccionar un tipo de propiertario para publicar el inmueble.'));
    }

    if (empty($_POST['whatsapp'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'Se requiere un número de Whatsapp para publicar el inmueble.'));
    }
    else{
      if(!preg_match("/^[1-9]\d{1,14}$/",$_POST['whatsapp'])){
        return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'El WhatsApp introducido no es válido, tiene que ser un numero de 1 a 14 dígitos.')); 
      }
    }
    #endregion 

    #region validar detalles de inmueble
    if (empty($_POST['field_precio'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'Se requiere un precio para publicar el inmueble.'));
    }
    else{
      if(!preg_match("/^[0-9]+$/", $_POST['field_precio'])){
        return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'El precio introducido no es válido, tiene que ser un valor númerico.')); 
      }
    }

    if (empty($_POST['field_tamano_terreno'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'Se requiere un tamaño de terreno para publicar el inmueble.'));
    }
    else{
      if(!preg_match("/^[0-9]+$/", $_POST['field_tamano_terreno'])){
        return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'El tamaño de terreno introducido no es válido, tiene que ser un valor númerico.')); 
      }
    }

    if (empty($_POST['field_tamano_construccion'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'Se requiere un tamaño de construcción para publicar el inmueble.'));
    }
    else{
      if(!preg_match("/^[0-9]+$/", $_POST['field_tamano_construccion'])){
        return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'El tamaño de construcción introducido no es válido, tiene que ser un valor númerico.')); 
      }
    }

    if (!empty($_POST['field_numero_cuartos']) && !preg_match("/^[0-9]+$/", $_POST['field_numero_cuartos'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'El número de cuartos introducido no es válido, tiene que ser un valor númerico.')); 
    }

    if (!empty($_POST['field_numero_recamaras']) && !preg_match("/^[0-9]+$/", $_POST['field_numero_recamaras'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'El número de recamaras introducido no es válido, tiene que ser un valor númerico.')); 
    }

    if (!empty($_POST['field_numero_banos']) && !preg_match("/^[0-9]+$/", $_POST['field_numero_banos'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'El número de baños introducido no es válido, tiene que ser un valor númerico.')); 
    }

    if (!empty($_POST['field_numero_medios_banos']) && !preg_match("/^[0-9]+$/", $_POST['field_numero_medios_banos'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'El número de medios baños introducido no es válido, tiene que ser un valor númerico.')); 
    }

    if (!empty($_POST['field_cajones_estacionamiento']) && !preg_match("/^[0-9]+$/", $_POST['field_cajones_estacionamiento'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'El número de cajones de estacionamiento introducido no es válido, tiene que ser un valor númerico.')); 
    }
    #endregion

    #region Validar media del inmueble
    if (empty($_FILES['imagen_destacada'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'Se requiere una imagen destacada para publicar el inmueble.'));
    }

    if (!empty($_POST['field_video']) && !preg_match("/^https?:\/\/(?:www\.)?youtube\.com\/watch\?v=([\w\-]{11})(?:\S+)?$/",$_POST['field_video'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'El link introducido no es un link de YouTube válido.')); 
    }
    #endregion

    #region Validar ubicacion
    if (empty($_POST['location_inmueble'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'Se requiere la ubicación para publicar el inmueble.'));
    }
    #endregion
    $valores_sanitizados = $cmb->get_sanitized_values($_POST);

    //Agregar titulo a post data
    $post_data['post_title'] = $valores_sanitizados['titulo_inmueble'];
    $post_data['post_type'] = 'inmuebles';

    //contenido
    $post_data['post_content'] = $valores_sanitizados['desc_inmueble'];
    
    //Taxonomias
    $post_data['tax_inputs'] =array(
      'tipos_inmuebles' => $valores_sanitizados['tipo_inmueble'],
      'estados_de_inmueble' => $valores_sanitizados['estado_inmueble'],
      'areas_amenidades' => $valores_sanitizados['amenidades_inmueble'],
    );
    var_dump($amenidades);

    //Metaboxes
    $post_data['meta_input'] = array(
      'field_correo_contacto' => $valores_sanitizados['correo_contacto'],
      'field_tipo_propietario' => $valores_sanitizados['tipo_propietario'],
      'field_telefono_contacto' => $valores_sanitizados['telefono_contacto'],
      'field_whatsapp' => $valores_sanitizados['whatsapp'],
      'field_precio' => $valores_sanitizados['field_precio'],
      'field_tamano_terreno' => $valores_sanitizados['field_tamano_terreno'],
      'field_tamano_construccion' => $valores_sanitizados['field_tamano_construccion'],
      'field_ano_construccion' => $valores_sanitizados['ano_construccion'],
      'field_numero_cuartos' => $valores_sanitizados['field_numero_cuartos'],
      'field_numero_recamaras' => $valores_sanitizados['field_numero_recamaras'],
      'field_numero_banos' => $valores_sanitizados['field_numero_banos'],
      'field_numero_medios_banos' => $valores_sanitizados['field_numero_medios_banos'],
      'field_cajones_estacionamiento' => $valores_sanitizados['field_cajones_estacionamiento'],
      'grupo_facts_features' => $valores_sanitizados['grupo_facts_features'],
      'field_location' => $valores_sanitizados['location_inmueble'],
      'grupo_planos' => $valores_sanitizados['grupo_planos'],
    );
    //Agregar video si hay
    if(!empty($valores_sanitizados['field_video'])){
      $post_data['meta_input']['field_video'] = $valores_sanitizados['field_video'];
    }

    //Insertar post
    $nuevo_inmueble = wp_insert_post( $post_data, true);

    if(is_wp_error( $nuevo_inmueble )){
      return $cmb->prop('submission_error',$nuevo_inmueble);
    }

    //Guardar cambios de CMB
    $cmb->save_fields($nuevo_inmueble, 'post', $valores_sanitizados);

    //Intenta agregar una imagen destacada
    $img_id = ci_enviar_imagen_destacada($nuevo_inmueble, $post_data);
    //Sube la imagen si no hay error
    if($img_id && !is_wp_error( $img_id )){
      set_post_thumbnail($nuevo_inmueble, $img_id); 
    }

    $galeria = ci_subir_array_imagenes($nuevo_inmueble, 'field_galeria_imagenes');
    if($galeria){
      update_post_meta($nuevo_inmueble, 'field_galeria_imagenes', $galeria);
    }

    $imagenes_slider = ci_subir_array_imagenes($nuevo_inmueble, 'field_imagenes_slider');
    if($imagenes_slider){
      update_post_meta($nuevo_inmueble, 'field_imagenes_slider', $imagenes_slider);
    }
    
    $imagenes_planos = ci_subir_array_imagenes($nuevo_inmueble, 'grupo_planos', true, 'image');
    if($imagenes_planos){
      $planos_con_imagenes = array();
      $i_planos = 0;
      foreach ($imagenes_planos as $id_img=>$img_url){
        $plano = $valores_sanitizados['grupo_planos'][$i_planos];
        $plano['image'] = $img_url;
        $plano['image_id'] = $id_img;
        $planos_con_imagenes[] = $plano;
        $i_planos++;
      }
      update_post_meta($nuevo_inmueble,'grupo_planos',$planos_con_imagenes);
    }

    //Nuevas amenidades
    $nuevas_amenidades = explode(',',$valores_sanitizados['agregar_amenidades']);
    $amenidades_agregadas = ci_agregar_nuevos_terminos($nuevas_amenidades,'areas_amenidades');
    if($amenidades_agregadas){
      $terms_id = array();
      foreach($amenidades_agregadas as $amenidad){
        $terms_id[] = $amenidad['term_id'];
      }
      wp_set_object_terms($nuevo_inmueble,$terms_id,'areas_amenidades',true);
    }
    wp_redirect(esc_url_raw(add_query_arg( 'post_submitted',$nuevo_inmueble )));
    exit;

  }
  add_action('cmb2_after_init', 'ci_publicar_inmueble');

  function ci_enviar_imagen_destacada($post_id, $attachment_post_data = array()){
    if( empty($_FILES) || !isset($_FILES) || !isset($_FILES['imagen_destacada']['error']) && 0 !== $_FILES['imagen_destacada']['error'] ){
      return;
    }
    $archivo = array_filter($_FILES['imagen_destacada']);

    if(empty($archivo)){
      return;
    }

    if(!function_exists('media_handle_upload')){
      require_once(ABSPATH . 'wp-admin/includes/image.php');
      require_once(ABSPATH . 'wp-admin/includes/file.php');
      require_once(ABSPATH . 'wp-admin/includes/media.php');
    }

    return media_handle_upload( 'imagen_destacada', $post_id, $attachment_post_data );
  }

  function ci_subir_array_imagenes($post_id, $key, $grupo = false, $key_grupo = false ){
    if( empty($_FILES) || !isset($_FILES) || !isset($_FILES[$key]['error']) && 0 !== $_FILES[$key]['error'] ){
      return;
    }

    $archivos = array_filter($_FILES[$key]);

    $files_aux = $_FILES;
    if(empty($archivos)){
      return;
    }
    $array_resultado = array();
    if (!function_exists('wp_generate_attachment_metadata')) {
      require_once(ABSPATH . "wp-admin" . '/includes/image.php');
      require_once(ABSPATH . "wp-admin" . '/includes/file.php');
      require_once(ABSPATH . "wp-admin" . '/includes/media.php');
    }
    foreach ($archivos['name'] as $index => $value) {
      if ($grupo && $archivos['name'][$index][$key_grupo]) {
        $archivo = array(
          'name'     => $archivos['name'][$index][$key_grupo],
          'type'     => $archivos['type'][$index][$key_grupo],
          'tmp_name' => $archivos['tmp_name'][$index][$key_grupo],
          'error'    => $archivos['error'][$index][$key_grupo],
          'size'     => $archivos['size'][$index][$key_grupo]
        );
      }
      elseif ($archivos['name'][$index]) {
        $archivo = array(
          'name'     => $archivos['name'][$index],
          'type'     => $archivos['type'][$index],
          'tmp_name' => $archivos['tmp_name'][$index],
          'error'    => $archivos['error'][$index],
          'size'     => $archivos['size'][$index]
        );
      }
      if (isset($archivo)){
        $_FILES = array($key => $archivo);
        foreach ($_FILES as $archivo => $array) {
          $id = media_handle_upload($archivo,$post_id);
          if(!is_wp_error( $id )){
            $array_resultado[$id] = wp_get_attachment_url($id);
          }
        }
      }
    }
    $_FILES = $files_aux;
    return $array_resultado;
  }

  function ci_agregar_nuevos_terminos($array, $taxonomia){
    $array_resultado = array();
    foreach($array as $term){
      $term = trim($term);
      if(isset($term)){
        $new_term = wp_insert_term($term,$taxonomia);
        if (!is_wp_error( $new_term )){
          $array_resultado[] = $new_term;
        }
      }
    }
    return $array_resultado;
  }