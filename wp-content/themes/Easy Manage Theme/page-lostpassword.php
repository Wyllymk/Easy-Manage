<?php
/**
 * Template Name: Lost Password
 */
get_header(); ?>

<?php

$error_messages = array();

if (isset($_POST['lostpassword'])) {
    $user_login = $_POST['user_login'];

    $errors = retrieve_password();
    if (is_wp_error($errors)) {
        $error_message = $errors->get_error_message();
        $errors_messages[] = $error_message;
    } else {
        $success_message = '<div class="alert alert-success">Password reset email has been sent to your email address.</div>';
    }
}
?>

<div class="wrapper">
    <section class="login-content">
        <div class="container">
            <div class="row align-items-center justify-content-center height-self-center">
                <div class="col-lg-8">
                <?php if (!empty($error_messages)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php foreach ($error_messages as $error): ?>
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
                                        <h2 class="mb-2 text-white">Forgot Password</h2>
                                        <p>Enter your username or email address and we'll send you a link to reset your password.</p>
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="floating-label form-group">
                                                        <input class="floating-input form-control" name="user_login" type="text" placeholder=" " required>
                                                        <label>Username or Email</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" name="lostpassword" class="btn btn-white">Reset Password</button>
                                            <p class="mt-3">
                                                <a href="<?php echo esc_url(site_url('/login/')); ?>" class="text-white text-underline">Back to Login</a>
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

<?php get_footer(); ?>
