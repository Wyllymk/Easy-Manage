<?php
/**
 * Template Name: Registration
 */
get_header();?>
<?php

$errors =array();

if(isset($_POST['signup'])){
    if ( isset( $_POST['password'] ) && $_POST['password'] != $_POST['passwordconfirm'] ){
        $errors[] = "Passwords do not match.";
    }
    
    if(empty($errors)){
        $user_login = $_POST['username'];
        $user_email = $_POST['email'];
        $user_pass  = $_POST['password'];
        

        $data = array(
            'user_login'           =>  $user_login, // the user's login username.
            'user_email'           =>  $user_email, //enter email
            'user_pass'	           =>  $user_pass, // not necessary to hash password ( The plain-text user password ).
            'role'                 =>  'member', //give role of member
            'show_admin_bar_front' =>  false, // display the Admin Bar for the user 'true' or 'false'
            'user_status'          =>  0, // set the user as inactive
            'meta_input' => array(
               'registration_status' => 'inactive', // add custom field to mark the user as unverified
               'verified' => false, // add a custom field to mark the user as unverified
            )
        );
        
        $user_id = wp_insert_user( wp_slash($data) );
        
        if ( ! is_wp_error( $user_id ) ) {
            
            $success_message  = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
            $success_message .= 'The account for '. $user_login. ' has been successfully registered.';
            $success_message .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            $success_message .= '</div>';

            // send email to administrator to approve or deny the registration
            $to = get_option('admin_email');
            $subject = 'New user registration waiting for approval';
            $message = 'A new user has registered with the following details:\n\n';
            $message .= 'Username: ' . $user_login . '\n';
            $message .= 'Email: ' . $user_email . '\n\n';
            $message .= 'Click the following link to approve or deny the registration:\n\n';
            $message .= site_url('/registration-approval/') . '?user_id=' . $user_id . '&action=approve\n\n';
            $message .= 'Thank you';

            update_user_meta($user_id, 'registration_status', 'inactive');
            
            wp_mail($to, $subject, $message);

        }else{
            $error_code = array_key_first( $user_id->errors );
            $error_message = $user_id->errors[$error_code][0];
            $errors[] = $error_message;
        }
    }

}
?>

<div class="wrapper">
      <section class="login-content">
         <div class="container">
            <div class="row align-items-center justify-content-center height-self-center">
               <div class="col-lg-8">
                      
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Warning!</strong>
                        <?php foreach ($errors as $error): ?>
                            &nbsp; <?php echo $error; ?>
                        <?php endforeach; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <?php if (isset($success_message)): ?>
                  <?php echo $success_message; ?>
                <?php endif; ?>
                  <div class="card auth-card">
                     <div class="card-body p-0">              
                        <div class="d-flex align-items-center auth-content">
                           <div class="col-lg-6 bg-primary content-left">
                              <div class="p-3">
                                 <h2 class="mb-2 text-white">Sign Up</h2>
                                 <p>Create your Easy Manage account.</p>
                                 <form action="" method="post">
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" name="username" type="text" placeholder=" " required>
                                             <label>Username</label>
                                          </div>
                                       </div>
                                       
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" name="email"type="email" placeholder=" " required>
                                             <label>Email</label>
                                          </div>
                                       </div>
                                       
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" name="password"type="password" placeholder=" " required>
                                             <label>Password</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" name="passwordconfirm"type="password" placeholder=" " autocomplete="off">
                                             <label>Confirm Password</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="custom-control custom-checkbox mb-3">
                                             <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                                             <label class="custom-control-label text-white" for="customCheck1">I agree with the <a class="text-white" href="<?php echo esc_url(site_url('/terms-of-service/')); ?>" target="_blank"><u>terms of use</u> </a></label>
                                          </div>
                                       </div>
                                    </div>
                                    <button type="submit" class="btn btn-white" name="signup">Sign Up</button>
                                    <p class="mt-3">
                                       Already have an Account <a href="<?php echo esc_url(site_url('/login/')); ?>" class="text-white text-underline">Sign In</a>
                                    </p>
                                 </form>
                              </div>
                           </div>
                           <div class="col-lg-6 content-right">
                              <img src="<?php echo get_template_directory_uri(  )?>/assets/img/login/01.png" class="img-fluid image-right" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      </div>

<?php get_footer();?>