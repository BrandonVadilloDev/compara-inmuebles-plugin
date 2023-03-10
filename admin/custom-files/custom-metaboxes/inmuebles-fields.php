<?php
/**
 * Estos son los campos personalizados para el custom post type de inmuebles
 * 
 * @link https://github.com/CMB2/CMB2
 * @since v1.0.0
 */

if (!function_exists('register_properties_metaboxes')){
  add_action( 'cmb2_init', 'register_properties_metaboxes' );
  /**
   * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
   */
  function register_properties_metaboxes() {
    /**
     * Sample metabox to demonstrate each field type included
     */
    
    $property_metabox = new_cmb2_box( array(
      'id'            => 'properties_metabox',
      'title'         => esc_html__( 'Datos del inmueble', 'cmb2' ),
      'object_types'  => array( 'inmuebles' ), // Post type
      'show_in_rest' => WP_REST_Server::READABLE, // WP_REST_Server::READABLE|WP_REST_Server::EDITABLE, // Determines which HTTP methods the box is visible in.
    ) );

    #region Imagenes slider

    $property_metabox->add_field( array(
      'name'         => esc_html__( 'Imagenes del slider', 'cmb2' ),
      'desc'         => esc_html__( 'Sube una o mas imagenes de 1904 x 1006 px o mas del inmueble', 'cmb2' ),
      'id'           => 'field_imagenes_slider',
      'type'         => 'file_list',
      'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
      'query_args' => array(
        'type' => 'image',
      ),
      'text' => array(
        'add_upload_files_text' => 'Agregar imagenes'
      ),
      'show_in_rest' => WP_REST_Server::READABLE,// WP_REST_Server::ALLMETHODS|WP_REST_Server::READABLE, // Determines which HTTP methods the field is visible in. Will override the cmb2_box 'show_in_rest' param.
    ) );

    #endregion

    #region Fields detalles propiedad

    $property_metabox->add_field(array(
      'name' => 'Seccion detalles de la propiedad',
      'desc' => 'Estos campos son para los detalles de la propiedad',
      'id' => 'field_titulo_detalles',
      'type' => 'title',
    ));

    $property_metabox->add_field( array(
      'name'       => esc_html__( 'Precio', 'cmb2' ),
      'desc'       => esc_html__( 'Ingresa el precio del inmueble', 'cmb2' ),
      'id'         => 'field_precio',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number',
        'min' => '0',
      ),
      'default' => '1'
    ) );

    $property_metabox->add_field( array(
      'name'       => esc_html__( 'Tama??o de terreno', 'cmb2' ),
      'desc'       => esc_html__( 'Ingresa el tama??o del inmueble en metros cuadrados', 'cmb2' ),
      'id'         => 'field_tamano_terreno',
      'type'       => 'text',
      'attributes' => array(
        'type'  => 'number',
        'min'   => '0',
      ),
      'default'   => '1',
    ) );
  
    $property_metabox->add_field( array(
      'name'       => esc_html__( 'Tama??o de construccion', 'cmb2' ),
      'desc'       => esc_html__( 'Ingresa el tama??o de la construcci??n del inmueble en metros cuadrados', 'cmb2' ),
      'id'         => 'field_tamano_construccion',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number',
        'min' => '0',
      ),
      'default'   => '1',
      ) );

    $property_metabox->add_field( array(
      'name'       => esc_html__( 'A??o de construcci??n', 'cmb2' ),
      'desc'       => esc_html__( 'Ingresa el a??o de construcci??n', 'cmb2' ),
      'id'         => 'field_ano_construccion',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number',
        'min' => '0',
      ),
      'default'   => '1',
      ) );

    $property_metabox->add_field( array(
      'name'       => esc_html__( 'N??mero de cuartos', 'cmb2' ),
      'desc'       => esc_html__( 'Ingresa el n??mero de cuartos', 'cmb2' ),
      'id'         => 'field_numero_cuartos',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number',
        'min' => '0',
      ),
      'default'   => '1',
      ) );

    $property_metabox->add_field( array(
      'name'       => esc_html__( 'N??mero de recamaras', 'cmb2' ),
      'desc'       => esc_html__( 'Ingresa el n??mero de recamaras', 'cmb2' ),
      'id'         => 'field_numero_recamaras',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number',
        'min' => '0',
      ),
      'default'   => '1',
      ) );

    $property_metabox->add_field( array(
      'name'       => esc_html__( 'N??mero de ba??os', 'cmb2' ),
      'desc'       => esc_html__( 'Ingresa el n??mero de ba??os', 'cmb2' ),
      'id'         => 'field_numero_banos',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number',
        'min' => '0',
        'step' => '0.5',
      ),
      'default'   => '1',
      ) );

    $property_metabox->add_field( array(
      'name'       => esc_html__( 'N??mero de medios ba??os', 'cmb2' ),
      'desc'       => esc_html__( 'Ingresa el n??mero de medios ba??os', 'cmb2' ),
      'id'         => 'field_numero_medios_banos',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number',
        'min' => '0',
      ),
      'default'   => '1',
      ) );

    $property_metabox->add_field( array(
      'name'       => esc_html__( 'Cajones de estacionamiento', 'cmb2' ),
      'desc'       => esc_html__( 'Ingresa el n??mero de cajones de estacionamiento', 'cmb2' ),
      'id'         => 'field_cajones_estacionamiento',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number',
        'min' => '0',
      ),
      'default'   => '1',
      ) );

    #endregion

    $property_metabox->add_field( array(
      'name'         => esc_html__( 'Galeria de imagenes', 'cmb2' ),
      'desc'         => esc_html__( 'Sube una o mas fotos del inmueble', 'cmb2' ),
      'id'           => 'field_galeria_imagenes',
      'type'         => 'file_list',
      'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
      'query_args' => array(
        'type' => 'image',
      ),
      'text' => array(
        'add_upload_files_text' => 'Agregar imagenes'
      ),
      'count_limit' => '5'
    ) );

    #region facts and features

    $group_features = $property_metabox->add_field(array(
      'id'          => 'grupo_facts_features',
      'type'        => 'group',
      'description' => __( 'Grupo de caracter??sticas', 'cmb2' ),
      'repeatable'  => true, // use false if you want non-repeatable group
      'options'     => array(
        'group_title'       => __( 'Caracter??stica {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        'add_button'        => __( 'A??adir otra caracter??stica', 'cmb2' ),
        'remove_button'     => __( 'Remover caracter??stica', 'cmb2' ),
        'sortable'          => true,
        'closed'         => true, // true to have the groups closed by default
        // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation removing group.
      ),
      'show_in_rest' => WP_REST_Server::READABLE, // WP_REST_Server::READABLE|WP_REST_Server::EDITABLE, // Determines which HTTP methods the box is visible in.
    ));

    $property_metabox->add_group_field($group_features, array(
      'id' => 'feature',
      'name' => 'Caracter??stica',
      'type' => 'text',
    ));

    $property_metabox->add_group_field($group_features, array(
      'id' => 'desc',
      'name' => 'Descripci??n',
      'type' => 'text',
    ));

    $array_iconos = array(
      'flaticon-add-to-cart' => 'flaticon-add-to-cart',
      'flaticon-add-user-1' => 'flaticon-add-user-1',
      'flaticon-add-user' => 'flaticon-add-user',
      'flaticon-add' => 'flaticon-add',
      'flaticon-airplane' => 'flaticon-airplane',
      'flaticon-apartment-1' => 'flaticon-apartment-1',
      'flaticon-apartment' => 'flaticon-apartment',
      'flaticon-armchair' => 'flaticon-armchair',
      'flaticon-bathtub' => 'flaticon-bathtub',
      'flaticon-bed-1' => 'flaticon-bed-1',
      'flaticon-bed' => 'flaticon-bed',
      'flaticon-beds' => 'flaticon-beds',
      'flaticon-book' => 'flaticon-book',
      'flaticon-branch' => 'flaticon-branch',
      'flaticon-building' => 'flaticon-building',
      'flaticon-buy-home' => 'flaticon-buy-home',
      'flaticon-buy-online' => 'flaticon-buy-online',
      'flaticon-call-center-agent' => 'flaticon-call-center-agent',
      'flaticon-car' => 'flaticon-car',
      'flaticon-chat' => 'flaticon-chat',
      'flaticon-clean' => 'flaticon-clean',
      'flaticon-deal-1' => 'flaticon-deal-1',
      'flaticon-deal' => 'flaticon-deal',
      'flaticon-dining-table-with-chairs' => 'flaticon-dining-table-with-chairs',
      'flaticon-double-bed' => 'flaticon-double-bed',
      'flaticon-dryer' => 'flaticon-dryer',
      'flaticon-dumbbell' => 'flaticon-dumbbell',
      'flaticon-dumbell' => 'flaticon-dumbell',
      'flaticon-excavator' => 'flaticon-excavator',
      'flaticon-expand' => 'flaticon-expand',
      'flaticon-fast-forward-double-right-arrows-symbol' => 'flaticon-fast-forward-double-right-arrows-symbol',
      'flaticon-financial' => 'flaticon-financial',
      'flaticon-garage-1' => 'flaticon-garage-1',
      'flaticon-garage' => 'flaticon-garage',
      'flaticon-google-docs' => 'flaticon-google-docs',
      'flaticon-heart-1' => 'flaticon-heart-1',
      'flaticon-heart' => 'flaticon-heart',
      'flaticon-home-1' => 'flaticon-home-1',
      'flaticon-home-2' => 'flaticon-home-2',
      'flaticon-home-3' => 'flaticon-home-3',
      'flaticon-home' => 'flaticon-home',
      'flaticon-hospital' => 'flaticon-hospital',
      'flaticon-house-1' => 'flaticon-house-1',
      'flaticon-house-2' => 'flaticon-house-2',
      'flaticon-house-3' => 'flaticon-house-3',
      'flaticon-house-4' => 'flaticon-house-4',
      'flaticon-house-key' => 'flaticon-house-key',
      'flaticon-house' => 'flaticon-house',
      'flaticon-key-1' => 'flaticon-key-1',
      'flaticon-key' => 'flaticon-key',
      'flaticon-left-quote-1' => 'flaticon-left-quote-1',
      'flaticon-left-quote' => 'flaticon-left-quote',
      'flaticon-left-quotes-sign' => 'flaticon-left-quotes-sign',
      'flaticon-location' => 'flaticon-location',
      'flaticon-loupe' => 'flaticon-loupe',
      'flaticon-mall' => 'flaticon-mall',
      'flaticon-maps-and-location' => 'flaticon-maps-and-location',
      'flaticon-measure' => 'flaticon-measure',
      'flaticon-metro' => 'flaticon-metro',
      'flaticon-mortarboard' => 'flaticon-mortarboard',
      'flaticon-mortgage' => 'flaticon-mortgage',
      'flaticon-mountain' => 'flaticon-mountain',
      'flaticon-office' => 'flaticon-office',
      'flaticon-official-documents' => 'flaticon-official-documents',
      'flaticon-online-shop' => 'flaticon-online-shop',
      'flaticon-operator' => 'flaticon-operator',
      'flaticon-package' => 'flaticon-package',
      'flaticon-park' => 'flaticon-park',
      'flaticon-parking' => 'flaticon-parking',
      'flaticon-pencil' => 'flaticon-pencil',
      'flaticon-phone-call' => 'flaticon-phone-call',
      'flaticon-pin' => 'flaticon-pin',
      'flaticon-plane' => 'flaticon-plane',
      'flaticon-plus' => 'flaticon-plus',
      'flaticon-quotation' => 'flaticon-quotation',
      'flaticon-right-arrow' => 'flaticon-right-arrow',
      'flaticon-right-quote' => 'flaticon-right-quote',
      'flaticon-salad' => 'flaticon-salad',
      'flaticon-secure-shield' => 'flaticon-secure-shield',
      'flaticon-secure' => 'flaticon-secure',
      'flaticon-select' => 'flaticon-select',
      'flaticon-sewing' => 'flaticon-sewing',
      'flaticon-slider' => 'flaticon-slider',
      'flaticon-slumber' => 'flaticon-slumber',
      'flaticon-square-shape-design-interface-tool-symbol' => 'flaticon-square-shape-design-interface-tool-symbol',
      'flaticon-stethoscope' => 'flaticon-stethoscope',
      'flaticon-support' => 'flaticon-support',
      'flaticon-swimming' => 'flaticon-swimming',
      'flaticon-toilet' => 'flaticon-toilet',
      'flaticon-train' => 'flaticon-train',
      'flaticon-user-1' => 'flaticon-user-1',
      'flaticon-user' => 'flaticon-user',
      'flaticon-vegetable' => 'flaticon-vegetable',
      'flaticon-washer' => 'flaticon-washer',
    );

    $property_metabox->add_group_field($group_features, array(
      'name' => __( 'Seleccionar icono', 'cmb' ),
      'id'   => 'iconselect',
      'type' => 'faiconselect',
      'options' => $array_iconos,
  ) );

    #endregion

    #region mapa

    $property_metabox->add_field( array(
      'name' => 'Ubicaci??n del inmueble',
      'desc' => 'Drag the marker to set the exact location',
      'id' => 'field_location',
      'type' => 'pw_map',
      'default' => array(
        'latitude' => '19.35589605603477',
        'longitude' => '-99.28028434709879'
      )
      // 'split_values' => true, // Save latitude and longitude as two separate fields
    ) );
    #endregion

    #region Planos de piso

    $group_plans = $property_metabox->add_field(array(
      'id'          => 'grupo_planos',
      'type'        => 'group',
      'description' => __( 'Grupo de los planos del piso', 'cmb2' ),
      'repeatable'  => true, // use false if you want non-repeatable group
      'options'     => array(
        'group_title'       => __( 'Planos de piso {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        'add_button'        => __( 'A??adir otro plano de piso', 'cmb2' ),
        'remove_button'     => __( 'Remover plano de piso', 'cmb2' ),
        'sortable'          => true,
        'closed'         => true, // true to have the groups closed by default
        // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation removing group.
      ),
    ));

    $property_metabox->add_group_field($group_plans, array(
      'id' => 'nombre',
      'name' => 'Nombre de piso',
      'type' => 'text',
    ));

    $property_metabox->add_group_field($group_plans, array(
      'id' => 'desc',
      'name' => 'Descripci??n de piso',
      'type' => 'textarea_small',
    ));

    $property_metabox->add_group_field( $group_plans, array(
      'name' => 'Imagen plano',
      'id'   => 'image',
      'type' => 'file',
    ) );

    $property_metabox->add_group_field($group_plans, array(
      'id' => 'area',
      'name' => '??rea total',
      'type' => 'text',
      'attributes' => array(
        'type' => 'number'
      ),
    ));

    $property_metabox->add_group_field($group_plans, array(
      'id' => 'recamara',
      'name' => 'tama??o recamara',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number'
      ),
    ));

    $property_metabox->add_group_field($group_plans, array(
      'id' => 'mascotas',
      'name' => 'Mascotas permitidas',
      'type' => 'select',
      'show_option_none' => 'Elegir opci??n',
      'options' => array(
        'Permitido' => 'Permitido',
        'No permitido' => 'No permitido',
      ),  
    ));

    $property_metabox->add_group_field($group_plans, array(
      'id' => 'salon',
      'name' => 'Tama??o salon',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number'
      ),
    ));

    #endregion

    $property_metabox->add_field( array(
      'name' => 'Url video de la propiedad',
      'desc' => 'Url del video en youtube de la propiedad',
      'id'   => 'field_video',
      'type' => 'text_url',
      // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
     
    ) );

    $property_metabox->add_field( array(
      'name'     => esc_html__( 'Categor??a del inmueble', 'cmb2' ),
      'desc'     => esc_html__( 'Elige si tu inmueble est?? en venta, en renta o en compra', 'cmb2' ),
      'id'       => 'taxonomy_select',
      'type'     => 'taxonomy_select', // Or `taxonomy_select_hierarchical`
      'taxonomy' => 'estados_de_inmueble', // Taxonomy Slug
    ) );
  }
}