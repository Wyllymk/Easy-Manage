<?php 
/**
 * Template Name: Projects Completed
 */
get_header();?>

<?php
$current_user = wp_get_current_user();
$user_id = $current_user->ID;
$user_data = get_userdata( $user_id );
$user_avatar = get_avatar_url( $user_id );

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $project_name = sanitize_text_field($_POST['project_name']);
    $project_description = sanitize_text_field($_POST['project_description']);
    $project_genre = sanitize_text_field($_POST['project_genre']);
    $project_deadline = sanitize_text_field($_POST['project_deadline']);
    $project_user = sanitize_text_field($_POST['project_user']);

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
            )
        )
    );

    $user_data = get_userdata($project_user);
    $username = $user_data->user_login;

    $query = new WP_Query($args);
    if ($query->have_posts()) {
        wp_die('Error: '. $username. ' already has an active project.');
    }
    // Create post data
    $post_data = array(
        'post_title' => $project_name,
        'post_content' => $project_description,
        'post_status' => 'publish',
        'post_type' => 'project',
    );

    // Insert the post into the database
    $post_id = wp_insert_post($post_data);

    // Add the project genre as a term to the 'project_genre' custom taxonomy
    $genre_term = get_term_by('name', $project_genre, 'project_genre');
    if (!$genre_term) {
        $genre_term = wp_insert_term($project_genre, 'project_genre');
    }
    wp_set_post_terms($post_id, array($genre_term->term_id), 'project_genre');

    // Add post meta data
    update_post_meta($post_id, 'project_status', 'pending');
    update_post_meta($post_id, 'project_deadline', $project_deadline);
    update_field('user_assigned', $project_user, $post_id);

}
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
                      <li class="active">
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
                      <li class="">
                          <a href="<?php echo esc_url(site_url('/location/')); ?>" class="svg-icon">                        
                                <svg class="svg-icon" id="p-dash14" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect>
                                </svg>
                              <span class="ml-4">Locations</span>
                          </a>
                      </li>
                  </ul>
              </nav>
              
              <div class="pt-5 pb-2"></div>
          </div>
      </div>       
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
                              <li>
                                  <div class="iq-search-bar device-search">
                                      <form action="#" class="searchbox">
                                          <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                                          <input type="text" class="text search-input" placeholder="Search here...">
                                      </form>
                                  </div>
                              </li>
                              <li class="nav-item nav-icon search-content">
                                  <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">
                                      <i class="ri-search-line"></i>
                                  </a>
                                  <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                      <form action="#" class="searchbox p-2">
                                          <div class="form-group mb-0 position-relative">
                                              <input type="text" class="text search-input font-size-12"
                                                  placeholder="type here to search...">
                                              <a href="#" class="search-link"><i class="las la-search"></i></a>
                                          </div>
                                      </form>
                                  </div>
                              </li>
                       
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
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-center justify-content-between breadcrumb-content">
                            <h5>Your Projects</h5>
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <div class="dropdown status-dropdown mr-3">
                                    <div class="dropdown-toggle" id="dropdownMenuButton03" data-toggle="dropdown">
                                    <div class="btn bg-body"><span class="h6">Status :</span>Completed<i class="ri-arrow-down-s-line ml-2 mr-0"></i></div>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton03">
                                        <a class="dropdown-item" href="<?php echo esc_url(site_url('/projects/')); ?>"><i class="ri-attachment-line mr-2"></i>Pending</a>
                                        <a class="dropdown-item" href="<?php echo esc_url(site_url('/projects-in-progress/')); ?>"><i class="ri-file-copy-line mr-2"></i>In Progress</a> 
                                    </div>
                                </div>
                                
                                <div class="pl-3 border-left btn-new">
                                    <a href="#" class="btn btn-primary" data-target="#new-project-modal" data-toggle="modal">New Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Completed Projects</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped">
                           <thead>
                              <tr class="ligth">
                                 <th>Name</th>
                                 <th>Description</th>
                                 <th>Status</th>
                                 <th>Genre</th>
                                 <th>Assigned Developer</th>
                                 <th>Due date</th>
                              </tr>
                           </thead>
                           <?php
                                // The Query
                                $query = new WP_Query(array(
                                    'post_type' => 'project',
                                    'meta_query' => array(
                                        array(
                                            'key' => 'project_status',
                                            'value' => 'completed',
                                            'compare' => '=',
                                        )
                                    )
                                ));
                                query_posts( $query );

                                // The Loop
                                if($query->have_posts()):
                                while ( $query->have_posts() ) : 
                                    $query->the_post();  
                                // your post content ( title, excerpt, thumb....)

                                // Get the terms associated with the current post
                                $terms = wp_get_post_terms(get_the_ID(), 'project_genre');
                                            
                                // Build a comma-separated list of term names
                                $term_names = '';
                                foreach ($terms as $term) {
                                    $term_names .= $term->name . ', ';
                                }
                                $term_names = rtrim($term_names, ', ');

                                // Get other post data
                                $project_end = get_post_meta(get_the_ID(), 'project_end', true);

                                if(get_field('project_status')){
                                    $project_status =  get_field('project_status');
                                }

                                if(get_field('project_deadline')){
                                    $project_deadline =  get_field('project_deadline');
                                }

                                $project_user = get_field('user_assigned');
                                if($project_user){
                                    $project_user = $project_user['display_name'];
                                }                              

                                ?>
                           <tbody>
                              <tr>
                                 <td><b><?php the_title();?></b></td>
                                 <td><span style="color:red;"><?php the_content();?></span></td>
                                 <td><span class="badge text-bg-success"><?php echo esc_attr($project_status);?></span> </td>
                                 <td><?php echo esc_attr($term_names);?></td>
                                 <td><?php echo esc_attr($project_user);?></td>
                                 <td><?php echo esc_attr($project_deadline);?></td>
                              </tr>
                       
                           </tbody>
                           <?php
                                    endwhile;
                                    //Reset Query
                                    wp_reset_query();
                                endif;
                                ?>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
    </div>
    <!-- Wrapper End-->


 <!-- Modal list start -->
 <div class="modal fade" role="dialog" aria-modal="true" id="new-project-modal">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header d-block text-center pb-3 border-bttom">
                    <h3 class="modal-title" id="exampleModalCenterTitle01">New Project</h3>
                </div>
                <div class="modal-body">
                    <form class="row g-3" method="post" id="new-project-form">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="exampleInputText01" class="h5">Project Name*</label>
                                <input type="text" class="form-control" name="project_name" id="project-name" placeholder="Project Name" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="exampleInputText01" class="h5">Project Description*</label>
                                <textarea type="textarea" rows="3"class="form-control" name="project_description" id="project-description"  placeholder="Project Description" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="exampleInputText2" class="h5">Genres *</label>
                                <select class="selectpicker form-control"  name="project_genre" id="project-genre" data-style="py-0" required>
                                    <?php
                                    // Get all the terms in the 'project_genre' taxonomy
                                    $terms = get_terms(array(
                                        'taxonomy' => 'project_genre',
                                        'hide_empty' => false,
                                    ));

                                    // Loop through each term and create an option for it
                                    foreach ($terms as $term) {?>
                                      <option value="<?php echo $term->name; ?>"><?php echo $term->name; ?></option>
                                      <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="exampleInputText004" class="h5">Due Dates*</label>
                                <input type="date" class="form-control" name="project_deadline" id="project-due-date"  value="" required>
                            </div>                        
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="exampleInputText07" class="h5">Assign Members*</label>
                                <select class="selectpicker form-control" name="project_user" id="project-members" data-style="py-0">
                                    <?php
                                    $users = get_users(array( 'role' => 'member' ));
                                    foreach ($users as $user) {
                                        ?>
                                        <option value="<?php echo $user->ID; ?>"><?php echo $user->display_name; ?></option>
                                        <?php
                                    }
                                    
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-wrap align-items-ceter justify-content-center mt-2">
                                <button class="btn btn-primary mr-3" name="submit_project" type="submit">Save</button>
                                <div class="btn btn-primary" data-dismiss="modal">Cancel</div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
    <!-- Modal list end -->


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