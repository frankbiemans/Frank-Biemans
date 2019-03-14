<?php get_header(); ?>

<section class="section section--full-height text-center">
    <div class="background-wrapper"></div>
    <div class="background-wrapper__overlay"></div>

    <div class="section__content-wrapper">
        <div class="container-fluid">
            <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post(); 
                    ?>
                    <div class="row justify-content-center">
                        <div class="col-11 col-md-8 col-xl-6">
                            <h1><span><?= bloginfo( 'name' ); ?></span></h1>
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-11 col-md-8 col-xl-6">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>


<section class="section section--full-height text-center">
    <div class="background-wrapper background-wrapper--full-color"></div>
    <div class="background-wrapper__overlay"></div>

    <div class="section__content-wrapper">
        <div class="container-fluid">
            <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post(); 
                    ?>
                    <div class="row justify-content-center">
                        <div class="col-11 col-md-8 col-xl-6">
                            <h1 class="white"><span><?= bloginfo( 'name' ); ?></span></h1>
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-11 col-md-8 col-xl-6">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>


<section class="section section--full-height text-center">
    <div class="background-wrapper background-wrapper--gray"></div>
    <div class="background-wrapper__overlay overlay--full-color"></div>

    <div class="section__content-wrapper">
        <div class="container-fluid">
            <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post(); 
                    ?>
                    <div class="row justify-content-center">
                        <div class="col-11 col-md-8 col-xl-6">
                            <h1 class="medium"><span><?= bloginfo( 'name' ); ?></span></h1>
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-11 col-md-8 col-xl-6">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>