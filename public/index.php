<?php
// Obtenemos la URL de la solicitud desde el parámetro "url"
	$requestUrl = isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : '/';

// Define un enrutador básico
switch ($requestUrl) {
    case '/':
        // Página de inicio
        require_once '../app/Controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;
    default:
        // Página de error 404
        http_response_code(404);
        require_once '../app/Views/404.php';
        break;
}
