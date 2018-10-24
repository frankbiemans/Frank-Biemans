<?php

add_action( 'admin_head', 'example_styles' );
function example_styles() {
    global $post_type;
	?>
	<style>
	    <?php if ( isset( $_GET['post_type'] ) && ( $_GET['post_type'] == 'example' ) || ( $post_type == 'example' ) ) : ?>
	        #icon-edit { 
                background:transparent url(<?php echo get_stylesheet_directory_uri() . '/images/icons/cup--pencil.png' ?>) no-repeat 6px 6px;
            }
	    <?php endif; ?>

        #adminmenu #menu-posts-example div.wp-menu-image {
            background: transparent url(<?php echo get_stylesheet_directory_uri() . '/images/icons/cup-empty.png' ?>) no-repeat 6px 6px;
        }
	    #adminmenu #menu-posts-example:hover div.wp-menu-image, 
        #adminmenu #menu-posts-example.wp-has-current-submenu div.wp-menu-image {
            background: transparent url(<?php echo get_stylesheet_directory_uri() . '/images/icons/cup.png' ?>) no-repeat 6px 6px;
        }
    </style>
    <?php
}

add_filter( 'post_updated_messages', 'post_updated_messages_for_example' );
function post_updated_messages_for_example( $messages ) {
  global $post, $post_ID;

  $messages['example'] = array(
    0 => '',
    1 => sprintf( __( 'Example updated. <a href="%s">View example</a>' ), esc_url( get_permalink( $post_ID ) ) ),
    2 => __( 'Custom field updated.' ),
    3 => __( 'Custom field deleted.' ),
    4 => __( 'Example updated.' ),
    5 => isset( $_GET['revision'] ) ? sprintf( __( 'Example restored to revision from %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __( 'Example published. <a href="%s">View example</a>' ), esc_url( get_permalink( $post_ID ) ) ),
    7 => __( 'Example saved.' ),
    8 => sprintf( __( 'Example submitted. <a target="_blank" href="%s">Preview example</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __( 'Example scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview example</a>'),
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
    10 => sprintf( __( 'Example draft updated. <a target="_blank" href="%s">Preview example</a>' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}

add_action( 'contextual_help', 'contextual_help_for_example', 10, 3 );
function contextual_help_for_example( $contextual_help, $screen_id, $screen ) { 
  if ( 'example' == $screen->id ) {
    $contextual_help ='<p>This is just an example.</p>';
  } elseif ( 'edit-example' == $screen->id ) {
    $contextual_help = '<p>These are just examples.</p>';
  }
  return $contextual_help;
}