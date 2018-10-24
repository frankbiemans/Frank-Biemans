<?php
// Register and load the widget
function cf7_load_widget() {
    register_widget( 'contact_form_7_widget' );
}
add_action( 'widgets_init', 'cf7_load_widget' );

// Creating the widget 
class contact_form_7_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'contact_form_7_widget', 
            __('Contact Form 7 Widget', 'nosuch'), 
            array( 'description' => __( 'A very simple widget which can be used to show one of your CF7 forms.', 'nosuch' ), ) 
        );
    }

    public function widget( $args, $instance ) {
        $form = $instance['form'];
        echo $args['before_widget'];
        echo 'Contact Form 7 plugin';
        echo $form;
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $form = '';
        if ( isset( $instance[ 'form' ] ) )
            $form = $instance[ 'form' ];

        $available_forms = get_posts(array(
            'post_type'     => 'wpcf7_contact_form',
            'numberposts'   => -1
        ));

        $options = [];
        foreach($available_forms as $f){
            $options[$f->ID] = $f->post_title;
        }
        ?>
        <p>Current: <?= $form; ?></p>
        <p>
            <select id="<?php echo $this->get_field_id( 'form' ); ?>" name="<?php echo $this->get_field_name( 'form' ); ?>">
                <?php foreach($options as $k => $option){ ?>
                    <option value="<?= $k; ?>"<?php if($k == $form){ ?> selected<?php } ?>><?= $option; ?></option>
                <?php } ?>
            </select>
        </p>
        <?php 
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['form'] = ( ! empty( $new_instance['form'] ) ) ? strip_tags( $new_instance['form'] ) : '';
        return $instance;
    }
}