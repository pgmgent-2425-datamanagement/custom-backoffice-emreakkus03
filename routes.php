<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');
$router->get('/', 'HomeController@index');
$router->get('/inventory', 'InventoryController@index');
$router->get('/inventory/edit/(\d+)', 'InventoryController@edit');
$router->get('/inventory/delete/(\d+)', 'InventoryController@delete');
// post route
$router->post('/inventory/edit/(\d+)', 'InventoryController@edit');
$router->post('/inventory', 'InventoryController@add');

// api routes
$router->get('/api/products', 'HomeController@get_products');
