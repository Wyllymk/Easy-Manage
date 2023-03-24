<?php 
/**
 * Template Name: Edit Project
 */
get_header();?>
<?php
$current_user = wp_get_current_user();
$user_id = $current_user->ID;
$user_data = get_userdata( $user_id );
$user_avatar = get_avatar_url( $user_id );

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_project'])) {
     // Code to handle form submission
     // Get the project ID from the hidden input field in the form
     $project_id = isset($_POST['project_id']) ? intval($_POST['project_id']) : 0;

     // Retrieve the project information from the form fields
     $project_name = sanitize_text_field($_POST['project_name']);
     $project_description = sanitize_textarea_field($_POST['project_description']);
     $project_genre = sanitize_text_field($_POST['project_genre']);
     $project_deadline = sanitize_text_field($_POST['project_deadline']);
     $project_user = isset($_POST['project_user']) ? $_POST['project_user'] : array();
 
          // Check if user has an assigned project with status of pending or in progress
          $args = array(
            'post_type' => 'project',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'project_status',
                    'value' => array('pending', 'in progress'),
                    'compare' => 'IN'
                ),
                array(
                    'key' => 'user_assigned',
                    'value' => $project_user
                ),
            )
        );
    
        $user_data = get_userdata($project_user);
        $username = $user_data->user_login;
    
        $query = new WP_Query($args);
        
         // Check if user has an active registration status
         $registration_status = get_user_meta($project_user, 'registration_status', true);
         if ($registration_status !== 'active') {
             //wp_die('Error: '. $username. ' ');
            $alert_type = "danger";
            $alert_message = $username.' does not have an active registration status.';
         } else if($query->have_posts()){
            //wp_die('Error: '. $username. ' already has an active project.');
            $alert_type = "danger";
            $alert_message = $username.' already has an active project';
         }else{

            // Update the project information in the database
            $args = array(
                'ID' => $project_id,
                'post_title' => $project_name,
                'post_content' => $project_description,
            );
            wp_update_post($args);

            // Add the project genre as a term to the 'project_genre' custom taxonomy
            $genre_term = get_term_by('name', $project_genre, 'project_genre');
            if (!$genre_term) {
                $genre_term = wp_insert_term($project_genre, 'project_genre');
            }
            wp_set_post_terms($project_id, array($genre_term->term_id), 'project_genre');

            //wp_set_post_terms($project_id, $project_genre, 'project_genre');
        
            update_post_meta($project_id, 'project_deadline', $project_deadline);
        
            update_field('user_assigned', $project_user, $project_id);

            // Send email to user
            $to = $user_data->user_email;
            $subject = 'New project assigned to you';
            $message = 'Hi ' . $username . ',\n\nA new project has been assigned to you. Please log in to check the details.\n\nThank you,\nThe Project Team';
            $sent = wp_mail( $to, $subject, $message );

            if($sent) {
                //message sent!       
            }
            else  {
                //message wasn't sent       
            }

            $alert_type = "success";
            $alert_message = $username.' has been assigned the project successfully';
         }
 
}
// Get the project ID from the query string
$project_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;

// Retrieve the project information
$post = get_post($project_id);
$project_name = $post->post_title;
$project_description = $post->post_content;
$project_genre = wp_get_post_terms($project_id, 'project_genre', array('fields' => 'names'));
$project_deadline = get_post_meta($project_id, 'project_deadline', true);
$project_user = get_field('user_assigned', $project_id);

