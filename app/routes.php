<?php
// app/routes.php

// ruta para manejar los assets
$router->addRoute('/assets/.*', function ($url) use ($router) {
    $router->serveAsset($url);
});

// Puedes agregar todas las rutas que desees aquí...
$router->addRoute('/', 'HomeController@index');
$router->addRoute('/about', 'AboutController@index');
$router->addRoute('/contact', 'ContactController@index');
$router->addRoute('/dashboard', 'DashboardController@index'); // Ruta protegida
