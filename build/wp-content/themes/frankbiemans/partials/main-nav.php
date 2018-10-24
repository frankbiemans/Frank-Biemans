<nav class="top-navigation">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                $headermenu = ag_get_theme_menu('headermenu');
                if(is_object($headermenu)){
                    $headermenu_atts = get_object_vars( $headermenu );
                    $args = [
                        'menu' => $headermenu_atts['name'],
                        'container' => 'div',
                        'container_class' => 'float-right'
                    ];
                    wp_nav_menu( $args );
                }
                ?>
            </div>
        </div>
    </div>
</nav>