<?php
/**
 * Block Name: Testimonial
 *
 * This is the template that displays the testimonial block.
 */

if (get_field('heading') == null &&
    get_field('left_owner_name_and_role') == null &&
    get_field('left_owner_picture') == null &&
    get_field('right_owner_name_and_role') == null &&
    get_field('right_owner_picture') == null) {
    echo "<div style='height: 50px;'>[Owners List]</div>";
}

?>
<div class="container content-section">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <?php h1_or_h2(get_field('heading')); ?>
        </div>
        <div class="col-12 offset-md-2 col-md-4 paragraph-content">
            <div class="owner-container">
                <a href="<?= get_field('left_owner_page_link') ?>">
                    <img class="owner-image" src="<?= GetImageAtSize(get_field('left_owner_picture'), 'square-large') ?>)" alt="Rob Kinkelaar"/>
                    <div class="owner-name">
                        <div><?= get_field('left_owner_name_and_role') ?></div>
                        <div class="call-to-action">See full bio <i class="fa fa-caret-right"></i></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-12 col-md-4 paragraph-content">
            <div class="owner-container">
                <a href="<?= get_field('right_owner_page_link') ?>">
                    <img class="owner-image" src="<?= GetImageAtSize(get_field('right_owner_picture'), 'square-large') ?>)" alt="Spencer Jorgensen"/>
                    <div class="owner-name">
                        <div><?= get_field('right_owner_name_and_role') ?></div>
                        <div class="call-to-action">See full bio <i class="fa fa-caret-right"></i></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
