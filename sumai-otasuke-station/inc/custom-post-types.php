<?php
/** Custom post types used for ongoing updates. */

if ( ! defined( 'ABSPATH' ) ) { exit; }

function sos_register_content_types() {
	$types = array(
		'news'          => array( 'お知らせ', 'お知らせ', 'dashicons-megaphone', 'news' ),
		'handyman_case' => array( '便利屋の施工事例', '施工事例', 'dashicons-hammer', 'handyman-case' ),
		'space_case'    => array( 'スペース利用事例', '利用事例', 'dashicons-groups', 'space-case' ),
		'faq'           => array( 'よくある質問', 'FAQ', 'dashicons-editor-help', 'faq' ),
	);

	foreach ( $types as $slug => $config ) {
		register_post_type(
			$slug,
			array(
				'labels' => array(
					'name'          => $config[0],
					'singular_name' => $config[1],
					'add_new_item'  => $config[1] . 'を追加',
					'edit_item'     => $config[1] . 'を編集',
					'view_item'     => $config[1] . 'を表示',
					'all_items'     => $config[0] . '一覧',
				),
				'public'       => true,
				'show_in_rest' => true,
				'has_archive'  => true,
				'menu_icon'    => $config[2],
				'rewrite'      => array( 'slug' => $config[3], 'with_front' => false ),
				'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
			),
		);

		register_taxonomy(
			$slug . '_category',
			$slug,
			array(
				'labels'       => array( 'name' => $config[1] . '分類', 'singular_name' => '分類' ),
				'public'       => true,
				'show_in_rest' => true,
				'hierarchical' => true,
				'rewrite'      => array( 'slug' => $config[3] . '-category' ),
			),
		);
	}
}
add_action( 'init', 'sos_register_content_types' );

function sos_flush_rewrite_on_switch() {
	sos_register_content_types();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'sos_flush_rewrite_on_switch' );
