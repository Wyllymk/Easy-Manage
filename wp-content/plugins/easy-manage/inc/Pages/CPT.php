<?php
/**
 * @package PMS
 */

 namespace Inc\Pages;

class CPT {

	function register(){
		add_action( 'init', array($this, 'project_cpt_init' ));
		add_action( 'init', array($this, 'my_taxonomies_project'));
	}

	function project_cpt_init() {

		$labels = array(
			'name'                  => _x( 'Projects', 'Post type general name', 'easy-manage' ),
			'singular_name'         => _x( 'Project', 'Post type singular name', 'easy-manage' ),
			'menu_name'             => _x( 'Projects', 'Admin Menu text', 'easy-manage' ),
			'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'easy-manage' ),
			'add_new'               => __( 'Add New Project', 'easy-manage' ),
			'add_new_item'          => __( 'Add New Project', 'easy-manage' ),
			'new_item'              => __( 'New Project', 'easy-manage' ),
			'edit_item'             => __( 'Edit Project', 'easy-manage' ),
			'view_item'             => __( 'View Project', 'easy-manage' ),
			'all_items'             => __( 'All Projects', 'easy-manage' ),
			'search_items'          => __( 'Search Projects', 'easy-manage' ),
			'parent_item_colon'     => __( 'Parent Projects:', 'easy-manage' ),
			'not_found'             => __( 'No projects found.', 'easy-manage' ),
			'not_found_in_trash'    => __( 'No projects found in Trash.', 'easy-manage' ),
			'featured_image'        => _x( 'Project Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'easy-manage' ),
			'set_featured_image'    => _x( 'Set Project image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'easy-manage' ),
			'remove_featured_image' => _x( 'Remove Project image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'easy-manage' ),
			'use_featured_image'    => _x( 'Use as project image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'easy-manage' ),
			'archives'              => _x( 'Project archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'easy-manage' ),
			'insert_into_item'      => _x( 'Insert into project', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'easy-manage' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this project', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'easy-manage' ),
			'filter_items_list'     => _x( 'Filter projects list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'easy-manage' ),
			'items_list_navigation' => _x( 'Projects list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'easy-manage' ),
			'items_list'            => _x( 'Projects list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'easy-manage' ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'projects' ),
			'taxonomies'          => array('project_genre' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon'          => 'dashicons-networking',
			'show_in_rest'       => true,
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'rest_base'          => 'projects',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions','custom-fields'),
		);

		register_post_type( 'project', $args );
	}
	function my_taxonomies_project() {
        // Add new taxonomy, make it hierarchical (like categories)
        $labels = array(
          'name'              => _x( 'Project Genre', 'taxonomy general name' ),
          'singular_name'     => _x( 'Project Genre', 'taxonomy singular name' ),
          'search_items'      => __( 'Search Project Genres' ),
          'all_items'         => __( 'All Project Genres' ),
          'parent_item'       => __( 'Parent Project Genre' ),
          'parent_item_colon' => __( 'Parent Project Genre:' ),
          'edit_item'         => __( 'Edit Project Genre' ), 
          'update_item'       => __( 'Update Project Genre' ),
          'add_new_item'      => __( 'Add New Project Genre' ),
          'new_item_name'     => __( 'New Project Genre' ),
          'menu_name'         => __( 'Project Genres' ),
        );
        $args = array(
          'labels'              => $labels,
          'rewrite'             => array('slug' => 'project_genre'),
          'show_ui'             => true,
          'show_admin_column'   => true,
		  'show_in_rest'		=> true,
		  'rest_controller_class' => 'WP_REST_Terms_Controller',
          'query_var'           => true,
          'hierarchical'        => true,
        );
		$post_types = array('project');

        register_taxonomy( 'project_genre', $post_types, $args );

	}
}