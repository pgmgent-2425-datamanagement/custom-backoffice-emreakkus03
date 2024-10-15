<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');
$router->get('/', 'HomeController@index');
$router->get('/products/edit/(\d+)', 'HomeController@edit');
// post route
$router->post('/products/edit/(\d+)', 'HomeController@edit');

// api routes
$router->get('/api/products', 'HomeController@get_products');
