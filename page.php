<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">
    <?php while ( have_posts() ) : the_post(); ?>

    <div class="break-container-limited-width">
        <?php
            $header_gallery = get_field('header_image_gallery');
            if ($header_gallery != null && count($header_gallery) > 0):
        ?>
        <div class="header-gallery" id="header-gallery" tabindex="-1">
            <?php
            $index = rand(0, count($header_gallery) - 1);
            $image = $header_gallery[$index];

            $imgsrc = GetImageAtSize($image["ID"], 'header-gallery');
            ?>
            <div class="gallery-image" style="background-image: url(<?= $imgsrc ?>">
            </div>
        </div><!-- .row -->
        <?php
            endif;
        ?>
    </div><!-- #content -->
    <div id="content" tabindex="-1">
        <?php the_content(); ?>
    </div><!-- #content -->

    <?php endwhile; // end of the loop. ?>
</div><!-- #page-wrapper -->

<?php get_footer(); ?>
