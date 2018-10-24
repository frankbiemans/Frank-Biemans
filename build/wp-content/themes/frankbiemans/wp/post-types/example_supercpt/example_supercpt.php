<?php
    // https://github.com/mboynes/super-cpt
    add_action( 'after_setup_theme', 'add_example_supercpt' );

    function add_example_supercpt(){
        if( !class_exists( 'Super_Custom_Post_Type' ) )
            return;

        $supercpt = new Super_Custom_Post_Type( 'super_cpt' );
        $supercpt->add_meta_box( array(
            'id' => 'details',
            'context' => 'side',
            'fields' => array(
                'subline' => array( 'placeholder' => 'Tagline' ),
                'extra_info' => array( 'type' => 'textarea' ),
                'date' => array( 'type' => 'date' ),
                'keuze_velden' => array( 'type' => 'checkbox', 'options' => array("Lorem", "Ipsum", "At Quira"))
            )
        ) );
        $supercpt->add_meta_box( array(
            'id' => 'second_wysiwyg',
            'context' => 'normal',
            'fields' => array(
                'wysiwyg_editor' => array( "type" => "wysiwyg" )
            )
        ) );
        $supercpt->set_icon( 'cloud' );
        $supertax = new Super_Custom_Taxonomy( 'super_tax' );
        $secondtax = new Super_Custom_Taxonomy( 'second_tax', 'Second Tax', 'Second Taxs', 'category' );
        connect_types_and_taxes( $supercpt, array($supertax, $secondtax) );

    }