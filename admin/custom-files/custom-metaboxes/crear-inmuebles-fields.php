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

    #region descripcion del inmueble
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
      'default'   => date('Y'),
      'render_row_cb' => function($field_args, $field) {
        ?>
        <div class="row">
          <div class="col-md-6">
            <h6><?php echo $field_args['name']; ?></h6>
            <div class="input-item  input-item-textarea ltn__custom-icon">
                <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?>>
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
                <input type="text" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?> placeholder="Correo electrónico (Obligatorio)">
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
              <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?>>
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
              <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?>>
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
                <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?>>
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
              <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?>>
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
              <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?>>
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
              <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?>>
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
              <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?>>
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
              <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?>>
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
              <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?>>
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
              <input type="number" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?>>
          </div>
        </div>
        </div>
        <?php
      },
    ) );

    $metaboxes_form->add_field( array(
      'name'           => 'Seleccionar amenidades del inmueble (opcional)',
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

    $metaboxes_form->add_field( array(
      'name'       => esc_html__( 'Agregar amenidades (Opcional)', 'cmb2' ),
      'id'         => 'agregar_amenidades',
      'taxonomy'   => 'areas_amenidades',
      'desc'       => 'Agrega amenidades que no estan en la checklist separadas con una coma "Lavadora, Secadora, Aire acondicionado".',
      'type'       => 'text',
      'attributes' => array(
        'required' => true,
      ),
      'render_row_cb' => function($field_args, $field) {
        ?>
        <div class="row">
          <div class="col-md-6">
            <h6><?php echo $field_args['name']; ?></h6>
            <div class="input-item  input-item-textarea ltn__custom-icon">
              <small><?php echo esc_html($field_args['desc']); ?></small>
              <input type="text" name="<?php echo $field->args('id'); ?>" id="<?php echo $field->args('id'); ?>" value="<?php echo $field->escaped_value(); ?>" <?php echo $field->has_val( 'required' ) ? 'required' : ''; ?> placeholder="Lavadora, Secadora, Aire acondicionado">
            </div>
          </div>
        </div>
        <?php
      },
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
        //'required' => true,
        'type' => 'file',
      ),
    ) );

    $metaboxes_form->add_field( array(
      'name'         => esc_html__( 'Galeria de imagenes (opcional)', 'cmb2' ),
      'id'           => 'field_galeria_imagenes',
      'type'         => 'text',
      'attributes' => array(
        'type' => 'file',
        'multiple' => 'multiple',
        'name' => 'field_galeria_imagenes[]'
      ),
    ) );

    $metaboxes_form->add_field( array(
      'name'         => esc_html__( 'Imagenes del slider (opcional)', 'cmb2' ),
      'desc'         => esc_html__( 'Sube una o mas imagenes de 1904 x 1006 px o mas del inmueble', 'cmb2' ),
      'id'           => 'field_imagenes_slider',
      'type'         => 'text',
      'attributes' => array(
        'type' => 'file',
        'multiple' => 'multiple',
        'name' => 'field_imagenes_slider[]',
      ),
    ) );

    $metaboxes_form->add_field( array(
      'name' => 'Url video de YouTube de la propiedad (opcional)',
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

    $metaboxes_form->add_group_field($group_features, array(
      'name' => __( 'Seleccionar icono', 'cmb' ),
      'id'   => 'iconselect',
      'type' => 'faiconselect',
      'options' => $array_iconos,
    ));

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
      'type' => 'text',
      'attributes' => array(
        'type' => 'file',
      ),
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
}