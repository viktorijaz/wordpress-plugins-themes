<?php
/**
 * Theme Functions.
 *
 * @package Aquila
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

require_once VANILLA_DIR_PATH . '/inc/helpers/autoloader.php';

function aquila_get_theme_instance() {
	\VANILLA_THEME\Inc\VANILLA_THEME::get_instance();
}

aquila_get_theme_instance();

function aquila_enqueue_scripts() {

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

add_action( 'wp_enqueue_scripts', 'aquila_enqueue_scripts' );
