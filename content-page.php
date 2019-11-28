<?php
/**
 * Template Name: Content Page
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

get_header();

?>

<div class="wrapper content-page" id="page-wrapper">
    <?php while ( have_posts() ) : the_post(); ?>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </div><!-- #content -->
    <?php endwhile; // end of the loop. ?>
</div><!-- #page-wrapper -->

<?php get_footer(); ?>
