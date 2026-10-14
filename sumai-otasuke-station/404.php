<?php
/** 404 page. @package Sumai_Otasuke_Station */
get_header();
?>
<main id="main" class="entry-main"><div class="shell compact-shell not-found"><span class="error-code">404</span><header class="page-header"><h1>ページが見つかりません</h1></header><p>URLが変更されたか、ページが削除された可能性があります。</p><a class="button primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">トップページへ戻る</a></div></main>
<?php get_footer(); ?>
