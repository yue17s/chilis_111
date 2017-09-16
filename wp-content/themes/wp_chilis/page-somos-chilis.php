<?php get_header(); ?>

<section>

    <div class="titulo-somos">
        <h1><?php the_title(); ?> <br>Te esperamos</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center contenido-somos">
                <?php the_post(); the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>