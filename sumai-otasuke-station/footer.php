<?php
/** Site footer. @package Sumai_Otasuke_Station */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$phone = get_theme_mod( 'sos_phone', '093-482-9544' );
$line  = get_theme_mod( 'sos_line_url', '' );
?>
<footer class="site-footer">
	<div class="shell footer-grid">
		<div><a class="brand footer-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="brand-mark">助</span><span class="brand-copy"><strong>住まいのお助け</strong><small>便利屋ステーション</small></span></a><p>困ったときも、集まりたいときも。<br><?php echo esc_html( get_theme_mod( 'sos_address', '〒809-0015 福岡県中間市太賀1丁目2-1' ) ); ?><br><a href="tel:<?php echo esc_attr( sos_phone_href() ); ?>">TEL <?php echo esc_html( $phone ); ?></a></p></div>
		<nav aria-label="フッターナビゲーション"><?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'fallback_cb' => 'sos_fallback_menu', 'depth' => 1 ) ); ?></nav>
	</div>
	<div class="shell footer-bottom"><small>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></small><a href="<?php echo esc_url( get_privacy_policy_url() ?: home_url( '/privacy-policy/' ) ); ?>">プライバシーポリシー</a></div>
</footer>
<nav class="mobile-cta" aria-label="固定お問い合わせ">
	<a href="<?php echo esc_url( home_url( '/#contact-handyman' ) ); ?>"><span>⌂</span>便利屋相談</a>
	<a href="<?php echo esc_url( home_url( '/#contact-space' ) ); ?>"><span>◎</span>スペース予約</a>
	<?php if ( $phone ) : ?><a href="tel:<?php echo esc_attr( sos_phone_href() ); ?>"><span>☎</span>電話</a><?php elseif ( $line ) : ?><a href="<?php echo esc_url( $line ); ?>" target="_blank" rel="noopener"><span>LINE</span>相談</a><?php else : ?><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><span>✉</span>フォーム</a><?php endif; ?>
</nav>
<?php wp_footer(); ?>
</body>
</html>
