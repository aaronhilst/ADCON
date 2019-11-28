<?php
$heading_text = get_field('heading_text');
$paragraph_text = get_field('paragraph_text');

if ($heading_text == null && $paragraph_text == null){
    echo "<div style='height: 50px;'>[Heading + Paragraph(s)]</div>";
}
?>
<div class="container content-section about-us-bulleted-list">
    <div class="row grid">
        <div class="col-12 offset-md-1 col-md-10">
            <?php h1_or_h2(get_field('heading_text')); ?>
        </div>
        <div class="col-12 offset-md-2 col-md-8 paragraph-content">
            <?= get_field('paragraph_text') ?>
        </div>
    </div>
</div>
