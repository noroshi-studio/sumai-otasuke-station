<?php
/** Card used in archives. @package Sumai_Otasuke_Station */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><a href="<?php the_permalink(); ?>">
	<?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'sos-case-card', array( 'loading' => 'lazy' ) ); endif; ?>
	<div class="entry-card-body"><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time><h2><?php the_title(); ?></h2><p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 36 ) ); ?></p></div>
</a></article>
