<?php
if (get_field('heading_text') == null && get_field('paragraph_text') == null && get_field('icon_image') == null ){
    echo "<div style='height: 50px;'>[Services Section]</div>";
}


$dotted_class = get_field('hide_bottom_border') ? "" : "dotted-spaced";
$imgurl = GetImageAtSize(get_field('icon_image'), "full");
$svgurl = get_field('svg_path');



?>
<div class="container content-services-section <?= $dotted_class ?>">
    <div class="row">
        <div class="col-12 offset-lg-1 col-lg-7 order-1">
            <?php h1_or_h2(get_field('heading_text')); ?>
        </div>
        <div class="col-12 col-lg-3 order-3 order-lg-2 icon-image-container">
            <?php
                if ($imgurl):
            ?>
                <img src="<?= $imgurl ?>" alt="<?= get_field('heading_text') ?>"/>
            <?php
                else:
            ?>
                <img src="<?= $svgurl ?>" alt="<?= get_field('heading_text') ?>"/>
            <?php endif; ?>
        </div>
        <div class="col-12 offset-lg-2 col-lg-6 order-2 order-lg-3">
            <?= get_field('paragraph_text') ?>
        </div>
    </div>
</div>
