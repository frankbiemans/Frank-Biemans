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
    //get_template_part('partials/analyticstracking');
    get_template_part('partials/head/loader-css'); ?>
</head>
<body <?php body_class('page-loading'); ?>>
    <div id="master-wrapper">
        <div class="master-wrapper__inner">
            <?php //get_template_part('partials/loader'); ?>
            <?php //get_template_part('partials/cookie-banner'); ?>
            <?php //get_template_part('partials/main-nav'); ?>

            <div class="loading-screen">
                <div class="loading-screen__inner">
                    <div class="sk-cube-grid">
                        <div class="sk-cube sk-cube1"></div>
                        <div class="sk-cube sk-cube2"></div>
                        <div class="sk-cube sk-cube3"></div>
                        <div class="sk-cube sk-cube4"></div>
                        <div class="sk-cube sk-cube5"></div>
                        <div class="sk-cube sk-cube6"></div>
                        <div class="sk-cube sk-cube7"></div>
                        <div class="sk-cube sk-cube8"></div>
                        <div class="sk-cube sk-cube9"></div>
                    </div>
                </div>
            </div>