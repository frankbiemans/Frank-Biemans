<?php

// Zie ook: http://codex.wordpress.org/Function_Reference/add_meta_box

function register_example_meta_boxes() {
    add_meta_box(
        'example_selected_page', 
        'Select Page', 
        'render_example_selected_page_meta_box', 
        'example'
    );

    add_meta_box(
        'example_is_checked', 
        'Check Box', 
        'render_example_is_checked_meta_box', 
        'example', 
        'side'
    );
}

// Custom field: selected_page

function render_example_selected_page_meta_box( $post ) {
    $selected_page = get_post_meta( $post->ID, 'selected_page', true );
    
    wp_nonce_field( basename( __FILE__ ), 'example_selected_page_nonce' );
    wp_dropdown_pages( array(
        'name' => 'example_selected_page', 
        'selected' => $selected_page
    ) );
}

function save_example_selected_page( $post ) {
    $input = esc_attr( $_POST['example_selected_page'] );
    $meta_value = $input;

    $prev_value = get_post_meta( $post->ID, 'selected_page', true );
    $result = update_post_meta( $post->ID, 'selected_page', $meta_value, $prev_value );
}

// Custom field: is_checked

function render_example_is_checked_meta_box( $post ) {
    global $post;
    $value = get_post_meta( $post->ID, 'is_checked', true );

    $checked = $value ? 'checked' : '';

    $html = <<<ENDMARKUP
<label>
    <input type="checkbox" 
        id="example_is_checked"
        name="example_is_checked"
        $checked />
    Please check this box
</label>
ENDMARKUP;

    wp_nonce_field( basename( __FILE__ ), 'example_is_checked_nonce' );
    echo $html;
}

function save_example_is_checked( $post ) {
    $input = esc_attr( $_POST['example_is_checked'] );
    $meta_value = empty( $input ) ? false : true;

    $prev_value = get_post_meta( $post->ID, 'is_checked', true );
    update_post_meta( $post->ID, 'is_checked', $meta_value, $prev_value );
}

// Globale hook voor het opslaan van example post type

add_action( 'save_post', 'save_example' );
function save_example( $post_id ) {
    if( empty( $_POST ) ) return;
    
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
        return $post_id;
    }

    if( !current_user_can( 'edit_post', $post_id )) {
        return $post_id;
    }

    $post = get_post( $post_id );

    if( $post->post_type == 'example' ) {
        save_example_selected_page( $post );
        save_example_is_checked( $post );    
    }
}

// Kolommen in overzicht

// Zie ook: http://codex.wordpress.org/Plugin_API/Filter_Reference/manage_$post_type_posts_columns

add_filter( 'manage_example_posts_columns', 'columns_for_example' );
function columns_for_example( $columns ) {
    $columns_before = array_slice( $columns, 0, 2, true ); // cb, title
    $columns_after = array_slice( $columns, 2, count( $columns ) - 1, true ); // author, categories, tags, comments, date

    $columns_inserted = array();
    $columns_inserted['selected_page'] = 'Selected Page';
    $columns_inserted['is_checked'] = 'Checked';
    
    return array_merge( $columns_before, $columns_inserted, $columns_after );
}

// Zie ook: http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column

add_action( 'manage_pages_custom_column', 'custom_column_for_example', 10, 2 );
function custom_column_for_example( $column_name, $post_id ) {
    switch( $column_name ) {
        case 'selected_page':
            render_example_selected_page_column( $post_id );
            break;
        case 'is_checked': 
            render_example_is_checked_column( $post_id );
            break;
    }
}

function render_example_selected_page_column( $post_id ) {
    $selected_page_id = get_post_meta( $post_id, 'selected_page', true );
    $selected_page = get_post( $selected_page_id );

    $html = $selected_page ? $selected_page->post_title : '';
    echo $html;
}

function render_example_is_checked_column( $post_id ) {
    $is_checked = get_post_meta( $post_id, 'is_checked', true );
    $checked = $is_checked ? 'checked' : '';

    $html = "<input type=\"checkbox\" disabled $checked>";
    echo $html;
}