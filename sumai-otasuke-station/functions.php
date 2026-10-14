<?php
/**
 * Theme bootstrap.
 *
 * @package Sumai_Otasuke_Station
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SOS_VERSION', '1.0.0' );
define( 'SOS_DIR', get_template_directory() );
define( 'SOS_URI', get_template_directory_uri() );

require_once SOS_DIR . '/inc/custom-post-types.php';
require_once SOS_DIR . '/inc/customizer.php';
require_once SOS_DIR . '/inc/template-tags.php';
require_once SOS_DIR . '/inc/seo.php';

/** Set up theme supports and menus. */
function sos_setup() {
	load_theme_textdomain( 'sumai-otasuke-station', SOS_DIR . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'custom-logo', array( 'height' => 120, 'width' => 360, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_image_size( 'sos-case-card', 720, 480, true );
	register_nav_menus( array( 'primary' => 'メインナビゲーション', 'footer' => 'フッターナビゲーション' ) );
}
add_action( 'after_setup_theme', 'sos_setup' );

/** Load only local, versioned assets. */
function sos_enqueue_assets() {
	wp_enqueue_style( 'sos-style', SOS_URI . '/assets/css/style.css', array(), SOS_VERSION );
	wp_enqueue_script( 'sos-main', SOS_URI . '/assets/js/main.js', array(), SOS_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'sos_enqueue_assets' );

/** Keep front-end editor content comfortably readable. */
function sos_content_width() {
	$GLOBALS['content_width'] = 1180;
}
add_action( 'after_setup_theme', 'sos_content_width', 0 );

/** Add defer without filtering unrelated scripts. */
function sos_script_loader_tag( $tag, $handle ) {
	if ( 'sos-main' === $handle ) {
		return str_replace( ' src=', ' defer src=', $tag );
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'sos_script_loader_tag', 10, 2 );
