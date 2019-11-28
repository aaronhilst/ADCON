<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/acf-config.php',                          // Load Editor functions.
	'/editor.php',                          // Load Editor functions.
	'/image-sizes.php',                          // Load Editor functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}


function GetFeaturedImageAtSize($postId, $size){
    return GetImageAtSize(get_post_thumbnail_id($postId), $size);
}

function GetImageAtSize($imageId, $size){
    $image = wp_get_attachment_image_src($imageId, $size);
    return $image[0];
}

function GetCustomPreviewOrFeaturedImageAtSize($postId, $size){
    if (get_field('preview_image', $postId)){
        return GetImageAtSize(get_field('preview_image', $postId), $size);
    }

    return GetFeaturedImageAtSize($postId, $size);
}
