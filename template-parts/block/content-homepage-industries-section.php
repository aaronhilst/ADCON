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

if ($industries == null || count($industries) == 0){
    echo "<div style='height: 50px;'>[Industries Section]</div>";
}


$arrIndustries = array();

foreach ($industries as $ind){
    $arrIndustries[] = $ind;
}

while (count($arrIndustries) < 5){
    $arrIndustries[] = array("image" => 0, "label" => "ADD INDUSTRY HERE", "link" => "#");
}

if (!function_exists('RenderIndustry')){
    function RenderIndustry($industry){
        $imgurl = GetImageAtSize($industry['image'], 'square-medium');
        ?>
        <div class="col-12 col-md-6 col-lg-3 grid-item">
            <a href="<?= $industry["link"] ?>">
                <div class="square-project-item">
                    <img src="<?= $imgurl ?>" alt="<?= $industry["label"] ?> Industry">
                    <div class="label">
                        <span><?= $industry["label"] ?></span>
                        <span class="call-to-action">See all projects <i class="fa fa-caret-right"></i></span>
                    </div>
                </div>
            </a>
        </div>
        <?php
    }
}

?>
<div class="container content-section homepage-industries-section has-grid">
    <div class="row">
        <div class="offset-md-1"></div>
        <div class="col-12 col-lg-4">
            <div class="intro-text">
                <div class="left-stripe"></div>
                <?= $intro ?></div>
            </div>
        <?php RenderIndustry($arrIndustries[0]);?>
        <?php RenderIndustry($arrIndustries[1]);?>
    </div>
    <div class="row">
        <div class="offset-lg-2"></div>
        <?php RenderIndustry($arrIndustries[2]);?>
        <?php RenderIndustry($arrIndustries[3]);?>
        <?php RenderIndustry($arrIndustries[4]);?>
    </div>
</div>