<?php
/**
 * @package CustomPlugin
 */

 namespace Inc\Base;

 class Enqueue extends Controller{

    public function register(){
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    public function enqueue(){
        wp_enqueue_style('bootstrap_css', $this->plugin_url.'/assets/bootstrap.min.css' );
        wp_enqueue_style('custom_css', $this->plugin_url.'/assets/pluginstyle.css' );
        wp_enqueue_script('bootstrap_js', $this->plugin_url.'/assets/bootstrap.min.js' );
        wp_enqueue_script('custom_js', $this->plugin_url.'/assets/pluginscript.js' );
    }
 }