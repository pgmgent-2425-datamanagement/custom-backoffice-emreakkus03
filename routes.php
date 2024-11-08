<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');
$router->get('/', 'HomeController@index');
$router->get('/inventory', 'InventoryController@index');
$router->get('/inventory/add', 'InventoryController@add');
$router->get('/inventory/edit/(\d+)', 'InventoryController@edit');
$router->get('/inventory/delete/(\d+)', 'InventoryController@delete');
$router->get('/inventory/search', 'InventoryController@search'); 

$router->get('/category', 'CategoryController@index');
$router->get('/category/add', 'CategoryController@add');
$router->get('/category/edit/(\d+)', 'CategoryController@edit');
$router->get('/category/delete/(\d+)', 'CategoryController@delete');
$router->get('/filemanager', 'FilemanagerController@list');
$router->get('/filemanager/(.*)', 'FilemanagerController@list');
$router->get('/filemanager/delete/(.*)', 'FilemanagerController@delete');

// post route
$router->post('/inventory/edit/(\d+)', 'InventoryController@edit');
$router->post('/inventory/add', 'InventoryController@add');
$router->post('/category/add', 'CategoryController@add');
$router->post('/category/edit/(\d+)', 'CategoryController@edit');

// api routes
$router->get('/api/products', 'HomeController@get_products');
