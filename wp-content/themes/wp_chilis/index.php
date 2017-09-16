<?php get_header(); ?>

<section class="platos-principales">
    <div class="container">
        
        <div class="home-slider">
    <?php if(get_field('imagen_1')): ?>
    <img src="<?php echo get_field('imagen_1'); ?>" class="img-slider" alt="Always Happy">
    <?php endif; ?>
    
    <?php if(get_field('imagen_2')): ?>
    <img src="<?php echo get_field('imagen_2'); ?>" class="img-slider" alt="Always Happy">
    <?php endif; ?>
    
    <?php if(get_field('imagen_3')): ?>
    <img src="<?php echo get_field('imagen_3'); ?>" class="img-slider" alt="Always Happy">
    <?php endif; ?>
</div>

        <div class="title-section">
            <h1><?php the_title();?></h1>
        </div>
        <p class="text-center">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
            <img class="img-responsive" src="<?php echo get_field('imagen_cabecera'); ?>" alt="">
        </p>
        <div>
            <?php the_post(); the_content(); ?>
        </div>
        <div>
            <span class="badge">S/<?php echo get_field('precio'); ?>.00</span>
        </div>
    </div>
</section>

<?php get_footer(); ?>