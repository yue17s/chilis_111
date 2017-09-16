<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Weblog
 */
$weblog_customizer_all_values = weblog_get_theme_options();
$no_image ='';
if( !has_post_thumbnail() ){
	$no_image = 'acme-no-image';
}

$weblog_single_image_size = $weblog_customizer_all_values['weblog-single-image-size']

?>
<article id="post-<?php the_ID(); ?>" <?php post_class($no_image); ?>>
	<!--post thumbnal options-->
	<?php
	if( has_post_thumbnail() ){
		?>
		<div class="single-feat clearfix">
			<figure class="single-thumb single-thumb-full">
				<?php
				the_post_thumbnail( $weblog_single_image_size );
				?>
			</figure>
			<div class="entry-meta">
				<?php weblog_posted_on(); ?>
			</div><!-- .entry-meta -->
		</div><!-- .single-feat-->
	<?php
	}
	if( !( has_post_thumbnail() ) ){
		?>
		<div class="entry-meta">
			<?php weblog_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
	}
	?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<footer class="entry-footer">
		<?php weblog_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<div class="clearfix"></div>
	<div class="entry-content">
		<?php
        the_content();
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'weblog' ),
            'after'  => '</div>',
        ) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

