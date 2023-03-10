<?php
/**
 * @package EasyManage
 */

/**
 * Plugin Name:     Easy Manage
 * Plugin URI:      #
 * Description:     This is a Project Management System Plugin
 * Version:         1.0.0
 * License:         GPL v2 or later
 * License URI:     #
 * Author:          Wilson
 * Author URI:      #
 * Update URI:      #
 * Text Domain:     easy-manage
 * Domain Path:     /languages
 */

 //Security
 defined('ABSPATH') or die('Get out!');

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__). '/vendor/autoload.php';
}

function activateExternally(){
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activateExternally');

function deactivateExternally(){
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivateExternally');

//class as service
if(class_exists('Inc\\Init')){
    Inc\Init::register_services();
}