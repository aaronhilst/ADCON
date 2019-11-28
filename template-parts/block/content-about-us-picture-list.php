<?php

if (get_field('heading_text') == null && get_field('paragraph_text') == null && get_field('items') == null){
    echo "<div style='height: 50px;'>[Picture List]</div>";
}


?>
<div class="container content-section about-us-picture-list">
    <div class="row grid">
        <div class="col-12 col-md-10 offset-md-1">
            <?php h1_or_h2(get_field('heading_text')); ?>
        </div>
        <?php
        if (get_field(get_field('paragraph_text'))):
        ?>
        <div class="col-12 offset-md-2 col-md-8 has-paragraphs subsection">
            <?= get_field('paragraph_text') ?>
        </div>
        <?php
        endif;
        ?>
        <div class="col-12 offset-md-2 col-md-8 subsection icons">
            <?php
            $items = get_field('items');

            foreach ($items as $item){
                $imgid = $item['item'];
                echo "<div class='square-client-icon' style='background-image:url(". GetImageAtSize($imgid, "medium") .")'></div>";
                //echo "<li>" . $text . "</li>";
            }
            ?>
            </ul>
        </div>
        <div class="col-12 offset-md-2 col-md-8 subsection">
            <ul>
                <?php
                $clients = get_field('clients');
                foreach ($clients as $client){
                    $text = $client['client'];
                    echo "<li>" . $text . "</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>
