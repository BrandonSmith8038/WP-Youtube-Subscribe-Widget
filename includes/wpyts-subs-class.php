<?php

/**
 * Adds WP_Youtube_Subscribe widget.
 */
class WP_Youtbe_Subscribe_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'WP_Youtube_Subscribe_Widgets', // Base ID
			esc_html__( 'WP Youtube Subscribe', 'wptys_domain' ), // Name
			array( 'description' => esc_html__( 'Widget to display YouTube subscribers', 'wpyts_domain' ), ) // Args
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
		echo $args['before_widget']; //Whatever you want to diplay before widget (<div>)
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        
        //Widget Content Output
        echo '<div 
                class="g-ytsubscribe" 
                data-channel="' . $instance['channel'] . '" 
                data-layout="' . $instance['layout']  . '" 
                data-count="' . $instance['showCount'] . '">
            </div>';
        echo $args['after_widget'];//Whatever you want to display after widget (</div>)
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Youtube Subs', 'wpyts_domain' );
        
        $channel = ! empty( $instance['channel'] ) ? $instance['channel'] : esc_html__( 'wheretheybuck', 'wpyts_domain' );
        
        $layout = ! empty( $instance['layout'] ) ? $instance['layout'] : esc_html__( 'default', 'wpyts_domain' );
        
        $showCount = ! empty( $instance['showCount'] ) ? $instance['showCount'] : esc_html__( 'default', 'wpyts_domain' );
        
        ?>
        <!-- Title -->
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_attr_e( 'Title:', 'wpyts_domain' ); ?>
            </label> 

		    <input 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $title ); ?>">
		</p>

        <!-- Channel -->
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>">
                <?php esc_attr_e( 'channel:', 'wpyts_domain' ); ?>
            </label> 

		    <input 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'channel' ) ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $channel ); ?>">
		</p>
        <!-- Layout -->
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>">
                <?php esc_attr_e( 'layout:', 'wpyts_domain' ); ?>
            </label> 

		    <select 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>">
            <option value="default" <?php echo ($layout == 'default') ? 'selected' : ''; ?>>
                Default
            </option> 
            <option value="full" <?php echo ($layout == 'full') ? 'selected' : ''; ?>>
                Full
            </option> 
            </select>
		</p>
        <!-- Show Count -->
		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'showCount' ) ); ?>">
                <?php esc_attr_e( 'Show Count:', 'wpyts_domain' ); ?>
            </label> 

		    <select 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'showCount' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'showCount' ) ); ?>">
            <option value="default" <?php echo ($count == 'default') ? 'selected' : ''; ?>>
                Default
            </option> 
            <option value="hidden" <?php echo ($count == 'hidden') ? 'selected' : ''; ?>>
                Hidden
            </option> 
            </select>
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
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['channel'] = ( ! empty( $new_instance['channel'] ) ) ? strip_tags( $new_instance['channel'] ) : '';
		$instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? strip_tags( $new_instance['layout'] ) : '';
		$instance['showCount'] = ( ! empty( $new_instance['showCount'] ) ) ? strip_tags( $new_instance['showCount'] ) : '';

		return $instance;
	}

} // class Foo_Widget