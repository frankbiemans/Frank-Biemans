<?php get_header(); ?>
<div class="container">
    <?php
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); 
            ?>
            <div class="row">
                <div class="col-12">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <?php the_content(); ?>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
<?php get_footer(); ?>