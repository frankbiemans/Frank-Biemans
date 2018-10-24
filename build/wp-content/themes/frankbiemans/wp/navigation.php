<?php

add_action('init', 'register_theme_nav_menus');
function register_theme_nav_menus() {
    register_nav_menu('headermenu', 'Header Menu');
}