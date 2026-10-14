<?php
/** Reusable presentation helpers. */

if ( ! defined( 'ABSPATH' ) ) { exit; }

function sos_asset_image( $setting, $fallback, $alt, $class = '', $loading = 'lazy' ) {
	$id = absint( get_theme_mod( $setting ) );
	if ( $id ) {
		echo wp_get_attachment_image( $id, 'full', false, array( 'alt' => $alt, 'class' => $class, 'loading' => $loading, 'decoding' => 'async' ) );
		return;
	}
	printf( '<img src="%1$s" width="760" height="600" alt="%2$s" class="%3$s" loading="%4$s" decoding="async">', esc_url( SOS_URI . '/assets/images/' . $fallback ), esc_attr( $alt ), esc_attr( $class ), esc_attr( $loading ) );
}

function sos_fallback_menu() {
	$links = array( '#handyman' => '便利屋サービス', '#space' => 'スペース', '#cases' => '利用事例', '#faq' => 'よくある質問', '#access' => 'アクセス' );
	echo '<ul class="menu">';
	foreach ( $links as $url => $label ) { printf( '<li><a href="%s">%s</a></li>', esc_url( home_url( '/' . $url ) ), esc_html( $label ) ); }
	echo '</ul>';
}

function sos_breadcrumbs() {
	if ( is_front_page() ) { return; }
	echo '<nav class="breadcrumbs shell" aria-label="パンくず"><a href="' . esc_url( home_url( '/' ) ) . '">ホーム</a><span aria-hidden="true">›</span>';
	if ( is_singular() ) {
		$post_type = get_post_type_object( get_post_type() );
		if ( $post_type && ! in_array( get_post_type(), array( 'post', 'page' ), true ) ) { echo '<a href="' . esc_url( get_post_type_archive_link( get_post_type() ) ) . '">' . esc_html( $post_type->labels->name ) . '</a><span aria-hidden="true">›</span>'; }
		echo '<span aria-current="page">' . esc_html( get_the_title() ) . '</span>';
	} elseif ( is_archive() ) {
		echo '<span aria-current="page">' . esc_html( get_the_archive_title() ) . '</span>';
	} else {
		echo '<span aria-current="page">' . esc_html( wp_get_document_title() ) . '</span>';
	}
	echo '</nav>';
}

function sos_phone_href() {
	return preg_replace( '/[^0-9+]/', '', (string) get_theme_mod( 'sos_phone', '093-482-9544' ) );
}

function sos_service_list( $number, $default ) {
	$lines = preg_split( '/\R/u', get_theme_mod( 'sos_service_' . $number . '_items', $default ) );
	echo '<ul>';
	foreach ( array_filter( array_map( 'trim', $lines ) ) as $line ) { echo '<li>' . esc_html( $line ) . '</li>'; }
	echo '</ul>';
}

function sos_case_cards( $post_type ) {
	$query = new WP_Query( array( 'post_type' => $post_type, 'posts_per_page' => 3, 'post_status' => 'publish' ) );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$terms = get_the_terms( get_the_ID(), $post_type . '_category' );
			$label = $terms && ! is_wp_error( $terms ) ? $terms[0]->name : get_post_type_object( $post_type )->labels->singular_name;
			echo '<article class="case-card"><a href="' . esc_url( get_permalink() ) . '">';
			if ( has_post_thumbnail() ) { the_post_thumbnail( 'sos-case-card', array( 'loading' => 'lazy' ) ); } else { echo '<img src="' . esc_url( SOS_URI . '/assets/images/' . ( 'handyman_case' === $post_type ? 'case-handyman-01.svg' : 'case-space-01.svg' ) ) . '" width="600" height="400" alt="">'; }
			echo '<div><span>' . esc_html( $label ) . '</span><h3>' . esc_html( get_the_title() ) . '</h3><p>' . esc_html( wp_trim_words( get_the_excerpt(), 28 ) ) . '</p></div></a></article>';
		}
		wp_reset_postdata();
		return;
	}
	$fallback = 'handyman_case' === $post_type
		? array( array( 'case-handyman-01.svg', 'お庭のお手入れ', '伸びた庭木をすっきり、明るいお庭へ' ), array( 'case-handyman-02.svg', '片付け', '一緒に仕分けながら、安心のお片付け' ), array( 'case-handyman-03.svg', '住まいの修繕', '気になっていた小さな傷みを補修' ) )
		: array( array( 'case-space-01.svg', '教室', 'みんなで楽しむハンドメイド教室' ), array( 'case-space-02.svg', '学び', '地域で学ぶ、やさしいスマホ講座' ), array( 'case-space-03.svg', '展示', 'まちの作り手が集う小さな作品展' ) );
	foreach ( $fallback as $card ) {
		printf( '<article class="case-card"><img src="%1$s" width="600" height="400" loading="lazy" alt="%2$sの仮画像"><div><span>%2$s</span><h3>%3$s</h3><p>公開後、管理画面から実例に差し替えできます</p></div></article>', esc_url( SOS_URI . '/assets/images/' . $card[0] ), esc_html( $card[1] ), esc_html( $card[2] ) );
	}
}

function sos_news_items() {
	$query = new WP_Query( array( 'post_type' => 'news', 'posts_per_page' => 3, 'post_status' => 'publish' ) );
	if ( ! $query->have_posts() ) {
		echo '<article><time>公開準備中</time><span>お知らせ</span><a href="#news">お知らせは管理画面から追加できます</a></article>';
		return;
	}
	while ( $query->have_posts() ) {
		$query->the_post();
		$terms = get_the_terms( get_the_ID(), 'news_category' );
		$label = $terms && ! is_wp_error( $terms ) ? $terms[0]->name : 'お知らせ';
		printf( '<article><time datetime="%1$s">%2$s</time><span>%3$s</span><a href="%4$s">%5$s</a></article>', esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date( 'Y.m.d' ) ), esc_html( $label ), esc_url( get_permalink() ), esc_html( get_the_title() ) );
	}
	wp_reset_postdata();
}

function sos_faq_items() {
	$faqs = get_posts( array( 'post_type' => 'faq', 'numberposts' => 20, 'post_status' => 'publish', 'orderby' => array( 'menu_order' => 'ASC', 'date' => 'DESC' ) ) );
	if ( ! $faqs ) {
		$faqs = array(
			array( '便利屋の見積もりは本当に無料ですか？', 'お見積もりは無料です。作業内容と料金にご納得いただいてから進めます。' ),
			array( 'コミュニティスペースは誰でも無料で使えますか？', '無料開放は地域交流など所定の目的・条件に合う活動が対象です。すべての利用が無料になるわけではありません。' ),
			array( '「880円／時間〜」以外に費用はかかりますか？', '利用内容・時間・設備・商用利用の有無などにより料金や条件が異なる場合があります。予約前に総額をご案内します。' ),
			array( 'どんな不用品でも処分できますか？', '品目や状態を確認し、法令・許認可に沿った対応方法をご案内します。対応可否は事前確認が必要です。' ),
		);
		foreach ( $faqs as $faq ) { printf( '<details><summary><span>Q</span>%1$s</summary><div><span>A</span><p>%2$s</p></div></details>', esc_html( $faq[0] ), esc_html( $faq[1] ) ); }
		return;
	}
	foreach ( $faqs as $faq ) { printf( '<details><summary><span>Q</span>%1$s</summary><div><span>A</span><div>%2$s</div></div></details>', esc_html( get_the_title( $faq ) ), wp_kses_post( apply_filters( 'the_content', $faq->post_content ) ) ); }
}
