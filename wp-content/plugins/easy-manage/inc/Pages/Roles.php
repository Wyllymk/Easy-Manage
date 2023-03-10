<?php
/**
 * @package EasyManage */

namespace Inc\Pages;

class Roles{
    public function register(){
        add_action( 'init', array($this, 'add_member_role') );
        add_action( 'init', array($this, 'add_project_manager_role'));

    }

    public function add_member_role() {
        $capabilities = array(
            'read'                      => true,
            'edit_posts'                => true,
            'delete_posts'              => true,
            'upload_files'              => true,
            'publish_posts'             => true,
            'edit_published_posts'      => true,
            'delete_published_posts'    => true,
        );
    
        // Add the custom role with the capabilities of an author
        add_role( 'member', 'Member', $capabilities );
        //remove_role( 'member' );
    }

    // Define the custom role and its capabilities
    function add_project_manager_role() {
        $capabilities = array(
            'read' => true,
            'edit_posts' => true,
            'delete_posts' => true,
            'upload_files' => true,
            'publish_posts' => true,
            'edit_published_posts' => true,
            'delete_published_posts' => true,
            'edit_pages' => true,
            'edit_others_posts' => true,
            'edit_others_pages' => true,
            'delete_others_posts' => true,
            'delete_others_pages' => true,
            'manage_categories' => true,
            'moderate_comments' => true,
            'manage_links' => true,
        );

        // Add the custom role with the capabilities of an editor
        add_role( 'project_manager', 'Project Manager', $capabilities );
    }

}