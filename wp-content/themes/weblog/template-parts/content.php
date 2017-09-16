<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Weblog
 */
$weblog_customizer_all_values = weblog_get_theme_options();
$weblog_get_image_sizes_options = $weblog_customizer_all_values['weblog-blog-archive-image-size'];
$weblog_blog_archive_read_more = $weblog_customizer_all_values['weblog-blog-archive-more-text'];
$no_image ='';
if( !has_post_thumbnail() || $weblog_customizer_all_values['weblog-blog-archive-layout'] != 'full-image' ){
	$no_image = 'acme-no-image';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('acme-col-3 masonry-post'); ?>>
	<div class="inner-wrapper <?php echo $no_image?>">
		<?php
		if( has_post_thumbnail() && $weblog_customizer_all_values['weblog-blog-archive-layout'] == 'full-image' ){
			?>
			<!--post thumbnal options-->
			<div class="post-thumb">
				<?php
				if( is_sticky() ){
					?>
					<a href="<?php the_permalink(); ?>">
						<span class="fa fa-sticky-note sticky-format-icon"></span>
					</a>
					<?php
				}
				?>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail($weblog_get_image_sizes_options)?>
				</a>
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php weblog_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
				<a href="<?php the_permalink(); ?>">
					<span class="format-icon"></span>
				</a>
			</div><!-- .post-thumb-->
			<?php
		}
		else{
			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php weblog_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif;
		}
		?>
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->
		<footer class="entry-footer">
			<?php weblog_entry_footer( 1, 0 , 0 ); ?>
		</footer><!-- .entry-footer -->
		<div class="entry-content">
			<?php
            the_excerpt();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'weblog' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
        <?php
		if( !empty( $weblog_blog_archive_read_more ) ){
			?>
            <div class="read-more">
                <a href="<?php the_permalink()?>" class="read-more-btn">
	                <?php echo esc_html( $weblog_blog_archive_read_more ); ?>
                </a>
            </div>
			<?php
		}
		?>
	</div>
	
</article><!-- #post-## -->
