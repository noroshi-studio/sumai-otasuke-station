<?php
/** Archive template. @package Sumai_Otasuke_Station */
get_header();
?>
<main id="main" class="entry-main"><div class="shell">
	<header class="page-header"><h1><?php the_archive_title(); ?></h1><?php the_archive_description( '<div class="archive-description">', '</div>' ); ?></header>
	<?php if ( have_posts() ) : ?><div class="post-list"><?php while ( have_posts() ) : the_post(); get_template_part( 'template-parts/content', 'card' ); endwhile; ?></div><?php the_posts_pagination(); else : get_template_part( 'template-parts/content', 'none' ); endif; ?>
</div></main>
<?php get_footer(); ?>
