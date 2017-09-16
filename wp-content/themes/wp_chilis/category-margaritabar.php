<?php get_header(); ?>

<div class="home-slider">
    <img src="<?PHP bloginfo('template_directory'); ?>/img/banner_1.png" class="img-slider" alt="Always Happy">
    <img src="<?PHP bloginfo('template_directory'); ?>/img/banner_1.png" class="img-slider" alt="Always Happy">
</div>

<section class="platos-principales">
    <div class="container">
<!--        
            <h1><?php the_title(); ?></h1>
            <div>
                <?php the_content(); ?>
            </div>
-->                
        <div class="row">
        <?php while (have_posts()): the_post(); ?> <!--crea un bucle siempre q have_post() muestre true  : whiles se ejecutara desde ahi hasta el endwhile;-->
            <div class="col-md-3 list-item">
                <img class="img-responsive" src="<?php the_post_thumbnail_url(); ?>" alt="">
                <h3><?php the_title();  ?></h3>
                <p><?php the_excerpt(); ?></p> <!-- jala el extracto de WORDPRESS -->
                <a href="<?php the_permalink(); ?>">Ver más</a>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>