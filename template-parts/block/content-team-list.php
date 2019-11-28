<?php

$intro_text = get_field('intro_text');
$call_to_action_text = get_field('call_to_action_text');
$team_members = get_field('team_members');

if ($team_members == null){
    echo "<div style='height: 50px;'>[Team List]</div>";
}

?>
<div class="break-container-full-width content-section content-team-list">
    <div class="container">
        <div class="row">
            <div class="col-12 offset-md-2 col-md-8">
                <div class="row">
                    <?php
                    foreach ($team_members as $team_member){
                        $image_url = GetImageAtSize($team_member['picture'], 'square-medium');
                        $years = $team_member['years'];

                        $years_span = "";
                        if ($years && $years != null && strlen($years) > 0){
                            $years_span = "<div class='years'><span>" . $years . " YRS</span></div>";
                        }
                        ?>
                        <div class='item col-8 offset-2 col-md-4 offset-md-0 team-member'>
                            <div class="square-project-item">
                                <img src="<?= $image_url ?>" alt="<?= $team_member['name'] ?>"/>
                                <?= $years_span ?>
                                <div class="label">
                                    <span><?= $team_member['name'] ?></span>
                                    <span class="job-title"><?= $team_member['job_title'] ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var collapseContentsHeight = jQuery('.js-collapse > *').height() + 55;
    var collapser = jQuery('.js-collapse');
    collapser.attr('data-expand-height', collapseContentsHeight);
    var expandButtonContainer = jQuery('.expand-button');

    jQuery('.expand-button').click(function(){
        if (jQuery(collapser).hasClass('open')){
            jQuery(collapser).removeClass('open');
            jQuery(collapser).css('max-height', 0);
            jQuery(expandButtonContainer).removeClass('open');
        }
        else{
            jQuery(collapser).addClass('open');
            jQuery(collapser).css('max-height', parseFloat(jQuery(collapser).attr('data-expand-height')));
            jQuery(expandButtonContainer).addClass('open');
        }
    });
</script>
