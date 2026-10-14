<?php
/** Page template. @package Sumai_Otasuke_Station */
get_header();
?>
<main id="main" class="entry-main"><div class="shell">
	<?php while ( have_posts() ) : the_post(); ?><article <?php post_class(); ?>><header class="page-header"><h1><?php the_title(); ?></h1></header><div class="entry-content"><?php the_content(); wp_link_pages(); ?></div></article><?php endwhile; ?>
</div></main>
<?php get_footer(); ?>
