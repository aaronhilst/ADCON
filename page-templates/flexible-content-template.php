
<?php
/**
 * Template Name: Flexible Content Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper flexible-content-page" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
                        <?php
                        if (has_post_thumbnail()):
                            RenderWidePageHeader(GetFeaturedImageAtSize(get_the_ID(), 'homepage-gallery'), '');
                        endif;
                                 
                        if( have_rows('flexible_content') ):

                            // loop through the rows of data
                            while ( have_rows('flexible_content') ) : the_row();
                                $layout_type = get_row_layout();

                                if( $layout_type == 'header' ){
                                    RenderHeader(get_sub_field('text'),
                                        get_sub_field('is_title'));
                                }
                                elseif( $layout_type == 'gray_tagline' ){
                                    RenderGrayBarContent(get_sub_field('text'));
                                }
                                elseif($layout_type == 'random_single_image'){
                                    RenderRandomSingleImage(get_sub_field('images'));
                                }
                                elseif($layout_type == 'hero_paragraph'){
                                    RenderHeroParagraph(get_sub_field('text'));
                                }
                                elseif($layout_type == 'portfolio_item_list'){
                                    RenderPortfolioItemList(
                                            get_sub_field('portfolio_items'),
                                            get_sub_field('title'));
                                }
                                elseif($layout_type == 'sortable_portfolio_item_list'){
                                    RenderSortablePortfolioItemList(
                                            get_field('project_filters', 'options'),
                                            get_sub_field('portfolio_items'),
                                            get_sub_field('title'));
                                }
                                elseif($layout_type == 'services_list'){
                                    RenderServicesList(
                                        get_sub_field('items'));
                                }
                                elseif($layout_type == 'clients_list'){
                                    RenderClientsList(
                                        get_sub_field('clients'));
                                }
                                elseif($layout_type == 'accolades_list'){
                                    RenderAccoladesList(
                                        get_sub_field('accolades'));
                                }
                                elseif($layout_type == 'team_page_header'){
                                    RenderTeamHeader(
                                        get_sub_field('title'), 
                                        get_sub_field('text'), 
                                        get_sub_field('image')
                                    );
                                }
                                elseif($layout_type == 'team_list'){
                                    RenderTeamList(
                                        get_sub_field('team_members'),
                                        get_sub_field('title')
                                    );
                                }
                                elseif($layout_type == 'testimonials_block'){
                                    RenderTestimonialsBlock(
                                        get_sub_field('testimonials'),
                                        get_sub_field('title') );
                                }
                            endwhile;

                        else :

                            // no layouts found

                        endif;
                        ?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>









