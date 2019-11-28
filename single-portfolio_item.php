<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function my_special_nav_class( $classes, $item ) {

    if( strtolower($item->title) == 'projects' ){
        $classes[] = 'current-menu-item';
    }
    return $classes;
}


add_filter( 'nav_menu_css_class', 'my_special_nav_class', 10, 2 );

get_header();

?>

<div class="wrapper" id="page-wrapper">
    <?php while ( have_posts() ) : the_post(); ?>

        <div class="break-container-full-width">
            <?php
            $imgsrc = GetFeaturedImageAtSize(get_the_ID(), 'header-gallery');
            ?>
            <div class="header-gallery" id="header-gallery" tabindex="-1">
                <div class="gallery-image" style="background-image: url(<?= $imgsrc ?>)">
                </div>
            </div><!-- .row -->
            <?php
            ?>
        </div><!-- #content -->
        <div class="container content-section">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <h1 class="left-stripe"><?= get_the_title() ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2 subsection has-paragraphs">
                    <?php the_content(); ?>
                </div>
            </div>
            <?php
            $sections = get_field("flexible_content");
            if ($sections):
                foreach($sections as $section):
                ?>
                <div class="row single-portfolio-item-section">
                    <?php if ($section['acf_fc_layout'] == 'gallery_section'): ?>
                    <div class="col-12 col-md-8 offset-md-2 no-gutters subsection has-grid">
                        <div class="row">
                        <?php
                        $galleryitems = $section['gallery'];
                        foreach ($galleryitems as $item):
                            if ($item['size'] == 'full'){
                                $imgsrc = GetImageAtSize($item['image'], 'gallery-full-width');
                                echo "<div class='col-12 portfolio-gallery-image-full portfolio-gallery-image'>";
                            }
                            else{
                                $imgsrc = GetImageAtSize($item['image'], 'gallery-half-width');
                                echo "<div class='col-12 col-md-6 portfolio-gallery-image-half portfolio-gallery-image'>";
                            }
                            echo "<img src='$imgsrc'>";
                            echo "</div>";
                        endforeach;
                        ?>
                        </div>
                    </div>
                    <?php elseif ($section['acf_fc_layout'] == 'testimonial_section'): ?>
                        <div class="col-12 offset-md-2 col-md-8 about-us-large-testimonial subsection">
                            <p class="testimonial-body"><span class="quote-image start"><span></span></span><?= $section['testimonial'] ?><span class="quote-image end"><span></span></span></p>
                            <p class="attribution"><?= $section['attribution_line_1'] ?><br><?= $section['attribution_line_2'] ?></p>
                        </div>
                    <?php elseif ($section['acf_fc_layout'] == 'paragraph_section'): ?>
                    <div class="col-12 col-md-8 offset-md-2 subsection has-paragraphs">
                        <?= $section['copy'] ?>
                    </div>
                    <?php endif; ?>
                </div>
            <?php
                endforeach;
            endif;
            ?>
        </div><!-- #content -->

    <?php endwhile; // end of the loop. ?>
</div><!-- #page-wrapper -->

<?php get_footer(); ?>
