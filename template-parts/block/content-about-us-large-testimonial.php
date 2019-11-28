<?php

if (get_field('heading') == null && get_field('testimonial') == null && get_field('attribution_line_1') == null && get_field('attribution_line_2') == null){
    echo "<div style='height: 50px;'>[Large Testimonial]</div>";
}


?>
<div class="container content-section about-us-large-testimonial">
    <div class="row grid">
        <?php
            if (get_field('heading') != null && strlen(get_field('heading')) > 0):
        ?>
        <div class="col-12 col-md-10 offset-md-1">
            <?php h1_or_h2(get_field('heading')); ?>
        </div>
        <?php
            endif;
        ?>
        <div class="col-12 offset-md-2 col-md-8 subsection">
            <p class="testimonial-body"><span class="quote-image start"><span></span></span><?= get_field('testimonial') ?><span class="quote-image end"><span></span></span></p>
            <p class="attribution"><?= get_field('attribution_line_1') ?><br><?= get_field('attribution_line_2') ?></p>
        </div>
    </div>
</div>
