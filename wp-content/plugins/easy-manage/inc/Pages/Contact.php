<?php
/**
 * @package EasyManage
 */

namespace Inc\Pages;

class Contact{
    function register(){
        $this->createTable();
        $this->insertDataTable();
    }

    function createTable(){
        global $wpdb;
        $contact_table = $wpdb->prefix.'contact';
        $charset_collate = $wpdb->get_charset_collate();

        $contact_details = "CREATE TABLE IF NOT EXISTS $contact_table(
            contact_id bigint(20) unsigned NOT NULL auto_increment,
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
}