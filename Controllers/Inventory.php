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
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $nameF = $_FILES['image']['name'];
            $tmP = $_FILES['image']['tmp_name'];
    
            $to = BASE_DIR . '/public/images/';
            $uuid = uniqid() . $nameF;
    
            move_uploaded_file($tmP, $to . $uuid);
    
            $imagePath = $uuid; // Sla het pad op als afbeelding
        } else {
            // Afbeelding is niet geüpload, geef een standaardwaarde of meld het probleem
            $imagePath = null;  // Of geef een standaardnaam, bijvoorbeeld 'default.jpg'
        }

        if (isset($_POST['name'])) {
            $product = new Product();
            $product->name = $_POST['name'];
            $product->description = $_POST['description'];
            $product->price = $_POST['price'];
            $product->quantity = $_POST['quantity'];
            $product->image = $imagePath; // gebruik de correcte afbeeldingsnaam of null
            $product->add();
            header("Location: /inventory");
            exit;
        }
    
        self::loadView('/add', [
            'title' => 'Add product',
        ]);
    }

    public static function edit ($id){
        //print_r($id);
        $product = Product::find($id);
        if (isset ($_POST['name'])) {
            $product->name= $_POST['name'];
            $product->description= $_POST['description'];
            $product->price= $_POST['price'];
            $product->quantity= $_POST['quantity'];
            $product->avatar= $_POST['image'];
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

    public static function search() {
        $term = $_GET['search'] ?? '';  // Pak de zoekterm uit de querystring
        
        $products = (new Product())->search($term);
        
        self::loadView('/inventory', [
            'title' => 'Inventory',
            'products' => $products,
            'searchTerm' => $term
        ]);
    }
    
    
}