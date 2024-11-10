<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;

class InventoryController extends BaseController
{

    public static function index()
    {
        $productModel = new Product();
        $products = $productModel->allWithCategory();

        

        //print_r($products);

        self::loadView('/inventory', [
            'title' => 'Inventory',
            'products' => $products
        ]);
    }
    
    
    // add new product
    public static function add()
    {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $nameF = $_FILES['image']['name'];
            $tmP = $_FILES['image']['tmp_name'];

            $to = BASE_DIR . '/public/images/';
            $uuid = uniqid() . $nameF;

            move_uploaded_file($tmP, $to . $uuid);

            $imagePath = $uuid;
        } else {

            $imagePath = null;
        }

        //fetch category
        $categories = Category::all();

        if (isset($_POST['name'])) {
            $product = new Product();
            $product->name = $_POST['name'];
            $product->description = $_POST['description'];
            $product->price = $_POST['price'];
            $product->quantity = $_POST['quantity'];
            $product->image = $imagePath;
            $product->category_id = $_POST['category_id'];
            $product->add();
            header("Location: /inventory");
            exit;
        }

        self::loadView('/add', [
            'title' => 'Add product',
            'categories' => $categories
        ]);
    }

    public static function edit($id)
    {
        //print_r($id);
        //fetch category
        $categories = Category::all();
        $product = Product::find($id);

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $nameF = $_FILES['image']['name'];
            $tmP = $_FILES['image']['tmp_name'];

            $to = BASE_DIR . '/public/images/';
            $uuid = uniqid() . $nameF;

            move_uploaded_file($tmP, $to . $uuid);

            $imagePath = $uuid;
        } else {
            $imagePath = $product->image; 
        }

        if (isset($_POST['name'])) {
            $product->name = $_POST['name'];
            $product->description = $_POST['description'];
            $product->price = $_POST['price'];
            $product->quantity = $_POST['quantity'];
            $product->image = $imagePath;
            $product->category_id = $_POST['category_id'];
            $product->save();
            header("Location: /inventory");
            exit;
        }

        self::loadView('/edit', [
            'title' => 'Edit product',
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public static function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        header("Location: /inventory");
        exit;
    }

    public static function search()
    {
        $term = $_GET['search'] ?? '';

        $products = (new Product())->search($term);
        $products = (new Product())->allWithCategory();
        $products = array_filter($products, function($product) use ($term) {
            return stripos($product->name, $term) !== false;
        });

        self::loadView('/inventory', [
            'title' => 'Inventory',
            'products' => $products,
            'searchTerm' => $term
        ]);
    }

    public static function sort() {
        $order = $_GET['order'] ?? 'ASC'; // standaard sorteren A-Z
        $products = (new Product())->sortedByName($order);
        $products = (new Product())->allWithCategory();
        usort($products, function($a, $b) use ($order) {
            return $order === 'ASC' ? strcmp($a->name, $b->name) : strcmp($b->name, $a->name);
        });
      

        self::loadView('/inventory', [
            'title' => 'Inventory',
            'products' => $products,
            'sortOrder' => $order,
        ]);
    }

  
}
