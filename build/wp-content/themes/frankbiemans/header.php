<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset='<?php bloginfo( 'charset' ) ?>'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv='x-ua-compatible' content='ie=edge'>
    <title><?php wp_title( ' - ', 1, 'right' ); bloginfo( 'name' ); ?></title>
    <link rel='shortcut icon' href='<?php bloginfo( 'template_url' ) ?>/images/favicon.png'>
    <?php get_template_part('partials/head/og-tags');
    if(!is_plugin_active('wordpress-seo/wp-seo.php')){ ?><meta name='description' content='<?php bloginfo('description'); ?>'><?php }
    wp_head();
    get_template_part('partials/analyticstracking');
    get_template_part('partials/head/loader-css'); ?>
</head>
<body <?php body_class(); ?>>
    <div id="master-wrapper">
        <div class="master-wrapper__inner">
            <?php get_template_part('partials/loader'); ?>
            <?php get_template_part('partials/cookie-banner'); ?>
            <?php get_template_part('partials/main-nav'); ?>