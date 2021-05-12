<?php

/*
Plugin Name: SkinPerfect Skincare Service Category Post Type
Description: Creates a SkinPerfect Skincare Service Category post type.
Version: 1.0
Author: Rich Life Marketing
Author URL: http://www.richlifemarketing.com/
*/

$skincare_svc_cat_post_type = new SkinPerfect_SkincareServiceCategoryPostType();

/**
 * Defines custom content type for skincare services
 */
class SkinPerfect_SkincareServiceCategoryPostType
{

    /**
     * Constructor.
     */
    function __construct()
    {
        add_action('init', array(&$this, 'do_init'));
        add_action('save_post', array(&$this, 'do_save_post'));
        add_action('admin_head', array(&$this, 'register_skincare_category_icons'));
    }

    /**
     * Register the skincare_svc_cat post type.
     */
    function do_init()
    {
        register_post_type( 'skincare_svc_cat',
            array(
                'public' => true,
                'labels' => array(
                    'name' => "Skincare Service Categories",
                    'singular_name' => "Skincare Service Category",
                    'add_new' => "Add New",
                    'add_new_item' => "Add New Skincare Service Category",
                    'edit_item' => "Edit Skincare Service Category",
                    'new_item' => "New Skincare Service Category",
                    'view_item' => "View Skincare Service Category",
                    'search_items' => "Search Skincare Service Categories",
                    'not_found' => "No Skincare Service Categories found",
                    'not_found_in_trash' => "No Skincare Service Categories found in Trash",
                    'menu_name' => "Skincare Service Categories",
                ),
                'supports' => array(
                    'title',
                    'thumbnail',
                ),
                'can_export' => true,
            )
        );
    }


    /**
     * Handles saving posts.
     */
    function do_save_post($post_id) {
        if (empty($post_id)) return;
        $post = get_post($post_id);
        if ($post->post_type != 'skincare_svc_cat') return;
    }


    /**
     * Style skincare category icons.
     */
    function register_skincare_category_icons()
    {
        ?>
        <style type="text/css" media="screen">
            #menu-posts-skincare_svc_cat .wp-menu-image {
                background: url(<?php echo get_stylesheet_directory_uri() . '/include/user-nude-female.png' ?>) no-repeat 6px -27px !important;
            }
            #menu-posts-skincare_svc_cat:hover .wp-menu-image, #menu-posts-skincare_svc_cat.wp-has-current-submenu .wp-menu-image {
                background-position:6px 7px !important;
            }
            #icon-edit.icon32-posts-skincare_svc_cat {
                background: url(<?php echo get_stylesheet_directory_uri() . '/include/user-nude-female-32.png' ?>) no-repeat;
            }
        </style>
        <?php
    }
}
?>