<?php

/*
Plugin Name: Skin Perfect Bio Post Type
Description: Creates a Bio post type.
Version: 1.0
Author: Rich Life Marketing
Author URL: http://www.richlifemarketing.com/
*/

$bio_post_type = new SkinPerfect_BioPostType();

/**
 * Defines custom content type for bios
 */
class SkinPerfect_BioPostType
{

    /**
     * Constructor.
     */
    function __construct()
    {
        add_action('init', array(&$this, 'do_init'));
        add_action('save_post', array(&$this, 'do_save_post'));
        add_action('admin_head', array(&$this, 'register_bio_icons'));
    }

    /**
     * Register the bio post type.
     */
    function do_init()
    {
        register_post_type( 'bio',
            array(
                'public' => true,
                'labels' => array(
                    'name' => "Bios",
                    'singular_name' => "Bio",
                    'add_new' => "Add New",
                    'add_new_item' => "Add New Bio",
                    'edit_item' => "Edit Bio",
                    'new_item' => "New Bio",
                    'view_item' => "View Bio",
                    'search_items' => "Search Bios",
                    'not_found' => "No Bios found",
                    'not_found_in_trash' => "No Bios found in Trash",
                    'menu_name' => "Bios",
                ),
                'supports' => array(
                    'title',
                    'editor',
                    'thumbnail'
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
        if ($post->post_type != 'bio') return;

        // job title
        if (isset($_REQUEST['job_title'])) {
            $job_title = $_REQUEST['job_title'];
            update_post_meta($post_id, 'job_title', $job_title);
        }
    }


    /**
     * Registers custom meta boxes.
     */
    function register_meta_boxes()
    {
        # add meta box for title
        add_meta_box(
            'job_title', #$id,
            'Job Title', #$title,
            array(&$this, 'display_job_title_meta_box'), #$callback,
            'bio', #$page,
            'normal', #$context, # 'normal', 'advanced'
            'high' #$priority, 'high', 'low'
        #$callback_args
        );
    }


    /**
     * Creates the job title meta box.
     */
    function display_job_title_meta_box()
    {
        if (isset( $_REQUEST['post'])) {
            $post_id = $_REQUEST['post'];
            $job_title = get_post_meta( $post_id, 'job_title', true );
        }
        else {
            $job_title = '';
        }
        ?>
        <input type="text" id="job_title" name="job_title" value="<?php echo $job_title ?>" />
        <?php
    }


    /**
     * Style bio icons.
     */
    function register_bio_icons()
    {
        ?>
        <style type="text/css" media="screen">
            #menu-posts-bio .wp-menu-image {
                background: url(<?php echo get_stylesheet_directory_uri() . '/include/user-female.png' ?>) no-repeat 6px -27px !important;
            }
            #menu-posts-bio:hover .wp-menu-image, #menu-posts-bio.wp-has-current-submenu .wp-menu-image {
                background-position:6px 7px !important;
            }
            #icon-edit.icon32-posts-bio {
                background: url(<?php echo get_stylesheet_directory_uri() . '/include/user-female-32.png' ?>) no-repeat;
            }
        </style>
        <?php
    }
}
?>