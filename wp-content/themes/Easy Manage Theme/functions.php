<?php
/*-------------------------------------------------------------------------*/
/*                        REGISTER CUSTOM NAVIGATION WALKER                */
/*-------------------------------------------------------------------------*/

if ( ! file_exists( get_template_directory() . '/inc/class-bootstrap-5-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-bootstrap-5-navwalker-missing', __( 'It appears the class-bootstrap-5-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/inc/class-bootstrap-5-navwalker.php';
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
    wp_register_style('line-awesome', get_template_directory_uri().'/assets/css/line-awesome/dist/line-awesome/css/line-awesome.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('line-awesome');

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

//enqueue google maps
function add_google_maps_api() {
    wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDrgGXICRk_yPMowMpFJHWZLVlhXb7GCnQ', array(), null, true);
  }
  add_action('wp_enqueue_scripts', 'add_google_maps_api');
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

    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'image', 'video' ) );
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
/*                        CREATE REST ROUTE API                            */
/*-------------------------------------------------------------------------*/
function register_rest_api_routes() {
    // READ route for retrieving projects
    register_rest_route(
        'projects/v1',
        'api(/(?P<id>\d+))?',
        array(
            'methods'  => WP_REST_Server::READABLE,
            'callback' => 'get_projects',
            'permission_callback' => 'custom_endpoint_permission',
            'args'     => array(
                'id' => array(
                    'validate_callback' => 'rest_validate_request_arg',
                ),
            ),
        )
    );

     // CREATE route for adding new projects
     register_rest_route(
        'projects/v1',
        'api',
        array(
            'methods'  => WP_REST_Server::CREATABLE,
            'callback' => 'create_project',
            'permission_callback' => function () {
                return current_user_can( 'edit_posts' );
            },
            'args'     => array(
                'post_title' => array(
                    'required'          => true,
                    'validate_callback' => 'rest_validate_request_arg',
                ),
                'post_content' => array(
                    'required'          => true,
                    'validate_callback' => 'rest_validate_request_arg',
                ),
                'project_status' => array(
                    'required'          => true,
                    'validate_callback' => 'rest_validate_request_arg',
                ),
                'project_genre' => array(
                    'required'          => true,
                    'validate_callback' => 'rest_validate_request_arg',
                ),

                'project_deadline' => array(
                    'required'          => true,
                    'validate_callback' => 'rest_validate_request_arg',
                ),
                'user_assigned' => array(
                    'required'          => true,
                    'validate_callback' => 'rest_validate_request_arg',
                ),
            ),
        )
    );

    // UPDATE route for adding new projects
    register_rest_route(
        'projects/v1',
        'api/(?P<id>\d+)',
        array(
            'methods'  => WP_REST_Server::EDITABLE,
            'callback' => 'update_project',
            'args'     => array(
                'id' => array(
                    'validate_callback' => 'rest_validate_request_arg',
                ),
                'post_title' => array(
                    'required'          => true,
                    'validate_callback' => 'rest_validate_request_arg',
                ),
                'post_content' => array(
                    'required'          => true,
                    'validate_callback' => 'rest_validate_request_arg',
                ),
                'project_status' => array(
                    'required'          => true,
                    'validate_callback' => 'rest_validate_request_arg',
                ),
                'project_deadline' => array(
                    'required'          => true,
                    'validate_callback' => 'rest_validate_request_arg',
                ),
                'user_assigned' => array(
                    'required'          => true,
                    'validate_callback' => 'rest_validate_request_arg',
                ),
            ),
        )
    );

    // DELETE route for retrieving projects
    register_rest_route(
        'projects/v1',
        'api/(?P<id>\d+)?',
        array(
            'methods'  => WP_REST_Server::DELETABLE,
            'callback' => 'delete_project',
            'permission_callback' => function () {
                return current_user_can( 'manage_options' );
            },
            'args'     => array(
                'id' => array(
                    'validate_callback' => 'rest_validate_request_arg',
                ),
            ),
        )
    );
}

function get_projects( $request ) {
    $args = array(
        'post_type'      => 'project',
        'posts_per_page' => -1,
        'status'         => 'publish',
    );

    if ( isset( $request['id'] ) ) {
        $args['p'] = $request['id'];
    }

    $new_query = new WP_Query( $args );

    $projects = $new_query->posts;

    if ( empty( $projects ) ) {
        return new WP_Error(
            'no_data_found',
            'No Data Found',
            array(
                'status' => 404,
            )
        );
    }

    $result = array();

    foreach ( $projects as $project ) {
        $project_data = array(
            'post_ID'          => $project->ID,
            'post_title'       => $project->post_title,
            'post_content'     => $project->post_content,
            'project_status'   => get_post_meta( $project->ID, 'project_status', true ),
            'project_deadline' => get_post_meta( $project->ID, 'project_deadline', true ),
            'user_assigned'    => get_post_meta( $project->ID, 'user_assigned', true ),
        );

        $result[] = $project_data;
    }

    return $result;
}

function create_project( $request ) {
    $post_title = $request->get_param( 'post_title' );
    $post_content = $request->get_param( 'post_content' );
    $project_status = $request->get_param( 'project_status' );
    $project_genre = $request->get_param( 'project_genre' );
    $project_deadline = $request->get_param( 'project_deadline' );
    $user_assigned = $request->get_param( 'user_assigned' );

    $post_data = array(
        'post_title'   => $post_title,
        'post_content' => $post_content,
        'post_status'  => 'publish',
        'post_type'    => 'project'
    );

    $post_id = wp_insert_post( $post_data );

    if ( ! is_wp_error( $post_id ) ) {
        // Save custom meta data
        update_post_meta( $post_id, 'project_status', $project_status );
        update_post_meta( $post_id, 'project_genre', $project_status );
        update_post_meta( $post_id, 'project_deadline', $project_deadline );
        update_post_meta( $post_id, 'user_assigned', $user_assigned );

        return array( 'success' => true );
    } else {
        return new WP_Error(
            'create_error',
            'Error creating project post',
            array( 'status' => 500 )
        );
    }
}

function update_project( $request ) {
    $id = $request->get_param( 'id' );

    if ( empty( $id ) ) {
        return new WP_Error(
            'missing_id',
            'Missing ID parameter',
            array(
                'status' => 400,
            )
        );
    }

    $project = get_post( $id );

    if ( empty( $project ) ) {
        return new WP_Error(
            'invalid_id',
            'Invalid ID parameter',
            array(
                'status' => 404,
            )
        );
    }

    $title = $request->get_param( 'post_title' );
    $content = $request->get_param( 'post_content' );
    $status = $request->get_param( 'project_status' );
    $deadline = $request->get_param( 'project_deadline' );
    $user_assigned = $request->get_param( 'user_assigned' );

    $update_args = array(
        'ID'           => $id,
        'post_title'   => $title,
        'post_content' => $content,
    );

    update_post_meta( $id, 'project_status', $status );
    update_post_meta( $id, 'project_deadline', $deadline );
    update_post_meta( $id, 'user_assigned', $user_assigned );

    $updated = wp_update_post( $update_args );

    if ( is_wp_error( $updated ) ) {
        return $updated;
    }

    return array(
        'success' => true,
    );
}

function delete_project( $request ) {
    $post_id = $request['id'];

    if ( ! $post_id || ! is_numeric( $post_id ) ) {
        return new WP_Error( 'invalid_post_id', 'Invalid post ID.', array( 'status' => 400 ) );
    }

    $result = wp_trash_post( $post_id, true );

    if ( ! $result ) {
        return new WP_Error( 'post_not_deleted', 'The post could not be deleted.', array( 'status' => 500 ) );
    }

    return array(
        'status'  => 'success',
        'message' => 'The post has been moved to the trash successfully.',
    );
}

function custom_endpoint_permission(){
    if(is_user_logged_in(  )){
        return true;
    }else{
        return false;
    }
}

add_action( 'rest_api_init', 'register_rest_api_routes' );
 

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
            $new_template = locate_template( array( 'page-templates/page-dashboard.php' ) );
        }
        elseif(in_array('member', $user->roles)){
            $new_template = locate_template( array( 'page-templates/page-dashboard-member.php' ) );
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
            $new_template = locate_template( array( 'page-templates/page-members.php' ) );
        }
        elseif(in_array('member', $user->roles)){
            $new_template = locate_template( array( 'page-templates/page-members-member.php' ) );
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
            $new_template = locate_template( array( 'page-templates/page-projects.php' ) );
        }
        elseif(in_array('member', $user->roles)){
            $new_template = locate_template( array( 'page-templates/page-projects-member.php' ) );
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
            $new_template = locate_template( array( 'page-templates/page-profile.php' ) );
        }
        elseif(in_array('member', $user->roles)){
            $new_template = locate_template( array( 'page-templates/page-profile-member.php' ) );
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


function projects_completed_page_template($template) {
    if(!is_user_logged_in()) return $template;
  
    $current_page = get_queried_object();
    if($current_page->post_name === 'projects-completed') { // modify only if the current page is 'projects'
        $new_template = '';
        $current_user = wp_get_current_user();
        $user = new WP_User( $current_user->ID);

        if(in_array('project_manager', $user->roles) || in_array('administrator', $user->roles)){
            $new_template = locate_template( array( 'page-templates/page-projects-completed.php' ) );
        }
        elseif(in_array('member', $user->roles)){
            $new_template = locate_template( array( 'page-templates/page-projects-member-completed.php' ) );
        }else{
            $new_template = locate_template( array( 'front-page.php' ) );
        }
        if ( '' != $new_template ) {
            $template = $new_template;
        }
    }
    return $template;
}
add_filter( 'template_include', 'projects_completed_page_template' );

/**
 * To prevent users with a registration status of "inactive" from logging in
 * you use the wp_authenticate_user filter to check the user's 
 * registration status when they attempt to log in. If the user's status is "inactive", 
 * you prevent the login attempt and display an error message.
 */
function my_custom_authenticate_user( WP_User $user  ) {
    if ( get_user_meta( $user->ID, 'registration_status', true ) === 'inactive' ) {
        remove_action( 'wp_authenticate_user', 'wp_authenticate_username_password', 20 );
        add_filter( 'wp_authenticate_user', 'my_custom_login_error_message', 20, 3 );
    }

    return $user;
}
add_filter( 'wp_authenticate_user', 'my_custom_authenticate_user', 10, 1 );

function my_custom_login_error_message( $username, $password ) {
    $error = new WP_Error();
    $error->add( 'inactive', __( 'Your account is pending approval. Please try again later.' ) );
    return $error;
}

  