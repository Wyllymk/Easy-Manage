<?php
/**
 * @package CustomPlugin
 */

/**
 * Plugin Name: Custom Plugin
 * Plugin URI: #
 * Description: This is a random custom plugin
 * Version: 1.0.0
 * License: GPL v2 or later
 * License URI: #
 * Author: Wilson
 * Author URI:#
 * Text Domain: custom-plugin
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