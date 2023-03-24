<?php get_header();?>
    <!-- loader END -->
    
<div class="wrapper">
    <div class="container">
        <div class="row no-gutters height-self-center">
            <div class="col-sm-12 text-center align-self-center">
               <div class="iq-error position-relative">
                     <img src="<?php echo get_template_directory_uri(  );?>/assets/img/error/404.png" class="img-fluid iq-error-img" alt="">
                     <h2 class="mb-0 mt-4">Oops! This Page is Not Found.</h2>
                     <p>The requested page does not exist.</p>
                     <a class="btn btn-primary d-inline-flex align-items-center mt-3" href="<?php echo esc_url(site_url('/home/')); ?>"><i class="ri-home-4-line"></i>Back to Home</a>
               </div>
            </div>
         </div>
   </div>
</div>

<?php get_footer();?>