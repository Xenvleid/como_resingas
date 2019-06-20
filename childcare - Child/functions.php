<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles');
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css');
}

class tl_widget extends WP_Widget {
	// class constructor
	public function __construct() {
       $widget_ops = array( 
           'classname' => 'tl_widget',
           'description' => 'A plugin for notes',
       );
       parent::__construct( 'tl_widget', 'TL Widget', $widget_ops);
   }
	
	// output the widget content on the front-end
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		 
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
       
		// This is where you run the code and display the output
        echo __( '> Hello, Class!!', 'tl_widget_domain' );
		$blog_title = get_bloginfo('name');
		$tagline = get_bloginfo('description');
		echo __( '<br/>Title: ' . $blog_title, 'tl_widget_domain');
        echo __( '<br/>Tagline: ' . $tagline, 'tl_widget_domain');
		echo $args['after_widget'];
	}

	// output the option form field in admin Widgets screen
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'tl_widget_domain' );
		}
		// Widget admin form
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}

	// save options
    public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
        }
    }
add_action( 'widgets_init', function(){
    register_widget( 'tl_Widget');
});
?>