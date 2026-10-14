<?php
/** Lightweight SEO output that avoids invented business facts. */

if ( ! defined( 'ABSPATH' ) ) { exit; }

remove_action( 'wp_head', 'rel_canonical' );

function sos_meta_output() {
	$description = get_theme_mod( 'sos_meta_desc', '' );
	if ( is_singular() && has_excerpt() ) { $description = get_the_excerpt(); }
	$description = wp_strip_all_tags( (string) $description );
	if ( is_front_page() ) {
		$url = home_url( '/' );
	} elseif ( is_singular() ) {
		$url = get_permalink();
	} elseif ( is_post_type_archive() ) {
		$url = get_post_type_archive_link( get_query_var( 'post_type' ) );
	} elseif ( is_category() || is_tag() || is_tax() ) {
		$url = get_term_link( get_queried_object() );
		$url = is_wp_error( $url ) ? get_pagenum_link() : $url;
	} else {
		$url = get_pagenum_link();
	}
	$ogp_id      = absint( get_theme_mod( 'sos_ogp_image' ) );
	$ogp         = $ogp_id ? wp_get_attachment_image_url( $ogp_id, 'full' ) : SOS_URI . '/assets/images/ogp.svg';
	if ( $description ) { echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n"; }
	echo '<link rel="canonical" href="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:type" content="' . ( is_singular() && ! is_front_page() ? 'article' : 'website' ) . '">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( wp_get_document_title() ) . '">' . "\n";
	if ( $description ) { echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n"; }
	echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:image" content="' . esc_url( $ogp ) . '">' . "\n";

	if ( is_front_page() ) {
		$business = array( '@context' => 'https://schema.org', '@type' => 'LocalBusiness', 'name' => get_bloginfo( 'name' ), 'url' => home_url( '/' ), 'description' => $description, 'address' => array( '@type' => 'PostalAddress', 'addressLocality' => '中間市', 'addressRegion' => '福岡県', 'addressCountry' => 'JP' ) );
		$address = get_theme_mod( 'sos_address', '〒809-0015 福岡県中間市太賀1丁目2-1' );
		$phone   = get_theme_mod( 'sos_phone', '093-482-9544' );
		$map_url = get_theme_mod( 'sos_map_url', 'https://maps.app.goo.gl/yeaZ6yz4LMFyfDXK8?g_st=in' );
		$hours   = get_theme_mod( 'sos_hours', '' );
		if ( '〒809-0015 福岡県中間市太賀1丁目2-1' === $address ) {
			$business['address']['postalCode']    = '809-0015';
			$business['address']['streetAddress'] = '太賀1丁目2-1';
		} elseif ( $address ) {
			$business['address']['streetAddress'] = $address;
		}
		if ( $phone ) { $business['telephone'] = $phone; }
		if ( $map_url ) { $business['hasMap'] = $map_url; }
		if ( $hours ) { $business['openingHours'] = $hours; }
		echo '<script type="application/ld+json">' . wp_json_encode( $business, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";

		$faqs = get_posts( array( 'post_type' => 'faq', 'numberposts' => 30, 'post_status' => 'publish', 'orderby' => array( 'menu_order' => 'ASC', 'date' => 'DESC' ) ) );
		$entities = array();
		if ( $faqs ) {
			foreach ( $faqs as $faq ) { $entities[] = array( '@type' => 'Question', 'name' => get_the_title( $faq ), 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => wp_strip_all_tags( apply_filters( 'the_content', $faq->post_content ) ) ) ); }
		} else {
			$entities = array(
				array( '@type' => 'Question', 'name' => '便利屋の見積もりは本当に無料ですか？', 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => 'お見積もりは無料です。作業内容と料金にご納得いただいてから進めます。' ) ),
				array( '@type' => 'Question', 'name' => 'コミュニティスペースは誰でも無料で使えますか？', 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => '無料開放は地域交流など所定の目的・条件に合う活動が対象です。すべての利用が無料になるわけではありません。' ) ),
			);
		}
		echo '<script type="application/ld+json">' . wp_json_encode( array( '@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $entities ), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
	}
}
add_action( 'wp_head', 'sos_meta_output', 5 );
