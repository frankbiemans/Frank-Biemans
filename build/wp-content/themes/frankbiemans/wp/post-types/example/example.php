<?php
    
    class Custom_Post_Type {

        public function set_singular_post_type_name($new_singular_post_type_name){
            $this->singular_post_type_name = strtolower($new_singular_post_type_name);
            $this->plural_post_type_name = $this->singular_post_type_name .'s';
        }
        public function set_plural_post_type_name($new_plural_post_type_name){
            $this->plural_post_type_name = $new_plural_post_type_name;
        }
    
        private function return_labels(){
            $labels =  array(
                'name' => ucfirst($this->plural_post_type_name),
                'menu_name' => ucfirst($this->plural_post_type_name),
                'name_admin_bar' => ucfirst($this->plural_post_type_name),
                'all_items' => 'All '. $this->plural_post_type_name,
                'add_new' => 'New '. $this->singular_post_type_name,
                'add_new_item' => 'Add new '. $this->singular_post_type_name,
                'edit_item' => 'Edit '. $this->singular_post_type_name,
                'new_item' => 'Add new '. $this->singular_post_type_name,
                'view_item' => 'View '. $this->singular_post_type_name,
                'search_items' => 'Search '. $this->plural_post_type_name,
                'not_found' => 'No '. $this->plural_post_type_name .' found',
                'not_found_in_trash' => 'No '. $this->plural_post_type_name .' found in trash'
            );
            return $labels;
        }
    
        public function register() {
            register_post_type( $this->singular_post_type_name , array(
                'labels' => $this->return_labels(),
                'menu_position' => 20, 
                'supports' => array( 'title', 'editor', 'excerpt', 'page-attributes' ), 
                'rewrite' => array( 'slug' => $this->singular_post_type_name ), 
                'hierarchical' => TRUE, 
                'public' => TRUE,
                'has_archive' => TRUE
            ));
        }
    }
    
    $example_post_type = new Custom_Post_Type();
    $example_post_type->set_singular_post_type_name('Example');
    $example_post_type->set_plural_post_type_name('Example\'s');
    $example_post_type->register();
    
    $new_post_type = new Custom_Post_Type();
    $new_post_type->set_singular_post_type_name('New');
    $new_post_type->register();