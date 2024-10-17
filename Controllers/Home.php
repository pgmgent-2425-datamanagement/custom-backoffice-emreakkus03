<?php

namespace App\Controllers;

use App\Models\Product;

class HomeController extends BaseController {

    public static function index () {
       

        //print_r($products);

        self::loadView('/home', [
            'title' => 'Homepage',
        ]);
    }

    

    public static function get_products(){
        $products = Product::all();
        echo json_encode($products);
    }

    
}