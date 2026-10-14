<?php
/** Singular post template. @package Sumai_Otasuke_Station */
get_header();
?>
<main id="main" class="entry-main"><div class="shell">
	<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class(); ?>><header class="page-header"><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time><h1><?php the_title(); ?></h1></header>
		<div class="entry-content"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large', array( 'loading' => 'eager' ) ); } the_content(); wp_link_pages(); ?></div>
	</article>
	<?php the_post_navigation(); endwhile; ?>
</div></main>
<?php get_footer(); ?>
