<?php
// index.php

require_once '../Core/Router.php';

$requestUrl = isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : '/';

$router = new Router();

require_once '../app/routes.php';

$router->handleRequest($requestUrl);
