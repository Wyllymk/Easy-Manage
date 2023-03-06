<?php
/*-------------------------------------------------------------------------*/
/*                        REGISTER CUSTOM NAVIGATION WALKER                */
/*-------------------------------------------------------------------------*/

if ( ! file_exists( get_template_directory() . '/class-bootstrap-5-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-bootstrap-5-navwalker-missing', __( 'It appears the class-bootstrap-5-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/class-bootstrap-5-navwalker.php';
}

/*-------------------------------------------------------------------------*/
/*                        ENQUEUE ALL THE THINGS                           */
/*-------------------------------------------------------------------------*/

function wp_custom_styles(){
    wp_register_style('bootstrap5', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '5.3.0', 'all');
    wp_enqueue_style('bootstrap5');
}
add_action('wp_enqueue_scripts', 'wp_custom_styles');

function wp_custom_scripts(){
    wp_register_script('bootstrap-js', get_template_directory_uri(). 'assets/js/bootstrap.min.js', array(), '5.3.0', true);
    wp_enqueue_script('bootstrap-js');
}
add_action('wp_enqueue_scripts', 'wp_custom_scripts');
/*-------------------------------------------------------------------------*/
/*                        REGISTER WIDGETS AND MENUS                       */
/*-------------------------------------------------------------------------*/

function wp_custom_menus(){
    add_theme_support('menus');

    register_nav_menus(array(
        'primary' => 'Main Menu',
        'secondary' => 'Footer Menu'
    ));
}
add_action('init', 'wp_custom_menus');

function wp_register_sidebar(){
    add_theme_support('widgets');

    register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'theme_name' ),
		'id'            => 'sidebar-1',
        'description'   => __( 'A short description of the sidebar.' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Secondary Sidebar', 'theme_name' ),
		'id'            => 'sidebar-2',
        'description'   => __( 'A short description of the sidebar.' ),
		'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li></ul>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action('widgets_init', 'wp_register_sidebar');

/*-------------------------------------------------------------------------*/
/*                        ADD THEME SUPPORT                                */
/*-------------------------------------------------------------------------*/
function custom_theme_setup() {
    add_theme_support( 'html5', array( 'comment-list' ) );
	
	add_theme_support('post-thumbnails');

	add_theme_support( 'title-tag' );

	add_theme_support('custom-header');

	add_theme_support('custom-background');

	add_theme_support('post-formats', array('aside', 'image', 'video'));
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

/*-------------------------------------------------------------------------*/
/*                        ADD THEME SUPPORT                                */
/*-------------------------------------------------------------------------*/
function recent_posts_transient(){
	if(false!==get_transient('recent_posts')){
		delete_transient('recent_posts');
	}
}
add_action('save_post', 'recent_posts_transient');

/*-------------------------------------------------------------------------*/
/*                        LIMIT LOGIN ATTEMPTS                             */
/*-------------------------------------------------------------------------*/
function check_attempted_login( $user, $username, $password ) {
    if ( get_transient( 'attempted_login' ) ) {
        $datas = get_transient( 'attempted_login' );

        if ( $datas['tried'] >= 3 ) {
            $until = get_option( '_transient_timeout_' . 'attempted_login' );
            $time = time_to_go( $until );

            return new WP_Error( 'too_many_tried',  sprintf( __( '<strong>ERROR</strong>: You have reached authentication limit, you will be able to try again in %1$s.' ) , $time ) );
        }
    }

    return $user;
}

add_filter( 'authenticate', 'check_attempted_login', 30, 3 ); 

function login_failed( $username ) {
    if ( get_transient( 'attempted_login' ) ) {
        $datas = get_transient( 'attempted_login' );
        $datas['tried']++;

        if ( $datas['tried'] <= 3 )
            set_transient( 'attempted_login', $datas , 300 );
    } else {
        $datas = array(
            'tried'     => 1
        );
        set_transient( 'attempted_login', $datas , 300 );
    }
}

add_action( 'wp_login_failed', 'login_failed', 10, 1 ); 

function time_to_go($timestamp){

    // converting the mysql timestamp to php time
    $periods = array(
        "second",
        "minute",
        "hour",
        "day",
        "week",
        "month",
        "year"
    );
    $lengths = array(
        "60",
        "60",
        "24",
        "7",
        "4.35",
        "12"
    );
    $current_timestamp = time();
    $difference = abs($current_timestamp - $timestamp);
    for ($i = 0; $difference >= $lengths[$i] && $i < count($lengths) - 1; $i ++) {
        $difference /= $lengths[$i];
    }
    $difference = round($difference);
    if (isset($difference)) {
        if ($difference != 1)
            $periods[$i] .= "s";
            $output = "$difference $periods[$i]";
            return $output;
    }
}
/*-------------------------------------------------------------------------*/
/*                        CREATE CUSTOM FIELDS API                         */
/*-------------------------------------------------------------------------*/
function custom_rest_api(){
    register_rest_field(
        'post',
        'custom_field',
        array(
            'get_callback' => 'get_custom_field'
        ),
    );
    register_rest_route( 
        'taskbook/v1', 
        'posttypes', 
        array(
        'callback' => 'get_tasks',
        'method'=>'GET',
        'permission_callback' => 'custom_endpoint_permission',
        'args' => array(
            'meta_key' => [
                'required' => true,
                'validate_callback' => function($param, $request, $key){
                    return !is_numeric($param);
                }
            ],
            'meta_value' => [
                'required' => true,
                'default'=>1,
                'validate_callback' => function($param, $request, $key){
                    return is_numeric($param);
                }
            ]
            ),
            'schema' => 'custom_get_post_schema'
    ) );
}

function custom_get_post_schema(){
    $schema = array(
        'schema'   => '',
        'title'=>  'all-portfolios',
        'type'=>    'object',
        'properties'=> [
            'id'=>[
                'description'=>esc_html__('Unique identifier for the object', 'my-textdomain'),
                'type'=>'integer'
            ],
            'author'=>[
                'description'=>esc_html__('The ID of the object', 'my-textdomain'),
                'type'=>'integer'
            ],
            'creation_date'=>[
                'description'=>esc_html__('The date of creation of the object', 'my-textdomain'),
                'type'=>'string'
            ],
            'title'=>[
                'description'=>esc_html__('The title of the object', 'my-textdomain'),
                'type'=>'string'
            ],
            'content'=>[
                'description'=>esc_html__('The content of the object', 'my-textdomain'),
                'type'=>'string'
            ],
        ]
    );
}

function custom_endpoint_permission(){
    if(is_user_logged_in(  )){
        return true;
    }else{
        return false;
    }
}

function get_tasks(WP_REST_Request $request){
    echo '<pre>';
    print_r($request);
    echo '</pre>';

    $meta_key = $request->get_param('meta_key');
    $meta_value = $request->get_param('meta_value');

    $args = array(
        'post_type' => 'tasks',
        'status'    =>  'publish',
        'posts_per_page'    =>  10,
        'meta_query'    =>  array(
            [
                'key'=>$meta_key,
                'value'=>$meta_value
            ]) 
    );

    $the_query = new WP_Query($args);

    $tasks = $the_query->posts;

    if(empty($tasks)){
        return new WP_Error(
            'no_data_found',
            'No Data Found',
            [
                'status'=>404
            ],
        );
    }

    foreach($tasks as $task){
        $response = custom_rest_prepare_post($task, $request);
        $data[] = custom_prepare_for_collection($response);
    }

    return rest_ensure_response($data);
    
}


function custom_rest_prepare_post($post, $request){
    $post_data = [];
    $schema = custom_get_post_schema();

    if(isset($schema['properties']['id'])){
        $post_data['id'] = (int) $post->ID;
    }

    if(isset($Schema['properties']['author'])){
        $post_data['author'] = (int) $post->post_author;
    }
    if(isset($Schema['properties']['title'])){
        $post_data['title'] =  apply_filters('post_heading', $post->post_title, $post);
    }
    if(isset($Schema['properties']['content'])){
        $post_data['content'] =  apply_filters('post_text', $post->post_content, $post);
    }
    if(isset($Schema['properties']['creation_date'])){
        $post_data['creation_date'] =  apply_filters('post_date', $post->post_date, $post);
    }
    return rest_ensure_response($post_data);
}

function custom_prepare_for_collection($response){
    if(!($response instanceof WP_REST_Response)){
        return $response;
    }

    $data = (array) $response->get_data();
    $links = rest_get_server()::get_compact_response_links($response);

    if(!empty($links)){
        $data['_links'] = $links;
    }

    return $data;
}

function get_custom_field($object, $field_name){
    $post_id = $object['id'];
   // echo '<pre>';print_r($object); echo'</pre>';
    return get_post_meta($post_id, 'Custom Field', true);
}
add_action('rest_api_init', 'custom_rest_api');

