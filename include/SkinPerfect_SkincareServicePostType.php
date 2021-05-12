<?php

/*
Plugin Name: SkinPerfect Skincare Service Post Type
Description: Creates a SkinPerfect Skincare Service post type.
Version: 1.0
Author: Rich Life Marketing
Author URL: http://www.richlifemarketing.com/
*/

$skincare_service_post_type = new SkinPerfect_SkincareServicePostType();

/**
 * Defines custom content type for skincare services
 */
class SkinPerfect_SkincareServicePostType
{

    /**
     * Constructor.
     */
    function __construct()
    {

        add_action('init', array(&$this, 'do_init'));
        add_action('save_post', array(&$this, 'do_save_post'));
        add_action('admin_head', array(&$this, 'register_skincare_icons'));
    }

    /**
     * Register the skincare_service post type.
     */
    function do_init()
    {
        register_post_type( 'skincare_service',
            array(
                'public' => true,
                'labels' => array(
                    'name' => "Skincare Services",
                    'singular_name' => "Skincare Service",
                    'add_new' => "Add New",
                    'add_new_item' => "Add New Skincare Service",
                    'edit_item' => "Edit Skincare Service",
                    'new_item' => "New Skincare Service",
                    'view_item' => "View Skincare Service",
                    'search_items' => "Search Skincare Services",
                    'not_found' => "No Skincare Services found",
                    'not_found_in_trash' => "No Skincare Services found in Trash",
                    'menu_name' => "Skincare Services",
                ),
                'supports' => array(
                    'title',
                    'editor',
                    'thumbnail',
                ),
                'can_export' => true,
                'register_meta_box_cb' => array( &$this, 'register_meta_boxes' ),
                'taxonomies' => array(
                    'category'
                ),
            )
        );
    }


    /**
     * Handles saving posts.
     */
    function do_save_post($post_id) {
        if (empty($post_id)) return;
        $post = get_post($post_id);
        if ($post->post_type != 'skincare_service') return;

        // pricing
        if (isset($_REQUEST['pricing'])) {
            $pricing = $_REQUEST['pricing'];
            update_post_meta($post_id, 'pricing', $pricing);
        }

        // footnote
        if (isset($_REQUEST['footnote'])) {
            $footnote = $_REQUEST['footnote'];
            update_post_meta($post_id, 'footnote', $footnote);
        }
    }


    /**
     * Registers custom meta boxes.
     */
    function register_meta_boxes()
    {
        # add meta box for pricing
        add_meta_box(
            'pricing', #$id,
            'Pricing', #$title,
            array(&$this, 'display_pricing_meta_box'), #$callback,
            'skincare_service', #$page,
            'normal', #$context, # 'normal', 'advanced'
            'high' #$priority, 'high', 'low'
        #$callback_args
        );

        # add meta box for footnote
        add_meta_box(
            'footnote', #$id,
            'Footnote', #$title,
            array(&$this, 'display_footnote_meta_box'), #$callback,
            'skincare_service', #$page,
            'normal', #$context, # 'normal', 'advanced'
            'high' #$priority, 'high', 'low'
        #$callback_args
        );
    }


    /**
     * Creates the pricing meta box.
     */
    function display_pricing_meta_box()
    {
        if (isset( $_REQUEST['post'])) {
            $post_id = $_REQUEST['post'];
            $pricing = get_post_meta( $post_id, 'pricing', true );
        }
        else {
            $pricing = '';
        }
        ?>
        <textarea class="theEditor" id="pricing" name="pricing" style="width: 500px; height: 50px;"><?php echo $pricing ?></textarea>
        <?php
    }



    /**
     * Creates the footnote meta box.
     */
    function display_footnote_meta_box()
    {
        if (isset( $_REQUEST['post'])) {
            $post_id = $_REQUEST['post'];
            $footnote = get_post_meta( $post_id, 'footnote', true );
        }
        else {
            $footnote = '';
        }
        ?>
        <textarea class="theEditor" name="footnote" style="width: 500px; height: 50px;"><?php echo $footnote ?></textarea>
        <?php
    }



    /**
     * Style skincare icons.
     */
    function register_skincare_icons()
    {
        ?>
        <style type="text/css" media="screen">
            #menu-posts-skincare_service .wp-menu-image {
                background: url(<?php echo get_stylesheet_directory_uri() . '/include/user-nude-female.png' ?>) no-repeat 6px -27px !important;
            }
            #menu-posts-skincare_service:hover .wp-menu-image, #menu-posts-skincare_service.wp-has-current-submenu .wp-menu-image {
                background-position:6px 7px !important;
            }
            #icon-edit.icon32-posts-skincare_service {
                background: url(<?php echo get_stylesheet_directory_uri() . '/include/user-nude-female-32.png' ?>) no-repeat;
            }
        </style>
        <?php
    }
}
?>