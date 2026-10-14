<?php
/** Customizer controls for store data and landing-page content. */

if ( ! defined( 'ABSPATH' ) ) { exit; }

function sos_sanitize_shortcode( $value ) {
	return current_user_can( 'unfiltered_html' ) ? wp_kses_post( $value ) : sanitize_text_field( $value );
}

function sos_customize_register( $customizer ) {
	$customizer->add_panel( 'sos_site', array( 'title' => '店舗・LP設定', 'priority' => 30 ) );
	$sections = array(
		'sos_hero'    => 'ファーストビュー',
		'sos_services'=> '便利屋サービス',
		'sos_store'   => '店舗・連絡先',
		'sos_space'   => 'スペース・料金',
		'sos_contact' => 'お問い合わせフォーム',
		'sos_seo'     => 'SEO・SNS',
	);
	foreach ( $sections as $id => $title ) {
		$customizer->add_section( $id, array( 'title' => $title, 'panel' => 'sos_site' ) );
	}

	$fields = array(
		'sos_main_copy'     => array( 'sos_hero', 'メインコピー（改行は <br>、強調は <span>…</span>）', '住まいの<span>「困った」</span>も、<br>みんなの<span>「やりたい」</span>も。', 'textarea', 'wp_kses_post' ),
		'sos_sub_copy'      => array( 'sos_hero', 'サブコピー', '暮らしのお困りごとの解決から、趣味・学び・交流のためのスペースまで。地域のみなさまの快適な暮らしとつながりをサポートします。', 'textarea', 'sanitize_textarea_field' ),
		'sos_handyman_cta'  => array( 'sos_hero', '便利屋CTA文言', '便利屋に相談・無料見積もり', 'text', 'sanitize_text_field' ),
		'sos_space_cta'     => array( 'sos_hero', 'スペースCTA文言', 'スペースを問い合わせ・予約', 'text', 'sanitize_text_field' ),
		'sos_phone'         => array( 'sos_store', '電話番号', '093-482-9544', 'text', 'sanitize_text_field' ),
		'sos_line_url'      => array( 'sos_store', 'LINE公式URL', '', 'url', 'esc_url_raw' ),
		'sos_email'         => array( 'sos_store', 'メールアドレス', '', 'email', 'sanitize_email' ),
		'sos_address'       => array( 'sos_store', '正式な住所', '〒809-0015 福岡県中間市太賀1丁目2-1', 'text', 'sanitize_text_field' ),
		'sos_hours'         => array( 'sos_store', '営業時間', '', 'text', 'sanitize_text_field' ),
		'sos_closed'        => array( 'sos_store', '定休日', '', 'text', 'sanitize_text_field' ),
		'sos_map_url'       => array( 'sos_store', 'GoogleマップURL', 'https://maps.app.goo.gl/yeaZ6yz4LMFyfDXK8?g_st=in', 'url', 'esc_url_raw' ),
		'sos_space_area'    => array( 'sos_space', 'スペース面積', '約105㎡', 'text', 'sanitize_text_field' ),
		'sos_space_capacity'=> array( 'sos_space', '最大収容人数', '最大40名', 'text', 'sanitize_text_field' ),
		'sos_space_price'   => array( 'sos_space', 'レンタル料金', '880円／時間〜', 'text', 'sanitize_text_field' ),
		'sos_form_shortcode'=> array( 'sos_contact', 'フォームのショートコード', '', 'text', 'sos_sanitize_shortcode' ),
		'sos_meta_desc'     => array( 'sos_seo', 'メタディスクリプション', '福岡県中間市・通谷駅の真横。住まいのお困りごとと、趣味・学び・交流のレンタルスペースを支える街のお助けステーションです。', 'textarea', 'sanitize_textarea_field' ),
	);
	foreach ( $fields as $id => $field ) {
		$customizer->add_setting( $id, array( 'default' => $field[2], 'sanitize_callback' => $field[4], 'transport' => 'refresh' ) );
		$customizer->add_control( $id, array( 'section' => $field[0], 'label' => $field[1], 'type' => $field[3] ) );
	}

	$images = array(
		'sos_hero_image'      => array( 'sos_hero', 'ファーストビュー画像' ),
		'sos_concept_image'   => array( 'sos_hero', 'コンセプト画像' ),
		'sos_space_image'     => array( 'sos_space', 'スペース画像' ),
		'sos_ogp_image'       => array( 'sos_seo', 'OGP画像（1200×630推奨）' ),
	);
	foreach ( $images as $id => $image ) {
		$customizer->add_setting( $id, array( 'default' => '', 'sanitize_callback' => 'absint' ) );
		$customizer->add_control( new WP_Customize_Media_Control( $customizer, $id, array( 'section' => $image[0], 'label' => $image[1], 'mime_type' => 'image' ) ) );
	}

	$service_defaults = array(
		1 => array( 'お庭のお手入れ', "草刈り・雑草対策\n庭木の剪定・伐採\n生垣の整枝\n庭木消毒・落ち葉清掃", 'service-garden.svg' ),
		2 => array( '不用品整理・片付け', "部屋の断捨離\nゴミ屋敷の清掃・遺品整理\n不用品処分のご相談\nリサイクル・委託販売", 'service-cleanup.svg' ),
		3 => array( '家具移動・配置換え', "大型家具・家電の移動\nお部屋の模様替え\n引っ越しの搬入補助\nオフィス移転のお手伝い", 'service-moving.svg' ),
		4 => array( '住まいの修繕・工事', "大工・左官・塗装工事\n物置・カーポートの解体撤去\n小さな修理\nリフォーム全般", 'service-repair.svg' ),
	);
	foreach ( $service_defaults as $number => $service ) {
		foreach ( array( 'title' => array( 'タイトル', $service[0], 'text', 'sanitize_text_field' ), 'items' => array( '項目（1行に1つ）', $service[1], 'textarea', 'sanitize_textarea_field' ) ) as $key => $config ) {
			$id = 'sos_service_' . $number . '_' . $key;
			$customizer->add_setting( $id, array( 'default' => $config[1], 'sanitize_callback' => $config[3] ) );
			$customizer->add_control( $id, array( 'section' => 'sos_services', 'label' => 'サービス' . $number . '：' . $config[0], 'type' => $config[2] ) );
		}
		$image_id = 'sos_service_' . $number . '_image';
		$customizer->add_setting( $image_id, array( 'default' => '', 'sanitize_callback' => 'absint' ) );
		$customizer->add_control( new WP_Customize_Media_Control( $customizer, $image_id, array( 'section' => 'sos_services', 'label' => 'サービス' . $number . '：画像', 'mime_type' => 'image' ) ) );
	}
}
add_action( 'customize_register', 'sos_customize_register' );
