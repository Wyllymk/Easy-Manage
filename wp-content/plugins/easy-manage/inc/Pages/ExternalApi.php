<?php
/**
 * @package EasyManage
 */

namespace Inc\Pages;

class ExternalApi{

    public function register(){
        add_shortcode('externalApi', array($this, 'getApi'));
    }
    public function getApi(){
        // Handle delete request
        if(isset($_POST['delete_message'])){

            $post_id = $_POST['delete_message'];

            $delete_url = 'https://easy-manage.com/wp-json/contact/v1/api/' . $post_id;

            // $username = 'admin'; // Replace with your username
            // $password = '64pq IIA6 Z8Ot p7fX 2yg0 lCi8'; // Replace with your password

            // $auth_header = 'Basic ' . base64_encode( $username . ':' . $password );

            $delete_args = [
                'method' => 'DELETE',
                'sslverify' => false, // add this line to disable SSL verification
                'headers' => array(
                    'Content-Type' => 'application/json',
                    // 'Authorization' => $auth_header // Replace with your JWT token
                )
            ];

            $delete_result = wp_remote_request($delete_url, $delete_args);

            if(is_wp_error($delete_result)){
                echo 'Error: ' . $delete_result->get_error_message();
            } else {
                $response_code = wp_remote_retrieve_response_code($delete_result);
        
                if($response_code == 200){
                    echo 'Post deleted successfully';
                } else {
                    echo 'Failed to delete post. Response code: ' . $response_code;
                }
            }

        }

        $url = 'https://easy-manage.com/wp-json/contact/v1/api';

        $args = [
            'method' => 'GET',
            'sslverify'   => false,
        ];

        $response = wp_remote_get(esc_url_raw($url), $args);

        if (is_wp_error($response)) {
            $error_message = $response->get_error_message();
            echo "Something went wrong: $error_message";        }
        
        $body = wp_remote_retrieve_body($response);

        $data = json_decode($body);

        if (empty($data)) {
            return '<div>No data found</div>';
        }

        echo '<pre>';
        //var_dump($data);
        echo '</pre>';

        $html = '<div class="">';
        $html .= '<table class="table table-striped table-hover">';

        $html .= '<thead>';
        $html .= '<tr class="table-dark">';
        $html .= '<th> ID</th>';
        $html .= '<th> Date</th>';
        $html .= '<th> Name</th>';
        $html .= '<th> Email</th>';
        $html .= '<th> Subject</th>';
        $html .= '<th> Message</th>';
        $html .= '<th> Action</th>';

        $html .= '</tr>';
        $html .= '</thead>';

        foreach($data as $item){
        $html .= '<tr>';
        $html .= '<td>'  .$item->contact_id.'</td>';
        $html .= '<td> ' .$item->event_date.'</td>';
        $html .= '<td> ' .$item->name.'</td>';
        $html .= '<td> ' .$item->email.'</td>';
        $html .= '<td> ' .$item->subject.'</td>';
        $html .= '<td> ' .$item->message.'</td>';
        $html .= '<form method="post">';
        $html .= '<td><button type="submit" class="btn btn-primary" name="delete_message" value="' . $item->contact_id . '">Delete</button></td>';
        $html .= '</form>';
        
        $html .= '</tr>';
        }
        $html .= '</table>';
        $html .= '</div>';

        
        
        return $html;

    }
}