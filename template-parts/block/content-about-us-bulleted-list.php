<?php

$heading_text = get_field('heading_text');
$paragraph_text = get_field('paragraph_text');
$items = get_field('items');

if ($heading_text == null && $paragraph_text == null && ($items == null || count($items) == 0)){
    echo "<div style='height: 50px;'>[Bulleted List Block]</div>";
}

?>
<div class="container content-section about-us-bulleted-list">
    <div class="row grid">
        <div class="col-12 col-md-10 offset-md-1">
            <?php h1_or_h2($heading_text); ?>
        </div>
        <?php
            if ($paragraph_text && strlen($paragraph_text) > 0):
        ?>
        <div class="col-12 offset-md-2 col-md-8 subsection has-paragraphs">
            <?= $paragraph_text ?>
        </div>
        <?php
            endif;
        ?>
        <?php
        if ($items):
        ?>
        <div class="col-12 offset-md-2 col-md-8 subsection">
            <ul>
            <?php
            foreach ($items as $item){
                $text = $item['item'];
                echo "<li>" . $text . "</li>";
            }
            ?>
            </ul>
        </div>
        <?php
        endif;
        ?>
    </div>
</div>
