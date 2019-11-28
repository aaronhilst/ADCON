<?php
/**
 * Block Name: Testimonial
 *
 * This is the template that displays the testimonial block.
 */

?>
<div class="break-container-limited-width content-section homepage-intro-section">
    <div class="container">
        <div class="row">
            <div class="col-1"><div class="homepage-intro-photo-frame left homepage-intro-stick-up"></div></div>
            <div class="col-4 homepage-intro-stick-up" style="background-color:#ffffff;">
                <div class='slideshow'>
                    <?php
                    $gallery = get_field('gallery');
                    foreach($gallery as $item){
                        echo "<div class='slideshow-image' style='background-image:url(" . $item['sizes']['medium'] . ")'>";
                        echo "</div>";
                    }
                    ?>
                </div>
                <div class="slideshow-controls">
                    <button class="new-slick-prev"><i class="fa fa-chevron-left"></i></button>
                    <button class="new-slick-next"><i class="fa fa-chevron-right"></i></button>
                </div>
            </div>
            <div class="col-1"><div class="homepage-intro-photo-frame right homepage-intro-stick-up"></div></div>
            <div class="col-12 col-md-6">
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
                dots: false,});
        }
    });
</script>
