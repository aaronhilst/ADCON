<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<footer>
    <?php
        if (!endsWith(get_page_template(), 'contact-page.php')):
    ?>
        <div class="container floating-section">
            <div class="row">
                <div class="col-lg-1 offset-lg-1 d-none d-lg-block footer-gutter left">
                    <div class="site-info">
                    </div>
                </div>
                <div class="col-12 col-lg-6 site-info contact-info highlighted">
                    <div class="d-block d-lg-none">
                        <p>
                            <a class="rectangle-button" href="<?= get_field('footer_contact_link', 'option') ?>">Contact Us</a>
                        </p>
                    </div>
                    <?= get_field('footer_left_column', 'option'); ?>
                    <?php
                        if (get_field('facebook_link', 'option') || get_field('instagram_link', 'option')){
                            echo "<p class='social-links'>";

                            if (get_field('facebook_link', 'option')){
                                echo "<a href='" . get_field('facebook_link', 'option') . "' target='_blank'><i class='fa fa-facebook-square'></i></a>";
                            }
                            if (get_field('instagram_link', 'option')){
                                echo "<a href='" . get_field('instagram_link', 'option') . "' target='_blank'><i class='fa fa-instagram'></i></a>";
                            }

                            echo "</p>";
                        }
                    ?>
                </div>
                <div class="col-3 d-none d-lg-block contact-section footer-gutter right">
                    <div class="site-info">
                        <div>
                            <a class="rectangle-button" href="<?= get_field('footer_contact_link', 'option') ?>">Contact Us</a>
                        </div>
                    </div>
                </div><!--col end -->
            </div>
        </div><!-- container end -->
        <div class="copyright-tag">
            <div class="container">
                <div class="row">
                    <div class="col-10 offset-1 tag-container">
                        <span class="tag"><?= get_field('footer_copyright_text', 'option') ?></span>
                    </div>
                </div>
            </div>
        </div>
    <?php
        else:
    ?>
        <div class="container floating-section">
            <div class="row">
                <div class="col-lg-1 offset-lg-1 d-none d-lg-block footer-gutter left">
                    <div class="site-info">
                    </div>
                </div>
                <div class="col-12 offset-md-1 col-md-10 offset-lg-0 col-lg-5 site-info contact-info highlighted">
                    <div class="footer-paragraph-text">
                        <?= get_field('left_column_paragraph_text'); ?>
                    </div>
                    <?= get_field('footer_left_column', 'option'); ?>
                    <?php
                    if (get_field('facebook_link', 'option') || get_field('instagram_link', 'option')){
                        echo "<p class='social-links'>";

                        if (get_field('facebook_link', 'option')){
                            echo "<a href='" . get_field('facebook_link', 'option') . "' target='_blank'><i class='fa fa-facebook-square'></i></a>";
                        }
                        if (get_field('instagram_link', 'option')){
                            echo "<a href='" . get_field('instagram_link', 'option') . "' target='_blank'><i class='fa fa-instagram'></i></a>";
                        }

                        echo "</p>";
                    }
                    ?>
                </div>
                <div class="col-12 offset-md-1 col-md-10 offset-lg-0 col-lg-3 contact-section">
                    <div class="site-info">
                    <?php echo do_shortcode(get_field('contact_form_embed_code')); ?>
                    </div>
                </div><!--col end -->
                <div class="d-none d-lg-block col-lg-1 footer-gutter right">
                    <div class="site-info"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 offset-lg-1 d-none d-lg-block footer-gutter left">
                    <div class="site-info">
                    </div>
                </div>
                <div class="col-12 offset-md-1 col-md-10 offset-lg-0 col-lg-8 site-info accessibility-row">
                    <p class='accessiblity-info'><?= get_field('access_info', 'option')?></p>
                </div>
                <div class="d-none d-lg-block col-lg-1 footer-gutter right">
                    <div class="site-info"></div>
                </div>
            </div>
        </div><!-- container end -->
        <div class="copyright-tag">
            <div class="container">
                <div class="row">
                    <div class="col-10 offset-1 tag-container">
                        <span class="tag"><?= get_field('footer_copyright_text', 'option') ?></span>
                    </div>
                </div>
            </div>
        </div>
    <?php
        endif;
    ?>
</footer><!-- #colophon -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

