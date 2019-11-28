<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'jqueryui-styles', get_stylesheet_directory_uri() . '/css/jquery-ui.min.css', array(), $css_version );
		wp_enqueue_style( 'understrap-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), $css_version );
        wp_enqueue_style( 'slickstyle', get_stylesheet_directory_uri() . '/css/slick.css', array(), $css_version );
        wp_enqueue_style( 'slicktheme', get_stylesheet_directory_uri() . '/css/slick-theme.css', array(), $css_version );
        wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i', array(), $css_version );

        $js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );

		wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), $js_version, true );
        wp_enqueue_script( 'jqueryui', get_template_directory_uri() . '/js/jquery-ui.min.js', array(), $js_version, true );

		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
        wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/js/jquery.slicknav.js', array(), $js_version, true );
        wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.js', array(), $js_version, true );
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
