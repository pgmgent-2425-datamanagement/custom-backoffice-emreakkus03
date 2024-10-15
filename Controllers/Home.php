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
        //print_r($id);
        $product = Product::find($id);
        if (isset ($_POST['name'])) {
            $product->name = $_POST['name'];
            $product->save();
            //self::redirect('/products');
        }
       
        self::loadView('/edit', [
            'title' => 'Edit product',
            'product' => $product
        ]);
    }

    public static function get_products(){
        $products = Product::all();
        echo json_encode($products);
    }

    
}