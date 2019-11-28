<?php
/**
 * Template Name: Services Page
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header();

?>

<div class="wrapper services-page" id="page-wrapper">
    <?php while ( have_posts() ) : the_post(); ?>

        <div class="break-container-full-width">
            <?php
            $bgimg = GetImageAtSize(get_field('background_image'), 'full');
            //$mainimg = GetImageAtSize(get_field('main_image'), 'full');
            $mainimgpath = get_field('main_image_path');
            $overlayimg = GetImageAtSize(get_field('overlay_image'), 'full');
            $stops = get_field('stops');
            ?>
            <div class="header-gallery" id="header-gallery" tabindex="-1" style="background-image:url(<?= $bgimg ?>)">
                <div class="header-scroll">
                    <img id='draggable' class="slider" src="<?= $mainimgpath ?>">
                </div>
            </div><!-- .row -->
            <div class="header-controls">
                <div class="container">
                    <div class="row">
                        <?php
                        $i = 0;
                        foreach ($stops as $stop):
                        ?>
                            <div class="services-stop col-6 col-md-4 col-lg-2 <?= ($i == 0) ? 'selected' : '' ?>" onclick="goToStop(<?= $i ?>);"><div><?= $stop['stop'] ?></div></div>
                        <?php
                        $i++;
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
            <?php
            ?>
        </div><!-- #content -->
        <div id="content" tabindex="-1">
            <?php the_content(); ?>
        </div><!-- #content -->

    <?php endwhile; // end of the loop. ?>
</div><!-- #page-wrapper -->
<script>
    var w = jQuery('img.slider').width();
    function goToStop(stop){
        var galleryWidth = jQuery('.header-gallery').width();
        var imageWidth = jQuery('img.slider').width();
        var overflowWidth = imageWidth - galleryWidth;
        var ratio = -1 * stop / (6 - 1);
        var scrollLeft = ratio * overflowWidth;
        var bgLeft = scrollLeft / 3;

        jQuery('img.slider').animate({
            left: scrollLeft
        }, 2000);

        jQuery('.header-gallery').animate({
            'background-position-x': bgLeft
        }, 2000);

        jQuery('.services-stop').removeClass('selected');
        jQuery(jQuery('.services-stop')[stop]).addClass('selected');
    }

    jQuery( function() {
        jQuery( "#draggable" ).draggable({ axis: "x" });
    } );

</script>
<?php get_footer(); ?>
