<?php

namespace App\Controllers;

use App\Models\Product;

class InventoryController extends BaseController {

    public static function index () {
        $products = Product::all();

        //print_r($products);

        self::loadView('/inventory', [
            'title' => 'Inventory',
            'products' => $products
        ]);
    }

    // add new product
    public static function add () {
        if (isset ($_POST['name'])) {
            $product = new Product();
            $product->name= $_POST['name'];
            $product->description= $_POST['description'];
            $product->add();
            header("Location: /inventory"); 
            exit;
        }
        self::loadView('/inventory', [
            'title' => 'Inventory',
        ]);
    }

    public static function edit ($id){
        //print_r($id);
        $product = Product::find($id);
        if (isset ($_POST['name'])) {
            $product->name= $_POST['name'];
            $product->description= $_POST['description'];
            $product->save();
            header("Location: /inventory"); 
            exit;
        }
       
        self::loadView('/edit', [
            'title' => 'Edit product',
            'product' => $product
        ]);

    }

    public static function delete ($id){
        $product = Product::find($id);
        $product->delete();
        header("Location: /inventory"); 
        exit;
    }


    
}