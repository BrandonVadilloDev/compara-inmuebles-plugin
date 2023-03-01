<?php
/**
 * Adds Popular inmuebles widget
 */
class Popular_inmuebles extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'inmuebles_populares_widget', // Base ID
			esc_html('Inmuebles populares'), // Name
			array( 'description' => esc_html('Widget de entradas de inmuebles populares'), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		?>
      <div class="ltn__popular-product-widget">       
        <h4 class="ltn__widget-title ltn__widget-title-border-2">Popular Properties</h4>                     
        <div class="row ltn__popular-product-widget-active slick-arrow-1">
          <?php
            if ( ! empty( $instance['cantidad'] ) ) {
              $cant_inmuebles = $instance['cantidad'];
            }
            $query_args = array(
              'post_type' => 'inmuebles',
              'posts_per_page' => $cant_inmuebles,
              'meta_key' => 'post_views_count',
              'orderby' => 'meta_value_num',
              'order' => 'DESC',
            );
            $inmuebles = new WP_Query($query_args);
            while ($inmuebles->have_posts()): $inmuebles->the_post();
          ?>
          <!-- ltn__product-item -->
          <div class="col-12">
            <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
              <div class="product-img">
                <a href="<?php esc_url(the_permalink()) ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'grid-inmueble'); ?>" alt="#"></a>
                <div class="real-estate-agent">
                  <div class="agent-img">
                    <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                  </div>
                </div>
              </div>
              <div class="product-info">
                <div class="product-price">
                  <span>$<?php echo get_post_meta(get_the_ID(),'field_precio',true); ?><label>/Month</label></span>
                </div>
                <h2 class="product-title"><a href="<?php esc_url(the_permalink()) ?>"><?php the_title(); ?></a></h2>
                <div class="product-img-location">
                    <ul>
                        <li>
                            <a href="product-details.html"><i class="flaticon-pin"></i> <?php echo get_post_meta(get_the_ID(), 'inmueble_direccion',true); ?></a>
                        </li>
                    </ul>
                </div>
                <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                    <li><span><?php echo get_post_meta(get_the_ID(),'field_numero_cuartos',true); ?>  </span>
                        Rec
                    </li>
                    <li><span><?php echo get_post_meta(get_the_ID(),'field_numero_banos',true); ?> </span>
                        Baños
                    </li>
                    <li><span><?php echo get_post_meta(get_the_ID(),'field_tamano_construccion',true); ?> </span>
                        m²
                    </li>
                </ul>
              </div>
            </div>
          </div>
          <?php
            endwhile; wp_reset_postdata(  );
          ?>
        </div>
      </div>
    <?php
    
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$cantidad = ! empty( $instance['cantidad'] ) ? $instance['cantidad'] : esc_html('Cantidad de inmuebles a mostrar');
		?>
		<p>
		  <label for="<?php echo esc_attr( $this->get_field_id( 'cantidad' ) ); ?>">
        <?php esc_attr_e( 'Cantidad de inmuebles a mostrar', 'text_domain' ); ?>
      </label> 
		  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'cantidad' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'cantidad' ) ); ?>" type="number" value="<?php echo esc_attr( $cantidad ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['cantidad'] = ( ! empty( $new_instance['cantidad'] ) ) ? sanitize_text_field( $new_instance['cantidad'] ) : '';

		return $instance;
	}

} // class Foo_Widget

function register_popular_inmuebles(){
  register_widget('Popular_inmuebles');
}
add_action('widgets_init','register_popular_inmuebles');