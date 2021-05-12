<?php

/*
Plugin Name: SkinPerfect Membership Program Post Type
Description: Creates a SkinPerfect Membership Program post type.
Version: 1.0
Author: Rich Life Marketing
Author URL: http://www.richlifemarketing.com/
*/

$membership_program_post_type = new SkinPerfect_MembershipProgramPostType();

/**
 * Defines custom content type for membership programs
 */
class SkinPerfect_MembershipProgramPostType
{

    /**
     * Constructor.
     */
    function __construct()
    {

        add_action('init', array(&$this, 'do_init'));
        add_action('save_post', array(&$this, 'do_save_post'));
    }

    /**
     * Register the membership_program post type.
     */
    function do_init()
    {
        register_post_type( 'membership_program',
            array(
                'public' => true,
                'labels' => array(
                    'name' => "Membership Programs",
                    'singular_name' => "Membership Program",
                    'add_new' => "Add New",
                    'add_new_item' => "Add New Membership Program",
                    'edit_item' => "Edit Membership Program",
                    'new_item' => "New Membership Program",
                    'view_item' => "View Membership Program",
                    'search_items' => "Search Membership Programs",
                    'not_found' => "No Membership Programs found",
                    'not_found_in_trash' => "No Membership Programs found in Trash",
                    'menu_name' => "Membership Programs",
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
        if ($post->post_type != 'membership_program') return;

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
            'membership_program', #$page,
            'normal', #$context, # 'normal', 'advanced'
            'high' #$priority, 'high', 'low'
        #$callback_args
        );

        # add meta box for footnote
        add_meta_box(
            'footnote', #$id,
            'Footnote', #$title,
            array(&$this, 'display_footnote_meta_box'), #$callback,
            'membership_program', #$page,
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
        <input type="text" id="pricing" name="pricing" value="<?php echo $pricing ?>" style="width: 500px;" />
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
}
?>