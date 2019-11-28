<?php
/**
 * Created by PhpStorm.
 * User: kyallbarrows
 * Date: 10/26/18
 * Time: 11:54 AM
 */



if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

}

add_action('acf/init', 'my_acf_init');
function my_acf_init() {

    // check function exists
    if( function_exists('acf_register_block') ) {

        // register a testimonial block
        acf_register_block(array(
            'name'				=> 'testimonials_section',
            'title'				=> __('Testimonials Section'),
            'description'		=> __('A custom testimonial blocks section.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'formatting',
            'icon'				=> 'admin-comments',
            'keywords'			=> array( 'testimonials', 'quote' ),
        ));

        // register a testimonial block
        acf_register_block(array(
            'name'				=> 'about_us_bulleted_list',
            'title'				=> __('About Us Bulleted List'),
            'description'		=> __('A custom about us bulleted list.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'formatting',
            'icon'				=> 'admin-comments',
            'keywords'			=> array( 'testimonials', 'quote' ),
        ));

        // register a testimonial block
        acf_register_block(array(
            'name'				=> 'team_list',
            'title'				=> __('Team List'),
            'description'		=> __('List of team members.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'formatting',
            'icon'				=> 'admin-comments',
            'keywords'			=> array( 'testimonials', 'quote' ),
        ));

        // register a testimonial block
        acf_register_block(array(
            'name'				=> 'projects_list',
            'title'				=> __('Projects List'),
            'description'		=> __('List of projects.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'formatting',
            'icon'				=> 'admin-comments',
            'keywords'			=> array( 'testimonials', 'quote' ),
        ));

        // register a testimonial block
        acf_register_block(array(
            'name'				=> 'homepage_intro_section',
            'title'				=> __('Homepage Intro Section'),
            'description'		=> __('Intro sections with slideshow and paragraph.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'formatting',
            'icon'				=> 'admin-comments',
            'keywords'			=> array( 'testimonials', 'quote' ),
        ));

        // register a testimonial block
        acf_register_block(array(
            'name'				=> 'homepage_industries_section',
            'title'				=> __('Homepage Industries Section'),
            'description'		=> __('List of industries served.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'formatting',
            'icon'				=> 'admin-comments',
            'keywords'			=> array( 'testimonials', 'quote' ),
        ));

        // register a testimonial block
        acf_register_block(array(
            'name'				=> 'services_section',
            'title'				=> __('Services Section'),
            'description'		=> __('Services page section.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'formatting',
            'icon'				=> 'admin-comments',
            'keywords'			=> array( 'testimonials', 'quote' ),
        ));
    }
}


function my_acf_block_render_callback( $block ) {

    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "template-parts/block" folder
    if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
        include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
    }
}
