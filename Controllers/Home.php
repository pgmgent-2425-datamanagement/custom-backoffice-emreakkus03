<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Order;

class HomeController extends BaseController {

    public static function index () {
        $productCount = (new Product())->getProductCounts();  

        $monthlyOrder = (new Order())->getMonthlySales();
        $months = [];
        $salesAmounts = [];
        foreach ($monthlyOrder as $sale) {
            $months[] = date("F", mktime(0, 0, 0, $sale['sale_month'], 10)); // Maandnaam
            $salesAmounts[] = $sale['total_sales'];
        }

      
        self::loadView('/home', [
            'title' => 'Home',
            'productCount' => $productCount,
            'months' => json_encode($months),
            'salesAmounts' => json_encode($salesAmounts)
        ]);
    }
    
    

    public static function get_products(){
        $products = Product::all();
        echo json_encode($products);
    }

    
}