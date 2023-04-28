<?php
class Populares_Amenidades_Widget extends WP_Widget {

public function __construct() {
  parent::__construct(
    'amenidades_populares_widget', // ID del widget
    'Amenidades populares', // Nombre del widget
    array( 'description' => 'Muestra las amenidades mas populares.' ) // Descripción del widget
  );
}

public function widget( $args, $instance ) {
  echo $args['before_widget'];
  echo '<div class="ltn__tagcloud-widget">';
  if ( ! empty( $instance['title'] ) ) {
    echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
  }

  // Obtiene los términos de la taxonomía 'tipos_inmuebles' ordenados por número de publicaciones
  $terms = get_terms( array(
    'taxonomy' => 'areas_amenidades',
    'orderby' => 'count',
    'order' => 'DESC',
    'number' => $instance['number']
  ) );
  $custom_pages = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'page-inmuebles.php'
  ));
  $link_buscar = $custom_pages ? get_permalink($custom_pages[0]->ID) : '#' ;
  if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    echo '<ul>';

    foreach ( $terms as $term ) {
      $count = $term->count;
      echo '<li><a href="' . $link_buscar.'?amenidades_inmueble[0]='.$term->slug . '">' . $term->name . '</a></li>';
    }

    echo '</ul>';
  }
  echo '</div>';
  echo $args['after_widget'];
}

public function form( $instance ) {
  $title = ! empty( $instance['title'] ) ? $instance['title'] : 'Amenidades Populares';
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

function registrar_amenidades_populares_widget() {
register_widget( 'Populares_Amenidades_Widget' );
}

add_action( 'widgets_init', 'registrar_amenidades_populares_widget' );
