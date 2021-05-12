<?php

/*
Plugin Name: RLM Testimonial Post Type
Description: Creates a Testimonial post type.
Version: 1.0
Author: Rich Life Marketing
Author URL: http://www.richlifemarketing.com/
*/

$testimonial_post_type = new RLM_TestimonialPostType();

/**
 * Defines custom content type for POV's
 */
class RLM_TestimonialPostType 
{
	
	/**
	 * Constructor.
	 */
	function __construct() 
	{
		
		add_action('init', array(&$this, 'do_init'));
		add_action('admin_head', array(&$this, 'register_testimonial_icons'));		
	}
	
	/**
	 * Register the testimonial post type.
	 */
	function do_init()
	{
		register_post_type( 'testimonial',
			array(
				'public' => true,
				'labels' => array(
					'name' => "Testimonials",
					'singular_name' => "Testimonial",
					'add_new' => "Add New",
					'add_new_item' => "Add New Testimonial",
					'edit_item' => "Edit Testimonial",
					'new_item' => "New Testimonial",
					'view_item' => "View Testimonial",
					'search_items' => "Search Testimonials",
					'not_found' => "No Testimonials found",
					'not_found_in_trash' => "No Testimonials found in Trash",
					'menu_name' => "Testimonials",
				),
				'supports' => array(
					'title',
					'editor',
				),
				'can_export' => true,
			)
		);
	}
	
	/**
	 * Style testimonial icons.
	 */
	function register_testimonial_icons() 
	{
		?>
		<style type="text/css" media="screen">
			#menu-posts-testimonial .wp-menu-image {
				background: url(<?php echo get_stylesheet_directory_uri() . '/include/balloon-quotation.png'; ?>) no-repeat 6px -27px !important;
			}
			#menu-posts-testimonial:hover .wp-menu-image, #menu-posts-testimonial.wp-has-current-submenu .wp-menu-image {
				background-position:6px 7px !important;
			}
			#icon-edit.icon32-posts-testimonial {
				background: url(<?php echo get_stylesheet_directory_uri() . '/include/balloon-quotation-32.png'; ?>) no-repeat;
			}
		</style>
		<?php 
	}
}
?>