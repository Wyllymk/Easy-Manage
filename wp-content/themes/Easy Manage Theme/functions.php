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
    wp_register_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Satisfy&display=swap', false ); 
    wp_enqueue_style('wpb-google-fonts' );
    wp_register_style('boxicons', 'https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('boxicons');

    //dash
    wp_register_style('backend', get_template_directory_uri().'/assets/css/backend.css', array(), '1.0.0', 'all');
    wp_enqueue_style('backend');
    wp_register_style('backend-plugin', get_template_directory_uri().'/assets/css/backend-plugin.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('backend-plugin');
    wp_register_style('remixicon', get_template_directory_uri().'/assets/css/remixicon/fonts/remixicon.css', array(), '1.0.0', 'all');
    wp_enqueue_style('remixicon');

    wp_register_style('custom', get_template_directory_uri().'/assets/css/custom.css', array(), '1.0.0', 'all');
    wp_enqueue_style('custom');
}
add_action('wp_enqueue_scripts', 'wp_custom_styles');

function wp_custom_scripts(){
    wp_register_script('bootstrap-js', get_template_directory_uri(). '/assets/js/bootstrap.min.js', array(), '5.3.0', true);
    wp_enqueue_script('bootstrap-js');
    wp_register_script('bootstrap-bundle-js', get_template_directory_uri(). '/assets/js/bootstrap.bundle.min.js', array(), '5.3.0', true);
    wp_enqueue_script('bootstrap-bundle-js');
    wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '1.0.0', true);
    wp_enqueue_script('jquery');
    wp_register_script('custom-js', get_template_directory_uri(). '/assets/js/custom.js', array(), '1.0.0', true);
    wp_enqueue_script('custom-js');
    //dash
    wp_register_script('app-js', get_template_directory_uri(). '/assets/js/app.js', array(), '1.0.0', true);
    wp_enqueue_script('app-js');

    wp_register_script('treeview-js', get_template_directory_uri(). '/assets/js/table-treeview.js', array(), '1.0.0', true);
    wp_enqueue_script('treeview-js');
    wp_register_script('chart-js', get_template_directory_uri(). '/assets/js/chart-custom.js', array(), '1.0.0', true);
    wp_enqueue_script('chart-js');
    wp_register_script('slider-js', get_template_directory_uri(). '/assets/js/slider.js', array(), '1.0.0', true);
    wp_enqueue_script('slider-js');

    wp_register_script('circle-js', get_template_directory_uri(). '/assets/js/circle-progress.js', array(), '1.0.0', true);
    wp_enqueue_script('circle-js');    
    wp_register_script('backend-js', get_template_directory_uri(). '/assets/js/backend-bundle.min.js', array(), '1.0.0', true);
    wp_enqueue_script('backend-js');
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

/*-------------------------------------------------------------------------*/
/*             SHOW DIFFERENT DASHBOARD DEPENDING ON USER                  */
/*-------------------------------------------------------------------------*/
function dashboard_page_template($template) {
    if(!is_user_logged_in()) return $template;
  
    $current_page = get_queried_object();
    if($current_page->post_name === 'dashboard') { // modify only if the current page is 'dashboard'
        $new_template = '';
        $current_user = wp_get_current_user();
        $user = new WP_User( $current_user->ID);

        if(in_array('project_manager', $user->roles) || in_array('administrator', $user->roles)){
            $new_template = locate_template( array( 'page-dashboard.php' ) );
        }
        elseif(in_array('member', $user->roles)){
            $new_template = locate_template( array( 'page-dashboard-member.php' ) );
        }else{
            $new_template = locate_template( array( 'front-page.php' ) );
        }
        if ( '' != $new_template ) {
            $template = $new_template;
        }
    }
    return $template;
}
add_filter( 'template_include', 'dashboard_page_template' );

function members_page_template($template) {
    if(!is_user_logged_in()) return $template;
  
    $current_page = get_queried_object();
    if($current_page->post_name === 'members') { // modify only if the current page is 'members'
        $new_template = '';
        $current_user = wp_get_current_user();
        $user = new WP_User( $current_user->ID);

        if(in_array('project_manager', $user->roles) || in_array('administrator', $user->roles)){
            $new_template = locate_template( array( 'page-members.php' ) );
        }
        elseif(in_array('member', $user->roles)){
            $new_template = locate_template( array( 'page-members-member.php' ) );
        }else{
            $new_template = locate_template( array( 'front-page.php' ) );
        }
        if ( '' != $new_template ) {
            $template = $new_template;
        }
    }
    return $template;
}
add_filter( 'template_include', 'members_page_template' );

function projects_page_template($template) {
    if(!is_user_logged_in()) return $template;
  
    $current_page = get_queried_object();
    if($current_page->post_name === 'projects') { // modify only if the current page is 'projects'
        $new_template = '';
        $current_user = wp_get_current_user();
        $user = new WP_User( $current_user->ID);

        if(in_array('project_manager', $user->roles) || in_array('administrator', $user->roles)){
            $new_template = locate_template( array( 'page-projects.php' ) );
        }
        elseif(in_array('member', $user->roles)){
            $new_template = locate_template( array( 'page-projects-member.php' ) );
        }else{
            $new_template = locate_template( array( 'front-page.php' ) );
        }
        if ( '' != $new_template ) {
            $template = $new_template;
        }
    }
    return $template;
}
add_filter( 'template_include', 'projects_page_template' );

function profile_page_template($template) {
    if(!is_user_logged_in()) return $template;
  
    $current_page = get_queried_object();
    if($current_page->post_name === 'user-profile') { // modify only if the current page is 'user-profile'
        $new_template = '';
        $current_user = wp_get_current_user();
        $user = new WP_User( $current_user->ID);

        if(in_array('project_manager', $user->roles) || in_array('administrator', $user->roles)){
            $new_template = locate_template( array( 'page-profile.php' ) );
        }
        elseif(in_array('member', $user->roles)){
            $new_template = locate_template( array( 'page-profile-member.php' ) );
        }else{
            $new_template = locate_template( array( 'front-page.php' ) );
        }
        if ( '' != $new_template ) {
            $template = $new_template;
        }
    }
    return $template;
}
add_filter( 'template_include', 'profile_page_template' );

function wpb_recently_registered_users() { 
 
    global $wpdb;
     
    $wp_users = '<ul class="recently-user">';
     
    $usernames = $wpdb->get_results("SELECT user_nicename, user_url, user_email FROM $wpdb->users WHERE user_login != 'admin' ORDER BY ID DESC LIMIT 5");
     
    foreach ($usernames as $username) {
     
    if (!$username->user_url) :
     
    $wp_users .= '<li>' .get_avatar($username->user_email, 45) .$username->user_nicename."</a></li>";
     
    else :
     
    $wp_users .= '<li>' .get_avatar($username->user_email, 45).'<a href="'.$username->user_url.'">'.$username->user_nicename."</a></li>";
     
    endif;
    }
    $wp_users .= '</ul>';
     
    return $wp_users;
}

add_filter( 'deprecated_constructor_trigger_error', '__return_false' );
add_filter( 'deprecated_function_trigger_error', '__return_false' );
add_filter( 'deprecated_file_trigger_error', '__return_false' );
add_filter( 'deprecated_argument_trigger_error', '__return_false' );
add_filter( 'deprecated_hook_trigger_error', '__return_false' );

/**
 * To prevent users with a registration status of "pending" from logging in
 * you use the wp_authenticate_user filter to check the user's 
 * registration status when they attempt to log in. If the user's status is "pending", 
 * you prevent the login attempt and display an error message.
 */
function my_custom_authenticate_user( WP_User $user  ) {
    if ( get_user_meta( $user->ID, 'registration_status', true ) === 'pending' ) {
        remove_action( 'wp_authenticate_user', 'wp_authenticate_username_password', 20 );
        add_filter( 'wp_authenticate_user', 'my_custom_login_error_message', 20, 3 );
    }

    return $user;
}
add_filter( 'wp_authenticate_user', 'my_custom_authenticate_user', 10, 1 );

function my_custom_login_error_message( $username, $password ) {
    $error = new WP_Error();
    $error->add( 'pending', __( 'Your account is pending approval. Please try again later.' ) );
    return $error;
}