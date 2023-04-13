<?php
/**
 * Estos son los campos personalizados para el formulario de agregar inmuebles
 * 
 * @link https://github.com/CMB2/CMB2
 * @since v1.0.0
 */

if (!function_exists('formulario_agregar_inmueble_metaboxes')){
  function formulario_agregar_inmueble_metaboxes(){
    $metaboxes_form = new_cmb2_box( array(
      'id'            => 'ci_agregar_inmueble',
      'title'         => esc_html__( 'Públicar tu inmueble', 'cmb2' ),
      'object_types'  => array( 'page' ), // Post type
      'hookup' => false, // Si se va a guardar el post como borrador en la pagina principal
      'save_fields' => false, // Sino va a guardar los campos durante el hookup
    ) );

    #region descrion del inmueble
    $metaboxes_form->add_field( array(
      'name' => 'Descripción del inmueble',
      'type' => 'title',
      'id'   => 'descripcion_inmueble_encabezado',
      'render_row_cb' => function( $field_args, $field ) {
        return '<h2>' . $field_args['name'] . '</h2>';
      },
    ) );

    $metaboxes_form->add_field(array(
      'name' => 'Titulo del inmueble',
      'id' => 'titulo_inmueble',
      'type' => 'text',
      'render_row_cb' => function($field_args, $field) {
          ?>
          <div class="row"><div class="col-md-12">
          <h6><?php echo $field_args['name']; ?></h6>
          <div class="input-item input-item-name ltn__custom-icon">
              <input type="text" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?> placeholder="Titulo (Obligatorio)">
          </div>
          <?php
      },
      'attributes' => array(
        'required' => true,
      ),
    ));

    $metaboxes_form->add_field( array(
      'name'         => 'Descripción del inmueble',
      'id'           => 'desc_inmueble',
      'type'         => 'wysiwyg',
      'after_row'    => '</div></div>',
      'attributes' => array(
        'required' => true,
      ),
    ) );

    $metaboxes_form->add_field( array(
      'name'       => esc_html__( 'Año de construcción', 'cmb2' ),
      'id'         => 'ano_construccion',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number',
        'min' => '0',
        'required' => true,
      ),
      'default'   => '1',
      'render_row_cb' => function($field_args, $field) {
        ?>
        <div class="row">
          <div class="col-md-6">
            <h6><?php echo $field_args['name']; ?></h6>
            <div class="input-item  input-item-textarea ltn__custom-icon">
                <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?> placeholder="Titulo (Obligatorio)">
            </div>
          </div>
        <?php
      },
      ) );

    $metaboxes_form->add_field( array(
      'name'     => esc_html__( 'Categoría del inmueble', 'cmb2' ),
      'id'       => 'estado_inmueble',
      'type'     => 'taxonomy_select', // Or `taxonomy_select_hierarchical`
      'taxonomy' => 'estados_de_inmueble', // Taxonomy Slug
      'attributes' => array(
        'required' => true,
      ),
      'render_row_cb'    => function( $field_args, $field ) {
        ?>
        <div class="col-md-6">
            <h6><?php echo $field_args['name']; ?></h6>
            <div class="input-item">
                <?php $field_type = $field->args( 'type' ); ?>
                <?php if ( 'taxonomy_select' === $field_type ) : ?>
                    <?php $taxonomy = $field->args( 'taxonomy' ); ?>
                    <?php
                    $terms = get_terms( array(
                        'taxonomy' => $taxonomy,
                        'hide_empty' => false,
                    ) );
                    $selected = $field->get_selected_term();
                    ?>
                    <select name="<?php echo $field->args( '_name' ); ?>" class="nice-select">
                        <option value=""><?php echo esc_html__( 'Selecciona una opción', 'cmb2' ); ?></option>
                        <?php foreach ( $terms as $term ) : ?>
                            <option value="<?php echo esc_attr( $term->slug ); ?>" <?php selected( $selected, $term->term_id ); ?>>
                                <?php echo esc_html( $term->name ); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                <?php else : ?>
                    <?php echo $field_type::select( $field->args(), $field->get_meta(), $field->object_id, $field->object_type ); ?>
                <?php endif; ?>
            </div>
        </div>
        <?php
    },
    
    ) );

    $metaboxes_form->add_field( array(
      'name'     => esc_html__( 'Tipo de inmueble', 'cmb2' ),
      'id'       => 'tipo_inmueble',
      'type'     => 'taxonomy_select', // Or `taxonomy_select_hierarchical`
      'taxonomy' => 'tipos_inmuebles', // Taxonomy Slug
      'attributes' => array(
        'required' => true,
      ),
      'render_row_cb'    => function( $field_args, $field ) {
        ?>
        <div class="col-md-6">
            <h6><?php echo $field_args['name']; ?></h6>
            <div class="input-item">
                <?php $field_type = $field->args( 'type' ); ?>
                <?php if ( 'taxonomy_select' === $field_type ) : ?>
                    <?php $taxonomy = $field->args( 'taxonomy' ); ?>
                    <?php
                    $terms = get_terms( array(
                        'taxonomy' => $taxonomy,
                        'hide_empty' => false,
                    ) );
                    $selected = $field->get_selected_term();
                    ?>
                    <select name="<?php echo $field->args( '_name' ); ?>" class="nice-select">
                        <option value=""><?php echo esc_html__( 'Selecciona una opción', 'cmb2' ); ?></option>
                        <?php foreach ( $terms as $term ) : ?>
                            <option value="<?php echo esc_attr( $term->slug ); ?>" <?php selected( $selected, $term->term_id ); ?>>
                                <?php echo esc_html( $term->name ); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                <?php else : ?>
                    <?php echo $field_type::select( $field->args(), $field->get_meta(), $field->object_id, $field->object_type ); ?>
                <?php endif; ?>
            </div>
        </div>
        </div>
        <?php
    },
    
    ) );

    #endregion

    #region datos de contacto
    $metaboxes_form->add_field( array(
      'name' => 'Datos de contacto',
      'type' => 'title',
      'id'   => 'datos_contacto_encabezado',
      'render_row_cb' => function( $field_args, $field ) {
        return '<h2>' . $field_args['name'] . '</h2>';
      },
    ) );
    $metaboxes_form->add_field( array(
      'name'       => esc_html__( 'Correo electrónico de contacto', 'cmb2' ),
      'id'         => 'correo_contacto',
      'type'       => 'text_email',
      'attributes' => array(
        'required' => true,
      ),
      'render_row_cb' => function($field_args, $field) {
        ?>
        <div class="row">
          <div class="col-md-6">
            <h6><?php echo $field_args['name']; ?></h6>
            <div class="input-item  input-item-textarea ltn__custom-icon">
                <input type="text" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?> placeholder="Titulo (Obligatorio)">
            </div>
          </div>
        <?php
      },
    ) );

    $metaboxes_form->add_field( array(
      'name'             => 'Tipo de propietario',
      'id'               => 'tipo_propietario',
      'type'             => 'select',
      'show_option_none' => false,
      'default'          => 'custom',
      'options'          => array(
        'particular' => 'Particular',
        'inmobiliaria' => 'Inmobiliaria'
      ),
      'render_row_cb'    => function( $field_args, $field ) {
        ?>
        <div class="col-md-6">
          <h6><?php echo $field_args['name']; ?></h6>
          <div class="input-item">
              <select name="<?php echo $field->args( 'id' ); ?>" id="<?php echo $field->args( 'id' ); ?>" class="nice-select">
                  <?php foreach ( $field->options() as $value => $label ) : ?>
                      <option value="<?php echo $value; ?>" <?php $field->selected( $value ); ?>><?php echo $label; ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
        </div>
        <?php
      },
    ) );

    $metaboxes_form->add_field( array(
      'name'       => esc_html__( 'Telefono fijo o celular (Opcional)', 'cmb2' ),
      'id'         => 'telefono_contacto',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number',
        'min' => '7',
        'max' => '14',
      ),
      'default' => '1',
      'render_row_cb' => function($field_args, $field) {
        ?>
        <div class="col-md-6">
          <h6><?php echo $field_args['name']; ?></h6>
          <div class="input-item  input-item-textarea ltn__custom-icon">
              <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?> placeholder="Titulo (Obligatorio)">
          </div>
        </div>
        <?php
      },
    ) );

    $metaboxes_form->add_field( array(
      'name'       => esc_html__( 'Whatsapp', 'cmb2' ),
      'id'         => 'whatsapp',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number',
        'min' => '7',
        'max' => '14',
        'required' => true,
      ),
      'default' => '1',
      'render_row_cb' => function($field_args, $field) {
        ?>
        <div class="col-md-6">
          <h6><?php echo $field_args['name']; ?></h6>
          <div class="input-item  input-item-textarea ltn__custom-icon">
              <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?> placeholder="Titulo (Obligatorio)">
          </div>
        </div>
        </div>
        <?php
      },
    ) );

    #endregion

    #region Detalles del inmueble
    $metaboxes_form->add_field( array(
      'name' => 'Detalles del inmueble',
      'type' => 'title',
      'id'   => 'detalles_inmueble_encabezado',
      'render_row_cb' => function( $field_args, $field ) {
        return '<h2>' . $field_args['name'] . '</h2>';
      },
    ) );

    $metaboxes_form->add_field( array(
      'name'       => esc_html__( 'Precio', 'cmb2' ),
      'id'         => 'field_precio',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number',
        'min' => '0',
        'required' =>true,
      ),
      'default' => '1',
      'render_row_cb' => function($field_args, $field) {
        ?>
        <div class="row">
          <div class="col-md-6">
            <h6><?php echo $field_args['name']; ?></h6>
            <div class="input-item  input-item-textarea ltn__custom-icon">
                <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?> placeholder="Titulo (Obligatorio)">
            </div>
          </div>
        <?php
      },
    ) );

    $metaboxes_form->add_field( array(
      'name'       => esc_html__( 'Tamaño de terreno', 'cmb2' ),
      'id'         => 'field_tamano_terreno',
      'type'       => 'text',
      'attributes' => array(
        'type'  => 'number',
        'min'   => '0',
        'required' => true,
      ),
      'default'   => '1',
      'render_row_cb' => function($field_args, $field) {
        ?>
        <div class="col-md-6">
          <h6><?php echo $field_args['name']; ?></h6>
          <div class="input-item  input-item-textarea ltn__custom-icon">
              <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?> placeholder="Titulo (Obligatorio)">
          </div>
        </div>
        <?php
      },
    ) );

    $metaboxes_form->add_field( array(
      'name'       => esc_html__( 'Tamaño de construccion', 'cmb2' ),
      'id'         => 'field_tamano_construccion',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number',
        'min' => '0',
        'required' => true,
      ),
      'default'   => '1',
      'render_row_cb' => function($field_args, $field) {
        ?>
        <div class="col-md-6">
          <h6><?php echo $field_args['name']; ?></h6>
          <div class="input-item  input-item-textarea ltn__custom-icon">
              <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?> placeholder="Titulo (Obligatorio)">
          </div>
        </div>
        <?php
      },
    ) );

    $metaboxes_form->add_field( array(
      'name'       => esc_html__( 'Número de cuartos (opcional)', 'cmb2' ),
      'id'         => 'field_numero_cuartos',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number',
        'min' => '0',
      ),
      'default'   => '1',
      'render_row_cb' => function($field_args, $field) {
        ?>
        <div class="col-md-6">
          <h6><?php echo $field_args['name']; ?></h6>
          <div class="input-item  input-item-textarea ltn__custom-icon">
              <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?> placeholder="Titulo (Obligatorio)">
          </div>
        </div>
        <?php
      },
    ) );

    $metaboxes_form->add_field( array(
      'name'       => esc_html__( 'Número de recamaras (opcional)', 'cmb2' ),
      'id'         => 'field_numero_recamaras',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number',
        'min' => '0',
      ),
      'default'   => '1',
      'render_row_cb' => function($field_args, $field) {
        ?>
        <div class="col-md-6">
          <h6><?php echo $field_args['name']; ?></h6>
          <div class="input-item  input-item-textarea ltn__custom-icon">
              <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?> placeholder="Titulo (Obligatorio)">
          </div>
        </div>
        <?php
      },
    ) );

    $metaboxes_form->add_field( array(
      'name'       => esc_html__( 'Número de baños (opcional)', 'cmb2' ),
      'id'         => 'field_numero_banos',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number',
        'min' => '0',
      ),
      'default'   => '1',
      'render_row_cb' => function($field_args, $field) {
        ?>
        <div class="col-md-6">
          <h6><?php echo $field_args['name']; ?></h6>
          <div class="input-item  input-item-textarea ltn__custom-icon">
              <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?> placeholder="Titulo (Obligatorio)">
          </div>
        </div>
        <?php
      },
    ) );

    $metaboxes_form->add_field( array(
      'name'       => esc_html__( 'Número de medios baños (opcional)', 'cmb2' ),
      'id'         => 'field_numero_medios_banos',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number',
        'min' => '0',
      ),
      'default'   => '1',
      'render_row_cb' => function($field_args, $field) {
        ?>
        <div class="col-md-6">
          <h6><?php echo $field_args['name']; ?></h6>
          <div class="input-item  input-item-textarea ltn__custom-icon">
              <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?> placeholder="Titulo (Obligatorio)">
          </div>
        </div>
        <?php
      },
    ) );

    $metaboxes_form->add_field( array(
      'name'       => esc_html__( 'Número de cajones de estacionamiento (opcional)', 'cmb2' ),
      'id'         => 'field_cajones_estacionamiento',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number',
        'min' => '0',
      ),
      'default'   => '1',
      'render_row_cb' => function($field_args, $field) {
        ?>
        <div class="col-md-6">
          <h6><?php echo $field_args['name']; ?></h6>
          <div class="input-item  input-item-textarea ltn__custom-icon">
              <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?> placeholder="Titulo (Obligatorio)">
          </div>
        </div>
        </div>
        <?php
      },
    ) );

    $metaboxes_form->add_field( array(
      'name'           => 'Amenidades del inmueble (opcional)',
      'id'             => 'amenidades_inmueble',
      'taxonomy'       => 'areas_amenidades',
      'before_row'   => '<div class="row"><div class="col-md-12">',
      'after_row'    => '</div></div>',
      'type'           => 'taxonomy_multicheck_inline',
      'select_all_button' => false,
      // Optional :
      'text'           => array(
        'no_terms_text' => 'Sorry, no terms could be found.' // Change default text. Default: "No terms"
      ),
      'remove_default' => 'true', // Removes the default metabox provided by WP core.
      // Optionally override the args sent to the WordPress get_terms function.
      'query_args' => array(
        // 'orderby' => 'slug',
        // 'hide_empty' => true,
      ),
    ) );

    #endregion

    #region Media del inmueble

    $metaboxes_form->add_field( array(
      'name' => 'Media del inmueble',
      'type' => 'title',
      'id'   => 'media_inmueble_encabezado',
      'render_row_cb' => function( $field_args, $field ) {
        return '<h2>' . $field_args['name'] . '</h2>';
      },
    ) );

    $metaboxes_form->add_field( array(
      'name'       => esc_html__( 'Imagen destacada', 'cmb2' ),
      'desc'       => 'At least 1 image is required for a valid submission.Minimum size is 500/500px.',
      'id'         => 'imagen_destacada',
      'type'       => 'text',
      'attributes' => array(
        'required' => true,
        'type' => 'file',
      ),
    ) );

    $metaboxes_form->add_field( array(
      'name'         => esc_html__( 'Galeria de imagenes (opcional)', 'cmb2' ),
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

    $metaboxes_form->add_field( array(
      'name'         => esc_html__( 'Imagenes del slider (opcional)', 'cmb2' ),
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
    ) );

    $metaboxes_form->add_field( array(
      'name' => 'Url video de la propiedad (opcional)',
      'desc' => 'Url del video en youtube de la propiedad',
      'id'   => 'field_video',
      'type' => 'text_url',
      'render_row_cb' => function($field_args, $field) {
        ?>
        <div class="row">
          <div class="col-md-12">
            <h6><?php echo $field_args['name']; ?></h6>
            <div class="input-item  input-item-textarea ltn__custom-icon">
                <input type="text" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?> placeholder="https://www.youtube.com/watch?v=ZsV8aj0LKs4">
            </div>
          </div>
        </div>
        <?php
      },
      // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
     
    ) );

    #endregion

    #region Agregar caracteristicas del inmueble

    $metaboxes_form->add_field( array(
      'name' => 'Agregar características del inmueble (opcional)',
      'type' => 'title',
      'id'   => 'caracteristicas_inmueble_encabezado',
      'render_row_cb' => function( $field_args, $field ) {
        return '<h2>' . $field_args['name'] . '</h2>';
      },
    ) );

    $group_features = $metaboxes_form->add_field(array(
      'id'          => 'grupo_facts_features',
      'type'        => 'group',
      'repeatable'  => true, // use false if you want non-repeatable group
      'options'     => array(
        'group_title'       => __( 'Característica {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        'add_button'        => __( 'Añadir otra característica', 'cmb2' ),
        'remove_button'     => __( 'Remover característica', 'cmb2' ),
        'sortable'          => true,
        // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation removing group.
      ),
    ));

    $metaboxes_form->add_group_field($group_features, array(
      'id' => 'feature',
      'name' => 'Característica',
      'type' => 'text',
    ));

    $metaboxes_form->add_group_field($group_features, array(
      'id' => 'desc',
      'name' => 'Descripción',
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

    // $metaboxes_form->add_group_field($group_features, array(
    //   'name' => __( 'Seleccionar icono', 'cmb' ),
    //   'id'   => 'iconselect',
    //   'type' => 'faiconselect',
    //   'default' => 'flaticon-double-bed',
    //   'options' => $array_iconos,
    // ) );

    #endregion

    #region Agregar planos del inmueble

    $metaboxes_form->add_field( array(
      'name' => 'Agregar planos del inmueble (opcional)',
      'type' => 'title',
      'id'   => 'planos_inmueble_encabezado',
      'render_row_cb' => function( $field_args, $field ) {
        return '<h2>' . $field_args['name'] . '</h2>';
      },
    ) );

    $group_plans = $metaboxes_form->add_field(array(
      'id'          => 'grupo_planos',
      'type'        => 'group',
      'repeatable'  => true, // use false if you want non-repeatable group
      'options'     => array(
        'group_title'       => __( 'Planos de piso {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        'add_button'        => __( 'Añadir otro plano de piso', 'cmb2' ),
        'remove_button'     => __( 'Remover plano de piso', 'cmb2' ),
        'sortable'          => true,
        // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation removing group.
      ),
    ));

    $metaboxes_form->add_group_field($group_plans, array(
      'id' => 'nombre',
      'name' => 'Nombre de piso',
      'type' => 'text',
    ));

    $metaboxes_form->add_group_field($group_plans, array(
      'id' => 'desc',
      'name' => 'Descripción de piso',
      'type' => 'textarea_small',
    ));

    $metaboxes_form->add_group_field( $group_plans, array(
      'name' => 'Imagen plano',
      'id'   => 'image',
      'type' => 'file',
    ) );

    $metaboxes_form->add_group_field($group_plans, array(
      'id' => 'area',
      'name' => 'Área total',
      'type' => 'text',
      'attributes' => array(
        'type' => 'number'
      ),
    ));

    $metaboxes_form->add_group_field($group_plans, array(
      'id' => 'recamara',
      'name' => 'tamaño recamara',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number'
      ),
    ));

    $metaboxes_form->add_group_field($group_plans, array(
      'id' => 'mascotas',
      'name' => 'Mascotas permitidas',
      'type' => 'select',
      'show_option_none' => 'Elegir opción',
      'options' => array(
        'Permitido' => 'Permitido',
        'No permitido' => 'No permitido',
      ),  
    ));

    $metaboxes_form->add_group_field($group_plans, array(
      'id' => 'salon',
      'name' => 'Tamaño salon',
      'type'       => 'text',
      'attributes' => array(
        'type' => 'number'
      ),
    ));

    #endregion

    #region ubicacion del inmueble

    $metaboxes_form->add_field( array(
      'name' => 'Ubicación del inmueble',
      'type' => 'title',
      'id'   => 'ubicacion_inmueble_encabezado',
      'render_row_cb' => function( $field_args, $field ) {
        return '<h2>' . $field_args['name'] . '</h2>';
      },
    ) );

    $metaboxes_form->add_field( array(
      'name' => 'Escribe la dirección del inmueble',
      'id' => 'location_inmueble',
      'before_row'   => '<div class="row"><div class="col-md-12">',
      'after_row'    => '</div></div>',
      'type' => 'pw_map',
      'default' => array(
        'latitude' => '19.35589605603477',
        'longitude' => '-99.28028434709879'
      )
      // 'split_values' => true, // Save latitude and longitude as two separate fields
    ) );

    #endregion

  }
  add_action('cmb2_init','formulario_agregar_inmueble_metaboxes');

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

    if (empty($_FILES['imagen_destacada'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'Se requiere una imagen destacada para publicar el inmueble.'));
    }

    if (empty($_POST['location_inmueble'])){
      return $cmb->prop('submission_error', new WP_Error('post_data_missing', 'Se requiere la ubicación para publicar el inmueble.'));
    }

    $valores_sanitizados = $cmb->get_sanitized_values($_POST);

    //Agregar titulo a post data
    $post_data['post_title'] = $valores_sanitizados['titulo_inmueble'];

    //contenido
    $post_data['post_content'] = $valores_sanitizados['desc_inmueble'];

    //Taxonomias
    $post_data['tax_inputs'] =array(
      'tipos_inmuebles' => $valores_sanitizados['tipo_inmueble'],
      'estados_de_inmueble' => $valores_sanitizados['estado_inmueble'],
      'areas_amenidades' => $valores_sanitizados['amenidades_inmueble'],
    );

    //Metaboxes
    $post_data['meta_input'] = array(
      'field_correo_contacto' => $valores_sanitizados['correo_contacto'],
      'field_tipo_propietario' => $valores_sanitizados['tipo_propietario'],
      'field_telefono_contacto' => $valores_sanitizados['telefono_contacto'],
      'field_whatsapp' => $valores_sanitizados['whatsapp'],
      //'field_imagenes_slider' => $valores_sanitizados['field_imagenes_slider'],
      'field_precio' => $valores_sanitizados['field_precio'],
      'field_tamano_terreno' => $valores_sanitizados['field_tamano_terreno'],
      'field_tamano_construccion' => $valores_sanitizados['field_tamano_construccion'],
      'field_ano_construccion' => $valores_sanitizados['ano_construccion'],
      'field_numero_cuartos' => $valores_sanitizados['field_numero_cuartos'],
      'field_numero_recamaras' => $valores_sanitizados['field_numero_recamaras'],
      'field_numero_banos' => $valores_sanitizados['field_numero_banos'],
      'field_numero_medios_banos' => $valores_sanitizados['field_numero_medios_banos'],
      'field_cajones_estacionamiento' => $valores_sanitizados['field_cajones_estacionamiento'],
      //'field_galeria_imagenes' => $valores_sanitizados['field_galeria_imagenes'],
      'grupo_facts_features' => $valores_sanitizados['grupo_facts_features'],
      'field_location' => $valores_sanitizados['location_inmueble'],
      'grupo_planos' => $valores_sanitizados['grupo_planos'],
      //'field_video' => $valores_sanitizados['field_video'],
    );

    //Post type
    $post_data['post_type'] = 'inmuebles';

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

    //Redireccionar
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
    //Filtrar los valores de la imagen destacada
  }
}