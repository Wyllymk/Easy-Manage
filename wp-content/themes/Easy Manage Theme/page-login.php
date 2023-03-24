<?php
/**
 * Template Name: Login
 */

ob_start(); // buffer output
get_header();?>
<?php

$errors = array();

if (isset($_POST['login'])) {
    $user_login = $_POST['username'];
    $user_password = $_POST['password'];
    $remember_me = isset($_POST['remember_me']) && $_POST['remember_me'] == 'on' ? true : false;

    $user = wp_signon(array(
        'user_login' => $user_login,
        'user_password' => $user_password,
        'remember' => $remember_me,
    ));

    if (is_wp_error($user)) {
        $error_message = $user->get_error_message();
        $errors[] = $error_message;
    } else {
        wp_redirect(home_url('/dashboard'));
        exit;
    }
}
?>

<div class="wrapper">
    <section class="login-content">
        <div class="container">
            <div class="row align-items-center justify-content-center height-self-center">
                <div class="col-lg-8">
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: inline-block; width:100%;  white-space: nowrap;">
                        
                        <?php foreach ($errors as $error): ?>
                            &nbsp; <?php echo $error; ?>
                        <?php endforeach; ?>
                        
                    </div>
                <?php endif; ?>
                    <div class="card auth-card">
                        <div class="card-body p-0">
                            <div class="d-flex align-items-center auth-content">
                                <div class="col-lg-6 bg-primary content-left">
                                    <div class="p-3">
                                        <h2 class="mb-2 text-white">Sign In</h2>
                                        <p>Login to stay connected.</p>
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="floating-label form-group">
                                                        <input class="floating-input form-control" name="username" type="text" placeholder=" " required>
                                                        <label>Username</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="floating-label form-group">
                                                        <input class="floating-input form-control" name="password" type="password" placeholder=" " required>
                                                        <label>Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" name="remember_me" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label control-label-1 text-white" for="customCheck1">Remember Me</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <a href="<?php echo esc_url(site_url('/lost-password/')); ?>" alt="<?php esc_attr_e( 'Forgot Password?', 'textdomain' ); ?>" class="text-white float-right"><?php esc_html_e( 'Forgot Password?', 'textdomain' ); ?></a>
                                                </div>
                                            </div>
                                            
                                            <div class="d-flex justify-content-around align-items-center">
                                                <button type="submit" name="login"class="btn btn-white">Login</button>
                                                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Continue to site</a>
                                            </div>
                                            <p class="mt-3">
                                            Create an Account <a href="<?php echo esc_url(site_url('/register/')); ?>" class="text-white text-underline">Sign Up</a>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 content-right">
                                    <img src="<?php echo esc_url(get_template_directory_uri(  ).'/assets/img/login/01.png');?>" class="img-fluid image-right" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); 
ob_end_flush();?>
