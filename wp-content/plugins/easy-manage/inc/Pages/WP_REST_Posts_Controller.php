<?php
/**
 * @package EasyManage
 */

namespace Inc\Pages;

class WP_REST_Posts_Controller {

    public function register(){
        //add_action( 'rest_api_init', array($this,'register_routes' ) );
    }
    // Register our routes.
    public function register_routes() {
        register_rest_route( 'projects/v1', 'api',
            // Here we register the readable endpoint for collections.
            array(
                'callback'  => array( $this, 'get_items' ),
            ),
        );
    }

    /**
     * Grabs the five most recent posts and outputs them as a rest response.
     *
     * @param WP_REST_Request $request Current request.
     */
    // public function get_items( $request ) {

    //     $meta_key = $request->get_param('meta_key');
    //     $meta_value = $request->get_param('meta_value');

    //     $args = array(
    //         'post_type'     => 'project',
    //         'status'        =>  'publish',
    //         'meta_query'    =>array(
    //             [
    //             'key'   =>  $meta_key,
    //             'value' =>  $meta_value,
    //             ]
    //         ),
    //     );

    //     $the_query = get_posts( $args );

    //     $projects = $the_query->posts;

    //     return $projects;
    // }
    function get_items( $request){

        $meta_key = $request->get_param('meta_key');
        $meta_value = $request->get_param('meta_value');
    
        $args = array(
            'post_type' => 'project',
            'status'    =>  'publish',
            'posts_per_page'    =>  10,
            'meta_query'    =>  array(
                [
                    'key'=>$meta_key,
                    'value'=>$meta_value
                ]) 
        );
    
        $the_query = get_posts($args);
    
        $tasks = $the_query->posts;
    
    
        return $tasks;
        
    }

}


