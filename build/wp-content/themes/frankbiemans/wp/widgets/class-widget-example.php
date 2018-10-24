<?php

// Zie ook: http://justintadlock.com/archives/2009/05/26/the-complete-guide-to-creating-widgets-in-wordpress-28

add_action( 'widgets_init', 'register_example_widgets' );
function register_example_widgets() {
    register_widget('Example_Widget');
}

class Example_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
	 		'example_widget',
			__( 'Example' ),
			array( 'description' => __( 'Example widget' ) ) 
		);
    }

	public function widget( $args, $instance ) {
        extract( $args );
        ob_start();
        ?>
	        Hoi, deze tekst komt in de '$content' variabele.
        <?php
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
	}
}