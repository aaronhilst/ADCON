<?php

$filters = get_field('categories');
$projects = get_field('projects');

if ($filters == null && $projects == null){
    echo "<div style='height: 50px;'>[Projects List]</div>";
}


if (!function_exists('RenderSquareProjectItem')){
    function RenderSquareProjectItem($image, $title, $url, $dataClasses = ""){
        ?>
        <div class='item col-12 col-md-6 sortable-item project-preview-item all-items <?= $dataClasses ?>'>
            <a href="<?= $url ?>">
                <div class="square-project-item">
                    <img src="<?= $image ?>" alt="<?= $title ?>">
                    <div class="label">
                        <span><?= $title ?></span>
                        <span class="call-to-action">See project <i class="fa fa-caret-right"></i></span>
                    </div>
                </div>
            </a>
        </div>
        <?php
    }
}

$curr_filter = 'all';
if (isset($_GET['industry'])){
    $curr_filter = $_GET['industry'];
}

?>
<div class="container content-section">
    <div class="row grid">
        <div class="col-10 offset-2 col-md-2 offset-md-1">
            <div class='sortable-portfolio-gallery-filters'>
                <div class="left-stripe"></div>
                <a class='filter-button <?= $curr_filter == "all" ? "selected" : "" ?>' data-value=''><span>All</span></a>
                <?php
                foreach ($filters as $filter){
                    ?><a class='filter-button <?= $curr_filter == $filter["category"][0]->slug ? "selected" : "" ?>' data-value='<?= $filter["category"][0]->slug ?>'><span><?= $filter["category"][0]->name ?></span></a><?php
                }
                ?>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="row sortable-portfolio-gallery" style="opacity: 0">
                <?php
                foreach ($filters as $filter){
                ?>
                    <div class="item section-description sortable-item col-12 <?= $filter["category"][0]->slug ?>">
                        <h2><?= $filter["category"][0]->name ?></h2>
                        <div><?= $filter["description"] ?></div>
                    </div>
                <?php
                }

                foreach($projects as $item){
                    //they might have added a row but not selected an item
                    if ($item && $item['project'] != null) {
                        $id = $item['project']->ID;
                        $terms = get_the_terms($id, 'portfolio_category');
                        $termClasses = "";
                        if (is_array($terms) && sizeof($terms) > 0) {
                            foreach ($terms as $term) {
                                $termClasses .= $term->slug . " ";
                            }
                        }

                        RenderSquareProjectItem(
                            GetCustomPreviewOrFeaturedImageAtSize($id, 'square-medium'),
                            $item['project']->post_title,
                            get_the_permalink($id),
                            $termClasses
                        );
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(window).load(function() {
        if (jQuery('.sortable-portfolio-gallery').length > 0){
            //Create the sortable gallery
            $container = jQuery('.sortable-portfolio-gallery');
            jQuery($container).isotope({
                itemSelector: '.sortable-item',
                layoutMode: 'fitRows',
                filter: '.all-items'
            });

            $container.css('visibility', 'visible');
            $container.css('opacity', 1);

            var selectedCat = "<?= $curr_filter ?>";
            if (selectedCat != 'all'){
                jQuery('.sortable-portfolio-gallery').isotope({ filter: '.' + selectedCat });
            }

            jQuery('.sortable-portfolio-gallery-filters .filter-button').click(function() {
                jQuery('.sortable-portfolio-gallery-filters .filter-button').removeClass('selected');
                var filter = '.' + jQuery(this).attr('data-value');
                console.log("FILTER: " + filter);
                if (filter == '.')
                    filter = '.all-items';

                jQuery('.sortable-portfolio-gallery').isotope({ filter: filter });
                jQuery(this).addClass('selected');
            });
        }
    });

</script>