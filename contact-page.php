<?php
/**
 * Template Name: Contact Page
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

?>

<div class="wrapper" id="page-wrapper">
    <?php while ( have_posts() ) : the_post(); ?>

        <div class="break-container-full-width">
            <?php
            $header_gallery = get_field('header_image_gallery');
            $mobile_image_gallery = get_field('mobile_image_gallery');
            $has_mobile_gallery = ($mobile_image_gallery !== false && $mobile_image_gallery !== null);
            $desktop_gallery_classes = "";
            if ($has_mobile_gallery){
                $desktop_gallery_classes = "d-none d-md-block";
            }

            if ($header_gallery != null && count($header_gallery) > 0):
                ?>
                <div class="header-gallery <?= $desktop_gallery_classes ?>" id="header-gallery" tabindex="-1">
                    <?php
                    $index = rand(0, count($header_gallery) - 1);
                    $image = $header_gallery[$index];

                    $imgsrc = GetImageAtSize($image["ID"], 'header-gallery');
                    ?>
                    <div class="gallery-image" style="background-image: url(<?= $imgsrc ?>)">
                    </div>
                </div><!-- .row -->
                <?php if ($has_mobile_gallery): ?>
                <div class="header-gallery d-block d-md-none" id="mobile-header-gallery" tabindex="-1">
                    <?php
                    $index = rand(0, count($mobile_image_gallery) - 1);
                    $image = $mobile_image_gallery[$index];

                    $imgsrc = GetImageAtSize($image["ID"], 'full');
                    ?>
                    <div class="gallery-image" style="background-image: url(<?= $imgsrc ?>)">
                    </div>
                </div><!-- .row -->
            <?php endif; ?>
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
