<?php get_header(); ?>

<section class="platos-principales">
    <div class="container">
        

        <div class="title-section">
            <h1><?php the_title();?></h1>
        </div>
        <p class="text-center">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
        </p>
        <div>
            <?php the_post(); the_content(); ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>