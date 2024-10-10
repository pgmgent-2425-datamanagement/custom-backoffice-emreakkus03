<?php

namespace App\Controllers;

use App\Models\Product;

class HomeController extends BaseController {

    public static function index () {
        $products = Product::all();

        //print_r($products);

        self::loadView('/home', [
            'title' => 'Homepage',
            'products' => $products
        ]);
    }

    public static function edit ($id){
        print_r($id);
    }
}