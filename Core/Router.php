<?php
// router.php

class Router {
    private $routes = [];

    public function addRoute($url, $handler) {
        $this->routes[$url] = $handler;
    }

    public function serveAsset($assetUrl) {
        $assetPath = '../public/' . $assetUrl;

        if (file_exists($assetPath)) {
            $mime = mime_content_type($assetPath);
            header('Content-Type: ' . $mime);
            readfile($assetPath);
            exit;
        } else {
            http_response_code(404);
            include __DIR__ . '/views/404.php';
            exit;
        }
    }

    public function handleRequest($requestUrl) {
        if (array_key_exists($requestUrl, $this->routes)) {
            $handler = $this->routes[$requestUrl];
            list($controllerName, $methodName) = explode('@', $handler);

            $isProtected = $this->isRouteProtected($requestUrl);

            if ($isProtected) {
                // Aquí puedes redireccionar al usuario a una página de inicio de sesión o mostrar un mensaje de acceso denegado.
                // Por ejemplo:
                // header('Location: /login.php');
                // exit();
                echo "protegido...";
            } else {
                $controllerFile = '../app/controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    require_once $controllerFile;
                } else {
                    die('Controlador no encontrado');
                }

                if (class_exists($controllerName)) {
                    $controllerInstance = new $controllerName();
                    if (method_exists($controllerInstance, $methodName)) {
                        $controllerInstance->$methodName();
                    } else {
                        die('Método no encontrado');
                    }
                } else {
                    die('Controlador no encontrado');
                }
            }
        } else {
            http_response_code(404);
            include '../app/views/404.php';
            exit();
        }
    }

    private function isRouteProtected($url) {
        // Definir las rutas protegidas
        $protectedRoutes = [
            '/dashboard',
            // Agrega más rutas protegidas si es necesario
        ];

        // Verificar si la ruta solicitada está en la lista de rutas protegidas
        return in_array($url, $protectedRoutes);
    }
}
