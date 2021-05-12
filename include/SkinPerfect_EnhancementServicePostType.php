<?php

/*
Plugin Name: SkinPerfect Enhancement Service Post Type
Description: Creates a SkinPerfect Enhancement Service post type.
Version: 1.0
Author: Rich Life Marketing
Author URL: http://www.richlifemarketing.com/
*/

$enhancement_service_post_type = new SkinPerfect_EnhancementServicePostType();

/**
 * Defines custom content type for enhancement services
 */
class SkinPerfect_EnhancementServicePostType
{

    /**
     * Constructor.
     */
    function __construct()
    {

        add_action('init', array(&$this, 'do_init'));
        add_action('save_post', array(&$this, 'do_save_post'));
        add_action('admin_head', array(&$this, 'register_enhancement_icons'));
    }

    /**
     * Register the enhancement_service post type.
     */
    function do_init()
    {
        register_post_type( 'enhancement_service',
            array(
                'public' => true,
                'labels' => array(
                    'name' => "Enhancement Services",
                    'singular_name' => "Enhancement Service",
                    'add_new' => "Add New",
                    'add_new_item' => "Add New Enhancement Service",
                    'edit_item' => "Edit Enhancement Service",
                    'new_item' => "New Enhancement Service",
                    'view_item' => "View Enhancement Service",
                    'search_items' => "Search Enhancement Services",
                    'not_found' => "No Enhancement Services found",
                    'not_found_in_trash' => "No Enhancement Services found in Trash",
                    'menu_name' => "Enhancement Services",
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
        if ($post->post_type != 'enhancement_service') return;

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
            'enhancement_service', #$page,
            'normal', #$context, # 'normal', 'advanced'
            'high' #$priority, 'high', 'low'
        #$callback_args
        );

        # add meta box for footnote
        add_meta_box(
            'footnote', #$id,
            'Footnote', #$title,
            array(&$this, 'display_footnote_meta_box'), #$callback,
            'enhancement_service', #$page,
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
     * Style enhancement icons.
     */
    function register_enhancement_icons()
    {
        ?>
        <style type="text/css" media="screen">
            #menu-posts-enhancement_service .wp-menu-image {
                background: url(<?php echo get_stylesheet_directory_uri() . '/include/user-nude-female.png' ?>) no-repeat 6px -27px !important;
            }
            #menu-posts-enhancement_service:hover .wp-menu-image, #menu-posts-enhancement_service.wp-has-current-submenu .wp-menu-image {
                background-position:6px 7px !important;
            }
            #icon-edit.icon32-posts-enhancement_service {
                background: url(<?php echo get_stylesheet_directory_uri() . '/include/user-nude-female-32.png' ?>) no-repeat;
            }
        </style>
        <?php
    }
}
?>