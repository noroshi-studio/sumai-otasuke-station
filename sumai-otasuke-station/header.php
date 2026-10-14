<?php
/** Site header. @package Sumai_Otasuke_Station */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#0b604d">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main"><?php esc_html_e( '本文へ移動する', 'sumai-otasuke-station' ); ?></a>
<div class="scroll-progress" aria-hidden="true"><span></span></div>
<header class="site-header" id="top">
	<div class="header-inner shell">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> ホーム">
			<?php if ( has_custom_logo() ) : $logo_id = get_theme_mod( 'custom_logo' ); echo wp_get_attachment_image( $logo_id, 'full', false, array( 'class' => 'custom-logo', 'alt' => get_bloginfo( 'name' ) ) ); else : ?>
				<span class="brand-mark" aria-hidden="true">助</span><span class="brand-copy"><strong>住まいのお助け</strong><small>便利屋ステーション</small></span>
			<?php endif; ?>
		</a>
		<button class="menu-button" type="button" aria-controls="global-nav" aria-expanded="false"><span></span><span></span><span></span><b>メニュー</b></button>
		<nav class="global-nav" id="global-nav" aria-label="メインナビゲーション">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'fallback_cb' => 'sos_fallback_menu', 'depth' => 1 ) ); ?>
		</nav>
		<a class="header-cta" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><span>お気軽に</span>相談する</a>
	</div>
</header>
<?php sos_breadcrumbs(); ?>
