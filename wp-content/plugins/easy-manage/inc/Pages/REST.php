<?php
/**
 * @package EasyManage
 */

namespace Inc\Pages;

class REST{
    function register(){
       // $this->custom();
       //$this->customGETContact();
       
    }
    function customGETContact(){
        $endpoint = get_rest_url( null, 'contact/v1/api' );
        
        $headers = array(
            'Cache-Control' => 'no-cache',
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode($username . ':' . $password)
        );

        $body = array(
            'username' => 'bob',
            'password' => '1234xyz'
        );

        $options = array(
            'method'      => 'GET',
            'body'        => $body,
            'headers'     => array(),
            'timeout'     => 60,
            'redirection' => 5,
            'blocking'    => true,
            'httpversion' => '1.0',
            'sslverify'   => false,
            'data_format' => 'body',
            'cookies'     => array()
        );

        $response = wp_remote_post( $endpoint, $options );
    }

    function custom(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Set the post data
            $post_data = array(
                'name'      => $_POST['name'],
                'email'     => $_POST['email'],
                'subject'   => $_POST['subject'],
                'message'   => $_POST['message'],
            );
            //Convert the post data to JSON
            $post_json = json_encode($post_data);
            //Set the Application password
            $username = 'admin';
            $password = '64pq IIA6 Z8Ot p7fX 2yg0 lCi8';
            //Create a curl handle
            $curl = curl_init();
            //Set the url path
            $url = 'https://easy-manage.com/wp-json/contact/v1/api';
           
            
            $headers = array(
                'Content-Type: application/json',
                'Authorization: Basic ' . base64_encode($username . ':' . $password)
            );
            //Set the cURL options
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            //this prevents error SSL certificate problem: self signed certificate.
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $post_json);
            //Execute the request and get the response
            $response = curl_exec($curl);

            // Check for errors
            if ($response === false) {
                $error_message = curl_error($curl);
                // Handle the error
                // echo "cURL error: " . $error_message;
            }
            //Close the cURL handle
            curl_close($curl);
        
        }
    }

    
   
}
