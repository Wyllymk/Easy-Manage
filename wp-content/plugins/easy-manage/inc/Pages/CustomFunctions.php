<?php
/**
 * @package EasyManage
 */

namespace Inc\Pages;

class CustomFunctions{

    public $template;

    public function register(){
        add_filter( 'login_redirect', array($this, 'my_login_redirect'), 10, 3);
        add_action('after_setup_theme', array($this, 'remove_admin_bar'));
        add_action('template_redirect', array($this, 'my_non_logged_redirect'));
        add_action( 'login_init', array($this, 'custom_login_page') );
        add_action( 'login_init', array ($this, 'custom_lost_password_page') );
        add_action( 'admin_init', array($this, 'restrict_dashboard_access') );
        add_action( 'wp_login', array($this, 'update_user_location_on_login'), 10, 2 );
    }

    
    /**
     * Redirect user after successful login.
     */
    function my_login_redirect( $redirect_to, $request, $user ) {
        //is there a user to check?
        if ( isset( $user->roles ) && is_array( $user->roles ) ) {
            //check for admins
            if ( in_array( 'administrator', $user->roles ) ) {
                // redirect them to the default place
                return esc_url(home_url( '/dashboard'));
            } else {
                return esc_url(home_url( '/dashboard'));
            }
        } else {
            return $redirect_to;
        }
    }

    //HIDE ADMIN BAR FOR ALL EXCEPT ADMINISTRATOR

    function remove_admin_bar() {
        if (!current_user_can('administrator') && !is_admin()) {
            show_admin_bar(false);
        }
    }

    /*
    *   Restrict non logged users to certain pages
    */

    
    function my_non_logged_redirect()
    {
        if ((is_page('dashboard') || is_page('projects') || is_page('projects-completed') || is_page('projects-in-progress')  || is_page('members') || is_page('messages')|| is_page('user-profile') || is_page('emails') || is_page('location')) && !is_user_logged_in() )
        {
            wp_redirect( home_url() );
            die();
        }
    } 

    // Redirect users to custom login page
    function custom_login_page() {
        if ( ! is_user_logged_in() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
            wp_redirect( site_url( '/login/' ) );
            exit();
        }
    }

    // Redirect users to custom lost password page
    function custom_lost_password_page() {
        if ( 'GET' == $_SERVER['REQUEST_METHOD'] && isset($_GET['action']) && $_GET['action'] == 'lostpassword' ) {
            if ( ! is_user_logged_in() ) {
                wp_redirect( site_url( '/lost-password/' ) );
                exit;
            }
        }
    }
    
    
     
    //This piece of code restricts the wp-admin from all users except administrator
    function restrict_dashboard_access() {
        if ( is_admin() && ! current_user_can( 'manage_options' ) ) {
            wp_redirect( home_url('/dashboard/') );
            exit;
        }
    }

    function update_user_location_on_login( $user_login, $user ) {
        // Get the user's IP address
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARTDED_FOR'] != '') {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        } 
      
        // Use an IP geolocation service to get the user's latitude and longitude
        $geolocation = file_get_contents('http://ipinfo.io/json/'.$ip_address);
        $geolocation = json_decode($geolocation);
      
        // Check if the geolocation was successful
        if ($geolocation->status == 'success') {
          // Set the user's latitude and longitude
          update_user_meta( $user->ID, 'lat', $geolocation->lat );
          update_user_meta( $user->ID, 'lng', $geolocation->lon );
        }
      }
}