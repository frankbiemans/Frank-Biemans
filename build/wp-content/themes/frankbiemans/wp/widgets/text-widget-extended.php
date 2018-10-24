<?php
// Register and load the widget
function wpb_load_widget() {
    register_widget( 'extended_text_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

// Creating the widget 
class extended_text_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'extended_text_widget', 
            __('Extended Text Widget', 'bs'), 
            array( 'description' => __( 'The text widget with an extra subtitle field.', 'bs' ), ) 
        );
    }

    public function widget( $args, $instance ) {
        $subtitle = $instance['subtitle'];
        $title = apply_filters( 'widget_title', $instance['title'] );
        $content = wpautop($instance['content']);
        $buttons = $instance['buttons'];

        echo $args['before_widget'];

        if(!empty($subtitle)){
            echo '<h6 class="section__h6">'. $subtitle .'</h6>';
        }

        if(!empty($title)){
            echo '<h2 class="section__h2">'. $title .'</h2>';
        }

        echo $content;

        foreach($buttons as $k => $button){
            if(!empty($button['label']) && !empty($button['label'])){
                echo '
                    <div class="c2a-holder widget__c2a-holder">
                        <a href="'. $button['link'] .'" target="'. $button['target'] .'" class="call-to-action call-to-action--primary">'. $button['label'] .'</a>
                    </div>
                ';
            }
        }
        
        echo $args['after_widget'];

    }

    public function form( $instance ) {
        $subtitle = '';
        if ( isset( $instance[ 'subtitle' ] ) )
            $subtitle = $instance[ 'subtitle' ];

        $title = '';
        if ( isset( $instance[ 'title' ] ) )
            $title = $instance[ 'title' ];

        $content = '';
        if ( isset( $instance[ 'content' ] ) )
            $content = $instance[ 'content' ];

        $button_label = '';
        if ( isset( $instance[ 'button_label' ] ) )
            $button_label = $instance[ 'button_label' ];

        $button_link = '';
        if ( isset( $instance[ 'button_link' ] ) )
            $button_link = $instance[ 'button_link' ];

        $button_target = '_self';
        if ( isset( $instance[ 'button_target' ] ) )
            $button_target = $instance[ 'button_target' ];

        $buttons = [''];
        if ( isset( $instance[ 'buttons' ] ) )
            $buttons = $instance[ 'buttons' ];

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'subtitle' ); ?>"><?php _e( 'Subtitle:', 'erikvera' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'erikvera' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e( 'Text:', 'erikvera' ); ?></label>
            <textarea rows="6" class="widefat" id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>"><?php echo $content; ?></textarea>
        </p>

        <?php /* 
        <hr />
        <p>
            <label for="<?php echo $this->get_field_id( 'button_label' ); ?>"><?php _e( 'Button label:', 'erikvera' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button_label' ); ?>" name="<?php echo $this->get_field_name( 'button_label' ); ?>" type="text" value="<?php echo esc_attr( $button_label ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'button_link' ); ?>"><?php _e( 'Button link:', 'erikvera' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button_link' ); ?>" name="<?php echo $this->get_field_name( 'button_link' ); ?>" type="text" value="<?php echo esc_attr( $button_link ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'button_link' ); ?>"><?php _e( 'Button target:', 'erikvera' ); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id( 'button_target' ); ?>" name="<?php echo $this->get_field_name( 'button_target' ); ?>">
                <option value="_self"<?php if($button_target == '_self' ){ echo ' selected'; } ?>><?php _e( 'Stay in the same screen', 'erikvera' ); ?></option>
                <option value="_blank"<?php if($button_target == '_blank' ){ echo ' selected'; } ?>><?php _e( 'Open a new tab', 'erikvera' ); ?></option>
            </select>
        </p>
        */ ?>

        <?php foreach($buttons as $k => $button) { ?>
        <fieldset>
            <!--<legend>Button <?= ($k+1); ?>:</legend>-->
            <p>
                <label><?php _e( 'Button label:', 'erikvera' ); ?></label>
                <input class="widefat" name="<?php echo $this->get_field_name( 'buttons['. $k .'][label]' ); ?>" type="text" type="text" value="<?= $instance['buttons'][$k]['label']; ?>" />
            </p>
            <p>
                <label><?php _e( 'Button link:', 'erikvera' ); ?></label>
                <input class="widefat" name="<?php echo $this->get_field_name( 'buttons['. $k .'][link]' ); ?>" type="text" value="<?= $instance['buttons'][$k]['link']; ?>" />
            </p>
            <p>
                <label><?php _e( 'Button target:', 'erikvera' ); ?></label>
                <select class="widefat" name="<?php echo $this->get_field_name( 'buttons['. $k .'][target]' ); ?>">
                    <option value="_self"<?php if($instance['buttons'][$k]['target'] == '_self' ){ echo ' selected'; } ?>><?php _e( 'Stay in the same screen', 'erikvera' ); ?></option>
                    <option value="_blank"<?php if($instance['buttons'][$k]['target'] == '_blank' ){ echo ' selected'; } ?>><?php _e( 'Open a new tab', 'erikvera' ); ?></option>
                </select>
            </p>
        </fieldset>
    <?php }
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['subtitle'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['subtitle'] ) : '';
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['content'] = ( ! empty( $new_instance['content'] ) ) ? strip_tags( $new_instance['content'] ) : '';
        // $instance['button_label'] = ( ! empty( $new_instance['button_label'] ) ) ? strip_tags( $new_instance['button_label'] ) : '';
        // $instance['button_link'] = ( ! empty( $new_instance['button_link'] ) ) ? strip_tags( $new_instance['button_link'] ) : '';
        // $instance['button_target'] = ( ! empty( $new_instance['button_target'] ) ) ? strip_tags( $new_instance['button_target'] ) : '';

        $instance['buttons'] = ( ! empty( $new_instance['buttons'] ) ) ? $new_instance['buttons'] : '';

        return $instance;
    }
}