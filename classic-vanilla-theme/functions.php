<?php
/**
 * Theme Functions.
 *
 * @package Vanilla
 */

 if ( ! function_exists('write_log')) {
   function write_log ( $log )  {
      if ( is_array( $log ) || is_object( $log ) ) {
         error_log( print_r( $log, true ) );
      } else {
         error_log( $log );
      }
   }
}


if ( ! defined( 'VANILLA_DIR_PATH' ) ) {
	define( 'VANILLA_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'VANILLA_DIR_URI' ) ) {
	define( 'VANILLA_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

if ( ! defined( 'VANILLA_BUILD_URI' ) ) {
	define( 'VANILLA_BUILD_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build' );
}

if ( ! defined( 'VANILLA_BUILD_PATH' ) ) {
	define( 'VANILLA_BUILD_PATH', untrailingslashit( get_template_directory() ) . '/assets/build' );
}

if ( ! defined( 'VANILLA_BUILD_JS_URI' ) ) {
	define( 'VANILLA_BUILD_JS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/js' );
}

if ( ! defined( 'VANILLA_BUILD_JS_DIR_PATH' ) ) {
	define( 'VANILLA_BUILD_JS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/js' );
}

if ( ! defined( 'VANILLA_BUILD_IMG_URI' ) ) {
	define( 'VANILLA_BUILD_IMG_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/src/img' );
}

if ( ! defined( 'VANILLA_BUILD_CSS_URI' ) ) {
	define( 'VANILLA_BUILD_CSS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/css' );
}

if ( ! defined( 'VANILLA_BUILD_CSS_DIR_PATH' ) ) {
	define( 'VANILLA_BUILD_CSS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/css' );
}

if ( ! defined( 'VANILLA_BUILD_LIB_URI' ) ) {
	define( 'VANILLA_BUILD_LIB_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/library' );
}


require_once VANILLA_DIR_PATH . '/inc/helpers/autoloader.php';
require_once  VANILLA_DIR_PATH  . '/inc/helpers/template-tags.php';

function vanilla_get_theme_instance() {
	\VANILLA_THEME\Inc\VANILLA_THEME::get_instance();
}


vanilla_get_theme_instance();

function vanilla_enqueue_scripts() {

	// Register styles.
	wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime( get_template_directory() . '/style.css' ), 'all' );
	wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css', [], false, 'all' );

	// Register scripts.
	wp_register_script( 'main-js', get_template_directory_uri() . '/assets/main.js', [], filemtime( get_template_directory() . '/assets/main.js' ), true );
	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js', [ 'jquery' ], false, true );

	// Enqueue Styles.
	wp_enqueue_style( 'style-css' );
	wp_enqueue_style( 'bootstrap-css' );

	// Enqueue Scripts.
	wp_enqueue_script( 'main-js' );
	wp_enqueue_script( 'bootstrap-js' );

}

add_action( 'wp_enqueue_scripts', 'vanilla_enqueue_scripts' );

