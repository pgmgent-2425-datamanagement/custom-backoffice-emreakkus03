<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController extends BaseController {

    public static function index () {
        $categories = Category::all();

        //print_r($products);

        self::loadView('/category', [
            'title' => 'Category',
            'categories' => $categories
        ]);
    }

    public static function add () {
        if (isset ($_POST['name'])) {
            $category = new Category();
            $category->name= $_POST['name'];
            $category->add();
            header("Location: /category"); 
            exit;
        }
        self::loadView('/category/add', [
            'title' => 'Add category',
        ]);
    }

    public static function edit ($id){
        //print_r($id);
        $category = Category::find($id);
        if (isset ($_POST['name'])) {
            $category->name= $_POST['name'];
            $category->save();
            header("Location: /category"); 
            exit;
        }
       
        self::loadView('/category/edit', [
            'title' => 'Edit category',
            'category' => $category
        ]);

    }

    public static function delete ($id){
        $category = Category::find($id);
        $category->delete();
        header("Location: /category"); 
        exit;
    }
    


    
}