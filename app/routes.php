<?php
// routes.php

$router->addRoute('/', 'HomeController@index');
$router->addRoute('/about', 'AboutController@index');
$router->addRoute('/contact', 'ContactController@index');
$router->addRoute('/dashboard', 'DashboardController@index'); // Ruta protegida

// Puedes agregar más rutas aquí...
