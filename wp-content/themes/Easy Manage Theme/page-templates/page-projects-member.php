<?php 
/**
 * Template Name: Projects Member
 */
get_header();?>
<?php

 if (isset($_POST['accepted'])) {
    $post_id = $_POST['post-id'];
    $new_value = $_POST['meta-field'];
    update_post_meta($post_id, 'project_status', $new_value);
}


if (isset($_POST['completed'])) {
    $post_id = $_POST['project-id'];
    $new_value = $_POST['meta-field2'];
    update_post_meta($post_id, 'project_status', $new_value);

    // Send email to project_manager and administrator
    $to = array();
    $project_manager_users = get_users( array( 'role' => 'project_manager' ) );
    $admin_users = get_users( array( 'role' => 'administrator' ) );
    foreach ($project_manager_users as $user) {
        $to[] = $user->user_email;
    }
    foreach ($admin_users as $user) {
        $to[] = $user->user_email;
    }
    $subject = 'Project ' . get_the_title($post_id) . ' marked as completed';
    $message = 'The project ' . get_the_title($post_id) . ' has been marked as completed by ' . $current_user->user_login;
    wp_mail($to, $subject, $message);
}

$current_user = wp_get_current_user();
$user_id = $current_user->ID;
$user_data = get_userdata( $user_id );
$user_avatar = get_avatar_url( $user_id );

 // The Query
 $query = new WP_Query(array(
     'post_type' => 'project',
     'meta_query' => array(
         'relation' => 'AND',
         array(
             'key' => 'user_assigned',
             'value' => $user_id,
         ),
         array(
            'relation' => 'OR',
            array(
                'key' => 'project_status',
                'value' => 'pending',
                'compare' => '=',
            ),
            array(
                'key' => 'project_status',
                'value' => 'in progress',
                'compare' => '=',
            ),
        ),
     )
 ));
 query_posts( $query );

 // The Loop
 if($query->have_posts()):
 while ( $query->have_posts() ) : 
     $query->the_post();  
 // your post content ( title, excerpt, thumb....)

 if(get_field('project_status')){
     $project_status =  get_field('project_status');
 } else {
    $project_status = '';
}

endwhile;
//Reset Query
wp_reset_query();
endif;




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
                              <li class="nav-item nav-icon dropdown caption-content">
                                  <a href="#" class="search-toggle dropdown-toggle  d-flex align-items-center" id="dropdownMenuButton4"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <img src="<?php echo esc_url( $user_avatar ); ?>" class="img-fluid rounded-circle" alt="user">
                                      <div class="caption ml-3">
                                          <h6 class="mb-0 line-height"><?php echo esc_attr( $user_data->user_login ); ?><i class="las la-angle-down ml-2"></i></h6>
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
                                    <div class="btn bg-body"><span class="h6">Status :</span> Active<i class="ri-arrow-down-s-line ml-2 mr-0"></i></div>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton03">
                                        <a class="dropdown-item" href="<?php echo esc_url(site_url('/projects-completed/')); ?>"><i class="ri-file-copy-line mr-2"></i>Completed</a> 
                                    </div>
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
                        <div class="alert alert-danger alert-dismissible text-center" <?php if ($project_status !== 'pending') { echo'style="display:none;"'; } ?> role="alert">
                            <strong>Warning! &nbsp; </strong> Once a project has been accepted it cannot be retracted.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="alert alert-warning mb-2 alert-dismissible text-center" <?php if ($project_status !== 'In Progress') { echo'style="display:none;"'; } ?>  role="alert">
                            <strong>Success! &nbsp; </strong> This Project has been marked to be In Progress. Once completed click the completed button. Good luck.
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
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
                                 <th>Due date</th>
                                 <th>React</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                            <?php
                                // The Query
                                $query = new WP_Query(array(
                                    'post_type' => 'project',
                                    'meta_query' => array(
                                        'relation' => 'AND',
                                        array(
                                            'key' => 'project_status',
                                            'value' => array('pending', 'in progress'),
                                            'compare' => 'IN',
                                        ),
                                        array(
                                            'key' => 'user_assigned',
                                            'value' => $user_id,
                                        )
                                    )
                                ));

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
                                 <td><span class="badge <?php if($project_status=='pending'){echo 'text-bg-danger';}else{echo 'text-bg-warning';}?>"><?php echo esc_attr($project_status);?></span> </td>
                                 <td><?php echo esc_attr($term_names);?></td>
                                 <td><?php echo esc_attr($project_deadline);?></td>
                                 <td>
                                    <div class="mt-2 d-flex gap-1" >
                                        <form action="" method="post">
                                            <input type="hidden" name="meta-field" value="In Progress">
                                            <input type="hidden" name="post-id" value="<?php echo get_the_ID(); ?>">                      
                                            <button class="btn btn-primary"type="submit" name="accepted" <?php if ($project_status == 'In Progress') { echo'disabled'; } ?> >Accept</button>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="mt-2 d-flex gap-1" >
                                        <form action="" method="post">
                                            <input type="hidden" name="meta-field2" value="Completed">
                                            <input type="hidden" name="project-id" value="<?php echo get_the_ID(); ?>">
                                            <button class="btn btn-primary"type="submit" name="completed" <?php if ($project_status == 'Completed' || $project_status == 'Pending') { echo'disabled'; } ?>>Completed</button>
                                        </form>
                                    </div>                       
                                </td>
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