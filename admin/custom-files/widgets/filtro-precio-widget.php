<?php
class Filtro_Precio_Inmuebles_Widget extends WP_Widget {

    public function __construct() {
    parent::__construct(
        'filtro_precios_inmuebles', // ID del widget
        'Filtro de inmuebles por precio', // Nombre del widget
        array( 'description' => 'Slider que filtra por precios de inmuebles' ) // Descripción del widget
    );
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        ?>
          <div class="widget--- ltn__price-filter-widget">
              <h4 class="ltn__widget-title ltn__widget-title-border---"><?php echo esc_html( $instance['title'] ); ?></h4>
              <div class="price_filter">
                  <div class="price_slider_amount">
                      <input type="submit"  value="Your range:"/> 
                      <input type="text" class="amount" name="price"  placeholder="Add Your Price" /> 
                  </div>
                  <div class="slider-range"></div>
              </div>
          </div>
        <?php
        echo $args['after_widget'];
    }

    public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : 'Rango de precio';
    ?>

    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">Título:</label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <?php
    }

    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';

    return $instance;
    }
}

function registrar_precio_inmuebles_filtro_widget() {
register_widget( 'Filtro_Precio_Inmuebles_Widget' );
}

add_action( 'widgets_init', 'registrar_precio_inmuebles_filtro_widget' );
