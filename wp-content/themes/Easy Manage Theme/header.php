<!DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <!-- Required Meta Tags -->
        <meta charset="<?php echo bloginfo('charset');?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Wilson">
        <!-- Favicon and Touch Icons -->
        <link rel="icon" type="image/png" sizes="512x512" href=" <?php echo esc_url(get_template_directory_uri() .'/assets/favicon/favicon-512x512.png')?>">
        <title><?php echo bloginfo('title');?></title>
        <?php wp_head();?>
    </head>
    <body <?php body_class();?> >
    <?php if(is_front_page()){
        echo '';
    }else{ ?>

    <?php };?>

    
