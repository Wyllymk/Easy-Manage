<?php
/**
 * @package CustomPlugin
 */

namespace Inc\Pages;

class ExternalApi{

    public function register(){
        add_shortcode('externalApi', array($this, 'getApi'));
    }
    public function getApi(){;
        $url = 'https://dummyjson.com/products';

        $args = [
            'method' => 'GET'
        ];

        $result = wp_remote_get($url, $args);

        $data = json_decode(wp_remote_retrieve_body($result));

        echo '<pre>';
       // var_dump($data);
        echo '</pre>';

        $html = '<div class="container">';
        $html .= '<table class="table table-striped table-hover">';

        $html .= '<thead>';
        $html .= '<tr class="table-dark">';
        $html .= '<th> ID</th>';
        $html .= '<th> Title</th>';
        $html .= '<th> Price</th>';
        $html .= '<th> Discount Percentage</th>';
        $html .= '<th> Rating</th>';
        $html .= '<th> Stock</th>';
        $html .= '<th> Brand</th>';
        $html .= '<th> Category</th>';
        $html .= '<th> Description</th>';
        $html .= '<th> Image</th>';
        $html .= '</tr>';
        $html .= '</thead>';

        foreach($data->products as $product){
        $html .= '<tr>';
        $html .= '<td>' .$product->id.'</td>';
        $html .= '<td> ' .$product->title.'</td>';
        $html .= '<td> ' .$product->price.'</td>';
        $html .= '<td> ' .$product->discountPercentage.'</td>';
        $html .= '<td> ' .$product->rating.'</td>';
        $html .= '<td> ' .$product->stock.'</td>';
        $html .= '<td> ' .$product->brand.'</td>';
        $html .= '<td> ' .$product->category.'</td>';
        $html .= '<td> ' .$product->description.'</td>';
        $html .= '<td><img src="'.$product->thumbnail.'" height="100" width="100"></td>';
        $html .= '</tr>';
        }
        $html .= '</table>';
        $html .= '</div>';

        return $html;

    }
}