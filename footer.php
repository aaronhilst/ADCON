<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<footer>
    <div class="container" style="position: relative;">

        <div class="row floating-section">
            <div class="col-1 offset-1 site-info">
            </div>
            <div class="col-5 site-info">
                <?= get_field('footer_left_column', 'option'); ?>
            </div>
            <div class="col-3 site-info">
                <?php echo do_shortcode('[contact-form-7 id="53" title="Contact form 1"]'); ?>
            </div><!--col end -->

        </div><!-- row end -->

    </div><!-- container end -->
</footer><!-- #colophon -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

