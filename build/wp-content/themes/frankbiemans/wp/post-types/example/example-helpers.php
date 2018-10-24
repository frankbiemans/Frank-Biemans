<?php

// Herbruikbare render helpers om complexe markup te genereren

function render_example_preview( $example, $args = array() ) {
    $defaults = array( 'class_names' => 'preview example', 'h' => 'h2' );
    $args = ( object ) wp_parse_args( $args, $defaults );

    $html = <<<ENDMARKUP
<div class="$args->class_names">
    <$args->h>$example->post_title</$args->h>
    <p class="excerpt">$example->post_excerpt</p>
</div>
ENDMARKUP;

    echo $html;
}

function render_example( $example, $args = array() ) {
    $defaults = array( 'class_names' => 'example', 'h' => 'h1' );
    $args = ( object ) wp_parse_args( $args, $defaults );

    $html = <<<ENDMARKUP
<div class="$args->class_names">
    <$args->h>$example->post_title</$args->h>
    <div class="content">
        $example->post_content
    </div>
</div>
ENDMARKUP;

    echo $html;
}