<?php
class Tipos_Inmuebles_Filtro_Widget extends WP_Widget {

    public function __construct() {
    parent::__construct(
        'filtro_tipos_inmuebles', // ID del widget
        'Tipos de inmuebles filtro', // Nombre del widget
        array( 'description' => 'Checklist que filtra por tipos de inmuebles' ) // Descripción del widget
    );
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        // Obtiene los términos de la taxonomía 'tipos_inmuebles' ordenados por número de publicaciones
        $terms = get_terms( array(
            'taxonomy' => 'tipos_inmuebles',
            'hide_empty' => false,
            'number' => $instance['number']
        ) );

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            echo '<ul>';

            foreach ( $terms as $term ) {
                $checked = isset( $_GET['tipo_inmueble'] ) && in_array($term->slug,$_GET['tipo_inmueble']) ? 'checked="checked"' : '';
                $count = $term->count;
                ?>
                    <li>
                        <label class="checkbox-item"><?php echo esc_html($term->name); ?>
                            <input type="checkbox" class="check-tipo-inmueble" value="<?php echo esc_attr($term->slug);?>" <?php echo esc_attr($checked); ?>>
                            <span class="checkmark"></span>
                        </label>
                        <span class="categorey-no"><?php echo esc_html($count);?></span>
                    </li>
                <?php
            }
            echo '</ul>';
        }
        echo $args['after_widget'];
    }

    public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : 'Términos Populares';
    $number = ! empty( $instance['number'] ) ? $instance['number'] : 5;
    ?>

    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">Título:</label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'number' ); ?>">Número de términos:</label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" min="1" max="10" value="<?php echo esc_attr( $number ); ?>">
    </p>

    <?php
    }

    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['number'] = ! empty( $new_instance['number'] ) ? intval( $new_instance['number'] ) : 5;

    return $instance;
    }
}

function registrar_tipos_inmuebles_filtro_widget() {
register_widget( 'Tipos_Inmuebles_Filtro_Widget' );
}

add_action( 'widgets_init', 'registrar_tipos_inmuebles_filtro_widget' );
