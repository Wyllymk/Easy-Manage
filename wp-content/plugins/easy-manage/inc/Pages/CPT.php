<?php
/**
 * @package PMS
 */

 namespace Inc\Pages;

class CPT {

	function register(){
		add_action( 'init', array($this, 'project_cpt_init' ));
	}

	function project_cpt_init() {



	$labels = array(
		'name'                  => _x( 'Projects', 'Post type general name', 'taskbook' ),
		'singular_name'         => _x( 'Project', 'Post type singular name', 'taskbook' ),
		'menu_name'             => _x( 'Projects', 'Admin Menu text', 'taskbook' ),
		'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'taskbook' ),
		'add_new'               => __( 'Add New', 'taskbook' ),
		'add_new_item'          => __( 'Add New Project', 'taskbook' ),
		'new_item'              => __( 'New Project', 'taskbook' ),
		'edit_item'             => __( 'Edit Project', 'taskbook' ),
		'view_item'             => __( 'View Project', 'taskbook' ),
		'all_items'             => __( 'All Projects', 'taskbook' ),
		'search_items'          => __( 'Search Projects', 'taskbook' ),
		'parent_item_colon'     => __( 'Parent Projects:', 'taskbook' ),
		'not_found'             => __( 'No projects found.', 'taskbook' ),
		'not_found_in_trash'    => __( 'No projects found in Trash.', 'taskbook' ),
		'featured_image'        => _x( 'Project Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'taskbook' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'taskbook' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'taskbook' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'taskbook' ),
		'archives'              => _x( 'Project archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'taskbook' ),
		'insert_into_item'      => _x( 'Insert into project', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'taskbook' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this project', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'taskbook' ),
		'filter_items_list'     => _x( 'Filter projects list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'taskbook' ),
		'items_list_navigation' => _x( 'Projects list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'taskbook' ),
		'items_list'            => _x( 'Projects list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'taskbook' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'projects' ),
		'taxonomies'          => array('category' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
        'menu_icon'          => 'dashicons-excerpt-view',
        'show_in_rest'       => true,
        'rest_base'          => 'projects',
		'supports'           => array( 'title', 'editor','excerpt', 'author','revisions','custom-fields'),
	);

	register_post_type( 'project', $args );
	}
}