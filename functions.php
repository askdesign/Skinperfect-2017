<?php

/**
 * Add menu support.
 */
add_theme_support('menus');


/**
 * Register menus.
 */
function register_menus()
{
    register_nav_menus(
        array(
            'main_menu' => __('Main Menu'),
            'secondary_menu' => __('Secondary Menu'),
            'footer_menu' => __('Footer Menu')
        )
    );
}
add_action('init', 'register_menus');


/**
 * Include all files under include/*.php
 */
$path = get_stylesheet_directory() . '/include';
$files = scandir($path);
$php_files = array();
foreach ( $files as $file ) {
    if (preg_match('|\.php$|', $file) && ! preg_match('|^\.|', $file)) {
        $php_files[] = $file;
    }
}
foreach ($php_files as $php_file) {
    include $path . '/' . $php_file;
}


/**
 * Add the excerpt meta box to pages.
 */
add_post_type_support( 'page', 'excerpt' );


/**
 * Add post thumbnails meta box.
 */
add_theme_support('post-thumbnails');


/**
 * Add jQuery.
 */
function load_scripts()
{
    wp_enqueue_script("jquery");
}
add_action('wp_enqueue_scripts', 'load_scripts');


/**
 * Register sidebars and widgets.
 */
function sp_widgets_init()
{
    // remove unused widgets to prevent admin clutter
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Recent_Comments');
//    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Nav_Menu_Widget');

    // Homepage Slider Sidebar
    register_sidebar(array(
        'name' => 'Homepage Slider',
        'id' => 'homepage-slider',
        'description' => 'The slideshow at the top of the homepage. Add a Smart Slider widget here.',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));

    // Homepage Skincare Services Image
    register_sidebar(array(
        'name' => 'Homepage Skincare Services Image',
        'id' => 'homepage-skincare-services',
        'description' => 'The box on the homepage below the slider that links to Skincare Services',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));

    // Homepage Skincare Products Image
    register_sidebar(array(
        'name' => 'Homepage Skincare Products Image',
        'id' => 'homepage-skincare-products',
        'description' => 'The box on the homepage below the slider that links to Skincare Products',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));

    // Homepage Enhancement Services Image
    register_sidebar(array(
        'name' => 'Homepage Enhancement Services Image',
        'id' => 'homepage-enhancement-services',
        'description' => 'The box on the homepage below the slider that links to Enhancement Services',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));

    // Homepage Colore Me Perfect Image
    register_sidebar(array(
        'name' => 'Homepage Colore Me Perfect Image',
        'id' => 'homepage-color-me-perfect',
        'description' => 'The image on the homepage below the services that links to Colore Me Perfect',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));

    // Homepage Events Image
    register_sidebar(array(
        'name' => 'Homepage Events Image',
        'id' => 'homepage-events',
        'description' => 'The background image for the box on the homepage below the services that holds events',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));

    // Homepage Opt-In Sidebar
    register_sidebar(array(
        'name' => 'Homepage Opt-In Widget Area',
        'id' => 'opt-in',
        'description' => 'The area above the footer on the homepage where users can register to receive the newsletter. Add the MailChimp widget here.',
        'before_widget' => '<div id="opt-in">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));

    // Skincare Analysis Sidebar
    register_sidebar(array(
        'name' => 'Skincare Analysis Sidebar',
        'id' => 'analysis-sidebar',
        'description' => 'The sidebar on the left side of the skincare analysis page.',
        'before_widget' => '<div class="sidebar">',
        'after_widget' => '</div><!-- .sidebar -->',
        'before_title' => '',
        'after_title' => '',
    ));

    // Enhancement Services Sidebar
    register_sidebar(array(
        'name' => 'Enhancement Services Sidebar',
        'id' => 'enhancement-sidebar',
        'description' => 'The sidebar on the left side of the enhancement services page.',
        'before_widget' => '<div class="sidebar">',
        'after_widget' => '</div><!-- .sidebar -->',
        'before_title' => '',
        'after_title' => '',
    ));

    // Mineral Makeup Header Image
    register_sidebar(array(
        'name' => 'Mineral Makeup Header Image',
        'id' => 'mineral-makeup-header',
        'description' => 'The header image above the mineral makeup section of the Colore Me Perfect page.',
        'before_widget' => '<div class="header">',
        'after_widget' => '</div><!-- .header -->',
        'before_title' => '',
        'after_title' => '',
    ));

    // Mineral Makeup Sidebar
    register_sidebar(array(
        'name' => 'Mineral Makeup Sidebar',
        'id' => 'mineral-makeup-sidebar',
        'description' => 'The sidebar on the left side of the mineral makeup section of the Colore Me Perfect page.',
        'before_widget' => '<div class="sidebar">',
        'after_widget' => '</div><!-- .sidebar -->',
        'before_title' => '',
        'after_title' => '',
    ));

    // Color Analysis Header Image
    register_sidebar(array(
        'name' => 'Color Analysis Header Image',
        'id' => 'color-analysis-header',
        'description' => 'The header image above the color analysis section of the Colore Me Perfect page.',
        'before_widget' => '<div class="header">',
        'after_widget' => '</div><!-- .header -->',
        'before_title' => '',
        'after_title' => '',
    ));

    // Color Analysis Sidebar
    register_sidebar(array(
        'name' => 'Color Analysis Sidebar',
        'id' => 'color-analysis-sidebar',
        'description' => 'The sidebar on the left side of the color analysis section of the Colore Me Perfect page.',
        'before_widget' => '<div class="sidebar">',
        'after_widget' => '</div><!-- .sidebar -->',
        'before_title' => '',
        'after_title' => '',
    ));

}
add_action('widgets_init', 'sp_widgets_init');


/**
 * Returns the_content() with formatting.
 */
function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}


/**
 * Adds shortcode for <div> with class "bottom-bar".
 */
function bottom_bar_shortcode($atts) {
    $output = '<div class="bottom-bar"></div>';

    return $output;
}
add_shortcode("bottom-bar","bottom_bar_shortcode");


/**
 * Adds shortcode for a button with a label and a target URL.
 */
function button_shortcode($atts) {
    $output = '<div class="button">';
    $output .= '<p><a href="' . $atts['url'] . '" target="_blank">' . $atts['label'] . '</a></p>';
    $output .= '</div>';

    return $output;
}
add_shortcode("button","button_shortcode");


/**
 * Adds shortcode for a row.
 */
function row_shortcode($atts, $content = null) {
    $output = '<div class="row">' . do_shortcode($content) . '</div>';

    return $output;
}
add_shortcode("row","row_shortcode");


/**
 * Adds shortcode for a a 1/3 column.
 */
function column_1_3_shortcode($atts, $content = null) {
    $trimmed_content = substr($content, 4);
    $trimmed_content = substr($trimmed_content, 0, strlen($trimmed_content) - 3);

    $output = '<div class="col-1-3">' . do_shortcode($trimmed_content) . '</div>';

    return $output;
}
add_shortcode("1-3-column","column_1_3_shortcode");


/**
 * Adds shortcode for a a 2/3 column.
 */
function column_2_3_shortcode($atts, $content = null) {
    $trimmed_content = substr($content, 4);
    $trimmed_content = substr($trimmed_content, 0, strlen($trimmed_content) - 3);

    $output = '<div class="col-2-3">' . do_shortcode($trimmed_content) . '</div>';

    return $output;
}
add_shortcode("2-3-column","column_2_3_shortcode");


/**
 * Adds shortcode for a a 1/4 column.
 */
function column_1_4_shortcode($atts, $content = null) {
    $trimmed_content = substr($content, 4);
    $trimmed_content = substr($trimmed_content, 0, strlen($trimmed_content) - 3);

    $output = '<div class="col-1-4">' . do_shortcode($trimmed_content) . '</div>';

    return $output;
}
add_shortcode("1-4-column","column_1_4_shortcode");


/**
 * Adds shortcode for a a 3/4 column.
 */
function column_3_4_shortcode($atts, $content = null) {
    $trimmed_content = substr($content, 4);
    $trimmed_content = substr($trimmed_content, 0, strlen($trimmed_content) - 3);

    $output = '<div class="col-3-4">' . do_shortcode($trimmed_content) . '</div>';

    return $output;
}
add_shortcode("3-4-column","column_3_4_shortcode");


/**
 * Removes width and height attributes from a post's feature image.
 */
add_filter('post_thumbnail_html', 'remove_image_dimensions', 10);
add_filter('image_send_to_editor', 'remove_image_dimensions', 10);

function remove_image_dimensions( $html ) {
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}


?>