?>

    <!-- Wrapper Start -->
    <div class="wrapper">
      
    <div class="iq-sidebar  sidebar-default <?php if(is_admin_bar_showing()){echo 'the-sidebar';}?>">
          <div class="iq-sidebar-logo d-flex align-items-center">
              <a href="<?php echo esc_url(site_url('/dashboard/')); ?>" class="header-logo">
              <img src="<?php echo get_template_directory_uri(  )?>/assets/img/hero/download.png" alt="logo">
                  <h3 class="light-logo easy-manage">Easy Manage</h3>
              </a>
              <div class="iq-menu-bt-sidebar ml-0">
                  <i class="las la-bars wrapper-menu"></i>
              </div>
          </div>
          <div class="data-scrollbar" data-scroll="1">
              <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                      <li class="">
                          <a href="<?php echo esc_url(site_url('/dashboard/')); ?>" class="svg-icon">                        
                              <svg class="svg-icon" width="25" height="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                  <polyline points="9 22 9 12 15 12 15 22"></polyline>
                              </svg>
                              <span class="ml-4">Dashboards</span>
                          </a>
                      </li>
                      <li class="">
                          <a href="<?php echo esc_url(site_url('/projects/')); ?>" class="svg-icon">                        
                              <svg class="svg-icon" width="25" height="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                  <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                  <rect x="6" y="14" width="12" height="8"></rect>
                              </svg>
                              <span class="ml-4">Projects</span>
                          </a>
                      </li>
                     
                      <li class="">
                          <a href="<?php echo esc_url(site_url('/members/')); ?>" class="svg-icon">                        
                              <svg class="svg-icon" width="25" height="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>
                              </svg>
                              <span class="ml-4">Members</span>
                          </a>
                      </li>
                      <li class="">
                          <a href="<?php echo esc_url(site_url('/messages/')); ?>" class="svg-icon">                        
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                          <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path> <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                              <span class="ml-4">Messages</span>
                          </a>
                      </li>
                      
                  </ul>
              </nav>
              
              <div class="pt-5 pb-2"></div>
          </div>
      </div>
      <?php
      $current_user = wp_get_current_user();
      $user_id = $current_user->ID;
      $user_data = get_userdata( $user_id );
      $user_avatar = get_avatar_url( $user_id );
      ?>
      <div class="iq-top-navbar <?php if(is_admin_bar_showing()){echo 'the-navbar';}?>">
          <div class="iq-navbar-custom">
              <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                      <i class="ri-menu-line wrapper-menu"></i>
                      <a href="<?php echo esc_url(site_url('/dashboard/')); ?>" class="header-logo">
                          <h4 class="logo-title text-uppercase">Easy Manage</h4>
      
                      </a>
                  </div>
                  <div class="navbar-breadcrumb">
                      <h5>Dashboard</h5>
                  </div>
                  <div class="d-flex align-items-center">
                      <button class="navbar-toggler" type="button" data-toggle="collapse"
                          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                          aria-label="Toggle navigation">
                          <i class="ri-menu-3-line"></i>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-auto navbar-list align-items-center">
                              <li class="nav-item nav-icon dropdown caption-content">
                                  <a href="#" class="search-toggle dropdown-toggle  d-flex align-items-center" id="dropdownMenuButton4"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <img src="<?php echo esc_url( $user_avatar ); ?>" class="img-fluid rounded-circle" alt="user">
                                      <div class="caption ml-3">
                                          <h6 class="mb-0 line-height text-capitalize"><?php echo esc_attr( $user_data->user_login ); ?><i class="las la-angle-down ml-2"></i></h6>
                                      </div>
                                  </a>                            
                                  <ul class="dropdown-menu dropdown-menu-right border-none" aria-labelledby="dropdownMenuButton">
                                      <li class="dropdown-item d-flex svg-icon">
                                          <svg class="svg-icon mr-0 text-primary" id="h-01-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                          </svg>
                                          <a href="<?php echo esc_url(site_url('/user-profile/')); ?>">My Profile</a>
                                      </li>
                                      <li class="dropdown-item  d-flex svg-icon border-top">
                                          <svg class="svg-icon mr-0 text-primary" id="h-05-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                          </svg>
                                          <a href=" <?php echo esc_url(wp_logout_url(get_permalink())); ?>">Logout</a>
                                      </li>
                                  </ul>
                              </li>
                          </ul>
                      </div>
                  </div>
              </nav>
          </div>
      </div>      
    <div class="content-page">
     <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Edit Selected Project</h4>
                     </div>
                     <?php if (isset($alert_message)) : ?>
                    <div class="alert alert-<?php echo $alert_type; ?> mb-3" role="alert">
                        <?php echo $alert_message; ?>
                    </div>
                    <?php endif; ?>
                  </div>
                  <div class="card-body">
                    <p> Make any changes you have here.</p>
                    <form class="row g-3" method="post" id="new-project-form">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="title" class="h5"><?php _e('Project Name*', 'mytextdomain'); ?></label>
                                <input type="text" class="form-control" name="project_name" id="project-name" placeholder="Project Name" value="<?php echo esc_attr( $project_name ); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="project_description" class="h5"><?php _e('Project Description*', 'mytextdomain'); ?></label>
                                <textarea type="textarea" rows="3"class="form-control" name="project_description" id="project-description"  placeholder="Project Description" required><?php echo esc_attr( $project_description ); ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="project_genre" class="h5"><?php _e('Genres*', 'mytextdomain'); ?></label>
                                <select class="selectpicker form-control"  name="project_genre" id="project-genre" data-style="py-0" required>
                                    <?php
                                    // Get all the terms in the 'project_genre' taxonomy
                                    $terms = get_terms(array(
                                        'taxonomy' => 'project_genre',
                                        'hide_empty' => false,
                                    ));

                                    // Loop through each term and create an option for it
                                    foreach ($terms as $term) {?>
                                      <option value="<?php echo $term->name; ?>" <?php if (in_array($term->name, $project_genre)) { echo 'selected'; } ?>><?php echo $term->name; ?></option>
                                      <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="project_deadline" class="h5"><?php _e('Due Dates*', 'mytextdomain'); ?></label>
                                <input type="date" class="form-control" name="project_deadline" id="project-due-date"  value="<?php echo $project_deadline; ?>" required>
                            </div>                        
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="project_user" class="h5"><?php _e('Assign Members*', 'mytextdomain'); ?></label>
                                <select class="selectpicker form-control" name="project_user" id="project-members" data-style="py-0" required>
                                    <?php
                                    $users = get_users(array( 'role' => 'member' ));
                                    foreach ($users as $user) {
                                        ?>
                                        <option value="<?php echo $user->ID; ?>" <?php if (in_array($user->ID, $project_user)) { echo 'selected'; } ?>><?php echo $user->display_name; ?></option>
                                        <?php
                                    }
                                    
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-wrap align-items-ceter justify-content-center mt-2">
                                <input type="hidden" name="project_id" value= "<?php echo $project_id; ?>">
                                <button class="btn btn-primary mr-3" name="update_project" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
    </div>
    <!-- Wrapper End-->

    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="<?php echo esc_url(site_url('/privacy-policy/')); ?>">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="<?php echo esc_url(site_url('/terms-of-service/')); ?>">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    <span class="mr-1">
                    Copyright © <?php echo date("Y"); ?>  <a href="<?php echo esc_url(home_url('/dashboard/')); ?>"><?php bloginfo('title'); ?></a> &nbsp; All Rights Reserved. 
                    </span> <a href="https://wyllymk.github.io/newport/" class="">Wilson</a>.
                </div>
            </div>
        </div>
    </footer>

<?php get_footer();?>