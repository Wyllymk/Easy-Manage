<?php 
/**
 * Template Name: Members
 */
get_header();?>

<?php
$current_user = wp_get_current_user();
$user_id = $current_user->ID;
$username = $user->user_login;
$user_data = get_userdata( $user_id );
$user_avatar = get_avatar_url( $user_id );


 if ( isset( $_POST['activate_user'] ) && isset( $_POST['user_id'] ) ) {
    $user_id = intval( $_POST['user_id'] );
    update_user_meta( $user_id, 'registration_status', 'active' );
    //echo '<div class="alert alert-success">User activated successfully.</div>';
    $user_data = get_userdata( $user_id );
    $user_login = $user_data->user_login;
    $alert_type = "success";
    $alert_message = $user_login.' activated successfully.';
}

if ( isset( $_POST['deactivate_user'] ) && isset( $_POST['user_id'] ) ) {
    $user_id = intval( $_POST['user_id'] );
    update_user_meta( $user_id, 'registration_status', 'inactive' );
    //echo '<div class="alert alert-success">User deactivated successfully.</div>';
    $user_data = get_userdata( $user_id );
    $user_login = $user_data->user_login;
    $alert_type = "danger";
    $alert_message = $user_login.' deactivated successfully.';
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
                     
                      <li class="active">
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
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">User List</h4>
               </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <div class="row justify-content-between">
                     <div class="col-sm-6 col-md-6">
                        <div id="user_list_datatable_info" class="dataTables_filter">
                            <form action="" method="get" class="mr-3 position-relative">
                              <div class="form-group mb-0 d-flex">
                                 <input type="text" name="user_search" class="form-control" id="exampleInputSearch" placeholder="Filter users by name..." aria-controls="user-list-table">
                                 <button class="btn btn-primary" name="search_users" type="submit">Search</button>
                              </div>
                           </form>
                        </div>
                     </div>
                     
                     <div class="col-sm-6 col-md-6">
                        <div class="user-list-files d-flex">
                           <a onclick="window.print()" class="bg-primary" href="javascript:void(0)">
                              Print
                           </a>
                        </div>
                     </div>
                     
                  </div>
                  <?php if (isset($alert_message)) : ?>
                    <div class="alert alert-<?php echo $alert_type; ?> mb-3" role="alert">
                        <?php echo $alert_message; ?>
                    </div>
                    <?php endif; ?>
                  <table id="user-list-table" class="table table-striped dataTable mt-4" role="grid"
                     aria-describedby="user-list-page-info">
                     <thead>
                        <tr class="ligth">
                           <th>Username</th>
                           <th>Email</th>
                           <th>Website</th>
                           <th>Status</th>
                           <th>Join Date</th>
                           <th style="min-width: 100px">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        // Check if search form submitted
                        if ( isset( $_GET['search_users'] ) && ! empty( $_GET['user_search'] ) ) {

                            // Get search query
                            $user_search = $_GET['user_search'];

                            // Search for users with matching names
                            $args = array(
                                'role'           => 'member',
                                'search'         => '*' . esc_attr( $user_search ) . '*',
                                'search_columns' => array( 'user_login', 'user_nicename' )
                            );
                            $users = get_users( $args );

                            // Display search results in table
                            if ( ! empty( $users ) ) {
                                foreach ( $users as $user ) {
                                    $user_id = $user->ID;
                                    $username = $user->user_login;
                                    $email = $user->user_email;
                                    $user_register = $user->user_registered;
                                    $registration_status = get_user_meta( $user_id, 'registration_status', true );
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo '<span>' . esc_html( $username ) . '</span>';?></td>
                                        <td><?php echo '<span>' . esc_html( $email ) . '</span>';?></td>
                                        <td></td>
                                        <td><span <?php if ($registration_status == 'inactive') { echo'class="badge bg-danger"'; } ?> <?php if ($registration_status == 'active') { echo'class="badge text-bg-success"'; } ?> <?php if ($registration_status == 'Completed') { echo'class="badge text-bg-success"'; } ?>><?php echo esc_html( $registration_status);?></span></td>
                                        <td><?php echo '<span>' . esc_html( date( "d-m-Y", strtotime($user_register ) ) ) . '</span>';?></td>
                                        <td>
                                            <div class="flex flex-row align-items-center list-user-action">
                                                <?php if($registration_status == 'inactive'){ ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                                    <button class="btn btn-primary"type="submit" name="activate_user">Activate</button>
                                                </form>
                                                <?php } elseif($registration_status == 'active'){ ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                                    <button class="btn btn-primary"type="submit" name="deactivate_user">Deactivate</button>
                                                </form>
                                                <?php }?>
                                            </div>
                                        </td>
                                    </tr>
                                   
                                    <?php
                                }
                            } else {
                                echo '<tr><td colspan="6">No users found.</td></tr>';
                            }
                        } else {
                        // Display all users in table
                        $users = get_users( array( 'role__in' => array( 'member' ) ) );
                        foreach ( $users as $user ) {
                            $user_id = $user->ID;
                            $username = $user->user_login;
                            $email = $user->user_email;
                            $user_register = $user->user_registered;
                            $registration_status = get_user_meta( $user_id, 'registration_status', true );
                        ?>
                        <tr>
                           <td><?php echo '<span>' . esc_html( $username ) . '</span>';?></td>
                           <td><?php echo '<span>' . esc_html( $email ) . '</span>';?></td>
                           <td></td>
                           <td><span <?php if ($registration_status == 'inactive') { echo'class="badge bg-danger"'; } ?> <?php if ($registration_status == 'active') { echo'class="badge text-bg-success"'; } ?> <?php if ($registration_status == 'Completed') { echo'class="badge text-bg-success"'; } ?>><?php echo esc_html( $registration_status);?></span></td>
                           <td><?php echo '<span>' . esc_html( date( "d-m-Y", strtotime($user_register ) ) ) . '</span>';?></td>
                           <td>
                              <div class="flex flex-row align-items-center list-user-action">
                                <?php if($registration_status == 'inactive'){ ?>
                                <form action="" method="post">
                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                    <button class="btn btn-primary"type="submit" name="activate_user">Activate</button>
                                </form>
                                <?php } elseif($registration_status == 'active'){ ?>
                                <form action="" method="post">
                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                    <button class="btn btn-primary"type="submit" name="deactivate_user">Deactivate</button>
                                </form>
                                <?php }?>
                              </div>
                           </td>
                        </tr>
                        <?php } }?>
                     </tbody>
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
                    </span> <a href="https://wyllymk.github.io/newport/" class="">Wilson</a>
                </div>
            </div>
        </div>
    </footer>

<?php get_footer();?>