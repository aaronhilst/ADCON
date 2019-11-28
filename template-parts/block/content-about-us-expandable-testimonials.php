<?php

if (!function_exists("RenderShortTestimonial")){
    function RenderShortTestimonial($fieldset, $uid, $right_side){
        $expandable = $fieldset['expandable'];
        $short_testimonial = $fieldset['short_testimonial'];
        $expanded_testimonial = $fieldset['expanded_testimonial'];
        $attribution_line_1 = $fieldset['attribution_line_1'];
        $attribution_line_2 = $fieldset['attribution_line_2'];

        $extra_class = $expandable ? "expandable" : "";
        $right_class = $right_side ? "right" : "";

        ?>
        <div class="col-12 col-xl-6 expandable-testimonial <?= $extra_class ?> <?= $right_class ?>" data-t-id="<?= $uid ?>">
            <div class="inner">
                <div class="contracted">
                    <p class="main"><?= $short_testimonial ?></p>
                    <p class="attribution"><?= $attribution_line_1 ?><br><?= $attribution_line_2 ?></p>
                </div>
                <?php if ($expandable): ?>
                    <p class="read-more contracted">Read More &raquo;</p>
                    <div class="expanded">
                        <p class="main"><?= $expanded_testimonial ?></p>
                        <p class="attribution"><?= $attribution_line_1 ?><br><?= $attribution_line_2 ?></p>
                    </div>
                    <p class="read-more expanded">Close <i class="fa fa-times"></i></p>
                <?php else: ?>
                    <div class="expanded">
                        <p class="main"><?= $short_testimonial ?></p>
                        <p class="attribution"><?= $attribution_line_1 ?><br><?= $attribution_line_2 ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}

if (get_field('testimonials') == null){
    echo "<div style='height: 50px;'>[Expandable Testimonials Block]</div>";
}

?>
<div class="container content-section about-us-large-testimonial">
    <div class="row">
        <?php
            if (get_field('heading') != null && strlen(get_field('heading')) > 0):
        ?>
        <div class="col-12 col-md-10 offset-md-1">
            <?php h1_or_h2(get_field('heading')); ?>
        </div>
        <?php
            endif;
        ?>
    </div>
    <?php
        $testimonials = get_field('testimonials');
        $testimonials = array_values($testimonials);
        for ($i = 0; $i < count($testimonials); $i += 2){
    ?>
    <div class="row expandable-testimonials-row">
        <div class="col-12 offset-md-2 col-md-8">
            <div class="row">
                <?php
                    RenderShortTestimonial($testimonials[$i], $i, false);
                    if ($i + 1 < count($testimonials)){
                        RenderShortTestimonial($testimonials[$i+1], $i + 1, true);
                    }
                ?>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
</div>
<script>
    jQuery('.expandable-testimonial.expandable .inner div.contracted').each(function( index ) {
        jQuery(this).css("max-width", jQuery(this).width());
    });

    jQuery('.expandable-testimonial.expandable .inner div.expanded').each(function( index ) {
        var width = jQuery('.expandable-testimonials-row .row').first().width();
        width -= 40; //take off the padding, since jQuery wraps it in for some reason
        width -= 30; //take off .row's padding
        jQuery(this).width(width);
    });

    jQuery('.expandable-testimonial.expandable').click(function(){
        jQuery('.expandable-testimonial.expandable').removeClass('topper');
        jQuery(this).addClass('topper');

        if (jQuery(this).hasClass('open')){
            jQuery(this).removeClass('col-xl-12');
            jQuery(this).removeClass('open');
            jQuery(this).addClass('col-xl-6');
        }
        else{
            //close all others
            jQuery('.expandable-testimonial.open').removeClass('open').removeClass('col-xl-12').addClass('col-xl-6');

            jQuery(this).addClass('col-xl-12');
            jQuery(this).addClass('open');
            jQuery(this).removeClass('col-xl-6');
        }
    });
</script>