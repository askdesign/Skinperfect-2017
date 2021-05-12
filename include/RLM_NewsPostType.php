<?php

/*
Plugin Name: RLM News Post Type
Description: Creates a News post type.
Version: 1.0
Author: Rich Life Marketing
Author URL: http://www.richlifemarketing.com/
*/

$news_post_type = new RLM_NewsPostType();

/**
 * Defines custom content type for POV's
 */
class RLM_NewsPostType 
{
	
	private $states = array('AK', 'AL', 'AR', 'AZ', 'CA', 'CO', 'CT', 'DC', 'DE', 'FL', 'GA', 'HI', 'IA', 'ID', 'IL', 'IN', 'KS', 'KY', 'LA', 'MA', 'MD', 'ME', 'MI', 'MN', 'MO', 'MS', 'MT', 'NC', 'ND', 'NE', 'NH', 'NJ', 'NM', 'NV', 'NY', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VA', 'VT', 'WA', 'WI', 'WV', 'WY');

	
	/**
	 * Constructor.
	 */
	function __construct() 
	{
		
		add_action('init', array(&$this, 'do_init'));
		add_action('save_post', array(&$this, 'do_save_post'));
		add_action('admin_head', array(&$this, 'register_news_icons'));
	}
	
	
	/**
	 * Register the news post type.
	 */
	function do_init()
	{
		register_post_type( 'news',
			array(
				'public' => true,
				'labels' => array(
					'name' => "News",
					'singular_name' => "News",
					'add_new' => "Add New",
					'add_new_item' => "Add News",
					'edit_item' => "Edit News",
					'new_item' => "New News",
					'view_item' => "View News",
					'search_items' => "Search News",
					'not_found' => "No News found",
					'not_found_in_trash' => "No News found in Trash",
					'menu_name' => "News",
				),
				'supports' => array(
					'title',
					'editor',
				),
				'can_export' => true,
				'register_meta_box_cb' => array( &$this, 'register_meta_boxes' ),
			)
		);
	}
	
	/**
	 * Handles saving posts.
	 */
	function do_save_post($post_id) {
		if (empty($post_id)) return;
		$post = get_post($post_id);
		if ($post->post_type != 'news') return;
		
		// summary_info
		if (isset($_REQUEST['summary_info'])) {
			$summary_info = $_REQUEST['summary_info'];
			update_post_meta($post_id, 'summary_info', $summary_info);
		}
		
		// date variables
		if (isset($_REQUEST['news-date'])) {
			$news_date = $_REQUEST['news-date'];
			update_post_meta($post_id, 'news-date', $news_date);
		}
	}
	
	/**
	 * Registers custom meta boxes.
	 */
	function register_meta_boxes()
	{
		# add meta box for summary
		add_meta_box( 
			'summary', #$id, 
			'Summary', #$title, 
			array(&$this, 'display_summary_meta_box'), #$callback, 
			'news', #$page, 
			'normal', #$context, # 'normal', 'advanced' 
			'high' #$priority, 'high', 'low'
			#$callback_args 
		);

		# add meta box for date
		add_meta_box( 
			'date', #$id, 
			'Date (optional)', #$title, 
			array(&$this, 'display_date_meta_box'), #$callback, 
			'news', #$page, 
			'normal', #$context, # 'normal', 'advanced' 
			'high' #$priority, 'high', 'low'
			#$callback_args 
		);
	}
	
	/**
	 * Creates the summary meta box.
	 */
	function display_summary_meta_box()
	{
		if (isset( $_REQUEST['post'])) {
			$post_id = $_REQUEST['post'];
			$summary_info = get_post_meta( $post_id, 'summary_info', true );
		}
		else {
			$summary_info = '';
		}
	?>
	<div class="customEditor"><textarea name="summary_info" cols="175" rows="4"><?php echo $summary_info ?></textarea></div>
	<?php
	}
	
	/**
	 * Creates the date meta box.
	 */
	function display_date_meta_box()
	{
		if (isset( $_REQUEST['post'])) {
			$post_id = $_REQUEST['post'];
			$news_date = get_post_meta( $post_id, 'news-date', true );
		}
		else {
			$news_date = '';
		}
	?>
		<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
		
		<script>
		$(document).ready(function() {
			$("#news-date").datepicker();
		});
		</script>
		
		<p>Date for this news item: <input type="text" id="news-date" name="news-date" value="<?php echo $news_date ?>" /></p>
	<?php
	}
	
	/**
	 * Style news icons.
	 */
	function register_news_icons() 
	{
		?>
		<style type="text/css" media="screen">
			#menu-posts-news .wp-menu-image {
				background: url(<?php echo get_stylesheet_directory_uri() . '/include/newspaper.png'; ?>) no-repeat 6px 7px !important;
			}
			#icon-edit.icon32-posts-news {
				background: url(<?php echo get_stylesheet_directory_uri() . '/include/newspaper-32.png'; ?>) no-repeat;
			}
		</style>
		<?php 
	}
}
?>