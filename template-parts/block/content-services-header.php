<?php
if (get_field('background_image') == null && get_field('primary_image') == null && get_field('overlay_image') == null ){
    echo "<div style='height: 50px;'>[Services Header]</div>";
}





?>
<div class="container content-services-section <?= $dotted_class ?>">
    <div class="row">
        <div class="col-12 offset-md-1 col-md-7 order-1">
            <?php h1_or_h2(get_field('heading_text')); ?>
        </div>
        <div class="col-12 col-md-3 order-3 order-md-2 icon-image-container">
            <img src="<?= $imgurl ?>"/>
        </div>
        <div class="col-12 offset-md-2 col-md-6 order-2 order-md-3">
            <?= get_field('paragraph_text') ?>
        </div>
    </div>
</div>
