<?php
/**
 * @package EasyManage
 */

namespace Inc\Pages;

class Contact{
    function register(){
        $this->createTable();
        $this->insertDataTable();
        add_action( 'rest_api_init', array($this, 'custom_fetch_rest_route'));
        add_action( 'rest_api_init', array($this, 'custom_insert_rest_route'));
        add_action( 'rest_api_init', array($this, 'custom_update_rest_route'));
        add_action( 'rest_api_init', array($this, 'custom_delete_rest_route'));
    }

    function createTable(){
        global $wpdb;
        $contact_table = $wpdb->prefix.'contact';
        $charset_collate = $wpdb->get_charset_collate();

        $contact_details = "CREATE TABLE IF NOT EXISTS $contact_table(
            contact_id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            event_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            name text NOT NULL,
            email varchar(30) NOT NULL,
            subject varchar(30) NOT NULL,
            message text NOT NULL,
            PRIMARY KEY (contact_id)
        )$charset_collate;";

        require_once (ABSPATH. '/wp-admin/includes/upgrade.php');
        dbDelta($contact_details);
    }

    function insertDataTable(){
        global $wpdb;

        if(isset($_POST['contactmessage'])){
            $data = array(
                'name'      =>  sanitize_text_field( $_POST['name']),
                'email'     =>  sanitize_text_field( $_POST['email']),
                'subject'   =>  sanitize_text_field( $_POST['subject']),
                'message'   =>  sanitize_textarea_field($_POST['message'])
            );
        
            $contact_table = $wpdb->prefix.'contact';

            $format = array(
                '%s',
                '%s',
                '%s',
                '%s'
            );

            $result = $wpdb->insert($contact_table, $data, $format);
            if($result==true){
                echo '<script>alert("Contact Form Submitted Successfully");</script>' ;
            }else{
                echo '<script>alert("Contact Form Not Submitted");</script>' ;
            }
        }
    }

    /**
     * Sending Form Data using REST API
     */

    function sendContactMessage($name, $email, $subject, $message) {
        // URL of the REST API endpoint that accepts the contact message data
        $url = 'https://Easy-Manage.com/wp-json/contact/v1/api/';
        
        // Data to be sent to the REST API endpoint
        $data = array(
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message
        );

        // Set up the HTTP request headers
        $headers = array(
            'Content-Type: application/json'
        );

        // Set up the HTTP request options
        $options = array(
            'http' => array(
            'method' => 'POST',
            'header' => implode("\r\n", $headers),
            'content' => json_encode($data),
            'ignore_errors' => true
            )
        );

        // Send the HTTP request and get the response
        $response = file_get_contents($url, false, stream_context_create($options));

        // Return the HTTP response as a JSON object
        return json_decode($response);
    }

    // function insertDataTable(){
    //     // Check if the contact message form has been submitted
    //     if (isset($_POST['contactmessage'])) {
    //     // Get the values from the form
    //     $name = $_POST['name'];
    //     $email = $_POST['email'];
    //     $subject = $_POST['subject'];
    //     $message = $_POST['message'];

    //     // Send the contact message
    //     $result = $this->sendContactMessage($name, $email, $subject, $message);

    //     // Display the result of the contact message submission
    //     if ($result==true) {
    //         echo '<div class="alert alert-success">Your message has been sent successfully.</div>';
    //     } else {
    //         echo '<div class="alert alert-danger">Sorry, there was an error sending your message. Please try again later.</div>';
    //     }
    //     }
    // }

    /**
    * Register FETCH REST Route
    */
        
    function custom_fetch_rest_route() {
        register_rest_route( 'contact/v1', 'api', array(
            'methods' => 'GET',
            'callback' => array($this, 'contact_get_api_data'),
            'permission_callback' => '__return_true', 
        ) );
    }
    /**
     * Register FETCH CALLBACK
     */
    function contact_get_api_data(){
        global $wpdb;
        $table_name = $wpdb->prefix.'contact';

        $query = "SELECT * FROM $table_name";

        $results = $wpdb->get_results($query);

        return $results;
    }

    /**
    * Register INSERT REST Route
    */
    
    function custom_insert_rest_route() {
        register_rest_route( 'contact/v1', 'api', array(
            'methods' => 'POST',
            'callback' => array($this, 'contact_insert_api_data'),
            'permission_callback' => array($this, 'custom_endpoint_permission'), 
        ) );
    }
    /**
     * Register INSERT CALLBACK
     */
    function contact_insert_api_data($request){
        global $wpdb;
        $table_name = $wpdb->prefix.'contact';

        $name = $request['name'];
        $email = $request['email'];
        $subject = $request['subject'];
        $message = $request['message'];

        $data = array(
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message,

        );

        $insert_data = $wpdb->insert($table_name, $data);

        return 'Your data has been inserted.';
    }

    /**
    * Register UPDATE REST Route
    */
    
    function custom_update_rest_route() {
        register_rest_route( 'contact/v1', 'api', array(
            'methods' => 'PUT',
            'callback' => array($this, 'contact_update_api_data'),
            'permission_callback' => 'custom_endpoint_permission', 
        ) );
    }
    /**
     * Register UPDATE CALLBACK
     */
    function contact_update_api_data($request){
        global $wpdb;
        $table_name = $wpdb->prefix.'contact';

        $contact_id = $request['contact_id'];
        $name = $request['name'];
        $email = $request['email'];
        $subject = $request['subject'];
        $message = $request['message'];

        $data = array(
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message,

        );

        $where = ['contact_id' => $contact_id];

        $update_data = $wpdb->update($table_name, $data, $where);

        var_dump($contact_id);
        
        return 'Your data in id number '.$contact_id.' has been UPDATED.';
    }

    /**
    * Register DELETE REST Route
    */
    
    function custom_delete_rest_route() {
        register_rest_route( 'contact/v1', 'api/(?P<contact_id>\d+)?', array(
            'methods' => 'DELETE',
            'callback' => array($this, 'contact_delete_api_data'),
            'permission_callback' => '__return_true', 
        ) );
    }
    /**
     * Register DELETE CALLBACK
     */
    function contact_delete_api_data($request){
        global $wpdb;
        $table_name = $wpdb->prefix.'contact';

        $contact_id = $request['contact_id'];
        
        $data = array(
            'contact_id' => $contact_id,
        );
        
        $delete_data = $wpdb->delete($table_name, $data);

        var_dump($contact_id);
        
        return 'Your data in id number '.$contact_id.' has been DELETED.';
    }

    function custom_endpoint_permission(){
        if(is_user_logged_in(  )){
            current_user_can('edit_others_posts');
            return true;
        }else{
            return false;
        }
    }
}