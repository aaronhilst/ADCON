<?php
/**
 * Block Name: Testimonial
 *
 * This is the template that displays the testimonial block.
 */

// get image field (array)
$intro = get_field('intro_text');

// create id attribute for specific styling
$industries = get_field('industries');
$arrIndustries = array();

foreach ($industries as $ind){
    $arrIndustries[] = $ind;
}

while (count($industries) < 5){
    $arrIndustries[] = array("image" => 0, "label" => "ADD INDUSTRY HERE", "link" => "#");
}

function RenderIndustry($industry){
    $imgurl = GetImageAtSize($industry['image'], 'medium');
    ?>
    <div class="col-12 col-md-3">
        <a href="<?= $industry["link"] ?>">
            <div class="square-project-item" style="background-image:url(<?= $imgurl ?>)">
                <div class="label">
                    <span><?= $industry["label"] ?></span>
                </div>
            </div>
        </a>
    </div>
    <?php
}

?>
<div class="container content-section homepage-industries-section">
    <div class="row grid">
        <div class="offset-md-1"></div>
        <div class="col-12 col-md-4">
            <div class="intro-text">
                <div class="left-stripe"></div>
                <?= $intro ?></div>
            </div>
        <?php RenderIndustry($arrIndustries[0]);?>
        <?php RenderIndustry($arrIndustries[1]);?>
    </div>
    <div class="row">
        <div class="offset-md-2"></div>
        <?php RenderIndustry($arrIndustries[2]);?>
        <?php RenderIndustry($arrIndustries[3]);?>
        <?php RenderIndustry($arrIndustries[4]);?>
    </div>
</div>