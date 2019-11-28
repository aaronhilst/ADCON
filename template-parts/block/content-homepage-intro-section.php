<?php
/**
 * Block Name: Testimonial
 *
 * This is the template that displays the testimonial block.
 */

if (get_field('gallery') == null || count(get_field('gallery')) == 0){
    echo "<div style='height: 50px;'>[Intro Section]</div>";
}


?>
<div class="break-container-full-width content-section homepage-intro-section">
    <div class="container">
        <div class="row">
            <div class="d-none d-lg-block col-lg-1"><div class="homepage-intro-photo-frame left homepage-intro-stick-up"></div></div>
            <div class="d-none d-lg-block col-lg-4 homepage-intro-stick-up" style="background-color:#ffffff;">
                <div class='slideshow'>
                    <?php
                    $gallery = get_field('gallery');
                    foreach($gallery as $item){
                        echo "<div class='slideshow-image' style='background-image:url(" . $item['sizes']['square-medium'] . ")'>";
                        echo "</div>";
                    }
                    ?>
                </div>
                <div class="slideshow-controls">
                    <button class="new-slick-prev"><i class="fa fa-chevron-left"></i></button>
                    <button class="new-slick-next"><i class="fa fa-chevron-right"></i></button>
                </div>
            </div>
            <div class="d-none d-lg-block col-lg-1"><div class="homepage-intro-photo-frame right homepage-intro-stick-up"></div></div>
            <div class="col-12 col-lg-6">
                <div class="text">
                    <?= get_field('text') ?>
                </div>
            </div>
        </div>
    </div><!-- .row -->
</div><!-- #content -->
<script>
    jQuery(window).load(function() {
        if (jQuery('.homepage-intro-section .slideshow').length > 0){
            jQuery('.homepage-intro-section .slideshow').slick({
                infinite: true,
                slidesToShow: 1,
                prevArrow: jQuery('.new-slick-prev'),
                nextArrow: jQuery('.new-slick-next'),
                fade: true,
                dots: false,});
        }
    });
</script>
