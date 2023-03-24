<?php 
/**
 * Template Name: User Profile
 */
get_header();?>

<?php
$current_user = wp_get_current_user();
$user_id = $current_user->ID;
$user_data = get_userdata( $user_id );
$user_bio = get_the_author_meta( 'description', $user_id );
$user_avatar = get_avatar_url( $user_id );


if ( isset( $_POST['update_user'] ) ) {
   // Update the user data
   $user_data->user_email = sanitize_email( $_POST['email'] );
   $user_data->first_name = sanitize_text_field( $_POST['first_name'] );
   $user_data->last_name = sanitize_text_field( $_POST['last_name'] );
   $user_data->display_name = sanitize_text_field( $_POST['nickname'] );
   $user_data->user_url = esc_url_raw( $_POST['website'] );
   $user_bio = wp_kses_post( $_POST['user_bio'] );
   wp_update_user( $user_data );

   // Update the user's biographical information
   update_user_meta( $user_id, 'description', $user_bio );

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
               <div class="iq-edit-list-data">
                  <div class="tab-content">
                     <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                        <div class="card">
                           <div class="card-header d-flex justify-content-between">
                              <div class="iq-header-title">
                                 <h4 class="card-title">Personal Information</h4>
                              </div>
                           </div>
                           <div class="card-body">
                              <form action="" method="post" enctype="multipart/form-data">
                                 <div class="form-group row align-items-center">
                                    <div class="col-md-12">
                                       <div class="profile-img-edit">
                                          <div class="crm-profile-img-edit">
                                             <img class="crm-profile-pic rounded-circle avatar-100" src="<?php echo esc_url( $user_avatar ); ?>" alt="Profile Picture">
                                             <div class="crm-p-image bg-primary">
                                                <i class="las la-pen upload-button"></i>
                                                <input class="file-upload" type="file" accept="image/*"  name="profile_picture">
                                             </div>
                                          </div>                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div class=" row align-items-center">
                                    <div class="form-group col-sm-6">
                                       <label for="uname">User Name:</label>
                                       <input type="text" class="form-control" id="uname" value="<?php echo esc_attr( $user_data->user_login ); ?>" name="user_name" disabled>
                                       <small id="user_login" class="form-text text-muted">Usernames cannot be changed.</small>
                                    </div>                               
                                    <div class="form-group col-sm-6">
                                       <label>Email (required):</label>
                                       <input type="text" class="form-control" id="email" value="<?php echo esc_attr( $user_data->user_email ); ?>" name="email">
                                       <small id="user_login" class="form-text text-muted">If you change this, an email will be sent at your new address to confirm it.</small>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="fname">First Name:</label>
                                       <input type="text" class="form-control" id="fname" value="<?php echo esc_attr( $user_data->first_name ); ?>" name="first_name">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="lname">Last Name:</label>
                                       <input type="text" class="form-control" id="lname" value="<?php echo esc_attr( $user_data->last_name ); ?>" name="last_name">
                                    </div>
                                    
                                    <div class="form-group col-sm-6">
                                       <label for="cname">Nickname (required):</label>
                                       <input type="text" class="form-control" id="cname" value="<?php echo esc_attr( $user_data->display_name ); ?>" name="nickname">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label>Website:</label>
                                       <input type="text" class="form-control" id="website" value="<?php echo esc_attr( $user_data->user_url ); ?>" name="website">
                                    </div>
                                    <div class="form-group col-sm-12">
                                       <label>Biographical Info:</label>
                                       <textarea class="form-control" name="user_bio" rows="3" >
                                          <?php echo esc_html( $user_bio ); ?>
                                       </textarea>
                                       <small id="user_login" class="form-text text-muted">Share a little biographical information to fill out your profile. This may be shown publicly.</small>
                                    </div>
                                 </div>
                                 <button type="submit"  name="update_user" class="btn btn-primary mr-2">Update</button>
                                 <button type="reset" class="btn btn-danger">Cancel</button>
                              </form>
                           </div>
                        </div>
                     </div> 
                  </div>
               </div>
            </div>
                   
            </div>
        </div>
    </div>    
    
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


<div class="navigation">
    <div class="nav-previous"><?php previous_posts_link( 'Previous Page' ); ?></div>
    <div class="nav-next"><?php next_posts_link( 'Next Page' ); ?></div>
</div>


<?php get_footer();?>